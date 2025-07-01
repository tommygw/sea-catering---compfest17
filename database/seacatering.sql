-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 12:24 PM
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
-- Database: `seacatering`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`) VALUES
(1, 'Alice', 'Johnson', 'alice@mail.com', 'I love your service! Can I customize meals?', '2025-07-01 08:22:34'),
(2, 'Bob', 'Smith', 'bob@mail.com', 'Do you deliver to Bali?', '2025-07-01 08:22:34'),
(3, 'Charlie', 'Brown', 'charlie@mail.com', 'How can I pause my subscription?', '2025-07-01 08:22:34'),
(4, 'Diana', 'White', 'diana@mail.com', 'Is there a vegetarian option?', '2025-07-01 08:22:34'),
(5, 'Ethan', 'Clark', 'ethan@mail.com', 'Can I refer a friend?', '2025-07-01 08:22:34'),
(6, 'Fiona', 'Lewis', 'fiona@mail.com', 'I want to upgrade my plan.', '2025-07-01 08:22:34'),
(7, 'George', 'Hall', 'george@mail.com', 'Excellent service, thank you!', '2025-07-01 08:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `mealplans`
--

CREATE TABLE `mealplans` (
  `plan_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per_meal` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mealplans`
--

INSERT INTO `mealplans` (`plan_id`, `name`, `price_per_meal`, `description`, `image_url`) VALUES
(1, 'Diet Plan', '30000.00', 'Low Calorie, High Fiber, Portion Controlled', 'images/plans/plan-diet.jpg'),
(2, 'Protein Plan', '40000.00', 'An ideal choice for those focusing on muscle building, recovery, and energy', 'images/plans/plan-protein.jpg'),
(3, 'Royal Plan', '60000.00', 'Balanced meals with a premium feel — delicious, nourishing, and a joy to eat', 'images/plans/plan-royal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptiondeliverydays`
--

CREATE TABLE `subscriptiondeliverydays` (
  `subscription_id` int(11) NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptiondeliverydays`
--

INSERT INTO `subscriptiondeliverydays` (`subscription_id`, `day_of_week`) VALUES
(201, 'Monday'),
(201, 'Wednesday'),
(202, 'Tuesday'),
(202, 'Thursday'),
(202, 'Friday'),
(203, 'Monday'),
(204, 'Wednesday'),
(204, 'Friday'),
(205, 'Tuesday'),
(205, 'Thursday'),
(206, 'Wednesday'),
(207, 'Monday'),
(207, 'Tuesday'),
(208, 'Monday'),
(208, 'Wednesday'),
(208, 'Friday'),
(209, 'Tuesday'),
(209, 'Thursday'),
(210, 'Friday'),
(211, 'Monday'),
(211, 'Tuesday'),
(211, 'Thursday'),
(212, 'Wednesday'),
(212, 'Friday'),
(213, 'Monday'),
(213, 'Tuesday'),
(214, 'Thursday'),
(215, 'Monday'),
(215, 'Friday'),
(216, 'Wednesday'),
(216, 'Thursday'),
(216, 'Saturday'),
(217, 'Friday'),
(217, 'Sunday'),
(218, 'Monday'),
(218, 'Wednesday'),
(219, 'Thursday'),
(220, 'Monday'),
(220, 'Tuesday'),
(221, 'Tuesday'),
(221, 'Friday'),
(222, 'Monday'),
(222, 'Tuesday'),
(222, 'Wednesday'),
(223, 'Thursday'),
(224, 'Friday'),
(225, 'Wednesday'),
(225, 'Friday'),
(226, 'Monday'),
(226, 'Thursday'),
(227, 'Tuesday'),
(228, 'Wednesday'),
(228, 'Friday'),
(229, 'Thursday'),
(230, 'Monday'),
(231, 'Tuesday'),
(231, 'Friday'),
(232, 'Wednesday'),
(233, 'Monday'),
(233, 'Thursday'),
(234, 'Friday'),
(234, 'Saturday'),
(235, 'Wednesday'),
(235, 'Friday'),
(236, 'Monday'),
(237, 'Tuesday'),
(237, 'Thursday'),
(238, 'Monday'),
(238, 'Tuesday'),
(238, 'Thursday'),
(239, 'Friday'),
(240, 'Monday'),
(241, 'Monday'),
(241, 'Tuesday'),
(241, 'Thursday'),
(241, 'Friday'),
(241, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptionmealtypes`
--

CREATE TABLE `subscriptionmealtypes` (
  `subscription_id` int(11) NOT NULL,
  `meal_type` enum('Breakfast','Lunch','Dinner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptionmealtypes`
--

INSERT INTO `subscriptionmealtypes` (`subscription_id`, `meal_type`) VALUES
(201, 'Breakfast'),
(202, 'Lunch'),
(202, 'Dinner'),
(203, 'Lunch'),
(204, 'Breakfast'),
(204, 'Dinner'),
(205, 'Breakfast'),
(205, 'Lunch'),
(206, 'Dinner'),
(207, 'Lunch'),
(208, 'Breakfast'),
(208, 'Lunch'),
(208, 'Dinner'),
(209, 'Breakfast'),
(209, 'Lunch'),
(210, 'Lunch'),
(211, 'Dinner'),
(212, 'Breakfast'),
(212, 'Lunch'),
(213, 'Lunch'),
(213, 'Dinner'),
(214, 'Breakfast'),
(215, 'Breakfast'),
(215, 'Lunch'),
(216, 'Dinner'),
(217, 'Lunch'),
(217, 'Dinner'),
(218, 'Breakfast'),
(219, 'Lunch'),
(220, 'Breakfast'),
(220, 'Dinner'),
(221, 'Lunch'),
(222, 'Breakfast'),
(222, 'Lunch'),
(222, 'Dinner'),
(223, 'Dinner'),
(224, 'Breakfast'),
(225, 'Lunch'),
(226, 'Lunch'),
(226, 'Dinner'),
(227, 'Breakfast'),
(228, 'Breakfast'),
(228, 'Dinner'),
(229, 'Lunch'),
(230, 'Breakfast'),
(231, 'Lunch'),
(232, 'Dinner'),
(233, 'Breakfast'),
(233, 'Lunch'),
(234, 'Breakfast'),
(234, 'Lunch'),
(235, 'Lunch'),
(235, 'Dinner'),
(236, 'Breakfast'),
(237, 'Lunch'),
(238, 'Breakfast'),
(238, 'Lunch'),
(238, 'Dinner'),
(239, 'Dinner'),
(240, 'Breakfast'),
(241, 'Breakfast'),
(241, 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `fullname_subs` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `allergies` text DEFAULT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` enum('active','paused','cancelled') NOT NULL DEFAULT 'active',
  `pause_start_date` date DEFAULT NULL,
  `pause_end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reactivated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `user_id`, `plan_id`, `fullname_subs`, `phone_number`, `allergies`, `total_price`, `status`, `pause_start_date`, `pause_end_date`, `created_at`, `updated_at`, `reactivated_at`) VALUES
(201, 101, 1, 'Oliver Adams', '081234567101', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(202, 101, 2, 'Oliver Adams', '081234567102', '', '1720000.00', 'paused', '2025-07-10', '2025-07-15', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(203, 102, 3, 'Charlotte Brooks', '081234567103', 'Peanuts', '2500000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(204, 103, 1, 'Liam Carter', '081234567104', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(205, 104, 2, 'Amelia Davis', '081234567105', 'Shellfish', '1720000.00', 'paused', '2025-07-20', '2025-07-27', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(206, 104, 3, 'Amelia Davis', '081234567106', '', '3000000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(207, 105, 1, 'Noah Evans', '081234567107', '', '129000.00', 'paused', '2025-07-05', '2025-07-10', '2025-07-01 08:35:14', '2025-07-01 08:35:14', '2025-07-11 00:00:00'),
(208, 106, 2, 'Ava Foster', '081234567108', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(209, 106, 3, 'Ava Foster', '081234567109', '', '2580000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(210, 107, 1, 'William Gray', '081234567110', '', '129000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(211, 101, 3, 'Oliver Adams', '081234567111', '', '2580000.00', 'paused', '2025-07-08', '2025-07-20', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(212, 102, 1, 'Charlotte Brooks', '081234567112', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(213, 103, 2, 'Liam Carter', '081234567113', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(214, 104, 3, 'Amelia Davis', '081234567114', '', '2580000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(215, 105, 1, 'Noah Evans', '081234567115', '', '129000.00', 'paused', '2025-07-15', '2025-07-18', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(216, 106, 2, 'Ava Foster', '081234567116', '', '1720000.00', 'paused', '2025-07-22', '2025-07-30', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(217, 107, 3, 'William Gray', '081234567117', '', '2580000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(218, 108, 1, 'Sophia Harris', '081234567118', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(219, 109, 2, 'James Irving', '081234567119', '', '1720000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(220, 110, 3, 'Isabella Johnson', '081234567120', '', '2580000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(221, 101, 1, 'Oliver Adams', '081234567121', '', '129000.00', 'paused', '2025-07-03', '2025-07-06', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(222, 102, 2, 'Charlotte Brooks', '081234567122', '', '1720000.00', 'paused', '2025-07-13', '2025-07-18', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(223, 103, 3, 'Liam Carter', '081234567123', '', '2580000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(224, 104, 1, 'Amelia Davis', '081234567124', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(225, 105, 2, 'Noah Evans', '081234567125', '', '1720000.00', 'paused', '2025-07-10', '2025-07-12', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(226, 106, 3, 'Ava Foster', '081234567126', '', '2580000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(227, 107, 1, 'William Gray', '081234567127', '', '129000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(228, 108, 2, 'Sophia Harris', '081234567128', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(229, 109, 3, 'James Irving', '081234567129', '', '2580000.00', 'paused', '2025-07-14', '2025-07-19', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(230, 110, 1, 'Isabella Johnson', '081234567130', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(231, 101, 2, 'Oliver Adams', '081234567131', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(232, 102, 3, 'Charlotte Brooks', '081234567132', '', '2580000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(233, 103, 1, 'Liam Carter', '081234567133', '', '129000.00', 'paused', '2025-07-01', '2025-07-03', '2025-07-01 08:35:14', '2025-07-01 08:35:14', '2025-07-04 00:00:00'),
(234, 104, 2, 'Amelia Davis', '081234567134', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(235, 105, 3, 'Noah Evans', '081234567135', '', '2580000.00', 'paused', '2025-07-05', '2025-07-10', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(236, 106, 1, 'Ava Foster', '081234567136', '', '129000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(237, 107, 2, 'William Gray', '081234567137', '', '1720000.00', 'paused', '2025-07-16', '2025-07-22', '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(238, 108, 3, 'Sophia Harris', '081234567138', '', '2580000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(239, 109, 1, 'James Irving', '081234567139', '', '129000.00', 'active', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(240, 110, 2, 'Isabella Johnson', '081234567140', '', '1720000.00', 'cancelled', NULL, NULL, '2025-07-01 08:35:14', '2025-07-01 08:35:14', NULL),
(241, 111, 2, 'Tommy Gunawan', '0873177376271', '', '1720000.00', 'active', NULL, NULL, '2025-07-01 08:39:40', '2025-07-01 08:42:06', '2025-07-01 15:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `review_message` text NOT NULL,
  `rating` tinyint(4) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `user_id`, `customer_name`, `role`, `review_message`, `rating`, `created_at`) VALUES
(19, 101, 'Emily Watson', 'Marketing Executive', 'The meals are delicious and save me so much time. Highly recommended!', 5, '2025-07-01 09:32:46'),
(20, 102, 'Daniel Kim', 'Fitness Enthusiast', 'Great value for money. Consistent quality and taste!', 4, '2025-07-01 09:32:46'),
(21, 103, 'Sophia Green', NULL, 'I love the flexibility in choosing my delivery days and meal types.', 5, '2025-07-01 09:32:46'),
(22, 104, 'Liam Turner', 'Business Analyst', 'Very convenient for busy professionals. Tasty and well-balanced!', 5, '2025-07-01 09:32:46'),
(23, 105, 'Olivia Reed', 'Nutritionist', 'They understand balanced nutrition well. I’m impressed!', 4, '2025-07-01 09:32:46'),
(24, 106, 'Mason Lee', NULL, 'No hassle, great meals, and excellent service.', 4, '2025-07-01 09:32:46'),
(25, 107, 'Isabella Grant', 'Content Creator', 'The app is user-friendly, and the meals are perfect for my diet.', 5, '2025-07-01 09:32:46'),
(26, 108, 'Noah Mitchell', NULL, 'Perfect portion sizes and always delivered on time!', 5, '2025-07-01 09:32:46'),
(27, 109, 'Ava Ramirez', 'HR Coordinator', 'Their customer service is responsive and helpful.', 4, '2025-07-01 09:32:46'),
(28, 110, 'Ethan Collins', 'Athlete', 'The protein plan really helped with my muscle recovery. Love it!', 5, '2025-07-01 09:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password_hash`, `role`, `created_at`) VALUES
(17, 'admin SEA', 'admin_sea@mail.com', '$2y$10$B6ANRsk7X0ANK4EjH23zeuZKzFevRJduPZAVxZkY396iVAtthWcw2', 'admin', '2025-07-01 08:29:35'),
(101, 'Oliver Adams', 'oliver.adams@example.com', 'hash1', 'user', '2025-07-01 08:35:04'),
(102, 'Charlotte Brooks', 'charlotte.brooks@example.com', 'hash2', 'user', '2025-07-01 08:35:04'),
(103, 'Liam Carter', 'liam.carter@example.com', 'hash3', 'user', '2025-07-01 08:35:04'),
(104, 'Amelia Davis', 'amelia.davis@example.com', 'hash4', 'user', '2025-07-01 08:35:04'),
(105, 'Noah Evans', 'noah.evans@example.com', 'hash5', 'user', '2025-07-01 08:35:04'),
(106, 'Ava Foster', 'ava.foster@example.com', 'hash6', 'user', '2025-07-01 08:35:04'),
(107, 'William Gray', 'william.gray@example.com', 'hash7', 'user', '2025-07-01 08:35:04'),
(108, 'Sophia Harris', 'sophia.harris@example.com', 'hash8', 'user', '2025-07-01 08:35:04'),
(109, 'James Irving', 'james.irving@example.com', 'hash9', 'user', '2025-07-01 08:35:04'),
(110, 'Isabella Johnson', 'isabella.johnson@example.com', 'hash10', 'admin', '2025-07-01 08:35:04'),
(111, 'Tommy Gunawan', 'tommyy@gmail.com', '$2y$10$weIMMCMH64eoY5n26Qr1NOQXDoq..wwo93NIOyW38Q9eFjUXpRx4y', 'user', '2025-07-01 08:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mealplans`
--
ALTER TABLE `mealplans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `subscriptiondeliverydays`
--
ALTER TABLE `subscriptiondeliverydays`
  ADD PRIMARY KEY (`subscription_id`,`day_of_week`);

--
-- Indexes for table `subscriptionmealtypes`
--
ALTER TABLE `subscriptionmealtypes`
  ADD PRIMARY KEY (`subscription_id`,`meal_type`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mealplans`
--
ALTER TABLE `mealplans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscriptiondeliverydays`
--
ALTER TABLE `subscriptiondeliverydays`
  ADD CONSTRAINT `subscriptiondeliverydays_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`subscription_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptionmealtypes`
--
ALTER TABLE `subscriptionmealtypes`
  ADD CONSTRAINT `subscriptionmealtypes_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`subscription_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `mealplans` (`plan_id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
