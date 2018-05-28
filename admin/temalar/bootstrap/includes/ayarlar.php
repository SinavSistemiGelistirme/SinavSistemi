<!--- Ayarlar --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SİSTEM BİLGİLERİ</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=uye-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Sistem Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>SİSTEM ID</td>
				<td>SİSTEM URL</td>
				<td>SİSTEM ADI</td>
				<td>SİSTEM AÇIKLAMASI</td>
				<td>SİSTEM LOGOSU</td>
				<td>SİSTEM TEMASI</td>
				<td>SİSTEM DURUM</td>
				<td>SİSTEM KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$AyarBul = $db->prepare("SELECT * FROM ayarlar");
			$AyarBul->execute();
			while($Ayar = $AyarBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Ayar["sistem_id"]; ?></td>
					<td><?php echo $Ayar["sistem_url"]; ?></td>
					<td><?php echo $Ayar["sistem_adi"]; ?></td>
					<td><?php echo $Ayar["sistem_aciklama"]; ?></td>
					<td><?php echo $Ayar["sistem_logo"]; ?></td>
					<td><?php echo $Ayar["sistem_tema"]; ?></td>
					<td><?php echo $Ayar["sistem_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=ayar-duzenle" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="#" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
