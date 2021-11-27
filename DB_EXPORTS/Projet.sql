-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 27 nov. 2021 à 16:59
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
    `email` varchar(40) NOT NULL,
    `username` int(40) NOT NULL,
    `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Feeds`
--

CREATE TABLE `Feeds` (
    `url` varchar(100) NOT NULL,
    `title` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `News`
--

CREATE TABLE `News` (
    `lien` varchar(100) NOT NULL,
    `site` varchar(20) NOT NULL,
    `titre` varchar(75) NOT NULL,
    `dateGet` date NOT NULL,
    `isfrench` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `Feeds`
--
ALTER TABLE `Feeds`
  ADD PRIMARY KEY (`url`);

--
-- Index pour la table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
