<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SINIFLAR</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=sinif-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Sınıf Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>SINIF ID</td>
				<td>SINIF ADI</td>
				<td>SINIF AÇIKLAMASI</td>
				<td>SINIF ŞUBESİ</td>
				<td>SINIF DURUMU</td>
				<td>SINIF KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$SinifBul = $db->prepare("SELECT * FROM siniflar");
			$SinifBul->execute();
			while($Sinif = $SinifBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Sinif["sinif_id"]; ?></td>
					<td><?php echo $Sinif["sinif_adi"]; ?></td>
					<td><?php echo $Sinif["sinif_aciklama"]; ?></td>
					<td><?php echo $Sinif["sinif_subesi"]; ?></td>
					<td><?php echo $Sinif["sinif_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=sinif-duzenle&id=<?php echo $Sinif["sinif_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=sinif-sil&id=<?php echo $Sinif["sinif_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
