<!--- Sınıf Sil --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;TEST SİL</h4>
	</div>
	<div class="panel-body">
		
		<?php
			$id = $_GET["id"];
			global $db;
		
			$test_sil = $db->prepare("DELETE FROM testler WHERE test_id = :test_id");
			$test_sil->bindParam(":test_id", $id, PDO::PARAM_INT);
			$sil = $test_sil->execute();
			
			if($sil){
				echo '<font color="green">Test başarıyla silindi, yönlendiriliyorsunuz!</font>';
				header("Refresh:2; url='index.php?git=testler'");
			}else{
				echo '<font color="red">Silme başarısız oldu!</font>';
				header("Refresh:2; url='index.php?git=testler'");
			}
		?>
		
	</div>
</div>
<!--# Sınıf Sil #-->
