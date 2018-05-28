<div class="panel panel-default">
	<div class="panel-body">
		<div class="media">
			<div class="media-left media-middle">
			<?php
			if($_SESSION["Login"]["LoginUyeGrup"] == 1){
				echo '<img src="'.TEMA_URL.'/images/'.$_SESSION["Login"]["LoginUyeAvatar"].'" width="100" height="92"/>';
			}elseif($_SESSION["Login"]["LoginUyeGrup"] == 1 && $_SESSION["Login"]["LoginUyeAvatar"] == ""){
				echo '<img src="'.TEMA_URL.'/images/no_avatar.png" width="100" height="92"/>';
			}else{
				if( $_SESSION["Login"]["LoginUyeCinsiyet"] == 1 && $_SESSION["Login"]["LoginUyeAvatar"] == "" ){
					echo '<img src="'.TEMA_URL.'/images/bay.png" width="100" height="92"/>';
				}elseif( $_SESSION["Login"]["LoginUyeCinsiyet"] == 0 && $_SESSION["Login"]["LoginUyeAvatar"] == "" ){
					echo '<img src="'.TEMA_URL.'/images/bayan.png" width="100" height="92"/>';
				}elseif( $_SESSION["Login"]["LoginUyeCinsiyet"] == 1 && !$_SESSION["Login"]["LoginUyeAvatar"] == "" ){
					echo '<img src="'.TEMA_URL.'/images/'.$_SESSION["Login"]["LoginUyeAvatar"].'" width="100" height="92"/>';
				}elseif( $_SESSION["Login"]["LoginUyeCinsiyet"] == 0 && !$_SESSION["Login"]["LoginUyeAvatar"] == "" ){
					echo '<img src="'.TEMA_URL.'/images/'.$_SESSION["Login"]["LoginUyeAvatar"].'" width="100" height="92"/>';
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
		<div class="clearfix">
			<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<b>Profil Ayarları</b>
			</h4>
			<a href="#" class="btn btn-primary btn-sm pull-right ProfilButon" id="ayar">Ayarlar</a>
		</div>
		<div class="UyeAyar" id="ayarlar" style="display:none">
			
			
			<table class="table table-bordered">
			  <tbody>
				<tr>
				  <td style="width:200px; background-color: #f9f9f9; border-right:2px solid #ecefef;">Kullanıcı Adı</td>
				  <td style="font-family: Tahoma;"><?php echo $_SESSION["Login"]["LoginUyeAdi"]; ?></td>
				</tr>
				<tr>
				  <td style="width:200px; background-color: #f9f9f9; border-right:2px solid #ecefef;">Adı Soyadı</td>
				  <td style="font-family: Tahoma;"><?php echo $_SESSION["Login"]["LoginUyeAd"].' '.$_SESSION["Login"]["LoginUyeSoyad"]; ?></td>
				</tr>
				<tr>
				  <td style="width:200px; background-color: #f9f9f9; border-right:2px solid #ecefef;">E-posta Adresi</td>
				  <td style="font-family: Tahoma;"><?php echo $_SESSION["Login"]["LoginUyeEposta"]; ?></td>
				</tr>
				<tr>
				  <td style="width:200px; background-color: #f9f9f9; border-right:2px solid #ecefef;">Cinsiyet</td>
				  <td style="font-family: Tahoma;"><?php echo $_SESSION["Login"]["LoginUyeCinsiyet"] == 1 ? "Erkek" : null; echo $_SESSION["Login"]["LoginUyeCinsiyet"] == 0 ? "Kadın" : null; ?></td>
				</tr>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<!--- # Profil Ayarları # --->

<!--- Katıldığım Sınavlar --->
<div class="panel panel-default">
	<div class="panel-body">
		<div class="clearfix">
			<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;<b>Katıldığım Sınavlar</b>
			</h4>
			<a class="btn btn-primary btn-sm pull-right ProfilButon" href="#" id="sinav">Sınavlar</a>
		</div>
		<div class="UyeAyar" id="sinavlar" style="display:none">
			
			<?php
			
			if($kayit_say > 0){ ?>
				
				<table class="table table-bordered">
					</thead>  
						<tr>
							<th class="SonucTablo">Sıra No</th>
							<th class="SonucTablo">Test Adı</th>
							<th class="SonucTablo">Tarih</th>
						</tr>
					</thead>
				<tbody>
						<?php
						$sira_no = 1;
						while($kayit = $kayit_bul->fetch(PDO::FETCH_ASSOC)){
							echo '<tr>
									<td class="Sonuc">'.$sira_no.'</td>
									<td class="Sonuc SonucIcerik">'.$kayit['test_adi'].'</td>
									<td class="Sonuc">'.$kayit['kayit_zaman'].'</td>
								</tr>';
							$sira_no++;
						}
			}else{
				Bilgi("Bilgilendirme","Henüz hiçbir teste katılmamışsınız!","bilgi");
			}
			?>
			 </tbody>
			</table>
		</div>
	</div>
</div>
<!--- # Katıldığım Sınavlar # --->

<!--- Sınav Sonuçları --->
<div class="panel panel-default">
	<div class="panel-body">
		<div class="clearfix">
			<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
				<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;<b>Sınav Sonuçları</b>
			</h4>
			<a class="btn btn-primary btn-sm pull-right ProfilButon" href="#" id="sonuc">Sonuçlar</a>
		</div>
		<div class="UyeAyar" id="sonuclar" style="display:none">
			
				<?php if($sonuc_say > 0){ ?>
					
					<table class="table table-bordered">
					</thead>
						<tr>
							<th class="SonucTablo" style="width: 80px">Sıra No</th>
							<th class="SonucTablo SonucBaslik">Test Adı</th>
							<th class="SonucTablo">Doğru Sayısı</th>
							<th class="SonucTablo">Yanlış Sayısı</th>
							<th class="SonucTablo">Boş Sayısı</th>
							<th class="SonucTablo">Toplam Soru</th>
							<th class="SonucTablo">Başarı Oranı</th>
							<th class="SonucTablo">Detay</th>
						</tr>
						</thead>
					<tbody>
					<?php
						
						$sira_no = 1;
						while($sonuc = $sonuc_bul->fetch(PDO::FETCH_ASSOC)){
							echo '<tr>
									<td class="Sonuc">'.$sira_no.'</td>
									<td class="Sonuc SonucIcerik">'.$sonuc['test_adi'].'</td>
									<td class="Sonuc">'.$sonuc['sonuc_dogru_sayisi'].'</td>
									<td class="Sonuc">'.$sonuc['sonuc_yanlis_sayisi'].'</td>
									<td class="Sonuc">'.$sonuc['sonuc_bos_sayisi'].'</td>
									<td class="Sonuc">'.$sonuc['sonuc_toplam_soru'].'</td>
									<td class="Sonuc">% '.$sonuc['sonuc_basari_orani'].'</td>
									<td class="Sonuc"><a href="index.php?git=uyesonuc&id='.$sonuc['test_id'].'"><span class="glyphicon glyphicon-circle-arrow-right" style="font-size: 24px"></span></a></td>
								</tr>';
							$sira_no++;
						}
				
				}else{
					Bilgi("Bilgilendirme","Henüz hiçbir teste katılmamışsınız!","bilgi");
				}

				?>				
			  </tbody>
			</table>
		</div>
	</div>
</div>