-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: elpatiomexicano
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_pers` int NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `avatar` text,
  PRIMARY KEY (`id_pers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_msg`
--

DROP TABLE IF EXISTS `categorie_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie_msg` (
  `id_cat_msg` int NOT NULL,
  `lib_cat_msg` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_msg`
--

LOCK TABLES `categorie_msg` WRITE;
/*!40000 ALTER TABLE `categorie_msg` DISABLE KEYS */;
INSERT INTO `categorie_msg` VALUES (1,'Avis'),(2,'Suggestion'),(3,'Je reserve une table');
/*!40000 ALTER TABLE `categorie_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_plat`
--

DROP TABLE IF EXISTS `categorie_plat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie_plat` (
  `id_cat_plat` int NOT NULL,
  `lib_cat_plat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat_plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_plat`
--

LOCK TABLES `categorie_plat` WRITE;
/*!40000 ALTER TABLE `categorie_plat` DISABLE KEYS */;
INSERT INTO `categorie_plat` VALUES (1,'snacks'),(2,'entrees'),(3,'plats'),(4,'desserts'),(5,'boissons');
/*!40000 ALTER TABLE `categorie_plat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commande` (
  `id_cmde` int NOT NULL AUTO_INCREMENT,
  `date_cmde` varchar(20) NOT NULL,
  `id_statut` int NOT NULL,
  `id_role` int NOT NULL,
  `id_pers` int NOT NULL,
  `prix_total` int NOT NULL,
  PRIMARY KEY (`id_cmde`),
  KEY `id_statut` (`id_statut`),
  KEY `id_role` (`id_role`,`id_pers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenir` (
  `id_plat` int NOT NULL,
  `id_cmde` int NOT NULL,
  `nombre_plats` int NOT NULL,
  PRIMARY KEY (`id_plat`,`id_cmde`),
  KEY `id_commande` (`id_cmde`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenir`
--

LOCK TABLES `contenir` WRITE;
/*!40000 ALTER TABLE `contenir` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscrit` (
  `id` int NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscrit`
--

LOCK TABLES `inscrit` WRITE;
/*!40000 ALTER TABLE `inscrit` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscrit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invite` (
  `id_pers` int NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invite`
--

LOCK TABLES `invite` WRITE;
/*!40000 ALTER TABLE `invite` DISABLE KEYS */;
INSERT INTO `invite` VALUES (124,NULL),(125,NULL),(126,NULL),(127,NULL),(128,NULL),(129,NULL),(130,NULL),(131,NULL),(132,NULL),(133,NULL),(134,NULL),(135,NULL),(136,NULL),(137,NULL),(138,NULL),(139,NULL),(140,NULL),(141,NULL),(142,NULL),(143,NULL),(144,NULL),(145,NULL),(146,NULL),(147,NULL),(148,NULL),(149,NULL),(150,NULL),(151,NULL),(152,NULL),(153,NULL),(154,NULL),(155,NULL),(156,NULL),(157,NULL),(158,NULL),(159,NULL),(160,NULL),(161,NULL),(162,NULL),(163,NULL),(164,NULL),(165,NULL),(166,NULL),(167,NULL),(168,NULL),(169,NULL),(170,NULL),(171,NULL),(172,NULL),(173,NULL),(174,NULL),(175,NULL),(176,NULL),(177,NULL),(178,NULL),(179,NULL),(180,NULL),(181,NULL);
/*!40000 ALTER TABLE `invite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id_msg` int NOT NULL AUTO_INCREMENT,
  `date_envoi` date NOT NULL,
  `texte` text NOT NULL,
  `id_cat_msg` int NOT NULL,
  `id_pers` int NOT NULL,
  PRIMARY KEY (`id_msg`),
  KEY `id_categorie` (`id_cat_msg`),
  KEY `id_role` (`id_pers`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'2023-08-07','opzeponjvkmpfezvg',1,1),(2,'2023-08-07','Cafard dans mon assiette a fuir',1,2),(3,'2023-08-07','Je souhaiterai reserver 5 tables le 4 janvier 2026',3,3),(4,'2023-08-07','Amet natus ipsum si',3,4),(5,'2023-08-07','Duis id ut alias vel',1,5),(6,'2023-08-07','Provident officia a',2,6),(7,'2023-08-07','Excepteur aliquid ne',3,7),(8,'2023-08-07','Labore voluptatibus ',1,8),(9,'2023-08-07','Ea dolore repudianda',3,9),(10,'2023-08-07','Aute incidunt sed c',2,10),(11,'2023-08-07','Nihil porro autem si',2,11),(12,'2023-08-07','Blanditiis tempora s',1,12),(13,'2023-08-07','FUYEZ !!!!',1,1),(14,'2023-08-09','gaga',1,1),(15,'2023-08-09','jryjryjrjty',1,13),(16,'2023-08-09','gdfgdfgddfg',1,13),(17,'2023-08-09','aaaaaaa',1,15),(18,'2023-08-09','gggggggg',1,13),(19,'2023-08-09','zzzzzzzzzzzzzzzzzzzzzzzzzzzzz',1,13),(20,'2023-08-09','nnnnn',1,13),(21,'2023-08-09','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',1,13),(22,'2023-08-09','ttttttttt',2,13),(23,'2023-08-09','Qui quia dignissimos',2,16),(24,'2023-08-09','Vel qui quos impedit',2,17),(25,'2023-08-09','Corporis voluptate f',1,18),(26,'2023-08-09','Incidunt quo quisqu',1,19),(27,'2023-08-09','Libero quisquam a do',1,20),(28,'2023-08-09','Quaerat cupiditate o',1,21),(29,'2023-08-09','Elit ex sequi do pe',3,22),(30,'2023-08-09','Ipsum quaerat aut ve',3,23),(31,'2023-08-09','Aliquid tempore et ',3,24),(32,'2023-08-09','Quia enim debitis es',1,25),(33,'2023-08-09','Veniam nostrud qui ',2,26);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personne` (
  `id_pers` int NOT NULL AUTO_INCREMENT,
  `id_role` int DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `date_crea_pers` date NOT NULL,
  PRIMARY KEY (`id_pers`),
  KEY `id_role` (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,2,'Tortosa','Sofiane','tortosa.sofiane@hotmail.fr','0652794672','0000-00-00'),(2,2,'Canal','Lionel','lionel.13@outlook.com','0725983245','0000-00-00'),(3,2,'Segura','Miguel','miguel13@outlook.com','0689114875','0000-00-00'),(4,2,'Est aut aliqua Inci','Dolore minim odit ve','xakaw@mailinator.com','45','0000-00-00'),(5,2,'Elit molestiae dese','Cumque incididunt ea','xynufatabu@mailinator.com','77','0000-00-00'),(6,2,'Aliquam ipsam ut vol','Impedit eu et conse','gicaf@mailinator.com','13','0000-00-00'),(7,2,'Id adipisicing beata','Iusto ea eligendi ne','rixax@mailinator.com','95','0000-00-00'),(8,2,'Quaerat minim commod','Voluptatem corporis ','mepifig@mailinator.com','95','0000-00-00'),(9,2,'Maiores in enim offi','Amet pariatur Id v','gomur@mailinator.com','22','0000-00-00'),(10,2,'Qui autem perferendi','Accusantium molestia','rukis@mailinator.com','49','0000-00-00'),(11,2,'Accusantium aut ad c','Corrupti facilis ad','zowy@mailinator.com','58','0000-00-00'),(12,2,'Ut similique cupidat','Magnam quia quisquam','xyxoqitoka@mailinator.com','94','0000-00-00'),(13,1,'Pirez','Matchou','ma@lie.fr','0606060613','0000-00-00'),(15,2,'Tortosa','Sofiane','ma@live.fr','0652794672','0000-00-00'),(16,2,'Cillum modi dolor es','Vel ut cum irure sit','gynavociku@mailinator.com','15','0000-00-00'),(17,2,'Laboriosam aspernat','Laborum Cupiditate ','gowa@mailinator.com','83','0000-00-00'),(18,2,'In aliquam deserunt ','Esse et aut tempora ','josip@mailinator.com','79','0000-00-00'),(19,2,'Perspiciatis dolore','Dicta voluptatem qu','defoquvu@mailinator.com','7','0000-00-00'),(20,2,'Quas est facilis ea ','Aut accusantium null','sifehixux@mailinator.com','28','0000-00-00'),(21,2,'Quidem vero dolorem ','Saepe duis soluta au','gywagu@mailinator.com','85','0000-00-00'),(22,2,'Commodo ipsum solut','Officia et at hic ne','fifatiw@mailinator.com','14','0000-00-00'),(23,2,'A aut rerum eum illo','Vero eum facilis qui','lacoda@mailinator.com','55','0000-00-00'),(24,2,'Suscipit culpa natus','Natus eiusmod dolore','wekada@mailinator.com','97','0000-00-00'),(25,2,'Et reprehenderit ul','A necessitatibus rep','gybilizyl@mailinator.com','57','0000-00-00'),(26,2,'Cillum consequatur ','Minima est iusto do','zocekyza@mailinator.com','72','0000-00-00');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plat`
--

DROP TABLE IF EXISTS `plat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plat` (
  `id_plat` int NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(150) NOT NULL,
  `prix` int NOT NULL,
  `description` text NOT NULL,
  `img_plat` varchar(255) DEFAULT NULL,
  `ingredients` text NOT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `id_sc` int NOT NULL,
  `note_moy` float DEFAULT NULL,
  PRIMARY KEY (`id_plat`),
  KEY `id_sc` (`id_sc`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plat`
--

LOCK TABLES `plat` WRITE;
/*!40000 ALTER TABLE `plat` DISABLE KEYS */;
INSERT INTO `plat` VALUES (1,'Fishcake tacos',700,'Découvrez nos tacos inédits : Un voyage culinaire au Mexique !','https://apipics.s3.amazonaws.com/mexican_api/3.jpg','200g de barramundi,  oeufs,  piment rouge,  échalottes,  coriandre,  mangue,  tomates cerises,  citrons verts,  sel de mer,  huile d\'olive extra vierge, 200g de barramundi,  oeufs,  piment rouge,  échalottes,  coriandre,  mangue,  tomates cerises,  citrons verts,  sel de mer,  huile d\'olive extra vierge','omnivore',3,NULL),(5,'Tacos de porc au maïs doux et à la feta',800,'Le mariage parfait entre saveurs audacieuses et textures délicates. Un régal à ne pas manquer !','https://apipics.s3.amazonaws.com/mexican_api/5.jpg','cotelettes de porc fermier,  huile d\'olive,  épis de mais,  piments jalapenos frais,  citrons vert,  coriandre,  graines de cumain,  gousses d\'ail vinaigre de cidre,  tortillas de blé,  féta, cotelettes de porc fermier,  huile d\'olive,  épis de mais,  piments jalapenos frais,  citrons vert,  coriandre,  graines de cumain,  gousses d\'ail vinaigre de cidre,  tortillas de blé,  féta','omnivore',3,NULL),(6,'Salade de tacos aux oignons marinés roses',700,'Fraîcheur croquante, notes acidulées et saveurs équilibrées. Un délice à ne pas manquer !','https://apipics.s3.amazonaws.com/mexican_api/6.jpg','oignon rouge,  jus de citrons verts,  gousse d\'ail,  graine de cumin,  copeaux de chipotle,  sucre,  chou blanc,  carottes,  piment jalapeno,  coriandre,  huile de colza, oignon rouge,  jus de citrons verts,  gousse d\'ail,  graine de cumin,  copeaux de chipotle,  sucre,  chou blanc,  carottes,  piment jalapeno,  coriandre,  huile de colza','vegan',3,NULL),(27,'Tacos croustillants avec légumes grillés et haricots frits',800,'Une explosion de saveurs avec des champignons, haricots verts et noirs et une touche de pâte de chipotle.','https://apipics.s3.amazonaws.com/mexican_api/27.jpg','Huile d\'olive,  épis de mais,  champignons de Paris,  haricots verts,  haricots noirs,  pâte de chipotle,  feta, Huile d\'olive,  épis de mais,  champignons de Paris,  haricots verts,  haricots noirs,  pâte de chipotle,  feta','vegetarien',3,NULL),(7,'Tofu fumé au chipotle avec tomates et avocat',800,'Laissez-vous séduire par cette explosion de saveurs végétariennes qui vous transporte au Mexique.','https://apipics.s3.amazonaws.com/mexican_api/7.jpg','Huile d\'olive,  bloc de tofu fumé,  soupe de chipotles en adobo,  sel de mer,  oignons nouveaux,  tomates cerises,  tacos, Huile d\'olive,  bloc de tofu fumé,  soupe de chipotles en adobo,  sel de mer,  oignons nouveaux,  tomates cerises,  tacos','vegan',2,NULL),(8,'Chilaquiles avec salsa de tomatilles fraîches',700,'Ces chilaquiles végétariens sont l\'une des recettes les plus appréciées du Mexique.','https://apipics.s3.amazonaws.com/mexican_api/8.jpg','Croustilles de tortilla,  huile d\'olive,  tomatilles,  oignon,  gousses d\'ail,  piment jalapeno,  coriandre (feuilles et tiges),  sucre semoule,  sel,  bouillon de légumes,  jus de citron vert., Croustilles de tortilla,  huile d\'olive,  tomatilles,  oignon,  gousses d\'ail,  piment jalapeno,  coriandre (feuilles et tiges),  sucre semoule,  sel,  bouillon de légumes,  jus de citron vert.','vegan',2,NULL),(30,'Pain de maïs avec salade à la mexicaine',600,'La texture moelleuse du pain de maïs, la fraîcheur du cresson et la douceur des tomates cerises.','https://apipics.s3.amazonaws.com/mexican_api/30.jpg','Beurre fondu,  semoule de mais fine,  sucre,  sel,  oeuf,  fromage lancashire,  épis de mais,  huile d\'olive,  cresson,  tomates cerises., Beurre fondu,  semoule de mais fine,  sucre,  sel,  oeuf,  fromage lancashire,  épis de mais,  huile d\'olive,  cresson,  tomates cerises.','vegetarien',2,NULL),(37,'Riz aux crevettes à la mexicaine avec salsa d\'avocat',800,'Ces crevettes à la mexicaine sont riches en vitamines E, K et B12.','https://apipics.s3.amazonaws.com/mexican_api/37.jpg','Huile d\'olive,  oignons rouges,  piments rouges,  riz basmati,  tomates concassées,  coriandre fraiche,  poulet,  jus de citron,  crevettes crues,  haricots verts,  avocat mur., Huile d\'olive,  oignons rouges,  piments rouges,  riz basmati,  tomates concassées,  coriandre fraiche,  poulet,  jus de citron,  crevettes crues,  haricots verts,  avocat mur.','omnivore',2,NULL),(52,'Salade mexicaine de tacos au poulet',900,'Notre plat principal : poulet aux épices mexicaines, de nombreux légumes et une vinaigrette crémeuse.','https://apipics.s3.amazonaws.com/mexican_api/52.jpg','poulet,  laitue,  tomates,  avocats,  croustilles de maïs,  crème sure,  coriandre,  oignon,  piment jalapeéno, poulet,  laitue,  tomates,  avocats,  croustilles de maïs,  crème sure,  coriandre,  oignon,  piment jalapeéno','omnivore',2,NULL),(4,'Burritos aux haricots noirs et au poulet',900,'Une combinaison savoureuse accompagnée de riz, avocat, tomates cerises et coriandre fraîche.','https://apipics.s3.amazonaws.com/mexican_api/4.jpg','oignons,  ail,  cumin,  haricots noirs,  paprika fumé,  riz cuit,  avocat,  jus de citron vert,  piment rouge,  tomates cerises mures,  coriandre fraiche,  tortillas,  poulet cuit,  cheddar doux,  tabasco., oignons,  ail,  cumin,  haricots noirs,  paprika fumé,  riz cuit,  avocat,  jus de citron vert,  piment rouge,  tomates cerises mures,  coriandre fraiche,  tortillas,  poulet cuit,  cheddar doux,  tabasco.','omnivore',4,NULL),(19,'Burritos à la saucisse avec guacamole aux petits pois et à l\'avocat',1200,'Des saveurs mexicaines inédites : Un voyage culinaire en un burrito ! ','https://apipics.s3.amazonaws.com/mexican_api/19.jpg','Huile d\'olive,  saucisses,  mélange d\'épices méxicaines,  oignon rouge,  poivrons,  mais doux,  avocats,  petits pois,  jus de citron vert,  tortillas,  riz basmati,  cheddar,  coriandre fraiche., Huile d\'olive,  saucisses,  mélange d\'épices méxicaines,  oignon rouge,  poivrons,  mais doux,  avocats,  petits pois,  jus de citron vert,  tortillas,  riz basmati,  cheddar,  coriandre fraiche.','omnivore',4,NULL),(22,'Bols de burrito au boeuf',1200,'Une symphonie funky de goûts qui éveillera vos papilles.','https://apipics.s3.amazonaws.com/mexican_api/22.jpg','Huile de tournesol,  oignons rouges,  boeuf haché britannique,  piment chipotle,  tortilla,  laitue,  tomates cerises,  concombre,  yaourt grec,  citron vert,  paprika., Huile de tournesol,  oignons rouges,  boeuf haché britannique,  piment chipotle,  tortilla,  laitue,  tomates cerises,  concombre,  yaourt grec,  citron vert,  paprika.','omnivore',4,NULL),(2,'Soupe aux haricots noirs et aux boulettes de maïs',700,'Succombez à notre soupe réconfortante ! Un délice qui réchauffe l\'âme.','https://apipics.s3.amazonaws.com/mexican_api/2.jpg','Haricots secs noirs(pinto ou rouge),  piment passila,  origan séché,  sel de mer,  gousses d\'ail,  piment vert,  crème sure,  jus de citrons verts., Haricots secs noirs(pinto ou rouge),  piment passila,  origan séché,  sel de mer,  gousses d\'ail,  piment vert,  crème sure,  jus de citrons verts.','vegetarien',2,NULL),(64,'Soupe mexicaine aux légumes et tortillas',700,'Une délicieuse harmonie de saveurs traditionnelles.','https://apipics.s3.amazonaws.com/mexican_api/64.jpg','Oignon rouge,  poivron rouge,  tomates concassées,  sauce piquante chipotle,  légumes Knorr,  mais doux surgelé,  tortillas chips légèrement salées,  haricots rouges., Oignon rouge,  poivron rouge,  tomates concassées,  sauce piquante chipotle,  légumes Knorr,  mais doux surgelé,  tortillas chips légèrement salées,  haricots rouges.','vegan',2,NULL),(34,'Fajitas au steak et au poivre',800,'Fajitas audacieuses. Une expérience gustative qui réveille les papilles.','https://apipics.s3.amazonaws.com/mexican_api/34.jpg','Boeuf britannique,  poivrons mélangés,  oignon rouge,  huile végétale,  tortillas,  cheddar,  coriandre fraiche,  salsa,  guacamole,  crème sure., Boeuf britannique,  poivrons mélangés,  oignon rouge,  huile végétale,  tortillas,  cheddar,  coriandre fraiche,  salsa,  guacamole,  crème sure.','omnivore',5,NULL),(39,'Quesadillas aux patates douces, petits pois et fromage',700,'Délice végétarien : Fondant, croquant, croustillant en chaque bouchée.','https://apipics.s3.amazonaws.com/mexican_api/39.jpg','Patates douces,  mais égoutté,  petits pois,  cheddar,  mozzarella,  coriandre fraiche,  tortillas,  avocats,  jus de citron vert,  oignons nouveaux., Patates douces,  mais égoutté,  petits pois,  cheddar,  mozzarella,  coriandre fraiche,  tortillas,  avocats,  jus de citron vert,  oignons nouveaux.','vegetarien',2,NULL),(50,'Quesadillas au fromage avec salsa de tomates, poivrons rouges et avocat',700,'Découvrez nos quesadillas au fromage. Un festival de saveurs rafraîchissantes et épicées.','https://apipics.s3.amazonaws.com/mexican_api/50.jpg','Avocats murs,  tomates cerises,  coriandre fraiche,  échalote,  jus de citron vert,  huile d\'olive,  cheddar,  poivrons rouges,  piment chipotle,  tortillas de mais,  crème sure., Avocats murs,  tomates cerises,  coriandre fraiche,  échalote,  jus de citron vert,  huile d\'olive,  cheddar,  poivrons rouges,  piment chipotle,  tortillas de mais,  crème sure.','vegetarien',2,NULL),(43,'Nachos au piment de patate douce',800,'Un mélange audacieux d\'épices, de saveurs fumées et de textures croustillantes.','https://apipics.s3.amazonaws.com/mexican_api/43.jpg','Huile d\'olive,  oignon,  gousses d\'ail,  cumin,  paprika fumé,  flocons de piment,  purée de tomates,  patates douces,  haricots noirs,  tomates concassées,  bouillon de légumes,  coriandre fraiche,  croustilles de tortilla,  cheddar,  crème sure., Huile d\'olive,  oignon,  gousses d\'ail,  cumin,  paprika fumé,  flocons de piment,  purée de tomates,  patates douces,  haricots noirs,  tomates concassées,  bouillon de légumes,  coriandre fraiche,  croustilles de tortilla,  cheddar,  crème sure.','vegetarien',1,NULL),(53,'Nachos au porc effiloché et salsa de maïs doux',1000,'Une explosion de saveurs épicées et sucrées. Le mariage parfait du croustillant et de la tendresse.','https://apipics.s3.amazonaws.com/mexican_api/53.jpg','Huile d\'olive,  échalotes bananes,  épaule de porc fermier britannique,  gousses d\'ail,  cumin,  coriandre,  canelle,  piment doux,  piment Jamaique,  thym séché,  purée de tomates,  vinaigre de vin rouge,  bouillon de poulet,  sucre semoule,  lait entier., Huile d\'olive,  échalotes bananes,  épaule de porc fermier britannique,  gousses d\'ail,  cumin,  coriandre,  canelle,  piment doux,  piment Jamaique,  thym séché,  purée de tomates,  vinaigre de vin rouge,  bouillon de poulet,  sucre semoule,  lait entier.','omnivore',1,NULL),(54,'Bol de riz tortilla mexicain croustillant',900,'Des saveurs audacieuses, une expérience culinaire irrésistible.','https://apipics.s3.amazonaws.com/mexican_api/54.jpg','Huile de colza,  tortilla de mais,  poivrons rouges rotis,  mais doux,  oignon rouge,  coriandre fraiche,  citron vert,  paprika fumé,  soupe de crème sure,  riz., Huile de colza,  tortilla de mais,  poivrons rouges rotis,  mais doux,  oignon rouge,  coriandre fraiche,  citron vert,  paprika fumé,  soupe de crème sure,  riz.','vegetarien',8,NULL),(35,'Jalapeño, bacon et frittata de pommes de terre croustillantes',900,'Savourez notre frittata croustillante : Une explosion de saveurs épicées et réconfortantes. ','https://apipics.s3.amazonaws.com/mexican_api/35.jpg','Pommes de terre,  huile d\'olive,  piments jalapeño frais,  citron vert,  oeufs,  oignons nouveaux,  coriandre fraiche,  bacon émincé,  choux pointu,  cheedar., Pommes de terre,  huile d\'olive,  piments jalapeño frais,  citron vert,  oeufs,  oignons nouveaux,  coriandre fraiche,  bacon émincé,  choux pointu,  cheedar.','omnivore',1,NULL),(14,'Margarita à la mangue surgelée',500,'Dégustez notre Margarita glacée à la mangue. Une explosion de saveurs tropicales rafraîchissantes.','https://apipics.s3.amazonaws.com/mexican_api/14.jpg','Tequila infusée au jalapano,  mangue,  orange,  liqueur d\'orange,  citron vert., Tequila infusée au jalapano,  mangue,  orange,  liqueur d\'orange,  citron vert.','vegan',7,NULL),(23,'Margarita classique',500,'L\'alliance parfaite de la tequila, du jus de citron vert et du triple sec.','https://apipics.s3.amazonaws.com/mexican_api/23.jpg','Tequila,  jus de citron vert,  triple sec., Tequila,  jus de citron vert,  triple sec.','vegan',7,NULL),(36,'Paloma cocktail',500,'L\'acidité des agrumes, la douceur du sirop et l\'eau gazeuse se marient pour une explosion de saveurs.','https://apipics.s3.amazonaws.com/mexican_api/36.jpg','Tequila,  jus de pamplemousse,  jus de citron vert,  sirop d\'agave,  eau gazeuse., Tequila,  jus de pamplemousse,  jus de citron vert,  sirop d\'agave,  eau gazeuse.','vegan',7,NULL),(17,'CheeseCake Margarita fraise',600,'Une combinaison gourmande de bretzels, fromage onctueux, fraise et tequila. Un délice sucré à déguster.','https://apipics.s3.amazonaws.com/mexican_api/17.jpg','Bretzels,  sucre,  beurre salé,  fromage a la crème,  sucre glace,  citron vert,  orange,  fraise tequila., Bretzels,  sucre,  beurre salé,  fromage a la crème,  sucre glace,  citron vert,  orange,  fraise tequila.','vegetarien',6,NULL);
/*!40000 ALTER TABLE `plat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `lib_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Inscrit'),(2,'Invité'),(3,'Admin');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sous_cat_plat`
--

DROP TABLE IF EXISTS `sous_cat_plat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sous_cat_plat` (
  `id_sous_cat` int NOT NULL,
  `lib_sous_cat` varchar(50) NOT NULL,
  `id_cat_plat` int NOT NULL,
  PRIMARY KEY (`id_sous_cat`),
  KEY `id_cat` (`id_cat_plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sous_cat_plat`
--

LOCK TABLES `sous_cat_plat` WRITE;
/*!40000 ALTER TABLE `sous_cat_plat` DISABLE KEYS */;
INSERT INTO `sous_cat_plat` VALUES (1,'snacks',1),(2,'entrees',2),(3,'tacos',3),(4,'burritos',3),(5,'fajitas',3),(6,'desserts',4),(7,'boissons',5),(8,'tortilla',3);
/*!40000 ALTER TABLE `sous_cat_plat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statut` (
  `id_statut` int NOT NULL,
  `nom_statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vote` (
  `id_plat` int NOT NULL,
  `id_pers` int NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`id_plat`,`id_pers`),
  KEY `id_role` (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-24 16:11:53
