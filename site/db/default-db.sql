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

