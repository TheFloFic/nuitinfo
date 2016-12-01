-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 02 Décembre 2016 à 00:28
-- Version du serveur :  5.5.53-0+deb8u1
-- Version de PHP :  5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_nuit`
--

-- --------------------------------------------------------

--
-- Structure de la table `ASSOCIATION`
--

CREATE TABLE IF NOT EXISTS `ASSOCIATION` (
`id_asso` int(11) NOT NULL,
  `nom_asso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ASSO_LIEU`
--

CREATE TABLE IF NOT EXISTS `ASSO_LIEU` (
  `id_ville` int(11) NOT NULL,
  `id_asso` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `BESOIN_GERE`
--

CREATE TABLE IF NOT EXISTS `BESOIN_GERE` (
  `id_asso` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ITEM`
--

CREATE TABLE IF NOT EXISTS `ITEM` (
  `id_item` int(11) NOT NULL,
  `nom_item` varchar(50) NOT NULL,
  `perissable` tinyint(1) NOT NULL,
  `importance` int(11) NOT NULL,
  `type_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `STOCK`
--

CREATE TABLE IF NOT EXISTS `STOCK` (
  `id_ville` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantite` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_BESOIN`
--

CREATE TABLE IF NOT EXISTS `TYPE_BESOIN` (
`id_type` int(11) NOT NULL,
  `nom_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `VILLE`
--

CREATE TABLE IF NOT EXISTS `VILLE` (
`id_ville` int(11) NOT NULL,
  `nom_ville` varchar(50) NOT NULL,
  `nb_refugie` int(11) NOT NULL,
  `code_postale` varchar(5) NOT NULL,
  `dpt_ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ASSOCIATION`
--
ALTER TABLE `ASSOCIATION`
 ADD PRIMARY KEY (`id_asso`);

--
-- Index pour la table `ASSO_LIEU`
--
ALTER TABLE `ASSO_LIEU`
 ADD PRIMARY KEY (`id_ville`,`id_asso`);

--
-- Index pour la table `BESOIN_GERE`
--
ALTER TABLE `BESOIN_GERE`
 ADD PRIMARY KEY (`id_asso`,`id_type`);

--
-- Index pour la table `STOCK`
--
ALTER TABLE `STOCK`
 ADD PRIMARY KEY (`id_ville`,`id_item`);

--
-- Index pour la table `TYPE_BESOIN`
--
ALTER TABLE `TYPE_BESOIN`
 ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `VILLE`
--
ALTER TABLE `VILLE`
 ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ASSOCIATION`
--
ALTER TABLE `ASSOCIATION`
MODIFY `id_asso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TYPE_BESOIN`
--
ALTER TABLE `TYPE_BESOIN`
MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `VILLE`
--
ALTER TABLE `VILLE`
MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
