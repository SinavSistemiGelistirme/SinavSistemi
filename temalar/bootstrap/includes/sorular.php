<div class="panel panel-default">
	<div class="panel-heading"><h4 class="text-center" style="margin:3px 0 0 0"><?php echo $testadi["test_adi"]." SORULARI"; ?></h4></div>
</div>

<?php while($soru = $soru_sec->fetch(PDO::FETCH_ASSOC)){ ?>	
<form id="SoruFormu" action="index.php?git=sonuc&id=<?php echo $soru["test_id"]; ?>" method="post">
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo "<b>SORU ".$soru["soru_no"]."</b>" ?></div>
		<div class="panel-body">
			<p><?php echo $soru["soru_metin"]; ?></p>
		</div>
			<ul class="list-group">

				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap[<?php echo $soru["soru_no"]; ?>]" id="<?php echo $soru["soru_no"]."-"; ?>secenek-a" value="A">
						<label for="<?php echo $soru["soru_no"]."-"; ?>secenek-a">A) <font style="font-weight:normal"><?php echo $soru["soru_secenek_a"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap[<?php echo $soru["soru_no"]; ?>]" id="<?php echo $soru["soru_no"]."-"; ?>secenek-b" value="B">
						<label for="<?php echo $soru["soru_no"]."-"; ?>secenek-b">B) <font style="font-weight:normal"><?php echo $soru["soru_secenek_b"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap[<?php echo $soru["soru_no"]; ?>]" id="<?php echo $soru["soru_no"]."-"; ?>secenek-c" value="C">
						<label for="<?php echo $soru["soru_no"]."-"; ?>secenek-c">C) <font style="font-weight:normal"><?php echo $soru["soru_secenek_c"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap[<?php echo $soru["soru_no"]; ?>]" id="<?php echo $soru["soru_no"]."-"; ?>secenek-d" value="D">
						<label for="<?php echo $soru["soru_no"]."-"; ?>secenek-d">D) <font style="font-weight:normal"><?php echo $soru["soru_secenek_d"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap[<?php echo $soru["soru_no"]; ?>]" id="<?php echo $soru["soru_no"]."-"; ?>secenek-e" value="E">
						<label for="<?php echo $soru["soru_no"]."-"; ?>secenek-e">E) <font style="font-weight:normal"><?php echo $soru["soru_secenek_e"]; ?></font></label>
					</div>
				</li>
			
			</ul>
	</div>
		
<?php } ?>

<input class="btn btn-primary" type="submit" value="Testi Bitir" style="display:block!important; width:750px; margin-bottom:40px">
</form>