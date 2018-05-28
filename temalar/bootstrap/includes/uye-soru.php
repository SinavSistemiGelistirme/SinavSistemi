<div class="panel panel-default">
	<div class="panel-heading"><h4 class="text-center" style="margin:3px 0 0 0"><?php echo $soru["test_adi"]; ?></h4></div>
</div>

<div class="panel panel-default UyeSoru">
	<div class="panel-heading"><?php echo "<b>SORU ".$soru["soru_no"]."</b>" ?></div>
	<div class="panel-body">
		<p><?php echo $soru["soru_metin"]; ?></p>
	</div>
		<ul class="list-group">

			<li class="list-group-item">
				<div class="SecenekIsaret">
					<?php 
					if($soru["soru_dogru_cevap"]=="A" and $soru["cevap_verilen_cevap"]=="A"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else if($soru["cevap_verilen_cevap"]=="A"){
						echo('<i class="fa fa-close UyeYanlis"></i>');
					}else if($soru["soru_dogru_cevap"]=="A"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else{
						echo('<i></i>');
					}
					?>
				    
					 
					
					<strong>A)</strong> <font style="font-weight:normal"><?php echo $soru["soru_secenek_a"]; ?></font>
				</div>
			</li>
			
			<li class="list-group-item">
				<div class="SecenekIsaret">
					<?php 
					if($soru["soru_dogru_cevap"]=="B" and $soru["cevap_verilen_cevap"]=="B"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else if($soru["cevap_verilen_cevap"]=="B"){
						echo('<i class="fa fa-close UyeYanlis"></i>');
					}else if($soru["soru_dogru_cevap"]=="B"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else{
						echo('<i></i>');
					}
					?>
					
					<strong>B)</strong>  <font style="font-weight:normal"><?php echo $soru["soru_secenek_b"]; ?></font>
				</div>
			</li>
			
			<li class="list-group-item">
				<div class="SecenekIsaret">
					<?php 
					if($soru["soru_dogru_cevap"]=="C" and $soru["cevap_verilen_cevap"]=="C"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else if($soru["cevap_verilen_cevap"]=="C"){
						echo('<i class="fa fa-close UyeYanlis"></i>');
					}else if($soru["soru_dogru_cevap"]=="C"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else{
						echo('<i></i>');
					}
					?> 
					
					<strong>C)</strong>  <font style="font-weight:normal"><?php echo $soru["soru_secenek_c"]; ?></font>
				</div>
			</li>
			
			<li class="list-group-item">
				<div class="SecenekIsaret">
					<?php 
					if($soru["soru_dogru_cevap"]=="D" and $soru["cevap_verilen_cevap"]=="D"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else if($soru["cevap_verilen_cevap"]=="D"){
						echo('<i class="fa fa-close UyeYanlis"></i>');
					}else if($soru["soru_dogru_cevap"]=="D"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else{
						echo('<i></i>');
					}
					?> 
					
					<strong>D)</strong>  <font style="font-weight:normal"><?php echo $soru["soru_secenek_d"]; ?></font>
				</div>
			</li>
			
			<li class="list-group-item">
				<div class="SecenekIsaret">
					<?php 
					if($soru["soru_dogru_cevap"]=="E" and $soru["cevap_verilen_cevap"]=="E"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else if($soru["cevap_verilen_cevap"]=="E"){
						echo('<i class="fa fa-close UyeYanlis"></i>');
					}else if($soru["soru_dogru_cevap"]=="E"){
						echo('<i class="fa fa-check UyeDogru"></i>');
					}else{
						echo('<i></i>');
					}
					?> 
					
					<strong>E)</strong>  <font style="font-weight:normal"><?php echo $soru["soru_secenek_e"]; ?></font>
				</div>
			</li>
		
		</ul>
</div>

<?php
	if($soru["cevap_verilen_cevap"]=="-"){
		Bilgi("Bilgi","Bu soru boş bırakılmış","bilgi");
	}
?>