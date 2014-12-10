-- Adminer 3.7.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `auto`;
CREATE TABLE `auto` (
  `id_auta` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(45) NOT NULL,
  `objem` varchar(45) NOT NULL,
  `nosnost` varchar(45) NOT NULL,
  `pocet` varchar(45) NOT NULL,
  `vybaveni` varchar(45) DEFAULT NULL,
  `pocet_sezeni` varchar(45) DEFAULT NULL,
  `technika` varchar(45) DEFAULT NULL,
  `delka_plochy` varchar(45) DEFAULT NULL,
  `cena` int(11) NOT NULL,
  `vyrazeno` smallint(1) NOT NULL,
  `preprava_id` int(11) NOT NULL,
  `uzivatele_id` int(11) NOT NULL,
  PRIMARY KEY (`id_auta`),
  KEY `fk_auto_preprava1_idx` (`preprava_id`),
  KEY `fk_auto_uzivatele1_idx` (`uzivatele_id`),
  CONSTRAINT `fk_auto_preprava1` FOREIGN KEY (`preprava_id`) REFERENCES `preprava` (`id_prepravy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_auto_uzivatele1` FOREIGN KEY (`uzivatele_id`) REFERENCES `uzivatele` (`id_uzivatele`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `firma`;
CREATE TABLE `firma` (
  `nazev` varchar(45) NOT NULL,
  `ulice` varchar(45) DEFAULT NULL,
  `mesto` varchar(45) DEFAULT NULL,
  `psc` varchar(45) DEFAULT NULL,
  `mobil` varchar(45) DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `soubor` varchar(45) NOT NULL,
  `auto_id` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fk_foto_auto1_idx` (`auto_id`),
  CONSTRAINT `fk_foto_auto1` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id_auta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `objednavky`;
CREATE TABLE `objednavky` (
  `id_objednavky` int(11) NOT NULL AUTO_INCREMENT,
  `datum` datetime NOT NULL,
  `zakaznici_id` int(11) NOT NULL,
  `preprava_id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `vyrizeno` smallint(1) NOT NULL,
  PRIMARY KEY (`id_objednavky`),
  KEY `fk_objednavky_zakaznici_idx` (`zakaznici_id`),
  KEY `fk_objednavky_preprava1_idx` (`preprava_id`),
  KEY `fk_objednavky_auto_idx` (`auto_id`),
  CONSTRAINT `fk_objednavky_preprava1` FOREIGN KEY (`preprava_id`) REFERENCES `preprava` (`id_prepravy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_objednavky_zakaznici` FOREIGN KEY (`zakaznici_id`) REFERENCES `zakaznici` (`id_zakaznika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `objednavky_ibfk_1` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`id_auta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `preprava`;
CREATE TABLE `preprava` (
  `id_prepravy` int(11) NOT NULL AUTO_INCREMENT,
  `nazev_prepravy` varchar(45) NOT NULL,
  PRIMARY KEY (`id_prepravy`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `stranky`;
CREATE TABLE `stranky` (
  `id_stranky` int(2) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `obsah` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_stranky`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

DROP TABLE IF EXISTS `uzivatele`;
CREATE TABLE `uzivatele` (
  `id_uzivatele` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `heslo` varchar(130) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_uzivatele`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `zakaznici`;
CREATE TABLE `zakaznici` (
  `id_zakaznika` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(32) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `ulice` varchar(45) NOT NULL,
  `mesto` varchar(45) NOT NULL,
  `psc` varchar(45) NOT NULL,
  `datum_registrace` datetime NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_zakaznika`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- 2014-12-08 09:21:34
