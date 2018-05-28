<?php

	global $db;	
	$kategori_sec = $db->prepare("SELECT * FROM kategoriler");
	$kategori_sec->execute();

?>
<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;DERS EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php
	
	
	if($_POST){
	
		$ders_adi			= $_POST["ders_adi"];
		$ders_kategori_id	= $_POST["ders_kategori_id"];
		$ders_aciklama		= $_POST["ders_aciklama"];
		$ders_durum 		= $_POST["ders_durum"];
							
		$ekle = $db->prepare("INSERT INTO dersler SET
								ders_adi = :ders_adi,
								ders_kategori_id = :ders_kategori_id,
								ders_aciklama = :ders_aciklama,
								ders_durum = :ders_durum
							");
		
		$ekle->bindParam(":ders_adi", $ders_adi, PDO::PARAM_STR);
		$ekle->bindParam(":ders_kategori_id", $ders_kategori_id, PDO::PARAM_INT);
		$ekle->bindParam(":ders_aciklama", $ders_aciklama, PDO::PARAM_STR);
		$ekle->bindParam(":ders_durum", $ders_durum, PDO::PARAM_INT);
		$kaydet = $ekle->execute();
		
		if($kaydet){
			echo '<font color="green">Ders başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=dersler'");
		}else{
			echo '<font color="red">Ders ekleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=ders-ekle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="ders_adi">Ders Adı</label>
				<input type="text" class="form-control" id="ders_adi" name="ders_adi" placeholder="Ders Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="ders_aciklama">Ders Açıklaması</label>
				<input type="text" class="form-control" id="ders_aciklama" name="ders_aciklama" placeholder="Ders Açıklaması" value="">
			</div>
			
			<div class="form-group">
				<label for="ders_kategori_id">Ders Kategorisi</label>
				<select class="form-control" id="ders_kategori_id" name="ders_kategori_id">
					<option value="0">Kategori Seçiniz</option>
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