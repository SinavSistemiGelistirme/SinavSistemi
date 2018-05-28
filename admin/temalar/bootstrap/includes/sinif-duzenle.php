<?php
	$id = $_GET["id"];
	global $db;
	
	$sinif_sec = $db->prepare("SELECT * FROM siniflar WHERE sinif_id = :sinif_id");
	$sinif_sec->bindParam(":sinif_id", $id, PDO::PARAM_INT);
	$sinif_sec->execute();
	$sinif = $sinif_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SINIF DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		$sinif_adi		= $_POST["sinif_adi"];
		$sinif_aciklama	= $_POST["sinif_aciklama"];
		$sinif_subesi 	= $_POST["sinif_subesi"];
		$sinif_durum 	= $_POST["sinif_durum"];
							
		$guncelle = $db->prepare("UPDATE siniflar SET
								sinif_adi = :sinif_adi,
								sinif_aciklama = :sinif_aciklama,
								sinif_subesi = :sinif_subesi,
								sinif_durum = :sinif_durum
							WHERE sinif_id = :sinif_id");
							
		$guncelle->bindParam(":sinif_adi", $sinif_adi, PDO::PARAM_STR);					
		$guncelle->bindParam(":sinif_aciklama", $sinif_aciklama, PDO::PARAM_STR);					
		$guncelle->bindParam(":sinif_subesi", $sinif_subesi, PDO::PARAM_STR);					
		$guncelle->bindParam(":sinif_durum", $sinif_durum, PDO::PARAM_INT);					
		$guncelle->bindParam(":sinif_id", $id, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Sınıf başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=siniflar'");
		}else{
			echo '<font color="red">Sınıf güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=sinif-duzenle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="sinif_adi">Sınıf Adı</label>
				<input type="text" class="form-control" id="sinif_adi" name="sinif_adi" value="<?php echo $sinif["sinif_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sinif_aciklama">Sınıf Açıklaması</label>
				<input type="text" class="form-control" id="sinif_aciklama" name="sinif_aciklama" value="<?php echo $sinif["sinif_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sinif_subesi">Sınıf Şubesi</label>
				<input type="text" class="form-control" id="sinif_subesi" name="sinif_subesi" value="<?php echo $sinif["sinif_subesi"]; ?>">
			</div>
			
			<div class="form-group">
			<label for="sinif_durum">Sınıf Durumu</label>
				<select class="form-control" id="sinif_durum" name="sinif_durum">
				
				<?php if($sinif["sinif_durum"] == 1){ ?>
						<option value="<?php echo $sinif["sinif_durum"]; ?>">Aktif</option>
						<option value="0">Pasif</option>
				<?php }else{ ?>
						<option value="<?php echo $sinif["sinif_durum"]; ?>">Pasif</option>
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