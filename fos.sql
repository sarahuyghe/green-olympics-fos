-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2019 at 10:55 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inzendingen`
--

CREATE TABLE `inzendingen` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `videoPlatform` varchar(255) NOT NULL,
  `embed` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `extraPoints` int(11) NOT NULL,
  `opdracht_id` int(11) NOT NULL,
  `scouts_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `commentaar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `months` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `beginDate` datetime NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `months`, `title`, `image`, `beginDate`, `endDate`) VALUES
(1, 'Heel het jaar', 'Nondedjuurzaam', './assets/img/oktober.png', '2019-09-01 00:00:00', '2020-05-01'),
(2, 'Oktober', 'Fossen in de bossen', './assets/img/oktober.png', '2019-10-01 00:00:00', '2019-11-01'),
(3, 'November', 'Samen sterk', '', '2019-11-01 00:00:00', '2019-12-01'),
(4, 'December & Januari', 'Zero-hero', '', '2019-12-01 00:00:00', '2020-02-01'),
(5, 'Februari', 'Kleine beetjes maken groot', '', '2020-02-01 00:00:00', '2020-03-01'),
(6, 'Maart', 'Je bent wat je eet', '', '2020-03-01 00:00:00', '2020-04-01'),
(7, 'April', 'The final countdown', '', '2020-04-01 00:00:00', '2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `opdrachten`
--

CREATE TABLE `opdrachten` (
  `id` int(11) NOT NULL,
  `opdracht` varchar(200) NOT NULL,
  `uitleg` text NOT NULL,
  `linkToPDF` varchar(200) NOT NULL,
  `linkTitel` varchar(200) NOT NULL,
  `punten` int(11) NOT NULL,
  `months_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opdrachten`
--

INSERT INTO `opdrachten` (`id`, `opdracht`, `uitleg`, `linkToPDF`, `linkTitel`, `punten`, `months_id`) VALUES
(1, 'Speel een spel dat wij in elkaar staken ', 'Moe van Saamdagen? Geen probleem! Wij zorgden alvast voor een energizer om de activiteit te beginnen. Speel dit ecologisch spel en maak er een vlog van.', '', '', 10, 2),
(2, 'Organiseer een mini – eco – fuif', 'Duurzaamheid is een feest. Organiseer een mini-eco-fuif en dans als een beest. Stuur ons een filmpje door van jullie beste dance-moves.  ', '', '', 10, 2),
(3, 'Vogelhuisjes en vetbollen', 'Verwen de vogeltjes in jullie buurt met een zelfgemaakt vogelhuisje of met lekkere vetbollen.', 'assets/documents/opdracht_vetbol_vogels.pdf', 'Recept voor vetbol', 10, 2),
(4, 'Exoten bestrijden', 'Exoten zijn planten of dieren die van nature niet in deze streken voorkomen, maar ze hebben zich kunnen verspreiden door toedoen van de mens. Vaak onderdrukken deze invasieve soorten inheemse soorten. Deze negatieve impact moet dus zoveel mogelijk beperkt worden. Toon hoe jullie dit zouden doen?', '', '', 10, 2),
(5, 'Plant zoveel mogelijk bomen', 'Wees creatief!', '', '', 10, 2),
(6, 'Kampvuur zonder vuur ', 'Een gewoon kampvuur is slecht voor het milieu en ook cliché. Daar doen we niet meer aan mee. Wie kan het meest originele kampvuur verzinnen? Stuur het door en misschien inspireer je de volgende zomerkampen wel! \r\nPS: 2 uur kampvuur branden produceert even veel fijn stof als 300 km met een vrachtwagen rijden.', '', '', 10, 2),
(7, 'Doe iets met natuurpunt, voedselbanken, … ', 'Het is al langer dan vandaag klaar en duidelijk: wij zijn allen meer dan onze eenheid op zich. We verbroederen en hebben een ongelooflijke verbondenheid tussen de eenheden en daar plukken we hoe dan ook de vruchten van! Voor de opdracht willen we nog een stapje verder gaan. Ga op zoek naar een organisatie die bezig is met een duurzaam project en ga samen een activiteit aan met hen. Een aantal mogelijkheden: Natuurpunt, voedselbanken, JNM, Climate express, Mooimakers,…', '', '', 10, 3),
(8, 'Benefiet voor een groen doel', 'Organiseer met de hele eenheid een ecologisch benefiet. De opbrengst ervan doneer je aan een groen doel naar keuze.', '', '', 10, 3),
(9, 'Rommelmarkt / closetsale ', 'Je genderneutraal-politiek correct speelgoed of barbies staan al jaren stof te vergaren. Daar kan je zeker een bever of zeehond gelukkig mee maken. Organiseer een rommelmarkt en zet de afvalberg op dieet.', '', '', 10, 3),
(10, 'Mini klimaatmars ', 'Organiseer een miniklimaatmars met maxipret en maak jouw buurt warm voor het klimaat.', '', '', 10, 3),
(11, 'Boerderijdag', 'Organiseer een boerderij-dag al dan niet in samenwerking met iemand die er iets van kent. Giet het in een spel of doe er iets anders origineel mee. Hoe dan ook leer je die dag samen met je tak hoe je moet moestuinieren!', '', '', 10, 3),
(12, 'Ecologisch spel', 'Maak een klein spel en deel het met ons!', '', '', 10, 3),
(13, 'Ruilkast ', 'Zet een open kast in je scouts waar je anoniem bruikbare kleine spullen gratis kan achterlaten of meenemen.', '', '', 10, 4),
(14, 'Duurzame kerstpakjesruil', 'Ho ho ho! De kerstman doet dit jaar niet enkel jou, maar ook de natuur een plezier. Organiseer een secret Santa en geef enkel duurzame geschenken (Kijk eens wat je thuis nog liggen hebt, maak zelf iets, koop iets tweedehands...).', '', '', 10, 4),
(15, 'Zwerfvuilactie ', 'Iedereen kent de slogan ondertussen ‘fossen in de bossen’, maar wij willen ook op andere propere plaatsen kunnen fossen. Ga met je eenheid op een creatieve manier aan de slag en maak jullie favoriete plaats proper. Ga eens langs op de website van Mooimakers waar je heel wat tips en gratis materiaal kan verkrijgen!', '', '', 10, 4),
(16, 'Kunstwerk uit afval ', 'De titel zegt het helemaal. Maak een prachtig kunstwerk met afval.', '', '', 10, 4),
(17, 'No plastic-day', 'maar dan zeer ‘Xtreme’, maak er een vlog van.', '', '', 10, 4),
(18, 'Natuurfilmavond ', 'Een filmavond is altijd gezellig: dekentje, (bio-)popcorn,... voeg daar de zwoele stem van Sir David Attenborough aan toe en je krijgt een avond vol prachtige natuurbeelden, grappige dieren (ook goed om je totemdier te leren kennen) en je leert ook nog iets bij. Tv tip: Our planet, Planet earth en The Blue planet.', '', '', 10, 4),
(19, '12/02 dikke truiendag ', 'Haal met je eenheid de ugly christmas sweaters van onder het stof en draai de verwarming uit. Maak een foto met de allerbeste winter-outfits.', '', '', 10, 5),
(20, 'Wieltjesdag', 'Laat iedereen per step, skateboard, kruiwagen, zeepkist, bakfiets, eenwieler of ander uitstootvrij-voertuig op wieltjes naar de scouts komen en doe eens zot! Maak filmpjes of stuur je coolste photofinish door!', '', '', 10, 5),
(21, 'Zelf ecologische zeep maken', 'Ken je het dat je een hoop hotelzeepjes thuis hebt liggen maar er niets mee kan doen? neem ze mee naar de scouts en maak je eigen ecologische zeep door deze een tweede leven te geven.', 'assets/documents/opdracht_zelfgemaakte_zeep.pdf', 'Recept voor zeep', 10, 5),
(22, 'Voorzie sorteerhoekjes in elk lokaal', 'plastic flessen en flacons, metalen verpakkingen, drankkartons. Sorteren, recycleren wie zijn best doet zal het leren.', '', '', 10, 5),
(23, 'Maak een fanatiek zero-waste filmpje over het milieu', 'Heb je altijd al eens willen shinen in een filmpje? En doe je dit het liefst van al nog zonder afval? Wordt dan de ster van het zero waste filmpje van jouw eenheid.\r\nZero Waste betekent het elimineren van alles dat lozingen in grond, water of lucht tot gevolg heeft en die een bedreiging vormen voor de gezondheid van de planeet, mens, dier of plant.\r\n', '', '', 10, 5),
(24, 'Bouw een wilgenhut', 'Er zijn meer dan driehonderd soorten wilgen. Met dit weetje gaan we over naar onze volgende challenge. Bouw met je eenheid een wilgenhut en verdien punten.', 'assets/documents/opdracht_wilgenhut.pdf', 'Wilgenhut', 10, 5),
(25, 'Bouw een composthoop op je terrein', 'Knutsel een compostbak in elkaar voor op jullie terrein en versier hem op een ecologische manier!', 'assets/documents/opdracht_composthoop_maken.pdf', 'Composthoop maken', 10, 6),
(26, 'Insectenhotel', 'Bouw jullie eigen insectenhotel en verwerk het logo van je eenheid erin. Zorg dat het insectenhotel in een bloemenrijke omgeving staat!', 'assets/documents/opdracht_insectenhotel.pdf', 'Bouw je eigen insectenhotel', 10, 6),
(27, 'Ecologie op je boterham', 'Maak jullie eigen choco of confituur en laat hem blind quoteren door een volwaardige jury. Laat jullie eigen choco het opnemen tegen een choco uit de winkel! Gebruik het recept uit de pdf als je het kan ontcijferen.', 'assets/documents/opdracht_choco.pdf', 'Recept choco', 10, 6),
(28, 'Maak een Moestuintje', 'Richt een moestuintje op in of in de buurt van de scouts. Je kan hiervoor hulp vragen aan de buurtbewoners om het verder te kunnen onderhouden!', '', '', 10, 6),
(29, 'Vegetarisch Koken', 'Organiseer een kookvergadering waarbij je enkel gebruik maakt van lokale producten. Deze producten zijn bovendien vegetarisch!', '', '', 10, 6),
(30, 'Waterzuiveringsinstallatie', 'Slechts 0,00775% van het water in de wereld is toegankelijk drinkbaar water. Deze voorraad krimpt snel. En jij hebt grote dorst! Maak daarom een waterzuiveringsinstallatie zoals een echte scout kan', '', '', 10, 7),
(31, 'Zelf elektriciteit opwekken ', 'Jouw eenheid barst van de energie. Bewijs het en wek zelf energie op (op een duurzame manier)', '', '', 10, 7),
(32, 'Haal het nieuws met een eco-actie', 'Ben jij het ook beu? Scouts en Gidsen Vlaanderen op je tv? doe er dan wat aan. ;-) Organiseer zelf een eco-actie waarmee je het nieuws/krant haalt. Je hebt hiervoor tijd tot het einde van de maand', '', '', 10, 7),
(33, 'Maak een videoclip en rap/zing over het milieu en de natuur', 'Haal je innerlijke Britney Spears boven en maak een catchy hitsingle met bijhorende videoclip over het milieu/klimaat', '', '', 10, 7),
(34, 'Herbruikbare bekers', 'Ontleen en gebruik onze herbruikbare bekers!', '', '', 10, 1),
(35, 'Verdien de badge ‘ecoloog’', 'Ga met je tak aan de slag en verdien samen de badge “Ecoloog”. Let op: dit is een vereenvoudigde versie van de originele badge. Voeg gerust zelf nog zaken toe om het leuker/interessanter/wilder/leerrijker/… te maken', 'assets/documents/opdracht_badge_ecoloog.pdf', 'Verdien de badge \'Ecoloog\'', 10, 1),
(36, 'Natuurelementen', 'Probeer eens kampaandenkens te maken uit natuurelementen. Hout is je beste vriend!', '', '', 10, 1),
(37, 'Spelmateriaal', 'We durven al snel eens naar de action gaan om het volgende spelmateriaal voor de scouts aan te kopen. Helaas is dat spelmateriaal vaak ook maar bruikbaar voor 1 activiteit. Uitdaging: maak je eigen duurzaam spelmateriaal…', '', '', 10, 1),
(38, 'Sjorren', 'Wist je dat je ook constructies kan bouwen zonder touw? Maak een Da vinci brug of eigen creatie!', '', '', 10, 1),
(39, 'Vrije bijdrage', 'Ben je best wel trots op een duurzaam aspect binnen je eenheid en denk je dat andere eenheden er iets kunnen aan hebben? Deel en overtuig ons en misschien krijg je er wel punten voor!', '', '', 10, 1),
(40, 'extra punten toekennen', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scouts`
--

CREATE TABLE `scouts` (
  `id` int(11) NOT NULL,
  `scouts` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scouts`
--

INSERT INTO `scouts` (`id`, `scouts`) VALUES
(1, 'Lange Wapper'),
(2, 'Westhinder'),
(3, 'Wilde Eend'),
(4, 'Mercator'),
(5, '\'t Vloedgat'),
(6, 'Wandelaar'),
(7, 'De Boekaniers'),
(8, 'De Faunaten'),
(9, '\'t Kraaienest'),
(10, 'Prins Albert'),
(11, 'De Jolle'),
(12, 'Tom Wilson'),
(13, 'De Sperwer'),
(14, 'De Navajo\'s'),
(15, 'De Jakketoes'),
(16, 'De Menapiërs'),
(17, 'De Schrans'),
(18, 'Tuulihaukat'),
(19, 'Kludde'),
(20, 'De Albatros'),
(21, 'First Brussels'),
(22, 'Central Brussels'),
(23, 'Scouterna Bryssel'),
(24, 'De Zwaluw'),
(25, 'Roodbaard'),
(26, 'De Koala\'s'),
(27, 'De Kangoeroes'),
(28, 'De Feniks'),
(29, 'De Havik'),
(30, 'De Ouistiti\'s'),
(31, 'De Bevers'),
(32, 'De Kievit'),
(35, 'De Reiger'),
(36, 'De Wouw'),
(37, 'De Vleermuis'),
(38, 'De Tortels'),
(39, 'Impeesa'),
(40, 'De Flamingo\'s'),
(41, 'De Eekhoorn'),
(42, 'De Vrijbuiters'),
(43, 'Dakota\'s'),
(44, 'De Hinde'),
(45, 'De Kariboes'),
(46, 'De Leeuwerik'),
(47, 'Durendael'),
(48, 'De Grizzly'),
(49, 'Pepijn'),
(50, 'De Dolfijn'),
(51, 'De Vlievleger'),
(52, 'De Zebra\'s'),
(53, 'De Leeuwkens'),
(54, 'Hermes'),
(55, 'De Toekan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@hotmail.com', '$2y$10$d/hEKi1JTUGaYzrA1mXHse4kx0QLVEPuEV149S5NKveIB/.4PEexq'),
(2, 'test2019@hotmail.com', '$2y$10$DFb2lwEVVxL3dKpLvK6wFuGGfDvGPYcGtFUbk3Ffp449jkrOYBmVW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inzendingen`
--
ALTER TABLE `inzendingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opdrachten`
--
ALTER TABLE `opdrachten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scouts`
--
ALTER TABLE `scouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inzendingen`
--
ALTER TABLE `inzendingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `opdrachten`
--
ALTER TABLE `opdrachten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `scouts`
--
ALTER TABLE `scouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
