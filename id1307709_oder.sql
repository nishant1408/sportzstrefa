-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2018 at 09:54 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1307709_oder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `size` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `quantity`, `size`, `user_id`, `product_id`) VALUES
(16, '2', '', 17, 11),
(17, '1', 'XXL', 17, 23);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` mediumtext NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` mediumtext NOT NULL,
  `info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` int(11) NOT NULL,
  `poster1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `poster2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `poster3` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc11` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc12` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc21` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc22` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc31` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `desc32` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id`, `poster1`, `poster2`, `poster3`, `desc11`, `desc12`, `desc21`, `desc22`, `desc31`, `desc32`) VALUES
(1, 'Congratulations!-page-001 (1).jpg', 'football poster-2-page-001.jpg', 'poster-3-page-001.jpg', 'details', 'details', 'details', 'details', 'details', 'details');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `TIME` datetime(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `views` int(100) NOT NULL,
  `rate` decimal(3,0) NOT NULL,
  `sports` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `return_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `return_day` int(11) NOT NULL,
  `product_desc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `sizeset` int(11) NOT NULL,
  `size1` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size2` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size3` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size4` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size5` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size6` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size7` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size8` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size9` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `size10` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `add_info` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `review` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `help` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pic1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic3` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic4` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic5` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic6` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic7` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic8` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `show_price` int(11) NOT NULL,
  `original_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `f1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seller` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `g1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g6` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i6` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g7` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i7` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g8` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i8` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g9` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i9` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `g10` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i10` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi5` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p6` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi6` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p7` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi7` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p8` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi8` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p9` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi9` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p10` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pi10` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag3` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag4` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag5` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag6` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag7` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag8` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag9` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tag10` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `verify` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`TIME`, `product_id`, `views`, `rate`, `sports`, `brand`, `type`, `stock`, `return_type`, `return_day`, `product_desc`, `sizeset`, `size1`, `size2`, `size3`, `size4`, `size5`, `size6`, `size7`, `size8`, `size9`, `size10`, `add_info`, `review`, `help`, `name`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`, `show_price`, `original_price`, `discount`, `f1`, `f2`, `f3`, `f4`, `f5`, `seller`, `g1`, `i1`, `g2`, `i2`, `g3`, `i3`, `g4`, `i4`, `g5`, `i5`, `g6`, `i6`, `g7`, `i7`, `g8`, `i8`, `g9`, `i9`, `g10`, `i10`, `p1`, `pi1`, `p2`, `pi2`, `p3`, `pi3`, `p4`, `pi4`, `p5`, `pi5`, `p6`, `pi6`, `p7`, `pi7`, `p8`, `pi8`, `p9`, `pi9`, `p10`, `pi10`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `tag6`, `tag7`, `tag8`, `tag9`, `tag10`, `verify`) VALUES
('0000-00-00 00:00:00.000000', 8, 12, 0, 'SWIMMING', 'Nivia', 'GOOGLES', 4, 'YES', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Nivia Dolphin Swimming Goggles  (Black)', 'Nivia Dolphin Swimming Goggles  (Black).JPG', 'Nivia Dolphin Swimming Goggles  (Black)1.JPG', '', '', '', '', '', '', 264, '335', 21, 'Type: Swimming Goggles', 'Color: Black', 'Ideal For: Boys, Girls', 'UV Protection', 'Frame Material: Plastic | Frame Color: Black', 'SPORTZSTREFA', 'Type', 'Swimming Goggles', 'Ideal For', ' Boys, Girls', 'Playing Level', 'Advanced, Training', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Strap Material', ' Silicon', 'Anti-fog', 'Yes', 'Frame Material', ' Plastic', 'Frame Color', ' Black', '', '', '', '', '', '', '', '', '', '', '', '', 'Swimming Goggles', 'Dolphin Goggles', 'Nivia Dolphin Goggles', 'Goggles', '', ' ', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 9, 15, 0, 'SWIMMING', 'Hrinkar', 'GOOGLES', 2, 'YES', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'HRINKAR Adjustable Eye Protection With Ear Plugs & Nose Clip (2 pcs Combo) - HSWCMB0011 Swimming Goggles  (Purple, Green)', 'HRINKAR Adjustable Eye Protection With Ear Plugs & Nose Clip (2 pcs Combo) - HSWCMB0011 Swimming Goggles  (Purple, Green).JPG', 'HRINKAR Adjustable Eye Protection With Ear Plugs & Nose Clip (2 pcs Combo) - HSWCMB0011 Swimming Goggles  (Purple, Green)1.JPG', 'HRINKAR Adjustable Eye Protection With Ear Plugs & Nose Clip (2 pcs Combo) - HSWCMB0011 Swimming Goggles  (Purple, Green)2.JPG', '', '', '', '', '', 499, '1499', 67, 'Type: Swimming Goggles', 'Color: Purple, Green', 'Ideal For: Boys, Girls, Men, Women', 'UV Protection', 'Frame Material: Plastic', 'SPORTZSTREFA', 'Type', 'Swimming Goggles', 'Ideal For', 'Boys, Girls, Men, Women', 'Playing Level', 'Advanced, Beginner, Intermediate, Recreational, Tr', 'UV Protection', ' Yes', '', '', '', '', '', '', '', '', '', '', '', '', 'Anti-fog', 'Yes', 'Yes Other Swimming Goggle Features', 'Adjustable, Eye Protection', 'Shape', ' ovel', 'Frame Material', 'Plastic', '', '', '', '', '', '', '', '', '', '', '', '', 'Hrinkar Eye Protector', 'Hrinkar Adjustable Goggles', 'Hrinkar Adjustable Swimming Goggles', 'Swimming Goggles', 'Swimming Goggle', 'Goggle', 'Goggles', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 10, 24, 0, 'FOOTBALL', 'Adidas', 'FOOTBALL', 1, 'YES', 0, '', 1, '5', '', '', '', '', '', '', '', '', '', '', '', '', 'Adidas Ace Glid Football - Size 5  (Pack of 1, White, Red, Black)', 'Adidas Ace Glid Football - Size 5  (Pack of 1, White, Red, Black).JPG', 'Adidas Ace Glid Football - Size 5  (Pack of 1, White, Red, Black)1.JPG', 'Adidas Ace Glid Football - Size 5  (Pack of 1, White, Red, Black)2.JPG', '', '', '', '', '', 1259, '1799', 30, 'Football', 'Outer Material: Butylene (100%),', 'Thermoplastic Polyurethane (100%)', 'Weight: 390 g', '', 'SPORTZSTREFA', 'A', 'A', 'B', 'B', 'C', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sales Package', ' 1 Ball', 'Part Number ID', 'AZ5975', 'Stitching Type', ' Machine Stitch', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Football', 'Adidas Football', 'White Football', 'Red Football', 'Black Football', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 11, 12, 0, 'CYCLING', 'HI-Bird', 'CYCLE', 9, 'YES', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'HI-BIRD MILITARY PATTERN RACER 26T 21 SPEED BICYCLE 26 T 21 Speed Road Cycle  (Multicolor)', 'HI-BIRD MILITARY PATTERN RACER 26T 21 SPEED BICYCLE 26 T 21 Speed Road Cycle  (Multicolor).JPG', '', '', '', '', '', '', '', 12996, '16200', 20, 'Rider Height: 177 cm', 'Ideal For: Men', 'Fork: Front | Frame Material: Steel', 'Brake Type: Disc Brake | Gear: 21 Speed', 'Tire Size: 26 inch | Frame Size:17 inch', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Model Number', 'Miltry-Racer', 'Model Name', 'MILITARY PATTERN RACER 26T 21 SPEED BICYCLE', 'Brand Color', ' MILITARY PATTERN', 'Mudguard', ' Plastic Mudguards', 'Front Derailleur', ' Shimano', '', '', '', '', '', '', '', '', '', '', 'Bicycle', 'racing cycle', 'cycle', '', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 12, 17, 0, 'CRICKET', 'Kamachi', 'CRICKET BAT', 0, 'YES', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kamachi Protection Equipment PE-66 Skating, Cycling Kit', 'KAMACHI Protection Equipment PE-66 Skating, Cycling Kit.JPG', '', '', '', '', '', '', '', 499, '650', 23, 'Sport Type: Skating, Cycling', 'Ideal For: Boys, Men, Girls, Women, Junior', 'Color: Multicolor', 'Width: 27.5 cm, Height: 14.5 cm, Depth: 12.3 cm', '', 'SPORTZSTREFA', 'Model Name', ' Protection Equipment PE-66', 'Exercise Type', ' Skating, Cycling', 'Designed for', ' Trainning', 'Number of Inner Compartments', '7', '7 Number of Outer Compartments', '1', 'Material', 'Plastic, Polyester Fabric', 'Sales Package', ' 1 Pair Of Elbow Protector, 1 Pair Of Wrist Guard,', '', '', '', '', '', '', 'Width', '27.5 cm', 'Height', '14.5 cm', 'Depth', '12.3 cm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Skating kit', 'Cycling Kit', 'Skating and cycling kit', 'Kit', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 13, 3, 0, 'HOCKEY', 'Alfa', 'HOCKEY BALL', 6, 'YES', 0, '', 1, '5', '', '', '', '', '', '', '', '', '', '', '', '', 'Alfa Hollow Hockey Ball Size 5 (Pack of 6, White)', 'Alfa ALFA Hockey Speed With Cover & Grip Hockey Kit.JPG', '', '', '', '', '', '', '', 920, '1080', 15, 'Hockey Ball', 'Water Resistant', 'Weight: 1150 g', '', '', 'SPORTZSTREFA', '', 'ALFA HOCKEY HOLLOW DIMPLE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part Number ID', 'HY132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'hockey ball', 'ball', 'alfa hockey ball', 'alfa  ball', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 15, 6, 0, 'FOOTBALL', 'Adidas', 'FOOTBALL SHOES', 15, 'YES', 15, '', 1, '5', '6', '7', '8', '9', '10', '11', '12', '', '', '', '', '', 'Adidas ACE TANGO 17.3 TF Football Shoes For Men  (White)', 'Adidas ACE TANGO 17.3 TF Football Shoes For Men  (White).PNG', 'Adidas ACE TANGO 17.3 TF Football Shoes For Men  (White)1.PNG', 'Adidas ACE TANGO 17.3 TF Football Shoes For Men  (White)2.PNG', '', '', '', '', '', 3672, '5499', 33, 'FOOTBALL SHOES', '', '', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Football Shoes', 'Shoes', 'Adidas Football Shoe', 'Shoe', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 16, 3, 0, 'FOOTBALL', 'Nike', 'FOOTBALL SHOES', 7, 'YES', 10, '', 1, '7', '8', '9', '10', '11', '', '', '', '', '', '', '', '', 'Nike TIEMPO GENIO II LEATHER IC Football Shoes For Men  (White)', 'Nike TIEMPO GENIO II LEATHER IC Football Shoes For Men  (White).PNG', 'Nike TIEMPO GENIO II LEATHER IC Football Shoes For Men  (White)1.PNG', 'Nike TIEMPO GENIO II LEATHER IC Football Shoes For Men  (White)2.PNG', '', '', '', '', '', 5547, '8895', 38, 'FOOTBALL SHOES', '', '', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Shoe', 'Shoes', 'Football Shoe', 'Football Shoes', 'Nike Football Shoe', 'Nike Football Shoes', 'Nike Football Leather Shoe', 'Nike Football Leather Shoes', 'leather football shoe', 'leather football shoes', '1'),
('0000-00-00 00:00:00.000000', 18, 4, 0, 'FOOTBALL', 'Nivia', 'FOOTBALL SHOES', 15, 'YES', 15, '', 1, '3', '4', '5', '6', '7', '8', '9', '10', '11', '', '', '', '', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black)', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black).PNG', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black)1.PNG', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black)2.PNG', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black)3.PNG', 'Nivia Pro Carbonite with Collar Rib Football Shoes For Men  (Orange, Black)4.PNG', '', '', '', 669, '669', 0, 'FOOTBALL SHOES', '', '', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Shoe', 'Football Shoes', 'Nivia Football Shoe for men', 'Nivia Football shoes for men', 'Nivia pro Shoe Black orange', 'Nivia Pro Shoes Black Orange', 'Nivia Pro Carbonite shoe black orange', 'Nivia Pro Carbonite shoes black orange', 'Black football shoe', 'Black orange football shoes', '1'),
('0000-00-00 00:00:00.000000', 19, 2, 0, 'FOOTBALL', 'Sportigo', 'JERSEY', 15, 'YES', 15, '', 1, 'S', 'M', 'L', '', '', '', '', '', '', '', '', '', '', 'Sportigo Printed Men Round Neck Blue T-Shirt', 'Sportigo Printed Men Round Neck Blue T-Shirt.PNG', 'Sportigo Printed Men Round Neck Blue T-Shirt1.PNG', '', '', '', '', '', '', 1350, '1699', 21, 'Fabric: Polyester Wool Nylon Blend', 'Regular Fit Round Neck T-shirt', 'Pattern: Printed', 'Sleeve Type: Narrow Full Sleeve', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Football Jersey', 'Jersey', 'round neck jersey', 'football round neck jersey', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 20, 1, 0, 'BOXING', 'Alex Hi Tech', 'PROTECTIVE EQUIPMENT', 5, 'YES', 10, '', 1, 'S', '', '', '', '', '', '', '', '', '', '', '', '', 'Alex Hi Tech Wrist & Forearm Wrist Support (S, Grey)', 'Alex Hi Tech Wrist & Forearm Wrist Support (S, Grey).PNG', '', '', '', '', '', '', '', 405, '450', 10, 'All exercises', 'Grey', 'Suitable For: Boxing, Tennis', 'Size: S', 'Boxing, Tennis', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Boxing gloves', 'gloves', 'wrist protector', 'wrist & forearm protector', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 21, 1, 0, 'BOXING', 'Monika Sports', 'PUNCHING BAGS', 15, 'YES', 30, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Monika Sports moni Boxing Kit        ', 'Monika Sports moni Boxing Kit.PNG', '', '', '', '', '', '', '', 999, '1800', 45, 'Sport Type: Boxing', 'Ideal For: Senior', 'Color: White, Black', 'Width: 8 inch, Height: 36 inch, Depth: 8 inch', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'boxing kit', 'punching bags', 'punching bag', '', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 22, 2, 0, 'BOXING', 'Prospo', 'PUNCHING BAGS', 15, 'YES', 10, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Prospo 36 Inch Extra tough Srf with chain Hanging Bag  (Heavy, 36 kg)', 'Prospo 36Extra tough Srf with chain Hanging Bag  (Heavy, 36 kg).PNG', 'Prospo 36Extra tough Srf with chain Hanging Bag  (Heavy, 36 kg)1.PNG', 'Prospo 36Extra tough Srf with chain Hanging Bag  (Heavy, 36 kg)2.PNG', '', '', '', '', '', 899, '1799', 50, 'Hanging Bag', 'Ideal For: Senior, Junior', 'Color: Black', 'Heavy Size', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'punching bags', 'punching bag', 'punching', 'chain hanging bag', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 23, 9, 0, 'FOOTBALL', 'Nivia', 'JERSEY', 14, 'YES', 15, '', 1, 'S', 'L', 'XXL', '', '', '', '', '', '', '', '', '', '', 'Nivia Solid Men Round Neck Blue T-Shirt', 'Nivia Solid Men Round Neck Blue T-Shirt.PNG', 'Nivia Solid Men Round Neck Blue T-Shirt1.PNG', 'Nivia Solid Men Round Neck Blue T-Shirt2.PNG', 'Nivia Solid Men Round Neck Blue T-Shirt3.PNG', '', '', '', '', 737, '760', 3, 'Fabric: Polyester', 'Slim Fit Round Neck T-shirt', 'Pattern: Solid', 'Sleeve Type: Wide Full Sleeve', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Jersey', 'Football Jersey', 'Nivia Jersey', 'Nivia Round neck jersey', 'Nivia round blue neck jersey', 'nivia blue round neck jersey', 'Round Neck Jersey', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 24, 5, 0, 'CRICKET', 'Sportigo', 'JERSEY', 15, 'YES', 10, '', 1, 'S', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', '', 'Sportigo Self Design Men Polo Neck Blue T-Shirt', 'Sportigo Self Design Men Polo Neck Blue T-Shirt.PNG', 'Sportigo Self Design Men Polo Neck Blue T-Shirt1.PNG', 'Sportigo Self Design Men Polo Neck Blue T-Shirt2.PNG', 'Sportigo Self Design Men Polo Neck Blue T-Shirt3.PNG', 'Sportigo Self Design Men Polo Neck Blue T-Shirt4.PNG', '', '', '', 750, '899', 17, 'Fabric: Polyester - Dry Fit', 'Regular Fit Polo Neck T-shirt', 'Pattern: Self Design', 'Sleeve Type: Narrow Half Sleeve', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Jersey', 'Cricket Jersey', 'Indian Team Jersey', 'Indian Jersey', 'ODI Jersey', 'T20 Jersey', 'India Team Blue Jersey', 'Indian Team Blue Jersey', 'Blue Jersey', '', '1'),
('0000-00-00 00:00:00.000000', 25, 7, 0, 'TENNIS', 'Wilson', 'TENNIS RACQUET', 15, 'YES', 15, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wilson Grand Slam XL 4 3/8 inch Strung  (Black, Blue, Weight - 270 g)', 'Wilson Grand Slam XL 4 3-8 inch Strung  (Black, Blue, Weight - 270 g).PNG', 'Wilson Grand Slam XL 4 3-8 inch Strung  (Black, Blue, Weight - 270 g)3.PNG', 'Wilson Grand Slam XL 4 3-8 inch Strung  (Black, Blue, Weight - 270 g)4.PNG', '', '', '', '', '', 1793, '2390', 25, 'Half Cover', 'Strung', 'Half Cover', 'Half Cover', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'racquet', 'racquets', 'tennis racquets', 'tennis racquet', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 26, 9, 0, 'TENNIS', 'Wilson US Open', 'TENNIS BALL', 14, 'YES', 10, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wilson US Open TB Tennis Ball - Size Standard  (Yellow)', 'Wilson US Open TB Tennis Ball - Size Standard  (Yellow).PNG', '', '', '', '', '', '', '', 368, '490', 25, 'Tennis Ball', 'Outer Material: Premium Tex/Tech Felt', '', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tennis ball', 'tennis balls', 'ball', 'balls', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 27, 5, 0, 'SWIMMING', 'Adidas', 'GOOGLES', 15, 'YES', 10, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Adidas SW KIDS PACK Swimming Kit', 'Adidas SW KIDS PACK Swimming Kit.PNG', 'Adidas SW KIDS PACK Swimming Kit1.PNG', 'Adidas SW KIDS PACK Swimming Kit2.PNG', 'Adidas SW KIDS PACK Swimming Kit3.PNG', 'Adidas SW KIDS PACK Swimming Kit4.PNG', '', '', '', 605, '1699', 64, 'Sport Type: Swimming', 'Ideal For: Boys, Girls', 'Color: boblue/brcyan/poblon', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'swimming kit', 'swimming kit  bag', 'kit bag', 'kits', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 28, 10, 0, 'TENNIS', 'Wilson Australian Open ', 'TENNIS BALL', 14, 'YES', 10, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wilson Australian Open Tennis Ball', 'Wilson Australian Open Tennis Ball.PNG', 'Wilson Australian Open Tennis Ball1.PNG', '', '', '', '', '', '', 390, '515', 24, 'Tennis Ball', 'Outer Material: Yarn', 'Weight 50-100g', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tennis ball', 'tennis balls', 'australian open tennis ball', 'balls', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 29, 23, 0, 'SHOES', 'Reebok', 'RUNNING SHOES', 8, 'YES', 10, '', 1, '6', '7', '8', '9', '10', '11', '', '', '', '', '', '', '', 'Reebok SUPER LITE Running Shoes For Men  (Blue)', 'Reebok SUPER LITE Running Shoes For Men  (Blue).PNG', 'Reebok SUPER LITE Running Shoes For Men  (Blue)1.PNG', 'Reebok SUPER LITE Running Shoes For Men  (Blue)2.PNG', 'Reebok SUPER LITE Running Shoes For Men  (Blue)3.PNG', 'Reebok SUPER LITE Running Shoes For Men  (Blue)4.PNG', 'Reebok SUPER LITE Running Shoes For Men  (Blue)5.PNG', '', '', 1799, '2999', 40, 'Colour: Blue', 'Outer Material: Mesh', '', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Shoes', 'Reebok Shoes', 'Running Shoes', 'Reebok Shoe for Men', 'Reebok Shoes for Men', 'Reebok Shoes Blue', 'Shoe', 'Reebok Shoe', 'Running Shoe', 'Reebok Shoe for Men Blue', '1'),
('0000-00-00 00:00:00.000000', 30, 35, 0, 'CRICKET', 'SG', 'PROTECTIVE EQUIPMENT', 2, 'YES', 30, '', 1, 'XL', '', '', '', '', '', '', '', '', '', '', '', '', 'SG Smart Tech Cricket Helmet  (Navy Blue)', 'SG Smart Tech Cricket Helmet  (Navy Blue).PNG', 'SG Smart Tech Cricket Helmet  (Navy Blue)1.PNG', 'SG Smart Tech Cricket Helmet  (Navy Blue)2.PNG', '', '', '', '', '', 800, '899', 11, 'Type: Half Face', 'For Men', 'Size XL', '', '', 'SPORTZSTREFA', 'Type', 'Half Face', 'Sport Type ', 'Cricket', 'Ideal For', 'Men', 'Color ', 'Navy Blue', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Helmet', 'Cricket Helmet', 'SG Helmet', 'SG Cricket Helmet', 'helmets', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 31, 31, 0, 'CRICKET', 'SG', 'PROTECTIVE EQUIPMENT', -1, 'YES', 10, '', 1, 'S', 'M', 'L', '', '', '', '', '', '', '', '', '', '', 'SG Optipro Cricket Helmet  (Multicolor)', 'SG Optipro Cricket Helmet  (Multicolor).PNG', '', '', '', '', '', '', '', 901, '949', 5, 'Type: Full Face', 'For Boys ', 'Size:L', '', '', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Helmet', 'Cricket Helmet', 'Helmets', 'Cricket Helmets', 'Optipro Cricket Helmet', 'Optipro Cricket Helmets', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 32, 15, 0, '', 'Li-Ning', 'KIT BAG', 0, 'YES', 20, '', 1, 'L', '', '', '', '', '', '', '', '', '', '', '', '', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Black, Kit Bag)', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Black, Kit Bag).PNG', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Black, Kit Bag)2.PNG', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Black, Kit Bag)3.PNG', '', '', '', '', '', 495, '1499', 67, 'Bag Capacity: 8 L', 'Badminton Bag', 'Style: Kit Bag', 'Material: Heavy Duty Nylon, Polyester', 'Width: 71 cm, Height: 25 cm', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'badminton kit bag', 'badminton kit bags', 'badminton Thermal Double Belt Bag', 'Thermal Double Belt Bag', 'badminton double belt bag', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 33, 2, 0, '', 'Li-Ning', 'KIT BAG', 7, 'YES', 20, '', 1, 'L', '', '', '', '', '', '', '', '', '', '', '', '', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Yellow, Kit Bag)', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Yellow, Kit Bag).PNG', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Yellow, Kit Bag)2.PNG', 'Li-Ning 2 in 1 Thermal Double Belt Bag  (Yellow, Kit Bag)3.PNG', '', '', '', '', '', 495, '1499', 67, 'Bag Capacity: 8 L', 'Badminton Bag', 'Style: Kit Bag', 'Material: Heavy Duty Nylon, Polyester', 'Width: 71 cm, Height: 25 cm', 'SPORTZSTREFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'badminton kit bag', 'badminton kit bags', 'Thermal Double Belt Bag', 'badminton Thermal Double Belt Bag', '', '', '', '', '', '', '1'),
('0000-00-00 00:00:00.000000', 34, 0, 0, '', '', '', 0, '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comments` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `track_order`
--

CREATE TABLE `track_order` (
  `id` int(11) NOT NULL,
  `order_id` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deliveryby` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `dcharge` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `wallet` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `landmark` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cancelreason` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_num` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `coin` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pincode` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `landmark` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `city` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `state` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `password`, `order_num`, `email`, `mobile`, `name`, `code`, `coin`, `balance`, `address`, `pincode`, `landmark`, `city`, `state`) VALUES
(1, '12345', 0, 'sportstrefa@gmail.com', '7980068583', 'DHONI', 'ADMIN99', 0, 0, '346,Maharaja Nanda Kumar Road (North)', '700035', 'banerjee para', 'KOLKATA', 'WEST BENGAL'),
(2, 'vivek7675', 0, 'viveksngh789@gmail.com', '7687917675', 'Vivek Singh', 'VIVGH24', 0, 1000, '', '', '', '', ''),
(3, 'rajiv254', 0, 'rajivgupt20015@gmail.com', '8961261631', 'Rajiv Gupta', 'RAJTA28', 0, 0, '', '', '', '', ''),
(17, '12345', 0, 'n1481997@gmail.com', '9831297406', 'Nishant Kumar', 'NISAR16', 0, 0, '', '', '', '', ''),
(26, '12345678', 0, 'ankitthakur@engineer.com', '7890610755', 'Satakshi Thakur', 'SATUR48', 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_sheet`
--

CREATE TABLE `wallet_sheet` (
  `id` int(11) NOT NULL,
  `order_id` mediumtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `pcoin` int(11) NOT NULL,
  `pday` varchar(1100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_order`
--
ALTER TABLE `track_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet_sheet`
--
ALTER TABLE `wallet_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_order`
--
ALTER TABLE `track_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wallet_sheet`
--
ALTER TABLE `wallet_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
