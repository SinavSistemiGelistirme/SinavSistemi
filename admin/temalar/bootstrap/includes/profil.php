<?php
	$sec = @mysql_query("SELECT * FROM ayarlar");	
	$yaz = @mysql_fetch_array($sec);
?>
<!--- Profil --->
<div class="panel panel-default">
	<div class="panel-body">
		<div class="media">
			<div class="media-left media-middle">
			<?php
			if($_SESSION["Login"]["LoginUyeGrup"] == 1 && $_SESSION["Login"]["LoginUyeCinsiyet"] == 1){
				echo '<img src="temalar/bootstrap/images/no_avatar.png" width="100" height="92"/>';
			}else{
				if( $_SESSION["Login"]["LoginUyeCinsiyet"] == 1 && $_SESSION["Login"]["LoginUyeAvatar"] == "" ){
					echo '<img src="temalar/'.$yaz["sistem_tema"].'/images/bay.png" width="100" height="92"/>';
				}
			}
			?>
			</div>
			<div class="media-body media-middle" style="padding-left:10px;">
				<h4 class="media-heading"><?php echo $_SESSION["Login"]["LoginUyeAdi"]; ?></h4>
				<h5>
					<?php if($_SESSION["Login"]["LoginUyeGrup"] == 1){
						echo '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;';
					}else{
						echo '<span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;';
					} ?>
					<em><?php echo $_SESSION["Login"]["LoginUyeAciklama"]; ?></em>
				</h5>
			</div>
		</div>
	</div>
</div>
<!--- # Profil # --->

<!--- Profil Ayarları --->
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<b>Profil Ayarları</b>
		</h4>
		<a class="btn btn-primary btn-sm pull-right" href="index.php?git=dersler" role="button">Ayarlar</a>
	</div>
</div>
<!--- # Profil Ayarları # --->

<!--- Katıldığım Sınavlar --->
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;<b>Katıldığım Sınavlar</b>
		</h4>
		<a class="btn btn-primary btn-sm pull-right" href="index.php?git=dersler" role="button">Ayarlar</a>
	</div>
</div>
<!--- # Katıldığım Sınavlar # --->

<!--- Sınav Sonuçları --->
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
			<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;<b>Sınav Sonuçları</b>
		</h4>
		<a class="btn btn-primary btn-sm pull-right" href="index.php?git=dersler" role="button">Ayarlar</a>
	</div>
</div>
<!--- # Sınav Sonuçları # --->
