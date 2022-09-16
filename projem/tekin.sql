-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Nis 2021, 18:05:09
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tekin`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `acikartirma`
--

CREATE TABLE `acikartirma` (
  `acikartirma_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `alici_id` int(11) NOT NULL,
  `acikartirma_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acikartirma_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `acikartirma_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `acikartirma_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `acikartirma_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `acikartirma_ilkfiyat` int(9) NOT NULL,
  `acikartirma_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `acikartirma_bitir` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `acikartirma_onay` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `acikartirma`
--

INSERT INTO `acikartirma` (`acikartirma_id`, `kullanici_id`, `alici_id`, `acikartirma_zaman`, `acikartirma_seourl`, `acikartirma_resim`, `acikartirma_ad`, `acikartirma_detay`, `acikartirma_ilkfiyat`, `acikartirma_durum`, `acikartirma_bitir`, `acikartirma_onay`) VALUES
(10, 8, 7, '2021-04-23 17:24:09', '', 'img/urunfoto/608302b9b729e.png', 'ayakkabı', 'spor ayakkabı', 300, '0', '1', '2'),
(11, 8, 0, '2021-04-23 18:04:23', '', 'img/urunfoto/60830c275d2f6.png', 'Gözlük', 'Güneş gözlüğü', 150, '1', '0', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_mail`, `ayar_il`, `ayar_ilce`, `ayar_adres`) VALUES
(0, 'Tekinim E-Ticaret', 'Tekinim E-Ticaret Türkiye\'de Tek', 'tekinim, alışveriş, furkan, tekin', 'Furkan Tekin', '0505 505 55 55', '0505 505 55 55', 'furkantekin@trakya.edu.tr', 'İstanbul', 'Kartal', 'Kartal Merkez');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_onecikar`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'Elektronik', '1', 0, '1'),
(2, 'Spor', '1', 1, '1'),
(3, 'Moda', '1', 2, '1'),
(5, 'Süpermarket', '1', 3, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_magaza` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `kullanici_magazafoto` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'img/magaza-fotoyok.png',
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_zaman` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_banka` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_iban` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_firmaadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tip` enum('PERSONAL','PRIVATE_COMPANY','LIMITED_OR_JOINT_STOCK_COMPANY','') COLLATE utf8_turkish_ci DEFAULT 'PERSONAL',
  `kullanici_vdaire` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_vno` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_magaza`, `kullanici_magazafoto`, `kullanici_tc`, `kullanici_zaman`, `kullanici_banka`, `kullanici_iban`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_firmaadi`, `kullanici_tip`, `kullanici_vdaire`, `kullanici_vno`, `kullanici_yetki`, `kullanici_durum`) VALUES
(6, '0', 'img/magaza-fotoyok.png', '', '2021-04-23 14:39:11', '', NULL, 'Furkan', 'Tekin', 'furkantekin@trakya.edu.tr', '', '12345678', '', '', '', '', 'PERSONAL', '', '', '55', 1),
(7, '0', 'img/magaza-fotoyok.png', '', '2021-04-23 14:39:11', '', NULL, 'kullanici', 'hesap', 'kullanici@gmail.com', '', '123456', '', '', '', '', 'PERSONAL', '', '', '1', 1),
(8, '2', 'img/magaza-fotoyok.png', '', '2021-04-23 15:20:13', 'garanti', 'TR33333333', 'magaza', 'hesap', 'magaza@gmail.com', '505 55 55', '123456', 'sahil', 'İstanbul', 'Maltepe', '', 'PERSONAL', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `siparis_odeme` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `kullanici_id`, `kullanici_idsatici`, `siparis_odeme`) VALUES
(750041, '2021-04-23 16:41:51', 7, 8, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(3) NOT NULL,
  `siparisdetay_onay` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `kullanici_id`, `kullanici_idsatici`, `urun_id`, `urun_fiyat`, `urun_adet`, `siparisdetay_onay`) VALUES
(55, 750041, 7, 8, 52, 2300.00, 0, '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urunfoto_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_satis` int(4) NOT NULL DEFAULT '0',
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kullanici_id`, `kategori_id`, `urun_zaman`, `urun_seourl`, `urunfoto_resimyol`, `urun_ad`, `urun_detay`, `urun_fiyat`, `urun_satis`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(52, 8, 1, '2021-04-23 15:59:43', '', 'img/urunfoto/6082eeef408aa.png', 'htc telefon', '8 magapixel kamera', 2300.00, 0, 0, '1', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `acikartirma`
--
ALTER TABLE `acikartirma`
  ADD PRIMARY KEY (`acikartirma_id`);

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `acikartirma`
--
ALTER TABLE `acikartirma`
  MODIFY `acikartirma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750042;
--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
