-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2023 at 12:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(1, 'Irina', 'Kukla', '123@mail.ru', '123Aaa!aaa', '1', NULL),
(2, 'I', 'I', 'iii@i.i', '123eeee66!sA', '1', NULL),
(3, 'Irina', 'Kukla', '124@mail.ru', '$2y$10$Fcbd7Py54BvzXVMsyjDmD.P1R0mLhSgXpZo5OeMH5Rc7MxwtxwRCm', '1', NULL),
(4, 'Irina', 'Kukla', '125@mail.ru', '$2y$10$.1d4FJ.4pbTvmuqwq0boSu/XOZvIvIXisNXIbd0g9MjfvDyOH6NZa', '1', NULL),
(5, 'Irina', 'Kukla', '1236@mail.ru', '$2y$10$RNB642a42GKaxX4ls7v92uIOb0WqnDCTN0UXBWXOeHBXYhma/aX.m', '1', NULL),
(6, 'Admin', 'User', 'admin@cse340.net', '$2y$10$59bipZZDAUfQj7KXZvYyVuhb95T3ICvE9kpffkfNqiTrUgzL71vty', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(39, 1, 'wrangler.jpg', '/phpmotors/images/vehicles/wrangler.jpg', '2023-07-01 12:14:37', 1),
(40, 1, 'wrangler-tn.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '2023-07-01 12:14:37', 1),
(43, 3, 'lambo-Adve.jpg', '/phpmotors/images/vehicles/lambo-Adve.jpg', '2023-07-01 12:16:33', 1),
(44, 3, 'lambo-Adve-tn.jpg', '/phpmotors/images/vehicles/lambo-Adve-tn.jpg', '2023-07-01 12:16:33', 1),
(45, 2, 'ford-modelt.jpg', '/phpmotors/images/vehicles/ford-modelt.jpg', '2023-07-01 12:17:11', 1),
(46, 2, 'ford-modelt-tn.jpg', '/phpmotors/images/vehicles/ford-modelt-tn.jpg', '2023-07-01 12:17:11', 1),
(47, 4, 'monster.jpg', '/phpmotors/images/vehicles/monster.jpg', '2023-07-01 12:20:42', 1),
(48, 4, 'monster-tn.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', '2023-07-01 12:20:42', 1),
(49, 5, 'ms.jpg', '/phpmotors/images/vehicles/ms.jpg', '2023-07-01 12:20:57', 1),
(50, 5, 'ms-tn.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', '2023-07-01 12:20:57', 1),
(51, 6, 'bat.jpg', '/phpmotors/images/vehicles/bat.jpg', '2023-07-01 12:21:17', 1),
(52, 6, 'bat-tn.jpg', '/phpmotors/images/vehicles/bat-tn.jpg', '2023-07-01 12:21:17', 1),
(53, 7, 'mm.jpg', '/phpmotors/images/vehicles/mm.jpg', '2023-07-01 12:21:34', 1),
(54, 7, 'mm-tn.jpg', '/phpmotors/images/vehicles/mm-tn.jpg', '2023-07-01 12:21:34', 1),
(55, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2023-07-01 12:21:58', 1),
(56, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2023-07-01 12:21:58', 1),
(57, 9, 'crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic.jpg', '2023-07-01 12:22:10', 1),
(58, 9, 'crown-vic-tn.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '2023-07-01 12:22:10', 1),
(59, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2023-07-01 12:22:22', 1),
(60, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2023-07-01 12:22:22', 1),
(61, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2023-07-01 12:22:41', 1),
(62, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2023-07-01 12:22:41', 1),
(63, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2023-07-01 12:22:54', 1),
(64, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2023-07-01 12:22:54', 1),
(65, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2023-07-01 12:23:14', 1),
(66, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2023-07-01 12:23:14', 1),
(67, 14, 'fbi.jpg', '/phpmotors/images/vehicles/fbi.jpg', '2023-07-01 12:23:32', 1),
(68, 14, 'fbi-tn.jpg', '/phpmotors/images/vehicles/fbi-tn.jpg', '2023-07-01 12:23:32', 1),
(69, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2023-07-01 12:23:49', 1),
(70, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2023-07-01 12:23:49', 1),
(71, 29, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2023-07-01 12:36:02', 1),
(72, 29, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2023-07-01 12:36:02', 1),
(73, 1, 'wrangler1.jpeg', '/phpmotors/images/vehicles/wrangler1.jpeg', '2023-07-01 12:41:00', 0),
(74, 1, 'wrangler1-tn.jpeg', '/phpmotors/images/vehicles/wrangler1-tn.jpeg', '2023-07-01 12:41:00', 0),
(75, 2, 'Ford_Model_T_01.jpg', '/phpmotors/images/vehicles/Ford_Model_T_01.jpg', '2023-07-01 12:42:18', 0),
(76, 2, 'Ford_Model_T_01-tn.jpg', '/phpmotors/images/vehicles/Ford_Model_T_01-tn.jpg', '2023-07-01 12:42:18', 0),
(77, 3, 'lambo-adv.jpeg', '/phpmotors/images/vehicles/lambo-adv.jpeg', '2023-07-01 12:43:49', 0),
(78, 3, 'lambo-adv-tn.jpeg', '/phpmotors/images/vehicles/lambo-adv-tn.jpeg', '2023-07-01 12:43:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,2) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/phpmotors/images/vehicles/wrangler.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', 28045.00, 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/phpmotors/images/vehicles/ford-modelt.jpg', '/phpmotors/images/vehicles/ford-modelt-tn.jpg', 30000.00, 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/phpmotors/images/vehicles/lambo-Adve.jpg', '/phpmotors/images/vehicles/lambo-Adve-tn.jpg', 417650.00, 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', 150000.00, 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/phpmotors/images/vehicles/ms.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', 100.00, 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/phpmotors/images/vehicles/bat.jpg', '/phpmotors/images/vehicles/bat-tn.jpg', 65000.00, 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/mm.jpg', '/phpmotors/images/vehicles/mm-tn.jpg', 10000.00, 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/phpmotors/images/vehicles/fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', 50000.00, 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', 10000.00, 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', 25000.00, 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', 75195.00, 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', 58800.00, 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/phpmotors/images/vehicles/aerocar.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', 1000000.00, 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/fbi.jpg', '/phpmotors/images/vehicles/fbi-tn.jpg', 20000.00, 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/phpmotors/images/vehicles/no-image.png', '/phpmotors/images/vehicles/no-image.png', 35000.00, 1, 'Brown', 2),
(29, 'DeLorean', 'DMC', 'Best car of all times.', '/phpmotors/images/vehicles/delorean.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', 3400.00, 1, 'Silver', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(5, 'Monster trucks are enormous, specialized vehicles designed to perform incredible feats of power and agility in off-road environments. With massive engines, huge tires and enormous suspension systems, these vehicles are capable of crushing and flipping cars and even other trucks with ease. However, they are not suitable for regular commuting or long-distance travel, and they can be extremely noisy and cumbersome to drive.', '2023-07-13 16:05:59', 4, 5),
(9, 'The Ford Crown Victoria is a spacious, reliable, and durable full-dimensional sedan that was a popular choice for law enforcement agencies due to its strong V8 engine and rugged looks. The car has a long history of solid performance and reliability in police service, although gas mileage and handling were not as impressive as its competitors. It remains a popular choice among collectors and enthusiasts for its classic design and dependable performance.', '2023-07-13 17:41:46', 9, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
