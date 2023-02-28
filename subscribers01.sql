-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 28 fév. 2023 à 15:30
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `subscribers01`
--

-- --------------------------------------------------------

--
-- Structure de la table `interests`
--

CREATE TABLE `interests` (
  `id` int NOT NULL,
  `interests_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `interests`
--

INSERT INTO `interests` (`id`, `interests_label`) VALUES
(1, 'Peinture'),
(2, 'Sculpture'),
(3, 'Photographie'),
(4, 'Art contemporain'),
(5, 'Films'),
(6, 'Art Numérique'),
(7, 'Installations');

-- --------------------------------------------------------

--
-- Structure de la table `origins`
--

CREATE TABLE `origins` (
  `id` int NOT NULL,
  `originLabel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `origins`
--

INSERT INTO `origins` (`id`, `originLabel`) VALUES
(7, 'Un ami m\'en a parlé'),
(8, 'Recherche sur internet'),
(9, 'Publicité dans un magazine');

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `created_on` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `origine_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscribers_interests`
--

CREATE TABLE `subscribers_interests` (
  `subscribers_id` int NOT NULL,
  `interests_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fksubscribers` (`origine_id`);

--
-- Index pour la table `subscribers_interests`
--
ALTER TABLE `subscribers_interests`
  ADD KEY `fkinterests` (`interests_id`),
  ADD KEY `fksubscribersinterests` (`subscribers_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `fksubscribers` FOREIGN KEY (`origine_id`) REFERENCES `origins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `subscribers_interests`
--
ALTER TABLE `subscribers_interests`
  ADD CONSTRAINT `fkinterests` FOREIGN KEY (`interests_id`) REFERENCES `interests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fksubscribersinterests` FOREIGN KEY (`subscribers_id`) REFERENCES `subscribers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
