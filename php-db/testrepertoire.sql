-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 juil. 2022 à 06:44
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testrepertoire`
--
CREATE DATABASE IF NOT EXISTS `testrepertoire` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `testrepertoire`;

-- --------------------------------------------------------

--
-- Structure de la table `repertoire`
--

CREATE TABLE `repertoire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `repertoire`
--

INSERT INTO `repertoire` (`id`, `nom`, `prenom`, `adresse`, `age`) VALUES
(1, 'LESUR', 'Rudy', 'Douai', 41),
(2, 'PARKER', 'Peter', 'New York', 25),
(3, 'WAYNE', 'Bruce', 'Gotham City', 50),
(4, 'GREY', 'Jean', 'Xavier School', 35),
(5, 'KILE', 'Selina', 'Gotham City', 30);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `repertoire`
--
ALTER TABLE `repertoire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
