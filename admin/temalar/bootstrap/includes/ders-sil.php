<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SINIF SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$ders_sil = $db->prepare("DELETE FROM dersler WHERE ders_id = :ders_id");
			$ders_sil->bindParam(":ders_id", $id, PDO::PARAM_INT);
			$sil = $ders_sil->execute();
			
			if($sil){
				echo '<font color="green">Ders başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=dersler'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=dersler'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
