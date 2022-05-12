-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 09:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_announcement`
--

CREATE TABLE `admin_announcement` (
  `id` int(255) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `audience` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(30) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `audience` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_title`, `audience`, `announcement`, `date_created`) VALUES
(6, 'Lorem Ipsum', 'joiners', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', '2021-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `joiners`
--

CREATE TABLE `joiners` (
  `id` int(30) NOT NULL,
  `joiner_id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bmi` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `mass` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joiners`
--

INSERT INTO `joiners` (`id`, `joiner_id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `bmi`, `height`, `mass`, `age`, `date_created`) VALUES
(5, 58487246, 'Mike', 'D', 'Williams', 'Male', '+14526-5455-44', 'Sample Address', 'mwilliams@sample.com', '', '12', '32', '43', '54', '2020-10-21 13:18:19'),
(6, 59430244, 'Claire', 'D', 'Blake', 'Female', '+18456-5455-55', 'Sample', 'cblake@sample.com', '', '23', '43', '54', '65', '2020-10-21 14:57:54'),
(38, 31984746, 'zeeshan', 'faisal', 'chaudhary', 'Male', '03046888676', 'sdfs', 'zeeshanfaisal69@gmail.com', '6850', '12', '12', '12', '32', '2021-01-07 23:45:32'),
(39, 77105126, 'Uzair Khan KAHANY', 'Baloch', 'Shaw', 'Male', '03046888676', 'asda', 'zeeshanfaisal69@gmail.com', '8120', '12', '15', '12', '12', '2021-01-08 00:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `package` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_id`, `plan`, `package`, `description`, `amount`) VALUES
(6, '6293', '1', 'Sample Package', 'asdasdasdas', 12331);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `registration_id` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=registration, 2= monthly payment',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `registration_id`, `amount`, `remarks`, `type`, `date_created`) VALUES
(1, 2, 4500, 'First payment', 2, '2020-10-21 14:39:26'),
(2, 2, 3500, 'payment for november', 2, '2020-10-21 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `id` int(30) NOT NULL,
  `joiner_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`id`, `joiner_id`, `start_date`, `end_date`, `status`, `date_created`) VALUES
(25, 37, '2021-01-07', '2021-01-07', 1, '2021-01-07'),
(26, 38, '2021-01-07', '2021-01-07', 1, '2021-01-07'),
(27, 39, '2021-01-07', '2021-01-07', 1, '2021-01-08'),
(28, 40, '2021-01-08', '2021-01-08', 1, '2021-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `dow` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(30) NOT NULL,
  `trainer_id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `experience_years` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `starting_time` varchar(255) NOT NULL,
  `ending_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainer_id`, `password`, `name`, `email`, `contact`, `experience_years`, `area`, `starting_time`, `ending_time`) VALUES
(5, 6157, '', 'Uzair Khan Baloch ', 'uzairkhan20@gmail.com', '03046888676', '12', 'Push Up Training', '14:00  ', '20:00'),
(6, 1020, 'salmonpuff123', 'Muhammad Zeeshan Faisal', 'zeeshanfaisal69@gmail.com', '03046888676', '12', 'Push Up Training', '14:00    ', '20:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'Zeeshan Faisal', 'xeshan_faisal7', '0192023a7bbd73250516f069df18b500', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_announcement`
--
ALTER TABLE `admin_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joiners`
--
ALTER TABLE `joiners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_announcement`
--
ALTER TABLE `admin_announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `joiners`
--
ALTER TABLE `joiners`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_info`
--
ALTER TABLE `registration_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
