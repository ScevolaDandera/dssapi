-- Generation time: Fri, 26 Apr 2019 16:36:58 +0000
-- Host: mysql.hostinger.ro
-- DB name: u574849695_25
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `TBL_LOCATION`;
CREATE TABLE `TBL_LOCATION` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `POS` varchar(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ISLAND_CODE` varchar(10) NOT NULL,
  `REGION_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

INSERT INTO `TBL_LOCATION` VALUES ('1','-14.066851','Bernardville','North','NV'),
('2','-71.386508','Dougton','West','MD'),
('3','66.502488','North Milo','Lake','MD'),
('4','-58.081489','West Keatonmouth','Port','VA'),
('5','68.768181','Kulasshire','Port','GA'),
('6','85.599313','East Reynold','South','ND'),
('7','-1.497881','Hodkiewiczville','Port','MS'),
('8','74.480725','New Ronaldoville','North','IN'),
('9','-85.205889','North Dockfurt','South','IL'),
('10','30.928020','East Apriltown','New','UT'),
('11','58.819782','North Ari','South','SC'),
('12','85.285051','Boyerborough','South','KS'),
('13','-5.093675','Cummeratahaven','North','SC'),
('14','8.370373','Adamshire','South','ME'),
('15','-53.905474','East Regan','North','MT'),
('16','48.761563','Goodwinport','New','NJ'),
('17','-46.832864','Rosaliamouth','South','NM'),
('18','-3.277269','Howellberg','South','NM'),
('19','-40.769309','Port Octavia','Lake','OH'),
('20','-36.409589','West Annamae','North','MD'),
('21','-19.329609','Port Cristopherburgh','Port','AR'),
('22','-54.555977','Lake Shanyhaven','North','VT'),
('23','-73.904316','Haneborough','Port','TX'),
('24','-23.292731','New Margot','Lake','MA'),
('25','-50.091454','Madalinemouth','Port','NM'),
('26','-78.593326','North Salma','East','VA'),
('27','-49.821956','Lake Estherchester','New','AK'),
('28','18.667245','Port Dexter','Port','TN'),
('29','-0.930135','Port Ewellmouth','New','TN'),
('30','87.769328','North Carmelo','North','ME'),
('31','41.586855','South Orrinton','Lake','HI'),
('32','-53.987914','Dashawnborough','West','IL'),
('33','54.950050','Streichland','South','HI'),
('34','6.008065','Goyettetown','South','NJ'),
('35','-45.540967','Kesslertown','Lake','MN'),
('36','-68.254715','Emmashire','East','AZ'),
('37','45.897337','Crooksberg','South','TX'),
('38','12.390503','North Laverne','New','IN'),
('39','-52.004258','Labadieville','West','PA'),
('40','34.047741','Chesleyland','West','ME'),
('41','-19.516050','Turnertown','Port','PA'),
('42','-35.203778','North Luciousmouth','North','SD'),
('43','75.555819','North Janaland','South','NJ'),
('44','40.560140','New Jacklynmouth','North','WY'),
('45','44.678916','Greenfelderburgh','North','FL'),
('46','-59.248025','Funkside','North','NM'),
('47','87.984530','Port Dariantown','East','MS'),
('48','-9.176646','Heidenreichhaven','West','NE'),
('49','-67.221017','Verdafurt','East','WV'),
('50','45.697906','Lake Floport','East','MS'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

