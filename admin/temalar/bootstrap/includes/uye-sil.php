<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;ÜYE SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			
			$id = $_GET["id"];
			global $db;
		
			$uye_sil = $db->prepare("DELETE FROM uyeler WHERE uye_id = :uye_id");
			$uye_sil->bindParam(":uye_id", $id, PDO::PARAM_INT);
			$sil = $uye_sil->execute();
			
			if($sil){
				echo '<font color="green">Üye başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=uyeler'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=uyeler'");
			}
		?>
		
	</div>
</div>
<!--- # Üyeler # --->
