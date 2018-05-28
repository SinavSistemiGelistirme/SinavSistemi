<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;TEST EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	global $db;
	$konu_sec = $db->prepare("SELECT * FROM konular");
	$konu_sec->execute();

	global $db;
	if($_POST){
	
		$test_adi		= $_POST["test_adi"];
		$test_konu_id	= $_POST["test_konu_id"];
		$test_aciklama	= $_POST["test_aciklama"];
		$test_durum 	= $_POST["test_durum"];
							
		$ekle = $db->prepare("INSERT INTO testler SET
								test_adi = :test_adi,
								test_konu_id = :test_konu_id,
								test_aciklama = :test_aciklama,
								test_durum = :test_durum
							");
							
		$ekle->bindParam(":test_adi", $test_adi, PDO::PARAM_STR);					
		$ekle->bindParam(":test_konu_id", $test_konu_id, PDO::PARAM_INT);					
		$ekle->bindParam(":test_aciklama", $test_aciklama, PDO::PARAM_STR);					
		$ekle->bindParam(":test_durum", $test_durum, PDO::PARAM_INT);
		$kaydet = $ekle->execute();
		
		if($kaydet){
			echo '<font color="green">Test başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=testler'");
		}else{
			echo '<font color="red">Test ekleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=testler'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="test_adi">Test Adı</label>
				<input type="text" class="form-control" id="test_adi" name="test_adi" placeholder="Test Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="test_aciklama">Test Açıklaması</label>
				<input type="text" class="form-control" id="test_aciklama" name="test_aciklama" placeholder="Test Açıklaması" value="">
			</div>
			
			<div class="form-group">
				<label for="test_konu_id">Test Konusu</label>
				<select class="form-control" id="test_konu_id" name="test_konu_id">
				<option value="0">Konu Seçiniz</option>
					<?php
						while($konu = $konu_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$konu['konu_id'].'>'.$konu['konu_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="test_durum">Test Durumu</label>
				<select class="form-control" id="sinif_durum" name="test_durum">
					<option value="1">Aktif</option>
					<option value="0">Pasif</option>
				</select>
			</div>

		<button type="submit" class="btn btn-primary pull-right">Kaydet</button>
		</form>
		<!--- # Form # --->

<?php } ?>
	</div>
</div>
<!--- # Panel # --->