<div class="panel panel-default">
	<div class="panel-body">
		<h4 style="margin:0!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;<b>ÇIKIŞ</b>
		</h4>
		<?php
			if(isset($_SESSION["Login"])){ 
				$_SESSION = array();
				session_destroy();
				echo '<p style="margin-top:15px;"><font color="green">Başarıyla çıkış yaptınız, yönlendiriliyorsunuz!</font></p>';
				header("Refresh:2; url='index.php'");
			}else{
				echo '<p style="margin-top:15px;"><font color="red">Çıkış başarısız oldu, yönlendiriliyorsunuz!</font></p>';
				header("Refresh:2; url='index.php'");
			}
		?>
	</div>
</div>