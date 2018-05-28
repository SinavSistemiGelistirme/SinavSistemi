<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KATEGORİ EKLEME FORMU</h4>
	</div>
	<div class="panel-body">

<?php
	
	global $db;
	if($_POST){
	
		$kategori_adi		= $_POST["kategori_adi"];
		$kategori_aciklama	= $_POST["kategori_aciklama"];
		$kategori_durum 	= $_POST["kategori_durum"];
							
		$ekle = $db->prepare("INSERT INTO kategoriler SET
								kategori_adi = :kategori_adi,
								kategori_aciklama = :kategori_aciklama,
								kategori_durum = :kategori_durum
							");
		$ekle->bindParam(":kategori_adi", $kategori_adi, PDO::PARAM_STR);
		$ekle->bindParam(":kategori_aciklama", $kategori_aciklama, PDO::PARAM_STR);
		$ekle->bindParam(":kategori_durum", $kategori_durum, PDO::PARAM_INT);
		$kaydet = $ekle->execute();
		
		if($kaydet){
			echo '<font color="green">Kategori başarıyla kaydedildi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=kategoriler'");
		}else{
			echo '<font color="red">Kategori ekleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=kategori-ekle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="kategori_adi">Kategori Adı</label>
				<input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="Kategori Adı" value="">
			</div>
			
			<div class="form-group">
				<label for="kategori_aciklama">Kategori Açıklaması</label>
				<input type="text" class="form-control" id="kategori_aciklama" name="kategori_aciklama" placeholder="Kategori Açıklaması" value="">
			</div>
			
			<div class="form-group">
			<label for="kategori_durum">Kategori Durumu</label>
				<select class="form-control" id="kategori_durum" name="kategori_durum">
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