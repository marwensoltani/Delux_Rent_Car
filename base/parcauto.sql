-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 28 Janvier 2017 à 00:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parcauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IDCATEGORIE` int(11) NOT NULL,
  `LIBELLECATEGORIE` char(15) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`IDCATEGORIE`, `LIBELLECATEGORIE`) VALUES
(2, 'MiniBus'),
(3, 'Voiture'),
(4, 'Fourgonnette'),
(1, 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `IDCONTRAT` int(11) NOT NULL,
  `IDFOURNISSEUR` int(11) NOT NULL,
  `IDTYPECONTRAT` int(11) NOT NULL,
  `IDVEHICULE` int(11) NOT NULL,
  `DATEDEBCONTRAT` date DEFAULT NULL,
  `DATEFINCONTRAT` date DEFAULT NULL,
  `MONTANTCONTRAT` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`IDCONTRAT`, `IDFOURNISSEUR`, `IDTYPECONTRAT`, `IDVEHICULE`, `DATEDEBCONTRAT`, `DATEFINCONTRAT`, `MONTANTCONTRAT`) VALUES
(1, 2, 1, 2, '2016-04-03', '2019-01-30', 3200);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `IDFOURNISSEUR` int(11) NOT NULL,
  `NOMFOURNISSEUR` char(20) CHARACTER SET latin1 NOT NULL,
  `RSFOURNISSEUR` char(20) CHARACTER SET latin1 DEFAULT NULL,
  `villefournisseur` varchar(20) CHARACTER SET latin1 NOT NULL,
  `telfournisseur` char(9) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IDFOURNISSEUR`, `NOMFOURNISSEUR`, `RSFOURNISSEUR`, `villefournisseur`, `telfournisseur`) VALUES
(2, 'Star Assurance', '15960', 'Ben arous', '06453263'),
(4, 'Peugeot Tunisie', '54181', 'Aryana', '08576342'),
(5, 'Mercedes Tunisie', '29350', 'Tunis', '03645536'),
(6, 'Renoult', '43896', 'Tunis', '011224845'),
(7, 'Volkswagen', '73865', 'Souse', '065746655'),
(9, 'BMW', '345692', 'Aryana', '05767574');

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

CREATE TABLE `individu` (
  `IDINDIVIDU` int(11) NOT NULL,
  `IDVEHICULE` int(11) DEFAULT NULL,
  `NOMINDIVIDU` char(15) CHARACTER SET latin1 NOT NULL,
  `PRENOMINDIVIDU` char(15) CHARACTER SET latin1 NOT NULL,
  `TELINDIVIDU` char(9) CHARACTER SET latin1 DEFAULT NULL,
  `CININDIVIDU` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `PATHPHOTOINDIVIDU` char(200) CHARACTER SET latin1 DEFAULT NULL,
  `INTERNE` smallint(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `individu`
--

INSERT INTO `individu` (`IDINDIVIDU`, `IDVEHICULE`, `NOMINDIVIDU`, `PRENOMINDIVIDU`, `TELINDIVIDU`, `CININDIVIDU`, `PATHPHOTOINDIVIDU`, `INTERNE`) VALUES
(2, 2, 'mohamed', 'kdidi', '123456', '07217096', '54565687', 1),
(1, 1, 'Sawssen', 'Khalifa', '547878126', '07121488', 'test', 1),
(3, 3, 'admin', 'admin', '1111', NULL, NULL, 1),
(8, NULL, 'Radhouen', 'Jouini', '022504649', '01454878', 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `IDPANNE` int(11) NOT NULL,
  `IDVEHICULE` int(11) NOT NULL,
  `IDINDIVIDU` int(11) NOT NULL,
  `IDINTERVENTION` int(11) NOT NULL,
  `DATEPROBINTERVENTION` date NOT NULL,
  `DATEINTERVENTION` date NOT NULL,
  `DUREEINTERVENTION` smallint(6) NOT NULL,
  `COMPTERENDUINTERVENTION` char(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intervention`
--

INSERT INTO `intervention` (`IDPANNE`, `IDVEHICULE`, `IDINDIVIDU`, `IDINTERVENTION`, `DATEPROBINTERVENTION`, `DATEINTERVENTION`, `DUREEINTERVENTION`, `COMPTERENDUINTERVENTION`) VALUES
(2, 1, 7, 1, '2000-01-01', '2000-01-01', 1, 'problï¿½me dans ï¿½lectiricitï¿½'),
(2, 2, 8, 2, '2009-01-06', '2009-01-06', 2, 'réparation des phares'),
(1, 2, 7, 0, '2000-01-01', '2000-01-01', 1, 'bonjour zakman'),
(1, 2, 0, 0, '2000-01-01', '2008-01-01', 1, 'bonjour encore'),
(1, 2, 0, 0, '2000-01-01', '2006-01-01', 1, 'bonjour zakaria'),
(1, 2, 0, 0, '2000-01-01', '2000-03-01', 1, 'bonjour toi'),
(1, 2, 0, 0, '2000-01-01', '2000-02-01', 1, 'bonjour moi');

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `IDMISSION` int(11) NOT NULL,
  `IDINDIVIDU` int(11) NOT NULL,
  `IDVEHICULE` int(11) NOT NULL,
  `OBJECTIFMISSION` char(100) CHARACTER SET latin1 NOT NULL,
  `KMPARCOURUMISSION` smallint(6) DEFAULT NULL,
  `QTECARBURANTMISSION` smallint(6) DEFAULT NULL,
  `DATERESERVATION` date NOT NULL,
  `DATEFINRESERVATION` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mission`
--

INSERT INTO `mission` (`IDMISSION`, `IDINDIVIDU`, `IDVEHICULE`, `OBJECTIFMISSION`, `KMPARCOURUMISSION`, `QTECARBURANTMISSION`, `DATERESERVATION`, `DATEFINRESERVATION`) VALUES
(1, 2, 2, 'transporter les invitÃ©s', 110, 8, '2000-01-01', '2000-01-01'),
(2, 2, 2, 'transporter directeur', 40, 3, '2009-01-05', '2009-01-07'),
(3, 2, 2, 'amener pc', 30, 3, '2000-01-01', '2000-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `IDMODELE` int(11) NOT NULL,
  `LIBELLEMODELE` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modele`
--

INSERT INTO `modele` (`IDMODELE`, `LIBELLEMODELE`) VALUES
(1, 'Renault'),
(2, 'Peugeot'),
(3, 'Mercedes'),
(4, 'Golf');

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `IDPANNE` int(11) NOT NULL,
  `LIBELLEPANNE` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panne`
--

INSERT INTO `panne` (`IDPANNE`, `LIBELLEPANNE`) VALUES
(1, 'electricité'),
(2, 'phare');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `IDSERVICE` int(11) NOT NULL,
  `LIBELLESERVICE` char(20) CHARACTER SET latin1 NOT NULL,
  `CHEFSERVICE` char(20) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`IDSERVICE`, `LIBELLESERVICE`, `CHEFSERVICE`) VALUES
(1, 'Ressources humains', 'Amine Benali'),
(2, 'Comptable', 'Zaini Zakaria'),
(3, 'Financier', 'Diani Imane');

-- --------------------------------------------------------

--
-- Structure de la table `sinistre`
--

CREATE TABLE `sinistre` (
  `IDSINISTRE` int(11) NOT NULL,
  `IDVEHICULE` int(11) NOT NULL,
  `IDINDIVIDU` int(11) NOT NULL,
  `LIEUSINISTRE` char(20) CHARACTER SET latin1 NOT NULL,
  `DATESINISTRE` date NOT NULL,
  `DEGATMATSINISTRE` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `DEGATCORSINISTRE` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `NBRDECESSINISTRE` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sinistre`
--

INSERT INTO `sinistre` (`IDSINISTRE`, `IDVEHICULE`, `IDINDIVIDU`, `LIEUSINISTRE`, `DATESINISTRE`, `DEGATMATSINISTRE`, `DEGATCORSINISTRE`, `NBRDECESSINISTRE`) VALUES
(2, 2, 2, 'Tunis', '2016-09-11', 'sdqsd', 'sqdsq', 0),
(3, 2, 2, 'mhamid', '2017-01-05', 'sdfsdf', 'dsfsdf', 3);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `IDSITE` int(11) NOT NULL,
  `EMPLACEMENTSITE` char(30) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`IDSITE`, `EMPLACEMENTSITE`) VALUES
(1, 'Siège'),
(2, 'Service Généraux');

-- --------------------------------------------------------

--
-- Structure de la table `typecarburant`
--

CREATE TABLE `typecarburant` (
  `IDTYPECARBURANT` int(11) NOT NULL,
  `LIBELLETYPECARBURANT` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typecarburant`
--

INSERT INTO `typecarburant` (`IDTYPECARBURANT`, `LIBELLETYPECARBURANT`) VALUES
(1, 'diesel'),
(2, 'super'),
(3, 'sans plomb');

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

CREATE TABLE `typecontrat` (
  `IDTYPECONTRAT` int(11) NOT NULL,
  `LIBELLETYPECONTRAT` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typecontrat`
--

INSERT INTO `typecontrat` (`IDTYPECONTRAT`, `LIBELLETYPECONTRAT`) VALUES
(1, 'Location'),
(2, 'Achat'),
(3, 'Leasing');

-- --------------------------------------------------------

--
-- Structure de la table `typevehicule`
--

CREATE TABLE `typevehicule` (
  `IDTYPEVEHICULE` int(11) NOT NULL,
  `LIBELLETYPEVEHICULE` char(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typevehicule`
--

INSERT INTO `typevehicule` (`IDTYPEVEHICULE`, `LIBELLETYPEVEHICULE`) VALUES
(1, 'Service'),
(2, 'Fonction'),
(3, 'Vendu'),
(4, 'En Commande');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `IDVEHICULE` int(11) NOT NULL,
  `IDMODELE` int(11) NOT NULL,
  `IDTYPEVEHICULE` int(11) NOT NULL,
  `IDFOURNISSEUR` int(11) NOT NULL,
  `IDSITE` int(11) NOT NULL,
  `IDCATEGORIE` int(11) NOT NULL,
  `IDTYPECARBURANT` int(11) NOT NULL,
  `IDSERVICE` int(11) DEFAULT NULL,
  `FOU_IDFOURNISSEUR` int(11) DEFAULT NULL,
  `NBRPORTEVEHICULE` smallint(6) DEFAULT NULL,
  `PUISSANCEVEHICULE` smallint(6) DEFAULT NULL,
  `NBRPLACEVEHICULE` smallint(6) DEFAULT NULL,
  `CARTEGRISEVEHICULE` char(12) CHARACTER SET latin1 NOT NULL,
  `IMMATRICULATIONVEHICULE` char(12) CHARACTER SET latin1 NOT NULL,
  `PATHPHOTOVEHICULE` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `DATEAQUISITIONVEHICULE` date NOT NULL,
  `DATEDEBUTASSURANCE` date NOT NULL,
  `DATEFINASSURANCE` date NOT NULL,
  `COUTASSURANCE` float NOT NULL,
  `DATEDEBUTREPARATION` date DEFAULT NULL,
  `DATEFINREPARATION` date DEFAULT NULL,
  `COUTREPARATION` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`IDVEHICULE`, `IDMODELE`, `IDTYPEVEHICULE`, `IDFOURNISSEUR`, `IDSITE`, `IDCATEGORIE`, `IDTYPECARBURANT`, `IDSERVICE`, `FOU_IDFOURNISSEUR`, `NBRPORTEVEHICULE`, `PUISSANCEVEHICULE`, `NBRPLACEVEHICULE`, `CARTEGRISEVEHICULE`, `IMMATRICULATIONVEHICULE`, `PATHPHOTOVEHICULE`, `DATEAQUISITIONVEHICULE`, `DATEDEBUTASSURANCE`, `DATEFINASSURANCE`, `COUTASSURANCE`, `DATEDEBUTREPARATION`, `DATEFINREPARATION`, `COUTREPARATION`) VALUES
(2, 2, 1, 2, 1, 2, 2, 0, NULL, 3, 180, 4, '854093', '2-B-5498', '../images/v2.jpg', '2008-12-01', '2008-01-01', '2008-01-01', 2700, NULL, NULL, NULL),
(1, 1, 1, 1, 2, 1, 1, 1, NULL, 4, 154, 5, '154678', '1-A-2345', '../images/v1.jpg', '2008-12-01', '2008-01-01', '2008-01-01', 2550, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visitetechnique`
--

CREATE TABLE `visitetechnique` (
  `IDVISITETECHNIQUE` int(11) NOT NULL,
  `IDVEHICULE` int(11) NOT NULL,
  `OBERVATIONVT` char(40) CHARACTER SET latin1 NOT NULL,
  `DATEVT` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IDCATEGORIE`),
  ADD UNIQUE KEY `CATEGORIE_PK` (`IDCATEGORIE`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`IDCONTRAT`),
  ADD UNIQUE KEY `CONTRAT_PK` (`IDCONTRAT`),
  ADD KEY `CONCERNER_FK` (`IDVEHICULE`),
  ADD KEY `SIGNER_FK` (`IDFOURNISSEUR`),
  ADD KEY `APPARTENIR1_FK` (`IDTYPECONTRAT`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IDFOURNISSEUR`),
  ADD UNIQUE KEY `FOURNISSEUR_PK` (`IDFOURNISSEUR`);

--
-- Index pour la table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`IDINDIVIDU`),
  ADD UNIQUE KEY `INDIVIDU_PK` (`IDINDIVIDU`),
  ADD KEY `CONDUIRE_FK` (`IDVEHICULE`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`IDPANNE`,`IDVEHICULE`,`IDINDIVIDU`,`DATEINTERVENTION`),
  ADD UNIQUE KEY `INTERVENTION_PK` (`IDPANNE`,`IDVEHICULE`,`IDINDIVIDU`,`DATEINTERVENTION`),
  ADD KEY `INTERVENTION_FK` (`IDPANNE`),
  ADD KEY `INTERVENTION2_FK` (`IDVEHICULE`),
  ADD KEY `INTERVENTION3_FK` (`IDINDIVIDU`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`IDMISSION`),
  ADD UNIQUE KEY `MISSION_PK` (`IDMISSION`),
  ADD KEY `RESERVER_FK` (`IDVEHICULE`),
  ADD KEY `DEMANDER_FK` (`IDINDIVIDU`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`IDMODELE`),
  ADD UNIQUE KEY `MODELE_PK` (`IDMODELE`);

--
-- Index pour la table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`IDPANNE`),
  ADD UNIQUE KEY `PANNE_PK` (`IDPANNE`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IDSERVICE`),
  ADD UNIQUE KEY `SERVICE_PK` (`IDSERVICE`);

--
-- Index pour la table `sinistre`
--
ALTER TABLE `sinistre`
  ADD PRIMARY KEY (`IDSINISTRE`),
  ADD UNIQUE KEY `SINISTRE_PK` (`IDSINISTRE`),
  ADD KEY `ETRERESPONSABLE_FK` (`IDINDIVIDU`),
  ADD KEY `AVOIR1_FK` (`IDVEHICULE`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`IDSITE`),
  ADD UNIQUE KEY `SITE_PK` (`IDSITE`);

--
-- Index pour la table `typecarburant`
--
ALTER TABLE `typecarburant`
  ADD PRIMARY KEY (`IDTYPECARBURANT`),
  ADD UNIQUE KEY `TYPECARBURANT_PK` (`IDTYPECARBURANT`);

--
-- Index pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  ADD PRIMARY KEY (`IDTYPECONTRAT`),
  ADD UNIQUE KEY `TYPECONTRAT_PK` (`IDTYPECONTRAT`);

--
-- Index pour la table `typevehicule`
--
ALTER TABLE `typevehicule`
  ADD PRIMARY KEY (`IDTYPEVEHICULE`),
  ADD UNIQUE KEY `TYPEVEHICULE_PK` (`IDTYPEVEHICULE`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`IDVEHICULE`),
  ADD UNIQUE KEY `VEHICULE_PK` (`IDVEHICULE`),
  ADD KEY `APPARTENIR_FK` (`IDCATEGORIE`),
  ADD KEY `AFFECTER_FK` (`IDSERVICE`),
  ADD KEY `APPARTENIR2_FK` (`IDSITE`),
  ADD KEY `APPARTENIR4_FK` (`IDMODELE`),
  ADD KEY `ACHETER_FK` (`IDFOURNISSEUR`),
  ADD KEY `AVOIR_FK` (`IDTYPECARBURANT`),
  ADD KEY `ASSURER_FK` (`FOU_IDFOURNISSEUR`),
  ADD KEY `APPARTENIR3_FK` (`IDTYPEVEHICULE`);

--
-- Index pour la table `visitetechnique`
--
ALTER TABLE `visitetechnique`
  ADD PRIMARY KEY (`IDVISITETECHNIQUE`),
  ADD UNIQUE KEY `VISITETECHNIQUE_PK` (`IDVISITETECHNIQUE`),
  ADD KEY `FAIRE_FK` (`IDVEHICULE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IDCATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `IDCONTRAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `IDFOURNISSEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `individu`
--
ALTER TABLE `individu`
  MODIFY `IDINDIVIDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `IDMISSION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `IDMODELE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `IDPANNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `IDSERVICE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sinistre`
--
ALTER TABLE `sinistre`
  MODIFY `IDSINISTRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `IDSITE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `typecarburant`
--
ALTER TABLE `typecarburant`
  MODIFY `IDTYPECARBURANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  MODIFY `IDTYPECONTRAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `typevehicule`
--
ALTER TABLE `typevehicule`
  MODIFY `IDTYPEVEHICULE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `IDVEHICULE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `visitetechnique`
--
ALTER TABLE `visitetechnique`
  MODIFY `IDVISITETECHNIQUE` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
