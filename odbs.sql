-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 01:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `answertest`
--

CREATE TABLE `answertest` (
  `id` int(11) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `answerquestion1` varchar(255) NOT NULL,
  `answerquestion2` varchar(255) NOT NULL,
  `answerquestion3` varchar(255) NOT NULL,
  `answerquestion4` varchar(255) NOT NULL,
  `answerquestion5` varchar(255) NOT NULL,
  `answerquestion6` varchar(255) NOT NULL,
  `answerquestion7` varchar(255) NOT NULL,
  `answerquestion8` varchar(255) NOT NULL,
  `answerquestion9` varchar(255) NOT NULL,
  `answerquestion10` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answertest`
--

INSERT INTO `answertest` (`id`, `fulname`, `email`, `answerquestion1`, `answerquestion2`, `answerquestion3`, `answerquestion4`, `answerquestion5`, `answerquestion6`, `answerquestion7`, `answerquestion8`, `answerquestion9`, `answerquestion10`, `date`) VALUES
(1, 'simon', 'nseobong7@gmail.com', '', '', '', '', '', '', '', '', '0', '', '2020-07-24'),
(2, 'simon', 'nseobong7@gmail.com', 'go', 'twa', 'djd', 'ffkd', 'fkfn', 'ffkf', 'fjf', 'jnjv', '0', 'jfjf', '2020-07-24'),
(3, 'simonudo74@gmail.com', 'nseobong7@gmail.com', 'fhf', 'fjfj', 'fjfj', 'fkfj', 'fjfjfk', 'fkfk', 'fkfk', 'ffk', 'fkfk', 'ffk', '2020-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `quarantorname` varchar(255) NOT NULL,
  `quarantorphone` varchar(255) NOT NULL,
  `quarantoradd` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `fulname`, `email`, `face`, `address`, `phonenumber`, `position`, `quarantorname`, `quarantorphone`, `quarantoradd`, `images`, `date`) VALUES
(2, 'simon', 'nseobong7@gmail.com', 'http://localhost/odbs.com/odbsadmin/team', 'aka 57', '0810432165', 'option', 'okon', '08125296803', 'david strret', 'uploads/image/2020-07-20-16-54-13_5f15b0151ba72.jpg', '2020-07-20'),
(3, 'simon', 'nseobong7@gmail.com', 'http://localhost/odbs.com/odbsadmin/team', 'aka 57', '0810432165', 'option', 'okon', '08125296803', 'david strret', 'uploads/image/2020-07-20-17-37-02_5f15ba1e490f1.jpg', '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `fulname`, `images`, `date`) VALUES
(5, 'simon', 'uploads/image/2020-07-15-16-18-51_5f0f104bab5be.png', '2020-07-15'),
(6, 'simon', 'uploads/image/2020-07-15-16-18-55_5f0f104f94386.png', '2020-07-15'),
(7, 'simon', 'uploads/image/2020-07-15-16-18-59_5f0f105303011.png', '2020-07-15'),
(8, 'simonudo74@gmail.com', 'uploads/image/2020-07-15-16-33-46_5f0f13ca065b7.png', '2020-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `email`, `fulname`, `phone`, `date`) VALUES
(4, 'nseobong7@gmail.com', 'simon', '08125296803', '2020-07-06'),
(5, 'nseobong7@gmail.com', 'simon', '08125296803', '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `images` text NOT NULL,
  `topic` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `message`, `images`, `topic`, `date`) VALUES
(4, 'vhbdigiebf', 'uploads/image/2020-07-08-17-48-48_5f05eae04b4bf.jpg', 'Software summit', '2020-07-08'),
(5, 'vhbdigiebf', 'uploads/image/2020-07-08-17-51-08_5f05eb6c871dd.jpg', 'Software summit', '2020-07-08'),
(6, 'vhbdigiebf', 'uploads/image/2020-07-08-17-51-12_5f05eb706868a.jpg', 'Software summit', '2020-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `odbscontact`
--

CREATE TABLE `odbscontact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odbscontact`
--

INSERT INTO `odbscontact` (`id`, `email`, `fulname`, `phone`, `message`, `date`) VALUES
(2, 'simonudo74@gmail.com', 'simonudo74@gmail.com', '08125296803', '0', '2020-07-06'),
(3, 'nseobong7@gmail.com', 'simon', '08125296803', 'vvhv', '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `images` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `press`
--

INSERT INTO `press` (`id`, `topic`, `admin`, `message`, `images`, `date`) VALUES
(2, 'Infertility', 'admin', 'hhhb', 'uploads/image/2020-07-08-18-25-05_5f05f361a8711.jpg', '2020-07-08 00:00:00'),
(4, 'Infertility', 'admin', 'hhhb', 'uploads/image/2020-07-08-18-25-15_5f05f36b0c528.jpg', '2020-07-08 00:00:00'),
(5, 'Web Developer', 'admin', 'Congress’s role and operation in national politics is fundamentally shaped by the design and structure of the governing institutions in the Constitution. One of the key principles of the Constitution is separation of powers. The doctrine is rooted in a political philosophy that aims to keep power from consolidating in any single person or entity, and a key goal of the framers of the Constitution was to establish a governing system that diffused and divided power. Experience with the consolidated power of King George III had led them to believe that “the accumulation of legislative, executive, and judicial powers in the same hands … was the very definition of tyranny.” ', 'uploads/image/2020-07-09-22-43-38_5f07817adf3a0.jpg', '2020-07-09 00:00:00'),
(6, 'Godswill', 'admin', 'Congress’s role and operation in national politics is fundamentally shaped by the design and structure of the governing institutions in the Constitution. One of the key principles of the Constitution is separation of powers. The doctrine is rooted in a political philosophy that aims to keep power from consolidating in any single person or entity, and a key goal of the framers of the Constitution was to establish a governing system that diffused and divided power. Experience with the consolidated power of King George III had led them to believe that “the accumulation of legislative, executive, and judicial powers in the same hands … was the very definition of tyranny.” These objectives were achieved institutionally through the constitutional separation of powers. The legislative, executive, and judicial branches of the government were assigned distinct and limited roles under the Constitution, and required to be comprised of different political actors. The elected branches have separate, independent bases of authority, and specific safeguards prevent any of the branches from gaining undue influence over another. Congress’s role and operation in national politics is fundamentally shaped by the design and structure of the governing institutions in the Constitution. One of the key principles of the Constitution is separation of powers. The doctrine is rooted in a political philosophy that aims to keep power from consolidating in any single person or entity, and a key goal of the framers of the Constitution was to establish a governing system that diffused and divided power. Experience with the consolidated power of King George III had led them to believe that “the accumulation of legislative, executive, and judicial powers in the same hands was the very definition of tyranny.”  These objectives were achieved institutionally through the constitutional separation of powers. ', 'uploads/image/2020-07-20-19-01-36_5f15cdf009cab.jpg', '2020-07-20 10:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `press_comment`
--

CREATE TABLE `press_comment` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `press_comment`
--

INSERT INTO `press_comment` (`id`, `topic`, `comment`, `date`) VALUES
(0, 'Infertility', 'come and see', '2020-07-09 15:09:08'),
(0, 'Infertility', 'come and see', '2020-07-09 15:09:08'),
(0, 'Godswill', 'jfbjbfbf', '2020-07-20 10:02:23'),
(0, 'Godswill', 'jfbjbfbf', '2020-07-20 10:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `questionandanswer`
--

CREATE TABLE `questionandanswer` (
  `id` int(11) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `question3` varchar(255) NOT NULL,
  `question4` varchar(255) NOT NULL,
  `question5` varchar(255) NOT NULL,
  `question6` varchar(255) NOT NULL,
  `question7` varchar(255) NOT NULL,
  `question8` varchar(255) NOT NULL,
  `question9` varchar(255) NOT NULL,
  `question10` varchar(255) NOT NULL,
  `answerquestion1` varchar(255) NOT NULL,
  `answerquestion2` varchar(255) NOT NULL,
  `answerquestion3` varchar(255) NOT NULL,
  `answerquestion4` varchar(255) NOT NULL,
  `answerquestion5` varchar(255) NOT NULL,
  `answerquestion6` varchar(255) NOT NULL,
  `answerquestion7` varchar(255) NOT NULL,
  `answerquestion8` varchar(255) NOT NULL,
  `answerquestion9` varchar(255) NOT NULL,
  `answerquestion10` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionandanswer`
--

INSERT INTO `questionandanswer` (`id`, `fulname`, `phonenumber`, `email`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `answerquestion1`, `answerquestion2`, `answerquestion3`, `answerquestion4`, `answerquestion5`, `answerquestion6`, `answerquestion7`, `answerquestion8`, `answerquestion9`, `answerquestion10`, `date`) VALUES
(14, 'simon', '0810432165', 'nseobong7@gmail.com', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', '2020-07-24'),
(15, 'Emem Ekong', '0810432165', 'nseobong7@gmail.com', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', '2020-07-24'),
(17, 'Emem Ekong', '0810432165', 'nseobong7@gmail.com', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', '2020-07-24'),
(18, 'Emem Ekong', '0810432165', 'nseobong7@gmail.com', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', '2020-07-24'),
(19, 'Emem Ekong', '0810432165', 'nseobong7@gmail.com', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'what is the meaning of php', 'Hypertext ', 'Hypertext ', 'Hypertext', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', 'Hypertext ', '2020-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `services_table`
--

CREATE TABLE `services_table` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_table`
--

INSERT INTO `services_table` (`id`, `email`, `fulname`, `phone`, `message`, `date`) VALUES
(1, 'nseobong7@gmail.com', 'simon', '08125296803', 'fffff', '2020-07-07'),
(2, 'nseobong7@gmail.com', 'simon', '08125296803', 'fg', '2020-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `whatts` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `othername`, `face`, `tweet`, `insta`, `whatts`, `email`, `designation`, `account`, `images`, `bankname`, `date`) VALUES
(5, 'simon', 'Joseph Akpan', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', 'simonudo74@gmail.com', 'Web Developer', '0037863172', 'uploads/image/2020-07-13-19-04-23_5f0c94170c97b.jpg', '', '2020-07-13'),
(6, 'simon udo', 'Joseph Akpan', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', 'nseobong7@gmail.com', 'Web Developer', '0037863172', 'uploads/image/2020-07-13-19-07-29_5f0c94d1375f5.jpg', 'Union Bank', '2020-07-13'),
(7, 'simon', 'Udo', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', 'nseobong7@gmail.com', 'Web Developer', '0037863172', 'uploads/image/2020-07-13-21-39-09_5f0cb85dd6bd4.jpg', 'Union Bank', '2020-07-13'),
(8, 'Uwakmfon', 'Joseph Akpank', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', 'nseobong7@gmail.com', 'Web Developer', '0037863172', 'uploads/image/2020-07-17-11-53-27_5f117517652dd.png', 'Union Bank', '2020-07-17'),
(10, 'uwak', 'Jameson', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', 'nseobong7@gmail.com', 'Web Developer', '0037863172', 'uploads/image/2020-07-25-10-53-15_5f1bf2fb85c25.jpg', 'Union Bank', '2020-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `studentusername` varchar(255) NOT NULL,
  `studentpassword` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `othername`, `email`, `phone`, `course_name`, `message`, `studentusername`, `studentpassword`, `images`, `date`) VALUES
(4, 'simon udo', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'okon', '', '', 'uploads/image/2020-07-26-14-59-32_5f1d7e34560ea.jpg', '2020-07-13'),
(5, 'simon udo', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'okon', '', '', 'uploads/image/2020-07-26-15-22-51_5f1d83abbc3d4.jpg', '2020-07-13'),
(6, 'simon udo', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'okon', '', '', 'uploads/image/2020-07-26-15-45-17_5f1d88edd5875.png', '2020-07-13'),
(7, 'simon udo', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'okon', '', '', 'uploads/image/2020-07-26-15-45-34_5f1d88fef1998.png', '2020-07-13'),
(12, 'simon', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'jnn', 'nm', '$2y$10$ldhHeRDDF23f4sQqPAinR.QvigsdMjkhFerzqtAfd1ESZL/IKj/VG', 'uploads/image/2020-07-26-15-45-51_5f1d890fd9aa7.png', '2020-07-25'),
(16, 'simon', 'jonah', 'nseobong7@gmail.com', '08125296803', 'web site', 'home', 'don', '$2y$10$14C3a93VXTGYz/3DaD4JW.t2Y/I0sBCU0ljrWSqN2W2P/Z50eBaRi', 'uploads/image/2020-07-26-16-11-50_5f1d8f26476e2.png', '2020-07-26'),
(19, 'simon', 'Joseph Akpan', 'nseobong7@gmail.com', '08125296803', 'web site', 'pp', 'pp', '$2y$10$dj3OcnuiYm/s4Zphi8pvzuz51X1NcMNoJcZJ2Gi05WhkPxRPgMkTi', 'uploads/image/2020-07-26-16-13-19_5f1d8f7fd1580.png', '2020-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `insta` text NOT NULL,
  `whatts` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `firstname`, `othername`, `face`, `tweet`, `email`, `designation`, `images`, `insta`, `whatts`, `date`) VALUES
(4, 'Mathew ', 'Samson Bamidele', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'simonudo74@gmail.coms', 'Chief Technical Officer CTO/ Software Engineer', 'uploads/image/2020-07-27-11-50-17_5f1ea35988e01.jpg', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', '2020-07-07'),
(8, 'simon udo', 'jonah', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', '08108841374', 'Web Developer', 'uploads/image/2020-07-08-14-22-38_5f05ba8eddb3f.jpg', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', '2020-07-08'),
(9, 'Bamisoft', 'Joseph Akpan', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'simonudo74@gmail.com', 'Js developer ', 'uploads/image/2020-07-08-16-06-24_5f05d2e0cc93b.jpg', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', '2020-07-08'),
(10, 'simon', 'jonah', 'http://localhost/brixtonn.edu.ng/brixttonadmin/team/uploadloadteam', 'http://localhost/odbs.com/odbsadmin/team', 'simonudo74@gmail.com', 'Fullstack Web Developer', 'uploads/image/2020-07-17-10-46-18_5f11655a0235b.png', 'http://localhost/odbs.com/odbsadmin/team', 'http://localhost/odbs.com/odbsadmin/team', '2020-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `course_title`, `message`, `date`) VALUES
(3, 'Website Development', 'Building responsive website applications base on new technology and updating every webdite developed to a new technology in vouge with your own ideas you want us to build for you.', '2020-07-11 13:55:03'),
(4, 'Web Development', 'uo', '2020-07-11 13:55:08'),
(5, 'Logo Design', 'you', '2020-07-11 13:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'odbs', 'check', '0000-00-00'),
(2, 'simon', '$2y$10$Luqk9klpefXsN8U.lXjLh.pMEKM9XYYPUNsX2fLR/PJw3PjPdlJPu', '2020-07-16'),
(3, 'idara', '2', '2020-07-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answertest`
--
ALTER TABLE `answertest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odbscontact`
--
ALTER TABLE `odbscontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionandanswer`
--
ALTER TABLE `questionandanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_table`
--
ALTER TABLE `services_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
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
-- AUTO_INCREMENT for table `answertest`
--
ALTER TABLE `answertest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `odbscontact`
--
ALTER TABLE `odbscontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questionandanswer`
--
ALTER TABLE `questionandanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services_table`
--
ALTER TABLE `services_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
