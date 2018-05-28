<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KONU SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$konu_sil = $db->prepare("DELETE FROM konular WHERE konu_id = :konu_id");
			$konu_sil->bindParam(":konu_id", $id, PDO::PARAM_INT);
			$sil = $konu_sil->execute();
			
			if($sil){
				echo '<font color="green">Konu başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=konular'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=konular'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
