<div class="panel panel-default">
	<div class="panel-heading"><h4 class="text-center" style="margin:3px 0 0 0"><?php echo $testadi["test_adi"]." SONUÇLARI"; ?></h4></div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-bordered SonucTable">
			<thead>
				<tr><th>Soru No</th><th>Verilen Cevap</th><th>Cevap Durum</th><th>Doğru Cevap</th></tr>
			</thead>
			<tbody>
				
				<?php
								
					while($soru = $soru_sec->fetch(PDO::FETCH_ASSOC)){
						
						$soru_no = $soru["soru_no"];
						$dogru_cevap = $soru["soru_dogru_cevap"];
						
						$sDogru 	= '<font color="green"><b>[ DOĞRU ]</b></font>';
						$sYanlis 	= '<font color="red"><b>[ YANLIŞ ]</b></font>';
						$sBos 		= '<font color="#2E9AFE"><b>[ BOŞ ]</b></font>';
						$dDogru		= '<font color="green"><b>[ '.$dogru_cevap.' ]</b></font>';
						
						$cevap_durum = 1;
						
						//$cevap[$soru_no] formdan gelen veri.
						if(isset($cevap[$soru_no])) {
							
							if($cevap[$soru_no] == $dogru_cevap){
							//doğru cevap verildiğinde çalışacak alan
								$dogrular++;
								
								echo "<tr><td><b>".$soru_no."</b></td><td><b>".$cevap[$soru_no]."</b></td><td>".$sDogru."</td><td>".$dDogru."</td></tr>";
								
									if($kayitsay < 1){
									
										$dogru = $db->prepare("INSERT INTO cevaplar SET
																cevap_test_id = :cevap_test_id,
																cevap_uye_id = :cevap_uye_id,																
																cevap_soru_no = :cevap_soru_no,
																cevap_verilen_cevap = :cevap_verilen_cevap,
																cevap_cevap_durumu = :cevap_cevap_durumu,
																cevap_durum = :cevap_durum
															  ");
										
										$dogru_cevap_durumu = 1;
										$dogru->bindParam(":cevap_test_id", $id, PDO::PARAM_INT);
										$dogru->bindParam(":cevap_uye_id", $uye_id, PDO::PARAM_INT);										
										$dogru->bindParam(":cevap_soru_no", $soru_no, PDO::PARAM_STR);
										$dogru->bindParam(":cevap_verilen_cevap", $cevap[$soru_no], PDO::PARAM_STR);
										$dogru->bindParam(":cevap_cevap_durumu", $dogru_cevap_durumu, PDO::PARAM_INT);
										$dogru->bindParam(":cevap_durum", $cevap_durum, PDO::PARAM_INT);
										$dogru->execute();
									}

							}else{
							//yanlış cevap verildiğinde çalışacak alan
								$yanlislar++;
								echo "<tr><td><b>".$soru_no."</b></td><td><b>".$cevap[$soru_no]."</b></td><td>".$sYanlis."</td><td>".$dDogru."</td></tr>";
								
									if($kayitsay < 1){
										
										$yanlis = $db->prepare("INSERT INTO cevaplar SET
																cevap_test_id = :cevap_test_id,
																cevap_uye_id = :cevap_uye_id,
																cevap_soru_no = :cevap_soru_no,
																cevap_verilen_cevap = :cevap_verilen_cevap,
																cevap_cevap_durumu = :cevap_cevap_durumu,
																cevap_durum = :cevap_durum
															  ");
										
										$yanlis_cevap_durumu = 2;
										$yanlis->bindParam(":cevap_test_id", $id, PDO::PARAM_INT);
										$yanlis->bindParam(":cevap_uye_id", $uye_id, PDO::PARAM_INT);						
										$yanlis->bindParam(":cevap_soru_no", $soru_no, PDO::PARAM_STR);
										$yanlis->bindParam(":cevap_verilen_cevap", $cevap[$soru_no], PDO::PARAM_STR);
										$yanlis->bindParam(":cevap_cevap_durumu", $yanlis_cevap_durumu, PDO::PARAM_INT);
										$yanlis->bindParam(":cevap_durum", $cevap_durum, PDO::PARAM_INT);
										$yanlis->execute();
									
									}
							}
						}else{
						
							//boş cevap bırakıldığında çalışacak alan
							$boslar++;
							
							echo "<tr><td><b>".$soru_no."</b></td><td><b>-</b></td><td>".$sBos."</td><td>".$dDogru."</td></tr>";
							
								if($kayitsay < 1){
								
									$bos = $db->prepare("INSERT INTO cevaplar SET
															cevap_test_id = :cevap_test_id,
															cevap_uye_id = :cevap_uye_id,
															cevap_soru_no = :cevap_soru_no,
															cevap_verilen_cevap = :cevap_verilen_cevap,
															cevap_cevap_durumu = :cevap_cevap_durumu,
															cevap_durum = :cevap_durum
														  ");
									
									$bos_cevap_durumu = 0;
									$bos_deger = "-";
									$bos->bindParam(":cevap_test_id", $id, PDO::PARAM_INT);
									$bos->bindParam(":cevap_uye_id", $uye_id, PDO::PARAM_INT);		
									$bos->bindParam(":cevap_soru_no", $soru_no, PDO::PARAM_STR);
									$bos->bindParam(":cevap_verilen_cevap", $bos_deger, PDO::PARAM_STR);
									$bos->bindParam(":cevap_cevap_durumu", $bos_cevap_durumu, PDO::PARAM_INT);
									$bos->bindParam(":cevap_durum", $cevap_durum, PDO::PARAM_INT);
									$bos->execute();
									
								}
							
						}
					}
				
				?>
				
			</tbody>
		</table>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body TestSonuc">
		<div class="Dogrular"><span class="Sonuc">Doğru Cevap : <strong><?php echo $dogrular; ?></strong></span></div>
		<div class="Yanlislar"><span class="Sonuc">Yanlış Cevap : <strong><?php echo $yanlislar; ?></strong></span></div>
		<div class="BosCevap"><span class="Sonuc">Boş Bırakılan : <strong><?php echo $boslar; ?></strong></span></div>
		<div class="ToplamSoru"><span class="Sonuc">Toplam Soru : <strong><?php echo $toplam; ?></strong></span></div>
		<div class="Cevaplanan"><span class="Sonuc">Cevaplanan : <strong><?php echo $sorusay - $boslar; ?></strong></span></div>
		<div class="clearfix"></div>
	</div>
</div>