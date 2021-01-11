-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jan 2021 om 23:50
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthe2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201214101520', '2020-12-14 12:10:44', 557),
('DoctrineMigrations\\Version20210104100807', '2021-01-04 11:10:28', 113),
('DoctrineMigrations\\Version20210104102407', '2021-01-04 11:24:40', 32),
('DoctrineMigrations\\Version20210104102557', '2021-01-04 11:26:04', 65);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `werking` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bijwerking` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verzekerd` tinyint(1) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `werking`, `bijwerking`, `verzekerd`, `prijs`) VALUES
(1, 'pa', 'warm', 'moe', 1, 150),
(2, 'Viread', 'Het virus dat hiv veroorzaakt stimuleert onze lichaamscellen om nieuwe hiv-virussen aan te maken. Daarvoor is het enzym reverse-transcriptase nodig. Tenofovir disoproxil remt dit enzym en voorkomt zo dat nieuwe virussen worden gemaakt. Tenofovir disoproxil kan het virus niet volledig laten verdwijnen. Wel kan het de hoeveelheid virus in het bloed drastisch verlagen. Hierdoor neemt het aantal witte bloedcellen toe en komt de afweer weer op peil. Omdat het virus snel geneigd is ongevoelig (resistent) te worden, kan het alleen in combinatie met andere hiv-remmers worden toegepast.', 'Soms (bij 10 tot 30 op de 100 mensen)\r\n\r\nMaagdarmklachten, zoals misselijkheid, braken, diarree, zelden buikpijn en winderigheid. Raadpleeg uw arts als u hier last van blijft houden.\r\nDuizeligheid. Raadpleeg uw arts als u hier last van blijft houden.\r\nSlap gevoel.\r\nZwakkere botten en botpijn door botontkalking (osteoporose). U heeft dan meer kans op een botbreuk. Dit ontstaat door een gebrek aan fosfaat in het bloed. Door extra fosfaat te gebruiken (in een voedingssupplement) is deze bijwerking te verminderen.\r\nHuiduitslag. Huiduitslag kan door overgevoeligheid komen maar dat hoeft niet (zie Zeer zelden: overgevoeligheid).\r\nBij mensen die daarvoor gevoelig zijn, kunnen verschijnselen van diabetes (suikerziekte) ontstaan. Zij merken dit doordat zij veel dorst krijgen en veel moeten plassen. Mensen met diabetes kunnen tijdens de behandeling meer insuline of glucoseverlagers nodig hebben. Meet extra vaak uw bloedglucose.', 0, 130),
(3, 'asd', 'dsada', 'sdwadwa', 0, 23),
(4, 'asd', 'dsada', 'sdwadwa', 0, 23);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
