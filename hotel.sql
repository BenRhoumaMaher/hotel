-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 01:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$j92lzjf6pM2qnK/mvtze7.rFpXuiWfh6OjsJEhbSjPKJTuLwEqhke', '2023-06-10 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `check_in` varchar(200) NOT NULL,
  `check_out` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(40) NOT NULL,
  `name` varchar(200) NOT NULL,
  `hotel` varchar(200) NOT NULL,
  `room` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `payment` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in`, `check_out`, `email`, `phone`, `name`, `hotel`, `room`, `status`, `payment`, `user_id`, `created_at`) VALUES
(1, '6/10/2023', '6/26/2023', 'maherbenrhoumaa@gmail.com', 26652736, 'Maher Ben Rhouma', 'The Plaza Hote', 'Standard Room', 'Pending', 0, 7, '2023-06-09 18:41:29'),
(2, '6/10/2023', '6/26/2023', 'maherbenrhoumaa@gmail.com', 26652736, 'Maher Ben Rhouma', 'The Plaza Hote', 'Standard Room', 'Confirmed', 0, 7, '2023-06-09 18:42:59'),
(3, '6/10/2023', '6/18/2023', 'devtokshort@gmail.com', 26652736, 'mohamed Rhouma', 'The Plaza Hote', 'Standard Room', 'Done', 100, 7, '2023-06-09 23:17:45'),
(4, '6/10/2023', '6/18/2023', 'devtokshort@gmail.com', 26652736, 'Maher Rhouma', 'Sheraton', 'Deluxe Room', 'Pending', 720, 7, '2023-06-09 23:43:10'),
(5, '6/17/2023', '6/25/2023', 'maherbenrhoumaa@gmail.com', 2147483647, 'Maher Ben Rhouma', 'Sheraton', 'Suite Room', 'Pending', 800, 7, '2023-06-10 11:33:27'),
(6, '6/3/2023', '6/18/2023', 'maherbenrhoumaa@gmail.com', 26652736, 'Maher Ben Rhouma', 'Sheraton', 'Suite Room', 'Pending', 1500, 7, '2023-06-10 21:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'maher', 'devtokshort@gmail.com', 'Test', 'Testing', '2023-06-10 22:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `status`, `created_at`) VALUES
(1, 'Sheraton', 'services-1.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Cairo', 1, '2023-06-07 07:53:41'),
(2, 'The Plaza Hote', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.&quot;&quot;', 'New York', 1, '2023-06-07 07:53:41'),
(6, 'Ritz-Carlton Hotel', 'image_5.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Cairo', 1, '2023-06-11 11:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `token`, `status`, `date`) VALUES
(1, '', '', '$2y$10$H3padEsfl148SD7gvX6n3e1FG0bPqG7t/BAspuibnEf2O/G03QAyy', '', '', '2023-06-06 11:49:56'),
(2, '', '', '$2y$10$Kg9gOwIKbx0rUZXHAKl.TulUrkWywW9ShzqcOzBozDJz1I2FHNY..', '', '', '2023-06-06 11:50:29'),
(3, '', '', '$2y$10$kMn.LEYcHjXB6KpVh/YbiO3AcZGTx7CZTYLSv5Lo.r74i5b.fato.', 'e87fdb6083b15e56fd3c7fa5dc413b2268ae40e413d2545fe69aff0afa34', 'OFF', '2023-06-06 12:06:59'),
(4, '', '', '$2y$10$ZqeY5GP9jW3lLC/8YMSs1OQm6PBYAzJRHEQhsX5oifyCwE5kYHgki', '54078af480fc75a31036053a01fbe0af3f238577331dd3512b8cf66fb0e1', 'OFF', '2023-06-06 12:07:35'),
(6, 'maher', 'devtokshort@gmail.com', '$2y$10$ITDCY6FX7SeexTw8gKUbLOLLZHQhZ12f46KfETA7KcMT9j57ihvwu', '993e780585f7098d8b92a301ca41d1e141dda19b8ac9160a89105dd4d2e1', 'OFF', '2023-06-06 12:42:32'),
(7, 'maher ben rhouma', 'maherbenrhoumaaa@gmail.com', '$2y$10$j92lzjf6pM2qnK/mvtze7.rFpXuiWfh6OjsJEhbSjPKJTuLwEqhke', '6e2dfd4657ad83e0d65dcad759eb680e7934d23dc5aab12ae54fdb8a385f', 'ON', '2023-06-06 13:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `num_persons` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `price`, `num_persons`, `size`, `view`, `num_beds`, `hotel_id`, `hotel_name`, `status`, `created_at`) VALUES
(1, 'Suite Room', 'room-1.jpg', 100, 3, 45, 'Sea View', 2, 1, 'Sheraton', 1, '2023-06-07 08:23:04'),
(2, 'Standard Room', 'room-2.jpg', 100, 5, 45, 'Sea View', 4, 2, 'The Plaza Hote', 1, '2023-06-07 08:23:04'),
(3, 'Family Room', 'room-3.jpg', 70, 6, 75, 'Sea View', 6, 3, 'The Ritz', 1, '2023-06-07 08:23:04'),
(8, 'Suite Room', 'room-7.jpg', 150, 3, 55, 'Sea View', 3, 6, 'Ritz-Carlton Hotel', 1, '2023-06-11 11:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `room_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `description`, `room_id`, `created_at`) VALUES
(1, 'Tea Coffee', 'flaticon-diet', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-06-07 08:43:19'),
(2, 'Hot Showers', 'flaticon-workout', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2023-06-07 08:43:19'),
(3, 'Laundry', 'flaticon-diet-1', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2023-06-07 08:43:19'),
(4, 'Air Conditioning', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-06-07 08:43:19'),
(5, 'Free Wifi', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 8, '2023-06-07 08:43:19'),
(6, 'Kitchen', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2023-06-07 08:43:19'),
(7, 'Ironing', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-06-07 08:43:19'),
(8, 'Lovkers', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2023-06-07 08:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
