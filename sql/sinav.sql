-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 28 May 2018, 13:09:40
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinav`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `sistem_id` int(11) NOT NULL AUTO_INCREMENT,
  `sistem_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sistem_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `sistem_logo` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sistem_tema` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sistem_url` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sistem_durum` int(1) NOT NULL,
  PRIMARY KEY (`sistem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`sistem_id`, `sistem_adi`, `sistem_aciklama`, `sistem_logo`, `sistem_tema`, `sistem_url`, `sistem_durum`) VALUES
(1, 'Sınav', 'Açıklama', '', 'bootstrap', 'http://localhost/sinav', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevaplar`
--

DROP TABLE IF EXISTS `cevaplar`;
CREATE TABLE IF NOT EXISTS `cevaplar` (
  `cevap_id` int(11) NOT NULL AUTO_INCREMENT,
  `cevap_uye_id` int(11) NOT NULL,
  `cevap_test_id` int(11) NOT NULL,
  `cevap_soru_no` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `cevap_verilen_cevap` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `cevap_cevap_durumu` int(1) NOT NULL,
  `cevap_durum` int(1) NOT NULL,
  PRIMARY KEY (`cevap_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

DROP TABLE IF EXISTS `dersler`;
CREATE TABLE IF NOT EXISTS `dersler` (
  `ders_id` int(11) NOT NULL AUTO_INCREMENT,
  `ders_kategori_id` int(11) NOT NULL,
  `ders_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ders_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `ders_durum` int(1) NOT NULL,
  PRIMARY KEY (`ders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`ders_id`, `ders_kategori_id`, `ders_adi`, `ders_aciklama`, `ders_durum`) VALUES
(1, 1, 'TARİH', 'Tarih Dersi', 1),
(2, 2, 'DİN KÜLTÜRÜ', 'Din Kültürü Dersi', 1),
(3, 3, 'TÜRKÇE', 'Türkçe Dersi', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iliskiler`
--

DROP TABLE IF EXISTS `iliskiler`;
CREATE TABLE IF NOT EXISTS `iliskiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_id` int(11) NOT NULL,
  `sinif_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ders_id` int(11) NOT NULL,
  `konu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `iliskiler`
--

INSERT INTO `iliskiler` (`id`, `uye_id`, `sinif_id`, `kategori_id`, `ders_id`, `konu_id`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_durum` int(1) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_aciklama`, `kategori_durum`) VALUES
(1, 'YGS SINAVI', 'YGS Sınavına Hazırlık', 1),
(2, 'TEOG SINAVI', 'TEOG Sınavına Hazırlık', 1),
(3, 'ORTAOKULA GEÇİŞ SINAVI', 'Ortaokul Sınavına Hazırlık', 1),
(4, 'DEMO SINAVI', 'Demo Sınavına Hazırlık', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

DROP TABLE IF EXISTS `kayitlar`;
CREATE TABLE IF NOT EXISTS `kayitlar` (
  `kayit_id` int(11) NOT NULL AUTO_INCREMENT,
  `kayit_uye_id` int(11) NOT NULL,
  `kayit_test_id` int(11) NOT NULL,
  `kayit_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kayit_durum` int(1) NOT NULL,
  PRIMARY KEY (`kayit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

DROP TABLE IF EXISTS `konular`;
CREATE TABLE IF NOT EXISTS `konular` (
  `konu_id` int(11) NOT NULL AUTO_INCREMENT,
  `konu_ders_id` int(11) NOT NULL,
  `konu_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `konu_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `konu_durum` int(1) NOT NULL,
  PRIMARY KEY (`konu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konu_id`, `konu_ders_id`, `konu_adi`, `konu_aciklama`, `konu_durum`) VALUES
(1, 1, 'KURTULUŞ SAVAŞI', 'Kurtuluş Savaşı', 1),
(2, 2, 'PEYGAMBERİMİZİN HAYATI', 'Peygamberimizin Hayatı', 1),
(3, 3, 'İSİM TAMLAMALARI', 'İsim Tamlamaları', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siniflar`
--

DROP TABLE IF EXISTS `siniflar`;
CREATE TABLE IF NOT EXISTS `siniflar` (
  `sinif_id` int(11) NOT NULL AUTO_INCREMENT,
  `sinif_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sinif_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `sinif_subesi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sinif_durum` int(1) NOT NULL,
  PRIMARY KEY (`sinif_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `siniflar`
--

INSERT INTO `siniflar` (`sinif_id`, `sinif_adi`, `sinif_aciklama`, `sinif_subesi`, `sinif_durum`) VALUES
(1, 'Lise', 'Lise Sınıfı', 'A', 1),
(2, 'Ortaokul', 'Ortaokul Sınıfı', 'B', 1),
(3, 'İlkokul', 'İlkokul Sınıfı', 'C', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sonuclar`
--

DROP TABLE IF EXISTS `sonuclar`;
CREATE TABLE IF NOT EXISTS `sonuclar` (
  `sonuc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sonuc_uye_id` int(11) NOT NULL,
  `sonuc_test_id` int(11) NOT NULL,
  `sonuc_dogru_sayisi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_yanlis_sayisi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_bos_sayisi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_cevap_sayisi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_toplam_soru` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_basari_orani` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sonuc_durum` int(1) NOT NULL,
  PRIMARY KEY (`sonuc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

DROP TABLE IF EXISTS `sorular`;
CREATE TABLE IF NOT EXISTS `sorular` (
  `soru_id` int(11) NOT NULL AUTO_INCREMENT,
  `soru_test_id` int(11) NOT NULL,
  `soru_no` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_metin` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_resim` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_secenek_a` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_secenek_b` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_secenek_c` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_secenek_d` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_secenek_e` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_dogru_cevap` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_durum` int(1) NOT NULL,
  PRIMARY KEY (`soru_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`soru_id`, `soru_test_id`, `soru_no`, `soru_metin`, `soru_resim`, `soru_secenek_a`, `soru_secenek_b`, `soru_secenek_c`, `soru_secenek_d`, `soru_secenek_e`, `soru_dogru_cevap`, `soru_durum`) VALUES
(1, 1, '1', '\"Kuvva-i Millîye\" adı ilk kez aşağıdakilerden hangisi tarafından kullanılmıştır?', '', 'Millî Kongre', 'Balıkesir Kongresi', 'Alaşehir Kongresi', 'Erzurum Kongresi', 'Trakya Paşaeli Cemiyeti', 'A', 1),
(2, 1, '2', 'İstanbul hükümeti Temsil Heyeti\'nin varlığını aşağıda olayların hangisi ile tanımıştır?', '', 'Amasa Genelgesi', 'TBMM\'nin Açılması', 'Amasya Potokolü', 'Bilecik Görüşmeleri', 'Misak-ı Milli', 'C', 1),
(3, 1, '3', 'Londra konferansının sonuç vermemesi üzerine sevr projesini gerçekleştirmek üzere anlaşma devletlerinin kararlar alması ve bu amaçla yunan ordusunun harekete geçmesi aşağıdaki savaşlardan hangisine sebep olmuştur?', '', 'Birinci inönü', 'Sakarya', 'Başkomutan', 'İkinci inönü', 'Gebze', 'D', 1),
(4, 2, '1', 'Aşağıdakilerden hangisi Peygamber (S.A.V) ‘in amcalarından biri değildir?', '', 'Abbas', 'Hamza', 'Ebu Bekir', 'Ebu Talip', 'Zübeyir', 'C', 1),
(5, 2, '2', 'Peygamber efendimizin dedesi Abdülmuttalip’in asıl ismi nedir?', '', 'Haris', 'Şeybe', 'Ebu Zeyd', 'Abbas', 'Sirac', 'B', 1),
(6, 2, '3', 'Cahiliye döneminde Kabe çıplak olarak tavaf ediliyordu. Kabe’nin çıplak olarak tavaf edilmesini yasaklayan aşağıdakilerden hangisidir?', '', 'Abdulmuttalip', 'Hamza', 'Ebu Süfyan', 'Ömer', 'Hz. Muhammed', 'A', 1),
(7, 3, '1', 'Aşağıdaki dizelerin hangisinde ad tamlaması \"özne\" görevinde kullanılmıştır?', '', 'Bir yanıp bir sönen lambanın dibinde gölgem', 'Uykum nasıl olsa bir kelebeğin ömrüne denktir.', 'Çıkaramadım hatlarımdaki hattın anlamını', 'Çıkıp gidiyorum gecelerin ötesine bu akşam', 'Ruhumun kanatları ince saydam zardandır.', 'E', 1),
(8, 3, '2', 'Aşağıdaki dizelerin hangisinde birden çok ad tamlamasına yer verilmiştir?', '', 'Uyku, yolu yükseltiyor yıldız kümesine', 'Nehir boyunu izleyerek aşağılara iner gönlüm', 'Gecenin ışığını şafağın gölgesine yüklüyorlar.', 'Sular usulca uçurmuş seni parmak uçlarıyla', 'İçindeki dünya dünyanın kendisi oluyor', 'C', 1),
(9, 3, '3', 'Aşağıdaki dizelerin/cümlelerin hangisinde, birden fazla tamlayan bir adı tamlamıştır?', '', 'Hep başkalarının işlerini yapmak, ona ağır gelmişti.', 'Sözlerin, cümlelerin ardında bir dünya var.', 'İnsanın, kendi eyleminin kölesi olduğunu bilmiyor mu?', 'İpekli kumaşların hışırtısı kulaklarını tırmalıyordu.', 'Onun yumuşak saçları yavaş yavaş uzar.', 'B', 1),
(12, 1, '4', 'İsmet Paşa\'nın generallik rütbesini almasında aşağıdaki hangi savaşın kazanılması etkili olmuştur?', '', 'Büyük Taarruz Savaşı', 'I. İnönü Savaşı', 'II. İnönü Savaşı', 'Kütahya-Eskişehir Savaşları', 'Sakarya Savaşı', 'B', 1),
(13, 1, '5', 'Sevr Barış Antlaşması\'nın geçersiz olmasının temel nedeni aşağıdakilerden hangisidir?', '', 'Osmanlı padişahı tarafından kabul edilmemesi', 'Saltanat Şurası tarafından imzalanması', 'Osmanlı Mebuslar Meclis\'i tarafından onaylanmaması', 'TBMM\'nin barış antlaşmasına katılmaması', 'Tek taralı olarak imzalanması', 'C', 1),
(14, 2, '4', 'Peygamberimizin hayatını inceleyen ilmin adı nedir?', '', 'Hadis', 'Siyer', 'Fıkıh', 'Tefsir', 'Kelam', 'B', 1),
(15, 2, '5', 'Peygamberimize şiddetle düşmanlık eden amcası Ebu Leheb hakkında inen sure hangisidir?', '', 'Zuhruf', 'Nasr', 'Kureyş', 'Tebbet', 'Vakıa', 'D', 1),
(16, 3, '4', 'Aşağıdakilerin hangisinde bir ad tamlaması vardır?', '', 'Odasının bu kadar dağınık olması beni üzdü.', 'Senin bunu yapacağını bilseydim buraya gelmezdim.', 'Kimsenin bize yardım etmediğini söylemek istemiyorum.', 'Adamın geçen yaz burada cüzdanı kaybolmuştu.', 'Çocuğun güzel güzel çalıştığını görünce sevindim.', 'D', 1),
(17, 3, '5', 'Aşağıdakilerin hangisinde tamlayanı düşmüş bir ad tamlaması yoktur?', '', 'Şarkısı ne zaman susmaya başlar hayatın', 'Öfkem zaman zaman kabaran bir ırmaktır.', 'Deniz gözlerime doğru yol alan bir martı mıdır?', 'Bu bahçe özlemlerimizi sürekli ayakta tutuyor.', 'Bir dağın yamacında değil miydi eviniz?', 'A', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testler`
--

DROP TABLE IF EXISTS `testler`;
CREATE TABLE IF NOT EXISTS `testler` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_konu_id` int(11) NOT NULL,
  `test_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `test_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `test_baslama_zamani` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `test_bitis_zamani` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `test_suresi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `test_durum` int(1) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `testler`
--

INSERT INTO `testler` (`test_id`, `test_konu_id`, `test_adi`, `test_aciklama`, `test_baslama_zamani`, `test_bitis_zamani`, `test_suresi`, `test_durum`) VALUES
(1, 1, 'KURTULUŞ SAVAŞI KONU TESTİ', 'Kurtuluş Savaşı Konu Testi', '2016-09-26 10:30:00', '2016-09-26 11:30:00', '60', 1),
(2, 2, 'PEYGAMBERİMİZİN HAYATI KONU TESTİ', 'Peygamberimizin Hayatı Konu Testi', '2016-09-26 10:30:00', '2016-09-26 11:30:00', '60', 1),
(3, 3, 'İSİM TAMLAMALARI KONU TESTİ', 'İsim Tamlamaları Konu Testi', '2016-09-26 10:30:00', '2016-09-26 11:30:00', '60', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_sinif_id` int(11) NOT NULL,
  `uye_kategori_id` int(11) NOT NULL,
  `uye_kullanici_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_sifre` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_eposta` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_adi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_soyadi` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_cinsiyet` int(1) NOT NULL,
  `uye_telefon` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_resim` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_kayit_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_grup` int(1) NOT NULL,
  `uye_durum` int(1) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_sinif_id`, `uye_kategori_id`, `uye_kullanici_adi`, `uye_sifre`, `uye_eposta`, `uye_adi`, `uye_soyadi`, `uye_cinsiyet`, `uye_telefon`, `uye_resim`, `uye_kayit_tarihi`, `uye_aciklama`, `uye_grup`, `uye_durum`) VALUES
(1, 1, 1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@localhost.com', 'Abdullah', '', 1, '+900000000000', 'no_avatar.png', '2016-09-26 11:18:30', 'Sistem Yöneticisi', 1, 1),
(2, 1, 1, 'Kübra', 'e10adc3949ba59abbe56e057f20f883e', 'kubra@localhost.com', 'Kübra', '', 0, '+900000000000', 'bayan.png', '2016-09-26 11:22:36', 'Öğrenci', 2, 1),
(3, 3, 3, 'Vedat', 'e10adc3949ba59abbe56e057f20f883e', 'vedat@localhost.com', 'Vedat', '', 1, '+900000000000', 'bay.png', '2016-09-26 11:25:31', 'Öğrenci', 2, 1),
(7, 1, 1, 'demo', 'e10adc3949ba59abbe56e057f20f883e', 'demo@localhost.com', 'Demo', '', 1, '', '', '2017-10-18 08:44:00', 'Öğrenci', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
