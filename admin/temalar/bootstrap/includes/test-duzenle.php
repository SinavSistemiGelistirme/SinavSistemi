<?php
	$id = $_GET["id"];
	global $db;
	
	$konu_sec = $db->prepare("SELECT * FROM konular");
	$konu_sec->execute();
	
	$test_sec = $db->prepare("SELECT * FROM testler INNER JOIN konular ON konular.konu_id = testler.test_konu_id WHERE test_id = :test_id");
	$test_sec->bindParam(":test_id", $id, PDO::PARAM_INT);
	$test_sec->execute();
	$test = $test_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;TEST DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		$test_adi		= $_POST["test_adi"];
		$test_aciklama	= $_POST["test_aciklama"];
		$test_kategori 	= $_POST["test_konu_id"];
		$test_durum 	= $_POST["test_durum"];
							
		$guncelle = $db->prepare("UPDATE testler SET
								test_adi = :test_adi,
								test_aciklama = :test_aciklama,
								test_konu_id = :test_konu_id,
								test_durum = :test_durum
							WHERE test_id = :test_id");
							
		$guncelle->bindParam(":test_adi", $test_adi, PDO::PARAM_STR);					
		$guncelle->bindParam(":test_aciklama", $test_aciklama, PDO::PARAM_STR);					
		$guncelle->bindParam(":test_konu_id", $test_kategori, PDO::PARAM_INT);					
		$guncelle->bindParam(":test_durum", $test_durum, PDO::PARAM_INT);
		$guncelle->bindParam(":test_id", $id, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Test başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=testler'");
		}else{
			echo '<font color="red">Test güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=testler'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="test_adi">Test Adı</label>
				<input type="text" class="form-control" id="test_adi" name="test_adi" value="<?php echo $test["test_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="test_aciklama">Test Açıklaması</label>
				<input type="text" class="form-control" id="test_aciklama" name="test_aciklama" value="<?php echo $test["test_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="test_kategorisi">Test Kategorisi</label>
				<select class="form-control" id="test_konu_id" name="test_konu_id">
					<option value="<?php echo $test["test_konu_id"]; ?>"><?php echo $test["konu_adi"]; ?></option>
					<?php
						while($konu = $konu_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$konu['konu_id'].'>'.$konu['konu_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="test_durum">Test Durumu</label>
				<select class="form-control" id="test_durum" name="test_durum">
				
				<?php if($test["test_durum"] == 1){ ?>
						<option value="<?php echo $test["test_durum"]; ?>">Aktif</option>
						<option value="0">Pasif</option>
				<?php }else{ ?>
						<option value="<?php echo $test["test_durum"]; ?>">Pasif</option>
						<option value="1">Aktif</option>
				<?php } ?>
			
				</select>
			</div>

		<button type="submit" class="btn btn-primary pull-right">Kaydet</button>
		</form>
		<!--- # Form # --->

<?php } ?>
	</div>
</div>
<!--- # Panel # --->