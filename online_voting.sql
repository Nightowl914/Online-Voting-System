-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 10:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `votes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `photo`, `role`, `status`, `votes`) VALUES
(27, 'Cathrine', 'cathrine@gmail.com', '$2y$10$MEceGIo7.got.aTjsjfL.Oo1GjNZys0xhVLqy5nobZJfp15A7l4li', '1681673311_8980150.png', 'Candidate', 0, 0),
(30, 'Mars', 'mars@gmail.com', '$2y$10$EeSKDkgX43unP9ogTJI8H.zuXnzVmg7neR2NjJKtH5Lg6GklQ4cp2', '1681675974_183760.png', 'Candidate', 0, 1),
(31, 'John', 'john@gmail.com', '$2y$10$IvG0rNK7WlbCLqgh/OxSS.zYOyN4KqEVT1KZdbY2zILyWwjNQPWv.', '1681675995_183760.png', 'Candidate', 0, 0),
(35, 'Admin', 'admin@gmail.com', '$2y$10$0gUTRoDZMZdHGAaSa4LOaeZlhez77hyGWHABJeWiojoTGXDjMofNG', '', 'Admin', 0, 0),
(51, 'cecilia', 'cecilia@gmail.com', '$2y$10$dl/lZmFXRI0ZosX2c6Md7uw3zL/yyELAWEyOyZH4wD9oe2mYhUnrC', '1681883764_png-transparent-avatar-boy-male-man-people-profile-simple-avatar-set-icon.png', 'Voter', 0, 0),
(52, 'yungxin', 'Syungxin21@gmail.com', '$2y$10$SZPLthTV7kkz9Z4Adp41NONcqek3WEnHHsPIrG7Ty/Zh8feyDgZpK', '1681889615_183760.png', 'Voter', 0, 0),
(53, 'Owen', 'owen@gmail.com', '$2y$10$5MbrF2mRQMp2b2f.s9yAj.dQDvV2FrDE7Aa3IdMcfWpJQcXf8Iy1O', '1681893178_183760.png', 'Voter', 0, 0),
(54, 'Johan', 'johan@gmail.com', '$2y$10$UF.8C/mZxWGUi.aGQT8dR.SuliyARdJw5asyHJZOAPF0XzwzXWore', '1681893608_png-transparent-avatar-boy-male-man-people-profile-simple-avatar-set-icon.png', 'Voter', 0, 0),
(55, 'Nelson', 'nelson@gmail.com', '$2y$10$xe91f1GZkkT/WchHrUD6OOeWkbER1BYXwf46zSdttZSadvaAxzgfS', '1681972712_User Profile.png', 'Voter', 0, 0),
(56, 'Dorcas', 'dorcas123@gmail.com', '$2y$10$JumvaZOdj3tY6ln8ZfEd3.2TBsNK/wMUMTyWJ1IlIy1NobC5jQfLC', '1681973174_User Profile.png', 'Voter', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
