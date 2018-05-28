<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SORU SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$soru_sil = $db->prepare("DELETE FROM sorular WHERE soru_id = :soru_id");
			$soru_sil->bindParam(":soru_id", $id, PDO::PARAM_INT);
			$sil = $soru_sil->execute();
			
			if($sil){
				echo '<font color="green">Soru başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=sorular'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=sorular'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
