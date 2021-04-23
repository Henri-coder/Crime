-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 avr. 2021 à 19:56
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdcrime`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecouteur`
--

DROP TABLE IF EXISTS `ecouteur`;
CREATE TABLE IF NOT EXISTS `ecouteur` (
  `ec_id` int(4) NOT NULL AUTO_INCREMENT,
  `ec_marque` varchar(10) NOT NULL,
  `ec_couleur` varchar(10) NOT NULL,
  `ec_numSerie` int(10) NOT NULL,
  `ec_ville` varchar(30) NOT NULL,
  `ec_idVictime` int(4) NOT NULL,
  `ec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ec_id`),
  KEY `ec_idVictime` (`ec_idVictime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `policier`
--

DROP TABLE IF EXISTS `policier`;
CREATE TABLE IF NOT EXISTS `policier` (
  `po_id` int(4) NOT NULL AUTO_INCREMENT,
  `po_nomPrenom` varchar(70) NOT NULL,
  `po_dateNaiss` date NOT NULL,
  `po_CNI` int(9) NOT NULL,
  `po_password` varchar(20) NOT NULL,
  `po_numero` int(9) NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `policier`
--

INSERT INTO `policier` (`po_id`, `po_nomPrenom`, `po_dateNaiss`, `po_CNI`, `po_password`, `po_numero`) VALUES
(1, 'admin', '2000-09-04', 100687385, 'admin', 690846337);

-- --------------------------------------------------------

--
-- Structure de la table `tablette`
--

DROP TABLE IF EXISTS `tablette`;
CREATE TABLE IF NOT EXISTS `tablette` (
  `tb_id` int(4) NOT NULL AUTO_INCREMENT,
  `tb_marque` varchar(10) NOT NULL,
  `tb_couleur` varchar(10) NOT NULL,
  `tb_numSerie` int(10) NOT NULL,
  `tb_ville` varchar(30) NOT NULL,
  `tb_idVictime` int(4) NOT NULL,
  `tb_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tb_id`),
  KEY `tb_idVictime` (`tb_idVictime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE IF NOT EXISTS `telephone` (
  `te_id` int(4) NOT NULL AUTO_INCREMENT,
  `te_marque` varchar(10) NOT NULL,
  `te_couleur` varchar(10) NOT NULL,
  `te_numSerie` int(10) NOT NULL,
  `te_ville` varchar(30) NOT NULL,
  `te_idVictime` int(4) NOT NULL,
  `te_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`te_id`),
  KEY `te_idVictime` (`te_idVictime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `television`
--

DROP TABLE IF EXISTS `television`;
CREATE TABLE IF NOT EXISTS `television` (
  `tl_id` int(4) NOT NULL AUTO_INCREMENT,
  `tl_marque` varchar(10) NOT NULL,
  `tl_couleur` varchar(10) NOT NULL,
  `tl_numSerie` int(10) NOT NULL,
  `tl_ville` varchar(30) NOT NULL,
  `tl_idVictime` int(4) NOT NULL,
  `tl_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tl_id`),
  KEY `tl_idVictime` (`tl_idVictime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

DROP TABLE IF EXISTS `transfert`;
CREATE TABLE IF NOT EXISTS `transfert` (
  `tr_id` int(4) NOT NULL,
  `tr_montant` int(8) NOT NULL,
  `tr_numero` int(9) NOT NULL,
  `tr_numeroIconu` int(9) NOT NULL,
  `tr_date` int(9) NOT NULL,
  `tr_idVictime` int(4) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `tr_idVictime` (`tr_idVictime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `victime`
--

DROP TABLE IF EXISTS `victime`;
CREATE TABLE IF NOT EXISTS `victime` (
  `vi_id` int(4) NOT NULL AUTO_INCREMENT,
  `vi_nomPrenom` varchar(70) NOT NULL,
  `vi_CNI` int(9) NOT NULL,
  `vi_ville` varchar(20) NOT NULL,
  `vi_numero` int(9) NOT NULL,
  `vi_password` varchar(20) NOT NULL,
  PRIMARY KEY (`vi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `victime`
--

INSERT INTO `victime` (`vi_id`, `vi_nomPrenom`, `vi_CNI`, `vi_ville`, `vi_numero`, `vi_password`) VALUES
(1, 'jean michel', 112233455, 'Douala', 690846337, 'nombrebloc'),
(2, 'yves', 12321145, 'Foumban', 695360520, 'unique'),
(3, 'henri', 12342145, 'Bertoua', 695123452, 'unique'),
(4, 'Bronol', 100286663, 'Douala', 673315006, 'password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
