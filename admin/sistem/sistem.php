<?php

function Bilgi($Baslik, $Mesaj, $Tipi="hata"){
	
	 // Uyarı tipi
	switch ($Tipi){
		case 'basarili': $Sinif = 'success'; $Icon = 'check-circle'; break;
		case 'hata':     $Sinif = 'danger';  $Icon = 'times-circle'; break;
		case 'uyari':    $Sinif = 'warning'; $Icon = 'exclamation-circle'; break;
		case 'bilgi':    $Sinif = 'info';    $Icon = 'info-circle'; break;
		default:         $Sinif = 'hata';    $Icon = 'times-circle'; break;
	}
	
	echo "<div class='alert alert-{$Sinif}' role='alert'><strong><i class='fa fa-{$Icon}' style='margin-right: 5px'></i>{$Baslik}</strong><br/>{$Mesaj}</div>";
}

Function Ayarlar(){
	include('temalar/bootstrap/includes/ayarlar.php');
}

Function Admin(){
	include('temalar/bootstrap/includes/adminler.php');
}

Function AyarDuzenle(){
	include('temalar/bootstrap/includes/ayarlari-duzenle.php');
}

Function Durum($a, $b, $c){
	if($a == 1){
		echo '<option value="1" selected>'.$b.'</option><option value="0">'.$c.'</option>';
	}else{
		echo '<option value="1">'.$b.'</option><option value="0" selected>'.$c.'</option>';
	}
}

Function Anasayfa(){
	require('temalar/bootstrap/includes/dashboard.php');
}

Function Giris(){
	
	if($_POST){
		
		global $db;
		$uye_adi = $_POST["uye_adi"];
		$uye_sifre = md5($_POST["uye_sifre"]);
		$uye_grup = 1;

		$uye_bul = $db->prepare("SELECT * FROM uyeler WHERE uye_kullanici_adi = :uye_adi && uye_sifre = :uye_sifre && uye_grup = :uye_grup");
		$uye_bul->bindParam(":uye_adi", $uye_adi, PDO::PARAM_STR);
		$uye_bul->bindParam(":uye_sifre", $uye_sifre, PDO::PARAM_STR);
		$uye_bul->bindParam(":uye_grup", $uye_grup, PDO::PARAM_INT);
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
		include('temalar/bootstrap/includes/admin-giris.php');
	}
	
	
}

Function Cikis(){
	
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

Function Profil(){
	include('temalar/bootstrap/includes/profil.php');
}


Function Uyeler(){
	include('temalar/bootstrap/includes/uyeler.php');
}

Function UyeEkle(){
	include('temalar/bootstrap/includes/uye-ekle.php');
}

Function UyeDuzenle(){
	include('temalar/bootstrap/includes/uye-duzenle.php');
}

Function UyeSil(){
	include('temalar/bootstrap/includes/uye-sil.php');
}

Function Siniflar(){
	include('temalar/bootstrap/includes/siniflar.php');
}

Function SinifEkle(){
	include('temalar/bootstrap/includes/sinif-ekle.php');
}

Function SinifDuzenle(){
	include('temalar/bootstrap/includes/sinif-duzenle.php');
}

Function SinifSil(){
	include('temalar/bootstrap/includes/sinif-sil.php');
}

Function DersSil(){
	include('temalar/bootstrap/includes/ders-sil.php');
}

Function Kategoriler(){
	include('temalar/bootstrap/includes/kategoriler.php');
}

Function KategoriDuzenle(){
	include('temalar/bootstrap/includes/kategori-duzenle.php');
}

Function KategoriSil(){
	include('temalar/bootstrap/includes/kategori-sil.php');
}

Function KategoriEkle(){
	include('temalar/bootstrap/includes/kategori-ekle.php');
}

Function Dersler(){
	include('temalar/bootstrap/includes/dersler.php');
}

Function DersEkle(){
	include('temalar/bootstrap/includes/ders-ekle.php');
}

Function DersDuzenle(){
	include('temalar/bootstrap/includes/ders-duzenle.php');
}

Function Konular(){
	include('temalar/bootstrap/includes/konular.php');
}

Function KonuEkle(){
	include('temalar/bootstrap/includes/konu-ekle.php');
}

Function KonuDuzenle(){
	include('temalar/bootstrap/includes/konu-duzenle.php');
}

Function KonuSil(){
	include('temalar/bootstrap/includes/konu-sil.php');
}

Function Testler(){
	include('temalar/bootstrap/includes/testler.php');
}

Function TestEkle(){
	include('temalar/bootstrap/includes/test-ekle.php');
}

Function TestDuzenle(){
	include('temalar/bootstrap/includes/test-duzenle.php');
}

Function TestSil(){
	include('temalar/bootstrap/includes/test-sil.php');
}

Function Sorular(){
	include('temalar/bootstrap/includes/sorular.php');
}

Function TestSorular(){
	include('temalar/bootstrap/includes/test-sorular.php');
}

Function SoruEkle(){
	include('temalar/bootstrap/includes/soru-ekle.php');
}

Function SoruDuzenle(){
	include('temalar/bootstrap/includes/soru-duzenle.php');
}

Function SoruSil(){
	include('temalar/bootstrap/includes/soru-sil.php');
}


Function Sistem(){
	
	@$Git = $_GET['git'];
	Switch($Git){
		
		default:
			if(isset($_SESSION["Login"])){
				Anasayfa();
			}else{
				Giris();
			}
		break;
		
		case "ayarlar":
			Ayarlar();
		break;
		
		case "adminler":
			Admin();
		break;
		
		case "ayar-duzenle":
			AyarDuzenle();
		break;
		
		case "giris":
			Giris();
		break;	
		
		case "cikis":
			Cikis();
		break;
		
		case "profil":
			Profil();
		break;

		case "uye-profil":
			UyeProfil();
		break;		
		
		case "uyeler":
			Uyeler();
		break;
		
		case "uye-ekle":
			UyeEkle();
		break;
		
		case "uye-duzenle":
			UyeDuzenle();
		break;
		
		case "uye-sil":
			UyeSil();
		break;
		
		case "siniflar":
			Siniflar();
		break;
		
		case "sinif-ekle":
			SinifEkle();
		break;
		
		case "sinif-duzenle":
			SinifDuzenle();
		break;
		
		case "sinif-sil":
			SinifSil();
		break;
		
		case "ders-sil":
			DersSil();
		break;
		
		case "kategoriler":
			Kategoriler();
		break;
		
		case "kategori-ekle":
			KategoriEkle();
		break;
		
		case "kategori-duzenle":
			KategoriDuzenle();
		break;
		
		case "kategori-sil":
			KategoriSil();
		break;
		
		case "dersler":
			Dersler();
		break;
		
		case "ders-ekle":
			DersEkle();
		break;
		
		case "ders-duzenle":
			DersDuzenle();
		break;
		
		case "konular":
			Konular();
		break;
		
		case "konu-ekle":
			KonuEkle();
		break;
		
		case "konu-duzenle":
			KonuDuzenle();
		break;
		
		case "konu-sil":
			KonuSil();
		break;
		
		case "testler":
			Testler();
		break;
		
		case "test-ekle":
			TestEkle();
		break;
		
		case "test-duzenle":
			TestDuzenle();
		break;
		
		case "test-sil":
			TestSil();
		break;
		
		case "sorular":
			Sorular();
		break;
		
		case "test-sorular":
			TestSorular();
		break;
		
		case "soru-ekle":
			SoruEkle();
		break;
		
		case "soru-duzenle":
			SoruDuzenle();
		break;
		
		case "soru-sil":
			SoruSil();
		break;
		
	}
	
}

?>