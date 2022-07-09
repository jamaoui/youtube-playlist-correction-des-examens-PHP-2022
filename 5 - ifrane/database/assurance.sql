-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 07:08 PM
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
-- Database: `assurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `assure`
--

CREATE TABLE `assure` (
  `matricule` int(11) NOT NULL,
  `nom_assu` varchar(50) NOT NULL,
  `prenom_assu` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `nb_enfant` int(11) NOT NULL,
  `situation_familliale` varchar(100) NOT NULL,
  `num_entreprise` int(11) NOT NULL,
  `total_remb` float NOT NULL,
  `date_deces` date DEFAULT NULL,
  `mot_depass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assure`
--

INSERT INTO `assure` (`matricule`, `nom_assu`, `prenom_assu`, `date_naissance`, `nb_enfant`, `situation_familliale`, `num_entreprise`, `total_remb`, `date_deces`, `mot_depass`) VALUES
(1, 'Jamaoui', 'Mouad', '1993-07-22', 1, 'Marié', 1, 300, '0000-00-00', '123456'),
(2, 'Jamaoui', 'aymane', '2004-07-14', 0, 'Célibataire', 2, 0, NULL, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `dossier`
--

CREATE TABLE `dossier` (
  `numdossier` int(11) NOT NULL,
  `datedepot` date NOT NULL,
  `montant_remoboursement` float NOT NULL,
  `date_traitement` date NOT NULL,
  `lien_malade` varchar(50) NOT NULL,
  `matricule` int(11) NOT NULL,
  `num_maladie` int(11) NOT NULL,
  `total_dossier` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dossier`
--

INSERT INTO `dossier` (`numdossier`, `datedepot`, `montant_remoboursement`, `date_traitement`, `lien_malade`, `matricule`, `num_maladie`, `total_dossier`) VALUES
(1, '2022-07-04', 200, '2022-07-07', 'Conjoint', 2, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `num_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(100) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `nombre_employe` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`num_entreprise`, `nom_entreprise`, `adresse`, `telephone`, `nombre_employe`, `email`) VALUES
(1, 'OFPPT', 'CFYM RABAT', '054684684864', 40, 'ofppt@ofppt.ma'),
(2, 'DEV\'S EMPIRE', 'TEMARA', '05468468', 40, 'contact@devsempire.ma');

-- --------------------------------------------------------

--
-- Table structure for table `maladie`
--

CREATE TABLE `maladie` (
  `num_maladie` int(11) NOT NULL,
  `designation_maladie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maladie`
--

INSERT INTO `maladie` (`num_maladie`, `designation_maladie`) VALUES
(1, 'Corona'),
(2, 'Ebola');

-- --------------------------------------------------------

--
-- Table structure for table `rubrique`
--

CREATE TABLE `rubrique` (
  `numrubrique` int(11) NOT NULL,
  `nom_rubrique` varchar(50) NOT NULL,
  `numdossier` int(11) NOT NULL,
  `montant_rubrique` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rubrique`
--

INSERT INTO `rubrique` (`numrubrique`, `nom_rubrique`, `numdossier`, `montant_rubrique`) VALUES
(1, 'Rubrique 1', 1, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assure`
--
ALTER TABLE `assure`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`numdossier`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`num_entreprise`);

--
-- Indexes for table `maladie`
--
ALTER TABLE `maladie`
  ADD PRIMARY KEY (`num_maladie`);

--
-- Indexes for table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`numrubrique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assure`
--
ALTER TABLE `assure`
  MODIFY `matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `num_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maladie`
--
ALTER TABLE `maladie`
  MODIFY `num_maladie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `numrubrique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
