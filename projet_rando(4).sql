-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 juin 2020 à 16:18
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_rando`
--

-- --------------------------------------------------------

--
-- Structure de la table `excursions`
--

CREATE TABLE `excursions` (
  `ID` int(9) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nbre_max` int(5) NOT NULL,
  `prix` float NOT NULL,
  `lieu_debut` int(9) NOT NULL,
  `lieu_fin` int(9) NOT NULL,
  `nbre_guides` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `excursions`
--

INSERT INTO `excursions` (`ID`, `nom`, `date_debut`, `date_fin`, `nbre_max`, `prix`, `lieu_debut`, `lieu_fin`, `nbre_guides`) VALUES
(3, 'Randonnée du test', '2020-06-10', '2020-06-25', 8, 49.5, 2, 3, 1),
(4, 'Rando du deuxième test', '2020-06-17', '2020-06-25', 9, 35.5, 5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `guides`
--

CREATE TABLE `guides` (
  `ID` int(9) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `guides`
--

INSERT INTO `guides` (`ID`, `nom`, `prenom`, `tel`) VALUES
(1, 'Edward', 'Johnston', '05 98 56 85 34'),
(2, 'Kibo', 'Hopkins', '04 58 31 60 60'),
(3, 'Tad', 'Mathews', '04 47 43 76 22'),
(4, 'Idona', 'Peterson', '07 20 89 16 50'),
(5, 'Ciara', 'Garrett', '01 20 85 80 34'),
(6, 'Zena', 'Kerr', '06 68 10 05 42'),
(7, 'Francis', 'Russo', '09 93 12 95 08'),
(8, 'Athena', 'Oneill', '08 57 15 28 03'),
(9, 'Rudyard', 'Oneill', '09 25 82 79 53'),
(10, 'Philip', 'Talley', '02 39 48 06 02');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `ID` int(9) NOT NULL,
  `randonneur_id` int(9) NOT NULL,
  `excursion_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `passwords`
--

CREATE TABLE `passwords` (
  `ID` int(9) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `passwords`
--

INSERT INTO `passwords` (`ID`, `user`, `password`) VALUES
(1, 'admin', 'pass'),
(2, 'jeremy', 'lejee');

-- --------------------------------------------------------

--
-- Structure de la table `planning_guides`
--

CREATE TABLE `planning_guides` (
  `ID` int(9) NOT NULL,
  `guide_id` int(9) NOT NULL,
  `excursion_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `randonneurs`
--

CREATE TABLE `randonneurs` (
  `ID` int(9) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codepostal` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `randonneurs`
--

INSERT INTO `randonneurs` (`ID`, `nom`, `prenom`, `tel`, `mail`, `adresse`, `ville`, `codepostal`, `pays`) VALUES
(1, 'Perry', 'Ochoa', '06 70 97 08 47', 'lobortis.risus@risusDonecegestas.net', 'CP 484, 6432 Elit, Avenue', 'Rio Verde', '76960-56109', 'Comoros'),
(2, 'Kamal', 'Graham', '08 72 97 72 44', 'quam.dignissim.pharetra@a.ca', '9870 Vitae Avenue', 'Yellowknife', '19957', 'Djibouti'),
(3, 'Tatum', 'Lynch', '01 13 12 18 41', 'sem@nonmagnaNam.ca', 'Appartement 783-9063 Amet Impasse', 'Ficulle', 'Z6624', 'Djibouti'),
(4, 'Donna', 'Dale', '07 44 80 43 84', 'semper.auctor@penatibusetmagnis.com', '369-7047 Morbi Impasse', 'Vanier', '70628-972', 'Ghana'),
(5, 'Hoyt', 'Day', '08 05 13 04 16', 'fringilla.porttitor@sempereratin.ca', '701-4054 Luctus Avenue', 'Groenlo', '68722', 'Peru'),
(6, 'Fletcher', 'Miller', '08 76 21 74 38', 'eros.turpis.non@imperdietullamcorper.ca', 'Appartement 715-2051 Morbi Avenue', 'LamontzŽe', '30192-62778', 'Anguilla'),
(7, 'Brynn', 'Hanson', '01 29 91 11 49', 'Suspendisse.aliquet.molestie@velitPellentesque.ca', '6360 Vivamus Av.', 'Zwickau', '058602', 'Singapore'),
(8, 'Anika', 'Benjamin', '07 89 29 82 20', 'eleifend.nec@tinciduntnunc.edu', '520-5063 Sapien Av.', 'Kotlas', 'Z1630', 'Somalia'),
(9, 'Arthur', 'Flores', '01 60 44 11 14', 'Nullam.scelerisque.neque@estMauriseu.net', '690-781 Proin Route', 'Durness', '25121', 'Hungary'),
(10, 'Giacomo', 'Galloway', '01 15 12 09 09', 'et@odio.org', '794-2314 Dolor Impasse', 'Bhavnagar', 'P1X 1J3', 'Virgin Islands, United States'),
(11, 'Kenneth', 'Mcknight', '09 62 85 53 60', 'Morbi.sit.amet@mauriselit.edu', '746-7382 Non, Chemin', 'Ilbono', '24592', 'Seychelles'),
(12, 'Amena', 'Lawrence', '05 55 98 48 72', 'erat.semper.rutrum@ipsumnon.co.uk', '186-673 Bibendum Rue', 'Minto', '4337 XS', 'Tuvalu'),
(13, 'Christian', 'Turner', '03 07 74 40 93', 'lectus.quis.massa@malesuadamalesuada.ca', 'CP 304, 857 Et Impasse', 'Serrata', '60110', 'Seychelles'),
(14, 'Callum', 'Hoover', '08 51 09 67 56', 'pede@enimnisl.edu', '737-9335 Natoque Rd.', 'Boninne', '2820', 'Aruba'),
(15, 'Karleigh', 'Morse', '02 97 51 66 28', 'mollis.non.cursus@consequatlectussit.com', 'Appartement 126-7148 Pede, Avenue', 'Rae-Edzo', '19364', 'Kenya'),
(16, 'Grant', 'Fields', '04 52 17 10 71', 'Phasellus.nulla@insodales.org', '400-5218 Maecenas Ave', 'Mazy', '98162', 'Dominica'),
(17, 'Kiona', 'Bonner', '04 15 33 47 80', 'molestie.tortor.nibh@auctorullamcorper.org', 'CP 261, 9528 Ut Chemin', 'Puri', '11214', 'Namibia'),
(18, 'Donovan', 'Cox', '01 31 70 67 92', 'tellus.justo@enimsit.com', '2946 Risus Impasse', 'San Giovanni Suergiu', '7741', 'Myanmar'),
(19, 'Azalia', 'White', '07 68 82 80 69', 'dolor@odio.co.uk', '1683 Odio. Chemin', 'Tufo', 'E17 1OE', 'Zambia'),
(20, 'Alan', 'Payne', '08 42 61 21 67', 'Quisque.varius@rutrumurnanec.com', 'Appartement 770-4627 Erat, Rd.', 'Dieppe', '9167 HQ', 'Cuba');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `ID` int(9) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`ID`, `Nom`) VALUES
(1, 'Nord'),
(2, 'Le Rif'),
(3, 'Le Moyen Atlas'),
(4, 'Le Haut Atlas'),
(5, 'Les Oasis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `excursions`
--
ALTER TABLE `excursions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `lieu_debut` (`lieu_debut`),
  ADD KEY `lieu_fin` (`lieu_fin`);

--
-- Index pour la table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `randonneur_id` (`randonneur_id`),
  ADD KEY `excursion_id` (`excursion_id`);

--
-- Index pour la table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `planning_guides`
--
ALTER TABLE `planning_guides`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `guide_id` (`guide_id`),
  ADD KEY `excursion_id` (`excursion_id`);

--
-- Index pour la table `randonneurs`
--
ALTER TABLE `randonneurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `excursions`
--
ALTER TABLE `excursions`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `guides`
--
ALTER TABLE `guides`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `planning_guides`
--
ALTER TABLE `planning_guides`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `randonneurs`
--
ALTER TABLE `randonneurs`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `excursions`
--
ALTER TABLE `excursions`
  ADD CONSTRAINT `excursions_ibfk_1` FOREIGN KEY (`lieu_debut`) REFERENCES `region` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `excursions_ibfk_2` FOREIGN KEY (`lieu_fin`) REFERENCES `region` (`ID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`randonneur_id`) REFERENCES `randonneurs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`excursion_id`) REFERENCES `excursions` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `planning_guides`
--
ALTER TABLE `planning_guides`
  ADD CONSTRAINT `planning_guides_ibfk_1` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planning_guides_ibfk_2` FOREIGN KEY (`excursion_id`) REFERENCES `excursions` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
