-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 10:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakeinc_db`
--
CREATE DATABASE IF NOT EXISTS `cakeinc_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cakeinc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--
-- Creation: Jul 08, 2020 at 08:09 AM
-- Last update: Jul 21, 2020 at 01:32 PM
--

DROP TABLE IF EXISTS `cakes`;
CREATE TABLE IF NOT EXISTS `cakes` (
  `cakeID` int(11) NOT NULL AUTO_INCREMENT,
  `cakeName` varchar(50) NOT NULL,
  `cakeDesc` varchar(300) NOT NULL,
  `cakePrice` double(7,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`cakeID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cakes`:
--

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`cakeID`, `cakeName`, `cakeDesc`, `cakePrice`) VALUES
(1, 'ULTIMATE CHOCOLATE CAKE', 'Moist, dark chocolate cake, with smooth Chocolate Cream Cheese Frosting. Topped with semi-dark Cocoafair chocolate ganache & beautiful Dark Chocolate Shavings. Every single person who’s tasted it says that this is the BEST chocolate cake in Cape Town!', 575.00),
(2, 'SEASONAL CHEESECAKE', 'Dense & creamy New York style baked Cheesecake. All-butter pastry crust filled with rich, smooth vanilla cheesecake. Topped with a thin layer of whipped cream cream-cheese frosting and whatever fresh fruit is in season!', 645.00),
(3, 'OREO AND SALTED CARAMEL CAKE', 'Moist Dark Chocolate Cake with Oreo Frosting and salted caramel. Topped with Dark Chocolate shavings, more salted caramel, chocolate ganache and Oreos! Inspired by late night trips to McDonalds, munching Oreo McFlurries with extra Caramel! Yummmm!', 585.00),
(4, 'CINNABON CAKE', 'Based on the humble Cinnabon flavours we all love so much 🙂 Moist Vanilla-Cinnamon cake marbled with Chocolate Fudge Sauce, topped with our signature Cream Cheese Frosting, Salted Caramel, Chocolate Ganache and Pecan nuts. Sensational!', 575.25),
(5, 'ULTIMATE CARROT CAKE', 'Made with freshly grated carrots, crushed pineapple, raisins, toasted pecans, cinnamon, ginger & a few mystery ingredients that make the cake extra YUM! Finished with lush cream cheese frosting & a generous helping of toasted pecans. Seriously the ultimate carrot cake!', 550.00),
(6, 'POPPY SEED AND COCONUT CAKE', 'Feakin delicious cake! It’s made with Greek yogurt, which gives it a super moist crumb and a slight tang. Coconut and Poppy Seeds give a beautiful flavour and texture. Topped with my signature cream cheese frosting & lush White Chocolate Curls. This cake will surprize you!', 565.00),
(7, 'LEMON AND PISTACHIO CAKE', 'A light, fluffy, moist, sharp lemon cake made with FRESH lemons – not essence! The cake is filled and topped with my signature cream cheese frosting and toasted pistachio nuts. Bright, beautiful, fresh and extremely yummy! If lemon is your thing you HAVE to get this cake!\r\n', 575.00),
(8, 'FUN FETTI CAKE', 'A gorgeous buttery vanilla and buttermilk cake wiTh colourful sprinkles inside the batter! Filled and topped with Philosophy of Yum’s signature cream cheese frosting, fun fetti caramelized cheesecake shards & more sprinkles. Tastes like childhood – even a tad better 😉', 545.00),
(9, 'CHOCOLATE SWIRL CHEESECAKE', 'Dense & creamy New York style baked Cheesecake. Chocolate pastry (made with real butter) filled with vanilla cheesecake, swirled with chocolate cheesecake. Baked at a low temperature for 1h40! Topped with CocoaFair Chocolate Ganache & white chocolate drizzle.', 625.00),
(10, 'BERRY CHEESECAKE', 'Dense & creamy New York style baked Cheesecake. An all-butter pastry crust filled with creamy vanilla cheesecake batter and baked at a low temperature for 1h40! Topped with a homemade berry compote of your choice: Blueberry, Strawberry, Raspberry or mixed berry.', 675.00),
(11, 'LEMON CHEESECAKE', 'A decadent & smooth New York Style Baked Cheesecake; An all-butter pastry crust filled with creamy vanilla cheesecake batter and baked at a low temperature for 1h40! Topped with sharp, fresh homemade lemon curd, toasted almonds and a light dusting of icing sugar.', 645.00),
(12, 'CHOCOLATE RASPBERRY CHEESECAKE', 'This is the PERFECT New York Style Baked Cheesecake for chocoholics. All-butter pastry crust filled with dreamy, smooth chocolate cheesecake. Topped with chocolate ganache, a sharp, homemade raspberry compote and chocolate shavings – SO indulgent!', 695.00),
(13, 'PASSION FRUIT CHEESECAKE', 'Dense & creamy New York style baked Cheesecake. An all-butter pastry crust filled with creamy vanilla cheesecake batter and baked at a low temperature for 1h40! Topped with sharp passion fruit compote (I use fresh passion fruit when they’re available).', 625.00),
(14, 'GERMAN APPLE CAKE', 'An incredibly moist cake with loads of fresh apples and a good dose of cinnamon. Topped with my signature Cream Cheese Frosting and pecan nuts. To quote a client “I had one of your German Apple Cupcakes and I knew I was ruined for life.” A unique & DELICIOUS cake!', 550.00),
(15, 'ORANGE AND POPPY SEED CAKE', 'Made with lots of butter, muscovado sugar, buttermilk, fresh orange zest & juice. Filled and topped with my secret Cream Cheese Frosting and then to finish it off – toasted almonds (no essence) and some freshly grated orange zest. Scrumptious cake! It was my late sister’s fav 😉', 575.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: Jul 31, 2020 at 08:27 AM
-- Last update: Jul 30, 2020 at 09:39 AM
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `cakeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `collected` tinyint(1) NOT NULL DEFAULT 0,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`orderID`),
  KEY `cakeID` (`cakeID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `cakeID`
--       `cakes` -> `cakeID`
--   `userID`
--       `users` -> `userID`
--

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `cakeID`, `userID`, `quantity`, `paid`, `collected`, `orderDate`) VALUES
(1, 1, 2, 2, 0, 0, '2020-07-16 12:25:00'),
(2, 10, 2, 1, 1, 1, '2020-07-17 12:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jul 31, 2020 at 08:27 AM
-- Last update: Jul 31, 2020 at 08:27 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`, `admin`) VALUES
(1, 'Lynette Cook', 'lynette@cakeinc.com', '123456', 1),
(2, 'Louis la Grange', 'louis@cegullah.co.za', 'qwer', 0),
(3, 'Anthony Le Grangie', 'ant@mail.net', '123456789', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cakeID`) REFERENCES `cakes` (`cakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table cakes
--

--
-- Metadata for table orders
--

--
-- Metadata for table users
--

--
-- Metadata for database cakeinc_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
