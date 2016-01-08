
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 01:05 PM
-- Server version: 5.1.71
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u636854174_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `explanation` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `passed` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`question_id`, `answer`, `explanation`, `passed`) VALUES
(1, 'temple run oz', 'Temple Run:OZ  img1-Raeligh,North Carolina  img2-James Franco.He starred in OZ:the great and powerful.  img3-Imangi Studios,the company who developed Temple run.', 8),
(2, 'amazon', 'Amazon, a Seattle based company, was renamed as Amazon, after the Amazon River.  The Company was earlier called as Cadabra.  Amazon is also a name of a parrot found in Central and South America.', 9),
(3, 'yandex', 'The image depicts a famous Russian monument known as the Kremlin.  Yandex is Russia’s largest online search engine company. Yandex introduced the concept of interactive snippets often referred to as “islands”, and they used the name of John Donne’s poem “No man is an island”.', 7),
(4, 'mu sigma', 'img1-Ernst and Young,a professional services MNC who gives the entreprenuer of the year award.  img2-Tsunami which took place in 2004  img3-Dhiraj Rajaram,who won the entreprenuer of the year award for finding a company in 2004..i,e Mu-Sigma.', 5),
(5, 'the guardian', 'the guardian is a windows phone (img1) app for women safety', 3),
(6, 'oracle linux', 'img1->the linux mascot:p, img3->Vinod Khosla,the co-founder of Sun Microsystems,which recently got acquired by Oracle', 3),
(7, 'bacon number', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(50) NOT NULL,
  `posted_by` int(50) NOT NULL,
  `post` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `posted_on` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='For forum posts' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `posted_by`, `post`, `posted_on`) VALUES
(1, 1, 1, 'Hello Everyone!!', '2015-01-04 16:29:18'),
(2, 1, 1, 'Hello!! Almost There Team. ', '2015-01-04 16:29:50'),
(3, 3, 2, 'Admin!..please provide hints...', '2015-01-05 18:42:03'),
(19, 3, 6, 'Admin hoye hints chaichs???..che che che!!', '2015-01-08 20:24:35'),
(5, 6, 2, 'Hello Admin!!!! Are you there??', '2015-01-08 15:14:07'),
(7, 6, 2, 'Hello ', '2015-01-08 15:27:25'),
(8, 6, 2, 'Whoaaaa', '2015-01-08 15:27:38'),
(9, 6, 2, 'Help!!!!', '2015-01-08 15:35:45'),
(10, 6, 2, 'Help!!!!', '2015-01-08 15:35:45'),
(11, 6, 2, 'Help!!', '2015-01-08 15:35:54'),
(12, 7, 2, 'hello', '2015-01-08 15:48:19'),
(13, 7, 2, 'Hi!!!!!!!!!!', '2015-01-08 15:48:33'),
(14, 7, 2, 'Admin please inbox me the answers.....:P', '2015-01-08 19:27:16'),
(15, 7, 2, 'I will give you half of the priz money!!!...promise...:P', '2015-01-08 19:28:57'),
(16, 8, 3, 'hello admin!!', '2015-01-08 19:34:12'),
(17, 8, 2, 'hi..', '2015-01-08 19:35:21'),
(18, 8, 3, 'please provide hints...', '2015-01-08 19:51:28'),
(20, 3, 1, '^Thik ache.. Asche Notifications', '2015-01-08 20:34:50'),
(21, 1, 12, 'Hello!!!', '2015-01-08 20:36:48'),
(22, 8, 3, 'hints chai!!!!', '2015-01-08 20:40:22'),
(23, 8, 3, 'Admin please inbox me the answers!!!..:P', '2015-01-08 20:41:14'),
(24, 3, 6, 'Going to next level!!', '2015-01-08 20:49:07'),
(25, 4, 6, 'Is it a name of a company?', '2015-01-08 21:00:23'),
(26, 1, 14, 'any help will be appreciated!!!', '2015-01-08 22:24:38'),
(27, 1, 14, 'oh god pls help!!!', '2015-01-08 22:24:57'),
(28, 1, 13, 'Hello World', '2015-01-09 11:48:00'),
(30, 7, 9, 'Hello! ', '2015-01-09 13:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE IF NOT EXISTS `forum_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_count` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `post_count`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 2),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `attempts` int(255) NOT NULL,
  `latest_attempt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`user_id`, `level`, `attempts`, `latest_attempt`) VALUES
(1, 7, 23, '2015-01-09 06:59:22'),
(2, 8, 30, '2015-01-09 07:41:33'),
(3, 8, 13, '2015-01-08 05:26:25'),
(4, 3, 9, '2015-01-05 06:11:02'),
(5, 3, 3, '2015-01-06 04:48:27'),
(6, 4, 6, '2015-01-08 15:29:44'),
(7, 1, 0, '2015-01-07 12:38:14'),
(8, 1, 0, '2015-01-07 12:46:08'),
(9, 4, 14, '2015-01-07 17:59:40'),
(10, 1, 0, '2015-01-08 10:26:19'),
(11, 1, 0, '2015-01-08 10:30:07'),
(12, 1, 0, '2015-01-08 10:33:56'),
(13, 5, 10, '2015-01-08 12:28:00'),
(14, 1, 0, '2015-01-08 16:52:32'),
(15, 7, 9, '2015-01-09 06:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `college`, `year`, `email`, `contact`, `role`) VALUES
(1, 'admin1', '$2a$08$wG5FkBckWkS/9YIyW/pENuUiO615uI0FEGh0mJRsRD3XvtORM4WDi', 'Aryak Sengupta', 'IEM', 4, 'aryak@yahoo.com', 9674361668, 1),
(2, 'admin', '$2a$08$YX7PLNZKrSq/CafOcRiPJOsLKXLNqmZjJCmcIgPUCTjBnUpoKcpHK', 'Arupam Sengupta', 'iem', 4, 'arupam.sengupta@gmail.com', 7278120937, 1),
(3, 'Ani', '$2a$08$8Bdz1CCEzmCI1Xt/NvkwB.myKn.HIZEZWfSLs8/706D.kcv0g79TG', 'Anirban Dey', 'IEM', 4, 'anirbandey2010@gmail.com', 9874990712, 0),
(4, 'anirban1993', '$2a$08$V8gsmLD7BAWq93V/b4r.S.ryb1mUsGTtBctr1BrWvv7QnMc7SpPJC', 'Anirban Ghosh', 'IEM', 4, 'anirban@yahoo.com', 9674361668, 0),
(5, 'subhodip', '$2a$08$WZQHzYQJPEvNsjNGmuOLZeris.ji4f/uNxS49fDpLB1kFBurxNK22', 'Subhodip Kumar', 'IEM', 4, 'subhodip@gmail.com', 9852364651, 0),
(6, 'anurup', '$2a$08$0Vxos9s5JYF9QGpe4cmfSe7bH5UknoKURcoF/bu0DvvskDCqxxX.G', 'Anurup Mukherjee', 'IEM', 4, 'anurup64@gmail.com', 9038872101, 0),
(11, 'anu123', '$2a$08$AOWaJW27tRpSOeh/r2juT.n2kmKPY2LUyP49IbIxBF2uR98xefZai', 'Anurup Mukherjee', 'IEM', 1, 'anurup18@gmail.com', 9038872101, 0),
(10, 'raha1234', '$2a$08$GmtRriCwUeT0g6kvOO7U8Ons7t2HnSdoGbHehk//hW./Irahw5aCu', 'Nabarun Raha', 'IEM', 4, 'raha@gmail.com', 9756465756, 0),
(9, 'Mod', '$2a$08$QS0T51FHw9PwtSGWFPZpiOSTtFz2sOvAsDQ9xmTsk9Oua4vMw6z3e', 'Mod', 'IEM', 3, 'sayan.bose123@gmail.com', 8902708112, 1),
(12, 'raha', '$2a$08$qveh7THStpnDrPtvdCUQEeKNdLHnDe5Ir92HJ/q9DofJC0T0s0pO2', 'Nabarun Raha', 'IEM', 4, 'raha@gmail.com', 9756465756, 0),
(13, 'iwizard', '$2a$08$MaAdB7tI2chspgtVf9h80ewaUZbRDNUB4Lrl01m7LTHUezhE1uw0q', 'Kapish Malhotra', '', 4, 'kapister@gmail.com', 9748078915, 1),
(14, 'bojo', '$2a$08$JxbFMFiVXVObJQS5FrJELeF53mN9rW9bBvjyzToeLxmvKehJLVB.K', 'Neelabjo Mukherjee', 'IEM', 4, 'neelabjo93@gmail.com', 8276893901, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
