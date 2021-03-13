-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2021 at 10:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kit`
--

CREATE TABLE `kit` (
  `idKit` int(25) NOT NULL,
  `imei` varchar(25) NOT NULL,
  `serialNumber` varchar(25) NOT NULL,
  `modele` varchar(25) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `idClient` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kit`
--

INSERT INTO `kit` (`idKit`, `imei`, `serialNumber`, `modele`, `libelle`, `idClient`) VALUES
(4, '123456789123456', 'A123F44j77542G', 'MangOH Red', 'My_MangoRed_1', '2'),
(6, '123456789123236', 'A123F44j37D42G', 'MangOH Red', 'My_MangoRed_3', '22');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(20) NOT NULL,
  `mailEx` varchar(50) NOT NULL,
  `nomEx` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `lu` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `mailEx`, `nomEx`, `date`, `contenu`, `lu`) VALUES
(47, 'a@b.cdd', 'Nabil', '2018-08-16 18:14:00', 'Hello', 0),
(84, 'nabil@a.c', 'Nabil', '2021-03-06 09:01:29', 'Salut', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(20) UNSIGNED NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `departement` varchar(5) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motPasse` varchar(50) NOT NULL,
  `tel1` varchar(10) NOT NULL,
  `tel2` varchar(10) DEFAULT NULL,
  `companyName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `token` varchar(30) NOT NULL,
  `accountValidation` int(1) NOT NULL DEFAULT '1',
  `blocage` int(1) NOT NULL DEFAULT '0',
  `confirmKey` varchar(20) NOT NULL,
  `confirmMail` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `departement`, `adresse`, `email`, `motPasse`, `tel1`, `tel2`, `companyName`, `userName`, `token`, `accountValidation`, `blocage`, `confirmKey`, `confirmMail`) VALUES
(1, 'Admin', 'Admin', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'admin@projet-ltem.com', 'admin@projet-ltem.com', '0677121314', '0677121315', '', '', '', 1, 0, '535478726', 1),
(2, 'Default', 'User', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'utilisateur@projet-ltem.com', 'utilisateur@projet-ltem.com', '0677121316', '0677121317', '', '', '', 1, 0, '932864325', 1),
(23, 'Nabil', 'BOUHAR', '77', '4 allée buissonnière 77186', 'dn_bouhar@esi.dz', 'dn_bouhar@esi.dz', '0749291613', '0', 'simple_company_name', 'nabil_sur_octave', 'a1g4k5j86g1f4rj6vd4f2g5ju', 1, 0, '19346664287493133395', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`idKit`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kit`
--
ALTER TABLE `kit`
  MODIFY `idKit` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
