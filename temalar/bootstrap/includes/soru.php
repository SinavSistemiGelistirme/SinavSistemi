<?php
	$sec = @mysql_query("SELECT * FROM testler INNER JOIN sorular ON sorular.soru_test_id = testler.test_id WHERE soru_test_id = $id AND soru_no = $soruNo");
	$yaz = @mysql_fetch_array($sec);
?>

<!--- Sorular --->
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo "<b>SORU ".$yaz["soru_no"]."</b>" ?></div>
		<div class="panel-body">
			<p><?php echo $yaz["soru_metin"]; ?></p>
		</div>
			<ul class="list-group">
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap-<?php echo $yaz["soru_no"]; ?>" id="<?php echo $yaz["soru_no"]."-"; ?>secenek-a" value="A">
						<label for="<?php echo $yaz["soru_no"]."-"; ?>secenek-a">A) <font style="font-weight:normal"><?php echo $yaz["soru_secenek_a"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap-<?php echo $yaz["soru_no"]; ?>" id="<?php echo $yaz["soru_no"]."-"; ?>secenek-b" value="B">
						<label for="<?php echo $yaz["soru_no"]."-"; ?>secenek-b">B) <font style="font-weight:normal"><?php echo $yaz["soru_secenek_b"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap-<?php echo $yaz["soru_no"]; ?>" id="<?php echo $yaz["soru_no"]."-"; ?>secenek-c" value="C">
						<label for="<?php echo $yaz["soru_no"]."-"; ?>secenek-c">C) <font style="font-weight:normal"><?php echo $yaz["soru_secenek_c"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap-<?php echo $yaz["soru_no"]; ?>" id="<?php echo $yaz["soru_no"]."-"; ?>secenek-d" value="D">
						<label for="<?php echo $yaz["soru_no"]."-"; ?>secenek-d">D) <font style="font-weight:normal"><?php echo $yaz["soru_secenek_d"]; ?></font></label>
					</div>
				</li>
				
				<li class="list-group-item">
					<div class="SecenekIsaret">
						<input type="checkbox" name="cevap-<?php echo $yaz["soru_no"]; ?>" id="<?php echo $yaz["soru_no"]."-"; ?>secenek-e" value="E">
						<label for="<?php echo $yaz["soru_no"]."-"; ?>secenek-e">E) <font style="font-weight:normal"><?php echo $yaz["soru_secenek_e"]; ?></font></label>
					</div>
				</li>
			
			</ul>
	</div>