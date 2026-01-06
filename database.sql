-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: dulich
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'test danh muc','test-danh-muc','2026-01-06 04:57:22');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `content` longtext,
  `count_view` int DEFAULT '0',
  `count_share` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_slug` (`slug`),
  KEY `idx_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'dasdasdasd-adsadsa','dasdasdasd ádsadsa',1,'<ul><li style=\"text-align: center;\"><b><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">BẢNG\r\nPHÂN TÍCH DỮ LIỆU TỪ HỆ THỐNG<o:p></o:p></span></b></li><li style=\"text-align: center;\"><i><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">(Tổng\r\nhợp từ báo cáo sự cố các dự án PMC – giai đoạn 2025)</span></i><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\"><o:p></o:p></span></li><li><b><span style=\"font-size:13.0pt;line-height:115%;\r\nfont-family:&quot;Times New Roman&quot;,serif\">I. CÁC DỰ ÁN CÓ SỐ LƯỢNG SỰ CỐ ĐÁNG LƯU Ý\r\nTRONG NĂM 2025<o:p></o:p></span></b></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:\r\n&quot;Times New Roman&quot;,serif\">Căn cứ tổng hợp dữ liệu sự cố vận hành trong năm 2025,\r\nmột số dự án ghi nhận số lượng sự cố ở mức đáng lưu ý, bao gồm:<o:p></o:p></span></li>\r\n <ul><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">Monarchy\r\n     B (Sơn Trà, Đà Nẵng): 32 sự cố<o:p></o:p></span></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">Hiyori\r\n     Đà Nẵng (Sơn Trà, Đà Nẵng): 14 sự cố<o:p></o:p></span></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">Văn\r\n     Phú Victoria (Hà Đông, Hà Nội): 6 sự cố<o:p></o:p></span></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">Gelexia\r\n     Riverside (Hoàng Mai, Hà Nội): 4 sự cố<o:p></o:p></span></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\">Ruby\r\n     Goldmark City (Bắc Từ Liêm, Hà Nội): 2 sự cố</span></li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif\"><o:p><br></o:p></span></li></ul></ul><p><font face=\"Times New Roman, serif\"><span style=\"font-size: 17.3333px;\">ádasd</span></font></p><ul>\r\n \r\n \r\n \r\n </ul><ul style=\"margin-top:0in\" type=\"disc\">\r\n<li style=\"text-align: center;\"><img src=\"https://images.pexels.com/photos/674010/pexels-photo-674010.jpeg\" style=\"width: 25%; float: right;\" class=\"note-float-right\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</li><li><span style=\"font-size:13.0pt;line-height:115%;font-family:\r\n&quot;Times New Roman&quot;,serif\">Nhận xét &amp; cảnh báosdaddsa<b>đâsd<u>đâsd</u></b><o:p></o:p></span></li></ul>',0,0,'2026-01-06 07:36:25','2026-01-06 09:41:41');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(190) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `gender` enum('male','female','other') DEFAULT 'other',
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','user','staff') NOT NULL DEFAULT 'user',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'staff@local.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Nguyễn Văn A','female','1995-08-20','0989123456','staff',0,'2026-01-06 03:56:21','2026-01-06 05:09:22'),(2,'admin@local.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','ADMIN','male','2002-08-20','0989123456','admin',0,'2026-01-06 03:56:24','2026-01-06 09:02:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dulich'
--

--
-- Dumping routines for database 'dulich'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-06 16:53:58
