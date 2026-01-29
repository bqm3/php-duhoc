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
  `display_order` int DEFAULT '0',
  `isOnly` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,'Du học','du-hoc',0,0,'2026-01-07 07:40:15'),(4,'Học bổng','hoc-bong',0,0,'2026-01-07 07:40:42'),(6,'Tin tức','tin-tuc',0,0,'2026-01-07 07:41:02'),(7,'Chi phí','chi-phi',0,0,'2026-01-08 10:38:12'),(8,'Visa','visa',0,0,'2026-01-08 10:38:31'),(9,'Ngoại ngữ','ngoai-ngu',0,0,'2026-01-08 10:39:16'),(10,'Bảo hiểm và phúc lợi','bao-hiem-va-phuc-loi',0,0,'2026-01-08 10:40:20'),(11,'Ngành học nổi tiếng','nganh-hoc-noi-tieng',0,0,'2026-01-08 10:40:33'),(12,'Dịch vụ','dich-vu',0,0,'2026-01-08 10:44:01');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `idx_category` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,1,'thái bình','thai-binh',0,'2026-01-08 12:16:58','2026-01-08 12:17:48'),(2,1,'thái bình','thai-binh-1767874676',0,'2026-01-08 12:17:56','2026-01-08 12:17:56'),(3,2,'Tokyo','tokyo',1,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(4,2,'Osaka','osaka',2,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(5,3,'Seoul','seoul',1,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(6,3,'Busan','busan',2,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(7,4,'Singapore City','singapore-city',1,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(8,6,'London','london',1,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(9,6,'Manchester','manchester',2,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(10,11,'New York','new-york',1,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(11,11,'Los Angeles','los-angeles',2,'2026-01-20 01:43:22','2026-01-20 01:43:22'),(12,13,'Sydney','sydney',1,'2026-01-20 01:43:22','2026-01-20 01:43:22');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `message` text,
  `status` varchar(50) DEFAULT 'pending',
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultations`
--

LOCK TABLES `consultations` WRITE;
/*!40000 ALTER TABLE `consultations` DISABLE KEYS */;
INSERT INTO `consultations` VALUES (1,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'dsad','new',NULL,'2026-01-07 04:39:12','2026-01-29 03:12:52'),(2,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'s','new',NULL,'2026-01-07 04:44:29','2026-01-29 03:12:52'),(3,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'đá','new',NULL,'2026-01-07 04:59:27','2026-01-29 03:12:52'),(4,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'','new',NULL,'2026-01-07 05:08:56','2026-01-29 03:12:52'),(5,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'','new',NULL,'2026-01-07 05:12:19','2026-01-29 03:12:52'),(6,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'','new',NULL,'2026-01-07 06:37:02','2026-01-29 03:12:52'),(7,'đá','0375278021','admin@local.com',NULL,NULL,'đâsd','new',NULL,'2026-01-07 06:37:30','2026-01-29 03:12:52'),(8,'Nguyễn Đức','0375278021','admin@local.com',NULL,NULL,'','completed','<p>app.js:2 Uncaught SyntaxError: Unexpected token \'&lt;\'</p><p>installHook.js:1 Error: SyntaxError: Unexpected token \'&lt;\', \"&lt;!-- app/r\"... is not valid JSON</p><p>overrideMethod @ installHook.js:1</p><p>installHook.js:1 Error: SyntaxError: Unexpected token \'&lt;\', \"&lt;!-- app/r\"... is not valid JSON</p><p>overrideMethod @ installHook.js:1</p><p>(anonymous) @ public/:103</p><p>installHook.js:1 Error: SyntaxError: Unexpected token \'&lt;\', \"&lt;!-- app/r\"... is not valid JSON overrideMethod @ installHook.js:1 (anonymous) @ public/:103</p><div><br></div>','2026-01-07 06:42:18','2026-01-07 07:06:40'),(9,'Trần Minh Tuấn','0912345001','tuan.tm@email.com',NULL,NULL,'Muốn tư vấn du học Nhật Bản','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(10,'Lê Hồng Nhung','0923456002','nhung.lh@email.com',NULL,NULL,'Hỏi về học bổng Hàn Quốc','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(11,'Phạm Quốc Anh','0934567003','anh.pq@email.com',NULL,NULL,'Cần tư vấn chi phí du học Singapore','completed','<p>Đã tư vấn chi tiết về chi phí và chương trình học</p>','2026-01-20 01:46:00','2026-01-20 01:46:00'),(12,'Nguyễn Thị Mai','0945678004','mai.nt@email.com',NULL,NULL,'Xin thông tin về visa Úc','completed','<p>Đã hướng dẫn quy trình xin visa</p>','2026-01-20 01:46:00','2026-01-20 01:46:00'),(13,'Hoàng Văn Long','0956789005','long.hv@email.com',NULL,NULL,'Muốn biết về ngành CNTT tại Mỹ','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(14,'Đặng Thị Hương','0967890006','huong.dt@email.com',NULL,NULL,'Tư vấn chương trình thạc sĩ Anh','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(15,'Bùi Quang Huy','0978901007','huy.bq@email.com',NULL,NULL,'Hỏi về bảo hiểm y tế du học','completed','<p>Đã tư vấn các gói bảo hiểm phù hợp</p>','2026-01-20 01:46:00','2026-01-20 01:46:00'),(16,'Vũ Thị Lan','0989012008','lan.vt@email.com',NULL,NULL,'Cần thông tin học IELTS','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(17,'Phan Đức Thắng','0990123009','thang.pd@email.com',NULL,NULL,'Tư vấn du học Canada','new',NULL,'2026-01-20 01:46:00','2026-01-29 03:12:52'),(18,'Đinh Thị Thu','0901234010','thu.dt@email.com',NULL,NULL,'Muốn biết về học bổng New Zealand','completed','<p>Đã giới thiệu các chương trình học bổng</p>','2026-01-20 01:46:00','2026-01-20 01:46:00'),(19,'mạnh ','ádasd','','male',1,'sfasf','new',NULL,'2026-01-29 03:07:18','2026-01-29 03:12:52'),(20,'ầ','3243','','male',5,'đâsd','pending',NULL,'2026-01-29 03:13:55','2026-01-29 03:13:55');
/*!40000 ALTER TABLE `consultations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `continents`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `continents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continents`
--

LOCK TABLES `continents` WRITE;
/*!40000 ALTER TABLE `continents` DISABLE KEYS */;
INSERT INTO `continents` VALUES (1,'Châu Á','chau-a','Các quốc gia châu Á',NULL,1,'2026-01-07 10:12:34','2026-01-07 10:12:34'),(2,'Châu Âu','chau-au','Các quốc gia châu Âu',NULL,2,'2026-01-07 10:12:34','2026-01-07 10:12:34'),(3,'Bắc Mỹ','bac-my','Các quốc gia Bắc Mỹ',NULL,3,'2026-01-07 10:12:34','2026-01-07 10:12:34'),(4,'Châu Úc','chau-uc','Các quốc gia châu Úc',NULL,4,'2026-01-07 10:12:34','2026-01-07 10:12:34'),(5,'Nam Mỹ','nam-my','Các quốc gia Nam Mỹ',NULL,5,'2026-01-07 10:12:34','2026-01-07 10:12:34'),(6,'Châu Phi','chau-phi','Các quốc gia châu Phi',NULL,6,'2026-01-07 10:12:34','2026-01-07 10:12:34');
/*!40000 ALTER TABLE `continents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `continent_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `description` text,
  `flag_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `is_popular` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_continent` (`continent_id`),
  KEY `idx_popular` (`is_popular`),
  CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,1,'Việt Nam','viet-nam','VN','Du học tại Việt Nam','/assets/uploads/locations/flag_1767875280_8358.png','/assets/uploads/locations/country_1769657973_1285.jpg',1,1,'2026-01-07 10:13:09','2026-01-29 03:39:33'),(2,1,'Nhật Bản','nhat-ban','JP','Du học Nhật Bản',NULL,NULL,2,1,'2026-01-07 10:13:09','2026-01-07 10:13:09'),(3,1,'Hàn Quốc','han-quoc','KR','Du học Hàn Quốc',NULL,NULL,3,1,'2026-01-07 10:13:09','2026-01-07 10:13:09'),(4,1,'Singapore','singapore','SG','Du học Singapore',NULL,NULL,4,1,'2026-01-07 10:13:09','2026-01-07 10:13:09'),(5,1,'Trung Quốc','trung-quoc','CN','Du học Trung Quốc',NULL,NULL,5,0,'2026-01-07 10:13:09','2026-01-07 10:13:09'),(6,2,'Anh','anh','UK','Du học Anh Quốc','/assets/uploads/locations/flag_1767875258_4367.png',NULL,1,1,'2026-01-07 10:13:14','2026-01-08 12:27:38'),(7,2,'Đức','duc','DE','Du học Đức',NULL,NULL,2,1,'2026-01-07 10:13:14','2026-01-07 10:13:14'),(8,2,'Pháp','phap','FR','Du học Pháp',NULL,NULL,3,1,'2026-01-07 10:13:14','2026-01-07 10:13:14'),(9,2,'Hà Lan','ha-lan','NL','Du học Hà Lan',NULL,NULL,4,0,'2026-01-07 10:13:14','2026-01-07 10:13:14'),(10,2,'Thụy Sĩ','thuy-si','CH','Du học Thụy Sĩ',NULL,NULL,5,0,'2026-01-07 10:13:14','2026-01-07 10:13:14'),(11,3,'Mỹ','my','US','Du học Hoa Kỳ',NULL,NULL,1,1,'2026-01-07 10:13:18','2026-01-07 10:13:18'),(12,3,'Canada','canada','CA','Du học Canada',NULL,NULL,2,1,'2026-01-07 10:13:18','2026-01-07 10:13:18'),(13,4,'Úc','uc','AU','Du học Úc',NULL,NULL,1,1,'2026-01-07 10:13:21','2026-01-07 10:13:21'),(14,4,'New Zealand','new-zealand','NZ','Du học New Zealand',NULL,NULL,2,1,'2026-01-07 10:13:21','2026-01-07 10:13:21');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_levels`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education_levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_levels`
--

LOCK TABLES `education_levels` WRITE;
/*!40000 ALTER TABLE `education_levels` DISABLE KEYS */;
INSERT INTO `education_levels` VALUES (1,'Đại học','dai-hoc',0,'2026-01-08 12:22:52','2026-01-08 12:22:52'),(3,'Trung học phổ thông','trung-hoc-pho-thong',1,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(4,'Cao đẳng','cao-dang',2,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(5,'Thạc sĩ','thac-si',3,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(6,'Tiến sĩ','tien-si',4,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(7,'Chứng chỉ nghề','chung-chi-nghe',5,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(8,'Dự bị đại học','du-bi-dai-hoc',6,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(9,'Ngắn hạn','ngan-han',7,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(10,'Trung cấp','trung-cap',8,'2026-01-20 01:43:36','2026-01-20 01:43:36'),(11,'Sau đại học','sau-dai-hoc',9,'2026-01-20 01:43:36','2026-01-20 01:43:36');
/*!40000 ALTER TABLE `education_levels` ENABLE KEYS */;
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
  `summary` text,
  `category_id` int DEFAULT NULL,
  `featured_image` varchar(500) DEFAULT NULL,
  `content` longtext,
  `count_view` int DEFAULT '0',
  `count_share` int DEFAULT '0',
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `tag_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `country_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_slug` (`slug`),
  KEY `idx_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'du-hoc-nhat-ban-2026','Du học Nhật Bản 2026 - Cơ hội và thách thức','<p>Tổng quan về cơ hội du học Nhật Bản năm 2026 dành cho sinh viên Việt Nam</p>',3,'/assets/uploads/japan_study_2026.jpg','<p>Nhật Bản tiếp tục là điểm đến hấp dẫn cho sinh viên quốc tế với chất lượng giáo dục hàng đầu và môi trường học tập hiện đại.</p><p>Các trường đại học Nhật Bản đang mở rộng chương trình tiếp nhận du học sinh với nhiều học bổng hấp dẫn.</p>',346,28,0,1,'2026-01-29 07:04:46','2026-01-29 07:06:47',2,NULL),(2,2,'kinh-nghiem-du-hoc-han-quoc','Kinh nghiệm du học Hàn Quốc từ A-Z','<p>Chia sẻ kinh nghiệm thực tế về du học tại Hàn Quốc</p>',3,'/assets/uploads/korea_experience.jpg','<p>Hàn Quốc với nền giáo dục phát triển và chi phí hợp lý đang thu hút ngày càng nhiều sinh viên Việt Nam.</p><p>Văn hóa K-pop và K-drama cũng góp phần làm tăng sức hấp dẫn của quốc gia này.</p>',412,35,0,1,'2026-01-29 07:04:46','2026-01-29 07:04:46',3,NULL),(3,2,'du-hoc-singapore-nghanh-gi','Du học Singapore nên chọn ngành gì?','<p>Gợi ý các ngành học phổ biến và có triển vọng tại Singapore</p>',3,'/assets/uploads/singapore_majors.jpg','<p>Singapore nổi tiếng với các chương trình đào tạo về kinh doanh, công nghệ và kỹ thuật.</p><p>Môi trường đa văn hóa và cơ hội việc làm sau tốt nghiệp là những ưu điểm nổi bật.</p>',289,22,0,NULL,'2026-01-29 07:04:46','2026-01-29 07:04:46',4,NULL),(4,2,'du-hoc-anh-2026','Hướng dẫn du học Anh Quốc năm 2026','<p>Quy trình và điều kiện du học tại Vương quốc Anh</p>',3,'/assets/uploads/uk_study_guide.jpg','<p>Anh Quốc với hệ thống giáo dục lâu đời và uy tín là lựa chọn hàng đầu của nhiều du học sinh.</p><p>Các trường đại học danh tiếng như Oxford, Cambridge luôn trong top thế giới.</p>',567,45,0,1,'2026-01-29 07:04:46','2026-01-29 07:04:46',6,NULL),(5,2,'du-hoc-duc-mien-phi','Du học Đức - Cơ hội học miễn phí học phí','<p>Tìm hiểu về chương trình đào tạo miễn phí tại các trường công lập Đức</p>',3,'/assets/uploads/germany_free_study.jpg','<p>Đức là quốc gia duy nhất ở châu Âu cho phép du học sinh học miễn phí tại các trường đại học công lập.</p><p>Yêu cầu tiếng Đức và điều kiện tài chính cần được chuẩn bị kỹ lưỡng.</p>',634,52,0,1,'2026-01-29 07:04:46','2026-01-29 07:04:46',7,NULL),(6,2,'du-hoc-phap-nghanh-nghe-thuat','Du học Pháp ngành Nghệ thuật và Thiết kế','<p>Pháp - thiên đường cho những ai đam mê nghệ thuật</p>',3,'/assets/uploads/france_art.jpg','<p>Pháp là cái nôi của nghệ thuật châu Âu với nhiều trường đào tạo thiết kế, thời trang hàng đầu.</p><p>Paris Fashion Week và các viện bảo tàng nổi tiếng là nguồn cảm hứng bất tận.</p>',398,31,0,NULL,'2026-01-29 07:04:46','2026-01-29 07:04:46',8,NULL),(7,2,'du-hoc-my-dai-hoc-cong-dong','Du học Mỹ qua con đường Community College','<p>Tiết kiệm chi phí với chương trình 2+2 tại Mỹ</p>',3,'/assets/uploads/us_community_college.jpg','<p>Community College là lựa chọn thông minh để tiết kiệm chi phí và có cơ hội chuyển tiếp vào đại học 4 năm.</p><p>Học phí chỉ bằng 1/3 so với đại học truyền thống.</p>',523,41,0,2,'2026-01-29 07:04:46','2026-01-29 07:04:46',11,NULL),(8,2,'du-hoc-canada-dinh-cu','Du học Canada và cơ hội định cư','<p>Chính sách định cư thuận lợi cho du học sinh Canada</p>',3,'/assets/uploads/canada_immigration.jpg','<p>Canada là quốc gia có chính sách định cư thân thiện nhất với du học sinh.</p><p>Chương trình Post-Graduation Work Permit cho phép làm việc sau tốt nghiệp.</p>',712,58,0,1,'2026-01-29 07:04:46','2026-01-29 07:04:46',12,NULL),(9,2,'du-hoc-uc-visa-500','Hướng dẫn xin visa du học Úc (Visa 500)','<p>Quy trình và hồ sơ xin visa du học Úc chi tiết</p>',3,'/assets/uploads/australia_visa.jpg','<p>Visa 500 là loại visa dành cho du học sinh muốn theo học tại Úc.</p><p>Yêu cầu tài chính và bảo hiểm y tế là những điểm quan trọng cần lưu ý.</p>',456,37,0,NULL,'2026-01-29 07:04:46','2026-01-29 07:04:46',13,NULL),(10,2,'du-hoc-new-zealand','Du học New Zealand - Môi trường an toàn, thân thiện','<p>Khám phá đất nước xinh đẹp và yên bình dành cho du học sinh</p>',3,'/assets/uploads/newzealand_study.jpg','<p>New Zealand nổi tiếng với môi trường sống an toàn và con người thân thiện.</p><p>Chất lượng giáo dục cao với chi phí hợp lý hơn so với Úc.</p>',334,26,0,NULL,'2026-01-29 07:04:46','2026-01-29 07:04:46',14,NULL),(11,2,'hoc-bong-chinh-phu-nhat-ban','Học bổng Chính phủ Nhật Bản MEXT 2026','<p>Cơ hội nhận học bổng toàn phần từ Bộ Giáo dục Nhật Bản</p>',4,'/assets/uploads/mext_scholarship.jpg','<p>Học bổng MEXT là chương trình học bổng uy tín nhất của Chính phủ Nhật Bản.</p><p>Hỗ trợ 100% học phí, vé máy bay và sinh hoạt phí hàng tháng.</p>',892,76,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',2,NULL),(12,2,'hoc-bong-gks-han-quoc','Học bổng Chính phủ Hàn Quốc GKS 2026','<p>Chương trình học bổng toàn phần dành cho sinh viên quốc tế</p>',4,'/assets/uploads/gks_scholarship.jpg','<p>GKS (Global Korea Scholarship) là học bổng danh giá nhất của Hàn Quốc.</p><p>Bao gồm học phí, sinh hoạt phí và khóa học tiếng Hàn 1 năm.</p>',756,62,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',3,NULL),(13,2,'hoc-bong-chevening','Học bổng Chevening - Du học Anh toàn phần','<p>Học bổng danh giá của Chính phủ Anh dành cho thạc sĩ</p>',4,'/assets/uploads/chevening.jpg','<p>Chevening là học bổng uy tín nhất của Chính phủ Anh, dành cho các nhà lãnh đạo tương lai.</p><p>Hỗ trợ toàn bộ chi phí học tập và sinh hoạt trong 1 năm.</p>',623,51,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',6,NULL),(14,2,'hoc-bong-daad-duc','Học bổng DAAD - Cơ hội du học Đức','<p>Học bổng của Tổ chức trao đổi học thuật Đức</p>',4,'/assets/uploads/daad_scholarship.jpg','<p>DAAD cung cấp nhiều loại học bổng cho sinh viên, nghiên cứu sinh và giảng viên.</p><p>Đặc biệt hấp dẫn với các ngành kỹ thuật và khoa học.</p>',489,39,0,2,'2026-01-29 07:05:01','2026-01-29 07:05:01',7,NULL),(15,2,'hoc-bong-fulbright','Học bổng Fulbright - Du học Mỹ uy tín','<p>Chương trình trao đổi giáo dục lâu đời nhất của Mỹ</p>',4,'/assets/uploads/fulbright.jpg','<p>Fulbright là chương trình học bổng danh giá nhất để du học Mỹ.</p><p>Dành cho nghiên cứu sinh và học viên cao học xuất sắc.</p>',834,68,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',11,NULL),(16,2,'hoc-bong-eiffel-phap','Học bổng Eiffel Excellence - Du học Pháp','<p>Học bổng cao cấp của Chính phủ Pháp</p>',4,'/assets/uploads/eiffel_scholarship.jpg','<p>Chương trình Eiffel dành cho sinh viên xuất sắc theo học thạc sĩ và tiến sĩ.</p><p>Ưu tiên các ngành kỹ thuật, kinh tế, luật và khoa học chính trị.</p>',412,34,0,NULL,'2026-01-29 07:05:01','2026-01-29 07:05:01',8,NULL),(17,2,'hoc-bong-vanier-canada','Học bổng Vanier CGS - Tiến sĩ tại Canada','<p>Học bổng cao nhất của Canada dành cho nghiên cứu sinh tiến sĩ</p>',4,'/assets/uploads/vanier_scholarship.jpg','<p>Vanier Canada Graduate Scholarships trị giá 50,000 CAD/năm trong 3 năm.</p><p>Dành cho những nghiên cứu sinh xuất sắc nhất thế giới.</p>',567,46,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',12,NULL),(18,2,'hoc-bong-asean','Học bổng ASEAN dành cho sinh viên Việt Nam','<p>Các chương trình học bổng trong khu vực ASEAN</p>',4,'/assets/uploads/asean_scholarship.jpg','<p>Nhiều quốc gia ASEAN cung cấp học bổng cho sinh viên Việt Nam.</p><p>Singapore, Malaysia, Thailand là những điểm đến phổ biến.</p>',378,31,0,NULL,'2026-01-29 07:05:01','2026-01-29 07:05:01',4,NULL),(19,2,'hoc-bong-endeavour-uc','Học bổng Endeavour - Chính phủ Úc','<p>Học bổng uy tín của Chính phủ Úc cho sinh viên quốc tế</p>',4,'/assets/uploads/endeavour_scholarship.jpg','<p>Endeavour Scholarships hỗ trợ toàn bộ chi phí du học tại Úc.</p><p>Dành cho các bậc đại học, thạc sĩ và tiến sĩ.</p>',445,36,0,NULL,'2026-01-29 07:05:01','2026-01-29 07:05:01',13,NULL),(20,2,'hoc-bong-truong','Top học bổng của các trường đại học hàng đầu','<p>Tổng hợp học bổng từ các trường đại học danh tiếng</p>',4,'/assets/uploads/university_scholarships.jpg','<p>Nhiều trường đại học tự cung cấp học bổng hấp dẫn cho sinh viên quốc tế.</p><p>Yale, Harvard, Oxford, Cambridge đều có chương trình học bổng riêng.</p>',923,75,0,1,'2026-01-29 07:05:01','2026-01-29 07:05:01',NULL,NULL),(21,2,'chinh-sach-visa-moi-nhat-ban','Nhật Bản nới lỏng chính sách visa cho du học sinh','<p>Chính sách mới giúp du học sinh dễ dàng xin visa hơn</p>',6,'/assets/uploads/japan_visa_news.jpg','<p>Chính phủ Nhật Bản vừa công bố chính sách mới giúp đơn giản hóa thủ tục xin visa.</p><p>Đây là tin vui cho sinh viên Việt Nam có nguyện vọng du học Nhật.</p>',678,55,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',2,NULL),(22,2,'han-quoc-mo-rong-hoc-bong','Hàn Quốc tăng ngân sách học bổng năm 2026','<p>Số lượng học bổng GKS tăng 20% so với năm trước</p>',6,'/assets/uploads/korea_scholarship_news.jpg','<p>Chính phủ Hàn Quốc quyết định tăng đầu tư cho giáo dục quốc tế.</p><p>Dự kiến sẽ có thêm 500 suất học bổng toàn phần cho sinh viên ASEAN.</p>',543,44,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',3,NULL),(23,2,'anh-thu-hut-du-hoc-sinh','Anh Quốc nỗ lực thu hút du học sinh sau Brexit','<p>Các chính sách mới nhằm thu hút nhân tài quốc tế</p>',6,'/assets/uploads/uk_post_brexit.jpg','<p>Sau Brexit, Anh đã có nhiều thay đổi trong chính sách visa và học phí.</p><p>Tuy nhiên, chất lượng giáo dục vẫn giữ vững vị thế hàng đầu thế giới.</p>',412,33,0,NULL,'2026-01-29 07:05:06','2026-01-29 07:05:06',6,NULL),(24,2,'my-mo-lai-visa-du-hoc','Mỹ mở lại hoàn toàn visa du học sau đại dịch','<p>Tin vui cho sinh viên quốc tế muốn du học Mỹ</p>',6,'/assets/uploads/us_visa_reopening.jpg','<p>Đại sứ quán Mỹ tại Việt Nam đã hoạt động trở lại bình thường.</p><p>Thời gian xử lý visa được rút ngắn đáng kể.</p>',789,64,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',11,NULL),(25,2,'canada-nang-cap-immigration','Canada cải cách hệ thống định cư cho du học sinh','<p>Express Entry có những thay đổi quan trọng</p>',6,'/assets/uploads/canada_immigration_reform.jpg','<p>Chính phủ Canada công bố kế hoạch cải cách Express Entry.</p><p>Du học sinh sẽ có nhiều ưu đãi hơn trong quá trình xin định cư.</p>',856,70,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',12,NULL),(26,2,'uc-mo-rong-work-permit','Úc kéo dài thời gian work permit cho du học sinh','<p>Từ 2 năm lên 4 năm cho một số ngành</p>',6,'/assets/uploads/australia_work_permit.jpg','<p>Chính phủ Úc vừa thông qua chính sách kéo dài thời gian work permit.</p><p>Các ngành kỹ thuật, y tế, giáo dục được hưởng lợi nhiều nhất.</p>',634,52,0,2,'2026-01-29 07:05:06','2026-01-29 07:05:06',13,NULL),(27,2,'singapore-giam-hoc-phi','Singapore giảm học phí cho sinh viên ASEAN','<p>Chính sách mới có hiệu lực từ năm học 2026</p>',6,'/assets/uploads/singapore_tuition_reduction.jpg','<p>Chính phủ Singapore quyết định hỗ trợ học phí cho sinh viên ASEAN.</p><p>Mức giảm có thể lên đến 30% tùy ngành học.</p>',567,46,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',4,NULL),(28,2,'duc-thieu-nhan-luc-cntt','Đức cần 500,000 lao động IT trong 5 năm tới','<p>Cơ hội lớn cho sinh viên ngành công nghệ thông tin</p>',6,'/assets/uploads/germany_it_shortage.jpg','<p>Ngành công nghệ Đức đang thiếu hụt nghiêm trọng nguồn nhân lực.</p><p>Đây là cơ hội tuyệt vời cho du học sinh ngành IT.</p>',723,59,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',7,NULL),(29,2,'phap-mo-cua-du-hoc-sinh-vn','Pháp tăng cường hợp tác giáo dục với Việt Nam','<p>Ký kết nhiều thỏa thuận hợp tác mới</p>',6,'/assets/uploads/france_vietnam_cooperation.jpg','<p>Đại sứ quán Pháp và Bộ Giáo dục Việt Nam ký nhiều thỏa thuận hợp tác.</p><p>Số lượng du học sinh Việt Nam tại Pháp dự kiến tăng mạnh.</p>',445,36,0,NULL,'2026-01-29 07:05:06','2026-01-29 07:05:06',8,NULL),(30,2,'xu-huong-du-hoc-2026','Xu hướng du học năm 2026 - Điểm đến nào hot nhất?','<p>Phân tích xu hướng lựa chọn quốc gia du học của sinh viên Việt</p>',6,'/assets/uploads/study_abroad_trends_2026.jpg','<p>Khảo sát cho thấy Nhật Bản, Hàn Quốc vẫn dẫn đầu về số lượng.</p><p>Canada và Đức ngày càng trở nên hấp dẫn với chính sách thân thiện.</p>',912,74,0,1,'2026-01-29 07:05:06','2026-01-29 07:05:06',NULL,NULL),(31,2,'chi-phi-du-hoc-nhat-1-nam','Chi phí du học Nhật Bản 1 năm hết bao nhiêu?','<p>Tổng hợp chi tiết các khoản chi phí cần thiết</p>',7,'/assets/uploads/japan_cost_breakdown.jpg','<p>Học phí trung bình: 500,000 - 800,000 JPY/năm tại trường công lập.</p><p>Sinh hoạt phí: khoảng 100,000 - 150,000 JPY/tháng.</p><p>Tổng chi phí 1 năm: khoảng 20,000 - 25,000 USD.</p>',834,68,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',2,NULL),(32,2,'chi-phi-du-hoc-han-quoc-toan-tap','Bảng chi phí du học Hàn Quốc cập nhật 2026','<p>Học phí, sinh hoạt, chỗ ở tất cả trong một bài viết</p>',7,'/assets/uploads/korea_cost_guide.jpg','<p>Học phí: 4-6 triệu KRW/học kỳ tại trường công.</p><p>Ký túc xá: 300,000 - 500,000 KRW/tháng.</p><p>Chi phí ăn uống: 300,000 - 400,000 KRW/tháng.</p>',723,59,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',3,NULL),(33,2,'chi-phi-du-hoc-singapore-2026','Tổng quan chi phí du học Singapore năm 2026','<p>Từ học phí đến sinh hoạt, tất cả đều có trong bài này</p>',7,'/assets/uploads/singapore_expenses.jpg','<p>Học phí: 30,000 - 50,000 SGD/năm.</p><p>Chỗ ở: 500 - 1,500 SGD/tháng.</p><p>Chi phí sinh hoạt: 800 - 1,200 SGD/tháng.</p>',612,50,0,NULL,'2026-01-29 07:05:11','2026-01-29 07:05:11',4,NULL),(34,2,'chi-phi-du-hoc-anh-2026','Chi phí du học Anh Quốc năm 2026','<p>Phân tích chi tiết các khoản chi phí tại Vương quốc Anh</p>',7,'/assets/uploads/uk_cost_analysis.jpg','<p>Học phí: 15,000 - 35,000 GBP/năm tùy trường và ngành.</p><p>Sinh hoạt phí tại London: 1,200 - 1,500 GBP/tháng.</p><p>Các thành phố khác: 900 - 1,200 GBP/tháng.</p>',891,72,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',6,NULL),(35,2,'chi-phi-du-hoc-duc-mien-phi-hoc-phi','Du học Đức: Miễn học phí nhưng tốn bao nhiêu?','<p>Phân tích các khoản chi phí khi du học Đức</p>',7,'/assets/uploads/germany_living_costs.jpg','<p>Học phí: 0 EUR tại trường công (chỉ đóng phí hành chính 250-300 EUR/kỳ).</p><p>Sinh hoạt: 850 - 1,200 EUR/tháng.</p><p>Bảo hiểm y tế bắt buộc: 110 EUR/tháng.</p>',756,61,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',7,NULL),(36,2,'chi-phi-du-hoc-phap-phan-tich','Phân tích chi phí du học Pháp toàn diện','<p>Từ học phí đến chi phí sống tại Paris và các tỉnh</p>',7,'/assets/uploads/france_cost_comparison.jpg','<p>Học phí trường công: 170 - 600 EUR/năm.</p><p>Sinh hoạt tại Paris: 1,200 - 1,800 EUR/tháng.</p><p>Các tỉnh: 800 - 1,000 EUR/tháng.</p>',534,43,0,NULL,'2026-01-29 07:05:11','2026-01-29 07:05:11',8,NULL),(37,2,'chi-phi-du-hoc-my-toan-tap','Tổng hợp chi phí du học Mỹ năm 2026','<p>Bảng chi phí đầy đủ từ A-Z cho du học sinh Mỹ</p>',7,'/assets/uploads/us_comprehensive_costs.jpg','<p>Học phí: 20,000 - 50,000 USD/năm tùy loại trường.</p><p>Sinh hoạt: 1,000 - 2,000 USD/tháng.</p><p>Bảo hiểm y tế: 1,500 - 2,500 USD/năm.</p>',923,75,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',11,NULL),(38,2,'chi-phi-du-hoc-canada-chi-tiet','Chi phí du học Canada chi tiết từng khoản','<p>Hướng dẫn lập kế hoạch tài chính du học Canada</p>',7,'/assets/uploads/canada_budget_planning.jpg','<p>Học phí: 15,000 - 30,000 CAD/năm.</p><p>Sinh hoạt: 1,000 - 1,500 CAD/tháng.</p><p>Chi phí sách vở: 1,000 CAD/năm.</p>',678,55,0,NULL,'2026-01-29 07:05:11','2026-01-29 07:05:11',12,NULL),(39,2,'chi-phi-du-hoc-uc-2026','Bảng tính chi phí du học Úc năm 2026','<p>Công cụ tính chi phí du học Úc chi tiết nhất</p>',7,'/assets/uploads/australia_cost_calculator.jpg','<p>Học phí: 20,000 - 45,000 AUD/năm.</p><p>Sinh hoạt: 1,400 - 2,500 AUD/tháng tùy thành phố.</p><p>Bảo hiểm OSHC: khoảng 500 AUD/năm.</p>',789,64,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',13,NULL),(40,2,'tiet-kiem-chi-phi-du-hoc','Bí quyết tiết kiệm chi phí khi đi du học','<p>Những cách thông minh để giảm chi phí du học</p>',7,'/assets/uploads/save_money_tips.jpg','<p>Làm thêm part-time hợp pháp.</p><p>Tìm học bổng và trợ cấp.</p><p>Ở ký túc xá thay vì thuê nhà riêng.</p><p>Nấu ăn tự phục vụ thay vì ăn ngoài.</p>',1012,82,0,1,'2026-01-29 07:05:11','2026-01-29 07:05:11',NULL,NULL),(41,2,'thu-tuc-xin-visa-du-hoc-nhat','Thủ tục xin visa du học Nhật Bản từ A-Z','<p>Hướng dẫn chi tiết quy trình xin visa du học Nhật</p>',8,'/assets/uploads/japan_visa_process.jpg','<p>Bước 1: Nhận Certificate of Eligibility (COE) từ trường.</p><p>Bước 2: Chuẩn bị hồ sơ visa.</p><p>Bước 3: Nộp hồ sơ tại Đại sứ quán Nhật Bản.</p><p>Thời gian xử lý: 5-7 ngày làm việc.</p>',846,69,0,1,'2026-01-29 07:05:17','2026-01-29 07:06:51',2,NULL),(42,2,'visa-du-hoc-han-quoc-d-2','Hướng dẫn xin visa D-2 du học Hàn Quốc','<p>Tất cả thông tin về visa D-2 cho sinh viên</p>',8,'/assets/uploads/korea_d2_visa.jpg','<p>Visa D-2 dành cho du học sinh theo học tại các trường đại học Hàn Quốc.</p><p>Hồ sơ yêu cầu: Giấy nhập học, chứng minh tài chính, bảng điểm.</p><p>Thời gian xử lý: 7-10 ngày làm việc.</p>',735,60,0,1,'2026-01-29 07:05:17','2026-01-29 07:07:02',3,NULL),(43,2,'xin-visa-tier-4-anh-quoc','Cách xin visa Tier 4 du học Anh Quốc','<p>Quy trình và hồ sơ cần thiết cho visa du học Anh</p>',8,'/assets/uploads/uk_tier4_visa.jpg','<p>Visa Tier 4 (hiện là Student Visa) cho phép học tập tại Anh.</p><p>Cần có CAS (Confirmation of Acceptance for Studies) từ trường.</p><p>Chứng minh tài chính: 9,207 GBP/năm cho London, 7,747 GBP/năm cho các vùng khác.</p>',612,50,0,NULL,'2026-01-29 07:05:17','2026-01-29 07:05:17',6,NULL),(44,2,'visa-f1-du-hoc-my','Hướng dẫn xin visa F-1 du học Mỹ','<p>Quy trình phỏng vấn và chuẩn bị hồ sơ visa F-1</p>',8,'/assets/uploads/us_f1_visa_guide.jpg','<p>Visa F-1 là loại visa phổ biến nhất cho du học sinh Mỹ.</p><p>Cần có I-20 từ trường và chứng minh tài chính đầy đủ.</p><p>Phỏng vấn tại Đại sứ quán là bước quan trọng nhất.</p>',924,75,0,1,'2026-01-29 07:05:17','2026-01-29 07:07:00',11,NULL),(45,2,'visa-du-hoc-canada-study-permit','Xin Study Permit Canada online như thế nào?','<p>Hướng dẫn nộp hồ sơ visa du học Canada trực tuyến</p>',8,'/assets/uploads/canada_study_permit.jpg','<p>Study Permit Canada được xin online hoàn toàn.</p><p>Cần có Letter of Acceptance, chứng minh tài chính, khám sức khỏe.</p><p>Thời gian xử lý: 4-8 tuần.</p>',789,64,0,1,'2026-01-29 07:05:17','2026-01-29 07:05:17',12,NULL),(46,2,'visa-500-du-hoc-uc','Xin visa 500 du học Úc - Lưu ý quan trọng','<p>Những điều cần biết khi xin visa du học Úc</p>',8,'/assets/uploads/australia_visa_500.jpg','<p>Visa 500 cho phép du học tại Úc.</p><p>Yêu cầu COE, GTE statement, chứng minh tài chính và bảo hiểm OSHC.</p><p>Có thể xin online hoặc qua trung tâm visa.</p>',679,55,0,NULL,'2026-01-29 07:05:17','2026-01-29 07:07:03',13,NULL),(47,2,'visa-du-hoc-duc-dieu-kien','Điều kiện xin visa du học Đức năm 2026','<p>Hồ sơ và yêu cầu tài chính khi xin visa Đức</p>',8,'/assets/uploads/germany_visa_requirements.jpg','<p>Cần chứng minh tài chính tối thiểu 11,208 EUR/năm.</p><p>Giấy nhập học từ trường Đức.</p><p>Bảo hiểm y tế du học sinh.</p><p>Chứng chỉ tiếng Đức (nếu học bằng tiếng Đức).</p>',567,46,0,NULL,'2026-01-29 07:05:17','2026-01-29 07:05:17',7,NULL),(48,2,'visa-du-hoc-phap-campus-france','Xin visa du học Pháp qua Campus France','<p>Hướng dẫn quy trình xin visa qua Campus France</p>',8,'/assets/uploads/france_campus_france_visa.jpg','<p>Tất cả du học sinh Pháp phải qua Campus France.</p><p>Phỏng vấn tại Campus France là bước bắt buộc.</p><p>Sau khi pass phỏng vấn mới được nộp hồ sơ visa.</p>',446,36,0,NULL,'2026-01-29 07:05:17','2026-01-29 07:06:57',8,NULL),(49,2,'bi-tu-visa-du-hoc-phai-lam-gi','Bị từ chối visa du học - Giải pháp nào?','<p>Cách xử lý khi hồ sơ visa bị từ chối</p>',8,'/assets/uploads/visa_rejection_solutions.jpg','<p>Tìm hiểu lý do bị từ chối cụ thể.</p><p>Bổ sung hoặc sửa chữa hồ sơ theo yêu cầu.</p><p>Có thể nộp lại sau khi khắc phục.</p><p>Tham khảo ý kiến chuyên gia nếu cần.</p>',712,58,0,1,'2026-01-29 07:05:17','2026-01-29 07:05:17',NULL,NULL),(50,2,'hoc-tieng-nhat-cho-nguoi-moi-bat-dau','Học tiếng Nhật cho người mới bắt đầu','<p>Lộ trình học tiếng Nhật từ con số 0</p>',9,'/assets/uploads/learn_japanese_beginner.jpg','<p>Bắt đầu với Hiragana và Katakana.</p><p>Học từ vựng và ngữ pháp cơ bản N5.</p><p>Luyện nghe qua anime và nhạc Nhật.</p><p>Tham gia các câu lạc bộ giao lưu tiếng Nhật.</p>',1023,83,0,1,'2026-01-29 07:05:21','2026-01-29 07:05:21',2,NULL),(51,2,'luyen-thi-topik-hieu-qua','Cách luyện thi TOPIK đạt điểm cao','<p>Bí quyết đạt TOPIK 5-6 cho người tự học</p>',9,'/assets/uploads/topik_study_tips.jpg','<p>TOPIK là chứng chỉ tiếng Hàn quan trọng nhất.</p><p>Ôn tập theo cấu trúc đề thi: Nghe, Đọc, Viết.</p><p>Luyện từ vựng chuyên ngành.</p><p>Làm đề thi thử thường xuyên.</p>',867,71,0,1,'2026-01-29 07:05:21','2026-01-29 07:05:21',3,NULL),(52,2,'luyen-thi-ielts-7-0','Lộ trình tự học IELTS 7.0+ hiệu quả','<p>Phương pháp tự học IELTS đạt 7.0 trong 3 tháng</p>',9,'/assets/uploads/ielts_7_roadmap.jpg','<p>Đặt mục tiêu cụ thể cho từng kỹ năng.</p><p>Luyện Writing Task 2 mỗi ngày.</p><p>Nghe BBC, CNN để cải thiện Listening.</p><p>Đọc báo tiếng Anh thường xuyên.</p>',1245,101,0,1,'2026-01-29 07:05:21','2026-01-29 07:05:21',NULL,NULL),(53,2,'hoc-tieng-duc-online','Top khóa học tiếng Đức online miễn phí','<p>Các nguồn học tiếng Đức online chất lượng</p>',9,'/assets/uploads/learn_german_online.jpg','<p>Deutsche Welle - DW Learn German miễn phí.</p><p>Duolingo cho người mới bắt đầu.</p><p>Coursera có các khóa học từ đại học Đức.</p><p>YouTube channels: Easy German, Learn German with Anja.</p>',678,55,0,NULL,'2026-01-29 07:05:21','2026-01-29 07:05:21',7,NULL),(54,2,'luyen-thi-delf-dalf','Chuẩn bị thi DELF/DALF tiếng Pháp','<p>Hướng dẫn ôn tập và chiến lược thi DELF/DALF</p>',9,'/assets/uploads/delf_dalf_preparation.jpg','<p>DELF/DALF là chứng chỉ tiếng Pháp quốc tế.</p><p>Cần luyện cả 4 kỹ năng: Nghe, Nói, Đọc, Viết.</p><p>Tham gia lớp luyện thi tại Alliance Française.</p>',534,43,0,NULL,'2026-01-29 07:05:21','2026-01-29 07:05:21',8,NULL),(55,2,'hoc-tieng-anh-academic','Tiếng Anh học thuật cho du học sinh','<p>Cải thiện tiếng Anh học thuật trước khi du học</p>',9,'/assets/uploads/academic_english.jpg','<p>Học cách viết essay theo format chuẩn.</p><p>Luyện kỹ năng làm presentation.</p><p>Nắm vững từ vựng học thuật.</p><p>Biết cách trích dẫn và tránh đạo văn.</p>',789,64,0,1,'2026-01-29 07:05:21','2026-01-29 07:05:21',NULL,NULL),(56,2,'toefl-ibt-vs-ielts','So sánh TOEFL iBT và IELTS - Nên chọn cái nào?','<p>Phân tích ưu nhược điểm của TOEFL và IELTS</p>',9,'/assets/uploads/toefl_vs_ielts.jpg','<p>TOEFL iBT được ưa chuộng tại Mỹ.</p><p>IELTS phổ biến ở Anh, Úc, Canada.</p><p>TOEFL làm hoàn toàn trên máy tính.</p><p>IELTS có phần Speaking face-to-face.</p>',923,75,0,NULL,'2026-01-29 07:05:21','2026-01-29 07:05:21',NULL,NULL),(57,2,'hoc-tieng-trung-cho-du-hoc','Học tiếng Trung cho du học sinh','<p>Những điều cần biết khi học tiếng Trung</p>',9,'/assets/uploads/learn_chinese.jpg','<p>HSK là chứng chỉ tiếng Trung chuẩn quốc tế.</p><p>Bắt đầu với Pinyin và chữ Hán cơ bản.</p><p>Luyện giao tiếp hàng ngày.</p><p>Tham gia các diễn đàn tiếng Trung.</p>',612,50,0,NULL,'2026-01-29 07:05:21','2026-01-29 07:05:21',5,NULL),(58,2,'cac-chung-chi-ngoai-ngu-can-biet','Tổng hợp các chứng chỉ ngoại ngữ du học cần có','<p>Danh sách chứng chỉ ngoại ngữ theo từng quốc gia</p>',9,'/assets/uploads/language_certificates.jpg','<p>Anh: IELTS, TOEFL, PTE Academic.</p><p>Nhật: JLPT, EJU.</p><p>Hàn: TOPIK.</p><p>Đức: TestDaF, DSH, Goethe-Zertifikat.</p><p>Pháp: DELF, DALF, TCF.</p>',845,69,0,1,'2026-01-29 07:05:21','2026-01-29 07:05:21',NULL,NULL),(59,2,'tai-lieu-luyen-thi-ngoai-ngu','Top tài liệu luyện thi ngoại ngữ miễn phí','<p>Chia sẻ nguồn tài liệu học ngoại ngữ chất lượng</p>',9,'/assets/uploads/free_language_resources.jpg','<p>Cambridge English - Free resources.</p><p>JLPT Official website - Sample tests.</p><p>TOPIK Guide - Full resources.</p><p>British Council - Free IELTS materials.</p>',734,60,0,NULL,'2026-01-29 07:05:21','2026-01-29 07:05:21',NULL,NULL),(60,2,'bao-hiem-y-te-du-hoc-nhat','Hướng dẫn mua bảo hiểm y tế du học Nhật Bản','<p>Tất cả thông tin về bảo hiểm y tế tại Nhật</p>',10,'/assets/uploads/japan_health_insurance.jpg','<p>Bảo hiểm y tế quốc dân (Kokumin Kenko Hoken) là bắt buộc.</p><p>Chi phí: khoảng 20,000 JPY/năm.</p><p>Được chi trả 70% chi phí y tế.</p><p>Đăng ký tại văn phòng quận/huyện nơi cư trú.</p>',678,55,0,1,'2026-01-29 07:05:27','2026-01-29 07:05:27',2,NULL),(61,2,'bao-hiem-du-hoc-han-quoc','Bảo hiểm y tế bắt buộc khi du học Hàn Quốc','<p>Các loại bảo hiểm du học sinh Hàn Quốc cần biết</p>',10,'/assets/uploads/korea_insurance_guide.jpg','<p>National Health Insurance (NHI) bắt buộc cho du học sinh.</p><p>Chi phí: 60,000 - 100,000 KRW/tháng.</p><p>Được hoàn 50-80% chi phí khám chữa bệnh.</p>',534,43,0,NULL,'2026-01-29 07:05:27','2026-01-29 07:05:27',3,NULL),(62,2,'oshc-bao-hiem-du-hoc-uc','OSHC - Bảo hiểm du học sinh bắt buộc tại Úc','<p>Tìm hiểu về Overseas Student Health Cover</p>',10,'/assets/uploads/australia_oshc.jpg','<p>OSHC là điều kiện bắt buộc để xin visa Úc.</p><p>Chi phí: 500 - 700 AUD/năm.</p><p>Các nhà cung cấp: Medibank, Bupa, AHM, NIB...</p><p>Cần mua trước khi nộp hồ sơ visa.</p>',789,64,0,1,'2026-01-29 07:05:27','2026-01-29 07:05:27',13,NULL),(63,2,'bao-hiem-du-hoc-my','So sánh các gói bảo hiểm y tế du học Mỹ','<p>Chọn gói bảo hiểm phù hợp với du học sinh Mỹ</p>',10,'/assets/uploads/us_health_insurance_comparison.jpg','<p>Nhiều trường yêu cầu mua bảo hiểm của trường.</p><p>Chi phí: 1,500 - 3,000 USD/năm.</p><p>Có thể tự tìm gói bảo hiểm rẻ hơn nếu đáp ứng yêu cầu tối thiểu.</p>',845,69,0,NULL,'2026-01-29 07:05:27','2026-01-29 07:05:27',11,NULL),(64,2,'bao-hiem-y-te-canada','Bảo hiểm y tế công và tư tại Canada','<p>Hệ thống bảo hiểm y tế của Canada cho du học sinh</p>',10,'/assets/uploads/canada_healthcare_system.jpg','<p>Một số tỉnh cung cấp bảo hiểm công cho du học sinh.</p><p>Ontario, British Columbia có Medical Services Plan.</p><p>Các tỉnh khác cần mua bảo hiểm tư nhân.</p>',612,50,0,NULL,'2026-01-29 07:05:27','2026-01-29 07:05:27',12,NULL),(65,2,'bao-hiem-du-hoc-duc','Bảo hiểm y tế bắt buộc khi du học Đức','<p>Public vs Private insurance tại Đức</p>',10,'/assets/uploads/germany_insurance_types.jpg','<p>Bảo hiểm y tế là điều kiện xin visa Đức.</p><p>Dưới 30 tuổi: Bảo hiểm công (GKV) khoảng 110 EUR/tháng.</p><p>Trên 30 tuổi: Có thể chọn bảo hiểm tư (PKV).</p>',567,46,0,NULL,'2026-01-29 07:05:27','2026-01-29 07:05:27',7,NULL),(66,2,'bao-hiem-du-hoc-anh','NHS và bảo hiểm y tế du học sinh Anh','<p>Quyền lợi y tế của du học sinh tại Anh</p>',10,'/assets/uploads/uk_nhs_guide.jpg','<p>Du học sinh phải đóng Immigration Health Surcharge (IHS).</p><p>Chi phí: 470 GBP/năm.</p><p>Được sử dụng dịch vụ NHS như người dân Anh.</p>',734,60,0,1,'2026-01-29 07:05:27','2026-01-29 07:05:27',6,NULL),(67,2,'bao-hiem-du-hoc-singapore','Bảo hiểm y tế du học Singapore giá rẻ','<p>Các gói bảo hiểm phù hợp với túi tiền sinh viên</p>',10,'/assets/uploads/singapore_student_insurance.jpg','<p>Nhiều trường yêu cầu mua bảo hiểm thông qua trường.</p><p>Chi phí: 150 - 300 SGD/năm.</p><p>Có thể tự tìm gói bảo hiểm bên ngoài rẻ hơn.</p>',445,36,0,NULL,'2026-01-29 07:05:27','2026-01-29 07:05:27',4,NULL),(68,2,'phuc-loi-du-hoc-sinh','Các quyền lợi và phúc lợi của du học sinh','<p>Tổng hợp quyền lợi du học sinh ở các quốc gia</p>',10,'/assets/uploads/student_benefits_worldwide.jpg','<p>Giảm giá phương tiện công cộng.</p><p>Giảm giá vé tham quan bảo tàng, di tích.</p><p>Giảm giá phần mềm, dịch vụ (Apple, Microsoft, Adobe...).</p><p>Được làm thêm part-time theo quy định.</p>',923,75,0,1,'2026-01-29 07:05:27','2026-01-29 07:05:27',NULL,NULL),(69,2,'lam-them-du-hoc','Quy định làm thêm cho du học sinh','<p>Số giờ được phép làm và quyền lợi lao động</p>',10,'/assets/uploads/student_part_time_regulations.jpg','<p>Nhật: 28 giờ/tuần (40 giờ trong kỳ nghỉ).</p><p>Úc: 48 giờ/2 tuần khi học, không giới hạn khi nghỉ.</p><p>Canada: 20 giờ/tuần khi học, full-time khi nghỉ.</p><p>Anh: 20 giờ/tuần khi học.</p>',867,71,0,1,'2026-01-29 07:05:27','2026-01-29 07:05:27',NULL,NULL),(70,2,'nganh-cntt-nhat-ban','Ngành Công nghệ thông tin tại Nhật Bản','<p>Tại sao nên học IT ở Nhật?</p>',11,'/assets/uploads/japan_it_major.jpg','<p>Nhật Bản là cường quốc công nghệ thế giới.</p><p>Nhu cầu nhân lực IT rất lớn.</p><p>Lương cao và cơ hội việc làm tốt.</p><p>Các trường nổi tiếng: University of Tokyo, Keio University.</p>',1123,91,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',2,NULL),(71,2,'nganh-kinh-doanh-singapore','Học ngành Kinh doanh tại Singapore','<p>Singapore - Trung tâm tài chính châu Á</p>',11,'/assets/uploads/singapore_business.jpg','<p>Singapore là trung tâm kinh doanh và tài chính hàng đầu.</p><p>Các trường top: NUS Business School, SMU.</p><p>Cơ hội thực tập tại các tập đoàn đa quốc gia.</p>',845,69,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',4,NULL),(72,2,'nganh-y-khoa-han-quoc','Du học ngành Y khoa tại Hàn Quốc','<p>Y tế Hàn Quốc - Chất lượng hàng đầu châu Á</p>',11,'/assets/uploads/korea_medicine.jpg','<p>Hàn Quốc nổi tiếng về công nghệ y tế tiên tiến.</p><p>Chương trình đào tạo Y khoa 6 năm.</p><p>Cần có trình độ tiếng Hàn TOPIK 5-6.</p>',678,55,0,NULL,'2026-01-29 07:05:31','2026-01-29 07:05:31',3,NULL),(73,2,'nganh-luat-anh-quoc','Ngành Luật tại Anh Quốc','<p>Học Luật tại cái nôi của hệ thống Common Law</p>',11,'/assets/uploads/uk_law_major.jpg','<p>Anh là nơi khởi nguồn của hệ thống Common Law.</p><p>Các trường danh tiếng: Oxford, Cambridge, LSE.</p><p>Cơ hội thực tập tại các văn phòng luật quốc tế.</p>',734,60,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',6,NULL),(74,2,'nganh-ky-thuat-duc','Ngành Kỹ thuật - Thế mạnh của Đức','<p>Tại sao Đức là thiên đường cho sinh viên kỹ thuật?</p>',11,'/assets/uploads/germany_engineering.jpg','<p>Đức nổi tiếng với nền công nghiệp kỹ thuật.</p><p>Các trường TU Munich, TU Berlin hàng đầu thế giới.</p><p>Cơ hội làm việc tại BMW, Siemens, Bosch...</p>',923,75,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',7,NULL),(75,2,'nganh-khoa-hoc-may-tinh-my','Khoa học máy tính tại Mỹ - Top of the world','<p>Các trường CS hàng đầu nước Mỹ</p>',11,'/assets/uploads/us_computer_science.jpg','<p>Mỹ dẫn đầu thế giới về công nghệ.</p><p>MIT, Stanford, CMU - Những cái tên vàng trong làng CS.</p><p>Thung lũng Silicon - Thiên đường cho dân IT.</p>',1245,101,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',11,NULL),(76,2,'nganh-thiet-ke-phap','Thiết kế thời trang và Mỹ thuật tại Pháp','<p>Pháp - Cái nôi của thời trang thế giới</p>',11,'/assets/uploads/france_fashion_design.jpg','<p>Paris - Thủ đô thời trang thế giới.</p><p>Các trường danh tiếng: ESMOD, IFM, Parsons Paris.</p><p>Cơ hội thực tập tại Chanel, Dior, Louis Vuitton.</p>',789,64,0,NULL,'2026-01-29 07:05:31','2026-01-29 07:05:31',8,NULL),(77,2,'nganh-quan-tri-khach-san-thuy-si','Quản trị khách sạn tại Thụy Sĩ','<p>Thụy Sĩ - Số 1 thế giới về đào tạo hospitality</p>',11,'/assets/uploads/switzerland_hospitality.jpg','<p>Thụy Sĩ nổi tiếng với ngành quản trị khách sạn.</p><p>Các trường: Les Roches, Glion, EHL.</p><p>Chương trình kết hợp lý thuyết và thực hành.</p>',612,50,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',NULL,NULL),(78,2,'nganh-sinh-hoc-bien-uc','Sinh học biển và Môi trường tại Úc','<p>Úc - Thiên đường nghiên cứu sinh học biển</p>',11,'/assets/uploads/australia_marine_biology.jpg','<p>Úc có Great Barrier Reef - hệ sinh thái biển lớn nhất.</p><p>Các trường: University of Queensland, James Cook University.</p><p>Cơ hội nghiên cứu thực địa phong phú.</p>',567,46,0,NULL,'2026-01-29 07:05:31','2026-01-29 07:05:31',13,NULL),(79,2,'nganh-AI-machine-learning','AI và Machine Learning - Ngành hot nhất 2026','<p>Xu hướng học AI/ML ở các quốc gia phát triển</p>',11,'/assets/uploads/ai_ml_trending.jpg','<p>AI/ML đang là xu hướng toàn cầu.</p><p>Nhu cầu nhân lực rất lớn với mức lương cao.</p><p>Các trường top: MIT, Stanford, CMU, Oxford, ETH Zurich.</p>',1334,108,0,1,'2026-01-29 07:05:31','2026-01-29 07:05:31',NULL,NULL),(80,2,'dich-vu-tu-van-du-hoc-nhat','Top 5 công ty tư vấn du học Nhật uy tín','<p>Đánh giá các trung tâm tư vấn du học Nhật tại VN</p>',12,'/assets/uploads/japan_consulting_services.jpg','<p>JSA - Japan Study Abroad Center.</p><p>Nhật Minh Trang.</p><p>ILA Vietnam.</p><p>Edutrust.</p><p>Du học Nhật Bản JST.</p>',734,60,0,1,'2026-01-29 07:05:45','2026-01-29 07:05:45',2,NULL),(81,2,'dich-vu-visa-han-quoc','Dịch vụ hỗ trợ làm visa Hàn Quốc','<p>Các công ty làm visa Hàn Quốc uy tín</p>',12,'/assets/uploads/korea_visa_services.jpg','<p>Kore Vietnam.</p><p>Du học Hàn Quốc Korealink.</p><p>Visa Korea - Korean Dream.</p><p>Dịch vụ đa dạng từ tư vấn đến làm hồ sơ.</p>',567,46,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',3,NULL),(82,2,'dich-vu-dich-thuat-tai-lieu','Dịch vụ dịch thuật công chứng hồ sơ du học','<p>Địa chỉ dịch thuật uy tín cho hồ sơ du học</p>',12,'/assets/uploads/translation_services.jpg','<p>Dịch thuật công chứng bảng điểm, bằng cấp.</p><p>Dịch tài liệu tài chính, giấy tờ gia đình.</p><p>Dịch động lực học tập, kế hoạch học tập.</p>',445,36,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(83,2,'dich-vu-tim-nha-du-hoc','Hỗ trợ tìm nhà ở cho du học sinh','<p>Các dịch vụ tìm kiếm chỗ ở ở nước ngoài</p>',12,'/assets/uploads/accommodation_services.jpg','<p>Hỗ trợ tìm ký túc xá, homestay.</p><p>Tư vấn thuê căn hộ, share house.</p><p>Booking trước khi xuất cảnh.</p>',612,50,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(84,2,'dich-vu-don-san-bay','Dịch vụ đón sân bay cho du học sinh mới','<p>Các dịch vụ hỗ trợ du học sinh khi mới đến</p>',12,'/assets/uploads/airport_pickup_service.jpg','<p>Đón tại sân bay và đưa về chỗ ở.</p><p>Hướng dẫn các thủ tục đầu tiên.</p><p>Hỗ trợ mua sim, mở tài khoản ngân hàng.</p>',378,31,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(85,2,'dich-vu-ho-tro-xin-hoc-bong','Tư vấn và viết hồ sơ xin học bổng','<p>Dịch vụ chuyên viết motivation letter, CV</p>',12,'/assets/uploads/scholarship_application_services.jpg','<p>Viết motivation letter chuyên nghiệp.</p><p>Tư vấn chọn học bổng phù hợp.</p><p>Review và chỉnh sửa hồ sơ.</p>',823,67,0,1,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(86,2,'dich-vu-hoc-tieng-truoc-khi-di','Khóa học ngoại ngữ intensive trước du học','<p>Các trung tâm dạy ngoại ngữ chất lượng</p>',12,'/assets/uploads/intensive_language_courses.jpg','<p>Khóa intensive IELTS, TOEFL.</p><p>Lớp tiếng Nhật, Hàn chuyên du học.</p><p>Khóa học tiếng Đức, Pháp.</p>',689,56,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(87,2,'dich-vu-nop-ho-so-truc-tuyen','Hỗ trợ nộp hồ sơ nhập học online','<p>Dịch vụ apply trường thay cho du học sinh</p>',12,'/assets/uploads/online_application_support.jpg','<p>Hỗ trợ apply qua UCAS, Common App.</p><p>Nộp hồ sơ vào các trường Úc, Canada.</p><p>Tư vấn chọn trường phù hợp.</p>',534,43,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(88,2,'dich-vu-chuyen-tien-quoc-te','Dịch vụ chuyển tiền ra nước ngoài','<p>Các cách chuyển tiền du học tiết kiệm</p>',12,'/assets/uploads/international_money_transfer.jpg','<p>Western Union, MoneyGram.</p><p>TransferWise (Wise).</p><p>Chuyển qua ngân hàng.</p><p>So sánh phí và tỷ giá.</p>',712,58,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL),(89,2,'dich-vu-ho-tro-sau-du-hoc','Dịch vụ hỗ trợ du học sinh sau khi về nước','<p>Kết nối cựu du học sinh, tư vấn nghề nghiệp</p>',12,'/assets/uploads/post_study_support.jpg','<p>Tư vấn tìm việc sau tốt nghiệp.</p><p>Kết nối cộng đồng cựu du học sinh.</p><p>Hỗ trợ công nhận bằng cấp.</p>',456,37,0,NULL,'2026-01-29 07:05:45','2026-01-29 07:05:45',NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `country_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `education_level_id` int DEFAULT NULL,
  `tuition_fee` varchar(255) DEFAULT NULL COMMENT 'Học phí',
  `image_url` varchar(500) DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `idx_country` (`country_id`),
  KEY `idx_city` (`city_id`),
  KEY `idx_edu_level` (`education_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (2,'Đại học Quốc gia Hà Nội','dai-hoc-quoc-gia-ha-noi',1,1,1,'20.000.000 - 30.000.000 VND/năm',NULL,'<p>Trường đại học hàng đầu Việt Nam với nhiều chuyên ngành đào tạo chất lượng cao.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(3,'Đại học Tokyo','dai-hoc-tokyo',2,3,1,'500.000 - 800.000 JPY/năm',NULL,'<p>Một trong những trường đại học uy tín nhất Nhật Bản.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(4,'Đại học Quốc gia Seoul','dai-hoc-quoc-gia-seoul',3,5,1,'4.000.000 - 6.000.000 KRW/học kỳ',NULL,'<p>Trường đại học hàng đầu Hàn Quốc với nhiều ngành học nổi bật.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(5,'Đại học Quốc gia Singapore','dai-hoc-quoc-gia-singapore',4,7,1,'30.000 - 50.000 SGD/năm',NULL,'<p>Trường đại học top đầu châu Á.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(6,'Đại học Oxford','dai-hoc-oxford',6,8,1,'25.000 - 40.000 GBP/năm',NULL,'<p>Một trong những trường đại học lâu đời và uy tín nhất thế giới.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(7,'Đại học Harvard','dai-hoc-harvard',11,10,1,'50.000 - 70.000 USD/năm',NULL,'<p>Trường đại học danh giá hàng đầu nước Mỹ.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(8,'Đại học Sydney','dai-hoc-sydney',13,12,1,'35.000 - 50.000 AUD/năm',NULL,'<p>Trường đại học lớn và uy tín tại Úc.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(9,'Cao đẳng Osaka','cao-dang-osaka',2,4,2,'300.000 - 500.000 JPY/năm',NULL,'<p>Chương trình đào tạo cao đẳng chất lượng tại Nhật.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(10,'Học viện Công nghệ Singapore','hoc-vien-cong-nghe-singapore',4,7,1,'25.000 - 40.000 SGD/năm',NULL,'<p>Chuyên đào tạo về công nghệ và kỹ thuật.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49'),(11,'Đại học Bách khoa Hà Nội','dai-hoc-bach-khoa-ha-noi',1,1,1,'25.000.000 - 35.000.000 VND/năm',NULL,'<p>Trường kỹ thuật hàng đầu Việt Nam.</p>','2026-01-20 01:43:49','2026-01-20 01:43:49');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Hot','fa fa-star text-warning','2026-01-29 02:13:41','2026-01-29 02:13:41'),(2,'New','fa fa-certificate text-danger','2026-01-29 02:25:28','2026-01-29 02:28:01');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'staff@local.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Nguyễn Văn A','female','1995-08-20','0989123456','staff',1,'2026-01-06 03:56:21','2026-01-09 11:08:06'),(2,'admin@local.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','ADMIN','male','2002-08-20','0989123456','admin',0,'2026-01-06 03:56:24','2026-01-06 09:02:57'),(3,'user1@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Trần Văn B','male','1990-05-15','0912345678','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(4,'user2@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Lê Thị C','female','1992-08-22','0923456789','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(5,'user3@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Phạm Văn D','male','1988-12-10','0934567890','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(6,'staff2@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Hoàng Thị E','female','1995-03-18','0945678901','staff',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(7,'user4@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Ngô Văn F','male','1993-07-25','0956789012','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(8,'user5@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Đặng Thị G','female','1991-11-30','0967890123','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(9,'user6@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Bùi Văn H','male','1989-04-05','0978901234','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(10,'staff3@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Vũ Thị I','female','1994-09-12','0989012345','staff',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(11,'user7@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Dương Văn K','male','1996-02-28','0990123456','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49'),(12,'user8@example.com','$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu','Phan Thị L','female','1997-06-14','0901234567','user',0,'2026-01-20 01:42:49','2026-01-20 01:42:49');
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

-- Dump completed on 2026-01-29 14:08:20
