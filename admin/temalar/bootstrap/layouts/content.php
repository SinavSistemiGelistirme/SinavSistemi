<!--- Content --->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php if($_SESSION == true){ require("sistem/sistem.php"); }else{ require('../temalar/'.$sistem_tema.'/giris.php'); } ?>
		</div>
	</div>
</div>
<!--- # Content # --->