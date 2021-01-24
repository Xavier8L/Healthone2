-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jan 2021 om 18:01
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
('DoctrineMigrations\\Version20210104102557', '2021-01-04 11:26:04', 65),
('DoctrineMigrations\\Version20210111111436', '2021-01-11 12:15:24', 639),
('DoctrineMigrations\\Version20210118091854', '2021-01-18 10:19:21', 1339),
('DoctrineMigrations\\Version20210121103903', '2021-01-21 11:39:24', 696);

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
(1, 'paracetamol', 'Paracetamol is een pijnstiller. Het verlaagt ook koorts.', 'moe', 1, 30),
(2, 'Viread', 'Het virus dat hiv veroorzaakt stimuleert onze lichaamscellen om nieuwe hiv-virussen aan te maken. Daarvoor is het enzym reverse-transcriptase nodig. Tenofovir disoproxil remt dit enzym en voorkomt zo dat nieuwe virussen worden gemaakt. Tenofovir disoproxil kan het virus niet volledig laten verdwijnen. Wel kan het de hoeveelheid virus in het bloed drastisch verlagen. Hierdoor neemt het aantal witte bloedcellen toe en komt de afweer weer op peil. Omdat het virus snel geneigd is ongevoelig (resistent) te worden, kan het alleen in combinatie met andere hiv-remmers worden toegepast.', 'Soms (bij 10 tot 30 op de 100 mensen)\r\n\r\nMaagdarmklachten, zoals misselijkheid, braken, diarree, zelden buikpijn en winderigheid. Raadpleeg uw arts als u hier last van blijft houden.\r\nDuizeligheid. Raadpleeg uw arts als u hier last van blijft houden.\r\nSlap gevoel.\r\nZwakkere botten en botpijn door botontkalking (osteoporose). U heeft dan meer kans op een botbreuk. Dit ontstaat door een gebrek aan fosfaat in het bloed. Door extra fosfaat te gebruiken (in een voedingssupplement) is deze bijwerking te verminderen.\r\nHuiduitslag. Huiduitslag kan door overgevoeligheid komen maar dat hoeft niet (zie Zeer zelden: overgevoeligheid).\r\nBij mensen die daarvoor gevoelig zijn, kunnen verschijnselen van diabetes (suikerziekte) ontstaan. Zij merken dit doordat zij veel dorst krijgen en veel moeten plassen. Mensen met diabetes kunnen tijdens de behandeling meer insuline of glucoseverlagers nodig hebben. Meet extra vaak uw bloedglucose.', 0, 130);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patienten`
--

CREATE TABLE `patienten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoonummer` int(11) NOT NULL,
  `verzekeringsnummer` int(11) NOT NULL,
  `aandoeningen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `patienten`
--

INSERT INTO `patienten` (`id`, `naam`, `geboortedatum`, `adres`, `email`, `telefoonummer`, `verzekeringsnummer`, `aandoeningen`) VALUES
(1, 'Xavier', '1999-01-20', 'denhaag', 'hh@gmail.com', 612580, 3123123, NULL),
(2, 'Jordi', '2002-04-11', 'hagland123', 'jordi@email.com', 61234567, 12312312, 'alcohol vrij');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `id` int(11) NOT NULL,
  `medicijn_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recepten`
--

INSERT INTO `recepten` (`id`, `medicijn_id`, `datum`, `periode`, `patient_id`) VALUES
(1, 2, '2016-01-01', '2 keer per week', 1),
(5, 1, '2021-01-24', '2 keer per week', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'medewerker', '[\"ROLE_MEDEWERKER\"]', '$argon2id$v=19$m=65536,t=4,p=1$eWtGeXNwb2w3L1ZaTTc2MA$zStfANJJ5c9WflIpcWZsoLvHFon1DFyve//EyZ56AlU'),
(3, 'doctor', '[\"ROLE_DOCTOR\"]', '$argon2id$v=19$m=65536,t=4,p=1$eWtGeXNwb2w3L1ZaTTc2MA$zStfANJJ5c9WflIpcWZsoLvHFon1DFyve//EyZ56AlU'),
(4, 'apotheker', '[\"ROLE_APOTHEKER\"]', '$argon2id$v=19$m=65536,t=4,p=1$eWtGeXNwb2w3L1ZaTTc2MA$zStfANJJ5c9WflIpcWZsoLvHFon1DFyve//EyZ56AlU');

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
-- Indexen voor tabel `patienten`
--
ALTER TABLE `patienten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72C1CA2DFC35CB` (`medicijn_id`),
  ADD KEY `IDX_72C1CA26B899279` (`patient_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `patienten`
--
ALTER TABLE `patienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `FK_72C1CA26B899279` FOREIGN KEY (`patient_id`) REFERENCES `patienten` (`id`),
  ADD CONSTRAINT `FK_B92268A1DFC35CB` FOREIGN KEY (`medicijn_id`) REFERENCES `medicijnen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
