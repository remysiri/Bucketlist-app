-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 03 juin 2019 à 10:32
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `int2_bucket`
--

-- --------------------------------------------------------

--
-- Structure de la table `Activities`
--

CREATE TABLE `Activities` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test', 'test', 0, '2019-06-02 17:50:31', '2019-06-02 17:50:31', '2019-06-02 17:50:31'),
(2, 'test', 'test', 'test', 0, '2019-06-02 17:51:26', '2019-06-02 17:51:26', '2019-06-02 17:51:26'),
(3, 'test2', 'test2', 'test2', 0, '2019-06-03 10:23:37', '2019-06-03 10:23:37', '2019-06-03 10:23:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Activities`
--
ALTER TABLE `Activities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Activities`
--
ALTER TABLE `Activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
