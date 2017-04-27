-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 07:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE IF NOT EXISTS `tbadmin` (
`idAdmin` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`idAdmin`, `username`, `pass`, `email`) VALUES
(2, 'TriajiGunawan', '123456', 'triajiGunawan@mail.com'),
(3, 'amatir', 'amatir123', 'amatir@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbforum`
--

CREATE TABLE IF NOT EXISTS `tbforum` (
`idForum` int(4) NOT NULL,
  `idTopik` int(10) NOT NULL,
  `pesan` text NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbforum`
--

INSERT INTO `tbforum` (`idForum`, `idTopik`, `pesan`, `nama`) VALUES
(1, 2, 'asndkajsbdkajs', 'Triaji');

-- --------------------------------------------------------

--
-- Table structure for table `tbjenistopik`
--

CREATE TABLE IF NOT EXISTS `tbjenistopik` (
`idJenisTopik` int(3) NOT NULL,
  `jenisTopik` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjenistopik`
--

INSERT INTO `tbjenistopik` (`idJenisTopik`, `jenisTopik`) VALUES
(1, 'Film'),
(2, 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `tbtopik`
--

CREATE TABLE IF NOT EXISTS `tbtopik` (
`idTopik` int(10) NOT NULL,
  `idJenisTopik` int(3) NOT NULL,
  `idAdmin` int(3) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `berita` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtopik`
--

INSERT INTO `tbtopik` (`idTopik`, `idJenisTopik`, `idAdmin`, `judul`, `img`, `berita`) VALUES
(1, 1, 2, 'apa ya', 'upload/6957336-sniper-elite-v2-wallpaper-for-desktop.jpg', 'entahlah'),
(2, 2, 2, 'jkjbks', 'upload/76applecar-624x351.jpg', 'nsdkfjsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
 ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbforum`
--
ALTER TABLE `tbforum`
 ADD PRIMARY KEY (`idForum`), ADD KEY `idTopik` (`idTopik`);

--
-- Indexes for table `tbjenistopik`
--
ALTER TABLE `tbjenistopik`
 ADD PRIMARY KEY (`idJenisTopik`);

--
-- Indexes for table `tbtopik`
--
ALTER TABLE `tbtopik`
 ADD PRIMARY KEY (`idTopik`), ADD KEY `idJenisTopik` (`idJenisTopik`), ADD KEY `idAdmin` (`idAdmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbforum`
--
ALTER TABLE `tbforum`
MODIFY `idForum` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbjenistopik`
--
ALTER TABLE `tbjenistopik`
MODIFY `idJenisTopik` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbtopik`
--
ALTER TABLE `tbtopik`
MODIFY `idTopik` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbforum`
--
ALTER TABLE `tbforum`
ADD CONSTRAINT `tbforum_ibfk_1` FOREIGN KEY (`idTopik`) REFERENCES `tbtopik` (`idTopik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbtopik`
--
ALTER TABLE `tbtopik`
ADD CONSTRAINT `tbtopik_ibfk_1` FOREIGN KEY (`idJenisTopik`) REFERENCES `tbjenistopik` (`idJenisTopik`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `tbtopik_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `tbadmin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
