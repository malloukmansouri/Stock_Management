-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 08:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_gestiondestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `nom_com` varchar(50) DEFAULT NULL,
  `qte_com` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `date_com` date DEFAULT NULL,
  `id_resp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `nom_com`, `qte_com`, `type`, `date_com`, `id_resp`) VALUES
(1, 'marni', 2, 'breakfast', '0000-00-00', 1),
(2, 'Express', 4, 'Diner', '0000-00-00', 1),
(5, 'Rapide', 4, 'lunch', '2022-01-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entrepot`
--

CREATE TABLE `entrepot` (
  `num_entrepot` int(11) NOT NULL,
  `nom_entrepot` varchar(50) DEFAULT NULL,
  `id_resp` int(11) DEFAULT NULL,
  `id_prod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrepot`
--

INSERT INTO `entrepot` (`num_entrepot`, `nom_entrepot`, `id_resp`, `id_prod`) VALUES
(7, 'entrepot A', 1, 4),
(8, 'Entrepot B', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom_fournisseur` varchar(40) DEFAULT NULL,
  `prenom_fournisseur` varchar(50) DEFAULT NULL,
  `tel_fournisseur` int(11) DEFAULT NULL,
  `email_fournisseur` varchar(40) DEFAULT NULL,
  `adress_fournisseur` varchar(50) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `prenom_fournisseur`, `tel_fournisseur`, `email_fournisseur`, `adress_fournisseur`, `id_admin`) VALUES
(1, 'Badiri', 'Mehdi', 0909090909, 'mehdi@gmail.com', 'casablanca', NULL),
(2, 'Aghighay', 'Mohammed Amine', 09878992, 'amine@gmail.com', 'casablanca', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gerant`
--

CREATE TABLE `gerant` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(11) NOT NULL,
  `nom_prod` varchar(50) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `id_resp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_prod`, `nom_prod`, `id_commande`, `id_resp`) VALUES
(4, 'produit A', 2, 1),
(6, 'produit B', 2, 1),
(7, 'produit C', 1, 1),
(8, 'produit D', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responsabl_stock`
--

CREATE TABLE `responsabl_stock` (
  `id_resp` int(11) NOT NULL,
  `nom_resp` varchar(50) DEFAULT NULL,
  `prenom_resp` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsabl_stock`
--

INSERT INTO `responsabl_stock` (`id_resp`, `nom_resp`, `prenom_resp`, `tel`, `adresse`) VALUES
(1, 'Badiri', 'Mehdi', 73773737378, 'CASABLANCA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `PASSWORD`) VALUES
('responsable', 'abc123'),
('gerant', 'abc123'),
('magasinier', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `commande_ibfk_1` (`id_resp`);

--
-- Indexes for table `entrepot`
--
ALTER TABLE `entrepot`
  ADD PRIMARY KEY (`num_entrepot`),
  ADD KEY `id_resp` (`id_resp`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD KEY `fournisseur_ibfk_1` (`id_admin`);

--
-- Indexes for table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_resp` (`id_resp`);

--
-- Indexes for table `responsabl_stock`
--
ALTER TABLE `responsabl_stock`
  ADD PRIMARY KEY (`id_resp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `entrepot`
--
ALTER TABLE `entrepot`
  MODIFY `num_entrepot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `responsabl_stock`
--
ALTER TABLE `responsabl_stock`
  MODIFY `id_resp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_resp`) REFERENCES `responsabl_stock` (`id_resp`);

--
-- Constraints for table `entrepot`
--
ALTER TABLE `entrepot`
  ADD CONSTRAINT `entrepot_ibfk_1` FOREIGN KEY (`id_resp`) REFERENCES `responsabl_stock` (`id_resp`),
  ADD CONSTRAINT `entrepot_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`);

--
-- Constraints for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD CONSTRAINT `fournisseur_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `gerant` (`id_admin`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_resp`) REFERENCES `responsabl_stock` (`id_resp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
