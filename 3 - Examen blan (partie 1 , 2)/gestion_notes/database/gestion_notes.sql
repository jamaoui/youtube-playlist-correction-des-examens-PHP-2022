-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 10:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `Numcours` int(11) NOT NULL,
  `salle` int(2) NOT NULL,
  `Matriculeprofesseur` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `coef` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`Numcours`, `salle`, `Matriculeprofesseur`, `titre`, `coef`) VALUES
(2, 9, 2, 'PHP', 3),
(3, 11, 1, 'JAVASCRIPT', 3),
(4, 9, 3, 'PHP', 3);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `code_etudiant` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `date_naiss` date NOT NULL,
  `tel` varchar(25) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`code_etudiant`, `nom`, `date_naiss`, `tel`, `mail`, `pass`) VALUES
(1, 'jamaoui', '2000-09-15', '0684684864684', 'mouadjamaoui@gmail.com', '123456'),
(2, 'Salimi', '1900-01-06', '0684684864684', 'salimi@gmail.com', '123456'),
(3, 'Youssef tamda', '2000-09-26', '0684684864684', 'tamda@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `code_etudiant` int(11) NOT NULL,
  `numcours` int(11) NOT NULL,
  `date_examen` date DEFAULT NULL,
  `note` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`code_etudiant`, `numcours`, `date_examen`, `note`) VALUES
(1, 2, '2021-12-03', 40),
(1, 2, '2021-12-03', 40),
(2, 3, '2022-02-02', 15),
(2, 3, '2022-02-02', 15);

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `Matricule_Prof` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `tel` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`Matricule_Prof`, `nom`, `tel`) VALUES
(1, 'Hala', '06464846468468'),
(3, 'jamaoui', '0684684864684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`Numcours`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`code_etudiant`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD KEY `code_etudiant` (`code_etudiant`),
  ADD KEY `numcours` (`numcours`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`Matricule_Prof`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `Numcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `code_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `Matricule_Prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`code_etudiant`) REFERENCES `etudiant` (`code_etudiant`),
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`numcours`) REFERENCES `cours` (`Numcours`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
