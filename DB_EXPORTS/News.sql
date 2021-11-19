-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 19 nov. 2021 à 20:03
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

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
-- Structure de la table `News`
--
-- Création : ven. 19 nov. 2021 à 18:23
--

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `site` varchar(20) NOT NULL,
  `titre` varchar(75) NOT NULL,
  `dateGet` date NOT NULL,
  `lien` varchar(100) NOT NULL,
  `isfrench` tinyint(1) NOT NULL
) ;

--
-- Déchargement des données de la table `News`
--

INSERT INTO `News` (`id`, `site`, `titre`, `dateGet`, `lien`, `isfrench`) VALUES
(1, 'BREAK', 'desc', '1964-12-23', '', 0);

--
-- Index pour les tables déchargées
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
