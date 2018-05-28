<?php
	$id = $_GET["id"];
	global $db;
	
	$kategori_sec = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id = :kategori_id");
	$kategori_sec->bindParam(":kategori_id", $id, PDO::PARAM_INT);
	$kategori_sec->execute();
	$kategori = $kategori_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KATEGORİ DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		$kategori_adi		= $_POST["kategori_adi"];
		$kategori_aciklama	= $_POST["kategori_aciklama"];
		$kategori_durum 	= $_POST["kategori_durum"];
							
		$guncelle = $db->prepare("UPDATE kategoriler SET
								kategori_adi = :kategori_adi,
								kategori_aciklama = :kategori_aciklama,
								kategori_durum = :kategori_durum
							WHERE kategori_id = :kategori_id");
							
		$guncelle->bindParam(":kategori_adi", $kategori_adi, PDO::PARAM_STR);					
		$guncelle->bindParam(":kategori_aciklama", $kategori_aciklama, PDO::PARAM_STR);				
		$guncelle->bindParam(":kategori_durum", $kategori_durum, PDO::PARAM_INT);					
		$guncelle->bindParam(":kategori_id", $id, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Kategori başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=kategoriler'");
		}else{
			echo '<font color="red">Sınıf güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=kategoriler'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="kategori_adi">Kategori Adı</label>
				<input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="Kategori Adı" value="<?php echo $kategori["kategori_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="kategori_aciklama">Kategori Açıklaması</label>
				<input type="text" class="form-control" id="kategori_aciklama" name="kategori_aciklama" placeholder="Kategori Açıklaması" value="<?php echo $kategori["kategori_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
			<label for="kategori_durum">Kategori Durumu</label>
				<select class="form-control" id="kategori_durum" name="kategori_durum">
				
				<?php if($kategori["kategori_durum"] == 1){ ?>
						<option value="<?php echo $kategori["kategori_durum"]; ?>">Aktif</option>
						<option value="0">Pasif</option>
				<?php }else{ ?>
						<option value="<?php echo $kategori["kategori_durum"]; ?>">Pasif</option>
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