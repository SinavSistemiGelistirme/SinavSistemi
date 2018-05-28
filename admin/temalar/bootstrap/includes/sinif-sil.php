<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SINIF SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$sinif_sil = $db->prepare("DELETE FROM siniflar WHERE sinif_id = :sinif_id");
			$sinif_sil->bindParam(":sinif_id", $id, PDO::PARAM_INT);
			$sil = $sinif_sil->execute();
			
			if($sil){
				echo '<font color="green">Sınıf başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=siniflar'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=siniflar'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
