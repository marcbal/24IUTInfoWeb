-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Mai 2015 à 02:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `24iutinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `agents`
--

INSERT INTO `agents` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compagnies`
--

CREATE TABLE IF NOT EXISTS `compagnies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie_navire`
--

CREATE TABLE IF NOT EXISTS `compagnie_navire` (
  `id_navire` int(11) DEFAULT NULL,
  `id_compagnie` int(11) DEFAULT NULL,
  KEY `id_navire` (`id_navire`),
  KEY `id_compagnie` (`id_compagnie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conteneurs`
--

CREATE TABLE IF NOT EXISTS `conteneurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacite` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `escales`
--

CREATE TABLE IF NOT EXISTS `escales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_entree` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mouvements`
--

CREATE TABLE IF NOT EXISTS `mouvements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `id_conteneur` int(11) DEFAULT NULL,
  `id_escale` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_conteneur` (`id_conteneur`),
  KEY `id_escale` (`id_escale`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `navire`
--

CREATE TABLE IF NOT EXISTS `navire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `transporters`
--

CREATE TABLE IF NOT EXISTS `transporters` (
  `id_navire` int(11) DEFAULT NULL,
  `id_conteneur` int(11) DEFAULT NULL,
  KEY `id_navire` (`id_navire`),
  KEY `id_conteneur` (`id_conteneur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_password_hash` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_compagnie` int(11) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_compagnie` (`id_compagnie`),
  KEY `id_agent` (`id_agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `user_password_hash`, `user_email`, `user_type`, `id_client`, `id_compagnie`, `id_agent`) VALUES
(1, '$2y$10$SOwVEvTlmvep0pv6IzFATOQ4kgVRdU42IMyw8NrKYQV5sHmbk9RTa', 'root@localhost.fr', 'agent', NULL, NULL, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compagnie_navire`
--
ALTER TABLE `compagnie_navire`
  ADD CONSTRAINT `compagnie_navire_ibfk_2` FOREIGN KEY (`id_compagnie`) REFERENCES `compagnies` (`id`),
  ADD CONSTRAINT `compagnie_navire_ibfk_1` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id`);

--
-- Contraintes pour la table `conteneurs`
--
ALTER TABLE `conteneurs`
  ADD CONSTRAINT `conteneurs_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `mouvements`
--
ALTER TABLE `mouvements`
  ADD CONSTRAINT `mouvements_ibfk_2` FOREIGN KEY (`id_escale`) REFERENCES `escales` (`id`),
  ADD CONSTRAINT `mouvements_ibfk_1` FOREIGN KEY (`id_conteneur`) REFERENCES `conteneurs` (`id`);

--
-- Contraintes pour la table `transporters`
--
ALTER TABLE `transporters`
  ADD CONSTRAINT `transporters_ibfk_2` FOREIGN KEY (`id_conteneur`) REFERENCES `conteneurs` (`id`),
  ADD CONSTRAINT `transporters_ibfk_1` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_agent`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_compagnie`) REFERENCES `compagnies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
