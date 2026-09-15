
		
<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');


class Banlar extends CI_Controller
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
		$banlar = $this->db->get('banlar');
		$veri = [
			'banlar' => $banlar,
			'sayfa_adi' => 'banlar/list',
			'sayfa_title' => 'Banlar - Admin Paneli'
		];
		$this->load->view('yonetim/index', $veri);
	}

	public function sil($id)
	{
		$this->db->delete('banlar', ['id' => $id]);
		redirect(admin_url('banlar'));
	}

	public function duzenle($id)
	{
		$ban = $this->db->get_where('banlar', ['id' => $id]);
		if ($ban->num_rows() == 0) {
			redirect(admin_url());
		}
		$ban = $ban->row();


		if ($_POST) {

			/* cloaker_url hedef_url durum */
			$json = ['durum' => 'error', 'mesaj'   => ''];


			$ip 			= post('ip');
			$neden 			= post('neden');
			$tarih			= date('Y-m-d H:i:s');


			$this->form_validation->set_rules('neden', 'neden', 'trim|required');
			$this->form_validation->set_rules('ip', 'ip', 'trim|required');

			$validat = $this->form_validation->run();

			$ip_kontrol = $this->db->query('select * from banlar where ip="' . $ip . '" and id !="' . $ban->id . '"');
			if ($ip_kontrol->num_rows() > 0) {
				$json['mesaj'] = 'IP zaten banlı';
				echo json_encode($json);
				exit;
			}

			if ($validat) {

				$veri = [
					'ip' => $ip,
					'neden' => $neden,
					'tarih' => $tarih
				];

				$this->db->where('id', $ban->id);
				if ($this->db->update('banlar', $veri)) {
					$json["durum"] = 'success';
					$json["mesaj"] =  '<div class="alert alert-success"> Başarıyla Düzenlendi! </div>' . meta_refr(admin_url('banlar'));
				}
			} else {
				$json["mesaj"] = validation_errors('<i class="fa fa-times"></i> ', '<br>');
			}


			if ($json["durum"] == "error") {
				$json["mesaj"] = '<div class="alert alert-danger">' . $json['mesaj'] . '</div> ';
			}

			echo json_encode($json);
			exit;
		}


		$veri = [
			'sayfa_adi' => 'banlar/duzenle',
			'sayfa_title' => 'Bin Düzenle - Admin Paneli',
			'ban' => $ban
		];
		$this->load->view('yonetim/index', $veri);
	}

	public function ekle()
	{
		if ($_POST) {

			/* cloaker_url hedef_url durum */
			$json = ['durum' => 'error', 'mesaj'   => ''];

			$ip 			= post('ip');
			$neden 			= post('neden');
			$tarih			= date('Y-m-d H:i:s');


			$this->form_validation->set_rules('neden', 'neden', 'trim|required');
			$this->form_validation->set_rules('ip', 'ip', 'trim|required');

			$validat = $this->form_validation->run();

			$ip_kontrol = $this->db->get_where('banlar', ['ip' => $ip]);
			if ($ip_kontrol->num_rows() > 0) {
				$json['mesaj'] = 'IP zaten banlı';
				echo json_encode($json);
				exit;
			}

			if ($validat) {

				$veri = [
					'ip' => $ip,
					'neden' => $neden,
					'tarih' => $tarih
				];

				if ($this->db->insert('banlar', $veri)) {
					$json["durum"] = 'success';
					$json["mesaj"] =  '<div class="alert alert-success"> Başarıyla Eklendi! </div>' . meta_refr(admin_url('banlar'));
				}
			} else {
				$json["mesaj"] = validation_errors('<i class="fa fa-times"></i> ', '<br>');
			}

			if ($json["durum"] == "error") {
				$json["mesaj"] = '<div class="alert alert-danger">' . $json['mesaj'] . '</div> ';
			}

			echo json_encode($json);
			exit;
		}

		$veri = [
			'sayfa_adi' => 'banlar/ekle',
			'sayfa_title' => 'Ban Ekle - Admin Paneli',
		];
		$this->load->view('yonetim/index', $veri);
	}
}
