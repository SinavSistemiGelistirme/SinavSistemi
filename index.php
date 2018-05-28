<?php

	require_once("sistem/ayar.php");
	require_once("sistem/fonksiyon.php");
	require_once("sistem/sistem.php");

	if( SISTEM_DURUM == 1 ){
		require(TEMA_URL."/index.php");
	}else{
		require(TEMA_URL."/kapali.php");
	}
	
?>