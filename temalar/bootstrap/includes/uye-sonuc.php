<div class="panel panel-default">
	<div class="panel-body">
		<div class="clearfix">
			<h4 class="pull-left" style="margin:0!important; margin-top:6px!important; color: #07445d; font-size: 17px; font-family: century gothic;">
				<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;<b>Sınav Sonuçları</b>
			</h4>
			<a class="btn btn-primary btn-sm pull-right ProfilButon" href="index.php?git=profil" id="sonuc">Geri Dön</a>
		</div>
		<div class="UyeAyar">
			
			<div class="panel panel-default">
				<div class="panel-heading" style="border:0"><h4 class="text-center" style="margin:3px 0 0 0"><?php echo $testadi['test_adi']; ?></h4></div>
			</div>
			
				<?php if($cevap_say > 0){ ?>
					
					<table class="table table-bordered">
					</thead>
						<tr>
							<th class="SonucTablo">Soru No</th>
							<th class="SonucTablo">Test Adı</th>
							<th class="SonucTablo">Verilen Cevap</th>
							<th class="SonucTablo">Cevap Durumu</th>
							<th class="SonucTablo">Cevap Anahtarı</th>
							<th class="SonucTablo">Soruyu Gör</th>
						</tr>
						</thead>
					<tbody>
					<?php
						
						$sira_no = 1;
						while($cevap = $cevap_bul->fetch(PDO::FETCH_ASSOC)){
							echo '<tr>
									<td class="Sonuc">'.$cevap['cevap_soru_no'].'</td>
									<td class="Sonuc">'.$cevap['test_adi'].'</td>
									<td class="Sonuc">'.$cevap['cevap_verilen_cevap'].'</td>
									<td class="Sonuc">';
									
									if($cevap['cevap_cevap_durumu'] == 0){ echo "BOŞ"; }
									if($cevap['cevap_cevap_durumu'] == 1){ echo "DOĞRU"; }
									if($cevap['cevap_cevap_durumu'] == 2){ echo "YANLIŞ"; }
									
							echo '</td>
									<td class="Sonuc">'.$cevap['soru_dogru_cevap'].'</td>
									<td class="Sonuc"><a href="index.php?git=uyesoru&uye_id='.$uye_id.'&test_id='.$id.'&id='.$cevap['cevap_soru_no'].'"><span class="glyphicon glyphicon-circle-arrow-right" style="font-size: 24px"></span></a></td>
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