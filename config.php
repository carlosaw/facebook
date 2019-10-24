<?php
require 'environment.php';

define("BASE", "http://localhost/facebook/");//facilita puxar imagens e css ext e links

global $config;
$config = array();

if(ENVIRONMENT == 'development') {
	//define("BASE_URL", "http://localhost/facebook/");
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://awregulagens.com.br/");
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

