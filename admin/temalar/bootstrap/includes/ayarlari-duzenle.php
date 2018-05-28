<?php
	global $db;
	$sec = $db->prepare("SELECT * FROM ayarlar");	
	$sec->execute();
	$yaz = $sec->fetch(PDO::FETCH_ASSOC);
?>

<!--- Panel --->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="" style="margin:3px 0 0 0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;SİSTEM AYARLARI</h4>
	</div>
	<div class="panel-body">

<?php

	if($_POST){
	
		$sistem_id 			= $_POST["sistem_id"];
		$sistem_url 		= $_POST["sistem_url"];
		$sistem_adi 		= $_POST["sistem_adi"];
		$sistem_aciklama 	= $_POST["sistem_aciklama"];
		$sistem_logo 		= $_POST["sistem_logo"];
		$sistem_tema 		= $_POST["sistem_tema"];
		$sistem_durum 		= $_POST["sistem_durum"];
		
		$update = $db->prepare("UPDATE ayarlar SET
								sistem_id = :sistem_id,
								sistem_url = :sistem_url,
								sistem_adi = :sistem_adi,
								sistem_aciklama = :sistem_aciklama,
								sistem_logo = :sistem_logo,
								sistem_tema = :sistem_tema,
								sistem_durum = :sistem_durum
							");
		
		$update->bindParam(":sistem_id", $sistem_id, PDO::PARAM_INT);
		$update->bindParam(":sistem_url", $sistem_url, PDO::PARAM_STR);
		$update->bindParam(":sistem_adi", $sistem_adi, PDO::PARAM_STR);
		$update->bindParam(":sistem_aciklama", $sistem_aciklama, PDO::PARAM_STR);
		$update->bindParam(":sistem_logo", $sistem_logo, PDO::PARAM_STR);
		$update->bindParam(":sistem_tema", $sistem_tema, PDO::PARAM_STR);
		$update->bindParam(":sistem_durum", $sistem_durum, PDO::PARAM_INT);
		$update->execute();
		
		if($update){
			echo '<font color="green">Ayarlar başarıyla güncellendi, yönlendiriliyorsunuz!</font>';
			header("Refresh:2; url='index.php?git=ayarlar'");
		}else{
			echo '<font color="red">Güncelleme başarısız oldu!</font>';
			header("Refresh:2; url='index.php?git=ayar-duzenle'");
		}
	
	}else{ ?>
	
		<!--- Form --->	
		<form id="" action="" method="post">
			<div class="form-group">
				<label for="sistem_id">Sistem ID</label>
				<input type="text" class="form-control" id="sistem_id" name="sistem_id" placeholder="Sistem ID" value="<?php echo $yaz["sistem_id"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sistem_url">Sistem URL</label>
				<input type="text" class="form-control" id="sistem_url" name="sistem_url" placeholder="Sistem URL" value="<?php echo $yaz["sistem_url"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sistem_adi">Sistem Adı</label>
				<input type="text" class="form-control" id="sistem_adi" name="sistem_adi" placeholder="Sistem Adı" value="<?php echo $yaz["sistem_adi"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sistem_aciklama">Sistem Açıklaması</label>
				<input type="text" class="form-control" id="sistem_aciklama" name="sistem_aciklama" placeholder="Sistem Açıklaması" value="<?php echo $yaz["sistem_aciklama"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sistem_logo">Sistem Logosu</label>
				<input type="text" class="form-control" id="sistem_logo" name="sistem_logo" placeholder="Sistem Logosu" value="<?php echo $yaz["sistem_logo"]; ?>">
			</div>
			
			<div class="form-group">
				<label for="sistem_tema">Sistem Teması</label>
				<select class="form-control" id="sistem_tema" name="sistem_tema">
					
					<?php
						$dizin = "../temalar";				
						$dizin_ac = opendir($dizin) or die ("Dizin Açılamadı!");
						
						while($goster = readdir($dizin_ac)){
							if (is_dir($dizin."/".$goster) && $goster != '.' && $goster != '..'){	
							echo '<option value="'.$goster.'"';
								if ($goster == $yaz["sistem_tema"]){
									echo 'selected="selected"';
								}
							echo '>'.$goster.'</option>';
							}
						}
						closedir($dizin_ac);
					?>
					
				</select>
			</div>
			
			<div class="form-group">
			<label for="sistem_durum">Sistem Durumu</label>
				<select class="form-control" id="sistem_durum" name="sistem_durum">
					<?php
						Durum($yaz["sistem_durum"], "Açık", "Kapalı");
					?>
				</select>
			</div>
		<button type="submit" class="btn btn-primary pull-right">Kaydet</button>
		</form>
		<!--- # Form # --->

<?php } ?>
	</div>
</div>
<!--- # Panel # --->