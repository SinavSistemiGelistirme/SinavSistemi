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
			<thead>
			<tr>
				<!--<td>SORU ID</td>
				<td>SORU TEST ID</td>-->
				<th>SORU NO</th>
				<th>SORU METİN</th>
				<th>SORU SEÇENEK A</th>
				<th>SORU SEÇENEK B</th>
				<th>SORU SEÇENEK C</th>
				<th>SORU SEÇENEK D</th>
				<th>SORU SEÇENEK E</th>
				<th>SORU DOĞRU CEVAP</th>
				<th>SORU DURUMU</td>
				<th style="width:132px">SORU KONTROL</td>
			</tr>
			</thead>
			<tbody>
			
		<?php
			$id = $_GET["id"];
			global $db;
			$SoruBul = $db->prepare("SELECT * FROM sorular WHERE soru_test_id = :id");
			$SoruBul->bindParam(":id", $id, PDO::PARAM_INT);
			$SoruBul->execute();
			while($Soru = $SoruBul->fetch(PDO::FETCH_ASSOC)){ ?>
				<tr>
					<!--<td><?php //echo $Soru["soru_id"]; ?></td>
					<td><?php //echo $Soru["soru_test_id"]; ?></td>-->
					<td><?php echo $Soru["soru_no"]; ?></td>
					<td><?php echo $Soru["soru_metin"]; ?></td>
					<td><?php echo $Soru["soru_secenek_a"]; ?></td>
					<td><?php echo $Soru["soru_secenek_b"]; ?></td>
					<td><?php echo $Soru["soru_secenek_c"]; ?></td>
					<td><?php echo $Soru["soru_secenek_d"]; ?></td>
					<td><?php echo $Soru["soru_secenek_e"]; ?></td>
					<td><?php echo $Soru["soru_dogru_cevap"]; ?></td>
					<td><?php echo $Soru["soru_durum"] == 1 ? 'Aktif' : 'Pasif'; ?></td>
					<td>
						<a class="btn btn-info btn-xs" href="index.php?git=soru-duzenle&id=<?php echo $Soru["soru_id"]; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Düzenle</a>
						<a class="btn btn-danger btn-xs" href="index.php?git=soru-sil&id=<?php echo $Soru["soru_id"]; ?>" role="button"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Sil</a>
					</td>
				</tr>	
		<?php } ?>
		
		</tbody>
		</table>
		<!--- # Tablo # --->
	</div>
</div>
<!--- # Üyeler # --->