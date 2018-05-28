<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SINIF EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
		
		global $db;
	
		$sinif_adi		= $_POST["sinif_adi"];
		$sinif_aciklama	= $_POST["sinif_aciklama"];
		$sinif_subesi 	= $_POST["sinif_subesi"];
		$sinif_durum 	= $_POST["sinif_durum"];
							
		$sinif_ekle = $db->prepare("INSERT INTO siniflar SET
									sinif_adi = :sinif_adi,
									sinif_aciklama = :sinif_aciklama,
									sinif_subesi = :sinif_subesi,
									sinif_durum = :sinif_durum
								");
							
		$sinif_ekle->bindParam(":sinif_adi", $sinif_adi, PDO::PARAM_STR);
		$sinif_ekle->bindParam(":sinif_aciklama", $sinif_aciklama, PDO::PARAM_STR);
		$sinif_ekle->bindParam(":sinif_subesi", $sinif_subesi, PDO::PARAM_STR);
		$sinif_ekle->bindParam(":sinif_durum", $sinif_durum, PDO::PARAM_INT);
		$ekle = $sinif_ekle->execute();
		
		if($ekle){
			echo '<font color="green">Sınıf başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=siniflar'");
		}else{
			echo '<font color="red">Sınıf ekleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=sinif-ekle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="sinif_adi">Sınıf Adı</label>
				<input type="text" class="form-control" id="sinif_adi" name="sinif_adi" placeholder="Sınıf Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="sinif_aciklama">Sınıf Açıklaması</label>
				<input type="text" class="form-control" id="sinif_aciklama" name="sinif_aciklama" placeholder="Sınıf Açıklaması" value="">
			</div>
			
			<div class="form-group">
				<label for="sinif_subesi">Sınıf Şubesi</label>
				<input type="text" class="form-control" id="sinif_subesi" name="sinif_subesi" placeholder="Sınıf Şubesi" value="">
			</div>
			
			<div class="form-group">
			<label for="sinif_durum">Sınıf Durumu</label>
				<select class="form-control" id="sinif_durum" name="sinif_durum">
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