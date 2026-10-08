-- ============================================================================
-- TUJIKINGE NA EBOLA — Database Schema & Data Dump
-- File: data/ebola.sql
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `ebola` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ebola`;

-- ----------------------------------------------------------------------------
-- Table structure for `leads` (Lecteurs & Visiteurs Enregistrés)
-- ----------------------------------------------------------------------------

DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lead_uid` VARCHAR(64) NOT NULL,
  `fullname` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lead_uid` (`lead_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Initial Sample Data for `leads`
-- ----------------------------------------------------------------------------

INSERT INTO `leads` (`id`, `lead_uid`, `fullname`, `phone`, `created_at`) VALUES
(1, 'lead_6ab8207b89ea4', 'Jean Dupont', '0812345678', '2026-09-26 19:43:55'),
(2, 'lead_6ab8273d7f44b', 'Predit MBOKANI', '0792032870', '2026-09-26 20:12:45');
