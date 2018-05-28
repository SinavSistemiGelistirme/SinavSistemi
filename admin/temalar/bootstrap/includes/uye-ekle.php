<!--- Panel --->
<?php

	global $db;
	$sinif_sec = $db->prepare("SELECT * FROM siniflar");
	$sinif_sec->execute();
	
	$kategori_sec = $db->prepare("SELECT * FROM kategoriler");
	$kategori_sec->execute();
	
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;ÜYE EKLEME FORMU</h4>
	</div>
	<div class="panel-body">
<?php

	if($_POST){
	
		/*function $param) {
			return mysql_real_escape_string($param);
		}
		...);*/

		$uye_adi			= $_POST["uye_kullanici_adi"];
		$uye_sifre 			= md5($_POST["uye_sifre"]);
		$uye_eposta 		= $_POST["uye_eposta"];
		$uye_sinif_id 		= $_POST["uye_sinif_id"];
		$uye_kategori_id	= $_POST["uye_kategori_id"];
		$uye_cinsiyet 		= $_POST["uye_cinsiyet"];
		$uye_grup 			= $_POST["uye_grup"];
		$uye_durum 			= $_POST["uye_durum"];
		
							
		$ekle = $db->prepare("INSERT INTO uyeler SET
								uye_kullanici_adi = :uye_kullanici_adi,
								uye_sifre = :uye_sifre,
								uye_eposta = :uye_eposta,
								uye_sinif_id = :uye_sinif_id,
								uye_kategori_id = :uye_kategori_id,
								uye_cinsiyet = :uye_cinsiyet,
								uye_grup = :uye_grup,
								uye_durum = :uye_durum
							");
		
		$ekle->bindParam(":uye_kullanici_adi", $uye_adi, PDO::PARAM_STR);
		$ekle->bindParam(":uye_sifre", $uye_sifre, PDO::PARAM_STR);
		$ekle->bindParam(":uye_eposta", $uye_eposta, PDO::PARAM_STR);
		$ekle->bindParam(":uye_sinif_id", $uye_sinif_id, PDO::PARAM_INT);
		$ekle->bindParam(":uye_kategori_id", $uye_kategori_id, PDO::PARAM_INT);
		$ekle->bindParam(":uye_cinsiyet", $uye_cinsiyet, PDO::PARAM_INT);
		$ekle->bindParam(":uye_grup", $uye_grup, PDO::PARAM_INT);
		$ekle->bindParam(":uye_durum", $uye_durum, PDO::PARAM_INT);
		$kaydet = $ekle->execute();
		
		if($kaydet){
			echo '<font color="green">Üye başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=uyeler'");
		}else{
			echo '<font color="red">Kaydetme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=uye-ekle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="uye_kullanici_adi">Üye Kullanıcı Adı</label>
				<input type="text" class="form-control" id="uye_kullanici_adi" name="uye_kullanici_adi" placeholder="Üye Kullanıcı Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="uye_sifre">Üye Şifresi</label>
				<input type="text" class="form-control" id="uye_sifre" name="uye_sifre" placeholder="Üye Şifresi" value="">
			</div>
			
			<div class="form-group">
				<label for="uye_eposta">Üye E-posta</label>
				<input type="text" class="form-control" id="uye_eposta" name="uye_eposta" placeholder="Üye E-postası" value="">
			</div>
			
			<div class="form-group">
			<label for="uye_sinif_id">Üye Sınıfı</label>
				<select class="form-control" id="uye_sinif_id" name="uye_sinif_id">
					<option value="0">Sınıf Seçiniz</option>
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
					<option value="0">Kategori Seçiniz</option>
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
					<option value="0">Cinsiyet Seçiniz</option>
					<option value="1">Erkek</option>
					<option value="2">Kadın</option>
				</select>
			</div>
			
			<div class="form-group">
			<label for="uye_grup">Üye Grubu</label>
				<select class="form-control" id="uye_grup" name="uye_grup">
					<option value="0">Grup Seçiniz</option>
					<option value="1">Admin</option>
					<option value="2">Mod</option>
				</select>
			</div>
			
			<div class="form-group">
			<label for="uye_durum">Üye Durumu</label>
				<select class="form-control" id="uye_durum" name="uye_durum">
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