-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 18 Novembre 2020 à 18:42
-- Version du serveur :  5.7.32-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `actualites`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `dateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateModification` datetime DEFAULT CURRENT_TIMESTAMP,
  `categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` (`id`, `titre`, `contenu`, `dateCreation`, `dateModification`, `categorie`) VALUES
(9, 'Arabie saoudite : le hajj oui, mais pas pour tout le monde', 'Prévu du 28 juillet au 2 août, le grand pèlerinage de La Mecque se déroulera dans des conditions drastiques. Dans la crainte d’une aggravation de la pandémie de coronavirus, seul un nombre limité de Saoudiens et de résidents du royaume sont autorisés à l’effectuer.', '2020-11-12 21:42:42', '2020-11-12 21:42:42', 3),
(55, 'Au Royaume-Uni, une guerre des clans dans l’entourage de Boris Johnson', 'En pleine pandémie, le directeur de la communication du premier ministre a démissionné, sur pression des conseillers et conservateurs modérés, après avoir été pressenti pour diriger le cabinet de Downing Street.', '2020-11-12 01:08:39', '2020-11-12 01:08:39', 1),
(67, 'Au Maroc, la révolution des premières femmes adouls', '\nDes étudiantes au Maroc en 2012\nJusque-là réservée aux hommes, la profession d’adoul a récemment été ouverte aux femmes. Cet été, certaines de ces notaires de droit musulman ont terminé leur formation et prêté serment. Rencontre avec une première promotion pleine de promesses.', '2020-11-12 02:05:53', '2020-11-12 02:05:53', 3),
(68, 'annie', 'essai', '2020-11-12 02:08:28', '2020-11-12 02:08:28', 3),
(70, ' Ouverture des classes : Mamadou Talla satisfait du déroulement', 'Le ministre de l’Education nationale, Mamadou Talla, s’est félicité, ce jeudi, du bon déroulement de la rentrée scolaire sur l’ensemble du territoire, dans un contexte de pandémie du nouveau coronavirus.', '2020-11-12 05:15:33', '2020-11-12 05:15:33', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `libelle`) VALUES
(1, 'Politique'),
(2, 'Societe'),
(3, 'Religion');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(11) NOT NULL,
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `deleted` int(2) DEFAULT NULL,
  `statut` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `mdp`, `deleted`, `statut`) VALUES
(1, 'Diop', 'annie', 'editeur', 'passer', 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_article` (`categorie`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `fk_categorie_article` FOREIGN KEY (`categorie`) REFERENCES `Categorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
