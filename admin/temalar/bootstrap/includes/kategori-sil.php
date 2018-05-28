<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KATEGORİ SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$kategori_sil = $db->prepare("DELETE FROM kategoriler WHERE kategori_id = :kategori_id");
			$kategori_sil->bindParam(":kategori_id", $id, PDO::PARAM_INT);
			$sil = $kategori_sil->execute();
			
			if($sil){
				echo '<font color="green">Kategori başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=kategoriler'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=kategoriler'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
