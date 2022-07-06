-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 10:53 PM
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
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `cin` varchar(10) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `cin`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'XX15161184', 'JAMAOUI', 'Mouad', 'mouad.jamaoui@gmail.com', '123456'),
(3, ' BE649896', 'Salimi', 'salim', 'salimi@salim.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `immobilier`
--

CREATE TABLE `immobilier` (
  `id_immobilier` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `prixlocation` decimal(10,0) NOT NULL,
  `id_type` int(11) NOT NULL,
  `disponible` enum('oui','non') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immobilier`
--

INSERT INTO `immobilier` (`id_immobilier`, `titre`, `adresse`, `prixlocation`, `id_type`, `disponible`) VALUES
(1, 'Ryad sofia', 'Lissasfa casablanca', '250', 1, 'oui'),
(2, 'Ryad sofia', 'Lissasfa casablanca', '251', 1, 'oui');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `id_immobilier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_debut_location` date NOT NULL,
  `date_fin_location` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `id_immobilier`, `id_client`, `date_debut_location`, `date_fin_location`) VALUES
(1, 1, 1, '2022-06-27', '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `typebimmo`
--

CREATE TABLE `typebimmo` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typebimmo`
--

INSERT INTO `typebimmo` (`id_type`, `libelle`) VALUES
(1, 'Ryad'),
(2, 'Hotel'),
(3, 'Motel'),
(4, 'Villa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `immobilier`
--
ALTER TABLE `immobilier`
  ADD PRIMARY KEY (`id_immobilier`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `typebimmo`
--
ALTER TABLE `typebimmo`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `immobilier`
--
ALTER TABLE `immobilier`
  MODIFY `id_immobilier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typebimmo`
--
ALTER TABLE `typebimmo`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
