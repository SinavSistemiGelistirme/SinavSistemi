<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;KONULAR</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=konu-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Konu Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>KONU ADI</td>
				<td>KONU DERS ADI</td>
				<td>KONU AÇIKLAMASI</td>
				<td>KONU DURUMU</td>
				<td>KONU KONTROL</td>
			</tr>
			
		<?php
		
			global $db;
			$KonuBul = $db->prepare("SELECT * FROM konular INNER JOIN dersler ON dersler.ders_id = konular.konu_ders_id");
			$KonuBul->execute();
			while($Konu = $KonuBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Konu["konu_adi"]; ?></td>
					<td><?php echo $Konu["ders_adi"]; ?></td>
					<td><?php echo $Konu["konu_aciklama"]; ?></td>
					<td><?php echo $Konu["konu_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=konu-duzenle&id=<?php echo $Konu["konu_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=konu-sil&id=<?php echo $Konu["konu_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
