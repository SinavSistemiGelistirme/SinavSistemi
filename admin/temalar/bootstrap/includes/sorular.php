<!--- Üyeler --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="pull-left" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SORULAR</h4>
		<h4 class="pull-right" style="margin:3px 0 0 0"><a href="index.php?git=soru-ekle" class="UyeEkle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Soru Ekle</a></h4>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<!--- Tablo --->
		<table class="table table-responsive table-bordered table-hover">
			<tr>
				<td>TEST ADI</td>
				<td>TEST AÇIKLAMASI</td>
				<td>TEST KONTROL</td>
			</tr>
			
		<?php
			global $db;
			$TestBul = $db->prepare("SELECT * FROM testler");
			$TestBul->execute();
			while($Test = $TestBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<td><?php echo $Test["test_adi"]; ?></td>
					<td><?php echo $Test["test_aciklama"]; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=test-sorular&id=<?php echo $Test["test_id"]; ?>" role="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;Soruları Gör</a>
					</td>
				</tr>	
		<?php } ?>
		
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->

