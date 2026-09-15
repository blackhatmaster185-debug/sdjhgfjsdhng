<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');

class Ayarlar extends CI_Controller
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
        if ($_POST) {
            $json = ['durum' => 'error', 'mesaj'   => ''];

            if ($json['mesaj'] == '') {
                $post_array = $_POST;

                foreach ($post_array as $post_key => $post_val) {

                    $mtn_db = $this->db->get_where('ayarlar', array('mkey' => $post_key));
                    if ($mtn_db->num_rows() > 0) {

                        $this->db->where(array('mkey' => $post_key));
                        $this->db->update('ayarlar', array('mval' => $post_val));
                    } else {

                        $this->db->insert('ayarlar', array('mkey' => $post_key, 'mval' => $post_val));
                    }
                }

                $json['durum'] = 'success';
            }

            echo json_encode($json);
            exit;
        }

        $site_ayar = $this->db->get_where("ayarlar", array("id" => 1))->row();
        $veri = [
            'site_ayar' => $site_ayar,
            'sayfa_adi' => 'ayarlar',
            'sayfa_title' => 'Site Ayarları - Admin Paneli',
        ];
        $this->load->view('yonetim/index', $veri);
    }

    

}
