-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 20 juin 2020 à 22:06
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ingen`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_plus` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `society` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `first_name`, `last_name`, `address`, `address_plus`, `zip_code`, `city`, `country`, `society`) VALUES
(1, 'William2', 'Girard-Reydet2', '2 avenue du stade de coubertin2', '2', '921002', 'Boulogne-Billancourt2', 'Costa Rica', '2'),
(2, 'Ryana', 'Moman', '2 avenue du stade ', 'Au sommet comme dosseh', '92100', 'blabla', 'Haïti', '2'),
(23, 'William', 'Girard-Reydet', '2 avenue du stade de coubertin', NULL, '92100', 'Boulogne-Billancourt', 'France', NULL),
(24, 'William', 'Girard-Reydet', '2 avenue du stade de coubertin', NULL, '92100', 'Boulogne-Billancourt', 'France', NULL),
(25, 'William', 'Girard-Reydet', '2 avenue du stade de coubertin', NULL, '92100', 'Boulogne-Billancourt', 'France', NULL),
(26, 'Ryana', 'Moman', '2 avenue du stade ', 'Au sommet comme dosseh', '92100', 'blabla', 'Haïti', NULL),
(27, 'Girard', 'William', '3 avenue du', NULL, '97200', 'paris', 'Afghanistan', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(1, 'Carnivores', 'carn.png'),
(2, 'Herbivores', 'herb.png'),
(3, 'Piscivores', 'pisc.png'),
(4, 'Hybrides', 'hybr.png');

-- --------------------------------------------------------

--
-- Structure de la table `categories_products`
--

DROP TABLE IF EXISTS `categories_products`;
CREATE TABLE IF NOT EXISTS `categories_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_products_category_id` (`category_id`),
  KEY `categories_products_product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories_products`
--

INSERT INTO `categories_products` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 4, 12),
(13, 4, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 68),
(24, 4, 23),
(25, 2, 24),
(26, 2, 25),
(27, 2, 26),
(28, 2, 27),
(29, 2, 28),
(30, 2, 29),
(31, 2, 30),
(32, 2, 31),
(33, 2, 32),
(34, 2, 33),
(35, 2, 34),
(36, 2, 35),
(37, 2, 36),
(38, 2, 37),
(39, 2, 38),
(40, 2, 39),
(41, 2, 40),
(42, 2, 41),
(43, 2, 42),
(44, 2, 43),
(45, 2, 44),
(46, 2, 45),
(47, 2, 46),
(48, 2, 47),
(49, 2, 48),
(50, 2, 49),
(51, 2, 50),
(52, 2, 51),
(53, 2, 52),
(54, 2, 53),
(55, 2, 54),
(56, 2, 55),
(57, 2, 56),
(58, 2, 57),
(59, 2, 58),
(60, 4, 59),
(61, 2, 60),
(62, 2, 61),
(63, 2, 62),
(64, 2, 63),
(65, 2, 64),
(66, 2, 65),
(67, 2, 66),
(68, 3, 67);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url_variable` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `name`, `img`, `url_variable`) VALUES
(1, 'Alpine', 'Alpineicon.png', 'alpine'),
(2, 'Aride', 'Aridicon.png', 'aride'),
(3, 'Côtier', 'coastalicon.png', 'cotier'),
(4, 'Jungle', 'jungleicon.png', 'jungle'),
(5, 'Forêt tropical', 'rainforesticon.png', 'foret_tropical'),
(6, 'Savane', 'savannahicon.png', 'savane'),
(7, 'Steppe', 'steppeicon.png', 'steppe'),
(8, 'Taïga', 'taigaicon.png', 'taiga'),
(9, 'Tundra', 'tundraicon.png', 'tundra'),
(10, 'Vivid', 'vividicon.png', 'vivid'),
(11, 'Terre Humide', 'wetlandicon.png', 'terre_humide'),
(12, 'Terrain Boisé', 'woodlandicon.png', 'terrain_boise');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `payement` varchar(255) NOT NULL,
  `addressDelivery` varchar(255) NOT NULL,
  `addressBill` varchar(255) NOT NULL,
  `deliver_Phone` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `product`, `quantity`, `price`, `color`, `user_id`, `number`, `payement`, `addressDelivery`, `addressBill`, `deliver_Phone`, `name_user`) VALUES
(14, 'Albertosaurus', '1', '1425000', 'Forêt tropical', 9, NULL, 'Paypal', 'Ryana Moman 2 avenue du stade  92100 blabla Haïti', 'Girard William 3 avenue du 97200 paris Afghanistan', '', 'WilliamA/Girard-Reydet'),
(15, 'Albertosaurus', '4', '1425000', 'Alpine', 9, NULL, 'Paypal', 'Ryana Moman 2 avenue du stade  92100 blabla Haïti', 'Girard William 3 avenue du 97200 paris Afghanistan', '01465078', 'WilliamA/Girard-Reydet');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(510) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `social_group` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `area_required` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `diet`, `social_group`, `weight`, `length`, `height`, `area_required`, `price`, `quantity`, `publish`) VALUES
(1, 'Albertosaurus', 'Très semblable en apparence à Tyrannosaurus, bien que plus petit et plus mince, Albertosaurus est un grand carnivore avec de petits bras, des jambes musclées et de courtes crêtes osseuses au-dessus de ses yeux.', 'Carnivore', 'solitary', '2721', '10.48', '3.97', '7314', 1425000, 95, 1),
(2, 'Allosaurus', 'DESC', 'Carnivore', 'couple', '2086', '12', '4', '10206', 1873000, 100, 1),
(3, 'Baryonyx', 'DESC', 'Piscivore', 'couple', '907', '9.19', '2.74', '7968', 742000, 100, 1),
(4, 'Carcharodontosaurus', 'DESC', 'Carnivore', 'couple', '9500', '14.98', '5.31', '10314', 1750000, 100, 1),
(5, 'Carnotaurus', 'DESC', 'Carnivore', 'couple', '1814', '10.38', '4.05', '8160', 1384000, 100, 1),
(6, 'Ceratosaurus', 'DESC', 'Carnivore', 'groupe', '907', '9', '3.75', '8951', 550000, 100, 1),
(7, 'Compsognathus', 'DESC', 'Carnivore', 'groupe', '2', '1', '0.41', '578', 57000, 100, 1),
(8, 'Deinonychus', 'DESC', 'Carnivore', 'groupe', '100', '3.19', '1.60', '4464', 446000, 100, 1),
(9, 'Dilophosaurus', 'DESC', 'Carnivore', 'groupe', '300', '3.06', '1.61', '2744', 317000, 100, 1),
(10, 'Giganotosaurus', 'DESC', 'Carnivore', 'couple', '12698', '15.50', '5.34', '9884', 1717000, 100, 1),
(11, 'Herrerasaurus', 'DESC', 'Carnivore', 'groupe', '350', '6.20', '1.96', '6864', 480000, 100, 1),
(12, 'Indominus rex', 'DESC', 'Carnivore', 'solitary', '0', '15.53', '6.29', '15246', 2516000, 100, 1),
(13, 'Indoraptor', 'DESC', 'Carnivore', 'solitary', '997', '7.32', '3.29', '6864', 2710000, 100, 1),
(14, 'Majungasaurus', 'DESC', 'Carnivore', 'couple', '907', '9', '2.76', '9360', 1465000, 100, 1),
(15, 'Metriacanthosaurus', 'DESC', 'Carnivore', 'couple', '1 814', '7.96', '2.92', '6776', 873000, 100, 1),
(16, 'Proceratosaurus', 'DESC', 'Carnivore', 'groupe', '40', '4.01', '1.37', '6601', 370000, 100, 1),
(17, 'Spinoraptor', 'DESC', 'Piscivore', 'groupe', '800', '6.50', '2.76', '8452', 1930000, 100, 1),
(18, 'Spinosaurus', 'DESC', 'Piscivore', 'couple', '18140', '15', '6.38', '14208', 2012000, 100, 1),
(19, 'Suchomimus', 'DESC', 'Piscivore', 'couple', '4535', '11.47', '3.57', '9464', 1228000, 100, 1),
(20, 'Troodon', 'DESC', 'Carnivore', 'groupe', '50', '3', '1.20', '3520', 302000, 100, 1),
(21, 'Tyrannosaurus Rex', 'DESC', 'Carnivore', 'solitary', '16 326', '13.50', '5.89', '12720', 1964000, 100, 1),
(22, 'Velociraptor', 'DESC', 'Carnivore', 'groupe', '150', '3.96', '1.73', '6258', 373000, 100, 1),
(23, 'Ankylodocus', 'DESC', 'Herbivore', 'couple', '0', '27.99', '5.93', '4536', 980000, 100, 1),
(24, 'Ankylosaurus', 'DESC', 'Herbivore', 'groupe', '5442', '7.87', '2.78', '686', 315000, 100, 1),
(25, 'Apatosaurus', 'DESC', 'Herbivore', 'groupe', '34466', '24.3', '6.72', '6688', 851000, 100, 1),
(26, 'Archaeornithomimus', 'DESC', 'Herbivore', 'groupe', '50', '3.42', '2.22', '658', 70000, 100, 1),
(27, 'Brachiosaurus', 'DESC', 'Herbivore', 'groupe', '49885', '18.77', '16.11', '12600', 784000, 100, 1),
(28, 'Camarasaurus', 'DESC', 'Herbivore', 'groupe', '46257', '17.95', '8.99', '6174', 678000, 100, 1),
(29, 'Chasmosaurus', 'DESC', 'Herbivore', 'groupe', '1360.5', '7.50', '3.82', '1440', 250000, 100, 1),
(30, 'Chungkingosaurus', 'DESC', 'Herbivore', 'groupe', '2721', '9', '3.73', '4114', 297000, 100, 1),
(31, 'Corythosaurus', 'DESC', 'Herbivore', 'groupe', '3628', '8.97', '3.10', '1244', 145000, 100, 1),
(32, 'Crichtonsaurus', 'DESC', 'Herbivore', 'groupe', '453.5', '7.07', '2.29', '1522', 290000, 100, 1),
(33, 'Diplodocus', 'DESC', 'Herbivore', 'groupe', '14512', '29.01', '5.93', '10864', 625000, 100, 1),
(34, 'Dracorex', 'DESC', 'Herbivore', 'groupe', '600', '3.48', '1.50', '1694', 150000, 100, 1),
(35, 'Dreadnoughtus', 'DESC', 'Herbivore', 'groupe', '59317.8', '18.58', '15.82', '17857', 850000, 100, 1),
(36, 'Dryosaurus', 'DESC', 'Herbivore', 'groupe', '80', '4.98', '1.83', '714', 25000, 100, 1),
(37, 'Edmontosaurus', 'DESC', 'Herbivore', 'groupe', '3628', '11.47', '4.04', '1828', 170000, 100, 1),
(38, 'Euoplocephalus', 'DESC', 'Herbivore', 'groupe', '2539.6', '7.80', '2.36', '350', 285000, 100, 1),
(39, 'Gallimimus', 'DESC', 'Herbivore', 'groupe', '400', '4.61', '3.01', '391', 80000, 100, 1),
(40, 'Gigantspinosaurus', 'DESC', 'Herbivore', 'groupe', '700', '7.71', '2.97', '3031', 370000, 100, 1),
(41, 'Homalocephale', 'DESC', 'Herbivore', 'groupe', '43', '2.29', '0.87', '1028', 130000, 100, 1),
(42, 'Huayangosaurus', 'DESC', 'Herbivore', 'groupe', '2721', '8.49', '2.99', '3648', 226800, 100, 1),
(43, 'Iguanodon', 'DESC', 'Herbivore', 'groupe', '3500', '11.96', '4.26', '1828', 300000, 100, 1),
(44, 'Kentrosaurus', 'DESC', 'Herbivore', 'groupe', '2721', '8.84', '3.34', '4903', 310000, 100, 1),
(45, 'Maiasaura', 'DESC', 'Herbivore', 'groupe', '907', '9.07', '2.99', '1650', 165000, 100, 1),
(46, 'Mamenchisaurus', 'DESC', 'Herbivore', 'groupe', '63490', '26.03', '16.46', '6776', 891000, 100, 1),
(47, 'Muttaburrasaurus', 'DESC', 'Herbivore', 'groupe', '2811.7', '8.74', '2.98', '1481', 225000, 100, 1),
(48, 'Nasutoceratops', 'DESC', 'Herbivore', 'groupe', '1500', '7.57', '3.43', '6428', 166000, 100, 1),
(49, 'Nigersaurus', 'DESC', 'Herbivore', 'groupe', '4000', '13.99', '3.14', '2857', 325000, 100, 1),
(50, 'Nodosaurus', 'DESC', 'Herbivore', 'groupe', '2267.5', '5.92', '1.89', '224', 335000, 100, 1),
(51, 'Olorotitan', 'DESC', 'Herbivore', 'groupe', '3174.5', '10.09', '4.27', '2212', 175000, 100, 1),
(52, 'Ouranosaurus', 'DESC', 'Herbivore', 'groupe', '2400', '7.98', '3.59', '1400', 215000, 100, 1),
(53, 'Pachycephalosaurus', 'DESC', 'Herbivore', 'groupe', '450', '4.46', '1.89', '3150', 195000, 100, 1),
(54, 'Parasaurolophus', 'DESC', 'Herbivore', 'groupe', '2267.5', '9.80', '3.67', '1650', 180000, 100, 1),
(55, 'Pentaceratops', 'DESC', 'Herbivore', 'groupe', '4535', '7.90', '5.16', '1738', 350000, 100, 1),
(56, 'Polacanthus', 'DESC', 'Herbivore', 'groupe', '900', '7.09', '2.22', '1694', 350000, 100, 1),
(57, 'Sauropelta', 'DESC', 'Herbivore', 'couple', '1360.5', '7.97', '2.12', '2744', 355000, 100, 1),
(58, 'Sinoceratops', 'DESC', 'Herbivore', 'groupe', '4535', '8.10', '3.19', '1968', 241000, 100, 1),
(59, 'Stegoceratops', 'DESC', 'Herbivore', 'groupe', '0', '11.58', '5.20', '3978', 420000, 100, 1),
(60, 'Stegosaurus', 'DESC', 'Herbivore', 'groupe', '3083.8', '10.1', '4.93', '5362', 320000, 100, 1),
(61, 'Struthiomimus', 'DESC', 'Herbivore', 'groupe', '150', '4.28', '2.32', '178', 30000, 100, 1),
(62, 'Stygimoloch', 'DESC', 'Herbivore', 'groupe', '78', '3.53', '1.68', '1921', 188000, 100, 1),
(63, 'Styracosaurus', 'DESC', 'Herbivore', 'groupe', '2721', '8.02', '4.10', '1244', 315000, 100, 1),
(64, 'Torosaurus', 'DESC', 'Herbivore', 'groupe', '5442', '7.90', '3.63', '1282', 340000, 100, 1),
(65, 'Triceratops', 'DESC', 'Herbivore', 'groupe', '8163', '9.90', '3.93', '2418', 340000, 100, 1),
(66, 'Tsintaosaurus', 'DESC', 'Herbivore', 'groupe', '2721', '10.01', '3.86', '2064', 200000, 100, 1),
(67, 'Pteranodon', 'DESC', 'Piscivore', 'groupe', '55', '5.87', '2.13', '9999', 425000, 100, 1),
(68, 'Acrocanthosaurus', 'Acrocanthosaurus est l\'un des principaux prédateurs du Crétacé inférieur, un grand dinosaure carnivore, l\'un des plus grands jamais découverts, qui s\'effondre la tête en position basse afin de maintenir l\'équilibre en raison de la forme de son oreille interne.', 'Carnivore', 'couple', '8616.5', '13.98', '4.65', '14208', 2400000, 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products_colors`
--

DROP TABLE IF EXISTS `products_colors`;
CREATE TABLE IF NOT EXISTS `products_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_colors_product_id` (`product_id`) USING BTREE,
  KEY `products_colors_color_id` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=348 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products_colors`
--

INSERT INTO `products_colors` (`id`, `product_id`, `color_id`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 4),
(4, 1, 7),
(5, 1, 9),
(6, 2, 2),
(7, 2, 3),
(8, 2, 7),
(9, 2, 12),
(10, 2, 11),
(11, 23, 1),
(12, 23, 2),
(13, 23, 3),
(14, 23, 7),
(15, 23, 9),
(16, 24, 5),
(17, 24, 4),
(18, 24, 12),
(19, 24, 11),
(20, 24, 10),
(21, 25, 3),
(22, 25, 5),
(23, 25, 6),
(24, 25, 7),
(25, 25, 11),
(26, 26, 3),
(27, 26, 5),
(28, 26, 4),
(29, 26, 11),
(30, 3, 1),
(31, 3, 3),
(32, 3, 5),
(33, 3, 7),
(34, 27, 5),
(35, 27, 7),
(36, 27, 11),
(37, 27, 9),
(38, 27, 10),
(39, 28, 5),
(40, 28, 4),
(41, 28, 6),
(42, 28, 7),
(43, 28, 12),
(44, 4, 5),
(45, 4, 4),
(46, 4, 7),
(47, 4, 12),
(48, 4, 9),
(49, 5, 1),
(50, 5, 2),
(51, 5, 6),
(52, 5, 7),
(53, 5, 9),
(54, 6, 3),
(55, 6, 5),
(56, 6, 4),
(57, 6, 6),
(58, 6, 11),
(59, 29, 1),
(60, 29, 2),
(61, 29, 3),
(62, 29, 5),
(63, 29, 9),
(64, 30, 2),
(65, 30, 5),
(66, 30, 4),
(67, 30, 6),
(68, 30, 9),
(69, 7, 5),
(70, 7, 4),
(71, 7, 12),
(72, 7, 9),
(73, 7, 10),
(74, 31, 5),
(75, 31, 4),
(76, 31, 8),
(77, 31, 12),
(78, 31, 10),
(79, 32, 2),
(80, 32, 5),
(81, 32, 4),
(82, 32, 12),
(83, 32, 10),
(84, 8, 1),
(85, 8, 5),
(86, 8, 4),
(87, 8, 8),
(88, 8, 10),
(89, 9, 4),
(90, 9, 6),
(91, 9, 8),
(92, 9, 11),
(93, 9, 10),
(94, 33, 1),
(95, 33, 2),
(96, 33, 3),
(97, 33, 7),
(98, 33, 9),
(99, 34, 1),
(100, 34, 2),
(101, 34, 8),
(102, 34, 12),
(103, 34, 10),
(104, 35, 1),
(105, 35, 2),
(106, 35, 4),
(107, 35, 7),
(108, 35, 9),
(109, 36, 2),
(110, 36, 4),
(111, 36, 7),
(112, 36, 11),
(113, 36, 10),
(114, 37, 5),
(115, 37, 8),
(116, 37, 12),
(117, 37, 11),
(118, 37, 9),
(119, 38, 2),
(120, 38, 5),
(121, 38, 4),
(122, 38, 7),
(123, 38, 9),
(124, 39, 3),
(125, 39, 5),
(126, 39, 4),
(127, 39, 6),
(128, 39, 8),
(129, 10, 2),
(130, 10, 5),
(131, 10, 8),
(132, 10, 11),
(133, 10, 9),
(134, 40, 4),
(135, 40, 6),
(136, 40, 8),
(137, 40, 9),
(138, 40, 10),
(139, 11, 1),
(140, 11, 2),
(141, 11, 3),
(142, 11, 7),
(143, 11, 12),
(144, 41, 1),
(145, 41, 5),
(146, 41, 4),
(147, 41, 7),
(148, 41, 11),
(149, 42, 2),
(150, 42, 3),
(151, 42, 6),
(152, 42, 7),
(153, 42, 9),
(154, 43, 1),
(155, 43, 3),
(156, 43, 4),
(157, 43, 7),
(158, 43, 12),
(159, 12, 1),
(160, 12, 2),
(161, 12, 3),
(162, 12, 5),
(163, 12, 6),
(164, 13, 5),
(165, 13, 4),
(166, 13, 6),
(167, 13, 8),
(168, 13, 10),
(169, 44, 1),
(170, 44, 3),
(171, 44, 7),
(172, 44, 12),
(173, 44, 11),
(174, 45, 1),
(175, 45, 3),
(176, 45, 6),
(177, 45, 12),
(178, 45, 11),
(179, 14, 1),
(180, 14, 5),
(181, 14, 4),
(182, 14, 7),
(183, 14, 9),
(184, 46, 1),
(185, 46, 3),
(186, 46, 5),
(187, 46, 7),
(188, 46, 11),
(189, 15, 3),
(190, 15, 5),
(191, 15, 8),
(192, 15, 12),
(193, 15, 10),
(194, 47, 4),
(195, 47, 8),
(196, 47, 12),
(197, 47, 9),
(198, 47, 10),
(199, 48, 1),
(200, 48, 5),
(201, 48, 4),
(202, 48, 7),
(203, 48, 9),
(204, 49, 1),
(205, 49, 7),
(206, 49, 11),
(207, 49, 9),
(208, 49, 10),
(209, 50, 2),
(210, 50, 3),
(211, 50, 4),
(212, 50, 7),
(213, 50, 12),
(214, 51, 1),
(215, 51, 2),
(216, 51, 5),
(217, 51, 8),
(218, 51, 10),
(219, 52, 2),
(220, 52, 5),
(221, 52, 4),
(222, 52, 7),
(223, 52, 11),
(224, 53, 1),
(225, 53, 2),
(226, 53, 4),
(227, 53, 6),
(228, 53, 7),
(229, 54, 3),
(230, 54, 6),
(231, 54, 8),
(232, 54, 12),
(233, 54, 11),
(234, 55, 1),
(235, 55, 3),
(236, 55, 7),
(237, 55, 12),
(238, 55, 11),
(239, 56, 2),
(240, 56, 5),
(241, 56, 6),
(242, 56, 12),
(243, 56, 9),
(244, 16, 1),
(245, 16, 2),
(246, 16, 4),
(247, 16, 7),
(248, 16, 10),
(249, 67, 1),
(250, 67, 3),
(251, 67, 5),
(252, 67, 4),
(253, 67, 11),
(254, 57, 1),
(255, 57, 2),
(256, 57, 7),
(257, 57, 12),
(258, 57, 11),
(259, 58, 1),
(260, 58, 3),
(261, 58, 4),
(262, 58, 7),
(263, 58, 9),
(264, 17, 1),
(265, 17, 2),
(266, 17, 7),
(267, 17, 12),
(268, 17, 9),
(269, 18, 5),
(270, 18, 4),
(271, 18, 7),
(272, 18, 11),
(273, 18, 10),
(274, 59, 1),
(275, 59, 3),
(276, 59, 4),
(277, 59, 7),
(278, 59, 12),
(279, 60, 5),
(280, 60, 7),
(281, 60, 12),
(282, 60, 11),
(283, 60, 10),
(284, 61, 2),
(285, 61, 5),
(286, 61, 6),
(287, 61, 12),
(288, 61, 9),
(289, 62, 2),
(290, 62, 3),
(291, 62, 5),
(292, 62, 7),
(293, 62, 11),
(294, 63, 1),
(295, 63, 3),
(296, 63, 5),
(297, 63, 4),
(298, 63, 11),
(299, 19, 4),
(300, 19, 6),
(301, 19, 7),
(302, 19, 12),
(303, 19, 11),
(304, 64, 1),
(305, 64, 3),
(306, 64, 5),
(307, 64, 7),
(308, 64, 12),
(309, 65, 1),
(310, 65, 2),
(311, 65, 3),
(312, 65, 7),
(313, 65, 12),
(314, 20, 1),
(315, 20, 2),
(316, 20, 3),
(317, 20, 5),
(318, 20, 7),
(319, 66, 3),
(320, 66, 7),
(321, 66, 8),
(322, 66, 9),
(323, 66, 10),
(324, 21, 1),
(325, 21, 3),
(326, 21, 7),
(327, 21, 11),
(328, 21, 9),
(329, 22, 1),
(330, 22, 2),
(331, 22, 7),
(332, 22, 9),
(333, 22, 10),
(343, 68, 1),
(344, 68, 4),
(345, 68, 7),
(346, 68, 10),
(347, 68, 11);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forgot_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `is_admin`, `created_at`, `forgot_password`) VALUES
(7, 'William', 'Girard-Reydet', 'williyo@gmail.com', '202cb962ac59075b964b07152d234b70', 652201669, 1, '2020-06-02 12:56:12', NULL),
(8, 'William', 'Girard-Reydet', 'test123@gmail.com', '202cb962ac59075b964b07152d234b70', 652201669, 0, '2020-06-09 18:54:58', NULL),
(10, 'William', 'Girard-Reydet', 'wgirardreydet@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, '2020-06-17 13:48:12', '93272042'),
(12, 'VincentSenpai', 'MaxiChou', 'admin@thebrickbox.net', 'b53759f3ce692de7aff1b5779d3964da', 0, 1, '2020-06-21 00:01:43', NULL),
(13, 'VincentSenpai', 'MaxiChou', 'user@thebrickbox.net', 'b53759f3ce692de7aff1b5779d3964da', 0, 0, '2020-06-21 00:04:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_address`
--

DROP TABLE IF EXISTS `users_address`;
CREATE TABLE IF NOT EXISTS `users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_address_user_id` (`user_id`),
  KEY `users_address_address_id` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_address`
--

INSERT INTO `users_address` (`id`, `user_id`, `address_id`) VALUES
(1, 7, 1),
(2, 7, 2),
(5, 7, 25);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `categories_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_products_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `products_colors`
--
ALTER TABLE `products_colors`
  ADD CONSTRAINT `products_colors_color_id` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_colors_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_address_id` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_address_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
