<?php
	session_start();
	ob_start();

	header("Content-Type: text/html; charset=utf-8");

	### Hataları Gizle ###
	error_reporting(0);

	### Bağlantı Değişkenleri ###
	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "";
	$dbase 	= "sinav";

	### MySql Bağlantısı ###
	try{
		$db = new PDO("mysql:host=$host;dbname=$dbase;charset=utf8", $user, $pass);
		$db->query("SET CHARACTER SET utf8");
		$db->query("SET NAMES utf8");
		
		### Genel Ayarlar ###
		$ayarbul = $db->prepare("SELECT * FROM ayarlar");
		$ayarbul->execute();
		$ayar = $ayarbul->fetch(PDO::FETCH_ASSOC);
		
		define("SISTEM_URL", $ayar["sistem_url"]);
		define("SISTEM_DURUM", $ayar["sistem_durum"]);
		define("TEMA_URL", "temalar/".$ayar["sistem_tema"]);
		define("TEMA", $ayar["sistem_tema"]);

	}catch(PDOException $e){
		echo "Bağlantı sağlanamadı!<br>".$e->getMessage();
	}

?>