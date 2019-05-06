#
# TABLE STRUCTURE FOR: TBL_DISEASE
#

DROP TABLE IF EXISTS `TBL_DISEASE`;

CREATE TABLE `TBL_DISEASE` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `CODE` varchar(30) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `CONFIG` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: TBL_LOCATION
#

DROP TABLE IF EXISTS `TBL_LOCATION`;

CREATE TABLE `TBL_LOCATION` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `POS` varchar(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ISLAND_CODE` varchar(10) NOT NULL,
  `REGION_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: TBL_REPORT
#

DROP TABLE IF EXISTS `TBL_REPORT`;

CREATE TABLE `TBL_REPORT` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `AGE` int(3) unsigned NOT NULL,
  `GENDER` char(3) NOT NULL,
  `DISEASE_ID` int(9) unsigned NOT NULL,
  `LOCATION_ID` int(9) unsigned NOT NULL,
  `DATETIME` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

