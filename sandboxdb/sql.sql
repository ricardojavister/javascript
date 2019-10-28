-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sandboxdb
CREATE DATABASE IF NOT EXISTS `sandboxdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sandboxdb`;

-- Dumping structure for table sandboxdb.code
CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(300) NOT NULL DEFAULT '0',
  `codeurl` varchar(1000) NOT NULL DEFAULT '0',
  `createdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sandboxdb.code: 1 rows
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` (`id`, `tag`, `codeurl`, `createdate`, `modifydate`) VALUES
	(1, 'var let and const', 'https://codesandbox.io/s/angry-mccarthy-h8o4y?from-embed', '0000-00-00 00:00:00', '2019-10-28 14:41:09');
/*!40000 ALTER TABLE `code` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
