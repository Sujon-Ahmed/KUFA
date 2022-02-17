-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 08:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kufa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `about_id` int(11) NOT NULL,
  `about_sub_title` varchar(50) NOT NULL,
  `about_title` varchar(100) NOT NULL,
  `about_image` varchar(100) NOT NULL,
  `about_description` longtext NOT NULL,
  `about_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`about_id`, `about_sub_title`, `about_title`, `about_image`, `about_description`, `about_status`) VALUES
(1, 'Introduction', 'About Me', '61f6816f9a6ce7.55586062.jpg', '<p>I am Sujon Ahmed. A CSE student having some knowledges in Web Design and Developement Technologies and Interested in Desktop/Mobile Software Development. Currently not employed, developing skills. Looking for an opportunity in an organization, who treats their employees with respect.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_sub_title` varchar(50) NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `banner_img` varchar(60) NOT NULL,
  `banner_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_sub_title`, `banner_title`, `description`, `banner_img`, `banner_status`) VALUES
(4, 'Hi', 'I am Sujon Ahmed', '<p>Full-Stack Web Developer</p>', '61f6394d66c554.40745775.png', 1),
(5, 'Hello', 'I am Ema Watson', '<p>I am a good Web Designer</p>', '61f63ad21031d8.73338552.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `status`) VALUES
(1, '61fbeb2e2824d1.46218899.png', 1),
(2, '61fbeb3de74ed5.54795687.png', 1),
(3, '61fbeb45eaf7d5.91064333.png', 1),
(4, '61fd46cd9d4779.88846525.png', 1),
(5, '61fbeb57076743.31894388.png', 1),
(16, '61fd4694d9b790.27293562.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `time`) VALUES
(1, 'Sujon Ahmed', 'sujonahmed@gmail.com', 'Hello World', '2022-02-05 23:19:21'),
(2, 'Matthew Oliver', 'hezun@mailinator.com', 'Omnis deleniti esse', '2022-02-05 23:19:21'),
(3, 'Audrey Walters', 'sahoxokifu@mailinator.com', 'Et eu laboris qui ut', '2022-02-05 23:19:21'),
(4, 'Hermione Holcomb', 'guqyze@mailinator.com', 'Qui et incididunt as', '2022-02-05 23:19:21'),
(5, 'Hope Hanson', 'tajyjufut@mailinator.com', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '2022-02-05 23:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `portfolio_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `portfolio_category` varchar(50) NOT NULL,
  `portfolio_title` varchar(100) NOT NULL,
  `portfolio_image` varchar(100) NOT NULL,
  `portfolio_description` longtext NOT NULL,
  `portfolio_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`portfolio_id`, `author_id`, `portfolio_category`, `portfolio_title`, `portfolio_image`, `portfolio_description`, `portfolio_status`) VALUES
(1, 9, 'Design', 'Dark Beauty', '61f819114c0c94.17954539.jpg', '<div>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</div><div>Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.</div>', 1),
(2, 9, 'Development', 'Eterna Blogging', '61f819556bdec3.78745677.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with desktop publishing software like Aldus PageMaker including versions.<span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.</span></p>', 1),
(4, 9, 'Design', 'Creative Design', '61f81f37c4e294.17294007.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.<br></p>', 1),
(8, 9, 'UI/UX', 'Tester', '61f8279cc73290.35947136.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.<span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.</span></p>', 1),
(9, 9, 'Development', 'Dark Beauty', '61f95cb50be5e6.22467454.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.<br></p>', 1),
(10, 9, 'Development', 'Unquie Interface ', '61f9613f247322.86387246.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.<br></p>', 0),
(11, 9, 'UI/UX', 'Again There', '61f95cf68e2c94.00623216.jpg', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.Rxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_heading`
--

CREATE TABLE `portfolio_heading` (
  `portfolio_head_id` int(11) NOT NULL,
  `portfolio_sub_heading` varchar(100) NOT NULL,
  `portfolio_main_heading` varchar(100) NOT NULL,
  `portfolio_heading_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_heading`
--

INSERT INTO `portfolio_heading` (`portfolio_head_id`, `portfolio_sub_heading`, `portfolio_main_heading`, `portfolio_heading_status`) VALUES
(2, 'Showcase', 'My Recent Work', 1),
(4, 'Sub Heading', 'Main Heading', 0);

-- --------------------------------------------------------

--
-- Table structure for table `satisfies`
--

CREATE TABLE `satisfies` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satisfies`
--

INSERT INTO `satisfies` (`id`, `icon`, `value`, `name`, `status`) VALUES
(1, 'far fa-thumbs-up', 5000, 'Like', 1),
(5, 'far fa-smile', 565, 'Happy Clients', 1),
(6, 'far fa-calendar-check', 25, 'Experiance', 1),
(7, 'fa fa-award', 255, 'Features', 1),
(11, 'fab fa-apple', 150, 'Apple', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_icon` varchar(50) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_description` longtext NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_icon`, `service_name`, `service_description`, `service_status`) VALUES
(2, 'fas fa-edit', 'Design', 'It is a long established fact that a reader will be distracted by the readable content of a page', 1),
(3, 'fab fa-react', 'Creative Design', 'It is a long established fact that a reader will be distracted by the readable content of a page', 1),
(4, 'fas fa-desktop', 'Responsive Design', '<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>', 1),
(5, 'fas fa-headphones', 'Helps', '<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>', 1),
(6, 'fas fa-lightbulb', 'Knowledge', '<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>', 1),
(7, 'fas fa-fire', 'Ultimate Features', '<p>It is a long established fact that a reader will be distracted by the readable content of a page<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_heading`
--

CREATE TABLE `services_heading` (
  `service_heading_id` int(11) NOT NULL,
  `service_heading_sub_title` varchar(100) NOT NULL,
  `service_heading_title` varchar(100) NOT NULL,
  `service_heading_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_heading`
--

INSERT INTO `services_heading` (`service_heading_id`, `service_heading_sub_title`, `service_heading_title`, `service_heading_status`) VALUES
(2, 'What We Do', 'Our Services', 1),
(3, 'Hola', 'something', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `skill_percentage` int(11) NOT NULL,
  `skill_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `skill_percentage`, `skill_status`) VALUES
(1, 'HTML5', 90, 1),
(2, 'CSS3', 80, 1),
(3, 'PHP', 75, 1),
(4, 'Laravel', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quotes` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image`, `quotes`, `status`) VALUES
(5, 'Sara Wilsson', 'Designer', '61fa6530883645.72493954.jpg', '<p>Lorem ipsum dummy text&nbsp;<span style=\"\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\">from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,</span><span style=\"\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\">&nbsp;</span></p>', 1),
(6, 'Justin Peck', 'Engineer', '61fa685d247ab3.11974081.jpg', '<p>Lorem ipsum dummy text&nbsp;<span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\" style=\"\">from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,</span><span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\" style=\"\">&nbsp;</span><br></p>', 1),
(7, 'Halee Pena', 'Developer', '61fa687a190bf1.88220189.jpg', '<p>Lorem ipsum dummy text&nbsp;<span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\" style=\"\">from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,</span><span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" font-weight:=\"\" var(--bs-body-font-weight);\"=\"\" style=\"\">&nbsp;</span><br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_head`
--

CREATE TABLE `testimonial_head` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `main_title` varchar(100) NOT NULL,
  `testimonial_head_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial_head`
--

INSERT INTO `testimonial_head` (`id`, `sub_title`, `main_title`, `testimonial_head_status`) VALUES
(1, 'Hello', 'Something', 0),
(2, 'Testimonial', 'Happy Clients', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_about` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_job` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `user_company` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_about`, `user_phone`, `user_email`, `user_password`, `user_photo`, `user_job`, `user_address`, `user_country`, `user_company`, `status`) VALUES
(9, 'Sujon Ahmed', 'Hi, I am Sujon Ahmed a Full Stack Developer', '01743405982', 'sujonahmed@gmail.com', '$2y$10$PGwe8PpcSJSX708XCBL0vOhEvee3z904ZofajlEj8y5CH2D7m.4Tq', '61f7c0c0be1372.16180587.jpg', 'Web Developer', 'Manikganj', 'Bangladesh', 'Creative It Institute', 1),
(31, 'Sara Wilsson', 'Hi, I am Sara a good Web Designer', '456-78-256', 'sara@gmail.com', '$2y$10$VMa2ZKqn29BOsLE/dONKSepR9iymtPjb2fEICUCvV8RkYVtJDkwxm', '620ea0b1a397b9.38683632.jpg', 'Web Designer', 'California', 'USA', 'CIT', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `portfolio_heading`
--
ALTER TABLE `portfolio_heading`
  ADD PRIMARY KEY (`portfolio_head_id`);

--
-- Indexes for table `satisfies`
--
ALTER TABLE `satisfies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `services_heading`
--
ALTER TABLE `services_heading`
  ADD PRIMARY KEY (`service_heading_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_head`
--
ALTER TABLE `testimonial_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `portfolio_heading`
--
ALTER TABLE `portfolio_heading`
  MODIFY `portfolio_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satisfies`
--
ALTER TABLE `satisfies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_heading`
--
ALTER TABLE `services_heading`
  MODIFY `service_heading_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial_head`
--
ALTER TABLE `testimonial_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
