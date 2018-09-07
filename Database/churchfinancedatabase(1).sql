-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Août 2018 à 17:15
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `churchfinancedatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `localisation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `profession` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'individuel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`, `localisation`, `profession`, `type`) VALUES
(1, 'Actor 1', 'Location of Actor 1', 'Profession of Actor 1', ''),
(2, 'Actor 2', 'Location of Actor 2', 'Profession of Actor 2', 'Group');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `id_categorie_parent` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `id_categorie_parent`, `nom`, `description`) VALUES
(1, 1, 'Alms', 'Description of Alms Category'),
(2, 1, 'Sunday School Alms', 'Description of sunday school alms'),
(3, 1, 'Week day masses', 'Description of week day masses'),
(4, 1, 'Baptism Masses', 'Description of baptism masses'),
(5, 1, 'Wedding Masses', 'Description of weeding masses'),
(6, 1, 'Baby presentation', 'Description of baby presentation'),
(7, 1, 'Christian contribution cards', 'Description of christian contribution cards'),
(8, 1, 'Tithes', 'Description of tithes category'),
(9, 1, 'Special Feast days contributions', 'Description of special feast days contributions categry'),
(10, 1, 'Funeral Masses', 'Description of funeral masses'),
(11, 1, 'stoll Fee', 'Description of Stoll Fee category'),
(12, 1, 'Sales of Sunday Newsletter', 'Description of sales of sunday newsletter'),
(13, 2, 'Thanksgiving by Families', 'Description of Thanksgiving by fmilies'),
(14, 2, 'Thanksgiving by names', 'Description of Thanksgiving by names'),
(15, 3, 'Contributions for Holy Land an Caritas', 'Description of contributions for holy land and Caritas'),
(16, 3, 'Cont towards Feast Day celebration', 'Description of cont towards feast day celebration'),
(17, 3, 'Cont on feast day by cultural groups', 'Description of cont on feast day by cultural groups'),
(18, 3, 'Other incom (proceeds from sales)', 'Description of other income category'),
(19, 4, 'Projects', 'Description of projects category'),
(20, 4, 'Archidiocese contribution', 'Description of archidiocese contribution'),
(21, 5, 'Clergy', 'Description of clergy category'),
(22, 1, 'Staffing salary', 'Description of staffing salary'),
(23, 5, 'setting up of Fathers reffectory', 'Description of setting up of fathers reffectory category'),
(24, 6, 'Electricity Bill', 'Description of electricity bill category'),
(25, 6, 'Water Bill', 'Description of water bill category'),
(26, 6, 'Receptions', 'Description of receptions category'),
(27, 6, 'Electrical maintenance & Generator care', 'Description of electrical maintenance & generator care'),
(28, 6, 'Representation', 'Description of representation category'),
(29, 6, 'Liturgy', 'Description of liturgy category'),
(30, 6, 'Stationary', 'Description of stationary category'),
(31, 6, 'Office equipements and maintenance', 'Description of Office equipements and maintenance category'),
(32, 6, 'Compound care', 'Description of compound care category'),
(33, 6, 'Caritas and other donations', 'Description of caritas and other donations category'),
(34, 6, 'Admin expences', 'Description of admin expences category'),
(35, 5, 'test', 'description test');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_parent`
--

CREATE TABLE `categorie_parent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `categorie_parent`
--

INSERT INTO `categorie_parent` (`id`, `nom`, `description`, `type`) VALUES
(1, 'Receipts', 'Description of receipts category', 'entree'),
(2, 'Thanksgiving Receipts', 'Description of Thanksgiving receipts category', 'entree'),
(3, 'Other Receipts', 'Description of Other Receipts', 'entree'),
(4, 'Payment', 'Description of payments category', 'sortie'),
(5, 'Personnal Expense', 'Description of personnal expense category', 'sortie'),
(6, 'Operationnal Expences', 'Description of Operationnal Expences', 'sortie');

-- --------------------------------------------------------

--
-- Structure de la table `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `degree`
--

INSERT INTO `degree` (`id`, `nom`) VALUES
(1, 'Degree 1'),
(2, 'Degree 2');

-- --------------------------------------------------------

--
-- Structure de la table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_name` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `degree` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `localisation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `entrance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `full_name`, `degree`, `phone`, `localisation`, `salary`, `entrance_date`) VALUES
(1, 'Church Member 1', '1', '111', 'localisation of church member 1', 100, '2018-08-10'),
(2, 'Church Member 2', '2', '222', 'localisation of church member 2', 22222, '2016-06-29');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `montant` int(11) NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`id`, `id_categorie`, `id_acteur`, `nom`, `montant`, `description`, `date`) VALUES
(5, 19, 1, 'balance paid to contractor for plastering', 1000000, 'description of the transaction', '2018-04-12'),
(6, 19, 2, 'Digging of Well', 463000, 'description of the transaction', '2018-06-28'),
(7, 19, 1, 'Road repairs and parking lots', 1370000, 'description of the transaction', '2018-07-11'),
(8, 28, 2, 'Bishop Bibi Envelope', 525000, 'description of the transaction', '2018-03-15'),
(9, 28, 1, 'health commission', 175000, 'description of the transaction', '2018-08-01'),
(10, 28, 2, 'Others', 328000, 'description of the transaction', '2018-06-27'),
(11, 26, 2, 'AGM food and drinks', 209000, 'description of the transaction', '2018-08-04'),
(12, 26, 2, 'Parish feast celebration', 1043500, 'description of the transaction', '2018-02-03'),
(13, 26, 1, 'PPC Exco', 168500, 'description of the transaction', '2018-10-11'),
(14, 19, 2, 'Iron foot cleaner', 1395000, 'description of the transaction', '2018-06-08'),
(15, 25, 1, 'pament of water bill', 133000, 'description test', '2018-08-01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'manager',
  `contact` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `localisation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `profession` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `full_name`, `username`, `password`, `level`, `contact`, `localisation`, `profession`) VALUES
(1, 'BIYA Paul', 'bpd237', '84e63617501b1db36fbad3a318990fecbfc5e76e', 'administrator', '690534401', 'Mokolo', 'Web Developper'),
(2, 'Georges Weya', 'gWeya', 'b1a52e5cebe5a89db71f7225d41ca9a8fe63b3c9', 'manager', '677855608', 'Obili', 'Couturier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_parent`
--
ALTER TABLE `categorie_parent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `categorie_parent`
--
ALTER TABLE `categorie_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
