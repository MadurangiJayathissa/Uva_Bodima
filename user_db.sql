-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 07:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `boarding_details`
--

CREATE TABLE `boarding_details` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `boarding_address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `home_types` varchar(10) NOT NULL,
  `bathroom_types` varchar(10) NOT NULL,
  `students_count` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `k_price` decimal(10,2) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `boardingPictures` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boarding_details`
--

INSERT INTO `boarding_details` (`id`, `owner_name`, `boarding_address`, `gender`, `home_types`, `bathroom_types`, `students_count`, `price`, `k_price`, `contact_number`, `boardingPictures`, `payment`) VALUES
(90, 'Gayan', 'Hidagoda', 'girls', 'Anex', 'Attached', 8, '40000.00', '5000.00', '+945678923', '2.jpg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(92, 'Asalya', 'Malangamuwa', 'girls', 'Anex', 'Non-attach', 11, '50000.00', '5000.00', '123456789', '3.jpg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(93, 'Mahela', 'Jayagama', 'boys', 'Lease', 'Non-attach', 24, '70000.00', '5000.00', '987654432', '4.jpg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(96, 'kasun', 'c,50 badulusirigama, hindagoda', 'boys', 'Home', 'Attached', 14, '33000.00', '66000.00', '0758877654', 'image123.jpeg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(97, 'Kumudinie', '292,jayagama,badulla.', 'girls', 'Home', 'Non-attach', 12, '42000.00', '4000.00', '0766975487', 'R.jpeg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(98, 'Novenya', '34, A Jayagama', 'girls', 'Home', 'Attached', 10, '30000.00', '3000.00', '0782345678', 'download (1).jpeg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(99, 'Sathishka', 'jayagama,badulla', 'boys', 'Home', 'Attached', 12, '12300.00', '1233.00', '+94702891587', 'new.jpg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg'),
(100, 'Nadun', 'Sprinwali', 'girls', 'Anex', 'Attached', 15, '34000.00', '3000.00', '1234567890', '1-2-3-600x350.jpg', 'WhatsApp Image 2023-11-12 at 19.52.27_60433065.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Madurangi Jayathissa', 'madurangijayathissa988@gmail.com', 'hy', '2023-11-13 17:15:18'),
(2, 'Nethmi', 'member1@demo.com', 'This conntact number is not work', '2023-11-13 18:01:27'),
(3, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:48:02'),
(4, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:50:17'),
(5, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:50:21'),
(6, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:51:09'),
(7, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:51:33'),
(8, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:52:02'),
(9, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:52:08'),
(10, 'novenya', 'nove@gmail.com', 'hello i need a bodim detail', '2023-11-16 16:52:58'),
(11, 'Gayani', 'member1@demo.com', 'hy', '2023-11-17 03:14:34'),
(12, 'sashini', 'member1@demo.com', 'gr', '2023-11-17 04:04:24'),
(13, 'Nadun', 'nadu6@gmail.com', 'I want contact', '2023-11-19 11:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `save_table`
--

CREATE TABLE `save_table` (
  `id` int(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `boarding_address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `home_types` varchar(255) NOT NULL,
  `bathroom_types` varchar(255) NOT NULL,
  `students_count` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `k_price` decimal(10,2) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `boardingPictures` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `save_table`
--

INSERT INTO `save_table` (`id`, `owner_name`, `boarding_address`, `gender`, `home_types`, `bathroom_types`, `students_count`, `price`, `k_price`, `contact_number`, `boardingPictures`) VALUES
(9, 'Gayan', 'Hidagoda', 'girls', 'Anex', 'Attached', 8, '40000.00', '5000.00', '+945678923', '2.jpg'),
(10, 'Asalya', 'Malangamuwa', 'girls', 'Anex', 'Non-attach', 10, '50000.00', '5000.00', '123456789', '3.jpg'),
(11, 'Mahela', 'Jayagama', 'boys', 'Lease', 'Non-attach', 24, '70000.00', '5000.00', '987654432', '4.jpg'),
(14, 'kasun', 'c,50 badulusirigama, hindagoda', 'boys', 'Home', 'Attached', 14, '33000.00', '66000.00', '0758877654', 'image123.jpeg'),
(15, 'Kumudinie', '292,jayagama,badulla.', 'girls', 'Home', 'Non-attach', 12, '42000.00', '4000.00', '0766975487', 'R.jpeg'),
(16, 'Novenya', '34, A Jayagama', 'girls', 'Home', 'Attached', 10, '30000.00', '3000.00', '0782345678', 'download (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `cpassword`) VALUES
(1, 'Madurangi', 'member1@demo.com', '$2y$10$ixjQnZ6M3HhH906x47nEQu0YDL3tn58SjJtMDj.LpnTjlJnhxKxWy', ''),
(3, 'Sashini', 'member2@demo.com', '$2y$10$LlxMxd2TASGpLwoS.G7fu.8kWzVjmjX6X.pMU8yYQUnztNGkG5Q2C', ''),
(4, 'Nethmi', 'member3@demo.com', '$2y$10$fOmvsDJYjynnSp.80eP3ierRaWd/O.fvAglHAHl4bZpM0dXAAJfka', ''),
(5, 'Sanka', 'member4@demo.com', '$2y$10$FOYCK8UV9tyQBgO4LhYmouKlOoNDWg5jydna3OUz67BX/Ft84DhjK', ''),
(6, 'Shehani', 'member6@demo.com', '$2y$10$vYRmhNJnA6ptgg.NAetod.yD3xTg6r3qOpegbyHVv97Vo904fTE92', ''),
(7, 'Saduni', 'saduni@gmail.com', '$2y$10$M/BobhD62ddfAc.HQfozXuEAQe53UMNgEaa6mG1T/hgvS4MYOLbLW', ''),
(8, 'Sanaka', 'member8@gmail.com', '$2y$10$RspZ9oOlR9lKO2sfh5.l/e/3V2DRWQKCDDch1qYrd8WmV4t7BmQ2a', ''),
(9, 'Saduni', 'member9@gmail.com', '$2y$10$6VQblGeCjRs4sFWEqCneaevAoQTfUcaMRupfCCuKKn7eBYTw.iLzy', ''),
(10, 'kasun', 'kasunbb@gmail.com', '$2y$10$EpnWb9T60tWZrYyy7LBQ1ukfYrZi1/CWWD63TBYbKBGn.W2b5/qx2', ''),
(11, 'ruwan', 'ruwan45@gmail.com', '$2y$10$WsXQ1sYm9VQf5HvDlR7l/OeqvKopAKRz9U8OWM9vivb5dIgJudCm2', ''),
(12, 'Kumudinie', 'shashini07pra@gmail.com', '$2y$10$WN97QVVyW0rMRfEVqPRhH.XSauMk4gl/fZa.Us.eY0tEKTcqokK5.', ''),
(13, 'novenya', 'nove@gmail.com', '$2y$10$lhM/IYgeKbBXpbVqeHQhO.ZfJ0G4uL13.kYKdP.OG6z.xcMXSSpuS', ''),
(14, 'Gayani', 'gay6@gmail.com', '$2y$10$YBBFvq.fhbVIkyv6SJ8Khun/UdHycWmruheRplKOdzpc2VXDVvIYC', ''),
(15, 'sadun', 'sa1@gmail.com', '$2y$10$gneRAyf3sFbD/dvx9Hw8XeXv7d1IHHG6FNZ0wzVtfbaMlNpnD8Pge', ''),
(16, 'Nadun', 'nad6@gmail.com', '$2y$10$sK4aX/EXeBkh7WWcqZEKDuXDuvy3LnZBix0zaeZmhD.Tw7OAmjicO', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(0, 'Madurangi ', 'member@demo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(0, 'Ferin', 'member1@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(0, 'Sashini', 'member3@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(0, 'Matilda', 'member6@demo.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(0, 'Nethmi', 'member7@demo.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(0, 'Madurangi ', 'member@demo.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(0, 'admin', 'admin@gmail.com', '1234456789', 'admin'),
(0, 'Madara', 'member10@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boarding_details`
--
ALTER TABLE `boarding_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_table`
--
ALTER TABLE `save_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boarding_details`
--
ALTER TABLE `boarding_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `save_table`
--
ALTER TABLE `save_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
