<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');

use Stichoza\GoogleTranslate\GoogleTranslate;

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		admin_oturum_kontrol();
	}

}
