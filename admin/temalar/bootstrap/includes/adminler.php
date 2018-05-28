<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;ADMİNLER</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=uye-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Admin Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<!--<td>ÜYE ID</td>-->
				<td>ÜYE KULLANICI ADI</td>
				<td>ÜYE SINIFI</td>
				<td>ÜYE KATEGORİSİ</td>
				<td>ÜYE EPOSTA</td>
				<td>ÜYE DURUM</td>
				<td>ÜYE KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$Grup = $_SESSION["Login"]["LoginUyeGrup"];
			$UyeBul = $db->prepare("SELECT * FROM uyeler INNER JOIN siniflar ON siniflar.sinif_id = uyeler.uye_sinif_id INNER JOIN kategoriler ON kategoriler.kategori_id = uyeler.uye_kategori_id WHERE uye_grup = :uye_grup ORDER BY uye_id ASC");
			$UyeBul->bindParam(":uye_grup", $Grup, PDO::PARAM_INT);
			$UyeBul->execute();
			
			
			
			while($Uye = $UyeBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<!--<td><?php echo $Uye["uye_id"]; ?></td>-->
					<td><?php echo $Uye["uye_kullanici_adi"]; ?></td>
					<td><?php echo $Uye["sinif_adi"]; ?></td>
					<td><?php echo $Uye["kategori_adi"]; ?></td>
					<td><?php echo $Uye["uye_eposta"]; ?></td>
					<td><?php echo $Uye["uye_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-success btn-xs" href="index.php?git=uye-duzenle&id=<?php echo $Uye["uye_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=uye-sil&id=<?php echo $Uye["uye_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
			<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
