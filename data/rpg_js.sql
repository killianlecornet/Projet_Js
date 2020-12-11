-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 déc. 2020 à 17:00
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rpg_js`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL COMMENT '1',
  `nom_classe` varchar(10) NOT NULL,
  `hp` int(11) NOT NULL,
  `max_hp` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `mp` varchar(50) NOT NULL,
  `max_mp` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `skill_1` varchar(200) NOT NULL,
  `esquive` int(11) NOT NULL,
  `vitesse` int(11) NOT NULL,
  `skill_2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom_classe`, `hp`, `max_hp`, `atk`, `mp`, `max_mp`, `def`, `skill_1`, `esquive`, `vitesse`, `skill_2`) VALUES
(1, 'Archer', 150, 150, 200, '300', 300, 100, 'flèche de feu', 50, 60, 'tir multiple'),
(2, 'Mage', 100, 100, 250, '500', 500, 200, 'boule de feu', 80, 90, 'éclair foudroyant'),
(3, 'Guerrier', 500, 500, 100, '150', 150, 300, 'épée de feu', 30, 10, 'épée de glace'),
(4, 'Centaure', 400, 400, 150, '250', 250, 200, 'sabot de fer', 40, 80, 'charge'),
(5, 'Gremlins', 75, 75, 300, '100', 100, 20, 'transformation démoniaque', 100, 95, 'hurlements');

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

CREATE TABLE `perso` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `pseudo`) VALUES
(1, 'suz');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
