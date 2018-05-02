-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: recipe
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.17.10.1

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (37,'Amuse-gueule'),(30,'Boissons'),(35,'Confiserie'),(31,'Dessert'),(32,'Entrée'),(3,'grillade'),(33,'Plat'),(34,'Plats mijotés'),(36,'Salade');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'catchPhrase','Recipe Reminder: la recette pour gérer vos recettes !');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `date` date NOT NULL,
  `img` text,
  `guest` text,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Mariage de Philippe et Hélène','2017-06-15','mariage.jpg','Beaucoup trop pour les énumérer','C\'était un honneur d\'être choisi pour préparer ce repas !'),(6,'Déjeuner en famille','2018-04-01','repasenfamille.jpg','La famille Trap au grand complet','Lorem ipsum dolor sit amet, mei quidam officiis ocurreret ea, ornatus inermis ad mea. His ne minimum antiopam argumentum, mutat malorum sanctus ex has. Te expetenda adversarium philosophia nec. In facilis splendide est, habeo sanctus pro ex. Mei ex postea oporteat interesset, vim deserunt sensibus ex. Nihil lucilius partiendo quo ei, atqui utinam nec ea. Sea melius epicurei sensibus cu. Unum scripta his et, posse vivendo corpora ei est. Pri in putent admodum. Mea diam docendi detraxit cu, his purto adipisci ei, meis graecis rationibus sea ne. Commodo ceteros cum ut, id est liber saepe. Eam no aeque dicunt ullamcorper. Dolore feugiat hendrerit est et. Nulla copiosae nam id, quem case aliquip ex nec. Eirmod voluptatibus ea quo, diam aeque scripta an est. Nec ei nemore delicata, mei cibo expetenda ad, ea nec euripidis delicatissimi. Cu mea mucius albucius ullamcorper. Quas error zril eu eum. Pri nullam sensibus ex. Eu usu tation aliquip albucius. An sint nulla eam, tritani assentior mediocritatem mel an. Ex eloquentiam intellegebat quo, ut vero veniam urbanitas duo. Ei latine iracundia hendrerit eos, phaedrum percipitur in cum.'),(13,'Soirée ','2018-04-10','Image5ae30ac617fb4.jpg','Mathieu, Anthony, Xavier, Yoan','C\'était super !'),(14,'Soirée','2018-04-28','Image5ae30c39019c2.jpg','','Soirée incroyable !'),(15,'Gouter','2018-04-23','Image5ae30cd521383.jpg','Jeannine','Miamiam le nutella !'),(16,'Déjeuner','2018-04-17','Image5ae30d7f97793.jpg','Martine','Les croissants sont supers !'),(18,'Fin de formation','2018-04-10','Image5ae318afc7d61.jpg','Tout le monde !','Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_recipe`
--

DROP TABLE IF EXISTS `event_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_recipe` (
  `recipeId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  KEY `fk_event_recipe_event1_idx` (`eventId`),
  KEY `fk_event_recipe_recipe1_idx` (`recipeId`),
  CONSTRAINT `fk_event_recipe_event1` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_recipe_recipe1` FOREIGN KEY (`recipeId`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_recipe`
--

LOCK TABLES `event_recipe` WRITE;
/*!40000 ALTER TABLE `event_recipe` DISABLE KEYS */;
INSERT INTO `event_recipe` VALUES (32,6),(26,6),(30,13),(31,6),(38,16);
/*!40000 ALTER TABLE `event_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `img` text,
  `categoryId` int(11) DEFAULT NULL,
  `book` text,
  `url` text,
  `comment` text,
  `note` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_recipe_category_idx` (`categoryId`),
  CONSTRAINT `fk_recipe_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (21,'Calamars frits','Image5ae310b55a925.jpg',3,'','','    Etape 1\r\n    1) Coupez les calamars en rondelles et laissez les macérer dans un peu de jus de citron et d\'huile avec du sel et du poivre pendant 30 mn.\r\n    Etape 2\r\n    2) Séchez-les autant que possible avec du papier essuie-tout, puis passez-les dans la farine, les oeufs battus et à nouveau dans la farine.\r\n    Etape 3\r\n    3) Faites-les frire dans l\'huile bien chaude jusqu\'à ce qu\'ils soient dorés.\r\n',4),(22,'Carpaccio de fraises','Image5ae3112232e02.jpg',30,'','http://www.marmiton.org/recettes/recette_carpaccio-de-fraises_29949.aspx#d55387-p1','Etape 1\r\n    Découper en tranches très fines (1 à 2mm) le pain d\'épices et en recouvrir le plat de service sans les faire se chevaucher.\r\n    Etape 2\r\n    Couper les fraises en tranches ou en deux pour les plus petites.\r\n    Etape 3\r\n    Les disposer sur le pain d\'épices.\r\n    Etape 4\r\n    Saupoudrer avec le sucre, une à deux cuillère selon votre goût.\r\n    Etape 5\r\n    Arroser avec l\'eau de fleur d\'oranger.\r\n    Etape 6\r\n    Laisser reposer au moins 30 mn.\r\n',0),(24,'Bowl à la compote pomme','Image5ae311c51d059.jpg',30,'','','\r\n    Etape 1\r\n    Eplucher et couper la banane en rondelles.\r\n    Concasser grossièrement les cerneaux de noix.\r\n    Etape 2\r\n    Verser la compote pomme-ananas-passion sans sucres ajoutés Andros dans un bol.\r\n    Ajouter le muesli. Déposer les rondelles de banane et les myrtilles. Parsemer avec les cerneaux de noix concassés et saupoudrer le cacao.\r\n',0),(25,'Momos','Image5ae3121b6b7e6.jpg',33,'','http://www.marmiton.org/recettes/recette_momos-nepal_22329.aspx#d6304-p1','    Etape 1\r\n    Pâte :\r\n    Etape 2\r\n    Verser la farine dans un saladier + sel + huile. Verser petit à petit l\'eau. Former une boule et recouvrir le saladier avec un film alimentaire et laisser reposer 30 min.\r\n    Etape 3\r\n    Farce :\r\n    Etape 4\r\n    Peler et hacher l\'ail et la coriandre. Ajouter le gingembre et les autres ingrédients dans la chair à saucisse. Bien mélanger.\r\n    Etape 5\r\n    Reprendre la pâte ; l\'étaler au rouleau à pâtisserie et découper des ronds avec un verre à eau de 10 cm de diamètre.\r\n    Etape 6\r\n    Déposer une petite boule de chair à saucisse épicée et rabattre la pâte sur la farce en pinçant les bords et en les tournant légèrement (on peut humidifier légèrement le bord du cercle de pâte pour une meilleure soudure).\r\n    Etape 7\r\n    Faire cuire 15 min à la vapeur (dans un couscoussier) et servir chaud avec une sauce à la tomate relevée.\r\n',1),(26,'Riz \'tout facile\' ','Image5ae3145e6641a.jpg',33,'','http://www.marmiton.org/recettes/recette_riz-tout-facile_28260.aspx#d2853-p1','\r\n    Etape 1\r\n    Dans une cocotte-minute, faire revenir dans un peu de beurre ou d\'huile l\'oignon émincé.\r\n    Etape 2\r\n    5 min après mettre le riz jusqu\'à ce qu\'il devienne translucide.\r\n    Etape 3\r\n    Ajouter les 6 verres d\'eau et le cube.\r\n    Etape 4\r\n    Fermer la cocotte et cuire 8 min après que la soupape chuchote.\r\n    Etape 5\r\n    Pendant ce temps couper le jambon en gros carrés.\r\n    Etape 6\r\n    Quand le riz est cuit ouvrir la cocotte, mettre les champignons, le jambon, la boîte de sauce tomate. Goûter et saler, poivrer si nécessaire (normalement : non !).\r\n    Etape 7\r\n    Bien remuer le tout et laisser chauffer doucement quelques minutes.\r\n    Etape 8\r\n    Servir chaud. Chacun y ajoutera le fromage à sa convenance.\r\n\r\n',0),(27,'Marmelade d\'oranges','Image5ae314b1e646b.jpg',30,'','','\r\nEtape 1\r\nLaver les oranges, ôter le reste de la fleur, c\'est la seule chose qu\'on jette.\r\nEtape 2\r\nEplucher les oranges, réserver les peaux entières avec toute leur épaisseur.\r\nEtape 3\r\nCouper chaque quartier de chair en deux. Mettre les pépins dans un nouet de gaze.\r\nEtape 4\r\nCouper fin les écorces entières (à la moulinette, au mixeur ou au couteau) pour obtenir des filaments pas plus épais que des carottes râpées.\r\nEtape 5\r\nMettre à macérer ensemble écorces, chair, eau et pépins enfermés dans une gaze.\r\nEtape 6\r\nLaisser tremper une nuit.\r\nEtape 7\r\nLe lendemain, bouillir ou plutôt bouilloter le tout 2 heures en couvrant à moitié, attention que ça ne déborde pas. Remuer uniquement à la cuillèrè en bois, ne pas écumer.\r\nEtape 8\r\nSi on a bouilli trop fort et qu\'on croit devoir ajouter de l\'eau pour compenser une évaporation, pas plus d\'un demi-verre (format petit verre à moutarde).\r\n',0),(28,'Salade Auvergnate','Image5ae315071ba54.jpg',36,'','http://www.marmiton.org/recettes/recette_salade-auvergnate_167912.aspx#d16424-p1','\r\n    Etape 1\r\n    Laver votre salade verte\r\n    Etape 2\r\n    couper le fromage en petit morceaux (cube)\r\n    Etape 3\r\n    puis faire revenir les lardons\r\n    Etape 4\r\n    faire la sauce salade mettre la salade puis le fromages couper en morceaux et une fois les lardons cuits les mettre dessus sans le jus de cuissons\r\n    Etape 5\r\n    Déguster\r\n',0),(29,'Bortsch','Image5ae3157090c55.jpg',33,'','https://www.marmiton.org/recettes/recette_bortsch_13732.aspx#d1683-p1','Etape 1\r\nPortez 1,5 litre d’eau, salée et poivrée, à ébullition. Mettez-y la viande de boeuf et la poitrine de porc. Laissez cuire à gros bouillons.\r\nEtape 2\r\nAu cours des 30 premières min de la cuisson, écumez régulièrement.\r\nEtape 3\r\nLavez le chou blanc, éliminez les feuilles abîmées, coupez-le en quatre, Ôtez le coeur et taillez les feuilles en julienne (fines lanières).\r\nEtape 4\r\nDétaillez les betteraves, pelées et rincées, en julienne, à l’exception dune que vous râpez et mélangez au vinaigre.\r\nEtape 5\r\nPelez le céleri et l’oignon. Ciselez-les. Débitez le blanc de poireau en menus morceaux.\r\nEtape 6\r\nAu bout de 40 min de cuisson, ajoutez les légumes (sauf la betterave râpée). Couvrez et laissez mijoter, sur feu doux, pendant 50 minutes.\r\nEtape 7\r\nRetirez la viande et coupez-la en dés.\r\nEtape 8\r\nIncorporez la betterave râpée au liquide de cuisson. Saupoudrez de persil. Servez chaud. ',0),(30,'Salade Cajun','Image5ae315ac2a37b.jpg',30,'','http://www.marmiton.org/recettes/recette_salade-cajun_14445.aspx#d1169-p1','\r\n    Etape 1\r\n    Faire cuire le riz et l\'égoutter.\r\n    Etape 2\r\n    Couper le poivron en dés et l\'oignon en rondelles.\r\n    Etape 3\r\n    Faire dorer les lardons dans une poêle puis y ajouter le miel, le vinaigre et l\'huile. Saler et poivrer. Egoutter les lardons et réserver la sauce.\r\n    Etape 4\r\n    Dans 4 assiettes, répartir successivement le riz, les haricots rouges, les grains de maïs, les lardons, les dés d\'épaule et les rondelles d\'oignons.\r\n    Etape 5\r\n    Arroser de la sauce au miel et servir.\r\n',0),(31,'Anchoïade camarguaise','Image5ae315f2d73cb.jpg',37,'','https://www.marmiton.org/recettes/recette_anchoiade-camarguaise_15150.aspx#d48874-p1','    Etape 1\r\n    Avec un mixer, hacher les anchois coupés en morceaux (rincer les filets s\'ils sont en saumure, les égoutter s\'ils sont dans l\'huile), avec l\'ail préalablement passé au moulin à persil, le vinaigre et la mie de pain, de manière à faire une pommade.\r\n    Etape 2\r\n    Rajouter l\'huile par petites quantités à la fois, en mixant entre les ajouts. Il faut que l\'anchoïade ait un aspect lisse et \'prenne\' comme une mayonnaise, sans exudat d\'huile, c\'est pour cela qu\'il faut verser l\'huile petit à petit.\r\n    Etape 3\r\n    On obtient ainsi une sorte de pommade très ferme.\r\n    Etape 4\r\n    Se mange sur du pain de campagne ou de la fougasse légèrement grillée, accompagnée de légumes CRUS: carottes en batonnets, bouquets de chou fleur branches de céleri, des petits artichauts poivrade, des tomates, de petites courgettes, des fenouils tendres. On peut servir aussi avec des oeufs durs.\r\n',0),(32,'Terrine aux deux saumons','Image5ae3163d68818.jpg',32,'','http://www.marmiton.org/recettes/recette_terrine-aux-deux-saumons_14688.aspx','\r\n    Etape 1\r\n    Plonger pendant 5 mn les filets de saumon dans l\'eau à ébullition. Egoutter, mettre dans une assiette et couper en petits morceaux, puis couper de la même manière le saumon fumé.\r\n    Etape 2\r\n    Mixer les 2 saumons, y ajouter l\'huile et le jus de citron. Ecraser le fromage à la fourchette, le saler et le poivrer.\r\n    Etape 3\r\n    Ajouter le saumon au fromage, mettre dans une terrine, décorer avec l\'aneth ou la ciboulette.\r\n    Etape 4\r\n    Mettre au frais, servir le lendemain ou préparer le matin pour le soir.\r\n',0),(33,'Gâteau de Pâques','Image5ae316ab68f15.jpg',31,'','','\r\n    Etape 1\r\n    Dans un premier saladier : mélanger la farine, le sucre, le sel, le sucre vanillé et la levure.\r\n    Etape 2\r\n    Dans un deuxième saladier : mélanger le lait, l\'huile(ou beurre fondu) et les oeufs.\r\n    Etape 3\r\n    Verser le contenu du second saladier dans le premier et remuer jusqu\'à obtenir une pâte plutôt lisse. Laissez tout de même quelques petits grumeaux.\r\n    Etape 4\r\n    Mettre au four 15 min à 180°C (thermostat 6)\r\n',0),(34,'Smoothie facile','Image5ae3171c15550.jpg',30,'','http://www.marmiton.org/recettes/recette_smoothie-facile_166892.aspx#d17856-p1','\r\n    Etape 1\r\n    Éplucher les fruits. Les couper en morceaux et les mettre dans le mixeur.\r\n    Etape 2\r\n    Ajouter le jus et le miel. Mixer le tout jusqu\'à ce soit \"liquide\".\r\n    Etape 3\r\n    Réfrigérer ceci pendant 2 heures, remixer la préparation et... dégustez!\r\n    Etape 4\r\n    Bon appétit!\r\n',0),(35,'Boeuf Bourguignon',NULL,34,'','https://www.marmiton.org/recettes/recette_boeuf-bourguignon-rapide_19218.aspx','\r\n    Etape 1\r\n    Hacher les oignons. Peler l\'ail.\r\n    Etape 2\r\n    Dans une cocotte minute, faire roussir la viande et les lardons dans l’huile ou le beurre.\r\n    Etape 3\r\n    Ajouter les oignons, les champignons égouttés et saupoudrer de fariner. Mélanger et laisser dorer un instant.\r\n    Etape 4\r\n    Mouiller avec le vin rouge qui doit recouvrir la viande.\r\n    Etape 5\r\n    Saler et poivrer.\r\n    Etape 6\r\n    Ajouter l’ail et le bouquet garni.\r\n    Etape 7\r\n    Fermer la cocotte minute.\r\n    Etape 8\r\n    Laisser cuire doucement 60 min à partir de la mise en rotation de la soupape.\r\n',0),(36,'Nouilles carbo-poireaux','Image5ae31ad9643e7.jpg',33,'Livre la cuisine facile L.123','','\r\n    Etape 1\r\n    Faites cuire les pâtes \"al dente\".\r\n    Etape 2\r\n    Pendant ce temps, faites revenir les lardons.\r\n    Etape 3\r\n    Émincez le blanc de poireau.\r\n    Etape 4\r\n    Une fois les lardons bien grillés, déglacez au vin blanc et ajouter les poireaux. Laisser cuire jusqu\'à que le poireau soit cuit.\r\n    Etape 5\r\n    Ajoutez la crème fraiche, portez à ébullition et laisser sur le feu jusqu\'à épaississement. Assaisonnez.\r\n    Etape 6\r\n    Dans une assiette, servez les pâtes. Ajoutez dessus la sauce et le jaune d\'oeuf.\r\n    Etape 7\r\n    Bon appétit !\r\n',0),(37,'Nems aux fraises','Image5ae31b30748ac.jpg',31,'','https://www.marmiton.org/recettes/recette_nems-aux-fraises_35816.aspx#d8058-p1','\r\n    Etape 1\r\n    Laver les fraises sous l\'eau et les équeuter. Les couper en morceaux dans un saladier et les saupoudrer de sucre.\r\n    Etape 2\r\n    Etaler vos feuilles de brick sur un plan de travail et couper les en deux.\r\n    Etape 3\r\n    Beurrer les feuilles de brick à l\'aide d\'un pinceau et déposer au centre quelques morceaux de fraises au sucre.\r\n    Etape 4\r\n    Poser dessus une cuillère à café de crème pâtissière et rouler les feuilles de brick comme un nem.\r\n    Etape 5\r\n    Au choix : faire cuire au four, revenir dans une poêle avec du beurre ou frit dans un bain d\'huile.\r\n    Etape 6\r\n    Server chaud. Chaque convive trempera ses nems dans le coulis de fruits rouges froid.\r\n',0),(38,'Cheese cake au verre','Image5ae31b9ac4b4c.jpg',31,'','https://www.marmiton.org/recettes/recette_cheese-cake-au-verre_27355.aspx#d58671-p1','\r\n    Etape 1\r\n    Mélanger le fromage frais et le yaourt, 40 g de sucre et un peu de jus de citron.\r\n    Etape 2\r\n    Dans de beaux verres, alterner une couche de cette crème, une couche de biscuits coupés en petits morceaux et une couche de fruits.\r\n',3);
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-02 11:53:34
