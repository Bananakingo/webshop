-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 apr 2024 om 20:19
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avansperiode3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `productnummer` int(10) NOT NULL,
  `productnaam` varchar(30) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `beschrijving` varchar(9999) NOT NULL,
  `leverbaar` enum('ja','nee') DEFAULT NULL,
  `voorraad` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productnummer`, `productnaam`, `prijs`, `beschrijving`, `leverbaar`, `voorraad`) VALUES
(111, 'OMNIGRIT PRO', 35.00, 'OMNIGRIT PRO, the best product for your needs. Perfect for woodwork.', 'ja', 12),
(222, 'OMNIGRIT ENDURO', 55.00, 'OMNIGRIT ENDURO will last longer than any type of abrasive. Suitable for Paint.', 'ja', 24),
(333, 'OMNIGRIT TITANIUM', 50.00, 'OMNIGRIT TITATIUM is the best product to sand fast. Can act from grit 40 to 80.', 'ja', 124),
(444, 'OMNIGRIT BASIC', 30.00, 'OMNIGRIT BASIC will help you with work around the house.', 'nee', 500),
(555, 'OMNIGRIT SUPER', 35.00, 'OMNIGRIT SUPER is for the DIY people who don\'t waht to miss out on the good stuff.', 'ja', 450),
(666, 'OMNIGRIT GRAVEL', 300.00, 'OMNIGRIT GRAVEL is compatible with all OMNIGRIT products. Compatible with products from marketleaders like festool.', 'ja', 34);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productnummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
