
		
<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');


class Binler extends CI_Controller
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
		$binler = $this->db->order_by('banka_adi', 'asc')->get('binler');
		$veri = [
			'binler' => $binler,
			'sayfa_adi' => 'binler/list',
			'sayfa_title' => 'Binler - Admin Paneli'
		];
		$this->load->view('yonetim/index', $veri);
	}

	public function sil($id)
	{
		$this->db->delete('binler', ['id' => $id]);
		redirect(admin_url('binler'));
	}


	public function duzenle($id)
	{
		$bin = $this->db->get_where('binler', ['id' => $id]);
		if ($bin->num_rows() == 0) {
			redirect(admin_url());
		}
		$bin = $bin->row();


		if ($_POST) {

			/* banka_adi type sub_type status */
			$json = ['durum' => 'error', 'mesaj'   => ''];


			$bin_no				= post('bin');
			$banka_adi 			= post('banka_adi');
			$type 				= post('type');
			$sub_type 			= post('sub_type');
			$status				= post('status');

			$this->form_validation->set_rules('bin', 'Bin', 'trim|required');
			$this->form_validation->set_rules('banka_adi', 'Banka Adı', 'trim|required');

			$validat = $this->form_validation->run();

			$ip_kontrol = $this->db->query('select * from binler where bin="' . $bin_no . '" and id !="' . $bin->id . '"');
			if ($ip_kontrol->num_rows() > 0) {
				$json['mesaj'] = 'bin zaten kayıtlı';
				echo json_encode($json);
				exit;
			}

			if ($validat) {

				$veri = [
					'bin' => $bin_no,
					'banka_adi' => $banka_adi,
					'type' => $type,
					'sub_type' => $sub_type,
					'status' => $status,
				];

				$this->db->where('id', $bin->id);
				if ($this->db->update('binler', $veri)) {
					$json["durum"] = 'success';
					$json["mesaj"] =  '<div class="alert alert-success"> Başarıyla Düzenlendi! </div>' . meta_refr(admin_url('binler'));
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
			'sayfa_adi' => 'binler/duzenle',
			'sayfa_title' => 'Bin Düzenle - Admin Paneli',
			'bin' => $bin
		];
		$this->load->view('yonetim/index', $veri);
	}

	public function ekle()
	{
		if ($_POST) {

			/* cloaker_url hedef_url durum */
			$json = ['durum' => 'error', 'mesaj'   => ''];

			$bin 			= post('bin');
			$banka_adi 			= post('banka_adi');
			$type 				= post('type');
			$sub_type 			= post('sub_type');
			$status				= post('status');

			$this->form_validation->set_rules('bin', 'Bin', 'trim|required');
			$this->form_validation->set_rules('banka_adi', 'Banka Adı', 'trim|required');

			$validat = $this->form_validation->run();

			$curl_kontrol = $this->db->get_where('binler', ['bin' => $bin]);
			if ($curl_kontrol->num_rows() > 0) {
				$json['mesaj'] = 'Bin zaten kayıtlı!';
				echo json_encode($json);
				exit;
			}

			if ($validat) {

				$veri = [
					'bin' => $bin,
					'banka_adi' => $banka_adi,
					'type' => $type,
					'sub_type' => $sub_type,
					'status' => $status,
				];

				if ($this->db->insert('binler', $veri)) {
					$json["durum"] = 'success';
					$json["mesaj"] =  '<div class="alert alert-success"> Başarıyla Eklendi! </div>' . meta_refr(admin_url('binler'));
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
			'sayfa_adi' => 'binler/ekle',
			'sayfa_title' => 'Bin Ekle - Admin Paneli',
		];
		$this->load->view('yonetim/index', $veri);
	}
}
