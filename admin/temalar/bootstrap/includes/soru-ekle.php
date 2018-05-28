<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SORU EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	global $db;

	$test_sec = $db->prepare("SELECT * FROM testler");
	$test_sec->execute();
	
	if($_POST){
		
		$soru_test_id 		= $_POST["soru_test_id"];
		$soru_no 			= $_POST["soru_no"];
		$soru_metin 		= $_POST["soru_metin"];
		$soru_secenek_a 	= $_POST["soru_secenek_a"];
		$soru_secenek_b 	= $_POST["soru_secenek_b"];
		$soru_secenek_c 	= $_POST["soru_secenek_c"];
		$soru_secenek_d 	= $_POST["soru_secenek_d"];
		$soru_secenek_e 	= $_POST["soru_secenek_e"];
		$soru_dogru_cevap 	= $_POST["soru_dogru_cevap"];
		$soru_durum 		= $_POST["soru_durum"];
		
							
		$kayit = $db->prepare("INSERT INTO sorular SET
									soru_test_id = :soru_test_id,
									soru_no = :soru_no,
									soru_metin = :soru_metin,
									soru_secenek_a = :soru_secenek_a,
									soru_secenek_b = :soru_secenek_b,
									soru_secenek_c = :soru_secenek_c,
									soru_secenek_d = :soru_secenek_d,
									soru_secenek_e = :soru_secenek_e,
									soru_dogru_cevap = :soru_dogru_cevap,
									soru_durum = :soru_durum
								");
		
		$kayit->bindParam(":soru_test_id", $soru_test_id, PDO::PARAM_INT);						
		$kayit->bindParam(":soru_no", $soru_no, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_metin", $soru_metin, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_secenek_a", $soru_secenek_a, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_secenek_b", $soru_secenek_b, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_secenek_c", $soru_secenek_c, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_secenek_d", $soru_secenek_d, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_secenek_e", $soru_secenek_e, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_dogru_cevap", $soru_dogru_cevap, PDO::PARAM_STR);						
		$kayit->bindParam(":soru_durum", $soru_durum, PDO::PARAM_INT);
		$kaydet = $kayit->execute();
		
		
		if($kaydet){
			echo '<font color="green">Soru başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=sorular'");
		}else{
			echo '<font color="red">Soru ekleme başarısız oldu!</font><br>';
			header("Refresh:2; url='index.php?git=sorular'");
		}
	
	}else{ ?>
	
		<!--- Form --->
		
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="soru_test_id">Soru Test ID</label>
				<select class="form-control" id="soru_test_id" name="soru_test_id">
					<option value="0">Test Seçiniz</option>
					<?php
						while($test = $test_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$test['test_id'].'>'.$test['test_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="soru_no">Soru No</label>
				<input type="text" class="form-control" id="soru_no" name="soru_no" placeholder="Soru No" value="">
			</div>
			
			<div class="form-group">
				<label for="soru_metin">Soru Metin</label>
				<textarea class="form-control" rows="3" id="soru_metin" name="soru_metin" placeholder="Soru Metin" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_secenek_a">Soru Seçenek A</label>
				<textarea class="form-control" rows="3" id="soru_secenek_a" name="soru_secenek_a" placeholder="Soru Seçenek A" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_secenek_b">Soru Seçenek B</label>
				<textarea class="form-control" rows="3" id="soru_secenek_b" name="soru_secenek_b" placeholder="Soru Seçenek B" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_secenek_c">Soru Seçenek C</label>
				<textarea class="form-control" rows="3" id="soru_secenek_c" name="soru_secenek_c" placeholder="Soru Seçenek C" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_secenek_d">Soru Seçenek D</label>
				<textarea class="form-control" rows="3" id="soru_secenek_d" name="soru_secenek_d" placeholder="Soru Seçenek D" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_secenek_e">Soru Seçenek E</label>
				<textarea class="form-control" rows="3" id="soru_secenek_e" name="soru_secenek_e" placeholder="Soru Seçenek E" value=""></textarea>
			</div>
			
			<div class="form-group">
				<label for="soru_dogru_cevap">Soru Doğru Cevap</label>
				<input type="text" class="form-control" id="soru_dogru_cevap" name="soru_dogru_cevap" placeholder="Soru Doğru Cevap" value="">
			</div>
			
			<div class="form-group">
			<label for="soru_durum">Soru Durumu</label>
				<select class="form-control" id="soru_durum" name="soru_durum">
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