-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Octobre 2015 à 15:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `livreaudio`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `idUser` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `time` time NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `idLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `couverture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `format` varchar(255) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`idLivre`, `titre`, `auteur`, `couverture`, `description`, `editeur`, `date`, `format`, `emplacement`) VALUES
(1, 'Donjon de Naheulbeuk 1', 'Auteur', './assets/images/naheulbeuk.jpg', 'Desxcription dz d a dza ,d za d az d,naz nd az d, azn dzabdbzadna dbcgbs bkhlnd qbchnc bzbazn dbzdzav db ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk01.mp3'),
(2, 'Donjon de Naheulbeuk  2', 'Auteur', './assets/images/naheulbeuk.jpg', 'Description', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk02.mp3'),
(3, 'Donjon de Naheulbeuk  3', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk03.mp3'),
(4, 'Donjon de Naheulbeuk  4', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk04.mp3'),
(5, 'Donjon de Naheulbeuk  5', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk05.mp3'),
(6, 'Donjon de Naheulbeuk  6', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk06.mp3'),
(7, 'Donjon de Naheulbeuk  7', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk07.mp3'),
(8, 'Donjon de Naheulbeuk  8', 'Auteur', './assets/images/naheulbeuk.jpg', 'bkjbkbjkbkjbkjbjbj hbj kj ', 'Editeur', '2015-10-07', 'mp3', 'donjon-de-naheulbeuk08.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(1, 'capi', 'aurelien', 'capi.aurelien@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c');
