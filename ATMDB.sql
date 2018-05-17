-- MySQL dump 10.13  Distrib 5.7.21, for macos10.13 (x86_64)
--
-- Host: localhost    Database: ATM
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Courses`
--

DROP TABLE IF EXISTS `Courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Courses` (
  `courseCode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `department` int(10) unsigned NOT NULL,
  `instructor` int(10) unsigned NOT NULL,
  `location` varchar(32) NOT NULL DEFAULT 'TBD',
  `semester` varchar(8) NOT NULL,
  `year` char(4) NOT NULL,
  `capacity` int(11) DEFAULT '30',
  PRIMARY KEY (`courseCode`),
  KEY `department` (`department`),
  KEY `instructor` (`instructor`),
  CONSTRAINT `Courses_ibfk_1` FOREIGN KEY (`department`) REFERENCES `Departments` (`departmentID`),
  CONSTRAINT `Courses_ibfk_2` FOREIGN KEY (`instructor`) REFERENCES `Instructors` (`instructorID`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Courses`
--

LOCK TABLES `Courses` WRITE;
/*!40000 ALTER TABLE `Courses` DISABLE KEYS */;
INSERT INTO `Courses` VALUES (89,'Intro to Physical Chemistry',1,214,'TBD','spring','2017',30),(155,'Algorithms',3,130,'NAC7/105','fall','2016',30),(156,'Linear Algebra',4,234,'NAC4/221','fall','2016',30),(157,'Database Systems',3,294,'NAC4/225','spring','2018',30),(159,'Theoretical Computer Science',3,295,'TBD','fall','2018',30),(160,'Discrete Math',3,295,'TBD','fall','2018',30),(161,'Methods of Differential Equation',4,234,'NAC6/108','fall','2016',30);
/*!40000 ALTER TABLE `Courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Departments`
--

DROP TABLE IF EXISTS `Departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Departments` (
  `departmentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phoneNumber` varchar(32) NOT NULL,
  PRIMARY KEY (`departmentID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phoneNumber` (`phoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Departments`
--

LOCK TABLES `Departments` WRITE;
/*!40000 ALTER TABLE `Departments` DISABLE KEYS */;
INSERT INTO `Departments` VALUES (1,'Chemistry','chemistry@ccny.cuny.edu','9646819113'),(2,'Theatre','theatre@ccny.cuny.edu','4794260252'),(3,'Computer Science','cs@ccny.cuny.edu','4675163809'),(4,'Mathematics','math@ccny.cuny.edu','8321233423'),(5,'History','history@ccny.cuny.edu','9281340293'),(6,'Anthropology','anthropology@ccny.cuny.edu','6330090355'),(9,'Art','art@ccny.cuny.edu','5572642087'),(11,'English','english@ccny.cuny.edu','5940618670'),(13,'Music','music@ccny.cuny.edu','9855799006'),(15,'Physics','physics@ccny.cuny.edu','5289862833');
/*!40000 ALTER TABLE `Departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Enrollment`
--

DROP TABLE IF EXISTS `Enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enrollment` (
  `studentID` int(10) unsigned NOT NULL,
  `courseCode` int(10) unsigned NOT NULL,
  `grade` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`studentID`,`courseCode`),
  KEY `courseCode` (`courseCode`),
  CONSTRAINT `Enrollment_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Students` (`studentID`),
  CONSTRAINT `Enrollment_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `Courses` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enrollment`
--

LOCK TABLES `Enrollment` WRITE;
/*!40000 ALTER TABLE `Enrollment` DISABLE KEYS */;
INSERT INTO `Enrollment` VALUES (1,155,'A'),(1,157,'B+'),(469,155,'B+'),(469,157,NULL),(480,89,'A'),(480,157,NULL),(483,156,'A+'),(485,89,'C'),(488,157,NULL),(492,155,'A+');
/*!40000 ALTER TABLE `Enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instructors`
--

DROP TABLE IF EXISTS `Instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instructors` (
  `instructorID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `department` int(10) unsigned NOT NULL,
  `email` varchar(32) NOT NULL,
  `phoneNumber` char(10) DEFAULT NULL,
  PRIMARY KEY (`instructorID`),
  UNIQUE KEY `email` (`email`),
  KEY `department` (`department`),
  CONSTRAINT `Instructors_ibfk_1` FOREIGN KEY (`department`) REFERENCES `Departments` (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instructors`
--

LOCK TABLES `Instructors` WRITE;
/*!40000 ALTER TABLE `Instructors` DISABLE KEYS */;
INSERT INTO `Instructors` VALUES (128,'roger','evans',5,'revans@ccny.cuny.edu',NULL),(129,'ana','lopez',2,'alopez@ccny.cuny.edu','5542673464'),(130,'omar','cross',3,'ocross@ccny.cuny.edu','5911052324'),(214,'anita','barber',1,'abarber@ccny.cuny.edu',NULL),(234,'alton','roberson',4,'aroberson@ccny.cuny.edu',NULL),(264,'myra','ortega',1,'mortega@ccny.cuny.edu','6482037975'),(265,'randal','hanson',3,'rhanson@ccny.cuny.edu','2931299165'),(266,'myra','hanson',5,'mhanson@ccny.cuny.edu','3143121866'),(267,'julius','day',5,'jday@ccny.cuny.edu','9845644739'),(268,'toby','ortega',3,'tortega@ccny.cuny.edu','1536726761'),(269,'toby','wilson',1,'twilson@ccny.cuny.edu','5585090175'),(270,'myra','nelson',2,'mnelson@ccny.cuny.edu','3837612686'),(271,'myra','wilson',3,'mwilson@ccny.cuny.edu','7683010466'),(272,'scott','nelson',3,'snelson@ccny.cuny.edu','6298790542'),(273,'toby','nelson',2,'tnelson@ccny.cuny.edu','1081969126'),(294,'john','connor',3,'jconnor@ccny.cuny.edu',NULL),(295,'leonid','gurvits',3,'lgurvits@ccny.cuny.edu','3476935301'),(296,'akira','kawaguchi',3,'akawaguchi@ccny.cuny.edu',''),(297,'berry','damon',9,'bdamon@ccny.cuny.edu','6668978494');
/*!40000 ALTER TABLE `Instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students` (
  `studentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `GPA` decimal(3,2) unsigned NOT NULL DEFAULT '0.00',
  `email` varchar(32) NOT NULL,
  `phoneNumber` char(10) DEFAULT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students`
--

LOCK TABLES `Students` WRITE;
/*!40000 ALTER TABLE `Students` DISABLE KEYS */;
INSERT INTO `Students` VALUES (1,'matthew','jacome',3.33,'matthew@email.com',NULL),(469,'tobias','he',3.01,'tobias@email.com','3784421262'),(480,'andrew','gabriel',3.20,'agabriel@email.com','4728346163'),(481,'barry','cross',2.09,'bcross@email.com','8385812513'),(482,'christian','cross',2.68,'ccross@email.com','7600278165'),(483,'april','holt',3.69,'aholt@email.com','4835414782'),(484,'max','cross',3.37,'mcross@email.com','9348182869'),(485,'barry','cole',2.91,'bcole@email.com','2440531113'),(486,'ana','lloyd',3.21,'alloyd@email.com','2935183100'),(487,'ana','harper',3.62,'aharper@email.com','1894679819'),(488,'ana','cross',3.56,'across@email.com','4869304433'),(489,'barry','hawkins',3.99,'bhawkins@email.com','4532809070'),(490,'michael','cole',2.12,'mcole@email.com','1145917096'),(491,'percy','moss',0.00,'pmoss@email.com',NULL),(492,'edwin','flores',4.00,'eflores@email.com',NULL),(493,'noel','sosa',0.00,'nsosa@ccny.cuny.edu','');
/*!40000 ALTER TABLE `Students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-17 15:33:00
