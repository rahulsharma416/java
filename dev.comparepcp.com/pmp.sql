-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: localhost    Database: pmp
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Audi','2017-08-28 22:55:08','2017-08-28 22:55:08');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,1,'A1','2017-08-28 22:55:31','2017-08-28 22:55:31');
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `trim` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `otr` double DEFAULT NULL,
  `customer_deposit` double DEFAULT NULL,
  `deposit_contribution` double DEFAULT NULL,
  `optional_final` double DEFAULT NULL,
  `rental` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `fixed_rate` double DEFAULT NULL,
  `excess_mileage` double DEFAULT NULL,
  `otp_fee` double DEFAULT NULL,
  `total_deposit` double DEFAULT NULL,
  `amount_financed` double DEFAULT NULL,
  `deposit_valid` char(1) DEFAULT NULL,
  `i` double DEFAULT NULL,
  `t` int(11) DEFAULT NULL,
  `t1` int(11) DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `f1` double DEFAULT NULL,
  `f2` double DEFAULT NULL,
  `f3` double DEFAULT NULL,
  `pmt` double DEFAULT NULL,
  `interest` double DEFAULT NULL,
  `check_val` double DEFAULT NULL,
  `trade_in_deposit` double DEFAULT NULL,
  `cash_deposit` double DEFAULT NULL,
  `min_deposit` double DEFAULT NULL,
  `max_total_deposit` double DEFAULT NULL,
  `acceptance_fee` double DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `finance_product` varchar(255) DEFAULT NULL,
  `feature1` varchar(255) DEFAULT NULL,
  `feature2` varchar(255) DEFAULT NULL,
  `feature3` varchar(255) DEFAULT NULL,
  `feature4` varchar(255) DEFAULT NULL,
  `feature5` varchar(255) DEFAULT NULL,
  `feature6` varchar(255) DEFAULT NULL,
  `t_c` text,
  PRIMARY KEY (`trim`,`period`,`mileage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (1,24,10000,15375,NULL,900,7991.4,NULL,5.9,5.83,3.98,10,NULL,NULL,'Y',0.00473072696171495,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473072696171495,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,24,20000,15375,NULL,900,7217.15,NULL,5.9,5.83,3.98,10,NULL,NULL,'Y',0.0047309825683949,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.0047309825683949,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,24,30000,15375,NULL,900,6547.4,NULL,5.9,5.83,3.98,10,NULL,NULL,'Y',0.00473054663678423,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473054663678423,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,36,10000,15375,NULL,900,7248.5,NULL,5.9,5.85,3.98,10,NULL,NULL,'Y',0.00474972919583747,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00474972919583747,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,36,20000,15375,NULL,900,6213,NULL,5.9,5.85,3.98,10,NULL,NULL,'Y',0.00474947538156397,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00474947538156397,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,36,30000,15375,NULL,900,5334.25,NULL,5.9,5.85,3.98,10,NULL,NULL,'Y',0.0047504149729539,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.0047504149729539,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,48,10000,15375,NULL,900,6563.55,NULL,5.9,5.84,3.98,10,NULL,NULL,'Y',0.00473896340247765,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473896340247765,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,48,20000,15375,NULL,900,5315.25,NULL,5.9,5.84,3.98,10,NULL,NULL,'Y',0.00473887352863159,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473887352863159,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(1,48,30000,15375,NULL,900,4349.1,NULL,5.9,5.84,3.98,10,NULL,NULL,'Y',0.00473923027808695,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473923027808695,0,0,1537.5,0,4612.5,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,24,10000,16450,NULL,900,8441.7,NULL,5.9,5.83,6,10,NULL,NULL,'Y',0.00473009189088264,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473009189088264,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,24,20000,16450,NULL,900,7635.15,NULL,5.9,5.83,6,10,NULL,NULL,'Y',0.00473113087930302,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473113087930302,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,24,30000,16450,NULL,900,6931.2,NULL,5.9,5.83,6,10,NULL,NULL,'Y',0.00472981442504804,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00472981442504804,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,36,10000,16450,NULL,900,7655.1,NULL,5.9,5.85,6,10,NULL,NULL,'Y',0.00474952425377473,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00474952425377473,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,36,20000,16450,NULL,900,6558.8,NULL,5.9,5.85,6,10,NULL,NULL,'Y',0.00475013969207666,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00475013969207666,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,36,30000,16450,NULL,900,5643,NULL,5.9,5.85,6,10,NULL,NULL,'Y',0.00475006177053203,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00475006177053203,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,48,10000,16450,NULL,900,6915.05,NULL,5.9,5.84,6,10,NULL,NULL,'Y',0.00473847721458863,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473847721458863,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,48,20000,16450,NULL,900,5624,NULL,5.9,5.84,6,10,NULL,NULL,'Y',0.00473825861409567,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473825861409567,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.'),(2,48,30000,16450,NULL,900,4615.1,NULL,5.9,5.84,6,10,NULL,NULL,'Y',0.00473952631699783,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00473952631699783,0,0,1645,0,4935,0,'1001.jpg','PCP','15? x 6J ?5-arm? design alloy wheels','Rear parking sensors','Cruise control','Halogen headlights with daytime light','Audi Concert radio','Manual air conditioning system','The representative example displayed here is not a finance quote. AutoPCP.com neither sell cars nor finance. This solution is a free service for the prospective new car buyers. Images are for illustrations only. Finance will be offered via dealer and may be subject to status and other Terms and conditions. For an exact quote, please contact your local dealer. * There shall be an excess charge if you drive a vehicle more than the agreed annual mileage. Our unique algorithm tries to generate an example with a minor tolerance of 1 pence in monthly rental. Please be advised that this is a free service and AutoPCP cant be held liable for any error.');
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trims`
--

DROP TABLE IF EXISTS `trims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trims`
--

LOCK TABLES `trims` WRITE;
/*!40000 ALTER TABLE `trims` DISABLE KEYS */;
INSERT INTO `trims` VALUES (1,1,'SE 1.0 TFSI Manual','2017-08-28 22:56:03','2017-08-28 22:56:03'),(2,1,'SE 1.6 TDI Manual','2017-08-28 22:56:21','2017-08-28 22:56:21');
/*!40000 ALTER TABLE `trims` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-28 23:47:29
