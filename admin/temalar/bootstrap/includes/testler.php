<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;TESTLER</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=test-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Test Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>TEST KONU ID</td>
				<td>TEST ADI</td>
				<td>TEST AÇIKLAMASI</td>
				<td>TEST DURUMU</td>
				<td>TEST KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$TestBul = $db->prepare("SELECT * FROM testler INNER JOIN konular ON konular.konu_id = testler.test_konu_id");
			$TestBul->execute();
			while($Test = $TestBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Test["test_adi"]; ?></td>
					<td><?php echo $Test["konu_adi"]; ?></td>
					<td><?php echo $Test["test_aciklama"]; ?></td>
					<td><?php echo $Test["test_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=test-duzenle&id=<?php echo $Test["test_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=test-sil&id=<?php echo $Test["test_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->
