-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 09:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`ID`, `User`, `Pass`, `Email`) VALUES
(10, 'hansi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'erandikahansi95@gmail.com'),
(11, 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'hansierandika95@gmail.com'),
(13, 'hsi', 'f10e2821bbbea527ea02200352313bc059445190', 'erandikahansi95@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID` int(11) NOT NULL,
  `Question` varchar(150) NOT NULL,
  `Answer1` varchar(50) NOT NULL,
  `Answer2` varchar(50) NOT NULL,
  `Answer3` varchar(50) NOT NULL,
  `Answer4` varchar(50) NOT NULL,
  `CorrectAnswer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `Question`, `Answer1`, `Answer2`, `Answer3`, `Answer4`, `CorrectAnswer`) VALUES
(1, 'What is the range of data type short in Java?', 'A. -128 to 127', 'B. -32768 to 32767', 'C. -2147483648 to 2147483647', 'D. None of the mentioned', 'B'),
(2, 'An expression involving byte, int, and literal numbers is promoted to which of these?', 'A. int', 'B. long', 'C. byte', 'D. float', 'A'),
(3, 'Which of these operators is used to allocate memory to array variable in Java?', 'A. malloc', 'B. alloc', 'C. new', 'D. new malloc', 'C'),
(4, 'Which of these is necessary to specify at time of array initialization?', 'A. Row', 'B. Column', 'C. Both Row and Column', 'D. None of the mentioned', 'A'),
(5, 'Which of these access specifiers can be used for an interface?', 'A. Public', 'B. Protected', 'C. private', 'D. All of the mentioned', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
