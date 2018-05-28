<?php
	$id = $_GET["id"];
	global $db;
	
	$ders_sec = $db->prepare("SELECT * FROM dersler");
	$ders_sec->execute();
	
	$konu_sec = $db->prepare("SELECT * FROM konular INNER JOIN dersler ON dersler.ders_id = konular.konu_ders_id WHERE konu_id = :konu_id");
	$konu_sec->bindParam(":konu_id", $id, PDO::PARAM_INT);
	$konu_sec->execute();
	$konu = $konu_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KONU DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		$konu_adi		= $_POST["konu_adi"];
		$konu_aciklama	= $_POST["konu_aciklama"];
		$konu_kategori 	= $_POST["konu_ders_id"];
		$konu_durum 	= $_POST["konu_durum"];
							
		$guncelle = $db->prepare("UPDATE konular SET
								konu_adi = :konu_adi,
								konu_aciklama = :konu_aciklama,
								konu_ders_id = :konu_ders_id,
								konu_durum = :konu_durum
							WHERE konu_id = :konu_id");
							
		$guncelle->bindParam(":konu_adi", $konu_adi, PDO::PARAM_STR);					
		$guncelle->bindParam(":konu_aciklama", $konu_aciklama, PDO::PARAM_STR);					
		$guncelle->bindParam(":konu_ders_id", $konu_kategori, PDO::PARAM_INT);					
		$guncelle->bindParam(":konu_durum", $konu_durum, PDO::PARAM_INT);
		$guncelle->bindParam(":konu_id", $id, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Konu başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=konular'");
		}else{
			echo '<font color="red">Konu güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=konular'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="konu_adi">Konu Adı</label>
				<input type="text" class="form-control" id="konu_adi" name="konu_adi" value="<?php echo $konu["konu_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="konu_aciklama">Konu Açıklaması</label>
				<input type="text" class="form-control" id="konu_aciklama" name="konu_aciklama" value="<?php echo $konu["konu_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="konu_kategorisi">Konu Kategorisi</label>
				<select class="form-control" id="konu_ders_id" name="konu_ders_id">
					<option value="<?php echo $konu["konu_ders_id"]; ?>"><?php echo $konu["ders_adi"]; ?></option>
					<?php
						while($ders = $ders_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$ders['ders_id'].'>'.$ders['ders_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="konu_durum">Ders Durumu</label>
				<select class="form-control" id="konu_durum" name="konu_durum">
				
				<?php if($konu["konu_durum"] == 1){ ?>
						<option value="<?php echo $konu["konu_durum"]; ?>">Aktif</option>
						<option value="0">Pasif</option>
				<?php }else{ ?>
						<option value="<?php echo $konu["konu_durum"]; ?>">Pasif</option>
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