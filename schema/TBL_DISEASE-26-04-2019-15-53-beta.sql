-- Generation time: Fri, 26 Apr 2019 15:53:33 +0000
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

DROP TABLE IF EXISTS `TBL_DISEASE`;
CREATE TABLE `TBL_DISEASE` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `CODE` varchar(30) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `CONFIG` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO `TBL_DISEASE` VALUES ('1','stbm','non','commodi',''),
('2','sang','sit','nihil',''),
('3','jray','dolores','ducimus',''),
('4','wabd','eum','odit',''),
('5','dvsg','labore','numquam',''),
('6','acis','enim','in',''),
('7','zcgq','saepe','soluta',''),
('8','vpbh','quo','architecto',''),
('9','jghg','ipsa','tenetur',''),
('10','kxrs','doloribus','ea',''),
('11','bulm','praesentium','ut',''),
('12','tswq','ducimus','facere',''),
('13','ezyu','illo','ducimus',''),
('14','reap','aperiam','facilis',''),
('15','ezai','et','est',''),
('16','ryhb','eius','occaecati',''),
('17','hzjp','quis','deserunt',''),
('18','yequ','consequatur','minima',''),
('19','cvmf','perferendis','debitis',''),
('20','isuc','veritatis','illum',''),
('21','bvdb','accusamus','totam',''),
('22','pgit','aut','debitis',''),
('23','tghe','est','sint',''),
('24','vuab','mollitia','occaecati',''),
('25','xfug','possimus','totam',''),
('26','pgeq','minus','eveniet',''),
('27','brjf','exercitationem','quam',''),
('28','xdso','accusantium','hic',''),
('29','zfhn','consectetur','quia',''),
('30','eyqj','sint','voluptate',''); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

