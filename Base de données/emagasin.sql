-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 juin 2021 à 19:34
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emagasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`basketId`),
  KEY `FK_CONCERNE_USER` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `typeProduct` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`categoryId`, `typeProduct`) VALUES
(1, 'pc portable'),
(2, 'pc fixe'),
(17, 'pc Gamer'),
(21, 'Tablettes'),
(23, 'Serveur'),
(24, 'Mac');

-- --------------------------------------------------------

--
-- Structure de la table `fichetechnique`
--

DROP TABLE IF EXISTS `fichetechnique`;
CREATE TABLE IF NOT EXISTS `fichetechnique` (
  `ficheId` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `tailleMemoire` decimal(10,0) DEFAULT NULL,
  `processeur` varchar(100) DEFAULT NULL,
  `processeurFab` varchar(100) DEFAULT NULL,
  `resolutionEcran` varchar(100) DEFAULT NULL,
  `tailleEcran` varchar(50) DEFAULT NULL,
  `carteGraphique` varchar(100) DEFAULT NULL,
  `typeHdd` varchar(20) DEFAULT NULL,
  `tailleHdd` decimal(10,0) DEFAULT NULL,
  `poids` decimal(10,0) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ficheId`),
  KEY `FK_CONCERNE_PRODUIT` (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichetechnique`
--

INSERT INTO `fichetechnique` (`ficheId`, `productId`, `prix`, `tailleMemoire`, `processeur`, `processeurFab`, `resolutionEcran`, `tailleEcran`, `carteGraphique`, `typeHdd`, `tailleHdd`, `poids`, `OS`) VALUES
(38, 44, '1099', '8', 'i5', 'Intel', '4K', '13 pouces', 'UHD6000', 'SSD', '128', '1', 'MacOS 11.2'),
(35, 41, '299', '8', 'i7', 'Intel', 'HD', '17 pouces', 'MX230', 'Mécanique', '512', '2', 'Linux'),
(36, 42, '499', '4', 'ryzen 3', 'AMD', 'Néant', 'Néant', 'GTX240', 'SSD', '250', '3', 'Aucun'),
(37, 43, '599', '8', 'ryzen 5', 'AMD', 'Néant', 'Néant', 'MX230', 'Mécanique', '500', '3', 'Windows 7 Pro'),
(34, 40, '399', '4', 'i5 4300U', 'Intel', 'FullHD', '15 pouces', 'HD5000', 'SSD', '250', '2', 'Windows 10'),
(39, 45, '1579', '4', 'i7', 'Intel', '4K', '13 pouces', 'Iris Pro', 'SSD', '250', '1', 'MacOS 11.2'),
(40, 46, '899', '6', 'A12', 'Apple', '2K', '11.2', 'Apple A12', 'SSD', '128', '1', 'ipas OS'),
(43, 49, '220', '3', '', 'Snapdragon 662', '2K', '10,4 pouces', 'Snapdragon', 'SSD', '3', '1', 'Android 11'),
(44, 50, '980', '8', 'Xeon E3-1225 v6', 'Intel', 'Néant', 'Néant', 'HD P630', 'Mécanique', '1000', '12', 'Aucun'),
(45, 51, '849', '16', 'Xeon E-2224G', 'Intel', 'Néant', 'Néant', 'HD P630', 'Mécanique', '1000', '7', 'Aucun'),
(46, 52, '2399', '16', 'AMD Ryzen 7', 'Ryzen 7', '4K', '16 pouces', ' NVIDIA GeForce RTX 3070', 'SSD', '1000', '2', 'Windows 10 Pro'),
(47, 53, '2149', '16', 'AMD Ryzen 7', 'AMD', '4K', '17 pouces', 'NVIDIA GeForce RTX 3070', 'SSD', '250', '3', 'Windows 10 Pro'),
(48, 54, '1345', '16', 'i7', 'Intel', 'FullHD', '17 pouces', 'MX230', 'SSD', '250', '1', 'Linux');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productIdINT` int NOT NULL AUTO_INCREMENT,
  `imgUrl` varchar(255) DEFAULT NULL,
  `description` text,
  `categoryID` int DEFAULT NULL,
  `productName` varchar(100) NOT NULL,
  `onTop` int NOT NULL,
  PRIMARY KEY (`productIdINT`),
  KEY `FK_APPARTIENT_A` (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`productIdINT`, `imgUrl`, `description`, `categoryID`, `productName`, `onTop`) VALUES
(41, './src/img/produits/1624550652-PC2.jpg', 'PC portable HP - 4go de RAM', 1, 'PC Portable HP', 1),
(42, './src/img/produits/1624550903-fixe2.jpg', 'PC fixe HP', 2, 'HP 2242', 1),
(43, './src/img/produits/1624551022-fixe5.jpg', 'Pc fixe idéal pour surfer, lire ses mails, etc...', 2, 'PC fixe Lenovo 2245S', 1),
(44, './src/img/produits/1624551180-mac2.jpg', 'Superbe macbook air superpuissant', 24, 'MacBook Air 2020', 1),
(40, './src/img/produits/1624550548-PC1.jpg', 'Pc Asus XTFX-1015', 1, 'PC Portable  ASUS', 1),
(45, './src/img/produits/1624551289-mac1.jpg', 'Superbe mac, neuf, et rapide', 24, 'MacBook Air 2021', 1),
(46, './src/img/produits/1624551540-ipad.jpg', 'ipad pro puissant', 21, 'ipad pro', 0),
(49, './src/img/produits/1624552012-ipad.jpg', 'La tablette Samsung Galaxy Tab A7 accompagnera toutes vos envies avec ses performances élevées, son large écran confortable et ses fonctionnalités intelligentes. Ce modèle offre une belle autonomie grâce à sa batterie grande capacité, une connectivité sans fil complète et une sécurité accrue.', 21, 'Samsung Galaxy Tab A7 ', 1),
(50, './src/img/produits/1624552262-srv1.jpg', 'Le serveur Fujitsu PRIMERGY TX1310 M3 sera un achat idéal pour les PME souhaitant acheter leur premier serveur. Avec suffisamment de mémoire RAM et un processeur Intel Xeon, il offre largement les performances nécessaires pour toutes les tâches de serveur classiques.', 23, 'Fujitsu PRIMERGY TX1310 M3', 0),
(51, './src/img/produits/1624552361-srv2.jpg', 'Le Lenovo ThinkSystem ST50 est un serveur d\'entreprise au format tour, facile à gérer, idéal pour les PME ou les agences/bureaux distants. Le ST50 exploite une puissance de serveur de niveau entreprise avec un processeur Intel Xeon E-2224G et jusqu\'à 64 Go de mémoire DDR4.', 23, 'Lenovo ThinkSystem ST50 ', 0),
(52, './src/img/produits/1624552542-gamer1.jpg', 'Le PC portable gaming Lenovo Legion 5 Pro est une véritable bête de compétition conçue pour les joueurs exigeants. Il embarque un puissant processeur 8-Core AMD Ryzen 7, 16 Go de RAM DDR4, un SSD PCI-E NVMe 1 To et la carte graphique NVIDIA GeForce RTX 3070.', 17, 'Lenovo Legion 5 Pro 16ACH6H', 1),
(53, './src/img/produits/1624552621-Gamer2.jpg', 'Atteignez des sommets de performance et gagnez en plaisir de jeu avec le PC portable Gamer Bellone BE7 ! En plus de ses composants ultra-performants, il est équipé notamment d\'un écran de 15.6&quot; 144 Hz et d\'un clavier rétroéclairé.', 17, 'Bellone BE7-32-M5M10-P', 0),
(54, './src/img/produits/1624552677-PC2.jpg', 'Profitez de hautes performances et gagnez en plaisir de jeu avec le PC portable Gamer LDLC Bellone GXL62 ! En plus de ses composants ultra-performants, il est équipé notamment d\'un écran de 17.3&quot; 240 Hz et d\'un clavier rétroéclairé.<br />\r\n<br />\r\n', 1, 'PC Portable regen', 0);

-- --------------------------------------------------------

--
-- Structure de la table `productlist`
--

DROP TABLE IF EXISTS `productlist`;
CREATE TABLE IF NOT EXISTS `productlist` (
  `productId` int DEFAULT NULL,
  `basketId` int DEFAULT NULL,
  KEY `FK_REFERENCE_PRODUIT` (`productId`),
  KEY `FK_APPARTIEN_PANIER` (`basketId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleid` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `top`
--

DROP TABLE IF EXISTS `top`;
CREATE TABLE IF NOT EXISTS `top` (
  `topId` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  PRIMARY KEY (`topId`),
  KEY `FK_APPARTIEN_PANIER` (`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  `roleId` int DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `login`, `email`, `password`, `ban`, `roleId`) VALUES
(33, 'user', 'user@local.be', '473GUzek9Szog', '470084909', 1),
(32, 'admin', 'admin@local.be', '17lgP6vqCV1Ko', '1756743776', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
