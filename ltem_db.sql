-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 06 mars 2021 à 21:44
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
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
  `idCompteur` int(25) UNSIGNED NOT NULL,
  `numeroCompteur` varchar(25) NOT NULL,
  `consommation` int(25) NOT NULL DEFAULT '0',
  `idClient` varchar(25) NOT NULL,
  `supprime` int(1) NOT NULL DEFAULT '0',
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compteur`
--

INSERT INTO `compteur` (`idCompteur`, `numeroCompteur`, `consommation`, `idClient`, `supprime`, `libelle`) VALUES
(1, '11235617464', 98754, '2', 0, 'Compteur maison'),
(2, '11465464522', 234, '2', 0, 'Compteur magasin'),
(22, '12234436', 0, '21', 0, 'compteur 3'),
(23, '2314235215', 0, '2', 0, 'erkdsdfjh'),
(24, '2314235215321cdsdsvfsb', 0, '2', 0, 'cdsvdsv'),
(25, '23142352122', 0, '2', 0, 'erkdsdfjh');

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
  `numeroAbonne` varchar(25) NOT NULL,
  `departement` varchar(5) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motPasse` varchar(50) NOT NULL,
  `tel1` varchar(10) NOT NULL,
  `tel2` varchar(10) DEFAULT NULL,
  `accountValidation` int(1) NOT NULL DEFAULT '1',
  `blocage` int(1) NOT NULL DEFAULT '0',
  `confirmKey` varchar(20) NOT NULL,
  `confirmMail` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `numeroAbonne`, `departement`, `adresse`, `email`, `motPasse`, `tel1`, `tel2`, `accountValidation`, `blocage`, `confirmKey`, `confirmMail`) VALUES
(1, 'Admin', 'Admin', '114654', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'admin@projet-ltem.com', 'admin@projet-ltem.com', '0677121314', '0677121315', 1, 0, '535478726', 1),
(2, 'Default', 'User', '112356', '77', '5 Boulevard Descartes, 77420 Champs-sur-Marne', 'utilisateur@projet-ltem.com', 'utilisateur@projet-ltem.com', '0677121316', '0677121317', 1, 0, '932864325', 1),
(18, 'Nabil', 'Bouhar', '12345', '77', '4 allée buissonnière 77186', 'dn_bouhar@esi.dz', 'dn_bouhar@esi.dz', '0749291613', '0', 1, 0, '15473787959169179736', 1),
(21, 'ali', 'lou', '51254748', '75', '4 allée buissonniere noisiel', 'utilisateur2@projet-ltem.com', 'mdp2021', '0787654314', '0', 1, 0, '31772351471282372261', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD PRIMARY KEY (`idCompteur`);

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
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
  MODIFY `idCompteur` int(25) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
