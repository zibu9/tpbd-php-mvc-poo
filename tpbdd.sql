-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 mars 2023 à 12:43
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `chiens`
--

CREATE TABLE `chiens` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `race` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_deces` date DEFAULT NULL,
  `numero_personne` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chiens`
--

INSERT INTO `chiens` (`matricule`, `nom`, `sexe`, `race`, `date_naissance`, `date_deces`, `numero_personne`, `created_at`) VALUES
(1, 'Rocky', 'M', 'Malinois', '2020-05-21', NULL, 1, '2022-02-21 20:12:32'),
(2, 'Stella', 'F', 'Pat patrouille', '2021-05-21', NULL, 1, '2022-02-21 20:12:32'),
(19, 'Zuma', 'M', 'Berger Allemand', '2021-03-02', NULL, NULL, '2022-03-02 16:28:28');

-- --------------------------------------------------------

--
-- Structure de la table `chien_personne`
--

CREATE TABLE `chien_personne` (
  `id` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `chien_id` int(11) DEFAULT NULL,
  `date_acquisition` date NOT NULL,
  `date_cess` date DEFAULT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chien_personne`
--

INSERT INTO `chien_personne` (`id`, `personne_id`, `chien_id`, `date_acquisition`, `date_cess`, `prix`) VALUES
(1, 2, 1, '2022-02-21', NULL, 500),
(7, 2, 19, '2022-03-02', NULL, 800);

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` int(11) NOT NULL,
  `date_concours` date NOT NULL,
  `ville` text NOT NULL,
  `type_prix` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`id`, `date_concours`, `ville`, `type_prix`, `created_at`) VALUES
(1, '2022-03-03', 'Marseille', 'gold', '2022-03-03 12:25:07');

-- --------------------------------------------------------

--
-- Structure de la table `parente`
--

CREATE TABLE `parente` (
  `id` int(11) NOT NULL,
  `chien` int(11) DEFAULT NULL,
  `chien_parente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parente`
--

INSERT INTO `parente` (`id`, `chien`, `chien_parente`) VALUES
(1, 1, 2),
(11, 19, 2);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `numero` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` char(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` text NOT NULL,
  `tel` varchar(13) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`numero`, `nom`, `postnom`, `prenom`, `sexe`, `date_naissance`, `adresse`, `tel`, `created_at`) VALUES
(1, 'Kabuya', 'Nsungula', 'Junior', 'M', '2012-07-28', 'N°23,Av/Lukaya Q/Mazamba C/Mont-Ngafula', '0821657202', '2022-02-21 14:36:58'),
(2, 'Zibu', 'Kans', 'International', 'M', '2022-02-21', 'N°23,Av/Lukaya Q/Mazamba C/Mont-Ngafula', '0852867804', '2022-02-21 14:38:58'),
(4, 'Kabuya', 'Kabuya', 'Junior', 'M', '2022-02-22', 'N°5 rue Beaujoire, Nantes', '+243821657202', '2022-02-22 10:23:34');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'assofra', '$2y$10$DLLPOe0FyFR138xTfDLWxu1TlQ7FiMQGYgw77NZmbaj5eKfqZmkse', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vue_naitre`
--

CREATE TABLE `vue_naitre` (
  `id` int(11) NOT NULL,
  `chien_id` int(11) DEFAULT NULL,
  `personne_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vue_naitre`
--

INSERT INTO `vue_naitre` (`id`, `chien_id`, `personne_id`) VALUES
(1, 1, 1),
(6, 19, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chiens`
--
ALTER TABLE `chiens`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `chien_personne`
--
ALTER TABLE `chien_personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personne_id_foreign` (`personne_id`),
  ADD KEY `chien_id_foreign` (`chien_id`);

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parente`
--
ALTER TABLE `parente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chien_id` (`chien`),
  ADD KEY `chien_parente_id` (`chien_parente`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `vue_naitre`
--
ALTER TABLE `vue_naitre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personne_foreign_id` (`personne_id`),
  ADD KEY `chien_foreign_id` (`chien_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chiens`
--
ALTER TABLE `chiens`
  MODIFY `matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `chien_personne`
--
ALTER TABLE `chien_personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `parente`
--
ALTER TABLE `parente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vue_naitre`
--
ALTER TABLE `vue_naitre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chiens`
--
ALTER TABLE `chiens`
  ADD CONSTRAINT `chien_personne_numero_foreign` FOREIGN KEY (`numero_personne`) REFERENCES `personnes` (`numero`);

--
-- Contraintes pour la table `chien_personne`
--
ALTER TABLE `chien_personne`
  ADD CONSTRAINT `chien_id_foreign` FOREIGN KEY (`chien_id`) REFERENCES `chiens` (`matricule`),
  ADD CONSTRAINT `personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`numero`);

--
-- Contraintes pour la table `parente`
--
ALTER TABLE `parente`
  ADD CONSTRAINT `chien_id` FOREIGN KEY (`chien`) REFERENCES `chiens` (`matricule`),
  ADD CONSTRAINT `chien_parente_id` FOREIGN KEY (`chien_parente`) REFERENCES `chiens` (`matricule`);

--
-- Contraintes pour la table `vue_naitre`
--
ALTER TABLE `vue_naitre`
  ADD CONSTRAINT `chien_foreign_id` FOREIGN KEY (`chien_id`) REFERENCES `chiens` (`matricule`),
  ADD CONSTRAINT `personne_foreign_id` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
