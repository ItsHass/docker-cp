-- --------------------------------------------------------
-- Host:                         x
-- Server version:               10.11.5-MariaDB-1:10.11.5+maria~ubu2204 - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping structure for table .dockers
CREATE TABLE IF NOT EXISTS `dockers` (
  `docker_id` int(11) NOT NULL AUTO_INCREMENT,
  `docker_label` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `docker_ip` tinytext NOT NULL,
  `docker_user` tinytext NOT NULL,
  `docker_pw` text NOT NULL,
  PRIMARY KEY (`docker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='docker connections';

-- Data exporting was unselected.

-- Dumping structure for table .monitor
CREATE TABLE IF NOT EXISTS `monitor` (
  `monitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `docker_id` int(11) NOT NULL,
  `container_id` text NOT NULL,
  `container_name` mediumtext NOT NULL DEFAULT 'No Name',
  `prefStatus` tinytext NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`monitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table .monitor_logs
CREATE TABLE IF NOT EXISTS `monitor_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `unixstamp` int(11) NOT NULL,
  `docker_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `current_status` tinytext NOT NULL,
  `pref_status` tinytext NOT NULL,
  `actions` text DEFAULT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2422 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
