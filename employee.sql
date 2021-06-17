-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 02:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--



CREATE TABLE `EMPLOYEE`
(`Fname` VARCHAR(15) NOT NULL,
`Lname` VARCHAR(15) NOT NULL,
`Ssn` CHAR(9) NOT NULL PRIMARY KEY,
`Bdate` DATE,
`Address` VARCHAR(30),
`Salary` DECIMAL(10,2),
`Super_ssn` CHAR(9),
`Dno` INT NOT NULL,
`email` varchar(50) NOT NULL,
`password` varchar(20) NOT NULL);
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE department(
dname VARCHAR(15) NOT NULL,
dnumber INT NOT NULL PRIMARY KEY,
mgr_ssn CHAR(9) NOT NULL,
mgr_start_date DATE,
FOREIGN KEY(Mgr_ssn) REFERENCES employee(Ssn));


CREATE TABLE PROJECT(
Pname VARCHAR(15) NOT NULL ,
Pnumber INT NOT NULL primary key,
Plocation VARCHAR(15),
Dnum INT NOT NULL);


CREATE TABLE `logtable`
(
`emp_ssn` int ,
`table_accessed` varchar(20),
`date_of_access` datetime,
`type_trigger` varchar(20)
);
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- INSERT INTO `employee` (`Fname`, `Lname`, `Ssn`, `Bdate`, `Address`, `Salary`, `Super_ssn`, `Dno`, `email`) VALUES ('vikas', 'varak', '333445555', '2021-04-17', 'nehrul', '40000', '888665555', '4', 'grumm@gmail.com');


-- INSERT INTO `employee` (`Fname`,`Lname`,`Ssn`,`Bdate`,`Address`,`salary`,`Super_ssn`,`Dno`,`email`) VALUES ('Alicia', 'Zelaya', '999887777', '1968-01-19', '3321 Castle, Spring, TX', '25000', '987654321', '4','phela3@gmail.com');

INSERT INTO `employee` (`Fname`,`Lname`,`Ssn`,`Bdate`,`Address`,`salary`,`Super_ssn`,`Dno`,`email`) VALUES ('nayan', 'shingare', '888665555', '1978-01-19', 'mumbai, Spring, TX', '80000', '', '4','nayanshingare93@gmail.com');




--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
-- ALTER TABLE `employee`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
-- ALTER TABLE `employee`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TRIGGER `before_insert` BEFORE INSERT ON `employee` FOR EACH ROW INSERT INTO logtable VALUES(NULL,NEW.Ssn,'inserted',NOW());

CREATE TRIGGER `before_update` BEFORE UPDATE ON `employee` FOR EACH ROW INSERT INTO logtable VALUES(NULL,NEW.Ssn,"before_updated",NOW());

CREATE TRIGGER `before_delete` BEFORE DELETE ON `employee` FOR EACH ROW INSERT INTO logtable VALUES(null,OLD.Ssn,"before_deleted",NOW());