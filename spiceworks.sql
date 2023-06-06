-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 01:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spiceworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `nip` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`nip`, `fullname`, `photo`, `phone_number`, `address`, `email`, `username`, `password`, `birth_date`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES
('199808232301', 'Dhimas Walidhia Tirta', '1685992039_91dcffca54764bf35466.jpg', '08123123', 'ddddddd', 'aa@gmail.com', 'admin', 'admin', '1998-08-23', 'Male', '2023-06-05 19:07:19', '2023-06-05 19:07:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(31, '2023-06-04-115955', 'App\\Database\\Migrations\\Tickets', 'default', 'App', 1685991969, 1),
(32, '2023-06-04-121839', 'App\\Database\\Migrations\\Employees', 'default', 'App', 1685991969, 1),
(33, '2023-06-05-025321', 'App\\Database\\Migrations\\Organization', 'default', 'App', 1685991970, 1),
(34, '2023-06-05-151218', 'App\\Database\\Migrations\\TicketChats', 'default', 'App', 1685991970, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SECOM', '2023-06-05 19:07:35', '2023-06-05 19:07:35'),
(2, 'Kosova', '2023-06-05 19:07:46', '2023-06-05 19:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(9) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `assignee` varchar(20) DEFAULT NULL,
  `creator` varchar(20) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `priority` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `due_date` date NOT NULL,
  `response_time` varchar(50) NOT NULL,
  `close_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `summary`, `assignee`, `creator`, `organization`, `description`, `priority`, `category`, `status`, `created_at`, `updated_at`, `due_date`, `response_time`, `close_time`) VALUES
(1, 'aaaaaa', '199808232301', '199808232301', '1', NULL, 'high', 'Email', 'open', '2023-06-05 19:08:16', '2023-06-05 19:08:16', '0000-00-00', '', NULL),
(2, 'Test', '199808232301', '199808232301', '1', NULL, 'high', 'Email', 'open', '2023-06-05 19:12:45', '2023-06-05 19:12:45', '0000-00-00', '', NULL),
(3, 'aaaaaaaaaaaaaaaaa', '199808232301', '199808232301', '1', 'aaaaaaaaaaaaaaaaaaa', 'high', 'Email', 'open', '2023-06-05 19:16:00', '2023-06-05 19:16:00', '0000-00-00', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_chats`
--

CREATE TABLE `ticket_chats` (
  `id` int(11) UNSIGNED NOT NULL,
  `ticket_id` int(9) NOT NULL,
  `sender_id` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_assignee_foreign` (`assignee`),
  ADD KEY `tickets_creator_foreign` (`creator`);

--
-- Indexes for table `ticket_chats`
--
ALTER TABLE `ticket_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_chats_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_chats_sender_id_foreign` (`sender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_chats`
--
ALTER TABLE `ticket_chats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assignee_foreign` FOREIGN KEY (`assignee`) REFERENCES `employees` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `employees` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_chats`
--
ALTER TABLE `ticket_chats`
  ADD CONSTRAINT `ticket_chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `employees` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_chats_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
