-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Ağu 2018, 21:34:46
-- Sunucu sürümü: 10.1.34-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `restaurant`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `number_waiter` (IN `tablid` VARCHAR(3), IN `date` DATETIME)  NO SQL
IF(tablid='ALL') THEN
SELECT COUNT(waitername) from assignment WHERE date BETWEEN begintime AND endtime;
ELSE
SELECT COUNT(waitername) from assignment WHERE tablid=tableid AND  date BETWEEN begintime AND endtime ;
END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins_pass`
--

CREATE TABLE `admins_pass` (
  `name` text COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Tablo döküm verisi `admins_pass`
--

INSERT INTO `admins_pass` (`name`, `password`) VALUES
('bera', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `assignment`
--

CREATE TABLE `assignment` (
  `ID` int(5) NOT NULL,
  `tableid` int(5) NOT NULL,
  `waitername` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `begintime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `headwaiters`
--

CREATE TABLE `headwaiters` (
  `name` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tables`
--

CREATE TABLE `tables` (
  `id` int(5) NOT NULL,
  `no_of_seats` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Tetikleyiciler `tables`
--
DELIMITER $$
CREATE TRIGGER `new_trigger` AFTER INSERT ON `tables` FOR EACH ROW IF (EXISTS (SELECT * FROM waiter AS x WHERE NOT EXISTS(SELECT * FROM assignment AS o WHERE x.name=o.waitername AND NOW() BETWEEN o.begintime AND o.endtime)))
THEN
INSERT INTO assignment(tableid,waitername,begintime,endtime) SELECT NEW.id,name,NOW(),(SELECT DATE_ADD(NOW(),INTERVAL 1 HOUR))AS r FROM (SELECT * FROM waiter AS x WHERE NOT EXISTS(SELECT * FROM assignment AS o WHERE x.name=o.waitername AND NOW() BETWEEN o.begintime AND o.endtime)) AS q LIMIT 1;

END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `waiter`
--

CREATE TABLE `waiter` (
  `name` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `deneme` (`tableid`),
  ADD KEY `deneme2` (`waitername`);

--
-- Tablo için indeksler `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`name`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `deneme` FOREIGN KEY (`tableid`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deneme2` FOREIGN KEY (`waitername`) REFERENCES `waiter` (`name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
