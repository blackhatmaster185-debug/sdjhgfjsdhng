<?php
defined('BASEPATH') OR exit('Doğrudan erişime izin verilmiyor');

include('ayarlar.php');

$active_group = 'default';
$query_builder = TRUE;
  
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $db_host,
	'username' => $db_username,
	'password' => $db_sifre,
	'database' => $db_database,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
