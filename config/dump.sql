-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: dungeondb-dungeon.j.aivencloud.com    Database: dungeon
-- ------------------------------------------------------
-- Server version	8.0.30

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '7623d706-b8a5-11ef-b24a-728e4b661b55:1-359,
90c4b229-a0ce-11ef-9300-06daa6b4d43f:1-1649';

--
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account` VALUES (1,'Louisa','Louisa@test.com','70743109d297e00cfe5df769ae0a70a34edd1fc1',NULL),(2,'test','test@gmail.com','99efc50a9206bde3d7a8e694aad8e138ca7dc3f7',NULL),(3,'Idea','Idea@test.com','9c51ad8660eaae45f7965cd83d1f447cf6378547',NULL),(4,'Idead','testest@test.co','b6c935d4f3c7b220fa038613a1f9c1b56b255a86',NULL),(5,'Asriel','darr@fantasy.com','1645ba4a3d538cd4b62b15b9780a5fda03f8fa73',NULL),(6,'Mona','mona@test.com','df04a101c17d5b43359d329f105b8c1fc48b9763',NULL),(7,'Asriel2','12254@gmail.com','e7fa7af006462b8fefcaf286273cf1132c99fb27',1),(8,'Monadmin','mona@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997',1),(9,'Lou','Lou@test.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',NULL),(12,'LouisaTest','Louisatest@test.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',NULL),(13,'Louisadmin','Louisadmin@DungeonXplorer.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',NULL);
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Armor`
--

DROP TABLE IF EXISTS `Armor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Armor` (
  `armor_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `armor_bonus` int DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`armor_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `Armor_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Armor`
--

LOCK TABLES `Armor` WRITE;
/*!40000 ALTER TABLE `Armor` DISABLE KEYS */;
INSERT INTO `Armor` VALUES (1,31,3,'complète');
/*!40000 ALTER TABLE `Armor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chapter`
--

DROP TABLE IF EXISTS `Chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Chapter` (
  `chapter_id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chapter`
--

LOCK TABLES `Chapter` WRITE;
/*!40000 ALTER TABLE `Chapter` DISABLE KEYS */;
INSERT INTO `Chapter` VALUES (1,'Le ciel est lourd ce soir sur le village du Val Perdu, dissimulé entre les montagnes. La \r\npetite taverne, dernier refuge avant l\'immense forêt, est étrangement calme quand le \r\nbourgmestre s’approche de vous. Homme d’apparence usée par les années et les soucis, \r\nil vous adresse un regard désespéré.\r\n« Ma fille… elle a disparu dans la forêt. Personne n’a osé la chercher… sauf vous, peut-être ? On raconte qu’un sorcier vit dans un château en ruines, caché au cœur des bois. \r\nDepuis des mois, des jeunes filles disparaissent… J\'ai besoin de vous pour la retrouver. »',NULL),(2,'Vous franchissez la lisière des arbres, la pénombre de la forêt avalant le sentier devant \r\nvous. Un vent froid glisse entre les troncs, et le bruissement des feuilles ressemble à un \r\nmurmure menaçant. Deux chemins s’offrent à vous : l’un sinueux, bordé de vieux arbres \r\nnoueux ; l’autre droit mais envahi par des ronces épaisses.',NULL),(3,'Votre choix vous mène devant un vieux chêne aux branches tordues, grouillant de \r\ncorbeaux noirs qui vous observent en silence. À vos pieds, des traces de pas légers, \r\nprobablement récents, mènent plus loin dans les bois. Soudain, un bruit de pas feutrés \r\nse fait entendre. Vous ressentez la présence d’un prédateur.',NULL),(4,'En progressant, le calme de la forêt est soudain brisé par un grognement. Surgissant des \r\nbuissons, un énorme sanglier, au pelage épais et aux yeux injectés de sang, se dirige vers\r\nvous. Sa rage est palpable, et il semble prêt à en découdre. Le voici qui décide \r\nbrutalement de vous charger !',NULL),(5,'Tandis que vous progressez, une voix humaine s’élève, interrompant le silence de la forêt. \r\nVous tombez sur un vieux paysan, accroupi près de champignons aux couleurs vives. Il \r\nsursaute en vous voyant, puis se détend, vous souriant tristement.\r\n« Vous devriez faire attention, étranger, murmure-t-il. La nuit, des cris terrifiants \r\nretentissent depuis le cœur de la forêt… Des créatures rôdent. »',NULL),(6,'À mesure que vous avancez, un bruissement attire votre attention. Une silhouette sombre \r\ns’élance soudainement devant vous : un loup noir aux yeux perçants. Son poil est hérissé \r\net sa gueule laisse entrevoir des crocs acérés. Vous sentez son regard fixé sur vous, prêt \r\nà bondir. Le combat est inévitable',NULL),(7,'Après votre rencontre, vous atteignez une clairière étrange, entourée de pierres dressées, \r\ncomme un ancien autel oublié par le temps. Une légère brume rampe au sol, et les \r\nombres des pierres semblent danser sous la lueur de la lune',NULL),(8,'Essoufflé mais déterminé, vous arrivez près d’un petit ruisseau qui serpente au milieu des \r\narbres. Le chant de l’eau vous apaise quelque peu, mais des murmures étranges \r\nsemblent émaner de la rive. Vous apercevez des inscriptions anciennes gravées dans une \r\npierre moussue.',NULL),(9,'La forêt se disperse enfin, et devant vous se dresse une colline escarpée. Au sommet, le \r\nchâteau en ruines projette une ombre menaçante sous le clair de lune. Les murs effrités \r\net les tours en partie effondrées ajoutent à la sinistre réputation du lieu.\r\nVous sentez que la véritable aventure commence ici, et que l’influence du sorcier n’est \r\npeut-être pas qu’une légende… En regardant autour de vous, vous apercevez un tapis de mousse au sol, parfait pour se reposer',NULL),(10,'Le monde se dérobe sous vos pieds, et une obscurité profonde vous enveloppe, glaciale \r\net insondable. Vous ne sentez plus le poids de votre équipement, ni la morsure de la \r\ndouleur. Juste un vide infini, vous aspirant lentement dans les ténèbres.\r\nAlors que vous perdez toute notion du temps, une lueur douce apparaît au loin, vacillante \r\ncomme une flamme fragile dans l’obscurité. Au fur et à mesure que vous approchez, vous \r\nentendez une voix, faible mais bienveillante, qui murmure des mots oubliés, anciens.\r\n« Brave âme, ton chemin n\'est pas achevé... À ceux qui échouent, une seconde chance \r\nest accordée. Mais les caprices du destin exigent un sacrifice. »\r\nLa lumière s\'intensifie, et vous sentez vos forces revenir, mais vos poches sont vides, votre \r\nsac allégé de tout trésor. Votre équipement, vos armes, tout a disparu, laissant place à \r\nune sensation de vulnérabilité. Lorsque la lumière vous enveloppe, vous ouvrez de nouveau les yeux, retrouvant la terre \r\nferme sous vos pieds. Vous êtes de retour, sans autre possession que votre volonté de \r\nreprendre cette quête. Mais cette fois-ci, peut-être, saurez-vous éviter les pièges fatals \r\nqui vous ont mené à votre perte.',NULL),(11,'Qu’avez-vous fait, Malheureux !',NULL),(12,'Après votre expédition, vous vous allongez sur le tapis de mousse, \r\nvous avez connu des lits plus confortables, mais celui-ci fera l’affaire. Vous tombez rapidement dans un sommeil profond. \r\nVous vous réveillez quelques heures plus tard.',NULL),(13,'Le château exerce toujours sa pression sinistre, mais vous savez que vous devez y entrer, aussi périlleux soit-il.\r\nEn vous approchant, vous identifiez deux entrées',NULL),(14,'Vous entrez dans le château, une servante vous dévisage d’un air intimidant.\r\n« Qui êtes-vous ? Que faites-vous ici ? »',NULL),(15,'Au moins, le lierre, c’est discret. Cependant, celui-ci est fragile. \r\nMalheuresement, pendant que vous grimpez, une branche se brise. ■ Lancez un dé 6',NULL),(16,'Vous entrez dans le château par la fenêtre. Vous arrivez dans une chambre\r\nLa chambre donne un air paisible dans ce château sinistre. Le lit défait et les bougies allumées indiquent cependant la présence d’une personne il y a peu de temps, \r\net, bien sûr, vous entendez des pas venir de la porte',NULL),(17,'« Vous voulez libérer ces jeunes filles alors ? Il faudra me passer sur le corps ! »',NULL),(18,'De nulle part, la servante dégaine une épée et bondit, plaçant la pointe de son épée sur votre Torse « Répondez à ma question »',NULL),(19,'Son épée se plante dans votre cœur, vous commencez à voir trouble, puis vous vous effondrez',NULL),(20,'Vous êtes caché. Un homme entre, range un objet dans une des armoires, et ressort. Vous attendez un peu et sortez de votre cachette',NULL),(21,'Un homme en armure, ressemblant à un garde, entre dans la pièce, en vous voyant, il brandit son épée et vous charge !',NULL),(22,'Le garde tombe à vos pieds. Vous vous asseyez sur le lit un instant puis fouillez la chambre',NULL),(23,'Vous continuez dans le dédale de couloirs, jusqu’à arriver sur une grande salle, avec de grands piliers, au centre se tient un trône, vide, \r\nvous avez un mauvais pressentiment… Dans un tourbillon de magie noire, un sorcier maléfique apparaît une clé suspendue à son cou. \r\nVous savez que c’est la clé et que vous allez devoir la prendre de force. Vos engagez le combat',NULL),(24,'Vous êtes dans le couloir principal, des torches éclairent les murs et les imposants piliers du château. Vous avancez prudemment, votre main serrant votre épée. \r\nVous vous enfoncez plus profondément dans le château. \r\nAu coin d’un couloir, vous apercevez un garde avec ce qui semble être un morceau de clé à la main. Vous êtes derrière lui, vous avez l’avantage',NULL),(25,'■ Lancez un dé 6',NULL),(26,'Le sorcier tombe à vos genoux, vaincu. Vous récupérez le haut de la clé et l’assemblez\r\nVous traversez la salle et, derrière le trône, se trouve une cellule de prison, une femme y est enfermée\r\nPar chance, la clé ouvre la cellule, il s\'agit bien de la fille du vieil homme,\r\n vous lui racontez comment vous l’avez trouvée. \r\nElle vous fait une révélation troublante\r\n« Ils étaient dix sorciers, chacun avec leurs clés, et se sont dispersés dans \r\nles endroits les plus éloignés et dangereux de la région. J\r\ne vous en conjure, vous devez toutes les sauver »',NULL),(27,'Vous ramenez sa fille au vieil homme, leurs retrouvailles sont émouvantes.\r\n« Je vous serai éternellement reconnaissant d’avoir ramené ma fille, acceptez ceci en guise de récompense, je vous offre également l’hospitalité pour la nuit »',NULL),(28,'À l’aube, vous vous préparez à partir, en remerciant l’hospitalité du vieil homme. \r\nIl vous donne une carte marquant les emplacements des autres sorciers.\r\nVous êtes plus résolu que jamais à délivrer ces jeunes filles du cachot, mais pour cela, vous devrez affronter d’innombrables monstres, \r\nmais cela ne vous fait pas peur. D’un pas déterminé, vous quittez le village pour affronter le sorcier le plus proche : Gustav',NULL);
/*!40000 ALTER TABLE `Chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chapter_Treasure`
--

DROP TABLE IF EXISTS `Chapter_Treasure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Chapter_Treasure` (
  `chap_treasure_id` int NOT NULL AUTO_INCREMENT,
  `chapter_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `probability` float DEFAULT '100',
  `class_id` int DEFAULT NULL,
  PRIMARY KEY (`chap_treasure_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `item_id` (`item_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `Chapter_Treasure_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`chapter_id`),
  CONSTRAINT `Chapter_Treasure_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`),
  CONSTRAINT `Chapter_Treasure_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chapter_Treasure`
--

LOCK TABLES `Chapter_Treasure` WRITE;
/*!40000 ALTER TABLE `Chapter_Treasure` DISABLE KEYS */;
INSERT INTO `Chapter_Treasure` VALUES (1,22,2,1,100,NULL),(2,22,25,1,100,NULL),(3,22,6,1,80,1),(4,22,28,1,31,1),(5,22,10,1,50,2),(6,22,10,1,50,3),(7,27,30,1,100,1),(8,27,15,1,100,2),(9,27,13,1,100,3),(10,25,25,1,100,1),(11,25,25,1,100,2),(12,25,25,1,100,3),(13,26,26,1,100,1),(14,26,26,1,100,2),(15,26,26,1,100,3),(16,26,27,1,100,1),(17,26,27,1,100,2),(18,26,27,1,100,3),(19,22,29,1,31,1);
/*!40000 ALTER TABLE `Chapter_Treasure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `base_pv` int NOT NULL,
  `base_mana` int NOT NULL,
  `strength` int NOT NULL,
  `initiative` int NOT NULL,
  `max_items` int NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Class`
--

LOCK TABLES `Class` WRITE;
/*!40000 ALTER TABLE `Class` DISABLE KEYS */;
INSERT INTO `Class` VALUES (1,'Magicien','Maître des arcanes avec une grande capacité en mana mais peu de résistance physique.',15,20,6,6,10),(2,'Guerrier','Un combattant puissant, fort en force et en points de vie, mais sans capacité de magie.',30,0,15,5,15),(3,'Voleur','Un personnage agile et rapide, avec une capacité en mana faible mais une grande initiative.',20,5,10,10,13);
/*!40000 ALTER TABLE `Class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Encounter`
--

DROP TABLE IF EXISTS `Encounter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Encounter` (
  `encounter_id` int NOT NULL AUTO_INCREMENT,
  `chapter_id` int DEFAULT NULL,
  `monster_id` int DEFAULT NULL,
  PRIMARY KEY (`encounter_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `monster_id` (`monster_id`),
  CONSTRAINT `Encounter_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`chapter_id`),
  CONSTRAINT `Encounter_ibfk_2` FOREIGN KEY (`monster_id`) REFERENCES `Monster` (`monster_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Encounter`
--

LOCK TABLES `Encounter` WRITE;
/*!40000 ALTER TABLE `Encounter` DISABLE KEYS */;
INSERT INTO `Encounter` VALUES (1,4,1),(2,6,2),(3,17,3),(4,21,4),(5,25,4),(6,23,1);
/*!40000 ALTER TABLE `Encounter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Hero`
--

DROP TABLE IF EXISTS `Hero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Hero` (
  `hero_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class_id` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `biography` text,
  `pv` int NOT NULL,
  `mana` int NOT NULL,
  `strength` int NOT NULL,
  `initiative` int NOT NULL,
  `armor_id` int DEFAULT NULL,
  `left_hand_id` int DEFAULT NULL,
  `right_hand_id` int DEFAULT NULL,
  `chapter_id` int DEFAULT '1',
  `xp` int NOT NULL,
  `current_level` int DEFAULT '1',
  PRIMARY KEY (`hero_id`),
  KEY `class_id` (`class_id`),
  KEY `armor_id` (`armor_id`),
  KEY `left_hand_id` (`left_hand_id`),
  KEY `right_hand_id` (`right_hand_id`),
  KEY `chapter_id` (`chapter_id`),
  CONSTRAINT `Hero_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  CONSTRAINT `Hero_ibfk_2` FOREIGN KEY (`armor_id`) REFERENCES `Armor` (`armor_id`),
  CONSTRAINT `Hero_ibfk_3` FOREIGN KEY (`left_hand_id`) REFERENCES `Items` (`item_id`),
  CONSTRAINT `Hero_ibfk_4` FOREIGN KEY (`right_hand_id`) REFERENCES `Items` (`item_id`),
  CONSTRAINT `Hero_ibfk_5` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hero`
--

LOCK TABLES `Hero` WRITE;
/*!40000 ALTER TABLE `Hero` DISABLE KEYS */;
INSERT INTO `Hero` VALUES (1,'Asriel le Magicien',1,NULL,'magicien',15,20,6,6,1,NULL,12,1,27,1),(2,'Asriel le Guerrier',2,NULL,'Guerrier',30,0,15,5,NULL,NULL,NULL,1,27,1),(3,'Asriel le Voleur',3,NULL,'Voleur',20,5,10,10,NULL,NULL,NULL,1,27,1),(4,'test',1,'Magician.jpg',NULL,15,20,6,6,NULL,NULL,NULL,28,0,1),(11,'leGuerrierDuMongolibus',2,'Berserker.jpg',NULL,30,0,15,5,NULL,NULL,NULL,6,0,1),(15,'testVoleur',3,'Thief.jpg',NULL,20,5,10,10,NULL,NULL,NULL,6,0,1),(17,'Asriel',2,'Berserker.jpg',NULL,30,0,15,5,NULL,NULL,NULL,1,0,1),(18,'Ad',1,'Magician.jpg',NULL,15,20,6,6,NULL,NULL,NULL,1,0,1),(19,'a',2,'Berserker.jpg',NULL,30,0,15,5,NULL,NULL,NULL,1,0,1),(20,'Lou',2,'Berserker.jpg',NULL,30,0,15,5,NULL,NULL,NULL,1,0,1),(21,'Ici',2,'Berserker.jpg',NULL,30,0,15,5,NULL,NULL,NULL,2,0,1);
/*!40000 ALTER TABLE `Hero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Hero_list`
--

DROP TABLE IF EXISTS `Hero_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Hero_list` (
  `hero_list_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int DEFAULT NULL,
  `hero_id` int DEFAULT NULL,
  PRIMARY KEY (`hero_list_id`),
  KEY `id_compte` (`account_id`),
  KEY `id_hero` (`hero_id`),
  CONSTRAINT `Hero_list_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Account` (`account_id`),
  CONSTRAINT `Hero_list_ibfk_2` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`hero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hero_list`
--

LOCK TABLES `Hero_list` WRITE;
/*!40000 ALTER TABLE `Hero_list` DISABLE KEYS */;
INSERT INTO `Hero_list` VALUES (1,3,4),(5,3,11),(9,3,15),(11,5,17),(12,7,18),(13,6,19),(14,9,20),(15,3,21);
/*!40000 ALTER TABLE `Hero_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Inventory` (
  `inventory_id` int NOT NULL AUTO_INCREMENT,
  `hero_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`inventory_id`),
  KEY `hero_id` (`hero_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`hero_id`),
  CONSTRAINT `Inventory_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventory`
--

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;
INSERT INTO `Inventory` VALUES (2,1,28,1),(3,1,2,62),(4,1,3,52),(5,1,4,92),(6,1,5,52),(7,1,6,28),(8,1,7,25),(9,1,8,12);
/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES (1,'Petite potion de soin','Restaure une petite quantité de points de vie'),(2,'Potion de soin moyenne','Restaure une quantité modérée de points de vie'),(3,'Grande potion de soin','Restaure une grande quantité de points de vie'),(4,'Potion de soin légendaire','Restaure une très grande quantité de points de vie, rare et puissante'),(5,'Petite potion de mana','Restaure une petite quantité de mana'),(6,'Potion de mana moyenne','Restaure une quantité modérée de mana'),(7,'Grande potion de mana','Restaure une grande quantité de mana'),(8,'Potion de mana légendaire','Restaure une très grande quantité de mana, rare et puissante'),(9,'Épée courte émoussée','Une petite épée avec peu de puissance, convenable pour les débutants.'),(10,'Épée courte usée','Une épée courte à la lame solide mais usée par le temps.'),(11,'Épée courte affûtée','Une épée courte bien entretenue avec un tranchant supérieur.'),(12,'Épée courte aiguisée','Une lame courte et aiguisée, plus efficace au combat.'),(13,'Épée courte de qualité','Une épée courte forgée avec soin, plus performante que les modèles ordinaires.'),(14,'Grande épée robuste','Une grande épée, puissante mais difficile à manier pour les débutants.'),(15,'Épée de chevalier','Une lourde épée utilisée par les chevaliers, bien équilibrée pour des attaques puissantes.'),(16,'Épée de guerre','Épée imposante, utilisée par les soldats d’élite pour des coups dévastateurs.'),(17,'Claymore massive','Une épée à deux mains capable de trancher même les armures les plus épaisses.'),(18,'Espadon redoutable','Épée lourde, reconnue pour sa capacité à infliger des dégâts massifs.'),(19,'Épée lourde du berserker','Une épée imposante, capable de fendre n\'importe quel obstacle avec une grande force.'),(20,'Épée de la lumière éternelle','Une épée d\'une beauté sans pareille, forgée pour les grands héros.'),(21,'Épée des royaumes perdus','Une épée ancienne imprégnée d\'une force oubliée.'),(22,'Épée de l\'ombre mystique','Une lame noire, taillée dans l\'obscurité profonde.'),(23,'Épée du dragon sacré','Une épée forgée dans les flammes du dragon sacré.'),(24,'Épée du ciel éternel','Une lame pure, semblable à un rayon venant des cieux.'),(25,'Haut d\'une lourde clé','Le haut d\'une clé, il manque une partie'),(26,'Bas d\'une lourde clé','Le bas d\'une clé, il manque une partie'),(27,'Clé du cachot','Cette clé doit ouvrir quelque chose'),(28,'Parchemin de Sort : Brutus-Plosion','Débloque le sort Brutus-Plosion, qui crée une onde de choc'),(29,'Parchemin de Sort : Rayon de Feu','Débloque le sort Rayon de Feu, qui crée un rayon brûlant'),(30,'Parchemin de Sort : Frappe céleste','Débloque le sort frappe céleste, qui utilise la puissance des étoiles pour infliger de lourds dégâts'),(31,'Armure de test','Elle est ici pour le fun');
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Level`
--

DROP TABLE IF EXISTS `Level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Level` (
  `level_id` int NOT NULL AUTO_INCREMENT,
  `class_id` int DEFAULT NULL,
  `level` int NOT NULL,
  `required_xp` int NOT NULL,
  `pv_bonus` int NOT NULL,
  `mana_bonus` int NOT NULL,
  `strength_bonus` int NOT NULL,
  `initiative_bonus` int NOT NULL,
  PRIMARY KEY (`level_id`),
  UNIQUE KEY `class_id` (`class_id`,`level`),
  CONSTRAINT `Level_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Level`
--

LOCK TABLES `Level` WRITE;
/*!40000 ALTER TABLE `Level` DISABLE KEYS */;
INSERT INTO `Level` VALUES (1,1,1,0,0,0,0,0),(2,1,2,100,1,0,0,0),(3,1,3,155,0,1,0,0),(4,1,4,230,1,0,0,0),(5,1,5,325,0,1,0,0),(6,1,6,440,1,0,0,0),(7,1,7,575,0,1,0,0),(8,1,8,730,1,0,1,0),(9,1,9,905,0,1,0,1),(10,1,10,1100,1,2,0,0),(11,1,11,1315,0,1,0,0),(12,1,12,1550,1,0,0,0),(13,1,13,1805,0,1,0,0),(14,1,14,2080,1,0,0,0),(15,1,15,2375,0,1,0,0),(16,1,16,2690,1,0,0,0),(17,1,17,3025,0,1,0,0),(18,1,18,3380,1,0,1,0),(19,1,19,3755,0,1,0,1),(20,1,20,4150,1,2,0,0),(21,1,21,4565,0,1,0,0),(22,1,22,5000,1,0,0,0),(23,1,23,5455,0,1,0,0),(24,1,24,5930,1,0,0,0),(25,1,25,6425,0,1,0,0),(26,1,26,6940,1,0,0,0),(27,1,27,7475,0,1,0,0),(28,1,28,8030,1,0,1,0),(29,1,29,8605,0,1,0,1),(30,1,30,9200,1,2,0,0),(31,2,2,100,1,0,0,0),(32,2,1,0,0,0,0,0),(33,2,3,155,1,0,0,0),(34,2,4,230,1,0,0,0),(35,2,5,325,1,0,1,0),(36,2,6,440,1,0,0,0),(37,2,7,575,1,0,0,0),(38,2,8,730,1,0,0,0),(39,2,9,905,1,0,0,0),(40,2,10,1100,1,0,0,0),(41,2,11,1315,1,0,1,0),(42,2,12,1550,1,0,0,0),(43,2,13,1805,1,0,0,0),(44,2,14,2080,1,0,0,0),(45,2,15,2375,1,0,2,0),(46,2,16,2690,1,0,0,0),(47,2,17,3025,1,0,0,0),(48,2,18,3380,1,0,0,0),(49,2,19,3755,1,0,0,1),(50,2,20,4150,1,0,1,0),(51,2,21,4565,1,0,0,0),(52,2,22,5000,1,0,0,0),(53,2,23,5455,1,0,0,0),(54,2,24,5930,1,0,0,0),(55,2,25,6425,1,0,1,0),(56,2,26,6940,1,0,0,0),(57,2,27,7475,1,0,0,0),(58,2,28,8030,1,0,0,0),(59,2,29,8605,1,0,0,1),(60,2,30,9200,2,0,2,0),(61,3,1,0,0,0,0,0),(62,3,2,100,0,0,1,0),(63,3,3,155,1,0,0,0),(64,3,4,230,0,0,1,0),(65,3,5,325,1,0,0,0),(66,3,6,440,0,1,0,0),(67,3,7,575,1,0,0,0),(68,3,8,730,0,0,0,1),(69,3,9,905,1,0,0,0),(70,3,10,1100,2,0,0,1),(71,3,11,1315,1,0,0,0),(72,3,12,1550,0,1,0,0),(73,3,13,1805,1,0,0,0),(74,3,14,2080,0,0,1,0),(75,3,15,2375,1,0,0,0),(76,3,16,2690,0,1,0,0),(77,3,17,3025,1,0,0,0),(78,3,18,3380,0,0,0,1),(79,3,19,3755,1,0,0,0),(80,3,20,4150,2,0,0,1),(81,3,21,4565,1,0,0,0),(82,3,22,5000,0,1,0,0),(83,3,23,5455,1,0,0,0),(84,3,24,5930,0,0,1,0),(85,3,25,6425,1,0,0,0),(86,3,26,6940,0,1,0,0),(87,3,27,7475,1,0,0,0),(88,3,28,8030,0,0,0,1),(89,3,29,8605,1,0,0,0),(90,3,30,9200,2,0,1,1);
/*!40000 ALTER TABLE `Level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Links`
--

DROP TABLE IF EXISTS `Links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Links` (
  `link_id` int NOT NULL AUTO_INCREMENT,
  `chapter_id` int DEFAULT NULL,
  `next_chapter_id` int DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`link_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `next_chapter_id` (`next_chapter_id`),
  CONSTRAINT `Links_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`chapter_id`),
  CONSTRAINT `Links_ibfk_2` FOREIGN KEY (`next_chapter_id`) REFERENCES `Chapter` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Links`
--

LOCK TABLES `Links` WRITE;
/*!40000 ALTER TABLE `Links` DISABLE KEYS */;
INSERT INTO `Links` VALUES (1,1,2,'Vous sentez le poids de la mission qui s’annonce, et un frisson parcourt votre échine. Bientôt, la forêt s\'ouvre devant vous, sombre et menaçante. La quête commence.'),(2,2,3,'Si vous empruntez le chemin sinueux'),(4,3,5,'Si vous choisissez de rester prudent'),(5,3,6,'Si vous décidez d’ignorer les bruits et de poursuivre votre route,'),(6,4,8,'Si vous gagnez face au sanglier'),(7,4,10,'Si vous perdez face au sanglier'),(8,5,7,'Après l\'avoir écouté'),(9,6,7,'Si vous gagnez face au Loup'),(10,6,10,'Si vous perdez face au Loup'),(11,7,8,'Si vous décidez de prendre le sentier couvert de mousse'),(12,7,9,'Si vous choisissez de suivre le chemin tortueux à travers les racines'),(13,8,9,'Si vous ignorez cette curiosité et poursuivez votre route'),(14,8,11,'Si vous touchez la pierre gravée'),(15,9,12,'Si vous choisissez de vous reposer'),(16,9,13,'Si vous voulez directement continuer'),(17,10,1,'Si vous souhaitez reprendre l’aventure depuis le début'),(18,11,10,'Il ne faut pas toucher les choses que l\'on ne connaît pas !'),(19,12,13,'Vous vous réveillez quelques heures plus tard'),(20,13,14,'Si vous voulez entrer par la grande porte'),(21,13,15,'Si vous voulez entrer en grimpant au lierre'),(22,14,18,'Vous dites la vérité'),(23,14,17,'Vous ne dites rien '),(24,15,13,'Si le résultat est pair, vous tombez '),(25,15,16,'Si le résultat est impair, vous vous rattrapez sur une branche plus bas'),(26,16,20,'Si vous choisissez de vous cacher sous le lit'),(27,16,13,'Si vous fuyez par la fenêtre'),(28,17,24,'Si vous sortez victorieux du combat'),(29,17,10,'Si vous perdez le combat'),(30,18,17,'Si vous dites la vérité'),(31,18,19,'Si vous ne dites toujours rien'),(32,19,10,'Vous auriez peut-être dû dire quelque chose...'),(33,20,21,'Si vous faites 1 ou 2, vous n’arrivez pas à vous cacher à temps'),(34,21,22,'Si vous sortez victorieux'),(35,21,10,'Si vous perdez le combat'),(36,22,23,'Vous sortez de la chambre'),(37,23,10,'Si vous perdez'),(38,23,26,'Si vous gagnez'),(39,24,25,'Vous essayez de le prendre par surprise'),(40,25,23,'Si vous faites 5 ou 6, vous assommez le garde, et récupérez le morceau de clé'),(41,25,10,'Si le garde vous terasse'),(42,25,23,'Si vous terassez le garde'),(43,26,27,'Il est temps de rentrer'),(44,27,28,'Une bonne nuit de sommeil plus tard...');
/*!40000 ALTER TABLE `Links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Loot`
--

DROP TABLE IF EXISTS `Loot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Loot` (
  `loot_id` int NOT NULL AUTO_INCREMENT,
  `monster_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `probability` float DEFAULT '100',
  `class_id` int DEFAULT NULL,
  PRIMARY KEY (`loot_id`),
  KEY `item_id` (`item_id`),
  KEY `monster_id` (`monster_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `Loot_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`),
  CONSTRAINT `Loot_ibfk_2` FOREIGN KEY (`monster_id`) REFERENCES `Monster` (`monster_id`),
  CONSTRAINT `Loot_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Loot`
--

LOCK TABLES `Loot` WRITE;
/*!40000 ALTER TABLE `Loot` DISABLE KEYS */;
/*!40000 ALTER TABLE `Loot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Monster`
--

DROP TABLE IF EXISTS `Monster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Monster` (
  `monster_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pv` int NOT NULL,
  `mana` int DEFAULT NULL,
  `initiative` int NOT NULL,
  `strength` int NOT NULL,
  `attack` text,
  `xp` int NOT NULL,
  PRIMARY KEY (`monster_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Monster`
--

LOCK TABLES `Monster` WRITE;
/*!40000 ALTER TABLE `Monster` DISABLE KEYS */;
INSERT INTO `Monster` VALUES (1,'Sanglier Enragé',45,0,6,5,'Charge',0),(2,'Loup Noir',30,0,11,8,'Coup de Griffe',0),(3,'Servante',1,NULL,999,999,NULL,0),(4,'Garde',1,NULL,999,999,NULL,0),(5,'Sorcier Nepyro',1,NULL,999,999,NULL,0),(6,'Sorcier Gustav',1,NULL,999,999,NULL,0),(8,'Monstre de Test Magique',10,5,4,3,'Rayon noir',27);
/*!40000 ALTER TABLE `Monster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Potion`
--

DROP TABLE IF EXISTS `Potion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Potion` (
  `potion_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `type` char(4) NOT NULL,
  `heal_amount` int DEFAULT NULL,
  `mana_recovery` int DEFAULT NULL,
  PRIMARY KEY (`potion_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `Potion_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Potion`
--

LOCK TABLES `Potion` WRITE;
/*!40000 ALTER TABLE `Potion` DISABLE KEYS */;
INSERT INTO `Potion` VALUES (1,1,'Soin',10,NULL),(2,2,'Soin',20,NULL),(3,3,'Soin',30,NULL),(4,4,'Soin',40,NULL),(5,5,'Mana',NULL,5),(6,6,'Mana',NULL,10),(7,7,'Mana',NULL,20),(8,8,'Mana',NULL,30);
/*!40000 ALTER TABLE `Potion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Scroll`
--

DROP TABLE IF EXISTS `Scroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Scroll` (
  `scroll_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `spell_id` int DEFAULT NULL,
  PRIMARY KEY (`scroll_id`),
  KEY `item_id` (`item_id`),
  KEY `spell_id` (`spell_id`),
  CONSTRAINT `Scroll_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`),
  CONSTRAINT `Scroll_ibfk_2` FOREIGN KEY (`spell_id`) REFERENCES `Spell` (`spell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Scroll`
--

LOCK TABLES `Scroll` WRITE;
/*!40000 ALTER TABLE `Scroll` DISABLE KEYS */;
INSERT INTO `Scroll` VALUES (1,28,4),(2,29,5),(3,30,6);
/*!40000 ALTER TABLE `Scroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shield`
--

DROP TABLE IF EXISTS `Shield`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Shield` (
  `shield_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `armor_bonus` int DEFAULT NULL,
  PRIMARY KEY (`shield_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `Shield_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shield`
--

LOCK TABLES `Shield` WRITE;
/*!40000 ALTER TABLE `Shield` DISABLE KEYS */;
/*!40000 ALTER TABLE `Shield` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Spell`
--

DROP TABLE IF EXISTS `Spell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Spell` (
  `spell_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `cost` int DEFAULT NULL,
  `level_needed` int DEFAULT '0',
  PRIMARY KEY (`spell_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Spell`
--

LOCK TABLES `Spell` WRITE;
/*!40000 ALTER TABLE `Spell` DISABLE KEYS */;
INSERT INTO `Spell` VALUES (1,'Boule de feu','Une petite boule de feu infligeant des dégâts mineurs.',5,1),(2,'Éclair arcanes','Un éclair d’énergie magique infligeant des dégâts modérés.',10,10),(3,'Cataclysme','Un sort légendaire déchaînant une force destructrice rare. Utilisé par les plus puissants magiciens.',30,20),(4,'Brutus-Plosion','Crée une onde de choc',5,0),(5,'Rayon de Feu','Crée un rayon brûlant',NULL,13),(6,'Frappe céleste','Utilise la puissance des étoiles pour infliger de lourds dégâts',NULL,13);
/*!40000 ALTER TABLE `Spell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Spell_list`
--

DROP TABLE IF EXISTS `Spell_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Spell_list` (
  `spell_list_id` int NOT NULL AUTO_INCREMENT,
  `spell_id` int NOT NULL,
  `class_id` int DEFAULT NULL,
  `monster_id` int DEFAULT NULL,
  PRIMARY KEY (`spell_list_id`),
  KEY `spell_id` (`spell_id`),
  KEY `class_id` (`class_id`),
  KEY `monster_id` (`monster_id`),
  CONSTRAINT `Spell_list_ibfk_1` FOREIGN KEY (`spell_id`) REFERENCES `Spell` (`spell_id`),
  CONSTRAINT `Spell_list_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  CONSTRAINT `Spell_list_ibfk_3` FOREIGN KEY (`monster_id`) REFERENCES `Monster` (`monster_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Spell_list`
--

LOCK TABLES `Spell_list` WRITE;
/*!40000 ALTER TABLE `Spell_list` DISABLE KEYS */;
INSERT INTO `Spell_list` VALUES (1,1,1,NULL),(2,2,1,NULL),(3,3,1,NULL);
/*!40000 ALTER TABLE `Spell_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sword`
--

DROP TABLE IF EXISTS `Sword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Sword` (
  `sword_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `damage_bonus` int DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sword_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `Sword_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sword`
--

LOCK TABLES `Sword` WRITE;
/*!40000 ALTER TABLE `Sword` DISABLE KEYS */;
INSERT INTO `Sword` VALUES (1,9,3,'courte'),(2,10,4,'courte'),(3,11,5,'courte'),(4,12,6,'courte'),(5,13,7,'courte'),(6,14,5,'lourde'),(7,15,6,'lourde'),(8,16,7,'lourde'),(9,17,8,'lourde'),(10,18,9,'lourde'),(11,19,10,'lourde'),(12,20,11,'enchantée'),(13,21,12,'enchantée'),(14,22,13,'enchantée'),(15,23,14,'enchantée'),(16,24,15,'enchantée');
/*!40000 ALTER TABLE `Sword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `max_stat`
--

DROP TABLE IF EXISTS `max_stat`;
/*!50001 DROP VIEW IF EXISTS `max_stat`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `max_stat` AS SELECT 
 1 AS `hero_id`,
 1 AS `max_hp`,
 1 AS `max_mana`,
 1 AS `max_initiative`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `presentation_hero`
--

DROP TABLE IF EXISTS `presentation_hero`;
/*!50001 DROP VIEW IF EXISTS `presentation_hero`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `presentation_hero` AS SELECT 
 1 AS `hero_name`,
 1 AS `image`,
 1 AS `bio`,
 1 AS `level`,
 1 AS `class_name`,
 1 AS `account`,
 1 AS `pseudo`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'dungeon'
--

--
-- Final view structure for view `max_stat`
--

/*!50001 DROP VIEW IF EXISTS `max_stat`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`avnadmin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `max_stat` AS select `h`.`hero_id` AS `hero_id`,(`c`.`base_pv` + sum(`l`.`pv_bonus`)) AS `max_hp`,(`c`.`base_mana` + sum(`l`.`mana_bonus`)) AS `max_mana`,(`c`.`initiative` + sum(`l`.`initiative_bonus`)) AS `max_initiative` from ((`Class` `c` join `Level` `l` on((`c`.`class_id` = `l`.`class_id`))) join `Hero` `h` on((`c`.`class_id` = `h`.`class_id`))) where (`l`.`level` <= `h`.`current_level`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `presentation_hero`
--

/*!50001 DROP VIEW IF EXISTS `presentation_hero`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`avnadmin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `presentation_hero` AS select `h`.`name` AS `hero_name`,`h`.`image` AS `image`,`h`.`biography` AS `bio`,`h`.`current_level` AS `level`,`c`.`name` AS `class_name`,`a`.`account_id` AS `account`,`a`.`name` AS `pseudo` from (((`Account` `a` join `Hero_list` `l` on((`a`.`account_id` = `l`.`account_id`))) join `Hero` `h` on((`h`.`hero_id` = `l`.`hero_id`))) join `Class` `c` on((`h`.`class_id` = `c`.`class_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-27 16:52:22
