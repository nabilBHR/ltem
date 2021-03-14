-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 14 mars 2021 à 14:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ltem_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `kit`
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
-- Déchargement des données de la table `kit`
--

INSERT INTO `kit` (`idKit`, `imei`, `serialNumber`, `modele`, `libelle`, `idClient`) VALUES
(24, '352653090199969', '4L935170430610', 'wp7702_item1', 'WP7702', '24');

-- --------------------------------------------------------

--
-- Structure de la table `message`
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
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `mailEx`, `nomEx`, `date`, `contenu`, `lu`) VALUES
(47, 'a@b.cdd', 'Nabil', '2018-08-16 18:14:00', 'Hello', 0),
(84, 'nabil@a.c', 'Nabil', '2021-03-06 09:01:29', 'Salut', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
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
  `token` varchar(40) NOT NULL,
  `accountValidation` int(1) NOT NULL DEFAULT '1',
  `blocage` int(1) NOT NULL DEFAULT '0',
  `confirmKey` varchar(20) NOT NULL,
  `confirmMail` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `departement`, `adresse`, `email`, `motPasse`, `tel1`, `tel2`, `companyName`, `userName`, `token`, `accountValidation`, `blocage`, `confirmKey`, `confirmMail`) VALUES
(1, 'Admin', 'Admin', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'admin@projet-ltem.com', 'admin@projet-ltem.com', '0677121314', '0677121315', '', '', '', 1, 0, '535478726', 1),
(24, 'Demo', 'User', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'utilisateur@projet-ltem.com', 'utilisateur@projet-ltem.com', '0749291613', '0', 'universit_gustave_eiffel', 'yacine_hadjar', 'shAixQsXspB5bJ6LpKBCD6myetVX86po', 1, 0, '96967595399564169742', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`idKit`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `kit`
--
ALTER TABLE `kit`
  MODIFY `idKit` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
