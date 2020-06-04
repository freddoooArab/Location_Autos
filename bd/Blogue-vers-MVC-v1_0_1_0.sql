-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 07 mai 2020 à 19:58
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Blogue-vers-MVC-v1_0_1_0`
--

-- --------------------------------------------------------

--
-- Structure de la table `autos`
--

CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `autos`
--

INSERT INTO `autos` (`id`, `titre`, `sous_titre`, `utilisateur_id`, `date`, `texte`, `type`) VALUES
(1, 'Premier auto', 'Premier sous-titre', 1, '2020-01-24', 'Texte du premier auto', 'un type'),
(2, 'Deuxième auto', 'Deuxième sous-titre', 1, '2020-02-26', 'Texte du deuxième auto', 'un type'),
(3, 'auto ajouté', 's-t ajouté', 2, '2020-03-30', 'texte ajouté', 'PHP'),
(4, 'Sans reservation', 'Nouvelle fonctionnalité sans reservation', 2, '2020-04-12', 'Auto-test pour la nouvelle fonctionnalité indiquant qu\'un auto est sans reservation', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `prive` tinyint(1) NOT NULL DEFAULT 0,
  `efface` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `auto_id`, `date`, `auteur`, `titre`, `texte`, `prive`, `efface`) VALUES
(5, 1, '2020-01-24', 'Moi mod.', 'Mon reservation mod.', 'Voici mon reservation modifié', 0, 0),
(7, 1, '2020-01-29', 'Lui mod.', 'Son reservation mod.', 'Voici son reservation modifié', 0, 0),
(9, 2, '2020-01-30', 'Nous', 'notre reservation', 'Le texte de notre reservation', 1, 0),
(10, 2, '2020-02-01', 'Vous', 'Votre reservation', 'Le texte de votre reservation', 0, 1),
(23, 1, '2020-03-12', 'Toi', 'Ton reservation', 'Le texte de ton reservation', 1, 0),
(29, 2, '2020-03-12', 'a@b.c', 'Test de courriel', 'reservation d\'un auteur avec courriel', 1, 0),
(30, 3, '2020-03-30', 'a@b.c', 'courriel valide', 'test du courriel', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'ActionScript'),
(2, 'AppleScript'),
(3, 'Asp'),
(4, 'BASIC'),
(5, 'C'),
(6, 'C++'),
(7, 'Clojure'),
(8, 'COBOL'),
(9, 'ColdFusion'),
(10, 'Erlang'),
(11, 'Fortran'),
(12, 'Groovy'),
(13, 'Haskell'),
(14, 'Java'),
(15, 'JavaScript'),
(16, 'Lisp'),
(17, 'Perl'),
(18, 'PHP'),
(19, 'Python'),
(20, 'Ruby'),
(21, 'Scala'),
(22, 'Scheme');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'André Pilon', 'apilon', 'prof'),
(2, 'Administrateur', 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_id` (`auto_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`auto_id`) REFERENCES `autos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
