-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 jan. 2025 à 11:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TDW`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

DROP TABLE IF EXISTS `abonnements`;
CREATE TABLE IF NOT EXISTS `abonnements` (
  `abonnement_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `carte_id` int(11) DEFAULT NULL,
  `recu_paiement` varchar(255) DEFAULT NULL,
  `status` enum('pending','approuve') DEFAULT 'pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`abonnement_id`),
  KEY `membre_id` (`membre_id`),
  KEY `carte_id` (`carte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`abonnement_id`, `membre_id`, `carte_id`, `recu_paiement`, `status`, `created_at`) VALUES
(14, 26, 23, 'recu.png', 'approuve', '2025-01-12 00:35:05'),
(13, 26, 23, 'recu.png', 'approuve', '2025-01-12 00:35:05'),
(15, 26, 23, 'recu.png', 'approuve', '2025-01-12 01:18:05'),
(16, 26, 23, 'recu.png', 'approuve', '2025-01-12 01:21:50'),
(17, 26, 23, 'recu.png', 'approuve', '2025-01-12 03:58:27'),
(18, 27, 24, 'recu.png', 'approuve', '2025-01-14 03:54:50');

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `role_specifique` enum('super_admin','moderateur') DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`admin_id`, `utilisateur_id`, `role_specifique`) VALUES
(1, 37, 'super_admin');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `annonce_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text,
  `type_annonce` enum('news','evenement','promotion','activite') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_publication` date NOT NULL,
  `date_expiration` date DEFAULT NULL,
  `priorite` int(11) DEFAULT '0',
  `statut` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`annonce_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`annonce_id`, `titre`, `description`, `type_annonce`, `image`, `date_publication`, `date_expiration`, `priorite`, `statut`, `created_at`) VALUES
(1, 'Lancement de la nouvelle application', 'Nous sommes ravis d’annoncer le lancement de notre nouvelle application mobile.', 'news', 'news.png', '2024-01-10', '2024-02-10', 1, 'active', '2024-12-30 23:37:57'),
(2, 'Festival des Sciences 2024', 'Rejoignez-nous pour un événement passionnant avec des ateliers, conférences, et expositions.', 'evenement', 'news.png', '2024-01-15', '2024-01-20', 2, 'active', '2024-12-30 23:37:57'),
(3, 'Offre spéciale de fin d’année', 'Profitez de 20% de réduction sur tous nos produits jusqu’à la fin de l’année.', 'promotion', 'news.png', '2024-12-25', '2024-12-31', 3, 'active', '2024-12-30 23:37:57'),
(4, 'Cours de yoga gratuits', 'Participez à nos cours de yoga gratuits tous les samedis matin.', 'activite', 'news.png', '2024-01-01', NULL, 1, 'active', '2024-12-30 23:37:57');

-- --------------------------------------------------------

--
-- Structure de la table `avantages`
--

DROP TABLE IF EXISTS `avantages`;
CREATE TABLE IF NOT EXISTS `avantages` (
  `avantage_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_avantage` varchar(255) NOT NULL,
  `description` text,
  `type_carte_id` int(11) NOT NULL,
  `partenaire_id` int(11) NOT NULL,
  `type_avantage` varchar(50) NOT NULL,
  `conditions` text,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `valeur_remise` decimal(5,2) DEFAULT NULL,
  `statut` enum('actif','expire') DEFAULT 'actif',
  PRIMARY KEY (`avantage_id`),
  KEY `type_carte_id` (`type_carte_id`),
  KEY `partenaire_id` (`partenaire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avantages`
--

INSERT INTO `avantages` (`avantage_id`, `nom_avantage`, `description`, `type_carte_id`, `partenaire_id`, `type_avantage`, `conditions`, `date_debut`, `date_fin`, `valeur_remise`, `statut`) VALUES
(21, 'Réduction chirurgie', '20% de réduction sur les soins dentaires', 2, 7, 'remise', 'Uniquement pour les étudiants', NULL, NULL, '20.00', 'actif'),
(20, 'Bilan dentaire gratuit', 'Premier bilan gratuit pour les moins de 25 ans', 2, 6, 'récompense', 'Sur présentation d’une pièce d’identité', NULL, NULL, '0.00', 'actif'),
(19, 'Analyse gratuite', 'Analyse sanguine gratuite pour les nouveaux patients', 1, 6, 'récompense', 'Uniquement sur rendez-vous', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(18, 'Réduction sur consultations', '5% de réduction sur toutes les consultations', 1, 5, 'remise', 'Valable une fois par an', '2025-01-01', '2025-12-31', '30.00', 'actif'),
(17, 'Programme fidélité', 'Gagnez 2 nuits gratuites après 10 nuits réservées', 3, 4, 'fidélité', 'Valable pour les séjours cumulés', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(16, 'Suite gratuite', 'Surclassement gratuit en suite', 3, 3, 'privilège', 'Sous réserve de disponibilité', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(15, 'Accès à la piscine', 'Accès gratuit à la piscine et au spa', 2, 2, 'privilège', 'Sous réserve de réservation', NULL, NULL, '0.00', 'actif'),
(14, 'Réduction étudiante', '15% de remise pour les étudiants avec carte valide', 2, 1, 'remise', 'Sur présentation d’une carte étudiante', '2025-01-01', '2025-12-31', '15.00', 'actif'),
(13, 'Petit-déjeuner offert', 'Petit-déjeuner gratuit pour tout séjour supérieur à 2 nuits', 1, 1, 'privilège', 'Sous réserve de disponibilité', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(12, 'Remise sur séjour', '10% de réduction sur les réservations', 1, 1, 'remise', 'Valable uniquement en basse saison', '2025-01-01', '2025-12-31', '10.00', 'actif'),
(22, 'Check-up annuel', '50% de réduction sur un check-up complet', 3, 7, 'remise', 'Une fois par an', '2025-01-01', '2025-12-31', '50.00', 'actif'),
(23, 'Service VIP', 'Accès prioritaire et consultations à domicile', 3, 8, 'privilège', 'Sous réserve de disponibilité', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(24, 'Cours gratuit', 'Un cours gratuit après 10 cours suivis', 1, 9, 'fidélité', 'Valable pour les cours de langues', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(25, 'Réduction sur inscriptions', '15% de réduction pour les nouveaux inscrits', 2, 11, 'remise', 'Uniquement pour la première année', '2025-01-01', '2025-12-31', '15.00', 'actif'),
(26, 'Réduction de groupe', '30% de réduction pour les groupes de 5 personnes ou plus', 3, 13, 'remise', 'Pour les voyages internationaux uniquement', '2025-01-01', '2025-12-31', '60.00', 'actif'),
(27, 'Miles fidélité', '1 voyage gratuit après 5 réservations', 3, 14, 'fidélité', 'Valable pour les réservations internationales', '2025-01-01', '2025-12-31', '0.00', 'actif'),
(28, 'djihene', 'djihene', 1, 1, 'remise', 'lkjdkn', '2025-01-15', '2025-02-09', '14.00', 'actif'),
(29, 'kjd', 'lzekjf', 1, 1, 'remise', 'azmdj', '2025-01-15', '2025-02-09', '14.00', 'actif'),
(30, 'nihaha', 'nihaha', 2, 25, 'remise', 'nihaha', '2025-01-15', '2025-02-02', '20.00', 'actif'),
(31, 'remise', 'remise', 3, 14, 'remise', 'remise', '2025-01-14', '2025-01-21', '5.00', 'actif'),
(32, 'test', 'test', 1, 1, 'remise', 'test', '2025-01-24', '2025-01-29', '2.00', 'actif'),
(33, 'need', 'need', 1, 1, 'remise', 'need', '2025-01-15', '2025-01-29', '4.00', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `avis_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `partenaire_id` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `commentaire` text,
  `date_avis` date DEFAULT NULL,
  PRIMARY KEY (`avis_id`),
  KEY `membre_id` (`membre_id`),
  KEY `partenaire_id` (`partenaire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`avis_id`, `membre_id`, `partenaire_id`, `note`, `commentaire`, `date_avis`) VALUES
(1, 1, 1, 4, 'Excellent service', '2024-12-30'),
(2, 2, 2, 5, 'Très satisfait des prestations', '2024-12-30');

-- --------------------------------------------------------

--
-- Structure de la table `benevolats`
--

DROP TABLE IF EXISTS `benevolats`;
CREATE TABLE IF NOT EXISTS `benevolats` (
  `benevolat_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `description` text,
  `date_inscription` date DEFAULT NULL,
  PRIMARY KEY (`benevolat_id`),
  KEY `membre_id` (`membre_id`),
  KEY `evenement_id` (`evenement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `benevolats`
--

INSERT INTO `benevolats` (`benevolat_id`, `membre_id`, `evenement_id`, `description`, `date_inscription`) VALUES
(12, 26, 2, NULL, '2025-01-16');

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

DROP TABLE IF EXISTS `cartes`;
CREATE TABLE IF NOT EXISTS `cartes` (
  `carte_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `type_carte_id` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `code_qr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`carte_id`),
  KEY `membre_id` (`membre_id`),
  KEY `type_carte_id` (`type_carte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`carte_id`, `membre_id`, `type_carte_id`, `date_creation`, `date_expiration`, `code_qr`) VALUES
(24, 27, 1, '2025-01-14', '2026-01-14', 'qr_code_27.png'),
(23, 26, 2, '2025-01-16', '2026-01-16', 'qr_code_26.png');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categorie_id`, `nom`, `description`) VALUES
(3, 'Hôtels', 'Établissements offrant des services d’hébergement pour les voyageurs.'),
(4, 'Cliniques', 'Centres de santé proposant des services médicaux et paramédicaux.'),
(1, 'Écoles', 'Institutions éducatives offrant des cours et des programmes d’apprentissage.'),
(2, 'Agences de Voyage', 'Entreprises spécialisées dans l’organisation de voyages et vacances.');

-- --------------------------------------------------------

--
-- Structure de la table `demandesaide`
--

DROP TABLE IF EXISTS `demandesaide`;
CREATE TABLE IF NOT EXISTS `demandesaide` (
  `demande_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `type_aide_id` int(11) DEFAULT NULL,
  `description` text,
  `statut` enum('en_attente','approuvee','rejetee') DEFAULT NULL,
  `chemin_fichier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`demande_id`),
  KEY `type_aide_id` (`type_aide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesaide`
--

INSERT INTO `demandesaide` (`demande_id`, `nom`, `prenom`, `date_naissance`, `type_aide_id`, `description`, `statut`, `chemin_fichier`) VALUES
(1, 'Ali', 'Yasmine', '1990-05-15', 1, 'Besoin d’aide alimentaire pour la famille', 'en_attente', 'lll'),
(2, 'Hamid', 'Samir', '1985-10-20', 2, 'Besoin de financement pour une opération', 'approuvee', NULL),
(3, 'djihene', 'guitoun', '2025-01-22', 2, 'jjjjjjjjjjjjjj', 'en_attente', NULL),
(4, 'ijznkdizh', 'zkejdhjk', '2025-01-23', 2, 'zjkenkjz', 'en_attente', 'uploads/testmvc.zip'),
(5, 'djihene', 'guitoun', '2025-01-17', 1, 'heyyyy', 'en_attente', 'uploads/code.zip');

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

DROP TABLE IF EXISTS `dons`;
CREATE TABLE IF NOT EXISTS `dons` (
  `don_id` int(11) NOT NULL AUTO_INCREMENT,
  `montant` decimal(10,2) DEFAULT NULL,
  `date_don` date DEFAULT NULL,
  `recu_paiement` varchar(255) DEFAULT NULL,
  `valide` enum('pending','approuve') DEFAULT 'pending',
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`don_id`),
  KEY `fk_dons_utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dons`
--

INSERT INTO `dons` (`don_id`, `montant`, `date_don`, `recu_paiement`, `valide`, `utilisateur_id`) VALUES
(6, '0.16', '2025-01-12', 'uploads/1 (2).jpg', 'approuve', 25),
(5, '0.12', '2025-01-12', 'uploads/1 (2).jpg', 'approuve', 25),
(7, '444.03', '2025-01-12', 'uploads/1 (2).jpg', 'approuve', 25),
(8, '4000.00', '2025-01-12', 'uploads/1 (2).jpg', 'approuve', 25),
(9, '0.12', '2025-01-12', 'uploads/1 (2).jpg', 'approuve', 25),
(10, '0.30', '2025-01-13', 'uploads/1 (2).jpg', 'approuve', 25),
(11, '1000.00', '2025-01-13', 'uploads/1 (2).jpg', 'pending', 25);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `evenement_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `nb_benevolat` int(11) DEFAULT '0',
  `nb_benevolat_max` int(11) DEFAULT '50',
  PRIMARY KEY (`evenement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`evenement_id`, `titre`, `description`, `date_debut`, `date_fin`, `lieu`, `nb_benevolat`, `nb_benevolat_max`) VALUES
(1, 'Journée de Bénévolat', 'Un événement pour aider la communauté locale', '2026-02-01', '2024-02-02', 'Alger', 3, 50),
(2, 'Conférence Santé', 'Discussions sur les innovations médicales', '2026-03-10', '2024-03-11', 'Oran', 4, 50);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `favori_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `partenaire_id` int(11) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  PRIMARY KEY (`favori_id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  KEY `partenaire_id` (`partenaire_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`favori_id`, `utilisateur_id`, `partenaire_id`, `date_ajout`) VALUES
(1, 1, 1, '2024-12-30'),
(2, 2, 2, '2024-12-30');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `adresse` text,
  `date_inscription` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `piece_identite` varchar(255) DEFAULT NULL,
  `recu_paiement` varchar(255) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`membre_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`membre_id`, `utilisateur_id`, `telephone`, `adresse`, `date_inscription`, `photo`, `piece_identite`, `recu_paiement`, `valide`) VALUES
(26, 25, '444', 'Alger', '2025-01-11', 'photo_profile.jpg', 'identite.jpg', 'recu.png', 1),
(27, 27, '44444444', 'Alger', '2025-01-14', 'photo_profile.jpg', 'identite.jpg', 'recu.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `partenaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etabisement` varchar(255) DEFAULT NULL,
  `remise_percentage` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `details` text,
  `ville` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`partenaire_id`),
  KEY `categorie_id` (`categorie_id`),
  KEY `fk_utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`partenaire_id`, `nom_etabisement`, `remise_percentage`, `categorie_id`, `details`, `ville`, `logo`, `utilisateur_id`) VALUES
(1, 'New Day Hotel', 40, 1, 'Hôtel confortable pour séjours courts et longs', 'Alger', 'lgs/1.jpg', 26),
(2, 'Sahel Hotel', 20, 1, 'Hôtel moderne avec vue sur la mer', 'Oran', 'lgs/2.jpg', NULL),
(3, 'Faiz Hotel', 20, 1, 'Hôtel économique pour familles et groupes', 'Constantine', 'lgs/3.jpg', NULL),
(4, 'Sofiane Hotel', 20, 1, 'Hôtel élégant pour voyageurs d’affaires', 'Annaba', 'lgs/4.jpg', NULL),
(5, 'Al-Azhar Clinic', 10, 2, 'Clinique spécialisée en soins généraux', 'Dali Ibrahim', 'lgs/5.jpg', NULL),
(6, 'Harawa Dental Surgery Clinic', 20, 2, 'Clinique dentaire avec services spécialisés', 'Alger', 'lgs/6.jpg', NULL),
(7, 'Glamour Clinic', 40, 2, 'Clinique esthétique avec des services haut de gamme', 'Alger', 'lgs/7.jpg', NULL),
(8, 'Saada Clinic', 15, 2, 'Clinique généraliste pour soins urgents', 'Oran', 'lgs/8.jpg', NULL),
(11, 'Elite Training Center', 20, 4, 'Formations professionnelles et certifiante', 'Constantine', 'lgs/1.jpg', NULL),
(12, 'Success Academy', 10, 4, 'Centre éducatif pour étudiants', 'Annaba', 'lgs/2.jpg', NULL),
(13, 'Dream Travel', 25, 4, 'Organisation de voyages touristiques', 'Alger', 'lgs/3.jpg', NULL),
(14, 'Voyageur Club', 20, 4, 'Réservations de vacances et séjours', 'Oran', 'lgs/4.jpg', NULL),
(15, 'Explore World', 30, 4, 'Voyages organisés à l’étranger', 'Constantine', 'lgs/5.jpg', NULL),
(16, 'GlobeTrotter', 15, 4, 'Forfaits économiques pour familles', 'Annaba', 'lgs/1.jpg', NULL),
(33, 'hotel', 15, 3, 'hotel', 'Alger', '5.jpg', 36);

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

DROP TABLE IF EXISTS `participations`;
CREATE TABLE IF NOT EXISTS `participations` (
  `participation_id` int(11) NOT NULL AUTO_INCREMENT,
  `evenement_id` int(11) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `date_participation` date DEFAULT NULL,
  PRIMARY KEY (`participation_id`),
  KEY `evenement_id` (`evenement_id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participations`
--

INSERT INTO `participations` (`participation_id`, `evenement_id`, `membre_id`, `date_participation`) VALUES
(1, 1, 1, '2024-12-30'),
(2, 2, 2, '2024-12-30');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

DROP TABLE IF EXISTS `statistiques`;
CREATE TABLE IF NOT EXISTS `statistiques` (
  `statistique_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `total_dons` decimal(10,2) DEFAULT NULL,
  `total_benevolat` int(11) DEFAULT NULL,
  `total_remises` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`statistique_id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statistiques`
--

INSERT INTO `statistiques` (`statistique_id`, `membre_id`, `total_dons`, `total_benevolat`, `total_remises`) VALUES
(1, 1, '100.00', 10, '50.00'),
(2, 2, '50.00', 5, '30.00');

-- --------------------------------------------------------

--
-- Structure de la table `typesaide`
--

DROP TABLE IF EXISTS `typesaide`;
CREATE TABLE IF NOT EXISTS `typesaide` (
  `type_aide_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`type_aide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typesaide`
--

INSERT INTO `typesaide` (`type_aide_id`, `nom`, `description`) VALUES
(1, 'Aide Alimentaire', 'Assistance en nourriture pour les personnes nécessiteuses'),
(2, 'Aide Médicale', 'Aide financière pour les soins médicaux');

-- --------------------------------------------------------

--
-- Structure de la table `typescarte`
--

DROP TABLE IF EXISTS `typescarte`;
CREATE TABLE IF NOT EXISTS `typescarte` (
  `type_carte_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `remise_percentage` int(11) DEFAULT NULL,
  PRIMARY KEY (`type_carte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typescarte`
--

INSERT INTO `typescarte` (`type_carte_id`, `nom`, `description`, `remise_percentage`) VALUES
(1, 'Jeunes', 'Carte destinée aux jeunes avec des offres exclusives', 15),
(2, 'Classique', 'Carte de base offrant des privilèges limités', 10),
(3, 'Premium', 'Carte haut de gamme avec des avantages supplémentaires', 20);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`utilisateur_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_id`, `nom`, `prenom`, `email`, `mot_de_passe`, `date_creation`) VALUES
(33, 'nnnnnnnnnnnnn', 'nnnnnnnnnnnnn', 'part44@esi.dz', '$2y$10$O6D0bm7W2cnYAttj3r.u7.ZPzsvSX7t3Cbq0PxoDTkcRvcJ/s0Ltm', '2025-01-14'),
(22, 'hello', 'hello', 'hello@esi.dz', '$2y$10$dgBuzB1GcJgdd5ML4rynhe/zcNioyOZVHq59fefuinGbdSDTpyK9m', '2025-01-10'),
(26, 'partenanire', 'partenanire', 'part@esi.dz', '$2y$10$hIBMQPpqQj3G3dUv/N1wwOrcTCn9qJk6P.byXqwfskSf75HpCM6ha', '2025-01-13'),
(27, 'nihad', 'nihad', 'nihad@esi.dz', '$2y$10$KkvYpRwC9Qc1Qjcdx94l0e6dfucpOQmcIho5LUa/0YvIEbj/U.2Xu', '2025-01-14'),
(28, 'jshfjhf', 'jdzjhbc', 'part2@esi.dz', '$2y$10$quyyXgctAGU4.YphLmh2z.Vj7GklQ9wCcuXLJdonoz1GsDe11MO72', '2025-01-14'),
(29, 'nuad', 'abudhabi', 'part3@esi.dz', '$2y$10$eHPS7tk/YoHvReOJ5xl0BeABJh/GoCdQ4tmvfHQ5EljbGRFyR0ZBu', '2025-01-14'),
(30, 'Hkazdhj', 'qshdqjs', 'part4@esi.dz', '$2y$10$jor6dSJzLb.gdJoIwh3yaeqn9Gja5kTfL1xEFJ8XbUhn9GidCHiTa', '2025-01-14'),
(31, 'zjhij', 'sjf', 'part5@esi.dz', '$2y$10$uxT2G85/SCFwdyMhYhILg.lafc9aYoueYyyNbwtIbW/1wLHI7xVqW', '2025-01-14'),
(32, 'djiheb', 'kzjeh', 'partjjj@esi.dz', '$2y$10$JMBxXO2Dbj0/hRI2DpXOs.0LLbBv5dMrY3xrrrA9wdKJHJ.yIZVH.', '2025-01-14'),
(25, 'djihene', 'guitoun', 'd_guitoun@esi.dz', '$2y$10$1lfMI/coXztiPN2YCrahRuXZXVpFc7pokK4714fG/.G2itRARusWW', '2025-01-11'),
(34, 'test', 'test', 'test@esi.dz', '$2y$10$gFKTpJY92zyMABEIqqoKV.LwG8pRgUvIZV7kF4gzEWTmEyy3u5IiW', '2025-01-14'),
(35, 'need', 'need', 'need@esi.dz', '$2y$10$A.8bt5wrlXESuvvPUhQ8n.Egk5diDuIRQ1XFn0K8Vh0lMA/pPd.uS', '2025-01-15'),
(36, 'Testhotel', 'hotel', 'hotel@esi.dz', '$2y$10$iozmutZ6YMgpW4jFwdOPYe4z.fZ9bf8Xpc784mHb.MOSfXbNKXnhK', '2025-01-16'),
(37, 'admin', 'admin', 'admin@gmail.com', '$2y$10$KujrWlOVUR3mYkAdQeqhg.pPy1MhB8rrNThbHKHZ.9yZtLxkh0kmi', '2025-01-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
