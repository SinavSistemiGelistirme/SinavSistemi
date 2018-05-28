<?php
	$id = $_GET["id"];
	global $db;
	
	$kategori_sec = $db->prepare("SELECT * FROM kategoriler");
	$kategori_sec->execute();
	
	$ders_sec = $db->prepare("SELECT * FROM dersler INNER JOIN kategoriler ON kategoriler.kategori_id = dersler.ders_kategori_id WHERE ders_id = :ders_id");
	$ders_sec->bindParam(":ders_id", $id, PDO::PARAM_INT);
	$ders_sec->execute();
	$ders = $ders_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;DERS DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		$ders_adi		= $_POST["ders_adi"];
		$ders_aciklama	= $_POST["ders_aciklama"];
		$ders_kategori 	= $_POST["ders_kategori_id"];
		$ders_durum 	= $_POST["ders_durum"];
							
		$guncelle = $db->prepare("UPDATE dersler SET
								ders_adi = :ders_adi,
								ders_aciklama = :ders_aciklama,
								ders_kategori_id = :ders_kategori_id,
								ders_durum = :ders_durum
							WHERE ders_id = :ders_id");
							
		$guncelle->bindParam(":ders_adi", $ders_adi, PDO::PARAM_STR);					
		$guncelle->bindParam(":ders_aciklama", $ders_aciklama, PDO::PARAM_STR);					
		$guncelle->bindParam(":ders_kategori_id", $ders_kategori, PDO::PARAM_INT);					
		$guncelle->bindParam(":ders_durum", $ders_durum, PDO::PARAM_INT);
		$guncelle->bindParam(":ders_id", $id, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Ders başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=dersler'");
		}else{
			echo '<font color="red">Ders güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=dersler'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="ders_adi">Ders Adı</label>
				<input type="text" class="form-control" id="ders_adi" name="ders_adi" value="<?php echo $ders["ders_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="ders_aciklama">Ders Açıklaması</label>
				<input type="text" class="form-control" id="ders_aciklama" name="ders_aciklama" value="<?php echo $ders["ders_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="ders_kategorisi">Ders Kategorisi</label>
				<select class="form-control" id="ders_kategori_id" name="ders_kategori_id">
					<option value="<?php echo $ders["ders_kategori_id"]; ?>"><?php echo $ders["kategori_adi"]; ?></option>
					<?php
						while($kategori = $kategori_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$kategori['kategori_id'].'>'.$kategori['kategori_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="ders_durum">Ders Durumu</label>
				<select class="form-control" id="ders_durum" name="ders_durum">
				
				<?php if($ders["ders_durum"] == 1){ ?>
						<option value="<?php echo $ders["ders_durum"]; ?>">Aktif</option>
						<option value="0">Pasif</option>
				<?php }else{ ?>
						<option value="<?php echo $ders["ders_durum"]; ?>">Pasif</option>
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