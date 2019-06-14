-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 14 juin 2019 à 18:18
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_agent`
--

CREATE TABLE `tb_agent` (
  `idAgent` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `nomAgent` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `idDept` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fonction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_agent`
--

INSERT INTO `tb_agent` (`idAgent`, `idEntreprise`, `nomAgent`, `telephone`, `email`, `photo`, `idDept`, `username`, `pwd`, `fonction`) VALUES
(28, 6, 'kevin', 0, 'kevin@gmail.com', NULL, 9, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'secretaire'),
(29, 6, 'atthie', 0, 'a@gmail.com', NULL, 9, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ''),
(30, 7, 'kevin', 0, 'k@gmail.com', NULL, 12, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'conseiller');

-- --------------------------------------------------------

--
-- Structure de la table `tb_client`
--

CREATE TABLE `tb_client` (
  `idClient` int(11) NOT NULL,
  `nomClient` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `genre` varchar(2) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tb_commentaire_client`
--

CREATE TABLE `tb_commentaire_client` (
  `idCommentaire` int(11) NOT NULL,
  `idRdv` int(11) NOT NULL,
  `contenu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tb_departement`
--

CREATE TABLE `tb_departement` (
  `idDept` int(11) NOT NULL,
  `nomDept` varchar(50) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_departement`
--

INSERT INTO `tb_departement` (`idDept`, `nomDept`, `idEntreprise`) VALUES
(9, 'Finance', 6),
(10, 'Ressources humaines', 6),
(11, 'Ressources humaines', 6),
(12, 'Finance', 7);

-- --------------------------------------------------------

--
-- Structure de la table `tb_entreprise`
--

CREATE TABLE `tb_entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `siteWeb` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_entreprise`
--

INSERT INTO `tb_entreprise` (`idEntreprise`, `nomEntreprise`, `secteur`, `telephone`, `email`, `adresse`, `description`, `logo`, `pays`, `codePostal`, `siteWeb`, `pwd`) VALUES
(6, 'GECAMINE', 'Minier', NULL, 'gecamine@gmail.com', '', ' Generale de Carriere et de Mine  ', '', '', '', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(7, 'itot', 'informatique', NULL, 'itot@gmail.com', '', 'pas de description', '', '', '', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `tb_horaire`
--

CREATE TABLE `tb_horaire` (
  `idHoraire` int(11) NOT NULL,
  `idAgent` int(11) NOT NULL,
  `jour` int(11) NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_horaire`
--

INSERT INTO `tb_horaire` (`idHoraire`, `idAgent`, `jour`, `heureDebut`, `heureFin`, `description`, `duree`) VALUES
(1, 28, 1, '11:03:00', '12:03:00', 'pas de description', 0),
(2, 28, 1, '06:06:00', '07:06:00', 'pas de description', 0),
(3, 28, 1, '11:29:00', '12:29:00', 'non', 0),
(4, 29, 1, '02:16:00', '03:16:00', 'pas de description', 0),
(5, 28, 2, '01:52:00', '02:53:00', 'pas', 1),
(6, 28, 1, '04:10:00', '06:10:00', 'pas', 1),
(7, 28, 1, '04:38:00', '05:38:00', 'as', 2),
(8, 28, 6, '04:41:00', '06:41:00', 'c', 1),
(9, 30, 1, '06:15:00', '07:15:00', 'pas de description', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tb_jour`
--

CREATE TABLE `tb_jour` (
  `id` int(11) NOT NULL,
  `nomJour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_jour`
--

INSERT INTO `tb_jour` (`id`, `nomJour`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `tb_rdv`
--

CREATE TABLE `tb_rdv` (
  `idRdv` int(11) NOT NULL,
  `idHoraire` int(11) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(25) DEFAULT NULL,
  `nomComplet` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_rdv`
--

INSERT INTO `tb_rdv` (`idRdv`, `idHoraire`, `motif`, `date`, `etat`, `nomComplet`, `email`, `telephone`) VALUES
(1, 4, 'non', '0000-00-00', '0', 'atthie', 'atthie27@gmail.com', '09999999');

-- --------------------------------------------------------

--
-- Structure de la table `tb_reponse_commentaire`
--

CREATE TABLE `tb_reponse_commentaire` (
  `idReponse` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `contenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tb_reservation`
--

CREATE TABLE `tb_reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tb_reservation`
--

INSERT INTO `tb_reservation` (`id`, `nom`) VALUES
(1, '1 semaine avant'),
(2, '2 semaines avant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_agent`
--
ALTER TABLE `tb_agent`
  ADD PRIMARY KEY (`idAgent`),
  ADD KEY `fk_idDep` (`idDept`),
  ADD KEY `fk_idEntreprise` (`idEntreprise`);

--
-- Index pour la table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `tb_commentaire_client`
--
ALTER TABLE `tb_commentaire_client`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `fk_commentaire` (`idRdv`);

--
-- Index pour la table `tb_departement`
--
ALTER TABLE `tb_departement`
  ADD PRIMARY KEY (`idDept`),
  ADD KEY `fk_Entreprise` (`idEntreprise`);

--
-- Index pour la table `tb_entreprise`
--
ALTER TABLE `tb_entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `tb_horaire`
--
ALTER TABLE `tb_horaire`
  ADD PRIMARY KEY (`idHoraire`),
  ADD KEY `fk_idAgent` (`idAgent`),
  ADD KEY `fk_idJour` (`jour`);

--
-- Index pour la table `tb_jour`
--
ALTER TABLE `tb_jour`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_rdv`
--
ALTER TABLE `tb_rdv`
  ADD PRIMARY KEY (`idRdv`),
  ADD KEY `fk_idEnt` (`idHoraire`);

--
-- Index pour la table `tb_reponse_commentaire`
--
ALTER TABLE `tb_reponse_commentaire`
  ADD PRIMARY KEY (`idReponse`),
  ADD KEY `fk_reponse` (`id_comment`);

--
-- Index pour la table `tb_reservation`
--
ALTER TABLE `tb_reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_agent`
--
ALTER TABLE `tb_agent`
  MODIFY `idAgent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_commentaire_client`
--
ALTER TABLE `tb_commentaire_client`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_departement`
--
ALTER TABLE `tb_departement`
  MODIFY `idDept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tb_entreprise`
--
ALTER TABLE `tb_entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tb_horaire`
--
ALTER TABLE `tb_horaire`
  MODIFY `idHoraire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tb_jour`
--
ALTER TABLE `tb_jour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tb_rdv`
--
ALTER TABLE `tb_rdv`
  MODIFY `idRdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_reponse_commentaire`
--
ALTER TABLE `tb_reponse_commentaire`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_reservation`
--
ALTER TABLE `tb_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tb_agent`
--
ALTER TABLE `tb_agent`
  ADD CONSTRAINT `fk_idDep` FOREIGN KEY (`idDept`) REFERENCES `tb_departement` (`idDept`),
  ADD CONSTRAINT `fk_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `tb_entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `tb_commentaire_client`
--
ALTER TABLE `tb_commentaire_client`
  ADD CONSTRAINT `fk_commentaire` FOREIGN KEY (`idRdv`) REFERENCES `tb_rdv` (`idRdv`);

--
-- Contraintes pour la table `tb_departement`
--
ALTER TABLE `tb_departement`
  ADD CONSTRAINT `fk_Entreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `tb_entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `tb_horaire`
--
ALTER TABLE `tb_horaire`
  ADD CONSTRAINT `fk_idAgent` FOREIGN KEY (`idAgent`) REFERENCES `tb_agent` (`idAgent`),
  ADD CONSTRAINT `fk_idJour` FOREIGN KEY (`jour`) REFERENCES `tb_jour` (`id`);

--
-- Contraintes pour la table `tb_rdv`
--
ALTER TABLE `tb_rdv`
  ADD CONSTRAINT `fk_idHoraire` FOREIGN KEY (`idHoraire`) REFERENCES `tb_horaire` (`idHoraire`);

--
-- Contraintes pour la table `tb_reponse_commentaire`
--
ALTER TABLE `tb_reponse_commentaire`
  ADD CONSTRAINT `fk_reponse` FOREIGN KEY (`id_comment`) REFERENCES `tb_commentaire_client` (`idCommentaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
