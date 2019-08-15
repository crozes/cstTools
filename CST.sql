-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 15 Août 2019 à 15:59
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `CST`
--

-- --------------------------------------------------------

--
-- Structure de la table `Horaire`
--

CREATE TABLE `Horaire` (
  `idHoraire` bigint(20) NOT NULL,
  `dateHoraire` date NOT NULL,
  `timeHoraire` time NOT NULL,
  `comHoraire` text,
  `idLieuInter` bigint(20) NOT NULL,
  `idTypeInter` bigint(20) NOT NULL,
  `idPersonne` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Horaire`
--

INSERT INTO `Horaire` (`idHoraire`, `dateHoraire`, `timeHoraire`, `comHoraire`, `idLieuInter`, `idTypeInter`, `idPersonne`) VALUES
(17, '2019-07-27', '04:00:00', '', 3, 4, 4),
(18, '2019-07-29', '02:10:00', 'Je kifffff', 3, 17, 6),
(27, '2019-07-30', '10:00:00', 'Application \"CST Tools\"', 5, 23, 1),
(28, '2019-07-30', '10:00:00', 'Application \"CST Tools\"', 5, 23, 1),
(29, '2019-07-30', '10:00:00', 'Application \"CST Tools\"', 5, 23, 1),
(32, '2019-07-31', '07:26:00', '', 4, 7, 8),
(34, '0000-00-00', '02:30:00', '', 5, 23, 1),
(37, '2019-08-01', '04:00:00', 'Maintenance application CST Tools', 5, 23, 1),
(38, '2019-08-02', '02:00:00', 'MAJ CST Tools', 5, 23, 1),
(39, '2019-08-12', '02:00:00', 'Mis en place plannings de formations', 5, 24, 1),
(40, '2019-08-12', '02:00:00', 'Maj CST Tools', 5, 23, 1),
(41, '2019-08-15', '04:00:00', 'Mis en place formation Drive', 5, 24, 1);

-- --------------------------------------------------------

--
-- Structure de la table `LieuInter`
--

CREATE TABLE `LieuInter` (
  `idLieuInter` bigint(20) NOT NULL,
  `nomLieuInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LieuInter`
--

INSERT INTO `LieuInter` (`idLieuInter`, `nomLieuInter`) VALUES
(1, 'Pech David'),
(2, 'Léo Lagrange'),
(3, 'La Ramée'),
(4, 'Salle de formation - Ramonville'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `idPersonne` bigint(20) NOT NULL,
  `nomPersonne` varchar(255) NOT NULL,
  `prenomPersonne` varchar(255) NOT NULL,
  `mailPersonne` varchar(255) NOT NULL,
  `mdpPersonne` varchar(255) NOT NULL,
  `idRole` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `mdpPersonne`, `idRole`) VALUES
(1, 'CROZES', 'CYRIL', 'cyril.crozes@gmail.com', 'D8467FBE34891AEE837EC982F9D55C09C25E00CD7ED95A0330B9C1A9B21EDC03', 2),
(4, 'GARNIER', 'ILEANA', 'ileanagarnier@hotmail.fr', '3797F543038F71446F531CE5A83CE6B33A5F80FCDE580EA3DF91F3700097ABAC', 1),
(6, 'IMBERT', 'MARIE CECILE', 'mariececile.imbert@gmail.com', '5483D5DF9B245E662C0E4368B8062E8A0FD24C17CE4DED1A0E452E4EE879DD81', 2),
(7, 'COULY ', 'SéBASTIEN ', 'cstsecretariat@live.fr', 'C0BB8CA64902FD29CC7F35E4208D0A8A10B6BF49BFFF8CE6CC1F63CECD1BC6AB', 2),
(8, 'CHAUVET', 'CORALINE', 'coraline.chauvet13@orange.fr', '6E85B5D7177E59103D0D09D931EED3C9F2B1AB19B1C6F783D4615C1AEBD39DE5', 1),
(9, 'ROQUES', 'CINDY', 'cindy-roques@hotmail.fr', 'E5069BE9E3E08110E3C26ADF36DECA72FF666DB86512FA46139FD1532F299260', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `idRole` bigint(20) NOT NULL,
  `nomRole` varchar(255) NOT NULL,
  `valueRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Role`
--

INSERT INTO `Role` (`idRole`, `nomRole`, `valueRole`) VALUES
(1, 'admin', 2),
(2, 'redacteur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `TypeInter`
--

CREATE TABLE `TypeInter` (
  `idTypeInter` bigint(20) NOT NULL,
  `nomTypeInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeInter`
--

INSERT INTO `TypeInter` (`idTypeInter`, `nomTypeInter`) VALUES
(1, 'Sportif - Entrainement'),
(2, 'Sportif - Compétition'),
(3, 'Sportif - PPG'),
(4, 'BNSSA - Entrainement'),
(5, 'BNSSA - Règlementation'),
(6, 'Secourisme - PSC1'),
(7, 'Secourisme - FC PSC1'),
(8, 'Secourisme - PSE 1'),
(9, 'Secourisme - FC PSE 1'),
(10, 'Secourisme - PSE 2'),
(11, 'Secourisme - FC PSE 2'),
(12, 'Secourisme - PSS1'),
(13, 'Secourisme - SST'),
(14, 'Secourisme - FO PSC'),
(15, 'Secourisme - FO PSE'),
(16, 'Secourisme - FO '),
(17, 'Club - Administratif'),
(19, 'Club - Démarchage'),
(20, 'DPS - Chef de Poste'),
(21, 'DPS - Maintenance'),
(22, 'Club - Communication'),
(23, 'Informatique - Développement'),
(24, 'Informatique - Site');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Horaire`
--
ALTER TABLE `Horaire`
  ADD PRIMARY KEY (`idHoraire`),
  ADD KEY `fk_horaire_personne` (`idPersonne`),
  ADD KEY `fk_horaire_typeinter` (`idTypeInter`),
  ADD KEY `fk_horaire_lieuinter` (`idLieuInter`);

--
-- Index pour la table `LieuInter`
--
ALTER TABLE `LieuInter`
  ADD PRIMARY KEY (`idLieuInter`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`idPersonne`),
  ADD KEY `fk_personne_role` (`idRole`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `TypeInter`
--
ALTER TABLE `TypeInter`
  ADD PRIMARY KEY (`idTypeInter`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Horaire`
--
ALTER TABLE `Horaire`
  MODIFY `idHoraire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `LieuInter`
--
ALTER TABLE `LieuInter`
  MODIFY `idLieuInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `idPersonne` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `idRole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `TypeInter`
--
ALTER TABLE `TypeInter`
  MODIFY `idTypeInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Horaire`
--
ALTER TABLE `Horaire`
  ADD CONSTRAINT `fk_horaire_lieuinter` FOREIGN KEY (`idLieuInter`) REFERENCES `LieuInter` (`idLieuInter`),
  ADD CONSTRAINT `fk_horaire_personne` FOREIGN KEY (`idPersonne`) REFERENCES `Personne` (`idPersonne`),
  ADD CONSTRAINT `fk_horaire_typeinter` FOREIGN KEY (`idTypeInter`) REFERENCES `TypeInter` (`idTypeInter`);

--
-- Contraintes pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `fk_personne_role` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
