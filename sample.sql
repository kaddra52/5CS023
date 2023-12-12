-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 11:15 PM
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
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_property`
--

CREATE TABLE `tb_property` (
  `property_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `property_type` varchar(20) NOT NULL,
  `bedrooms` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` int(75) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `insert_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_property`
--

INSERT INTO `tb_property` (`property_id`, `title`, `property_type`, `bedrooms`, `address`, `price`, `details`, `image`, `insert_date`) VALUES
(1, '12, Sandown Gate, Esher', 'Sale', '3', '12, Sandown Gate, Esher, Surrey KT95 LL8', 950000, 'Set within a secure modern development with concierge and communal gym, this modern 1 bedroom apartment features contemporary open-plan interiors throughout with a private balcony.', '45654.jpeg', '12/7/2023'),
(2, 'Marsh Wall, London', 'For Rent', '6', 'Marsh Wall, London, 85YT7', 2500, 'This distinctive addition to the London skyline makes not only a stunning architectural statement but also brings a new community to the area. Aspen is the jewel in the crown of Consort Place, a fresh destination with cafés, bars, activity spaces, education, health centre, restaurant and the international Dorsett hotel. The residences are the cornerstone of a vibrant pocket neighbourhood, that will be somewhere to meet, relax, work, study or just enjoy throughout the year and at any time of day.', '543544.jpg', '12/7/2023'),
(3, '15 Holly House', 'Sale', '5', '15 Holly House, 185 Earlham Grove, Forest Gate Q7', 952810, 'Set in the thriving London Borough of Newham, Warden?s Reach offers a beautiful collection of brand new one, two and three-bedroom apartments available for shared ownership. The price advertised represents purchasing a 25% share of the home. These brand new homes offer a high specification as standard, including many with balconies or winter gardens, easy access to central London via the Elizabeth Line and are surrounded by a wide variety of parks and open spaces.', '874584.jpg', '12/7/2023'),
(4, 'Downlands Road', 'Sale', '8', 'Downlands Road, Purley TRX', 650000, 'Presenting a unique opportunity, we are pleased to introduce this spacious five/six bedroom detached house, situated in a sought-after residential location. Boasting off-street parking and a garage, this property is ideal for those seeking a substantial home with potential for further development.\r\n', '332343.jpg', '12/7/2023'),
(5, 'Station Road', 'Rent', '1', 'Station Road, Barnet PO5', 34000, 'A stunning one-bedroom ground floor flat set in this modern building situated close to New Barnet Mainline Station and local shops. The property is offered for sale in excellent condition and the accommodation comprises an open-plan living/kitchen area, one double bedroom, family bathroom/WC. The property benefits from having a long lease. Great first-time buy. Chain free.', '534233.jpg', '12/7/2023'),
(6, 'Biscayne Avenue', 'Sale', '2', 'Biscayne Avenue, London R85', 478500, 'Not To Be Missed! Gorgeous, modern one bedroom, boasting a spacious private balcony, with amazing views of Canary Wharf, the docks and the Thames! Set just moments from Blackwall DLR Station and within walking distance of Canary Wharf Station (Jubilee / Elizabeth line). No Chain!', '434545.jpg', '12/7/2023'),
(7, 'Pellatt Road', 'Sale', '4', 'Pellatt Road, London PO564', 850000, 'Extremely Spacious Period House Boasting Four Genuine Double Bedrooms & A Large Private Garden, Set Back From The Bustling Lordship Lane; Offered Chain Free.', '243433.jpg', '12/7/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `username`, `password`, `name`, `user_type`, `phone`) VALUES
(19, 'Kim', 'd93a5def7511da3d0f2d171d9c344e91', 'Kim', 'Buyer', '2343453453'),
(20, 'Kaddra', 'd93a5def7511da3d0f2d171d9c344e91', 'Kaddra', 'Buyer', '1234566565'),
(21, 'samantha', '524d436bf60d6f293ae3b847177c2328', 'Samantha', 'Seller', '9857502374'),
(22, 'ted087', '05fa40de6152d8198afdede7641b733f', 'Tedd Fealth', 'Seller', '5157542372'),
(23, 'user4533', '9d4f2eb58addfe777de83e3693e849e4', 'Micheal', 'Agent', '8450142385'),
(24, 'user971', 'db6c0a831c6366c724974bd6269c932c', 'Jacob Heart', 'Buyer', '9884502341'),
(25, 'david', '8a9c2df7436d4bda2ce3e3575381ae59', 'David Sendler', 'Seller', '8584102310'),
(26, 'tony', 'fb0c554d1e03a9d43262c6b4d8a82c80', 'Tom Anthony', 'Seller', '4157102384'),
(27, 'jack', '5a0ceba1633e787bca88a18ff280f42b', 'Tom Jack', 'Agent', '6057108300'),
(28, 'user981', '627cf9d63eb105a10d6777d0d9296679', 'Monti', 'Buyer', '5127412384'),
(29, 'liza', '3ac19789f42453ba448218457bfdac6b', 'Liza Ray', 'Seller', '7817502087'),
(30, 'user975', '176631fbdfcda87b65cb07b06620257f', 'Micheal Shawn', 'Buyer', '1257772341');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_property`
--
ALTER TABLE `tb_property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_property`
--
ALTER TABLE `tb_property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
