-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.0.15-MariaDB-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for BusTicket
DROP DATABASE IF EXISTS `BusTicket`;
CREATE DATABASE IF NOT EXISTS `BusTicket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `BusTicket`;


-- Dumping structure for table BusTicket.city
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `IDcity` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL DEFAULT '0' COMMENT 'City name',
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDcity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista gradova';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.company
DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `IDcompany` int(11) NOT NULL AUTO_INCREMENT,
  `IDcity` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL COMMENT 'Company name',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Active',
  PRIMARY KEY (`IDcompany`),
  KEY `FK_company_city` (`IDcity`),
  CONSTRAINT `FK_company_city` FOREIGN KEY (`IDcity`) REFERENCES `city` (`IDcity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bus company information';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.order
DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `IDorder` int(11) NOT NULL,
  `IDpassenger` int(11) NOT NULL,
  `IDticketTime` int(11) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'Paid price',
  PRIMARY KEY (`IDorder`),
  KEY `FK_order_passenger` (`IDpassenger`),
  KEY `FK_order_ticketTime` (`IDticketTime`),
  CONSTRAINT `FK_order_passenger` FOREIGN KEY (`IDpassenger`) REFERENCES `passenger` (`IDpassenger`),
  CONSTRAINT `FK_order_ticketTime` FOREIGN KEY (`IDticketTime`) REFERENCES `ticketTime` (`IDticketTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All bus ticket orders';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.passenger
DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `IDpassenger` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDpassenger`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Passenger information';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.route
DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `IDroute` int(11) NOT NULL AUTO_INCREMENT,
  `IDstationFrom` int(11) DEFAULT NULL,
  `IDstationTo` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Active',
  PRIMARY KEY (`IDroute`),
  KEY `FK__station` (`IDstationFrom`),
  KEY `FK__station_2` (`IDstationTo`),
  CONSTRAINT `FK__station` FOREIGN KEY (`IDstationFrom`) REFERENCES `station` (`IDstation`),
  CONSTRAINT `FK__station_2` FOREIGN KEY (`IDstationTo`) REFERENCES `station` (`IDstation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bus routes';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.station
DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `IDstation` int(11) NOT NULL AUTO_INCREMENT,
  `IDcity` int(11) NOT NULL DEFAULT '0',
  `station` varchar(50) NOT NULL DEFAULT '0' COMMENT 'Station name',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Active',
  PRIMARY KEY (`IDstation`),
  KEY `FK__city` (`IDcity`),
  CONSTRAINT `FK__city` FOREIGN KEY (`IDcity`) REFERENCES `city` (`IDcity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stations table';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.ticket
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `IDticket` int(11) NOT NULL AUTO_INCREMENT,
  `IDcompany` int(11) NOT NULL,
  `IDroute` int(11) NOT NULL,
  `price` double NOT NULL COMMENT 'Price for route and company',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Active',
  PRIMARY KEY (`IDticket`),
  KEY `FK__company` (`IDcompany`),
  KEY `FK__route` (`IDroute`),
  CONSTRAINT `FK__company` FOREIGN KEY (`IDcompany`) REFERENCES `company` (`IDcompany`),
  CONSTRAINT `FK__route` FOREIGN KEY (`IDroute`) REFERENCES `route` (`IDroute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tickets to be bought by passenger';

-- Data exporting was unselected.


-- Dumping structure for table BusTicket.ticketTime
DROP TABLE IF EXISTS `ticketTime`;
CREATE TABLE IF NOT EXISTS `ticketTime` (
  `IDticketTime` int(11) NOT NULL AUTO_INCREMENT,
  `IDticket` int(11) NOT NULL DEFAULT '0',
  `timeStart` time NOT NULL DEFAULT '00:00:00',
  `timeEnd` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`IDticketTime`),
  KEY `FK__ticket` (`IDticket`),
  CONSTRAINT `FK__ticket` FOREIGN KEY (`IDticket`) REFERENCES `ticket` (`IDticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Times for every ticket';

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
