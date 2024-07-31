-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 juil. 2024 à 17:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rh_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `CandidatID` int(11) NOT NULL,
  `Prénom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NomDeFamille` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MotDePasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Téléphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Profil` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DateInscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE `candidatures` (
  `CandidatureID` int(11) NOT NULL,
  `CandidatID` int(11) DEFAULT NULL,
  `PosteID` int(11) DEFAULT NULL,
  `DateCandidature` date DEFAULT NULL,
  `Statut` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `congés`
--

CREATE TABLE `congés` (
  `CongéID` int(11) NOT NULL,
  `EmployéID` int(11) DEFAULT NULL,
  `TypeDeCongé` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DateDébut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `Statut` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `DocumentID` int(11) NOT NULL,
  `CandidatureID` int(11) DEFAULT NULL,
  `TypeDeDocument` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CheminAccès` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DateSoumission` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `départements`
--

CREATE TABLE `départements` (
  `DepartmentID` int(11) NOT NULL,
  `NomDuDépartement` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employés`
--

CREATE TABLE `employés` (
  `EmployéID` int(11) NOT NULL,
  `CandidatID` int(11) DEFAULT NULL,
  `DateDembauche` date DEFAULT NULL,
  `Salaire` decimal(10,2) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `Statut` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `FormationID` int(11) NOT NULL,
  `EmployéID` int(11) DEFAULT NULL,
  `NomDeLaFormation` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Durée` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `LogID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Message` text NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `PosteID` int(11) NOT NULL,
  `NomDuPoste` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `DatePublication` date DEFAULT NULL,
  `DateExpiration` date DEFAULT NULL,
  `Statut` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salaires`
--

CREATE TABLE `salaires` (
  `SalaireID` int(11) NOT NULL,
  `EmployéID` int(11) DEFAULT NULL,
  `BaseSalaire` decimal(10,2) DEFAULT NULL,
  `Bonus` decimal(10,2) DEFAULT NULL,
  `DateEffectif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `évaluationsdeperformance`
--

CREATE TABLE `évaluationsdeperformance` (
  `ÉvaluationID` int(11) NOT NULL,
  `EmployéID` int(11) DEFAULT NULL,
  `DateÉvaluation` date DEFAULT NULL,
  `EvaluateurID` int(11) DEFAULT NULL,
  `Commentaires` text DEFAULT NULL,
  `Note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`CandidatID`);

--
-- Index pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD PRIMARY KEY (`CandidatureID`),
  ADD KEY `CandidatID` (`CandidatID`),
  ADD KEY `PosteID` (`PosteID`);

--
-- Index pour la table `congés`
--
ALTER TABLE `congés`
  ADD PRIMARY KEY (`CongéID`),
  ADD KEY `EmployéID` (`EmployéID`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`DocumentID`),
  ADD KEY `CandidatureID` (`CandidatureID`);

--
-- Index pour la table `départements`
--
ALTER TABLE `départements`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Index pour la table `employés`
--
ALTER TABLE `employés`
  ADD PRIMARY KEY (`EmployéID`),
  ADD KEY `CandidatID` (`CandidatID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`FormationID`),
  ADD KEY `EmployéID` (`EmployéID`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`PosteID`);

--
-- Index pour la table `salaires`
--
ALTER TABLE `salaires`
  ADD PRIMARY KEY (`SalaireID`),
  ADD KEY `EmployéID` (`EmployéID`);

--
-- Index pour la table `évaluationsdeperformance`
--
ALTER TABLE `évaluationsdeperformance`
  ADD PRIMARY KEY (`ÉvaluationID`),
  ADD KEY `EmployéID` (`EmployéID`),
  ADD KEY `EvaluateurID` (`EvaluateurID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `CandidatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `candidatures`
--
ALTER TABLE `candidatures`
  MODIFY `CandidatureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `congés`
--
ALTER TABLE `congés`
  MODIFY `CongéID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `DocumentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `départements`
--
ALTER TABLE `départements`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employés`
--
ALTER TABLE `employés`
  MODIFY `EmployéID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `FormationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `PosteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salaires`
--
ALTER TABLE `salaires`
  MODIFY `SalaireID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `évaluationsdeperformance`
--
ALTER TABLE `évaluationsdeperformance`
  MODIFY `ÉvaluationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `candidatures_ibfk_1` FOREIGN KEY (`CandidatID`) REFERENCES `candidats` (`CandidatID`),
  ADD CONSTRAINT `candidatures_ibfk_2` FOREIGN KEY (`PosteID`) REFERENCES `postes` (`PosteID`);

--
-- Contraintes pour la table `congés`
--
ALTER TABLE `congés`
  ADD CONSTRAINT `congés_ibfk_1` FOREIGN KEY (`EmployéID`) REFERENCES `employés` (`EmployéID`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`CandidatureID`) REFERENCES `candidatures` (`CandidatureID`);

--
-- Contraintes pour la table `départements`
--
ALTER TABLE `départements`
  ADD CONSTRAINT `départements_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `employés` (`EmployéID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employés`
--
ALTER TABLE `employés`
  ADD CONSTRAINT `employés_ibfk_1` FOREIGN KEY (`CandidatID`) REFERENCES `candidats` (`CandidatID`),
  ADD CONSTRAINT `employés_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `départements` (`DepartmentID`);

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`EmployéID`) REFERENCES `employés` (`EmployéID`);

--
-- Contraintes pour la table `salaires`
--
ALTER TABLE `salaires`
  ADD CONSTRAINT `salaires_ibfk_1` FOREIGN KEY (`EmployéID`) REFERENCES `employés` (`EmployéID`);

--
-- Contraintes pour la table `évaluationsdeperformance`
--
ALTER TABLE `évaluationsdeperformance`
  ADD CONSTRAINT `évaluationsdeperformance_ibfk_1` FOREIGN KEY (`EmployéID`) REFERENCES `employés` (`EmployéID`),
  ADD CONSTRAINT `évaluationsdeperformance_ibfk_2` FOREIGN KEY (`EvaluateurID`) REFERENCES `employés` (`EmployéID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
