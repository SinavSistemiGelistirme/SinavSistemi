<?php

	### Bilgilendirme Fonksiyonu ###
	function Bilgi($Baslik, $Mesaj, $Tipi="hata"){
		
		 // Uyarı tipi
		switch ($Tipi){
			case 'basarili': $Sinif = 'success'; $Icon = 'check-circle'; break;
			case 'hata':     $Sinif = 'danger';  $Icon = 'times-circle'; break;
			case 'uyari':    $Sinif = 'warning'; $Icon = 'exclamation-circle'; break;
			case 'bilgi':    $Sinif = 'info';    $Icon = 'info-circle'; break;
			default:         $Sinif = 'hata';    $Icon = 'times-circle'; break;
		}
		
		echo "<div class='alert alert-{$Sinif}' role='alert'><strong><i class='fa fa-{$Icon}' style='margin-right: 5px'></i>{$Baslik}</strong><br/>{$Mesaj}</div>";
	}

?>