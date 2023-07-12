-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 12, 2023 at 02:40 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotten_sushi`
--
CREATE DATABASE IF NOT EXISTS `rotten_sushi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rotten_sushi`;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `Actor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  PRIMARY KEY (`Actor_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Actor_ID`, `First_Name`, `Last_Name`, `Date_of_Birth`) VALUES
(4, 'Vera', 'Farmiga', '1973-08-03'),
(5, 'Patrick', 'Wilson', '1973-06-03'),
(6, 'Sterling', 'Jerins', '2004-05-15'),
(7, 'Jennie', 'Kim', '1996-01-06'),
(9, 'Jisoo', '', '1995-01-03'),
(10, 'Chloe', 'Bennettt', '1992-04-18'),
(11, 'Rose', 'Park', '1995-01-03'),
(12, 'Baymax', 'Baymax', '2020-06-11'),
(13, 'Zendaya', '', '1996-11-01'),
(14, 'Jenna', 'Ortega', '2002-11-27'),
(15, 'Hailee', 'Steinfeld', '1996-12-11'),
(16, 'Oscar', 'Isaac', '1979-03-09'),
(17, 'Tom', 'Holland', '2023-07-11'),
(18, 'Johnny', 'Depp', '1963-06-09'),
(19, 'Johnny', 'Depp', '1963-06-09'),
(20, 'Tom', 'Hanks', '1956-07-09'),
(21, 'Meryl', 'Streep', '1949-06-22'),
(22, 'Leonardo', 'DiCaprio', '1974-11-11'),
(23, 'Jennifer', 'Lawrence', '1990-08-15'),
(24, 'Denzel', 'Washington', '1954-12-28'),
(25, 'Angelina', 'Jolie', '1975-06-04'),
(26, 'Robert', 'Downey Jr.', '1965-04-04'),
(27, 'Scarlett', 'Johansson', '1984-11-22'),
(28, 'Brad', 'Pitt', '1963-12-18'),
(31, 'a', 'n', '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `Movie_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Movie_Name` varchar(200) NOT NULL,
  `Release_Date` date NOT NULL,
  `Director` varchar(100) DEFAULT NULL,
  `Award` text DEFAULT NULL,
  `Details` text NOT NULL,
  PRIMARY KEY (`Movie_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Movie_ID`, `Movie_Name`, `Release_Date`, `Director`, `Award`, `Details`) VALUES
(4, 'The Conjuring', '2013-10-11', 'James Wan', '', 'The Perron family moves into a farmhouse where they experience paranormal phenomena. They consult demonologists, Ed and Lorraine Warren, to help them get rid of the evil entity haunting them.'),
(5, 'BLACKPINK: Light Up the Sky', '2020-10-14', 'Caroline Suh', 'SEC Awards: Best Documentary', 'The all-access documentary covers the four years since Blackpink\'s debut in 2016 with video footages from their training days, a look into their day-to-day life, behind-the-scenes stories, and interviews with the members. It follows the trials and tribulations of being a K-pop star, the recording process of the group\'s debut album The Album and member RosÃ©\'s then-upcoming solo debut, and culminates with their 2019 Coachella performance.'),
(6, 'Abominable Snowman', '2019-11-27', 'Jill Culton', '2020 Nominee Golden Reel Award. Outstanding Achievement in Sound Editing - Sound Effects', 'The film follows a teenage girl named Yi, who encounters a young Yeti on the roof of her apartment building in Shanghai, names him Everest and embarks on an adventure.'),
(7, 'Parasite', '2019-12-27', 'Bong Joon-ho', '2020 Academy Award for Best Picture', 'The struggling Kim family sees an opportunity when the son starts working for the wealthy Park family. Soon, all of them find a way to work within the same household and start living a parasitic life.'),
(8, 'Everything Everywhere All At Once', '2023-03-03', 'Daniel Kwan Daniel Scheinert', '2023 Academy Award for Best Picture', 'When an interdimensional rupture unravels reality, an unlikely hero must channel her newfound powers to fight bizarre and bewildering dangers from the multiverse as the fate of the world hangs in the balance.'),
(10, 'Jurassic Park', '2022-06-29', 'Colin Trevorro', 'some dino one', 'Four years after the destruction of Isla Nublar, dinosaurs now live and hunt alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history\'s most fearsome creatures.'),
(11, 'Big Hero 6', '2014-12-20', 'Chris Williams', '2015 Winner Â· Outstanding Achievement in Animated Effects in an Animated Production', 'Hiro, a robotics prodigy, joins hands with Baymax in order to avenge his brother\'s death. They then team up with Hiro\'s friends to form a team of high-tech heroes.'),
(12, 'Bruce Almighty', '2003-05-23', 'Tom Shadyac', NULL, 'Comedy film about a man who is granted divine powers'),
(13, '12 Angry Men', '1957-04-10', 'Sidney Lumet', 'Golden Bear', 'Drama film about a jury deliberating a murder trial'),
(14, '3 Idiots', '2009-12-25', 'Rajkumar Hirani', NULL, 'Comedy-drama film about the pursuit of passion and the education system'),
(18, 'Step Brothers', '2008-07-25', 'Adam McKay', NULL, 'Comedy film about two middle-aged men who become stepbrothers'),
(15, 'Moana', '2016-11-23', 'Ron Clements, John Musker', 'Best Animated Feature', 'Animated musical adventure film about a young girls journey to save her people'),
(19, 'Superbad', '2007-08-17', 'Greg Mottola', NULL, 'Teen comedy film about high school friends trying to lose their virginity'),
(20, 'Clueless', '1995-07-19', 'Amy Heckerling', NULL, 'Comedy film about a popular high school girl navigating relationships and social status'),
(21, 'Shrek', '2001-04-22', 'Andrew Adamson, Vicky Jenson', 'Best Animated Feature', 'Animated fantasy-comedy film about an ogre on a quest to rescue a princess'),
(22, 'Ocean\'s 8', '2018-06-05', 'Gary Ross', NULL, 'Heist comedy film featuring an ensemble cast of women planning a robbery'),
(23, 'Dead Poets Society', '1989-06-02', 'Peter Weir', 'Best Original Screenplay', 'Drama film about an English teacher who inspires his students'),
(24, 'The Truman Show', '1998-06-05', 'Peter Weir', 'Best Supporting Actor', 'Satirical science fiction film about a man whose life is a reality TV show'),
(16, 'White Chicks', '2004-06-23', 'Keenen Ivory Wayans', NULL, 'Comedy film about two FBI agents who go undercover as white women'),
(17, 'Pineapple Express', '2008-08-06', 'David Gordon Green', NULL, 'Action-comedy film about two stoners who get caught up in a drug war'),
(28, 'Puss in Boots', '2011-10-28', 'Chris Miller', NULL, 'Animated adventure film featuring the character Puss in Boots from the Shrek franchise'),
(1, 'Barbie: The Princess and the Pauper', '2004-09-28', 'William Lau', NULL, 'Animated musical film featuring the character Barbie in a story about a princess and a pauper who switch places'),
(2, 'Past Lives', '2022-05-15', 'John Smith', NULL, 'Mystery film exploring the concept of reincarnation and past lives'),
(3, 'Minions', '2015-06-17', 'Pierre Coffin, Kyle Balda', 'Best Animated Feature', 'Animated comedy film featuring the lovable Minions from the Despicable Me franchise');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `Purchase_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Movie_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Credit_Card` int(16) DEFAULT NULL,
  `CVV` int(4) DEFAULT NULL,
  `Expiration_Date` date DEFAULT NULL,
  PRIMARY KEY (`Purchase_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Movie_ID` (`Movie_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Purchase_ID`, `Movie_ID`, `User_ID`, `Credit_Card`, `CVV`, `Expiration_Date`) VALUES
(28, 4, 4, 3456, 45, '2023-06-27'),
(13, 5, 2, 23458, 45, '2023-07-12'),
(31, 32, 5, 8, 8, '9888-09-09'),
(17, 3, 2, 234567, 450, '2023-07-12'),
(29, 8, 5, 456, 7, '2023-07-19'),
(32, 6, 2, 23456, 23, '2023-07-18'),
(21, 13, 8, 7867, 6, '2023-07-27'),
(22, 14, 8, 7867, 6, '2023-07-27'),
(23, 17, 8, 7867, 6, '2023-07-27'),
(24, 19, 8, 7867, 6, '2023-07-27'),
(25, 23, 8, 7867, 6, '2023-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Movie_ID` int(11) NOT NULL,
  `Description_` text NOT NULL,
  `Rating` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Movie_ID` (`Movie_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `User_ID`, `Movie_ID`, `Description_`, `Rating`) VALUES
(2, 2, 4, 'not scary at allll', 5),
(32, 2, 7, 'ssss', 6),
(4, 4, 4, 'very very scary', 9),
(6, 5, 7, 'quite a good film', 8),
(8, 25, 4, 'was really scary', 10),
(10, 4, 3, 'Great movie! Highly recommended.', 5),
(11, 4, 1, 'Great movie! Highly recommended.', 5),
(12, 8, 1, 'Awesome film! Must watch.', 9),
(13, 12, 1, 'Enjoyed every minute of it.', 8),
(14, 5, 2, 'Fantastic movie! A must-see.', 10),
(15, 18, 2, 'Loved the storyline and acting.', 9),
(35, 4, 4, 'not scary', 10),
(17, 4, 3, 'Great movie! Highly recommended.', 5),
(18, 10, 3, 'Enjoyed it with my family.', 7),
(19, 15, 3, 'Fun and entertaining.', 8),
(20, 4, 1, 'Great movie! Highly recommended.', 5),
(21, 8, 2, 'Awesome film! Must watch.', 9),
(22, 12, 3, 'Enjoyed every minute of it.', 8),
(23, 5, 4, 'Impressive visuals and storyline.', 5),
(24, 10, 5, 'Captivating performances.', 8),
(25, 15, 6, 'Highly recommended for all.', 9),
(26, 7, 7, 'A must-see for movie enthusiasts.', 8),
(27, 14, 8, 'Entertaining and engaging.', 7),
(28, 19, 9, 'Thrilling from start to finish.', 9),
(29, 25, 10, 'Great movie for a family outing.', 8),
(30, 5, 11, 'cute film. would watch again', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Movie_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Actor_ID` int(11) NOT NULL,
  PRIMARY KEY (`Movie_ID`,`Actor_ID`),
  KEY `Actor_ID` (`Actor_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Movie_ID`, `Actor_ID`) VALUES
(4, 4),
(4, 5),
(4, 6),
(4, 8),
(5, 7),
(5, 8),
(5, 9),
(5, 11),
(6, 10),
(7, 3),
(7, 8),
(10, 8),
(11, 12),
(13, 8),
(13, 18),
(15, 8),
(18, 8),
(18, 20),
(29, 6),
(30, 5),
(31, 6),
(32, 26),
(33, 18),
(34, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password_` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password_`, `First_Name`, `Last_Name`, `Admin`) VALUES
(2, 'bsmith', '$2y$10$ETIMmhEekMDhaBm3ZBjVo.Lls4wnVwTbrxNQ4WznXku737EaRLAR.', 'bill', 'smith', 1),
(4, 'aposey', '$2y$10$bGJvEUDpXXBiw8UiRMXpPONmRh6yLE4VTG56CUEDtEU3iVzcOFMay', 'Abby', 'Posey', 0),
(5, 'amiller', '$2y$10$VIAhs..8ujAoKjH6ZngytODanWeKO39vX3djRLnCsIAWaj9kJOe.W', 'annabella', 'miller', 1),
(6, 'yrivera', '$2y$10$qCw.bSsXOiGQXt25r7dw5OLLNa9rdpR3NRcSJbHPnLqjGLf5365fa', 'Yos', 'Rivera', 1),
(7, 'cdean', '$2y$10$XOhK3rBYYThFjRuGpm8X4eERWXICUTdXoxC02F9enF45fq7U38/cK', 'Cole', 'Dean', 1),
(8, 'pjones', '$2y$10$g6hIBc39uDDLUq9OVNt3Su4g5MBQ6nIdRRK39LFoGgc9T/3c17Woe', 'Paulanne', 'Jones', 0),
(9, 'jdoe', '$2y$10$PS6l3bBErpKeCNAvUf9Epunu0X46SLmurK7mrAeXik7gEJGlnoHuK', 'john', 'doe', 1),
(10, 'jjdoe', '$2y$10$2DenJY.LpDbbTFH6g9AUc.0oTM84GF6ZXPCr0J94G/UbmZgNods1S', 'jane', 'doe', 0),
(11, 'joebob', '$2y$10$TG/HuxVSOHlgVtOxDJ1irOLTe2AsLzSTCmW034w0W4KHvFU1meFcW', 'joe', 'bob', 0),
(12, 'stran', '$2y$10$6hO9yyLY53eTbRnjMHOt4u3j5KpIMjJBcNJOjXq/7xv6u8I7Fy/JO', 'Sally', 'Tran', 0),
(13, 'kcrawford', '$2y$10$dvL2DLb/pRa2FhCZp1MTB.yDksGH4vyLUDW1wDj93jP6LvEVx402u', 'Kian', 'Crawford', 0),
(14, 'kcarter', '$2y$10$0PLroMEqo.yggXRaDsnq3OM06I4Gm8LvAhngtfuC0lYXBW/Xzc6A6', 'Keaton', 'Carter', 0),
(15, 'cdean', '$2y$10$mWRmylnhIBum06NVNLZd3uQ6AQvevCID5Q6Trfc//jJvHDaiCDbQy', 'Carter', 'Dean', 0),
(17, 'shong', '$2y$10$5cts8r4d97torQ.lALDnm.o/9cUCquZljGrPGwsCCF7Vqffl3CMS6', 'Seong', 'Hong', 0),
(18, 'eiverson', '$2y$10$U5K.w7Jhyi/H8CchwnUJJ.0sf/L7HTqO/FBE5umXE5xC4QWd6cAfO', 'Ethan', 'Iverson', 0),
(19, 'pjacobs', '$2y$10$J8O1.ZQgSu4qU8Nfyu9W4.lZ1jKpKbz3ASUJF0ffqV2h.c3Y45Uc.', 'parker', 'jacobs', 0),
(20, 'dkale', '$2y$10$h8Bt1nMBFpRJLjYhwsbgZO0tyfoTpDJqS7ww6Tkgk7tHYxVsdm4E6', 'david', 'kale', 0),
(21, 'nkidane', '$2y$10$RJIxIN.A5HCaJ2FknF646ucCiXQS/XuoUIhU9v14irNll0oJhztJy', 'Natnael', 'Kidane', 0),
(22, 'ykong', '$2y$10$RSD6SmwNMcgtMhCctNNzsOO1jDl13SpQbd9EgDn00up7DcPsllHsq', 'Yunju', 'Kong', 0);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
