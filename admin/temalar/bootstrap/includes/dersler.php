<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;DERSLER</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=ders-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Ders Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>DERS ID</td>
				<td>DERS ADI</td>
				<td>DERS KATEGORİSİ</td>
				<td>DERS AÇIKLAMASI</td>
				<td>DERS DURUMU</td>
				<td>DERS KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$DersBul = $db->prepare("SELECT * FROM dersler INNER JOIN kategoriler ON kategoriler.kategori_id = dersler.ders_kategori_id");
			$DersBul->execute();
			while($Ders = $DersBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Ders["ders_id"]; ?></td>
					<td><?php echo $Ders["ders_adi"]; ?></td>
					<td><?php echo $Ders["kategori_adi"]; ?></td>
					<td><?php echo $Ders["ders_aciklama"]; ?></td>
					<td><?php echo $Ders["ders_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=ders-duzenle&id=<?php echo $Ders["ders_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=ders-sil&id=<?php echo $Ders["ders_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
