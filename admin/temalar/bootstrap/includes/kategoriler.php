<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KATEGORİLER</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=kategori-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Kategori Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>KATEGORİ ID</td>
				<td>KATEGORİ ADI</td>
				<td>KATEGORİ AÇIKLAMASI</td>
				<td>KATEGORİ DURUMU</td>
				<td>KATEGORİ KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$KategoriBul = $db->prepare("SELECT * FROM kategoriler");
			$KategoriBul->execute();
			while($Kategori = $KategoriBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Kategori["kategori_id"]; ?></td>
					<td><?php echo $Kategori["kategori_adi"]; ?></td>
					<td><?php echo $Kategori["kategori_aciklama"]; ?></td>
					<td><?php echo $Kategori["kategori_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=kategori-duzenle&id=<?php echo $Kategori["kategori_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=kategori-sil&id=<?php echo $Kategori["kategori_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
