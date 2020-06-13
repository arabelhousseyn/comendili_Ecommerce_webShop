-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 09:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comendili`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL COMMENT 'id of the categorie',
  `name` varchar(255) NOT NULL COMMENT 'name of the categorie and is unique',
  `description` text NOT NULL COMMENT 'description of the categorie',
  `ordering` int(11) NOT NULL COMMENT 'ordering the categorie',
  `visible` tinyint(4) NOT NULL DEFAULT 0 COMMENT ' show or hide the categorie',
  `comments` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'allow comments',
  `ads` tinyint(4) NOT NULL DEFAULT 0 COMMENT ' allow advertising'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `description`, `ordering`, `visible`, `comments`, `ads`) VALUES
(9, 'Televisions', '<b>Televisions</b>', 1, 0, 0, 0),
(10, 'Headphones', '<b>Headphones</b>', 2, 0, 0, 0),
(11, 'computers', '<b>computers</b>', 3, 0, 0, 0),
(12, 'mobiles', '<b>mobiles</b>', 4, 0, 0, 0),
(13, 'tv & video', '<b>tv &amp; video</b>', 5, 0, 0, 0),
(14, 'Ipad & Tablets', '<b>Ipad &amp; Tablets</b>', 6, 0, 0, 0),
(15, 'Cameras & Camcorders', '<b>Cameras &amp; Camcorders</b>', 7, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `name`, `description`, `price`, `date`, `country`, `image`, `status`, `rating`, `cat_id`, `member_id`) VALUES
(17, 'Haier 80 cm (32 Inches) HD Ready LED TV LE32K6000B (Black)', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Resolution: HD Ready (1366x768) | Refresh Rate: 60 hertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Connectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 1 USB port to connect hard drives and other USB devices | 1 VGA</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Sound : 16 Watts Output | Surround Sound</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Display : LED Panel | Picture Clarity | Slim and Sleek</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Warranty Information: 3 year warranty provided by the manufacturer from date of purchase</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Installation: For requesting installation/wall mounting/demo of this product once delivered, please directly call Haier support on 18002009999 and provide product\'s model name as well as seller\'s details mentioned on the invoice</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Easy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided</span></li></ul>', '119990$', '2020-05-31', 'Emirats Arabes Unis', '17-item.jpeg', '0', 0, 9, 1),
(18, 'Mi Super Bass Wireless Headphones with Super Powerful Bass, Up to 20 Hours Battery Life, Bluetooth 5.0 (Black an', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">BreakTheWire: Up to 20hrs of battery life I Super powerful bass I 40mm Dynamic driver I Pressure less ear muffs I Bluetooth 5.0 I Voice control</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Up to 20 hours epic battery life: Now listen up to 300 songs uninterrupted on a single charge</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">40mm dynamic driver: The in-built 40mm high performance large neodymium iron boron unit has a bass output that is deep and impactful. The large voice coils, and large diaphragms recreate the front row rock concert experience. These are designed for the bass head</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Pressure-less ear muffs: Crafted with soundproof PU material for those who want to listen to music on the go, the soft and cushiony ear muffs reduce strain on your ears. With an adjustable head beam and elastic shafts to rotate the ear muffs, you can customize the listening experience for yourself</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Connects with Bluetooth 5.0: The new and advanced Bluetooth 5.0 is faster, covers a wider distance and connects to two headphones to stream music from the same phone</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Voice control activated: Use the voice control function to pick your genre of music, know which song you’re listening to and even make or take important calls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Use wired or wireless: Versatile in its conception, the Mi Super Bass Wireless Headphones can be used wired or wirelessly as you find convenient</span></li></ul>', '1799$', '2020-05-31', 'États Unis', '18-item.jpeg', '0', 2, 10, 10),
(19, 'ASUS ZenBook 13 Ultra-Slim Laptop- 13.3” Full HD Wideview, 8th Gen Intel Core I5-8265U, 8GB LPDDR3, 512GB PCIe SSD, Backlit KB, Fingerprint, Windows 10- UX331FA-AS51 Slate Grey', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">13.3 inch wide-view full-HD NanoEdge bezel display</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Intel Core i5-8265u processor (6M Cache, upto 3.9 GHz)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Fast storage and memory featuring 512GB PCIe M.2 SSD and 8GB LPDDR3 RAM</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Extensive connectivity with HDMI, USB type C, Wi-Fi 5 (802.11AC) and Micro SD card reader (USB transfer speed may vary. Learn more at Asus website)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Sleek and lightweight 2.5 pounds aluminum body for comfortable portability</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Windows 10 home pre-installed</span></li></ul>', '699$', '2020-05-31', 'États Unis', '19-item.jpeg', '0', 4, 11, 13),
(20, 'Redmi Note 8 (Neptune Blue, 6GB RAM, 128GB Storage)', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">48MP AI Quad camera with portrait, ultra-wide lens, macro lens, LED flash, AI support, beautify support | 13MP front camera with AI portrait mode</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">16.002 centimeters (6.3-inch) IPS LCD multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution, 403 ppi pixel density and 19.5:9 aspect ratio | 2.5D curved glass</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Memory, Storage &amp; SIM: 6GB RAM | 128GB internal memory expandable up to 512GB | Dual SIM (nano+nano) dual-standby (4G+4G)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Android Pie v9 operating system with 2.0GHz Qualcomm Snapdragon 665 octa core processor</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">4000mAH lithium-polymer battery providing talk-time of 32 hours and standby time of 540 hours | 18W fast charger</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Box also includes: Power adapter, USB cable, SIM eject tool, warranty card, user guide and clear soft case</span></li></ul>', '14,499.00$', '2020-05-31', 'États Unis', '20-item.jpeg', '0', 5, 12, 14),
(22, 'Extreme 3D Pro Joystick for Windows', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">12 action buttons, an eight-way hat switch, and a rapid-fire trigger</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Button customization and multiple controller configurations</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Its USB driven</span></li></ul>', '55.99$', '2020-06-05', 'États Unis', '22-item.jpeg', '0', 0, 11, 16),
(23, 'EVGA GeForce GTX 1060 3GB SC GAMING, ACX 2.0 (Single Fan), 3GB GDDR5, DX12 OSD Support (PXOC), 03G-P4-6162-KR', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin: 0px 0px 0px 18px; color: rgb(17, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; text-align: start;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Real Base Clock: 1607 MHz / Real Boost Clock: 1835 MHz; Memory Detail: 3072MB 192 bit GDDR5</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">EVGA GeForce GTX 1060 - Small Size, Huge Performance</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">What you see is what you get! – No additional software required to achieve listed clock speeds</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">DX12 OSD Support with EVGA Precision XOC. DisplayPort 1.4 Ready supporting up to 7680x4320 resolution at 60Hz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">3 Year Warranty &amp; EVGA\'s 24/7 Technical Support</span></li></ul>', '159$', '2020-06-05', 'États Unis', '23-item.jpeg', '0', 0, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `ID` int(11) NOT NULL,
  `name_member` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username_member` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress_member` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip_membre` varchar(255) NOT NULL,
  `verif_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `verif_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `otp` varchar(255) NOT NULL,
  `langs` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`ID`, `name_member`, `username_member`, `email`, `adress_member`, `profile_picture`, `phone`, `password`, `ip_membre`, `verif_number`, `verif_email`, `otp`, `langs`) VALUES
(17, 'elhousseyn arab', 'hocine12', 'potency.football@gmail.com', 'log cem attba djilali z06 chorfa chlef', '17_profile.jpeg', '213782903695', '7c6f9bad5b4d59821750d1596f58c1a05cd6f484', '::1', '624496209', '0', '', 0),
(18, 'arab aziz', 'aziz12', 'hocine.arab1@hotmail.com', 'log cem attba djilali z06 chorfa chlef', '', '213799193017', '6e05865f8b7cda319ae87bfcd60606f30bafa96f', '::1', '1346593666', '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `clip` varchar(255) NOT NULL,
  `transaction_member` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `clip`, `transaction_member`) VALUES
(14, '393868766_invoice.jpeg', '393868766');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ID` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `name_buyer` varchar(255) NOT NULL,
  `mobile_buyer` varchar(255) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `statu` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ID`, `id_member`, `id_product`, `qnt`, `name_buyer`, `mobile_buyer`, `payment`, `transaction`, `statu`) VALUES
(31, 18, 19, 3, 'aziz arab', '21378293695', 1, '393868766', 0),
(33, 17, 22, 1, 'elhousseyn arab', '21378293695', 0, '82387373', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL COMMENT 'id of the user',
  `username` varchar(255) NOT NULL COMMENT 'username of the user',
  `password` varchar(255) NOT NULL COMMENT 'password of the user',
  `email` varchar(255) NOT NULL COMMENT 'email of the user',
  `fullName` varchar(255) NOT NULL COMMENT 'full name of the user',
  `groupID` int(10) NOT NULL DEFAULT 0 COMMENT 'groupd id enrolled',
  `status` int(10) NOT NULL DEFAULT 0 COMMENT 'rank of the user',
  `regStatus` int(10) NOT NULL DEFAULT 0 COMMENT 'user approved',
  `date` date NOT NULL,
  `language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `fullName`, `groupID`, `status`, `regStatus`, `date`, `language`) VALUES
(1, 'admin', '7c6f9bad5b4d59821750d1596f58c1a05cd6f484', 'potency.football@gmail.com', 'Elhousseyn arab', 1, 0, 1, '0000-00-00', 0),
(10, 'hocine12', '7c6f9bad5b4d59821750d1596f58c1a05cd6f484', 'potency.football@gmail.com', 'Arab Hocine', 0, 0, 1, '2020-05-13', 0),
(11, 'aziz1547', '7c6f9bad5b4d59821750d1596f58c1a05cd6f484', 'done@done.com', 'fddgdgdfgdf', 0, 0, 1, '2020-05-14', 0),
(13, 'ibrahim', '7c6f9bad5b4d59821750d1596f58c1a05cd6f484', 'ibrahim@yahoo.com', 'ibrahim aziz', 0, 0, 1, '2020-05-15', 0),
(14, 'john', '61396db7e576d401e3ed18290a782f4404cc88ff', 'john@john.com', 'john147', 0, 0, 1, '2020-05-15', 0),
(16, 'karim', 'fb33322c71efd130c45daddad22cbff9a152948e', 'karim@karim.com', 'karim123', 0, 0, 1, '2020-05-15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `usr_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cat1` (`cat_id`),
  ADD KEY `member1` (`member_id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username_member` (`username_member`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `transaction_member` (`transaction_member`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `transaction` (`transaction`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the categorie', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id of the user', AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member1` FOREIGN KEY (`member_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `transaction_member` FOREIGN KEY (`transaction_member`) REFERENCES `requests` (`transaction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `id_member` FOREIGN KEY (`id_member`) REFERENCES `membres` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
