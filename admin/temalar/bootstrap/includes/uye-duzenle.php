<?php
	$id = $_GET["id"];
	global $db;
	$sinif_sec = $db->prepare("SELECT * FROM siniflar");
	$sinif_sec->execute();
	
	$kategori_sec = $db->prepare("SELECT * FROM kategoriler");
	$kategori_sec->execute();
		
	$uye_sec = $db->prepare("SELECT * FROM uyeler INNER JOIN siniflar ON siniflar.sinif_id = uyeler.uye_sinif_id INNER JOIN kategoriler ON kategoriler.kategori_id = uyeler.uye_kategori_id WHERE uye_id = :uye_id");
	$uye_sec->bindParam(":uye_id", $id, PDO::PARAM_INT);
	$uye_sec->execute();
	$uye = $uye_sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;ÜYE DÜZENLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
	
		$uye_adi			= $_POST["uye_kullanici_adi"];
		$uye_eposta 		= $_POST["uye_eposta"];
		$uye_sinif_id 		= $_POST["uye_sinif_id"];
		$uye_kategori_id	= $_POST["uye_kategori_id"];
		$uye_cinsiyet 		= $_POST["uye_cinsiyet"];
		$uye_grup 			= $_POST["uye_grup"];
		$uye_durum 			= $_POST["uye_durum"];
		
		
		$guncelle = $db->prepare("UPDATE uyeler SET 
								uye_kullanici_adi = :uye_kullanici_adi,
								uye_eposta = :uye_eposta,
								uye_sinif_id = :uye_sinif_id,
								uye_kategori_id = :uye_kategori_id,
								uye_cinsiyet = :uye_cinsiyet,
								uye_grup = :uye_grup,
								uye_durum = :uye_durum
							WHERE uye_id = :uye_id");
							
		$guncelle->bindParam(":uye_id", $id, PDO::PARAM_INT);
		$guncelle->bindParam(":uye_kullanici_adi", $uye_adi, PDO::PARAM_STR);
		$guncelle->bindParam(":uye_eposta", $uye_eposta, PDO::PARAM_STR);
		$guncelle->bindParam(":uye_sinif_id", $uye_sinif_id, PDO::PARAM_INT);
		$guncelle->bindParam(":uye_kategori_id", $uye_kategori_id, PDO::PARAM_INT);
		$guncelle->bindParam(":uye_cinsiyet", $uye_cinsiyet, PDO::PARAM_INT);
		$guncelle->bindParam(":uye_grup", $uye_grup, PDO::PARAM_INT);
		$guncelle->bindParam(":uye_durum", $uye_durum, PDO::PARAM_INT);
		$guncelle->execute();
		
		if($guncelle){
			echo '<font color="green">Üye başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=uyeler'");
		}else{
			echo '<font color="red">Güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=uye-duzenle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="uye_kullanici_adi">Üye Kullanıcı Adı</label>
				<input type="text" class="form-control" id="uye_kullanici_adi" name="uye_kullanici_adi" placeholder="Üye Kullanıcı Adı" value="<?php echo $uye["uye_kullanici_adi"]; ?>">
			</div>
				
			<div class="form-group">
				<label for="uye_eposta">Üye E-posta</label>
				<input type="text" class="form-control" id="uye_eposta" name="uye_eposta" placeholder="Üye E-postası" value="<?php echo $uye["uye_eposta"]; ?>">
			</div>
			
			<div class="form-group">
			<label for="uye_sinif_id">Üye Sınıfı</label>
				<select class="form-control" id="uye_sinif_id" name="uye_sinif_id">
					<option value="<?php echo $uye["uye_sinif_id"]; ?>"><?php echo $uye["sinif_adi"]; ?></option>
					<?php
						while($sinif = $sinif_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$sinif['sinif_id'].'>'.$sinif['sinif_adi'].'</option>';
						} 
					?>
				</select>
			</div>
				
			<div class="form-group">
			<label for="uye_kategori_id">Üye Kategorisi</label>
				<select class="form-control" id="uye_kategori_id" name="uye_kategori_id">
					<option value="<?php echo $uye["uye_kategori_id"]; ?>"><?php echo $uye["kategori_adi"]; ?></option>
					<?php
						while($kategori = $kategori_sec->fetch(PDO::FETCH_ASSOC)){
							echo '<option value='.$kategori['kategori_id'].'>'.$kategori['kategori_adi'].'</option>';
						} 
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label for="uye_cinsiyet">Üye Cinsiyeti</label>
				<select class="form-control" id="uye_cinsiyet" name="uye_cinsiyet">
					
					<?php if($uye["uye_cinsiyet"] == 1){ ?>
							<option value="<?php echo $uye["uye_cinsiyet"]; ?>">Erkek</option>
							<option value="0">Kadın</option>
					<?php }else{ ?>
							<option value="<?php echo $uye["uye_cinsiyet"]; ?>">Kadın</option>
							<option value="1">Erkek</option>
					<?php } ?>
					
				</select>
			</div>
			
			<div class="form-group">
			<label for="uye_grup">Üye Grubu</label>
				<select class="form-control" id="uye_grup" name="uye_grup">
					
					<?php if($uye["uye_grup"] == 1){ ?>
							<option value="<?php echo $uye["uye_grup"]; ?>">Admin</option>
							<option value="2">Üye</option>
					<?php }else{ ?>
							<option value="<?php echo $uye["uye_grup"]; ?>">Üye</option>
							<option value="1">Admin</option>
					<?php } ?>
					
				</select>
			</div>
			
			<div class="form-group">
			<label for="uye_durum">Üye Durumu</label>
				<select class="form-control" id="uye_durum" name="uye_durum">
				
					<?php if($uye["uye_durum"] == 1){ ?>
							<option value="<?php echo $uye["uye_durum"]; ?>">Aktif</option>
							<option value="0">Pasif</option>
					<?php }else{ ?>
							<option value="<?php echo $uye["uye_durum"]; ?>">Pasif</option>
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