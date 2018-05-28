<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KONU EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php
	
	global $db;
	$ders_sec = $db->prepare("SELECT * FROM dersler");
	$ders_sec->execute();

	if($_POST){
	
		$konu_adi		= $_POST["konu_adi"];
		$konu_ders_id	= $_POST["konu_ders_id"];
		$konu_aciklama	= $_POST["konu_aciklama"];
		$konu_durum 	= $_POST["konu_durum"];
							
		$ekle = $db->prepare("INSERT INTO konular SET
								konu_adi = :konu_adi,
								konu_ders_id = :konu_ders_id,
								konu_aciklama = :konu_aciklama,
								konu_durum = :konu_durum
							");
		
		$ekle->bindParam(":konu_adi", $konu_adi, PDO::PARAM_STR);
		$ekle->bindParam(":konu_ders_id", $konu_ders_id, PDO::PARAM_INT);
		$ekle->bindParam(":konu_aciklama", $konu_aciklama, PDO::PARAM_STR);
		$ekle->bindParam(":konu_durum", $konu_durum, PDO::PARAM_INT);
		$kaydet = $ekle->execute();
		
		
		if($kaydet){
			echo '<font color="green">Konu başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=konular'");
		}else{
			echo '<font color="red">Konu ekleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=konular'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="konu_adi">Konu Adı</label>
				<input type="text" class="form-control" id="konu_adi" name="konu_adi" placeholder="Konu Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="konu_aciklama">Konu Açıklaması</label>
				<input type="text" class="form-control" id="konu_aciklama" name="konu_aciklama" placeholder="Konu Açıklaması" value="">
			</div>
			
			<div class="form-group">
				<label for="konu_ders_id">Konu Kategorisi</label>
				<select class="form-control" id="konu_ders_id" name="konu_ders_id">
					<option value="0">Ders Seçiniz</option>
					<?php
						while($ders = $ders_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$ders['ders_id'].'>'.$ders['ders_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="konu_durum">Konu Durumu</label>
				<select class="form-control" id="konu_durum" name="konu_durum">
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