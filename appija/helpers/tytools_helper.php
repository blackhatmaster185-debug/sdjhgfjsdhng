<?php


function stcookie($name, $val, $time = 0){
	if($time == 0){
		$time = time() + (10000*10000);
	}
	setcookie($name, $val, $time, "/"); 
}

function gtcookie($name){
	if(isset($_COOKIE[$name])){
		return $_COOKIE[$name];
	}else{
		return NULL;
	}
}

function reCallCategoriesString($Kategoriler, $ust_id = 0, $id = null)
{
	$r = array();
	$a = array();

	$return = "";

	foreach ($Kategoriler as $d) {

		if ($d['id'] == $ust_id)
			$a[] = $d;
	}

	foreach ($a as $kategori) {
		$return .= reCallCategoriesString($Kategoriler, $kategori['ust']);
		$return .= $kategori['baslik'];
		$return .= ' > ';

		if ($id != null) {
			foreach ($Kategoriler as $s) {

				if ($s['id'] == $id)
					$r[] = $s;
			}
			foreach ($r as $re) {
				$return .= $re['baslik'];
			}
		}
	}

	return $return;
}

function reCallCategoriesUSTArray($Kategoriler, $kat_id, $cache = array())
{
	$Kategori = array();

	foreach ($Kategoriler as $row) {
		if ($row['id'] == $kat_id) {
			$cache[] = $row;
			$Kategori = $row;
		}
	}

	if (isset($Kategori['ust'])) {
		if ($Kategori['ust'] > 0) {
			$cache = reCallCategoriesUSTArray($Kategoriler, $Kategori['ust'], $cache);
		}
	}

	return $cache;
}



function reCallCategoriesALTArray($Kategoriler, $id, $result = array())
{
	foreach ($Kategoriler as $row) {
		if ($row['ust'] == $id) {
			$result[] = $row;
			$result = reCallCategoriesALTArray($Kategoriler, $row['id'], $result);
		}
	}

	return $result;
}



function google_translate($string, $target, $source, $format = "text")
{

	$_CURL_DATA_ARRAY = array(
		"q" =>  $string,
		"target" =>  $target,
		"source" => $source,
		"format" =>  "html",
		"key" => "AIzaSyD4ZNYpT3q3mEzr9JL-tOdW-Z_9af9jopQ",
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://translation.googleapis.com/language/translate/v2',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $_CURL_DATA_ARRAY,
		CURLOPT_HTTPHEADER => array(
			'Accept: application/json',
			'Content-Language: tr'
		),
	));

	$translate_string = "";

	$response = curl_exec($curl);
	curl_close($curl);

	$response = json_decode($response);


	if (isset($response->data->translations[0]->translatedText)) {
		$translate_string = $response->data->translations[0]->translatedText;
	}

	return $translate_string;
}


function admin_oturum_kontrol($redirect = true)
{
	$ci 		= get_instance();
	$email 		=  isset($_SESSION['admin']["email"]) ?  $_SESSION['admin']["email"] : "0";
	$sifre 		=  isset($_SESSION['admin']["sifre"]) ?  $_SESSION['admin']["sifre"] : "0";

	if ($email == "0" || $sifre == "0") {
		$cookie_adminlogin = isset($_COOKIE['adminlogin']) ? $_COOKIE['adminlogin'] : "0";
		if ($cookie_adminlogin != "") {
			$cookie_adminlogin = base64_decode($cookie_adminlogin);
			$cookie_adminlogin = json_decode($cookie_adminlogin, true);

			$email = isset($cookie_adminlogin['email']) ?  $cookie_adminlogin['email'] : "0";
			$sifre = isset($cookie_adminlogin['sifre']) ?  $cookie_adminlogin['sifre'] : "0";
		}
	}

	$ci->db->where(array("email" => $email, "sifre" => $sifre));
	$row = $ci->db->get('yoneticiler');

	if ($row->num_rows() > 0) {
		return 1;
	}

	if ($redirect) {
		redirect("/admin/giris");
	} else {
		return 0;
	}
}

function admin($admin_id = 0)
{
	$ci = get_instance();

	if ($admin_id == 0) {
		$admin_session_email =  isset($_SESSION['admin']["email"]) ?  $_SESSION['admin']["email"] : 0;
		$ci->db->where(array("email" => $admin_session_email));

		return $ci->db->get('yoneticiler')->row();
	} else {
		$ci->db->where(array("id" => $admin_id));
		return $ci->db->get('yoneticiler')->row();
	}
}

function post($name, $html = 0)
{
	$ci = get_instance();
	if ($html == 0) {
		return html_sil($ci->input->post($name, true));
	} else {
		return $ci->input->post($name, false);
	}
}

function get($name, $html = 0)
{
	$ci = get_instance();
	if ($html == 0) {
		return html_sil($ci->input->get($name, true));
	} else {
		return $ci->input->get($name, true);
	}
}


function session($name, $value = 0)
{
	if ($value == 0) {
		return $_SESSION[$name];
	} else {
		return $_SESSION[$name] = $value;
	}
}


function html_sil($str)
{
	if (isset($str)) {
		$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
		$t = htmlentities($t, ENT_QUOTES, "UTF-8");


		$t = str_replace('"', '&quot;', $t);
		$von = array("ä", "ö", "ü", "ß", "Ä", "Ö", "Ü", " ", "é", "Ç", "ç");
		$zu  = array("&auml;", "&ouml;", "&uuml;", "&szlig;", "&Auml;", "&Ouml;", "&Uuml;", "&nbsp;", "&#233;", "&Ccedil;", "&ccedil;");
		$t = str_replace($zu, $von, $t);

		return $t;
	}
	return $str;
}

function admin_url($url = "")
{
	if ($url == "")
		return base_url("admin");
	else
		return base_url("admin/" . $url);
}

function admin_assets()
{
	return base_url("public/admin/");
}

function front_assets($url = "")
{
	$siteayar = siteayar()->tema;

	if ($url == "")
		return base_url("public/front/" . $siteayar);
	else
		return base_url("public/front/" . $siteayar . '/' . $url);
}

function front_folder()
{
	return base_url("public/front/");
}

function public_folder()
{
	return base_url("public");
}

function uploads_folder($url = "")
{
	if ($url == "")
		return base_url("public/uploads");
	else
		return base_url("public/uploads/" . $url);
}

function meta_refr($link, $saniye = 1)
{
	return '<meta http-equiv="refresh" content="' . $saniye . ';URL=' . $link . '">';
}

function siteayar()
{
	$ci = get_instance();

	$db_array = $ci->db->get("ayarlar");
	$func_array = array();
	foreach ($db_array->result() as $db_array) {
		$func_array[$db_array->mkey] = $db_array->mval;
	}
	return (object)$func_array;
}

function yuzde_hesapla($a, $b)
{
	if (($a / 2) == $b) {
		return 50;
	}
	$c = $a / 100;

	$yuzde = floor($b / $c);
	$indirim_yuzdesi = 100 - $yuzde;

	if($a == $b){
		$indirim_yuzdesi = 0;
	}
	return $indirim_yuzdesi;
}

function indirim_yuzdesi($a, $b)
{
	return 100 - yuzdesi_kac($a, $b);
}

function yuzdesi_kac($a, $b)
{
	$c = $a / 100;
	return ($b * $c);
}

function dmyhis($tarih)
{
	return date("d.m.Y H:i:s", strtotime($tarih));
}

function dmyhi($tarih)
{
	return date("d.m.Y H:i", strtotime($tarih));
}

function dmy($tarih)
{
	return date("d.m.Y", strtotime($tarih));
}

function tarih_hesapla($trh1, $gun)
{
	$tarih1 = new DateTime($trh1);
	$tarih2 = new DateTime("now");
	$interval = $tarih1->diff($tarih2);

	if ($interval->days <= $gun) {
		return true;
	} else {
		return false;
	}
}

function timeConvert($zaman)
{
	date_default_timezone_set('Europe/Istanbul');
	$zaman =  strtotime($zaman);
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki / 60);
	$saat = round($zaman_farki / 3600);
	$gun = round($zaman_farki / 86400);
	$hafta = round($zaman_farki / 604800);
	$ay = round($zaman_farki / 2419200);
	$yil = round($zaman_farki / 29030400);
	if ($saniye < 60) {
		if ($saniye == 0) {
			return "az önce";
		} else {
			return $saniye . ' saniye önce';
		}
	} else if ($dakika < 60) {
		return $dakika . ' dakika önce';
	} else if ($saat < 24) {
		return $saat . ' saat önce';
	} else if ($gun < 7) {
		return $gun . ' gün önce';
	} else if ($hafta < 4) {
		return $hafta . ' hafta önce';
	} else if ($ay < 12) {
		return $ay . ' ay önce';
	} else {
		return $yil . ' yıl önce';
	}
}

function dosya_kontrol($dosya_yolu)
{
	if (file_exists($dosya_yolu)) {
		return true;
	} else {
		return false;
	}
}

function resim_yukle($name, $path, $file_name, $width = 0, $height = 0)
{
	$return = array("hata" => "0", "resim_name" => "");

	$ci = get_instance();
	$config["upload_path"] = './' . $path;
	$config['allowed_types'] = '*';
	$config['overwrite'] = true;
	$config['file_name']	  = $file_name;

	$file	= explode('.', $_FILES[$name]['name']);
	$ext	= end($file);

	if ($ext != 'png' && $ext != 'jpg' &&  $ext != 'webp' && $ext != 'PNG' && $ext != 'PNG' && $ext != 'gif') {
		$return['hata'] = "Uzantı desteklenmiyor!";
		return $return;
	}

	$ci->upload->initialize($config);

	if ($ci->upload->do_upload($name)) {

		if ($width > 1) {
			$fileData = $ci->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = './' . $path . $fileData["file_name"];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE; // oranı koru
			$config['quality'] = '100';
			$config['width'] = $width;
			$config['height'] = $height;
			$config['new_image'] = './' . $path . $fileData["file_name"];
			$ci->load->library('image_lib', $config);
			$ci->image_lib->initialize($config);
			$ci->image_lib->resize();
		}

		$return["resim_name"] = $file_name . '.' . $ext;
	} else {
		$return["hata"] = $ext . " - " . $ci->upload->display_errors();
	}

	return $return;
}

function rastgele_sifre($karakter_sayisi)
{
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$password = array();
	$alpha_length = strlen($alphabet) - 1;
	for ($i = 0; $i < $karakter_sayisi; $i++) {
		$n = rand(0, $alpha_length);
		$password[] = $alphabet[$n];
	}
	return implode($password);
}

function get_ip()
{
	if (getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		if (strstr($ip, ',')) {
			$tmp = explode(',', $ip);
			$ip = trim($tmp[0]);
		}
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}
