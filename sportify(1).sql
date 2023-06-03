-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 03 juin 2023 à 16:07
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportify`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_admin` int NOT NULL AUTO_INCREMENT,
  `Nom_admin` varchar(255) NOT NULL,
  `Prenom_admin` varchar(255) NOT NULL,
  `Photo_admin` varchar(255) NOT NULL,
  `Email_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id_admin`, `Nom_admin`, `Prenom_admin`, `Photo_admin`, `Email_admin`) VALUES
(1, 'Parcevaux', 'Vinciane', 'Non', 'vinciane.deparcevaux@edu.ece.fr'),
(2, 'Gouesse', 'Sixtine', 'Non', 'sixtine.gouesse@edu.ece.fr'),
(3, 'Lei', 'Victor', 'Non', 'victor.lei@edu.ece.fr'),
(4, 'Lemaitre', 'James', 'Non', 'james.lemaitre@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

DROP TABLE IF EXISTS `calendrier`;
CREATE TABLE IF NOT EXISTS `calendrier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Id_Coach` int NOT NULL,
  `Jour` int NOT NULL,
  `AM` int NOT NULL,
  `PM` int NOT NULL,
  `Periode` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `calendrier`
--

INSERT INTO `calendrier` (`id`, `Id_Coach`, `Jour`, `AM`, `PM`, `Periode`) VALUES
(75, 2, 2, 0, 0, 0),
(77, 2, 1, 0, 0, 0),
(98, 1, 2, 0, 0, 0),
(99, 1, 2, 0, 0, 0),
(100, 1, 3, 0, 0, 0),
(101, 1, 3, 0, 0, 0),
(102, 1, 4, 0, 0, 0),
(103, 1, 5, 0, 0, 0),
(104, 1, 5, 0, 0, 0),
(105, 1, 6, 0, 0, 0),
(106, 1, 6, 0, 0, 0),
(107, 2, 3, 0, 0, 0),
(108, 2, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `calendrier_client`
--

DROP TABLE IF EXISTS `calendrier_client`;
CREATE TABLE IF NOT EXISTS `calendrier_client` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_Coach` int NOT NULL,
  `Id_Client` int NOT NULL,
  `Jour` int NOT NULL,
  `Heur` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `calendrier_salle`
--

DROP TABLE IF EXISTS `calendrier_salle`;
CREATE TABLE IF NOT EXISTS `calendrier_salle` (
  `Id` int NOT NULL,
  `Id_Client` int NOT NULL,
  `Jour` int NOT NULL,
  `Heure` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id_Client` int NOT NULL AUTO_INCREMENT,
  `Nom_Client` varchar(255) NOT NULL,
  `Prenom_Client` varchar(255) NOT NULL,
  `Sexe_Client` varchar(255) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Mdp_Client` varchar(255) NOT NULL,
  `Email_Client` varchar(255) NOT NULL,
  `Num_telephone` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Client`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_Client`, `Nom_Client`, `Prenom_Client`, `Sexe_Client`, `Date_Naissance`, `Mdp_Client`, `Email_Client`, `Num_telephone`) VALUES
(1, 'Parcevaux', 'Alexandra', 'feminin', '2005-07-14', 'mimic', 'mimic05@gmail.com', '0631648235'),
(6, 'Perez', 'Pauline', 'feminin', '3125-02-12', 'mimic', 'vdepa@il.com', '0631648235'),
(7, 'Marie', 'Jean', 'masculin', '2014-02-07', 'mimic', 'teste@gmail.com', '0760987461'),
(8, 'Thomas', 'Jean', 'masculin', '2023-06-09', 'mimic', 'teste2@gmail.com', '0760987461'),
(9, 'Marc', 'Jean', 'masculin', '2023-06-05', 'mimic', 'teste3@gmail.com', '0760987461'),
(10, 'Marz', 'Jean', 'masculin', '0000-00-00', 'mimic', 'teste4@gmail.com', '0760987461');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `Id_Coach` int NOT NULL AUTO_INCREMENT,
  `Nom_Coach` varchar(255) NOT NULL,
  `Prenom_Coach` varchar(255) NOT NULL,
  `Photo_Coach` varchar(255) NOT NULL,
  `Video_Coach` varchar(255) NOT NULL,
  `CV_Coach` varchar(255) NOT NULL,
  `Email_Coach` varchar(255) NOT NULL,
  `Specialite_Coach` varchar(255) NOT NULL,
  `Compétition` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Coach`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`Id_Coach`, `Nom_Coach`, `Prenom_Coach`, `Photo_Coach`, `Video_Coach`, `CV_Coach`, `Email_Coach`, `Specialite_Coach`, `Compétition`) VALUES
(1, 'De Ville', 'Jean', 'Images\\coach1.png', 'rien', 'rien', 'jean.deville@salle.omnes.com', 'musculation', 'Non'),
(2, 'Marcelin', 'Jacques', 'Images\\coach2.png', 'rien', 'rien', 'jacques.marcelin@salle.omnes.com', 'fitness', 'Non'),
(3, 'Beignet', 'Gabrielle', 'Images\\coach3.png', 'rien', 'rien', 'gabrielle.beignet@salle.omnes.com', 'biking', 'Non'),
(4, 'Savret', 'Paulin', 'Images\\coach4.png', 'rien', 'rien', 'paulin.savret@salle.omnes.com', 'cardio-training', 'Non'),
(5, 'Racht', 'Yann', 'Images\\coach5.png', 'rien', 'rien', 'yann.racht@salle.omnes.com', 'cours collectifs', 'Non'),
(6, 'Junkins', 'Jeff', 'Images\\coach12.png', 'rien', 'rien', 'jeff.junkins@salle.omnes.com', 'basketball', 'Oui'),
(7, 'Zinedine', 'Zidane', 'Images\\coach7.png', 'rien', 'rien', 'zinedine.zidane@salle.omnes.com', 'football', 'Oui'),
(8, 'Travers', 'Laurent', 'Images\\coach8.png', 'rien', 'rien', 'laurent.travers@salle.omnes.com', 'rugby', 'Oui'),
(9, 'Williams', 'Serena', 'Images\\coach9.png', 'rien', 'rien', 'serena.williams@salle.omnes.com', 'tennis', 'Oui'),
(10, 'Lucas', 'Philippe', 'Images\\coach10.png', 'rien', 'rien', 'lucas.philippe@salle.omnes.com', 'natation', 'Oui'),
(11, 'Li You', 'Jian', 'Images\\coach11.png', 'rien', 'rien', 'jian.liyou@salle.omnes.com', 'plongeon', 'Oui'),
(12, 'Pasquier', 'Daniel', 'Images/coach2.png', 'rien', 'rien', 'daniel.pasquier@salle.omnes.com', 'musculation', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Nom_user` varchar(255) NOT NULL,
  `Email_user` varchar(255) NOT NULL,
  `Mdp_user` varchar(255) NOT NULL,
  `ID_user` int NOT NULL,
  `Prenom_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Nom_user`, `Email_user`, `Mdp_user`, `ID_user`, `Prenom_user`) VALUES
('Perez', 'vdepa@il.com', 'mimic', 5, 'Pauline'),
('Marie', 'teste@gmail.com', 'mimic', 7, 'Jean'),
('Thomas', 'teste2@gmail.com', 'mimic', 8, 'Jean'),
('Marc', 'teste3@gmail.com', 'mimic', 9, 'Jean'),
('Marz', 'teste4@gmail.com', 'mimic', 10, 'Jean'),
('De Ville', 'jean.deville@salle.omnes.com', 'mimic', 1, 'Jean'),
('Marcelin', 'jacques.marcelin@salle.omnes.com', 'mimic', 2, 'Jacques'),
('Beignet', 'gabrielle.beignet@salle.omnes.com', 'mimic', 3, 'Gabrielle'),
('Savret', 'paulin.savret@salle.omnes.com', 'mimic', 4, 'Paulin'),
('Racht', 'yann.racht@salle.omnes.com', 'mimic', 5, 'Yann'),
('Junkins', 'jeff.junkins@salle.omnes.com', 'mimic', 6, 'Jeff'),
('Zinedine', 'zidane.zinedine@salle.omnes.com', 'mimic', 7, 'Zidane'),
('Travers', 'laurent.travers@salle.omnes.com', 'mimic', 8, 'Laurent'),
('Williams', 'serena.williams@salle.omnes.com', 'mimic', 9, 'Serena'),
('Lucas', 'philippe.lucas@salle.omnes.com', 'mimic', 10, 'Philippe'),
('Li You', 'jian.liyou@salle.omnes.com', 'mimic', 11, 'Jian'),
('Pasquier', 'daniel.pasquier@salle.omnes.com', 'mimic', 12, 'Daniel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
