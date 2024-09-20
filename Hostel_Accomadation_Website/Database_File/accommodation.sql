-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 07:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accommodation`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `msg` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `uname`, `email`, `phone`, `msg`) VALUES
(1, 'Nadun Idush', 'nadun8@gmail.com', '0778746635', ' \r\n	It Is more beautiful place. I need it 		'),
(2, 'Nadun Idush', 'nadunidushera8@gmail.com', '0778827372', ' \r\n		habdkavdkvdvdavhadkvadv	');

-- --------------------------------------------------------

--
-- Table structure for table `landlord_signup`
--

CREATE TABLE `landlord_signup` (
  `landlordId` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlord_signup`
--

INSERT INTO `landlord_signup` (`landlordId`, `fullname`, `email`, `password`, `confirm_password`, `phone`, `address`, `company`) VALUES
(1, 'Nadun Idushera', 'hello@gmail.com', '', 'hello', 765345245, '240/l/Colombo, Negombo', 'hello'),
(3, 'lakshan fernando', 'lakshan@gmail.com', '1234', '1234', 89754637, '12/A/Colombo, Negombo', 'hello'),
(4, 'pahasara perera', 'perera@gmail.com', 'hello', 'hello', 765674893, '21/L/Mathara, Ja Ala', 'Perera');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `propertyId` int(11) NOT NULL,
  `landlordId` int(11) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `num_students` int(100) NOT NULL,
  `num_beds` int(100) NOT NULL,
  `num_bathrooms` int(100) NOT NULL,
  `num_rooms` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location_url` varchar(800) NOT NULL,
  `price_per_month` int(100) NOT NULL,
  `property_photo_filename` varchar(255) NOT NULL,
  `property_photo` longblob NOT NULL,
  `property_description` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `approved` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`propertyId`, `landlordId`, `property_name`, `property_type`, `num_students`, `num_beds`, `num_bathrooms`, `num_rooms`, `address`, `location_url`, `price_per_month`, `property_photo_filename`, `property_photo`, `property_description`, `status`, `approved`) VALUES
(14, 3, 'The New like', '', 4, 4, 1, 2, '240/l/Colombo, Negombo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.41806359743!2d80.58458122244774!3d7.294628573489399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1711449104045!5m2!1sen!2slk', 7000, 'Screenshot 2024-02-19 112324.png', '', 'hello word', 'Cancelled', ''),
(18, 4, 'the Hotel', '', 2, 2, 1, 1, '240/l/Colombo, Negombo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63492.94597092522!2d80.50954776977835!3d5.952076043305891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae138d151937cd9%3A0x1d711f45897009a3!2sMatara!5e0!3m2!1sen!2slk!4v1712468598280!5m2!1sen!2slk', 130000, 'property_photo_65edcc5b0a85e.jpg', '', 'New Room ', 'Approved', ''),
(21, 4, 'Hotel2', 'Apartment', 3, 2, 1, 1, '240/l/Colombo, Negombo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63398.577166643874!2d80.02368607120252!3d6.719588872824802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b475a084f91%3A0xf0beeaf3b66bd8be!2sHorana!5e0!3m2!1sen!2slk!4v1712500204038!5m2!1sen!2slk', 6000, 'home1.jpg', '', 'Hostel1', 'Approved', ''),
(22, 4, 'Hostel3', 'Condo', 4, 2, 3, 1, '12/A/Colombo, Negombo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63398.577166643874!2d80.02368607120252!3d6.719588872824802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b475a084f91%3A0xf0beeaf3b66bd8be!2sHorana!5e0!3m2!1sen!2slk!4v1712500204038!5m2!1sen!2slk', 9000, 'home2.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Approved', ''),
(23, 4, 'Hostel4', 'Apartment', 3, 1, 2, 1, '21/L/Mathara, Ja Ala', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63398.577166643874!2d80.02368607120252!3d6.719588872824802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b475a084f91%3A0xf0beeaf3b66bd8be!2sHorana!5e0!3m2!1sen!2slk!4v1712500204038!5m2!1sen!2slk', 7500, 'home2.webp', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets contain ', 'Cancelled', ''),
(24, 4, 'Hostel 4', 'House', 2, 2, 1, 1, '12/A/Colombo, Negombo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63398.577166643874!2d80.02368607120252!3d6.719588872824802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b475a084f91%3A0xf0beeaf3b66bd8be!2sHorana!5e0!3m2!1sen!2slk!4v1712500204038!5m2!1sen!2slk', 5500, 'home4.jpeg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing .', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL,
  `move_in_date` date NOT NULL,
  `reservation_time` time(6) NOT NULL,
  `reservation_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationId`, `studentId`, `propertyId`, `move_in_date`, `reservation_time`, `reservation_status`) VALUES
(1, 1, 18, '2024-03-12', '10:40:49.000000', 'Approved'),
(2, 2, 18, '2024-03-12', '15:13:03.000000', 'due'),
(3, 1, 18, '2024-03-26', '11:53:06.000000', 'Cancelled'),
(4, 1, 22, '2024-04-07', '20:15:11.000000', 'Approved'),
(5, 1, 24, '2024-04-07', '20:16:40.000000', 'due');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `student_name`, `student_password`, `contact_number`) VALUES
(1, 'nnilfernando', '1234', '07856473673'),
(2, 'dasunfernando', 'dasun', '07865467');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `wardenId` int(11) NOT NULL,
  `warden_name` varchar(255) NOT NULL,
  `warden_password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`wardenId`, `warden_name`, `warden_password`, `contact_number`) VALUES
(1, 'nisalfdo', '1234', '0765746763');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `landlord_signup`
--
ALTER TABLE `landlord_signup`
  ADD PRIMARY KEY (`landlordId`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`propertyId`),
  ADD KEY `landlord_Id` (`landlordId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `propertyId` (`propertyId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`wardenId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landlord_signup`
--
ALTER TABLE `landlord_signup`
  MODIFY `landlordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `wardenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `landlord_Id` FOREIGN KEY (`landlordId`) REFERENCES `landlord_signup` (`landlordId`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `propertyId` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`propertyId`),
  ADD CONSTRAINT `studentId` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
