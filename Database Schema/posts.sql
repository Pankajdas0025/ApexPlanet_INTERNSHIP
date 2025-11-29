-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.byetcluster.com
-- Generation Time: Sep 17, 2025 at 11:56 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39302216_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date DEFAULT curdate(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `user_id`) VALUES
(1, 'About Teerthanker Mahaveer University', '  \r\nà¤Ÿà¥‡à¤•à¥à¤¨à¥‹à¤²à¥‰à¤œà¥€ à¤”à¤° à¤ªà¥à¤°à¤—à¤¤à¤¿ à¤•à¤¾ à¤•à¥‡à¤‚à¤¦à¥à¤°: à¤¤à¥€à¤°à¥à¤¥à¤‚à¤•à¤° à¤®à¤¹à¤¾à¤µà¤¿à¤¦à¥à¤¯à¤¾à¤²à¤¯ (T.M.U.)à¤­à¤¾à¤°à¤¤ à¤•à¥‡ à¤‰à¤¤à¥à¤¤à¤° à¤ªà¥à¤°à¤¦à¥‡à¤¶ à¤°à¤¾à¤œà¥à¤¯ à¤®à¥‡à¤‚ à¤¸à¥à¤¥à¤¿à¤¤ à¤à¤• à¤ªà¥à¤°à¤®à¥à¤– à¤¨à¤¿à¤œà¥€ à¤µà¤¿à¤¶à¥à¤µà¤µà¤¿à¤¦à¥à¤¯à¤¾à¤²à¤¯ à¤¹à¥ˆ à¤œà¥‹ à¤¶à¤¿à¤•à¥à¤·à¤¾, à¤µà¤¿à¤œà¥à¤žà¤¾à¤¨, à¤”à¤° à¤¤à¤•à¤¨à¥€à¤•à¥€ à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤•à¥‡ à¤•à¥à¤·à¥‡à¤¤à¥à¤° à¤®à¥‡à¤‚ à¤‰à¤¤à¥à¤•à¥ƒà¤·à¥à¤Ÿà¤¤à¤¾ à¤•à¥€ à¤“à¤° à¤ªà¥à¤°à¥‡à¤°à¤¿à¤¤ à¤•à¤° à¤°à¤¹à¤¾ à¤¹à¥ˆà¥¤ à¤¯à¤¹ à¤µà¤¿à¤¶à¥à¤µà¤µà¤¿à¤¦à¥à¤¯à¤¾à¤²à¤¯ à¤…à¤ªà¤¨à¥‡ à¤¶à¤¿à¤•à¥à¤·à¤¾-à¤…à¤¨à¥à¤¸à¤‚à¤§à¤¾à¤¨ à¤•à¤¾à¤°à¥à¤¯à¤•à¥à¤°à¤®à¥‹à¤‚, à¤¸à¤‚à¤—à¤ à¤¨à¤¾à¤¤à¥à¤®à¤• à¤•à¥à¤·à¤®à¤¤à¤¾ à¤”à¤° à¤µà¤¿à¤šà¤¾à¤° à¤¶à¥ˆà¤²à¥€ à¤•à¥‡ à¤²à¤¿à¤ à¤ªà¥à¤°à¤¸à¤¿à¤¦à¥à¤§ à¤¹à¥ˆà¥¤ à¤…à¤•à¤¾à¤¦à¤®à¤¿à¤• à¤•à¤¾à¤°à¥à¤¯à¤•à¥à¤°à¤® T.M.U. à¤à¤• à¤µà¤¿à¤¸à¥à¤¤à¥ƒà¤¤ à¤¶à¥ˆà¤•à¥à¤·à¤¿à¤• à¤¸à¤‚à¤¸à¥à¤¥à¤¾à¤¨ à¤¹à¥ˆ à¤œà¥‹ à¤µà¤¿à¤­à¤¿à¤¨à¥à¤¨ à¤•à¥à¤·à¥‡à¤¤à¥à¤°à¥‹à¤‚ à¤®à¥‡à¤‚ à¤¸à¥à¤¨à¤¾à¤¤à¤•, à¤¸à¥à¤¨à¤¾à¤¤à¤•à¥‹à¤¤à¥à¤¤à¤°, à¤”à¤° à¤¡à¥‰à¤•à¥à¤Ÿà¤°à¥‡à¤Ÿ à¤•à¤¾à¤°à¥à¤¯à¤•à¥à¤°à¤® à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆà¥¤ à¤‡à¤¸à¤®à¥‡à¤‚ à¤•à¤‚à¤ªà¥à¤¯à¥‚à¤Ÿà¤° à¤à¤ªà¥à¤²à¥€à¤•à¥‡à¤¶à¤¨à¥à¤¸, à¤®à¤¾à¤¨à¤µà¤¿à¤•à¥€, à¤µà¤¿à¤œà¥à¤žà¤¾à¤¨, à¤•à¤²à¤¾, à¤µà¤¾à¤£à¤¿à¤œà¥à¤¯, à¤”à¤° à¤•à¤¾à¤¨à¥‚à¤¨ à¤œà¥ˆà¤¸à¥‡ à¤µà¤¿à¤·à¤¯ à¤¶à¤¾à¤®à¤¿à¤² à¤¹à¥ˆà¤‚à¥¤ à¤¯à¤¹à¤¾à¤ à¤•à¥‡ à¤•à¤¾à¤°à¥à¤¯à¤•à¥à¤°à¤® à¤‰à¤šà¥à¤š à¤¶à¥ˆà¤•à¥à¤·à¤¿à¤• à¤®à¤¾à¤¨à¤•à¥‹à¤‚ à¤•à¥‹ à¤ªà¥‚à¤°à¤¾ à¤•à¤°à¤¤à¥‡ à¤¹à¥ˆà¤‚ à¤”à¤° à¤›à¤¾à¤¤à¥à¤°à¥‹à¤‚ à¤•à¥‹ à¤‰à¤šà¥à¤šà¤¤à¤® à¤¸à¥à¤¤à¤° à¤•à¥€ à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¨à¥‡ à¤•à¥‡ à¤²à¤¿à¤ à¤¡à¤¿à¤œà¤¼à¤¾à¤‡à¤¨ à¤•à¤¿à¤ à¤—à¤ à¤¹à¥ˆà¤‚à¥¤ à¤‡à¤‚à¤«à¥à¤°à¤¾à¤¸à¥à¤Ÿà¥à¤°à¤•à¥à¤šà¤° à¤”à¤° à¤¸à¥à¤µà¤¿à¤§à¤¾à¤à¤ T.M.U. à¤à¤• à¤‰à¤¨à¥à¤¨à¤¤ à¤‡à¤‚à¤«à¥à¤°à¤¾à¤¸à¥à¤Ÿà¥à¤°à¤•à¥à¤šà¤° à¤•à¥‡ à¤¸à¤¾à¤¥ à¤¸à¥à¤¸à¤œà¥à¤œà¤¿à¤¤ à¤¹à¥ˆ à¤œà¤¿à¤¸à¤®à¥‡à¤‚ à¤²à¥ˆà¤¬, à¤•à¤‚à¤ªà¥à¤¯à¥‚à¤Ÿà¤° à¤•à¥‡à¤‚à¤¦à¥à¤°, à¤²à¤¾à¤‡à¤¬à¥à¤°à¥‡à¤°à¥€, à¤à¤•à¥à¤¸à¤¿à¤¬à¤¿à¤¶à¤¨ à¤¹à¥‰à¤², à¤”à¤° à¤µà¤¿à¤­à¤¿à¤¨à¥à¤¨ à¤µà¤¿à¤¶à¥‡à¤· à¤•à¤•à¥à¤·à¤¾à¤à¤ à¤¶à¤¾à¤®à¤¿à¤² à¤¹à¥ˆà¤‚à¥¤ à¤›à¤¾à¤¤à¥à¤°à¥‹à¤‚ à¤•à¥‡ à¤²à¤¿à¤ à¤¹à¤¾à¤‰à¤¸à¤¿à¤‚à¤— à¤µà¤¿à¤•à¤²à¥à¤ª à¤­à¥€ à¤‰à¤ªà¤²à¤¬à¥à¤§ à¤¹à¥ˆà¤‚à¥¤........', '2025-06-29', 1),
(2, 'A Begginer\'s guide to Webdevelopment', 'Intro:\r\nStarting your web development journey can feel overwhelming â€” HTML, CSS, JavaScript, frontend, backendâ€¦ where do you even begin? Donâ€™t worry, this blog is your roadmap. Whether you\'re a student, career switcher, or a tech enthusiast, weâ€™ll break down web development into bite-sized concepts and help you take your first confident steps toward building your own websites.\r\n\r\nðŸš€ 2. â€œTop 10 Tools Every Web Developer Should Know in 2025â€\r\nIntro:\r\nWeb development evolves fast, and staying updated with the right tools can skyrocket your productivity. In this post, weâ€™ll explore 10 essential tools (from code editors to design platforms and version control systems) that every modern developer must know to stay ahead of the curve.\r\n\r\nðŸ’¡ 3. â€œHTML, CSS, JavaScript Explained Like Youâ€™re 5â€\r\nIntro:\r\nFeeling confused by all the tech jargon? Letâ€™s simplify it. Imagine building a toy house â€” HTML is the structure, CSS is the paint and decoration, and JavaScript brings it to life. In this blog, weâ€™ll explain the building blocks of websites in the simplest way possible â€” no prior experience needed.\r\n\r\nðŸ“± 4. â€œResponsive Design Secrets: Make Your Website Look Amazing on Any Deviceâ€\r\nIntro:\r\nEver visited a website on your phone and it looked... broken? Thatâ€™s where responsive design saves the day. In this article, weâ€™ll explore the key techniques and CSS tricks that ensure your website looks great on desktops, tablets, and mobile phones â€” no matter the screen size.\r\n\r\nðŸ” 5. â€œFrontend vs Backend: Whatâ€™s the Real Difference?â€\r\nIntro:\r\nIs frontend about looks and backend about logic? Well, yes â€” but thereâ€™s more to it. If youâ€™ve been hearing these terms and still feel confused, this blog will clear it all up. Learn what frontend and backend development actually mean, what skills are needed for each, and how they work together to make websites function.\r\n\r\n', '2025-06-29', 1),
(3, 'is Webdevelopmet still in demand in 2025', 'With the rise of AI tools and no-code platforms, many are wondering â€” is web development still a smart career choice? The answer might surprise you. In this post, we dive deep into current market trends, hiring stats, and how developers are adapting to stay relevant and in demand.\r\n\r\nJust learning HTML and CSS isnâ€™t enough anymore. Todayâ€™s recruiters are looking for developers who bring more to the table â€” think performance optimization, SEO knowledge, and collaboration skills. This blog will reveal the top 7 skills hiring managers are asking for in 2025.', '2025-06-29', 1),
(4, 'Lava Prowatch   X review', 'Sturdy yet lightweight metal alloy body, elegant design\r\n\r\nIP68 rated dust and water resistant\r\n\r\nSharp AMOLED display with Corning Gorilla Glass 3 protection\r\n\r\nFairly accurate health tracking for the segment\r\n\r\nBuilt-in GPS, altimeter, barometer and compass\r\n\r\nBluetooth calling\r\n\r\nGood battery backup\r\n\r\nSimple and responsive user interface\r\n\r\nWell priced, 2 years warranty\r\n\r\nCons:\r\n\r\nApp needs more depth, also demands too many unnecessary permissions\r\n\r\nFitness and health data goes missing from the watch at times\r\n\r\nGPS lock can take a considerable amount of time\r\n\r\nA few bugs that need fixing', '2025-08-18', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
