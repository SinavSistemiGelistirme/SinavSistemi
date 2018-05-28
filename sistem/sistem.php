<?php

function UyeKayit(){
	
	if($_POST){
		
		
		
	}else{
		//require(TEMA_URL."/includes/uye-kayit.php");
		Bilgi("Bilgilendirme","Üye Kayıt Sistemi Yapım Aşamasındadır. Daha sonra tekrar deneyin","bilgi");
	}
	
}

function UyeGiris(){
	
	if($_POST){
		
		global $db;
		$uye_adi = $_POST["uye_adi"];
		$uye_sifre = md5($_POST["uye_sifre"]);

		$uye_bul = $db->prepare("SELECT * FROM uyeler WHERE uye_kullanici_adi = :uye_adi && uye_sifre = :uye_sifre");
		$uye_bul->bindParam(":uye_adi", $uye_adi, PDO::PARAM_STR);
		$uye_bul->bindParam(":uye_sifre", $uye_sifre, PDO::PARAM_STR);
		$uye_bul->execute();
		$uye_say = $uye_bul->rowCount();
		$hata = $uye_bul->errorInfo();
		
			if($uye_say > 0){

				$uye = $uye_bul->fetch(PDO::FETCH_ASSOC);
				$_SESSION["Login"] = array(
					"LoginUyeAdi"     	=> $uye_adi,
					"LoginUyeSifre"   	=> $uye_sifre,
					"LoginUyeAd"   		=> $uye["uye_adi"],
					"LoginUyeSoyad"   	=> $uye["uye_soyadi"],
					"LoginUyeEposta"  	=> $uye["uye_eposta"],
					"LoginUyeId"      	=> $uye["uye_id"],
					"LoginUyeGrup"   	=> $uye["uye_grup"],
					"LoginUyeSinif"   	=> $uye["uye_sinif_id"],
					"LoginUyeKategori"  => $uye["uye_kategori_id"],
					"LoginUyeAciklama"  => $uye["uye_aciklama"],
					"LoginUyeCinsiyet"  => $uye["uye_cinsiyet"],
					"LoginUyeAvatar"  	=> $uye["uye_resim"]
				);
				
				Bilgi("Tebrikler","Başarıyla giriş yaptınız, yönlendiriliyorsunuz!","basarili");
				header("Refresh:2; url='index.php'");

			}else{
				
				Bilgi("Hata!","Giriş başarısız oldu, yönlendiriliyorsunuz!","hata");
				header("Refresh:2; url='index.php'");
			}
	}else{
		require(TEMA_URL."/includes/uye-giris.php");
	}
	
}

function UyeProfil(){
	
	
	global $db;
	$id = $_SESSION["Login"]["LoginUyeId"];
	$kayit_durum = 1;
	$sonuc_durum = 1;
	
	$kayit_bul = $db->prepare("SELECT * FROM kayitlar INNER JOIN testler ON testler.test_id = kayitlar.kayit_test_id WHERE kayitlar.kayit_uye_id = :id AND kayitlar.kayit_durum = :kayit_durum");
	$kayit_bul->bindParam(":id", $id, PDO::PARAM_INT);
	$kayit_bul->bindParam(":kayit_durum", $kayit_durum, PDO::PARAM_INT);
	$kayit_bul->execute();
	$kayit_say = $kayit_bul->rowCount();
	
	$sonuc_bul = $db->prepare("SELECT * FROM sonuclar INNER JOIN testler ON testler.test_id = sonuclar.sonuc_test_id WHERE sonuclar.sonuc_uye_id = :id AND sonuclar.sonuc_durum = :sonuc_durum");
	$sonuc_bul->bindParam(":id", $id, PDO::PARAM_INT);
	$sonuc_bul->bindParam(":sonuc_durum", $sonuc_durum, PDO::PARAM_INT);
	$sonuc_bul->execute();
	$sonuc_say = $sonuc_bul->rowCount();
	
	
	require(TEMA_URL."/includes/uye-profil.php");
}

function UyeCikis(){
	
	if(isset($_SESSION["Login"]) ){
		$_SESSION = array();
		session_destroy();
		Bilgi("Tebrikler","Başarıyla çıkış yaptınız, yönlendiriliyorsunuz. Lütfen bekleyin...","basarili");
		header("Refresh:2; url='index.php");
	}else{
		Bilgi("Hata","Çıkış başarısız oldu, yönlendiriliyorsunuz!","hata");
		header("Refresh:2; url='index.php");
	}
	
}

function UyeSonuc(){
	
	global $db;
	$id = $_GET["id"];
	$uye_id = $_SESSION["Login"]["LoginUyeId"];
	$cevap_durum = 1;
	
	$test_adi = $db->prepare("SELECT * FROM cevaplar INNER JOIN testler ON testler.test_id = cevaplar.cevap_test_id WHERE testler.test_id = :test_id");
	$test_adi->bindParam(":test_id", $id, PDO::PARAM_INT);
	$test_adi->execute();
	$testadi = $test_adi->fetch(PDO::FETCH_ASSOC);
	
	$cevap_bul = $db->prepare("SELECT * FROM cevaplar INNER JOIN testler ON testler.test_id = cevaplar.cevap_test_id INNER JOIN sorular ON testler.test_id = sorular.soru_test_id INNER JOIN uyeler ON uyeler.uye_id = cevaplar.cevap_uye_id WHERE soru_no = cevap_soru_no AND uye_id = :uye_id AND test_id = :test_id AND cevap_durum = :cevap_durum");
	$cevap_bul->bindParam(":uye_id", $uye_id, PDO::PARAM_INT);
	$cevap_bul->bindParam(":test_id", $id, PDO::PARAM_INT);
	$cevap_bul->bindParam(":cevap_durum", $cevap_durum, PDO::PARAM_INT);
	$cevap_bul->execute();
	$cevap_say = $cevap_bul->rowCount();
	$hata =  $cevap_bul->errorInfo();
	echo $hata[2];

	require(TEMA_URL."/includes/uye-sonuc.php");
	
}

function UyeSoru(){
	
	global $db;
	$uye_id = $_SESSION["Login"]["LoginUyeId"];
	$cevap_durum = 1;
	$id = $_GET["id"];
	$test_id=$_GET["test_id"];

	$soru_bul = $db->prepare("SELECT * FROM sorular INNER JOIN testler ON testler.test_id = sorular.soru_test_id
	 INNER JOIN cevaplar ON cevaplar.cevap_soru_no=sorular.soru_no
	 WHERE soru_no = :soru_no AND test_id = :test_id GROUP BY soru_no");
	$soru_bul->bindParam(":soru_no", $id, PDO::PARAM_INT);
	$soru_bul->bindParam(":test_id", $test_id, PDO::PARAM_INT);
	$soru_bul->execute();
	$soru = $soru_bul->fetch(PDO::FETCH_ASSOC);
	
	require(TEMA_URL."/includes/uye-soru.php");
	
}

function Siniflar(){
	
	global $db;
	$id = $_SESSION["Login"]["LoginUyeId"];
	$sinif_id = $_SESSION["Login"]["LoginUyeSinif"];
	
	$sinif_sec = $db->prepare("SELECT * FROM iliskiler INNER JOIN siniflar ON iliskiler.sinif_id = siniflar.sinif_id WHERE uye_id = :id");
	$sinif_sec->bindParam(":id", $id, PDO::PARAM_INT);
	$sinif_sec->execute();
	
	$sinif_say = $sinif_sec->rowCount();
	while($sinif = $sinif_sec->fetch(PDO::FETCH_ASSOC)){
		require(TEMA_URL."/includes/siniflar.php");
	}
}

Function Kategoriler(){
	
	global $db;
	$uye_id = $_SESSION["Login"]["LoginUyeId"];
	
	$kategori_sec = $db->prepare("SELECT * FROM iliskiler INNER JOIN kategoriler ON iliskiler.kategori_id = kategoriler.kategori_id WHERE uye_id = :id");
	$kategori_sec->bindParam(":id", $uye_id, PDO::PARAM_INT);
	$kategori_sec->execute();
	
	$kategori_say = $kategori_sec->rowCount();
	while($kategori = $kategori_sec->fetch(PDO::FETCH_ASSOC)){
		require(TEMA_URL."/includes/kategoriler.php");
	}
}

Function Dersler(){
	
	global $db;
	$id = $_GET["id"];
	$uye_id = $_SESSION["Login"]["LoginUyeId"];
	
	$ders_sec = $db->prepare("SELECT * FROM iliskiler INNER JOIN dersler ON iliskiler.kategori_id = dersler.ders_kategori_id INNER JOIN kategoriler ON kategoriler.kategori_id = iliskiler.kategori_id WHERE uye_id = :id");
	$ders_sec->bindParam(":id", $uye_id, PDO::PARAM_INT);
	$ders_sec->execute();
	$ders_say = $ders_sec->rowCount();
	
	while($ders = $ders_sec->fetch(PDO::FETCH_ASSOC)){
		
		$kat_id = $_SESSION["Login"]["LoginUyeKategori"];
		
		//if($id != $kat_id){
			//Bilgi("Uyarı","İzinsiz bir alana erişmeye çalışıyorsunuz!","uyari");
			//header("Refresh:3; url=index.php");
		//}else{
			require(TEMA_URL."/includes/dersler.php");
		//}
	}
}

Function Konular(){
	
	global $db;
	$id = $_GET["id"]; 
	
	$konu_sec = $db->prepare("SELECT * FROM konular INNER JOIN dersler ON konular.konu_ders_id = dersler.ders_id INNER JOIN kategoriler ON kategoriler.kategori_id = dersler.ders_kategori_id WHERE konu_id = :id");
	$konu_sec->bindParam(":id", $id, PDO::PARAM_INT);
	$konu_sec->execute();
	
	$konu_say = $konu_sec->rowCount();
	while($konu = $konu_sec->fetch(PDO::FETCH_ASSOC)){
		
		$konu_id = $konu["konu_ders_id"];
		if($id != $konu_id){
			Bilgi("Uyarı","İzinsiz bir alana erişmeye çalışıyorsunuz!","uyari");
			header("Location: index.php");
		}else{
			require(TEMA_URL."/includes/konular.php");
		}
		
	}
	
}

Function Testler(){
	
	global $db;
	$id = $_GET["id"];
	$test_sec = $db->prepare("SELECT * FROM konular INNER JOIN testler ON testler.test_konu_id = konular.konu_id WHERE test_konu_id = :id");
	$test_sec->bindParam(":id", $id, PDO::PARAM_INT);
	$test_sec->execute();
	
	$soru_sayisi = $db->prepare("SELECT * FROM testler INNER JOIN sorular ON sorular.soru_test_id = testler.test_konu_id WHERE soru_test_id = :id");
	$soru_sayisi->bindParam(":id", $id, PDO::PARAM_INT);
	$soru_sayisi->execute();
	$soru_say = $soru_sayisi->rowCount();
	
	while($test = $test_sec->fetch(PDO::FETCH_ASSOC)){
		require(TEMA_URL."/includes/testler.php");
	}
	
}

Function Sorular(){
	
	global $db;
	$id = $_GET["id"];
	$test_adi = $db->prepare("SELECT * FROM testler INNER JOIN sorular ON sorular.soru_test_id = testler.test_id WHERE soru_test_id = :id");
	$test_adi->bindParam(":id", $id, PDO::PARAM_INT);
	$test_adi->execute();
	$testadi = $test_adi->fetch(PDO::FETCH_ASSOC);
	
	$soru_sec = $db->prepare("SELECT * FROM testler INNER JOIN sorular ON sorular.soru_test_id = testler.test_id WHERE soru_test_id = :id");
	$soru_sec->bindParam(":id", $id, PDO::PARAM_INT);
	$soru_sec->execute();
	
	require(TEMA_URL."/includes/sorular.php");
}

Function Sonuc(){
	
		global $db;
		$id = $_GET["id"];
		$test_adi = $db->prepare("SELECT * FROM testler INNER JOIN sorular ON sorular.soru_test_id = testler.test_id WHERE soru_test_id = :id");
		$test_adi->bindParam(":id", $id, PDO::PARAM_INT);
		$test_adi->execute();
		$testadi = $test_adi->fetch(PDO::FETCH_ASSOC);
		
		if(isset($_POST)){
						
			$soru_sec = $db->prepare("SELECT soru_test_id, soru_dogru_cevap, soru_no FROM sorular  WHERE soru_test_id = :id");
			$soru_sec->bindParam(":id", $id, PDO::PARAM_INT);
			$soru_sec->execute();
			
			$soru_say = $db->prepare("SELECT * FROM sorular WHERE soru_test_id = :id");
			$soru_say->bindParam(":id", $id, PDO::PARAM_INT);
			$soru_say->execute();
			$sorusay = $soru_say->rowCount();
			
			$uye_id = $_SESSION["Login"]["LoginUyeId"];
			$kayit_durum = 1;
			$sonuc_durum = 1;

			$kayit_say = $db->prepare("SELECT * FROM kayitlar WHERE kayit_test_id = :kayit_test_id AND kayit_uye_id = :kayit_uye_id AND kayit_durum = :kayit_durum");
			$kayit_say->bindParam(":kayit_test_id", $id, PDO::PARAM_INT);
			$kayit_say->bindParam(":kayit_uye_id", $uye_id, PDO::PARAM_INT);
			$kayit_say->bindParam(":kayit_durum", $kayit_durum, PDO::PARAM_INT);
			$kayit_say->execute();
			$kayitsay = $kayit_say->rowCount();
			
			$dogrular	= 0;
			$yanlislar	= 0;
			$boslar		= 0;
			$toplam = $sorusay;
			
			$cevap = $_POST["cevap"];
			
			require(TEMA_URL."/includes/sonuc.php");
			
			if($kayitsay > 0){
				Bilgi("Bilgilendirme","Daha önce bu teste katılmışsınız.","bilgi");
			}else{
				$kaydet = $db->prepare("INSERT INTO kayitlar SET
											kayit_test_id = :kayit_test_id,
											kayit_uye_id = :kayit_uye_id,
											kayit_durum = :kayit_durum
										");
				$kaydet->bindParam(":kayit_test_id", $id, PDO::PARAM_INT);
				$kaydet->bindParam(":kayit_uye_id", $uye_id, PDO::PARAM_INT);
				$kaydet->bindParam(":kayit_durum", $kayit_durum, PDO::PARAM_INT);
				$kayit = $kaydet->execute();
				$kayit_hata = $kaydet->errorInfo();
				
				$cevaplanan = $sorusay - $boslar;
				$tavan_puan = 100;
				$basari = ceil($dogrular / $toplam * $tavan_puan);
				
				$sonuc_kaydet = $db->prepare("INSERT INTO sonuclar SET
										sonuc_test_id = :sonuc_test_id,
										sonuc_uye_id = :sonuc_uye_id,
										sonuc_dogru_sayisi = :sonuc_dogru_sayisi,
										sonuc_yanlis_sayisi = :sonuc_yanlis_sayisi,
										sonuc_bos_sayisi = :sonuc_bos_sayisi,
										sonuc_cevap_sayisi = :sonuc_cevap_sayisi,
										sonuc_toplam_soru = :sonuc_toplam_soru,
										sonuc_basari_orani = :sonuc_basari_orani,
										sonuc_durum = :sonuc_durum
									");
									
				$sonuc_kaydet->bindParam(":sonuc_test_id", $id, PDO::PARAM_INT);
				$sonuc_kaydet->bindParam(":sonuc_uye_id", $uye_id, PDO::PARAM_INT);
				$sonuc_kaydet->bindParam(":sonuc_dogru_sayisi", $dogrular, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_yanlis_sayisi", $yanlislar, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_bos_sayisi", $boslar, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_cevap_sayisi", $cevaplanan, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_toplam_soru", $toplam, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_basari_orani", $basari, PDO::PARAM_STR);
				$sonuc_kaydet->bindParam(":sonuc_durum", $sonuc_durum, PDO::PARAM_INT);
				$sonuckayit = $sonuc_kaydet->execute();
				$sonuckayit_hata = $sonuc_kaydet->errorInfo();
				
				if($kayit && $sonuckayit){
					Bilgi("Bilgilendirme","Test bilgileriniz başarıyla kaydedildi.","basarili");
				}else{
					Bilgi("Hata!","Bilgiler kaydedilemedi!<br>{$sonuckayit_hata[2]}","hata");
				}
				
			}
			
		}
}

function Sistem(){
	
	$Git = $_GET["git"];
	Switch($Git){
		
		case "kayit":
			UyeKayit();
		break;
		
		case "profil":
			UyeProfil();
		break;
		
		case "uyesonuc":
			UyeSonuc();
		break;
		
		case "uyesoru":
			UyeSoru();
		break;
		
		case "cikis":
			UyeCikis();
		break;
		
		case "kategoriler":
			Kategoriler();
		break;
		
		case "dersler":
			Dersler();
		break;
		
		case "konular":
			Konular();
		break;
		
		case "testler":
			Testler();
		break;
		
		case "sorular":
			Sorular();
		break;
		
		case "sonuc":
			Sonuc();
		break;
		
		case "hakkimizda":
			Bilgi("Bilgilendirme","Hakkımızda Sayfası Yapım Aşamasındadır.","bilgi");
		break;
		
		case "iletisim":
			Bilgi("Bilgilendirme","İletişim Sayfası Yapım Aşamasındadır.","bilgi");
		break;
	
		default:
			if(isset($_SESSION["Login"])){
				Siniflar();
			}else{
				UyeGiris();
			}
		break;
	}
	
}

?>