/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `library`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `idbook` int(11) NOT NULL AUTO_INCREMENT,
  `idcategorie` int(11) NOT NULL,
  `idsubcategorie` int(11) NOT NULL,
  `codes` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `descriptions` varchar(150) NOT NULL,
  `author` varchar(150) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `locationresponsible` varchar(50) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `frontpage` varchar(150) DEFAULT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `state2` char(1) NOT NULL DEFAULT '1',
  `summary` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`idbook`),
  KEY `fk_idcategorie_categories` (`idcategorie`),
  KEY `fk_idsubcategorie_subcategories` (`idsubcategorie`),
  CONSTRAINT `fk_idcategorie_categories` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`idcategorie`),
  CONSTRAINT `fk_idsubcategorie_subcategories` FOREIGN KEY (`idsubcategorie`) REFERENCES `subcategories` (`idsubcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `books` */

insert  into `books`(`idbook`,`idcategorie`,`idsubcategorie`,`codes`,`amount`,`descriptions`,`author`,`state`,`locationresponsible`,`url`,`frontpage`,`registrationdate`,`state2`,`summary`) values 
(1,1,1,'C001','2','Probabilidad y estadística como trabajar con niños y jóvenes','Ana P, de Bressan/Oscar Bogisic','B','Biblioteca escolar',NULL,'dbc2f631ce769553c10b24bebaa1b9eb55f056f2.jpg','2023-03-21 12:04:58','1','Este libro es un viaje por la probabilidad y por la estadística, procurando que sea placentero para los docentes y alumnos de nivel primario y educación básica. Se acercan las herramientas elementales de la probabilidad y de la estadística apelando a los mismos criterios sobre el azar y la probabilidad de la vida cotidiana.Cada capítulo responde a un tema desarrollado conectando el vocabulario específico con las expresiones lingüísticas habituales. Cada tópico se recorre en detalle, con complejidad creciente y a través de ejemplos que se constituyen en modelos para la solución de situaciones.'),
(2,1,1,'C002','2','Razones para enseñar geometría en la educación básica','Ana P, de Bressan/Beatriz Bogic','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:04:58','1','Los escasos contenidos geométricos trabajados a lo largo de la escolaridad básica se reiteran año tras año, sin grandes cambios en su extensión y complejidad y, por lo tanto, en los niveles de conceptualización de los mismos por parte de los alumnos. Variados motivos podrían dar cuenta de los hechos mencionados, pero las autoras consideran dos como de especial relevancia: - La falta de conciencia de los usos de la geometría en la vida cotidiana y de las habilidades que ella desarrolla por su naturaleza intuitiva-espacial y lógica.'),
(3,1,1,'C003','2','Juegos y problemas para construir ideas matemáticas','Stella Ricotti','B','Biblioteca escolar',NULL,'3b08825b28740b2872e2349ca407ccb58c8c5df4.jpg','2023-03-21 12:04:58','1',' Esta obra está destinada a docentes que, ante la responsabilidad de educar matemáticamente a jóvenes de 11 a 14 años, estén dispuestos a aprender de ellos y con ellos, se entusiasmen por jugar y resolver problemas o acertijos con la convicción de que están movilizando todas las formas de razonamiento lógico y creativo, mantengan intacta su capacidad de asombro y deseen hacer de la clase de matemáticas un encuentro feliz. Las actuales tendencias en educación matemática, centradas en la resolución de problemas y en el desarrollo de destrezas y habilidades propias del pensamiento matemático, generan en los y las docentes nuevas necesidades e inquietudes. El libro pretende satisfacer algunas de ellas a partir de una selección de situaciones, ofreciendo respuestas de ayuda, orientaciones y acompañamiento didáctico que permitan una mejor interpretación para el abordaje de los contenidos curriculares.'),
(4,1,1,'C004','02','Física conceptual','Paul G, Hewitt','B','Biblioteca escolar',NULL,'3007884158f7fa8360a2cee72c83e9855b742d55.jpg','2023-03-21 12:04:58','1','Esta edición conserva los recuadros con breves textos sobre asuntos como energía y tecnología, las ruedas de los trenes, las bandas magnéticas en las tarjetas de crédito y los trenes de levitación magnética. También aparecen recuadros sobre seudociencia, el poder de los cristales, el efecto placebo, búsqueda de mantos de agua con métodos de radiestesia, terapia magnética, ondas electromagnéticas alrededor de líneas de energía eléctrica y la fobia hacia la radiación en los alimentos y hacia cualquier objeto que ostente el adjetivo “nuclear”.'),
(5,1,1,'C005','2','La crisis planetaria del calendario global y cómo afrontarlo','Editorial Gedisa','B','Biblioteca escolar',NULL,'cab1b8c28696d18594a2c3de198825a48241e453.jpg','2023-03-21 12:04:58','1','Este libro muestra lo que está pasando, cuáles son las consecuencias, múltiples y sobrecogedoras, de la emisión indiscriminada de gases de efecto invernadero a la atmósfera, de la destrucción de las masas forestales, de la contaminación insostenible de las aguas continentales y oceánicas. Nos pone delante de los ojos, de una forma incontestable, el cambio climático. Es además una crónica de la vida, personal y pública, de Al Gore, una exposición de las razones que justifican su implicación en la lucha por la concienciación de la gente y la concreción de medidas para contener el cambio climático.'),
(6,1,1,'C006','2','Enciclopedia didáctica de las ciencias naturales','Editorial océano','B','Biblioteca escolar',NULL,'0c20b44ffc9b01df412e872610fe6edd9873c765.jpg','2023-03-21 12:04:58','1','La enciclopedia didáctica de ciencias naturales ofrece al lector la mejor ayuda para superar con éxito todas las dificultades en el aprendizaje y la compresión de las ciencias naturales. la obra, de diseño claro y agradable, combina a la perfección el texto con numerosas ilustraciones (fotografías, dibujos, tablas y gráficos) y utilísimos recuadros temáticos. Los contenidos de las ciencias naturales (geología, biología, botánica, zoología, etc.) se exponen de manera muy pedagógica, gracias a un método didáctico que asegura la asimilación gradual de los conceptos y el aprendizaje activo y progresivo de cada uno de los temas.'),
(7,1,1,'C007','08','Atlas del cuerpo humano','Editorial Ars Medica','B','Biblioteca escolar',NULL,'165242ba779c04ccc8751dcb3e7506df0e320e2d.jpg','2023-03-21 12:04:58','1','Esta guía aporta una información resumida pero muy completa del cuerpo humano. Analiza desde los más pequeños elementos estructurales hasta la constitución de sus órganos y sistemas más complejos tanto del hombre como de la mujer. Ilustrada con numerosos dibujos de gran calidad con diversos planos de los órganos, se explica además la terminología específica que distingue cada parte para un profundo conocimiento de la anatomía humana.'),
(8,1,1,'C008','8','Atlas del cielo,un viaje entre las estrellas y planeta para conocer el universo','Ediciones V, D-SAC','B','Biblioteca escolar',NULL,'ab0962b41c6f2c6aae310850b92e382141b1c5db.jpg','2023-03-21 12:04:58','1',NULL),
(9,1,1,'C009','02','Matemáticas para el c´álculo, pre cálculo N°06','James, Stewart/Lother Redlin','B','Biblioteca escolar',NULL,'cafeaa4b152a3f0649512798d2d7a006ce633ca6.jpg','2023-03-21 12:04:58','1',NULL),
(10,1,1,'C010','08','La biblia de la física y la química','Editorial Lexus','B','Biblioteca escolar',NULL,'f1c0d1f69b04ecfa1a359a29ccbedef461ca7b3f.jpg','2023-03-21 12:04:58','1',NULL),
(11,1,1,'C011','08','Economía para todos','Instituto Apoyo','B','Biblioteca escolar',NULL,'acb51ddc67a164994710f90072f0e098ca5bfbcd.jpg','2023-03-21 12:04:58','1',NULL),
(12,1,1,'C012','08','NEXUS/ciencias para el mundo contemporáneo','Editorial océano','B','Biblioteca escolar',NULL,'485a04fef4f30ceea6ef847cac18c89c4c730cc6.jpg','2023-03-21 12:04:58','1',NULL),
(13,1,1,'C013','08','Cuentos de matemáticas','J,C Hervás/A.M Benavente','B','Biblioteca escolar',NULL,'bfb8fa620d1cec56227a8a289398c54864fe4979.jpg','2023-03-21 12:04:58','1','CONTENIDO: Cuestión de grados - ¿Cerca o lejos? - Deriva y pasarás - Todo depende del ángulo con se mire - Evolución numérica - ¿No somos iguales? - Preguntar, descartar, plantear…solucionar - Orientando mi futuro - Probablemente fallará - Llevar la vida al límite - Relación forzada'),
(14,1,1,'C014','02','Ciencia/la guía visual definitica','Adam hart - davis','B','Biblioteca escolar',NULL,'f89a1b40aed57a1360373ad588da043208e44c57.jpg','2023-03-21 12:04:58','1',NULL),
(15,1,1,'C015','08','Mentor de las matemáticas con ejercicios resueltos','Editorial Oceano','B','Biblioteca escolar',NULL,'0f9a4c651b9a2115c87f35389c4294dd41314e08.jpg','2023-03-21 12:04:58','1',NULL),
(16,1,1,'C016','14','Economía para principiantes','Alejandro Gorvie/Sanyo','B','Biblioteca escolar','c387c982a132d05cbd5f88840aef2c8157740049.pdf','9077b7a6987f9551eba85c8fc0572dc980316224.jpg','2023-03-21 12:04:58','1','Economía para Principiantes es una breve historia de la humanidad en clave económica. Ofrece una mirada comprensiva sobre el pensamiento económico de los antiguos griegos, la importancia del Derecho Romano, el pensamiento económico de Santo Tomás y de la Iglesia Católica, el orden feudal, el nacimiento del capitalismo, la economía soviética, el inicio y la crisis de la globalización, las teorías económicas y cosmovisiones de Adam Smith, David Ricardo, Thomas Malthus, Alfred Marshall, Carlos Marx, John Maynard Keynes, Milton Friedmann..., las diferentes escuelas económicas y las consecuencias de las políticas que se han aplicado desde la crisis del \'29 hasta el actual problema de la deuda externa de los países periféricos.'),
(17,1,1,'C017','08','La biblia de las ciencias anturales','Editoral Lexus','B','Biblioteca escolar',NULL,'b0d83f55e5ad192688aa3c15082c22e322b31f9b.jpg','2023-03-21 12:04:58','1','La Biblia de las Ciencias Naturales es un compendio elaborado para tratar las cinco ramas más importantes de la ciencia las mismas que han sido tratadas de forma detallada y un tanto extensa pero de fácil acceso y comprensión para el lector.'),
(18,1,1,'C018','02','Atlas National Geographic la tierra y el Universo','National Geographic','B','Biblioteca escolar',NULL,'ece8f46bf734ca267a2b6e0f7c3b471a5c964428.jpg','2023-03-21 12:04:58','1','Un recorrido exhaustivo por el sistema solar, la Vía Láctea, Marte, las galaxias, los agujeros negros…Una ventana abierta al gran espectáculo del Cosmos..\r\n\r\nHasta hace pocos años, la Tierra y el sistema solar se creían únicos, los agujeros negros eran pura especulación y Plutón era el noveno planeta. Pero todo esto ha cambiado gracias a los observatorios de última generación, a misiones como la Cassini-Huygens o a las expediciones a Marte, que nos han ofrecido una mirada nueva sobre el gran espectáculo del Cosmos. Ahora sabemos que el universo está lleno, se han detectado agujeros negros gracias a las ondas gravitacionales y Plutón ha sido degradado a planeta enano.'),
(19,1,2,'C019','01','Las Matemáticas en la vida cotidiana','Universal Autónoma de Madrid','B','C.R.E',NULL,'d2654e644fb582fba2e1019620a5c467d1fd49db.jpg','2023-03-21 12:15:37','1',NULL),
(20,1,2,'C020','01','La Enseñanza de la matemática','Juan Carlos Sánchez','B','C.R.E',NULL,'7a71dbf4d8245d7d3adaeffe96a0da9b1219eeb2.jpg','2023-03-21 12:15:37','1',NULL),
(21,1,2,'C021','04','Proyecto de matemática','Tulio Ozejo-Zenobia Zenobia Lapa','B','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(22,1,2,'C022','01','Historia e historias de matemáticas','Mariano Perero','B','C.R.E',NULL,'e7d35d656858dc10daa3700abe0c16c07ea5e542.jpg\r\n','2023-03-21 12:15:37','1',NULL),
(23,1,2,'C023','02','Matemáticas 08','E.G.B Santillana','B','C.R.E',NULL,'907a7dd32c8e53be0c5b0775709118d830505d57.jpg','2023-03-21 12:15:37','1',NULL),
(24,1,2,'C024','02','Matemáticas 07','E.G.B Santillana','B','C.R.E',NULL,'7fa73e872f9eb5c80a0f555fe2321af693d6febe.jpg','2023-03-21 12:15:37','1',NULL),
(25,1,2,'C025','01','Frutal,Matemática 2°','Fernando Alvarez - Vicens - vives','B','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(26,1,2,'C026','01','Calculo numérico','Vicens - Vives','B','C.R.E',NULL,'17a3ccd658aa5cc1fc6796456fbbcba603307fd7.jpg','2023-03-21 12:15:37','1',NULL),
(27,1,2,'C027','01','ABACO 2 Matemática','Santillana','R','C.R.E',NULL,'ab15cf689abc421222fc5f1464ecb6a6518d73e1.jpg','2023-03-21 12:15:37','1',NULL),
(28,1,2,'C028','01','Las matemáticas en tus manos','Luisa coreaga - Margarita cos','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(29,1,2,'C029','01','Matemática moderna 1°','Campos villavicencio','M','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(30,1,2,'C030','02','Matemáticas 1°','Máximo de la cruz Solórzano','M','C.R.E',NULL,'cdbb1eaaeb851a25408a4e4e613026b00700f211.jpg','2023-03-21 12:15:37','1',NULL),
(31,1,2,'C031','03','Matemática moderna 2°','Máximo de la cruz Solórzano','M','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(32,1,2,'C032','02','Matemáticas 1°','Rubén Romero Méndez','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(33,1,2,'C033','02','Matemáticas 1°','Placentinos camilo rodríguez','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(34,1,2,'C034','01','Matemáticas 1°','Flavio vega Villanueva','M','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(35,1,2,'C035','01','Aritmética 1°','Repetto Linskens, Fesquet','M','C.R.E',NULL,'a60438ff0e2d262e1c6c071cd6067db0e5350ea1.jpg','2023-03-21 12:15:37','1',NULL),
(36,1,2,'C036','01','Matemáticas 1°','Felipe E, Sebastiáni','M','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(37,1,2,'C037','01','Matemáticas 1°','Virgilio Gutiérrez','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(38,1,2,'C038','01','Matemáticas 2°','Máximo de la cruz Solórzano','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(39,1,2,'C039','02','Matemática teoría y práctica 5°','Gustavo Rojas Gasco','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(40,1,2,'C040','02','Matemáticas 3°','Máximo de la cruz Solórzano','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(41,1,2,'C041','01','Matemáticas para todos los niveles, vol. 9','Simón Mochón','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(42,1,2,'C042','02','Geometría del espacio, trigonometría 5°','Flavio vega Villanueva','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(43,1,2,'C043','01','Geometría del espacio, trigonometría 5°','Máximo de la cruz Solórzano','R','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(44,1,2,'C044','01','Razonamiento lógico matemático 2°','Rubén Romero Mendez','B','C.R.E',NULL,NULL,'2023-03-21 12:15:37','1',NULL),
(45,2,5,'C045','02','Educar la mirada/políticas y pedagogías de la imagen','Inés Dusal/Daniela Gutiérrez','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(46,2,5,'C046','02','Didáctica de la lengua castellana y la literatura','Uri, Ruiz Bikandi','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(47,2,5,'C047','02','Enseñar literatura en secundaria, la formación de lectores críticos motivados y cultos','G, Bordons. A Díaz Plaja','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(48,2,5,'C048','02','09 ideas clave, educar en la adolescencia','Jaume Funes Artiaga','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(49,2,5,'C049','02','PNL para profesores; mejora tu conocimiento y tus relaciones','Albert Serrat','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(50,2,5,'C050','02','El cultivo del discernimiento ensayos sobre ética ciudadana y educación','Susana Frisancho/Gonzalo Gamio','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(51,2,5,'C051','02','Sistematización de la práctica docente','Carlos A. Audirac Camarena','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(52,2,5,'C052','02','Educación convivencia y agresión escolar','Enrique, Chaux','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(53,2,5,'C053','08','Dinámica de grupos y autoconciencia emocional','Jesús M, canto Ortiz/Verónica Montilla Bervel','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(54,2,5,'C054','08','Basic Gramman in use','Raymond Murphy','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(55,2,5,'C055','08','Pocket Longman/Diccionario ingles Español','Ediciones Pearson','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(56,2,5,'C056','08','The Heinle Picture Dictionary','Cengale Learnig','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(57,2,5,'C057','02','Procedimiento en historia un punto de vista didáctico','Cristófol-A. Trepat','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(58,2,5,'C058','02','Técnicas de aprendizaje colaborativo','Elizabeth F. Barkley/K.Patricia Cross/Claire.Howel','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(59,2,5,'C059','02','Aprender a resolver conflictos/programa para mejorar la convivencia escolar','David Álvarez P/José Carlos Núñez Pérez','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(60,2,5,'C060','08','Las lagunas del Perú','Luis Andrade Ciudad/Jorge Iván,P','B','Biblioteca escolar',NULL,NULL,'2023-03-21 12:22:48','1',NULL),
(61,2,3,'C061','15','Romeo and Julieta','William Shakes peare','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(62,2,3,'C062','01','One, Two . teni book 2°','Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(63,2,3,'C063','02','One, Two . teni book 3°','Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(64,2,3,'C064','02','One, Two . teni book 4°','Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(65,2,3,'C065','03','One, Two . teni book 6°','Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(66,2,3,'C066','02','One, Two . teni book 8°','Santillana','R','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(67,2,3,'C067','03','One, Two . teni book 9°','Santillana','R','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(68,2,3,'C068','03','One, Two . teni book 10°','Santillana','R','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(69,2,3,'C069','02','My english book 2°','Bertha Suarez de Mayandia','M','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(70,2,3,'C070','02','My english task 7°','Bertha Suarez de Mayandia','M','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(71,2,3,'C071','01','English course book three 3° 4°','Vince Quispe Andia','R','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(72,2,3,'C072','15','The x -files, Squeeze','Ellen steiber','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(73,2,3,'C073','01','Back to school','Armando Salinas Acosta','M','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(74,2,3,'C074','05','English course','Vince Quispe Andia','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(75,2,3,'C075','15','Súper Computerman','Jeremy Taylor','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(76,2,3,'C076','01','Diccionario Universal español-ingles','Larousse','R','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(77,2,3,'C077','01','Dictionary-para estudiantes de ingles','Richmond-Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(78,2,3,'C078','01','Dictionary-CONCISE','Richmond-Santillana','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(79,2,3,'C079','08','El umbral del milenio I,II,III,VI','Prom Perú(donación)','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(80,2,3,'C080','02','Perú An, Economy ford the list century','B.C.P(donations)','B','C.R.E',NULL,NULL,'2023-03-21 12:25:27','1',NULL),
(81,2,4,'C081','12','El arte y los estilos','Editorial Sopena','R','C.R.E',NULL,NULL,'2023-03-22 08:11:49','1',NULL),
(82,2,4,'C082','04','Taller de manualidades','Editorial parramon','R','C.R.E',NULL,NULL,'2023-03-22 08:11:49','1',NULL),
(83,2,4,'C083','06','Taller carpintería','Editorail Daly','B','C.R.E',NULL,NULL,'2023-03-22 08:11:49','1',NULL),
(84,2,4,'C084','14','Enciclipedias temáticas','Editorial Richards','B','C.R.E',NULL,NULL,'2023-03-22 08:11:49','1',NULL),
(85,2,4,'C085','08','Geografía del Perú Naturaleza y hombre','Editorial Manfer','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(86,2,4,'C086','06','Atlas del Perú y del mundo','M.D.E','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(87,2,4,'C087','02','El Perú y sus recursos','Editorial cobol','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(88,2,4,'C088','01','Atlas del Perú y del mundo','Editorial Bruño','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(89,2,4,'C089','01','Gran atlas de historia universal','Colin MC, evedy','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(90,2,4,'C090','02','Primeras planas de siglo XX','Editorial el comercio','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(91,2,4,'C091','02','Atlas Histórico','Joan, Roig Obiol','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(92,2,4,'C092','07','Historial del humanidad','Larousse','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(93,2,4,'C093','01','Atlas del Perú y del mundo','Julio R, Villanueva','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(94,2,4,'C094','01','Atlas compacto','Peters','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(95,2,4,'C095','01','Atlas universal del Perú','Editorial Bruño','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(96,2,4,'C096','01','El territorio del cóndor','Ediciones PEISA','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(97,2,4,'C097','01','El territorio del jaguar','Ediciones PEISA','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(98,2,4,'C098','01','Filosofía 3°','Santillana','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(99,2,4,'C099','01','Enciclopedia familiar de la medicina y la salud','Morris Fishbein','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(100,2,4,'C100','01','Psicología Social','David Krech','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(101,2,4,'C101','01','Tradciones peruanas','Ricardo Palma','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(102,2,4,'C102','09','Enciclopedia de la historia general del Perú I,II,III,IV,V,VI,VII,VIII,IX','Margarita, Guerra Martiniéri','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(103,2,4,'C103','03','Diccionario Ilustrado','Nuevo Sopena','M','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(104,2,4,'C104','05','Diccionario palabras','Editorial escuela nueva, M.D.E','M','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(105,2,4,'C105','02','Diccionario enciclopédico','Navarrete','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(106,2,4,'C106','03','Mi diccionario','Andrés bello','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(107,2,4,'C107','02','La enciclo','Editorial anaya','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(108,2,4,'C108','01','Diccionario escolar infantil','Editorial Norma','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(109,2,4,'C109','01','Enciclopedia del Perú','Editorial Océano','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(110,2,4,'C110','01','Diccionario enciclopedia','Editorial visor','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(111,2,4,'C111','01','La enciclopedia V-1','Editorial Salvat','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(112,2,4,'C112','01','Diccionario escolar lengua española','Editorial','B','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(113,2,4,'C113','01','La región Humana','Alberto Valdivia','R','C.R.E',NULL,NULL,'2023-03-22 08:11:50','1',NULL),
(114,3,6,'C114','08','Pedro Páramo','José Carlos, Gonzales/Juan Rulfo','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(115,3,6,'C115','08','Los perros hambrientos','Ciro Alegría','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(116,3,6,'C116','08','Un mundo para Julios','Alfredo Bryce Echenique','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(117,3,6,'C117','08','Cuentos de antología','Julio Ramón Ribeyro','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(118,3,6,'C118','08','El viejo saurio se retira','Miguel Gutiérrez','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(119,3,6,'C119','08','La casa de cartón','Martín Adán','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(120,3,6,'C120','08','País de jaula','Edgardo Rivera Martínez','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(121,3,6,'C121','08','Los 7 hábitos de lso adolescentes altamente efectivos','Sean Covey','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(122,3,6,'C122','08','Poetas peruanas','Ricardo Gonzales Vigil','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(123,3,6,'C123','08','El quijote de la Mancha','Miguel de Cervantes','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(124,3,6,'C124','08','Yawar fiesta(fiesta de sangre)','José María Arguedas','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(125,3,6,'C125','08','Los inocentes','Oswaldo Reinoso','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(126,3,6,'C126','08','Antología didáctica, Agua, oda al Jet','José María Arguedas','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(127,3,6,'C127','08','La leyenda del cid','Agustín Sánchez Aguilar','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(128,3,6,'C128','08','Tragedias, Edipo Rey, Antígona','Sófocles','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(129,3,6,'C129','08','El principito','Antonie de saint-Exupéry','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(130,3,6,'C130','08','24 poetas latinoamericanas','Coedición Latinoamericana','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(131,3,6,'C131','08','Historia de la literatura hispanoamericana T-I,II,III,IV','José Miguel Oviedo','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(132,3,6,'C132','08','Cien años de soledad','Gabriel García Márquez','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(133,3,6,'C133','08','Cuentos de té y otros árboles','Mónica Rodríguez Suárez','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(134,3,6,'C134','08','El cristo de Villenas','Carlos Eduardo Zavaleta','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(135,3,6,'C135','08','Poesía Peruana,Antología general de vallejo a nuestros días T III','Ricardo, Gonzáles Vigil','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(136,3,6,'C136','08','Tragedias','William Shakes peare','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(137,3,6,'C137','08','La llamada de lo salvaje','Jack Londón','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(138,3,6,'C138','08','El túnel','Ernesto Sábato','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(139,3,6,'C139','08','Mitos leyendas y cuentos peruanos','José María Arguedas/Francisco Izquierdo Ríos','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(140,3,6,'C140','08','Los jefes/los cachorros','Mario Vargas Llosa','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(141,3,6,'C141','08','Cuentos reunidos','Abraham Valdelomar','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(142,3,6,'C142','08','El señor de las moscas','William Golding','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(143,3,6,'C143','08','Obra poética','Cesar Vallejo','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(144,3,6,'C144','08','Tradiciones Peruanas','Ricardo Palma','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(145,3,6,'C145','08','Poesías completas','José María, Eguren','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(146,3,6,'C146','08','Cuentos inolvidables','Julio Cortazar','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(147,3,6,'C147','08','Ética para amador','Fernando Savater','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(148,3,6,'C148','08','La cocina de la escritura','Daniel Cassany','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(149,3,6,'C149','08','17 Narradoras latinoamericanass','Coedición latinoamericana','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:27:55','1',NULL),
(150,3,6,'C150','08','Historia de las cosas','Annie Leonard','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(151,3,6,'C151','08','El principe que todo lo aprendio en los libros','Jacinto Benavente','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(152,3,6,'C152','08','La ciudad y los perros','Mario Vargas Llosa','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(153,3,6,'C153','08','El guardián entre el centeno','J.D Salinger','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(154,3,6,'C154','08','Diccionario Panhispánico de dudas','Real academia Española','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(155,3,6,'C155','08','Diccionario sinónimos y antónimos','María Moliner','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(156,3,6,'C156','08','100 poemas en homenaje a la vida','Hugo García Castellano','B','Biblioteca escolar',NULL,NULL,'2023-03-22 08:33:12','1',NULL),
(157,3,7,'C157','01','Guía para preparar monografías','Pablo Valle, Ezequiel Ander','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(158,3,7,'C158','01','Literatura 4°','R, Barrenechea N','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(159,3,7,'C159','01','Obra Completa','Juan del Valle y Cabiedes','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(160,3,7,'C160','01','Literatura peruana tomo I','Luis Alberto Sánchez','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(161,3,7,'C161','01','Literatura peruana tomo II','Luis Alberto Sánchez','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(162,3,7,'C162','01','Literatura peruana tomo III','Luis Alberto Sánchez','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(163,3,7,'C163','01','Literatura peruana tomo IV','Luis Alberto Sánchez','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(164,3,7,'C164','01','Literatura peruana tomo V','Luis Alberto Sánchez','B','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(165,3,7,'C165','01','Viajes de Gulliver','Jonathan Swift','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(166,3,7,'C166','01','El tungsteno','Cesar Vallejo','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(167,3,7,'C167','18','Documental del Perú','Pedro Felipa Cortázar','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(168,3,7,'C168','01','Experiencia sobre Morir','Hohn Minton','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(169,3,7,'C169','01','Mecanoscrito del segundo origen','Manuel de pedrosa','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(170,3,7,'C170','01','Mody Dick','Hernán Nevilla','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(171,3,7,'C171','01','Ollanta','Editoral Mercurio','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(172,3,7,'C172','01','Todas las sangres','José María Arguedas','R','C.R.E',NULL,NULL,'2023-03-22 08:58:55','1',NULL),
(173,3,7,'C173','02','Doña flor y sus dos meridos','Jorge Amado','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(174,3,7,'C174','02','Canto general','Pablo Neruda','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(175,3,7,'C175','02','Cambio de Piel','Carlos Fuentes','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(176,3,7,'C176','02','Doña Bárbara','Rómulo Gallegos','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(177,3,7,'C177','02','Martín Fierro','José Hernández','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(178,3,7,'C178','03','Un mundo para Julios','Alfredo Bryce Echenique','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(179,3,7,'C179','02','La habana para un infante difunto','Guillermo Cabrera','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(180,3,7,'C180','02','Yo, él supremo','Augusto Roa Bastos','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(181,3,7,'C181','03','Cien años de soledad','Gabriel García Márquez','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(182,3,7,'C182','02','Obra poética','Cesar Vallejo','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(183,3,7,'C183','01','Cartas 1° selección','J Ramón Jiménez','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(184,3,7,'C184','01','Don Quijote de la mancha','Miguel de Cervantes Saavedra','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(185,3,7,'C185','01','Barrio de Broncas','José Antoni Bravo','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(186,3,7,'C186','01','Historia de dos ciudades','Charles Dickens','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(187,3,7,'C187','04','Relatos Fantásticos','Vicens - Vives','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(188,3,7,'C188','01','Per Ibañez y el comendador de Ocaña','Lope de vega','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(189,3,7,'C189','01','Edipo Rey','Sófocles','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(190,3,7,'C190','01','La palabra del Mundo (Antología)','Julio Ramón Ribeyro','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(191,3,7,'C191','01','Los Ríos profundos','José María Arguedas','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(192,3,7,'C192','01','Charlie y la Fábrica de chocolate','Roald Dahl','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(193,3,7,'C193','01','Un joven una sombra','C.E. Zavaleta','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(194,3,7,'C194','01','Fiesta prohibida','Jesús cabel','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(195,3,7,'C195','01','Ollanta - Drama Inca','Anónimo','B','C.R.E',NULL,NULL,'2023-03-22 09:12:48','1',NULL),
(196,3,7,'C196','01','Casa de muñecas','Henrik Ibsen','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(197,3,7,'C197','01','Romancero gitano - poeta en Nueva York','Federico García Lorca','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(198,3,7,'C198','01','Antes de la edad de oro','Isaac Asimov','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(199,3,7,'C199','01','Cuerpos y almas','Maxence Vande Heersch','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(200,3,7,'C200','01','La ciudad y los perros','Mario Vargas Llosa','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(201,3,7,'C201','01','Lo mejor de la ciencia ficcion del siglo XX','Isaac Asimov','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(202,3,7,'C202','01','¡Hagan sitio! ¡Hagan sitio!','Harry Harrison','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(203,3,7,'C203','01','Los alucinados/Vinzenz y la amiga de los hombres importantes','Robert Husil','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(204,3,7,'C204','01','Nueva narraciones extraordinarias','Edgar Allan Poe','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(205,3,7,'C205','01','7 ensayos de intepretación de la realidad peruana','José Carlos Mariátegui','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(206,3,7,'C206','01','Almas muertas','Nicolal Gogol','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(207,3,7,'C207','01','El mantón negro y otros cuentos','Luigi Pirandello','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(208,3,7,'C208','01','Historia de la civilización antigua','Thadee Zielinski','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(209,3,7,'C209','01','La comedia humana I','Honoré de Balzac','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(210,3,7,'C210','01','La brevedad de la vida','Séneca','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(211,3,7,'C211','01','Nada','Carmen Laforet','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(212,3,7,'C212','01','Ana Karenina I, II','León Tolstoi','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(213,3,7,'C213','01','La casa de cartón','Martín Adán','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(214,3,7,'C214','01','La divina comedia','Dante Alighieri','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(215,3,7,'C215','01','Romeo y julieta','William Shakes peare','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(216,3,7,'C216','01','Momo','Michael Ende','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(217,3,7,'C217','01','Tres novelas ejemplares','Miguel de cervantes','B','C.R.E',NULL,NULL,'2023-03-22 09:27:50','1',NULL),
(218,3,7,'C218','01','La palabra del mundo','Julio Ramón Ribeyro(antología)','B','C.R.E',NULL,NULL,'2023-03-22 10:36:05','1',NULL),
(219,3,7,'C219','01','Los jefes/los cachorros','Mario Vargas llosa','B','C.R.E',NULL,NULL,'2023-03-22 10:36:05','1',NULL),
(220,3,7,'C220','01','El azar y la necesidad','Jacques monod','R','C.R.E',NULL,NULL,'2023-03-22 10:36:05','1',NULL),
(221,3,7,'C221','01','Espejos educadores','Saturnino gallego','R','C.R.E',NULL,NULL,'2023-03-22 10:36:05','1',NULL),
(222,3,7,'C222','01','Todos los cuentos','Gabriel Garcia Marquez','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(223,3,7,'C223','01','Tradicones peruanas','Ricardo palma','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(224,3,7,'C224','01','Historia de cronopios y de famas','Julio Cortázar','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(225,3,7,'C225','01','Pedro páramo y el llano en llamas','Juan Rulfo','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(226,3,7,'C226','01','Medea, Electra','Eurípides','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(227,3,7,'C227','01','Prometeo encadenado/los persas','Esquilo','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(228,3,7,'C228','01','Eso no me lo quita nadie','Ana María Machado','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(229,3,7,'C229','01','Un marido para mamá','Christine Nostlinger','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(230,3,7,'C230','01','Un muchacho que inventaba historias','Margaret mahy','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(231,3,7,'C231','01','Experiencias sobre morir','John Hinton','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(232,3,7,'C232','01','El gran enigma de los platillos volantes','Antonio Ribera','M','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(233,3,7,'C233','01','La Ilíada','Homero','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(234,3,7,'C234','03','Raimondi y llona','Teresa María Llonba','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(235,3,7,'C235','01','Itinerarios de Lima','Héctor velarde','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(236,3,7,'C236','01','El mercader y marqués','Bernard Lavalle','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(237,3,7,'C237','01','Madre, e hijo cruzando el río','Erneto Zierer','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(238,3,7,'C238','01','Puñales escondidos','Pilar Dughi','B','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(239,3,7,'C239','01','Ultimo capitulo','Irma de águila','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(240,3,7,'C240','01','El zorro y la luna','José Antonio Mazzotti','R','C.R.E',NULL,NULL,'2023-03-22 10:36:06','1',NULL),
(241,3,7,'C241','05','Relatos selectos','Antología Didáctica','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(242,3,7,'C242','01','Puruchuco','Arturo jiménez borja','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(243,3,7,'C243','01','La embestida del carnero y otro cuentos','Teodoro Garcés','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(244,3,7,'C244','01','Comas y su historia','Santiago Tucumán Bonifacio','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(245,3,7,'C245','03','El general en su laberinto','Gabriel García Márquez','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(246,3,7,'C246','01','Siempre hay camino','Ciro Alegría','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(247,3,7,'C247','01','Pasión por Vallejo','J, Castañon','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(248,3,7,'C248','01','Llanto sagrado de la América meridional','Fray Francisco Romero','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(249,3,7,'C249','01','Biografía de Martín Adán','José Antonio Bravo','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(250,3,7,'C250','01','Alicia en el País de las maravillas','Lewis Carroll','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(251,3,7,'C251','01','El faro del fin del mundo','Julio Verne','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(252,3,7,'C252','01','El fantasma de caterville y otro cuentos','Oscar Wide','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(253,3,7,'C253','01','El escarabajo, los crímenes de la calle morgue','Edgar Allan Poe','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(254,3,7,'C254','01','Poesía Indiana','José Luis Millones','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(255,3,7,'C255','01','Cesar Vallejo','Ricardo Gonzales Vigil','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(256,3,7,'C256','01','Mateo Puamaccahua, cacique de chinchero','Luz peralta, Miguel pinto','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(257,3,7,'C257','01','La poética de la poesía póstuma de Vallejo','Carlos Henderson','R','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(258,3,7,'C258','02','Ángeles apócrifos en la América virreinal','Ramón mujica padilla','B','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(259,3,7,'C259','02','Pensamiento y Acción','Ramón Remolina','B','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(260,3,7,'C260','01','Ayacucho, tradiciones peruanas de ricardo palma','Tomas Santillana Cantella','B','C.R.E',NULL,NULL,'2023-03-22 10:53:01','1',NULL),
(333,2,4,'C261','1','1','1','1','1','1','1','2023-04-21 15:27:16','1',NULL),
(334,1,1,'C262','1','prueba ajax','ajax','b','ajax','','','2023-04-21 15:29:38','1',NULL),
(335,2,4,'C263','1','PRUEBAS AJAX 2','AJAX 2','B','AJAX2',NULL,NULL,'2023-04-21 15:43:22','1',NULL),
(340,2,4,'C264','2','PRUEBA SIDER','SIDER','B','SIDER','91d76f2217fb7b68d7b74f5b9e23aa53ae4ed94c.pdf','91d76f2217fb7b68d7b74f5b9e23aa53ae4ed94c.jpg','2023-05-05 10:29:51','1',NULL),
(351,1,1,'C265','1','PRUEBA 10','PREUBA','B','PRUEBA',NULL,NULL,'2023-05-12 10:40:07','1',NULL),
(352,1,1,'C266','02','Física conceptual','Paul G, Hewitt','B','Biblioteca escolar',NULL,NULL,'2023-05-15 08:15:58','1',NULL),
(353,1,1,'C267','5','dsvs','dsfdsf','d','fdsfs','ef3ec8834b3b94bd2e9a46293d6767df453afd14.pdf','ef3ec8834b3b94bd2e9a46293d6767df453afd14.jpg','2023-06-27 16:16:16','0',NULL),
(354,2,3,'C268','2','editar completo2','dsad','s','asdsa','90614788a754c8c9db1bee5970dba6ba20f1cfc7.pdf','0b5ce98ac0fc74ebb05d8a5377fd1d95ae9dbf32.jpg','2023-06-29 22:40:01','0',NULL),
(355,1,1,'C269','1','eidtado','preuba','B','l','59f8f4449022d5b04aa91e84a1d0b0a954ed6d0e.pdf','cad140305096d8bff2a645e5597d4ec6a635c9be.jpg','2023-07-10 00:47:34','1',NULL),
(356,1,1,'C270','1','PRUEBA FINAL BETA FINAL','BEYA','1','LI','a727a366c684e50c82c8ac2b39b16e7dc4c6cc0c.pdf',NULL,'2023-07-10 14:22:12','1',NULL);

/*Table structure for table `bookschinchanos` */

DROP TABLE IF EXISTS `bookschinchanos`;

CREATE TABLE `bookschinchanos` (
  `idbookchinchano` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `frontpage` varchar(50) DEFAULT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `state` char(1) DEFAULT '1',
  PRIMARY KEY (`idbookchinchano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `bookschinchanos` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `state` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

insert  into `categories`(`idcategorie`,`categoryname`,`registrationdate`,`state`) values 
(1,'Bibliografia, Ciencias Puras','2023-03-21 09:02:08','1'),
(2,'Bibliografia, Filología Linguística','2023-03-21 09:03:06','1'),
(3,'Bibliografia, literatura Latina','2023-03-21 10:37:22','1'),
(4,'edit prueba elijminar','2023-05-27 09:45:28','1'),
(5,'PRUEBA sidebar','2023-05-27 09:50:08','0'),
(6,'PRUEBA CON si','2023-05-27 11:05:59','0'),
(7,'PRUEBA08','2023-07-08 11:53:07','0'),
(8,'preubs','2023-07-08 11:57:29','0'),
(9,'DIEGOfelipa','2023-07-09 12:26:02','0'),
(10,'CARACHA DIEGO','2023-07-10 14:37:12','0');

/*Table structure for table `commentaries` */

DROP TABLE IF EXISTS `commentaries`;

CREATE TABLE `commentaries` (
  `idcommentary` int(11) NOT NULL AUTO_INCREMENT,
  `idbook` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `commentary` varchar(500) NOT NULL,
  `score` int(11) NOT NULL,
  `commentary_date` date NOT NULL DEFAULT current_timestamp(),
  `commentary_delete` datetime DEFAULT NULL,
  `state` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcommentary`),
  KEY `fk_idbook` (`idbook`),
  KEY `fk_idusers` (`idusers`),
  CONSTRAINT `fk_idbook` FOREIGN KEY (`idbook`) REFERENCES `books` (`idbook`),
  CONSTRAINT `fk_idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `commentaries` */

insert  into `commentaries`(`idcommentary`,`idbook`,`idusers`,`commentary`,`score`,`commentary_date`,`commentary_delete`,`state`) values 
(1,1,1,'Excelente\n',4,'2023-06-30',NULL,'1'),
(2,2,1,'un libro brabazo\n',4,'2023-06-30',NULL,'0'),
(3,3,1,'En términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo cuyo propósito principal es convencer, influir o in\nEn términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo ',0,'2023-06-30',NULL,'1'),
(4,1,1,'buen comentario',2,'2023-06-30',NULL,'1'),
(5,3,1,'¿Qué es Lorem Ipsum?\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la i',1,'2023-06-30',NULL,'1'),
(6,3,1,'fsdfsdf',0,'2023-06-30',NULL,'1'),
(7,3,1,'fdsfsdf',3,'2023-06-30',NULL,'1'),
(8,3,1,'dgfd',4,'2023-06-30',NULL,'1'),
(9,3,1,'a',3,'2023-06-30',NULL,'1'),
(10,3,1,'a',1,'2023-06-30',NULL,'1'),
(11,3,1,'a',2,'2023-06-30',NULL,'0'),
(12,3,1,'Este libro esta espectacular',4,'2023-06-30',NULL,'1'),
(13,3,1,'¿Qué es Lorem Ipsum?\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la i',4,'2023-06-30',NULL,'1'),
(14,1,1,'Genial',5,'2023-06-30',NULL,'1'),
(15,5,1,'giuyhiuh',3,'2023-07-03',NULL,'1'),
(16,5,3,'El capitulo 3 a sido interesante.',4,'2023-07-05',NULL,'1'),
(17,2,25,'bonito',1,'2023-07-07',NULL,'1'),
(18,3,47,'En términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo cuyo propósito principal es convencer, influir o in En términos generales, un texto persuasivo consiste en un contenido escrito del ti',0,'2023-07-09',NULL,'1'),
(19,3,47,'En términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo cuyo propósito principal es convencer, influir o in En términos generales, un texto persuasivo consiste en un contenido escrito del ti',3,'2023-07-09',NULL,'1'),
(20,3,47,'En términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo cuyo propósito principal es convencer, influir o in En términos generales, un texto persuasivo consiste en un contenido escrito del ti',0,'2023-07-09',NULL,'1'),
(21,3,47,'En términos generales, un texto persuasivo consiste en un contenido escrito del tipo argumentativo cuyo propósito principal es convencer, influir o in En términos generales, un texto persuasivo consiste en un contenido escrito del ti',5,'2023-07-09',NULL,'1'),
(22,4,1,'Prueba',3,'2023-07-13',NULL,'1'),
(23,4,1,'prueba 2',1,'2023-07-13',NULL,'1'),
(24,6,1,'muy bonito',2,'2023-07-13',NULL,'1'),
(25,6,1,'muy feo',1,'2023-07-13',NULL,'1'),
(26,6,1,'muy hermoso',5,'2023-07-13',NULL,'1'),
(27,6,1,'feo',1,'2023-07-13',NULL,'1'),
(28,19,1,'bonito',2,'2023-07-13',NULL,'1'),
(29,19,1,'muy hermoso',5,'2023-07-13',NULL,'1'),
(30,19,1,'seguiré leyendo el libro',1,'2023-07-13',NULL,'1'),
(31,157,1,'bonito',1,'2023-07-13',NULL,'1'),
(32,157,1,'hermoso',1,'2023-07-13',NULL,'1'),
(33,157,1,'bueno',4,'2023-07-13',NULL,'1'),
(34,21,1,'bonito',2,'2023-07-13',NULL,'1'),
(35,21,1,'bonito',4,'2023-07-13',NULL,'1'),
(36,4,46,'muy bueno',1,'2023-07-13',NULL,'1');

/*Table structure for table `loans` */

DROP TABLE IF EXISTS `loans`;

CREATE TABLE `loans` (
  `idloan` int(11) NOT NULL AUTO_INCREMENT,
  `idbook` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pickup_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `cancellation_date` datetime DEFAULT NULL,
  `observation` varchar(200) DEFAULT NULL,
  `acotacion` varchar(200) DEFAULT NULL,
  `state` char(1) DEFAULT '0',
  PRIMARY KEY (`idloan`),
  KEY `fk_idbook_idbook` (`idbook`),
  KEY `fk_idusers_idusers` (`idusers`),
  CONSTRAINT `fk_idbook_idbook` FOREIGN KEY (`idbook`) REFERENCES `books` (`idbook`),
  CONSTRAINT `fk_idusers_idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `loans` */

insert  into `loans`(`idloan`,`idbook`,`idusers`,`amount`,`registration_date`,`pickup_date`,`return_date`,`cancellation_date`,`observation`,`acotacion`,`state`) values 
(1,16,1,'1','2023-07-14 02:37:01','2023-07-22 00:00:00','2023-07-11 00:00:00','2023-07-14 03:01:52','',NULL,'3'),
(2,16,1,'1','2023-07-14 02:53:27','2023-07-14 02:55:07','2023-07-14 03:01:43',NULL,'1','','4'),
(3,16,1,'1','2023-07-14 02:53:41','2023-07-15 00:00:00','2023-07-19 00:00:00','2023-07-14 02:56:10','',NULL,'3'),
(4,16,1,'1','2023-07-14 02:53:53','2023-07-14 02:57:17','2023-07-14 02:59:07',NULL,'','CONFORME','4'),
(5,16,1,'2','2023-07-14 02:54:12','2023-07-14 02:59:35','2023-07-14 02:59:41',NULL,'21','CONFORME','4'),
(6,16,1,'1','2023-07-14 03:10:21','2023-07-14 04:18:33','2023-07-25 00:00:00','2023-07-14 04:18:44','111',NULL,'3'),
(7,16,1,'1','2023-07-14 03:10:34','2023-07-14 03:10:42','2023-07-25 00:00:00',NULL,'1',NULL,'2'),
(8,16,1,'1','2023-07-14 03:55:31','2023-07-19 00:00:00','2023-07-27 00:00:00',NULL,'1',NULL,'1');

/*Table structure for table `recuperarclave` */

DROP TABLE IF EXISTS `recuperarclave`;

CREATE TABLE `recuperarclave` (
  `idrecuperar` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `fechageneracion` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(120) NOT NULL,
  `clavegenerada` char(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idrecuperar`),
  KEY `fk_idusuario_rcl` (`idusers`),
  CONSTRAINT `fk_idusuario_rcl` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `recuperarclave` */

insert  into `recuperarclave`(`idrecuperar`,`idusers`,`fechageneracion`,`email`,`clavegenerada`,`estado`) values 
(1,3,'2023-07-06 21:33:45','diegofelipa11@gmail.com','3352','0'),
(2,3,'2023-07-06 22:12:43','diegofelipa11@gmail.com','1718','0'),
(3,3,'2023-07-07 00:02:04','diegofelipa11@gmail.com','8608','0'),
(4,3,'2023-07-07 00:23:18','diegofelipa11@gmail.com','1476','0'),
(5,3,'2023-07-07 00:43:28','diegofelipa11@gmail.com','2420','0'),
(6,3,'2023-07-07 01:11:27','diegofelipa11@gmail.com','3663','0'),
(7,3,'2023-07-07 01:19:33','diegofelipa11@gmail.com','5801','0');

/*Table structure for table `subcategories` */

DROP TABLE IF EXISTS `subcategories`;

CREATE TABLE `subcategories` (
  `idsubcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `idcategorie` int(11) NOT NULL,
  `subcategoryname` varchar(100) DEFAULT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `state` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsubcategorie`),
  KEY `fk_idcategorie_subcategories` (`idcategorie`),
  CONSTRAINT `fk_idcategorie_subcategories` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `subcategories` */

insert  into `subcategories`(`idsubcategorie`,`idcategorie`,`subcategoryname`,`registrationdate`,`state`) values 
(1,1,'Módulo Base Biblioteca para secundaria - Ciencias ','2023-03-21 11:40:36','1'),
(2,1,'Matemática/Secundaria','2023-03-21 11:40:36','1'),
(3,2,'Textos Ingles/Secundaria','2023-03-21 12:19:00','1'),
(4,2,'Enciclopedias Tematicas','2023-03-21 12:19:00','1'),
(5,2,'Módulo Base Biblioteca para secundaria - Filología','2023-03-21 12:19:00','1'),
(6,3,'Módulo Base Biblioteca para secundaria - Literatura latina','2023-03-22 08:16:46','1'),
(7,3,'Obras Literarias','2023-03-22 08:16:46','1'),
(8,3,'Lenguaje y Literatura','2023-03-22 08:16:46','1'),
(9,6,'prueba sidebar','2023-05-27 13:10:24','0'),
(10,3,'prueba eliminar','2023-07-08 13:43:25','0'),
(11,4,'CATEGORIEA','2023-07-08 14:13:16','0'),
(12,4,'LDFN','2023-07-08 14:13:31','0'),
(13,4,'prueba finaaaa|','2023-07-08 14:17:48','1'),
(14,4,'ds','2023-07-10 14:38:55','0');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `surnames` varchar(30) NOT NULL,
  `namess` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `accesskey` varchar(100) NOT NULL,
  `accesslevel` char(1) NOT NULL,
  `creationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `dischargedate` datetime DEFAULT NULL,
  `state` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `ul_email_usu` (`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `uk_user_names` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`idusers`,`username`,`surnames`,`namess`,`email`,`accesskey`,`accesslevel`,`creationdate`,`dischargedate`,`state`) values 
(1,'Geral','Castilla Felix','Geraldine','geral@midominio.com','$2y$10$KdvN8jydMeJQxtcE2FXxzuj2hgibe5vq6Xp77AgJN4fhWxkAHKukK','A','2023-04-25 12:19:02',NULL,'1'),
(3,'Diego10','Felipa Avalos','Diego','diegofelipa11@gmail.com','$2y$10$fuJ642I9ajOyQakiHwSWDuikFAnYtwpLfOPRHE.LWP9/Rb7EtZPim','E','2023-04-25 23:48:47',NULL,'1'),
(25,'Piero1994','Arias Tasayco','Piero','piero@midominio.com','$2y$10$6w85ifDjRrlV7n6pn8e3guI1d5PkHVvHcr1bPwm8pcXyYpI/Afx0m','D','2023-05-26 14:18:28',NULL,'1'),
(44,'Piero94','Arias Tasayco','Piero','alexander171194@gmail.com','$2y$10$2Cmxm7KjxMtK4lhJ7GgbxO0xTYmpSY0XT5AkGqDKfXyP47glLKAAa','E','2023-06-26 11:09:40',NULL,'1'),
(45,'milagros730','levano','Milagros','milagros73@midominio.com','$2y$10$9JvejDF7aj1Di2N.fWNU9e24v/XaLHqHkiDyu1XXDivdXPVVkAApO','D','2023-06-27 08:11:34',NULL,'1'),
(46,'geral2','castilla','geral','geral2@gmail.com','$2y$10$3jkw7ToCw1DUjt.SmujC1.tag1IkGT/2orFYt1NdxqUlnbt2eo8S6','E','2023-06-27 10:24:07',NULL,'1'),
(47,'pArias','Arias Tasayco','Piero Alexander','cveteranas@gmail.com','$2y$10$l69HqEblsAAEW5uoGYoHtexMzJZURgTYG0pex6IT1LmFRHp5GKfvG','E','2023-06-27 10:44:07',NULL,'1'),
(48,'prueba','PREUAB','PRUEBA','prueba@gmail.com','$2y$10$XPTO2Vag8J7tWOXQF3EYhufvqGB1e2ORCHZeXxUrpawx/mDLAaAUu','E','2023-06-29 16:15:58',NULL,'1'),
(49,'Kanijo','Arias','kano','kanolover@midominio.com','$2y$10$cXQofGlVw1/1Tsp8scsMpOE6TwsPPx/ywEO8vPuFosspTgoqjIxW2','D','2023-06-30 11:54:26',NULL,'0'),
(50,'Piero123','Arias Tasayco','CARACHA','piero123@midominio.com','$2y$10$VmQsJXAeoF9wdkRegQklVOP1Ig5qCX.NdfgthuDSKbwih9AwGkGmK','D','2023-07-05 17:06:15',NULL,'1');

/*Table structure for table `validacioncorreo` */

DROP TABLE IF EXISTS `validacioncorreo`;

CREATE TABLE `validacioncorreo` (
  `idvalidacion` int(11) NOT NULL AUTO_INCREMENT,
  `fechageneracion` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(120) NOT NULL,
  `clavegenerada` char(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idvalidacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `validacioncorreo` */

insert  into `validacioncorreo`(`idvalidacion`,`fechageneracion`,`email`,`clavegenerada`,`estado`) values 
(1,'2023-07-08 08:00:44','defcmr10@gmail.com','5254','0'),
(2,'2023-07-08 08:12:12','castillagfelix14@gmai.com','7999','1'),
(3,'2023-07-08 08:13:25','castillagfelix14@gmail.com','7528','1');

/* Procedure structure for procedure `spu_binarios_obtain` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_binarios_obtain` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_binarios_obtain`(IN `_idbook` INT)
BEGIN
		SELECT  idbook,frontpage,url
				FROM books 
			WHERE state2 = "1" AND idbook = _idbook;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_bookChinchanos_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_bookChinchanos_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_bookChinchanos_list`()
BEGIN
			SELECT  idbookChinchano, descriptions, author, state, url, frontpage
				FROM BooksChinchanos
			WHERE state = "1";
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_bookscategory_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_bookscategory_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_bookscategory_list`(IN `_idsubcategorie` INT)
BEGIN
		SELECT  b.descriptions, b.author,b.frontpage
			FROM books b
		INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
		WHERE _idsubcategorie = b.idsubcategorie;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_booksmainview_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_booksmainview_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_booksmainview_list`(
			)
BEGIN
				SELECT  bs.idbook,bs.descriptions,bs.author,bs.frontpage, round(SUM(cm.score) / count(cm.idcommentary))  as total
					FROM books bs
				left join commentaries cm on cm.idbook = bs.idbook
				WHERE bs.state2 = 1 and bs.idbook <= 6
				group by bs.idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_bookssubcategory_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_bookssubcategory_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_bookssubcategory_list`(
				IN _idsubcategorie INT
			)
BEGIN
				SELECT  b.idbook,b.descriptions, b.author,b.frontpage,ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				LEFT JOIN commentaries cm ON cm.idbook = b.idbook
				WHERE _idsubcategorie = b.idsubcategorie
				GROUP BY b.idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_booksummaries_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_booksummaries_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_booksummaries_list`(IN _idbook INT)
BEGIN
					SELECT  bs.idbook,bs.summary, bs.author, bs.frontpage,bs.descriptions, bs.url, bs.amount,
						ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
						FROM books bs
					LEFT JOIN commentaries cm ON cm.idbook = bs.idbook 
					WHERE bs.idbook = _idbook
					GROUP BY bs.idbook;		
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_delete` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_delete` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_delete`(IN `_idbook` INT)
BEGIN
		UPDATE books SET state2 = '0' WHERE idbook = _idbook;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_list`()
BEGIN
			SELECT  b.idbook, b.idcategorie, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
				b.author, b.state, b.locationresponsible, b.url, b.frontpage
				FROM books b
			INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
			INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
			WHERE b.state2 = "1";
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_lookfor` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_lookfor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_lookfor`(
				IN _type CHAR(1),
				IN _look VARCHAR(150)
			)
BEGIN
				IF _type = "n" THEN
					SELECT b.idbook,b.frontpage, b.descriptions, b.author, ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
					LEFT JOIN commentaries cm ON cm.idbook = b.idbook
					WHERE descriptions LIKE CONCAT('%',_look,'%')
					GROUP BY b.idbook;
				END IF;
				
				IF _type = "a" THEN 
					SELECT b.idbook,b.frontpage,b.descriptions, b.author, ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
					LEFT JOIN commentaries cm ON cm.idbook = b.idbook
					WHERE author LIKE CONCAT('%',_look,'%')
					GROUP BY b.idbook;
				END IF;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_obtain` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_obtain` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_obtain`(IN `_idbook` INT)
BEGIN
		SELECT  idbook,idcategorie,idsubcategorie,amount, descriptions,
				author, state, locationresponsible
				FROM books 
			WHERE state2 = "1" AND idbook = _idbook;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_register` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_register`(IN `_idcategorie` INT, IN `_idsubcategorie` INT, IN `_amount` VARCHAR(30) CHARSET utf8mb4, IN `_descriptions` VARCHAR(150) CHARSET utf8mb4, IN `_author` VARCHAR(150) CHARSET utf8mb4, IN `_state` VARCHAR(30) CHARSET utf8mb4, IN `_locationresponsible` VARCHAR(50) CHARSET utf8mb4, IN `_url` VARCHAR(150) CHARSET utf8mb4, IN `_frontpage` VARCHAR(150) CHARSET utf8mb4)
BEGIN
				DECLARE maximo VARCHAR (30);	
				DECLARE num INT;
				DECLARE cod VARCHAR (30);	
				SET maximo = (SELECT MAX(codes) FROM books);
				SET num = (SELECT LTRIM(RIGHT(maximo,3)));
				
				IF num>=1 AND num<=8 THEN
				 SET num=num+1;
				 SET cod = (SELECT CONCAT('C00', CAST(num AS CHAR)));
				ELSEIF num>=9 AND num<=98 THEN
				 SET num=num+1;
				 SET cod = (SELECT CONCAT('C0', CAST(num AS CHAR)));
				ELSEIF num>=99 AND num<=998 THEN
				 SET num=num+1;
				 SET cod = (SELECT CONCAT('C', CAST(num AS CHAR)));
				ELSE 
				 SET cod = (SELECT 'C001');
				END IF;
				
				IF _url = '' THEN SET _url = NULL; END IF;
				IF _frontpage = '' THEN SET _frontpage = NULL; END IF;
				INSERT INTO books(idcategorie,idsubcategorie,codes,amount,descriptions,author,state,locationresponsible,url,frontpage)VALUES(_idcategorie,_idsubcategorie,cod,_amount,_descriptions,_author,_state,_locationresponsible,_url,_frontpage);
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_books_update` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_books_update` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_books_update`(IN `_idbook` INT, IN `_idcategorie` INT, IN `_idsubcategorie` INT, IN `_amount` VARCHAR(30) CHARSET utf8mb4, IN `_descriptions` VARCHAR(150) CHARSET utf8mb4, IN `_author` VARCHAR(150) CHARSET utf8mb4, IN `_state` VARCHAR(30) CHARSET utf8mb4, IN `_locationresponsible` VARCHAR(50) CHARSET utf8mb4)
BEGIN
			UPDATE books SET
				idcategorie 		= _idcategorie,
				idsubcategorie 		= _idsubcategorie,
				amount 			= _amount,
				descriptions 		= _descriptions,
				author 			= _author,
				state 			= _state,
				locationresponsible 	= _locationresponsible
			WHERE idbook = _idbook;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cancellation_date` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cancellation_date` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cancellation_date`(
    IN loan_id INT
)
BEGIN
    -- Variables para almacenar los valores del préstamo
    DECLARE loan_amount VARCHAR(30);
    DECLARE book_id INT;

    -- Obtener el monto y el ID del libro del préstamo
    SELECT amount, idbook INTO loan_amount, book_id
    FROM loans
    WHERE idloan = loan_id;

    -- Actualizar la fecha de cancelación y el estado en el préstamo
    UPDATE loans
    SET cancellation_date = NOW(),
        state = 3
    WHERE idloan = loan_id;

    -- Sumar el monto del préstamo al campo amount de la tabla books
    UPDATE books
    SET amount = amount + loan_amount
    WHERE idbook = book_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categories_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categories_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categories_list`()
BEGIN
				SELECT idcategorie, categoryname,registrationdate
					FROM categories
				WHERE state = "1";
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_categorie_delete` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_categorie_delete` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categorie_delete`(IN _idcategorie INT)
BEGIN
					UPDATE categories SET state = '0' WHERE idcategorie = _idcategorie;
				END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_commentaries_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_commentaries_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_commentaries_list`(
	    IN _idusers INT,
	    IN _accesslevel CHAR(1)
	)
BEGIN
	    IF _accesslevel = 'D' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1 AND (users.idusers = _idusers OR users.accesslevel = 'E');
	    END IF;
	    IF _accesslevel = 'E' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1 AND users.idusers = _idusers;
	    END IF;
	    IF _accesslevel = 'A' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1;
	    END IF;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_correo_validacioncompleta` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_correo_validacioncompleta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_correo_validacioncompleta`(
				IN _email VARCHAR(120) CHARSET utf8mb4
			)
BEGIN
				UPDATE validacioncorreo SET estado = '0' WHERE email = _email;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_correo_validarclave` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_correo_validarclave` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_correo_validarclave`(
					IN _email VARCHAR(150) CHARSET utf8mb4,
					IN _clavegenerada CHAR(4)
				)
BEGIN
			IF (
			   (
			   SELECT clavegenerada
			   FROM validacioncorreo
			   WHERE email = _email AND estado = '1'
			   LIMIT 1
			   ) = _clavegenerada
			   )
			THEN
			   SELECT 'PERMITIDO' AS 'status';
			ELSE
			   SELECT 'DENEGADO' AS 'status';
			END IF;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_correo_validartiempo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_correo_validartiempo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_correo_validartiempo`(IN _email VARCHAR(120))
BEGIN
			IF ((SELECT COUNT(*) FROM validacioncorreo WHERE email = _email) =0) THEN
				SELECT 'GENERAR' AS 'status';
				ELSE
					-- Buscamos el último estado del usuario . si es 0, entonces debe GENERAR el código
					IF ((SELECT estado FROM validacioncorreo WHERE email = _email ORDER BY 1 DESC LIMIT 1)= 0)THEN
						SELECT 'GENERAR' AS 'status';
					ELSE
						-- En esta sección, el último registro es '1', NO sabemos si está dentro de los 15min permitidos
						IF
						(
								(
									SELECT COUNT(*) FROM validacioncorreo 
									WHERE email = _email AND estado = '1' AND
									NOW()NOT BETWEEN fechageneracion AND DATE_ADD(fechageneracion,INTERVAL 15 MINUTE)
									ORDER BY fechageneracion DESC LIMIT 1						
								) = 1
							)THEN
								-- El usuario tiene estado 1, pero esta fuera de los 15 minutos
								SELECT 'GENERAR' AS 'status';
							ELSE
								SELECT 'DENEGAR' AS 'status';
						END IF;
					END IF;
				END IF;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_delete_commentaries` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_delete_commentaries` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_delete_commentaries`(IN `_idcomentario` INT)
BEGIN
				 UPDATE commentaries
				 SET state = 0
				 WHERE idcommentary = _idcomentario;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_edit_categorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_edit_categorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_edit_categorie`(IN `_idcategorie` INT, IN `_categoryname` VARCHAR(50) CHARSET utf8mb4)
BEGIN
					UPDATE categories SET
						idcategorie 	= _idcategorie,
						categoryname	= _categoryname
					WHERE idcategorie = _idcategorie; 	
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_edit_subcategorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_edit_subcategorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_edit_subcategorie`(IN `_idcategorie` INT, IN `_idsubcategorie` INT, IN `_subcategoryname` VARCHAR(50) CHARSET utf8mb4)
BEGIN
						UPDATE subcategories SET
							idcategorie 	= _idcategorie,
							idsubcategorie 	= _idsubcategorie,
							subcategoryname	= _subcategoryname
						WHERE idsubcategorie = _idsubcategorie; 	
				END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_entregar_libro` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_entregar_libro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_entregar_libro`(
	IN p_loan_id INT
)
BEGIN
    DECLARE v_pickup_date DATETIME;
    
    -- Obtener la fecha y hora actual
    SET v_pickup_date = NOW();
    
    -- Actualizar el estado y la fecha de recojo del préstamo
    UPDATE loans
    SET state = '1', pickup_date = v_pickup_date
    WHERE idloan = p_loan_id;
    
    SELECT 'Libro entregado exitosamente.' AS message;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_filtrar_prestamo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_filtrar_prestamo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_filtrar_prestamo`(
	IN p_state CHAR(1)
)
BEGIN
    IF p_state = '0' THEN
        SELECT *
        FROM loans;
    ELSE
        SELECT *
        FROM loans
        WHERE state = p_state;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_grafico_prestamos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_grafico_prestamos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_grafico_prestamos`(
	    IN selectedMonth INT,
	    IN selectedYear INT
	)
BEGIN
	    DECLARE adjustedMonth INT;
	    SET adjustedMonth = selectedMonth - 1; -- Ajustar el valor del mes
	    SELECT l.idloan,
		   b.descriptions AS Titulo,
		   SUM(l.amount) AS Cantidad,
		   l.loan_date AS Fecha
	    FROM loans l
	    INNER JOIN books b ON l.idbook = b.idbook
	    WHERE YEAR(l.loan_date) = selectedYear AND MONTH(l.loan_date) = adjustedMonth
	    GROUP BY b.descriptions
	    ORDER BY l.loan_date DESC;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_prestamo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_prestamo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_prestamo`()
BEGIN
	    SELECT loans.idloan,
		   books.descriptions AS Titulo,
		   users.username AS Usuario,
		   loans.amount AS Cantidad,
		   loans.registration_date AS `F. Registro`,
		   loans.pickup_date AS `F. Recojo`,
		   loans.return_date AS `F. Retorno`,
		   loans.cancellation_date AS `F. Cancelacion`,
		   loans.observation AS Observacion,
		   loans.acotacion AS Perdida,
		   loans.state AS Estado
	    FROM loans
	    JOIN books ON loans.idbook = books.idbook
	    JOIN users ON loans.idusers = users.idusers;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listloans_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listloans_user` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listloans_user`(IN `_idusers` INT)
BEGIN
				SELECT 	ls.idloan,bs.idbook,ls.idusers,
					bs.descriptions,
					ls.loan_date,
					ls.return_date,
					observation
				FROM loans ls
				INNER JOIN books bs ON bs.idbook = ls.idbook
				WHERE idusers = _idusers;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_all_commentaries` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_all_commentaries` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_all_commentaries`(IN `_idbook` INT)
BEGIN 
						SELECT c.idcommentary, b.idbook, CONCAT(u.namess, ' ', u.surnames) AS Usuario,
							c.commentary, c.score, c.commentary_date
						FROM commentaries c
							INNER JOIN	books b ON b.idbook = c.idbook
							INNER JOIN	users u ON u.idusers = c.idusers;
				END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_commentaries` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_commentaries` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_commentaries`(IN `_idbook` INT)
BEGIN 
					SELECT c.idcommentary, b.idbook, CONCAT(u.namess, ' ', u.surnames) AS Usuario,
						c.commentary, c.score, c.commentary_date
					FROM commentaries c
						INNER JOIN	books b ON b.idbook = c.idbook
						INNER JOIN	users u ON u.idusers = c.idusers
					where b.idbook = _idbook AND c.state = 1
					ORDER BY c.idcommentary DESC
					LIMIT 5;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_dashboard_books` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_dashboard_books` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_dashboard_books`()
SELECT  COUNT(idbook) AS total_libros ,
		(SELECT COUNT(idcategorie) FROM categories) AS total_categorias,
		(SELECT COUNT(idcategorie) FROM subcategories) AS total_subcategorias,
		(SELECT COUNT(*) AS total_autores
			FROM (SELECT author FROM books GROUP BY author) AS Total) AS total_autores
	    FROM books
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_list_dashboard_users` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_list_dashboard_users` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_list_dashboard_users`()
SELECT  COUNT(idusers) AS total_users,
		(SELECT COUNT(*) FROM users WHERE accesslevel LIKE 'D') AS total_docentes,
		(SELECT COUNT(*) FROM loans WHERE state = 1) AS total_prestamos
	    FROM users
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_loans_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_loans_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_loans_list`(IN `_idusers` INT, IN `_accesslevel` CHAR(1) CHARSET utf8mb4)
BEGIN
					if _accesslevel = 'D' THEN 
						SELECT  s.idloan, b.descriptions, CONCAT(u.namess, ' ' , u.surnames) AS Usuario,
							s.observation, s.loan_date, s.return_date, s.amount, s.state
						FROM loans s
							INNER JOIN books b ON b.idbook = s.idbook
							INNER JOIN users u ON u.idusers = s.idusers
						WHERE u.idusers = _idusers;
					end if;
					
					IF _accesslevel = 'E' THEN 
						SELECT  s.idloan, b.descriptions, CONCAT(u.namess, ' ' , u.surnames) AS Usuario,
							s.observation, s.loan_date, s.return_date, s.amount, s.state
						FROM loans s
							INNER JOIN books b ON b.idbook = s.idbook
							INNER JOIN users u ON u.idusers = s.idusers
						WHERE u.idusers = _idusers;
					END IF;
					
					IF _accesslevel = 'A' THEN 
						SELECT  s.idloan, b.descriptions, CONCAT(u.namess, ' ' , u.surnames) AS Usuario,
							s.observation, s.loan_date, s.return_date, s.amount, s.state
						FROM loans s
							INNER JOIN books b ON b.idbook = s.idbook
							INNER JOIN users u ON u.idusers = s.idusers;
					end if;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_loans_register` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_loans_register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_loans_register`(IN `_idbook` INT, IN `_idusers` INT, IN `_observation` VARCHAR(100) CHARSET utf8mb4, IN `_loan_date` DATETIME, IN `_return_date` DATETIME, IN `_amount` VARCHAR(30) CHARSET utf8mb4)
BEGIN
					INSERT INTO loans(idbook,idusers,observation,loan_date,return_date,amount)
					VALUES(_idbook,_idusers,_observation,_loan_date,_return_date,_amount);	
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_loan_registration` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_loan_registration` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_loan_registration`(
	    IN _idbook INT,
	    IN _idusers INT,
	    IN _amount VARCHAR(30),
	    IN _pickup_date DATETIME,
	    IN _return_date DATETIME,
	    IN _cancellation_date DATETIME,
	    IN _observation VARCHAR(200)
	)
BEGIN
	    DECLARE v_book_amount INT;
	    -- Verificar si el libro existe y tiene una cantidad disponible mayor a 0
	    SELECT amount INTO v_book_amount
	    FROM books
	    WHERE idbook = _idbook;
	    
	    IF v_book_amount IS NULL THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'El libro no existe.';
	    ELSEIF v_book_amount < CAST(_amount AS INT) THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'No hay suficientes copias disponibles del libro.';
	    ELSE
		-- Realizar el préstamo y actualizar las tablas
		START TRANSACTION;
		
		-- Restar la cantidad prestada al campo "amount" de la tabla "books"
		UPDATE books
		SET amount = amount - CAST(_amount AS INT)
		WHERE idbook = _idbook;
		
		-- Insertar el préstamo en la tabla "loans"
		INSERT INTO loans (idbook, idusers, amount, registration_date, pickup_date, return_date, cancellation_date, observation, acotacion, state)
		VALUES (_idbook, _idusers, CAST(_amount AS INT), NOW(), _pickup_date, _return_date, _cancellation_date, _observation, NULL, '1');
		
		COMMIT;
	    END IF;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_mainviewcategories_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_mainviewcategories_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_mainviewcategories_list`()
BEGIN
			SELECT s.idcategorie, b.idsubcategorie, s.categoryname, b.subcategoryname
				FROM subcategories b
			inner join categories s on s.idcategorie = b.idcategorie;
			
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtain_categorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtain_categorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtain_categorie`(IN `_idcategorie` INT)
BEGIN
					SELECT idcategorie, categoryname 
						FROM categories
					WHERE idcategorie = _idcategorie;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtain_subcategorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtain_subcategorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtain_subcategorie`(IN `_idsubcategorie` INT)
BEGIN
						SELECT idcategorie,idsubcategorie, subcategoryname 
							FROM subcategories
						WHERE idsubcategorie = _idsubcategorie;
				END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtener_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtener_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtener_Comentario`(IN `p_idcomentario` INT)
BEGIN
    SELECT idcommentary, idusers, idbook, commentary
    FROM commentaries
    WHERE idcommentary = p_idcomentario
        AND commentary_delete IS NULL
        AND state = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtener_stock` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtener_stock` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtener_stock`(IN _idbook INT)
BEGIN
					SELECT * FROM books
					WHERE _idbook = idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtener_stocklibro` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtener_stocklibro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtener_stocklibro`(IN _idbook INT)
BEGIN
					SELECT * FROM books
					WHERE _idbook = idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_order_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_order_user` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_order_user`(IN `_iduser` VARCHAR(255) CHARSET utf8mb4)
BEGIN
	SELECT us.idusers, us.username, us.surnames, us.namess, us.email, us.accesslevel
		FROM users us
		WHERE FIND_IN_SET(us.accesslevel, _iduser) > 0
	ORDER BY us.accesslevel ASC, us.username ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_pickup_date` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_pickup_date` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_pickup_date`(
	IN p_idloan INT,
	IN p_pickup_date DATETIME
)
BEGIN
    UPDATE loans
    SET pickup_date = p_pickup_date,
        state = '2'
    WHERE idloan = p_idloan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_productos_obtener` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_productos_obtener` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_productos_obtener`(IN `_idproducto` INT)
BEGIN
SELECT idproducto, idclasificacion, idmarca, descripcion, esnuevo, numeroserie, precio
	FROM productos
	WHERE estado = '1' AND idproducto = _idproducto;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_register_categorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_register_categorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_register_categorie`(IN `_categoryname` VARCHAR(50) CHARSET utf8mb4)
BEGIN
					INSERT INTO categories(categoryname)
					VALUES(_categoryname);
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_register_commentaries` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_register_commentaries` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_register_commentaries`(IN `_idbook` INT, IN `_idusers` INT, IN `_commentary` VARCHAR(250) CHARSET utf8mb4, IN `_score` INT)
BEGIN
					INSERT INTO commentaries(idbook,idusers,commentary,score)
					VALUES(_idbook,_idusers,_commentary,_score);
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_register_subcategorie` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_register_subcategorie` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_register_subcategorie`(IN `_idcategorie` INT, IN `_subcategoryname` VARCHAR(50) CHARSET utf8mb4)
BEGIN
					INSERT INTO subcategories(idcategorie, subcategoryname)
					VALUES(_idcategorie,_subcategoryname);
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registration_date` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registration_date` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registration_date`(
	    IN _idbook INT,
	    IN _idusers INT,
	    IN _amount VARCHAR(30),
	    IN _pickup_date DATETIME,
	    IN _return_date DATETIME,
	    IN _cancellation_date DATETIME,
	    IN _observation VARCHAR(200)
	)
BEGIN
	    DECLARE v_book_amount INT;
	    -- Verificar si el libro existe y tiene una cantidad disponible mayor a 0
	    SELECT amount INTO v_book_amount
	    FROM books
	    WHERE idbook = _idbook;
	    
	    IF v_book_amount IS NULL THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'El libro no existe.';
	    ELSEIF v_book_amount < CAST(_amount AS INT) THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'No hay suficientes copias disponibles del libro.';
	    ELSE
		-- Realizar el préstamo y actualizar las tablas
		START TRANSACTION;
		
		-- Restar la cantidad prestada al campo "amount" de la tabla "books"
		UPDATE books
		SET amount = amount - CAST(_amount AS INT)
		WHERE idbook = _idbook;
		
		-- Insertar el préstamo en la tabla "loans"
		INSERT INTO loans (idbook, idusers, amount, registration_date, pickup_date, return_date, cancellation_date, observation, acotacion, state)
		VALUES (_idbook, _idusers, CAST(_amount AS INT), NOW(), _pickup_date, _return_date, _cancellation_date, _observation, NULL, '1');
		
		COMMIT;
	    END IF;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registra_claverecuperacion` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registra_claverecuperacion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registra_claverecuperacion`(
			IN _idusers INT, 
			IN _email VARCHAR(120),
			IN _clavegenerada CHAR(4)
		)
BEGIN
			UPDATE recuperarclave SET estado = '0' WHERE idusers = _idusers;
			INSERT INTO recuperarclave (idusers, email, clavegenerada) VALUES (_idusers, _email, _clavegenerada);
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registra_clavevalidacioncorreo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registra_clavevalidacioncorreo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registra_clavevalidacioncorreo`(
	IN _email VARCHAR(120) CHARSET utf8mb4,
	IN _clavegenerada CHAR(4)
)
BEGIN
	UPDATE validacioncorreo SET estado = '0' WHERE email = _email;
	INSERT INTO validacioncorreo (email, clavegenerada) VALUES (_email, _clavegenerada);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_reporte_comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_reporte_comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_reporte_comentario`(
	    IN _idbook INT,
	    IN _anio CHAR(4),
	    IN _mes CHAR(2),
	    IN _accesslevel CHAR(1)    
	)
BEGIN
	  IF _anio IS NOT NULL AND _mes IS NOT NULL AND _anio != '' AND _mes != '' THEN
		IF _accesslevel = 'D' THEN 
		    SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook and commentaries.state = '1'
			AND YEAR(commentaries.commentary_date) = _anio
			AND MONTH(commentaries.commentary_date) = _mes
			AND users.accesslevel = 'E';
		  ELSEIF _accesslevel = 'A' THEN
			SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1'
			AND YEAR(commentaries.commentary_date) = _anio
			AND MONTH(commentaries.commentary_date) = _mes;
		END IF;
	ELSE
		IF _accesslevel = 'D' THEN 
		    SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1'
			AND users.accesslevel = 'E';
		  ELSEIF _accesslevel = 'A' THEN
			SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1';
		END IF;
	END IF;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_reporte_libro` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_reporte_libro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_reporte_libro`(
			    IN _idcategorie INT,
			    IN _idsubcategorie INT    
			)
BEGIN
			  IF _idsubcategorie IS NULL || _idsubcategorie = '' THEN
				SELECT  b.idbook, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
					b.author, b.state, b.locationresponsible
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
				WHERE b.state2 = "1" and b.idcategorie = _idcategorie;
			ELSE
			
				SELECT  b.idbook, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
					b.author, b.state, b.locationresponsible
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
				WHERE b.state2 = "1" AND b.idcategorie = _idcategorie and b.idsubcategorie = _idsubcategorie;
				 
			END IF;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_reporte_prestamos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_reporte_prestamos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_reporte_prestamos`(
				 IN _idbook INT,
				 IN _anio CHAR(4),
				 IN _mes CHAR(2)
			)
BEGIN
			IF _anio IS NOT NULL AND _mes IS NOT NULL AND _anio != '' AND _mes != '' THEN
				SELECT loans.idloan, books.descriptions, CONCAT(users.namess, ' ', users.surnames) AS nombre_completo, 
					loans.amount, loans.loan_date, loans.return_date, loans.registrationdate
					 FROM loans
					 INNER JOIN books ON loans.idbook = books.idbook
					 INNER JOIN users ON loans.idusers = users.idusers
					 WHERE loans.idbook = _idbook
						AND YEAR(loans.registrationdate) = _anio
						AND MONTH(loans.registrationdate) = _mes;
				
			else
			
				SELECT loans.idloan, books.descriptions, CONCAT(users.namess, ' ', users.surnames) AS nombre_completo, 
					loans.amount, loans.loan_date, loans.return_date, loans.registrationdate
						 FROM loans
						 INNER JOIN books ON loans.idbook = books.idbook
						 INNER JOIN users ON loans.idusers = users.idusers
						 WHERE loans.idbook = _idbook;
			end if;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_report_subcategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_report_subcategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_report_subcategoria`(
				IN _idcategorie VARCHAR(255)
			)
BEGIN
				SELECT sub.idsubcategorie, cat.categoryname,sub.subcategoryname,sub.registrationdate
					FROM subcategories sub
					INNER JOIN categories cat ON cat.idcategorie = sub.idcategorie
					WHERE FIND_IN_SET (cat.idcategorie,_idcategorie) > 0
				ORDER BY sub.idsubcategorie ASC;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_return_date` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_return_date` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_return_date`(
	IN p_idloan INT, 
	IN p_acotacion VARCHAR(200)
)
BEGIN
    -- Actualizar la fecha de retorno y el estado del préstamo
    UPDATE loans
    SET return_date = NOW(),
        state = '4',
        acotacion = p_acotacion
    WHERE idloan = p_idloan;

    -- Sumar el amount del préstamo al amount de la tabla books
    UPDATE books
    SET amount = amount + (SELECT amount FROM loans WHERE idloan = p_idloan)
    WHERE idbook = (SELECT idbook FROM loans WHERE idloan = p_idloan);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_searchuser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_searchuser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_searchuser`(IN `_username` VARCHAR(150) CHARSET utf8mb4)
BEGIN
	  SELECT 
		idusers,
		username,
		surnames,
		namess,
		email
		FROM users
		WHERE username = _username AND state = '1';
	 END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_search_users_loans` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_search_users_loans` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_search_users_loans`(IN _idusers INT)
BEGIN
		  DECLARE record_count INT;
		  DECLARE user_accesslevel CHAR(1);
		  -- Obtener el accesslevel del usuario
		  SELECT accesslevel INTO user_accesslevel
		  FROM users
		  WHERE idusers = _idusers;
		  IF user_accesslevel IN ('D', 'A') THEN
		    SELECT COUNT(*) INTO record_count
		    FROM loans
		    WHERE idusers = _idusers AND state IN (1, 2);
		    IF record_count < 5 THEN
		      SELECT 'PERMITIDO' AS result;
		    ELSE
		      SELECT 'DENEGADO' AS result;
		    END IF;
		  ELSEIF user_accesslevel = 'E' THEN
		    SELECT COUNT(*) INTO record_count
		    FROM loans
		    WHERE idusers = _idusers AND state IN (1, 2);
		    IF record_count < 1 THEN
		      SELECT 'PERMITIDO' AS result;
		    ELSE
		      SELECT 'NEGADO' AS result;
		    END IF;
		  ELSE
		    SELECT 'RECHAZADO' AS result; -- Si el accesslevel no es ni 'D', 'A' ni 'E', se deniega el acceso
		  END IF;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_stock_libro` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_stock_libro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_stock_libro`(IN _idbook INT)
BEGIN
					SELECT * FROM books
					WHERE _idbook = idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_subcategories2_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_subcategories2_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_subcategories2_list`()
BEGIN
			SELECT idsubcategorie, subcategoryname
				FROM subcategories;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_subcategories3_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_subcategories3_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_subcategories3_list`(
			)
BEGIN
				SELECT sub.idsubcategorie, cat.categoryname,sub.subcategoryname,sub.registrationdate
					FROM subcategories sub
					INNER JOIN categories cat ON cat.idcategorie = sub.idcategorie
				WHERE sub.state = '1';
					
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_subcategories_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_subcategories_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_subcategories_list`( IN _idcategorie INT
			)
BEGIN
				SELECT idsubcategorie, subcategoryname
					FROM subcategories
					WHERE _idcategorie = idcategorie AND state = '1';
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_subcategorie_delete` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_subcategorie_delete` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_subcategorie_delete`(IN _idsubcategorie INT)
BEGIN
				UPDATE subcategories SET state = '0' WHERE idsubcategorie = _idsubcategorie;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_update_frontpage` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_update_frontpage` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_update_frontpage`(IN `_idbook` INT, IN `_frontpage` VARCHAR(150) CHARSET utf8mb4)
BEGIN
			    UPDATE books
			    SET frontpage = _frontpage
			    WHERE idbook = _idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_update_pdf` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_update_pdf` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_update_pdf`(IN `_idbook` INT, IN `_url` VARCHAR(250) CHARSET utf8mb4)
BEGIN
			    UPDATE books
			    SET url = _url
			    WHERE idbook = _idbook;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_update_users` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_update_users` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_update_users`(IN `_idusers` INT, IN `_accesskey` VARCHAR(100) CHARSET utf8mb4)
BEGIN
					UPDATE users SET
					accesskey 	= _accesskey
					WHERE idusers = _idusers;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usersloans_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usersloans_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usersloans_list`()
BEGIN
				SELECT idusers, CONCAT(namess, ' ' , surnames)as Users
				FROM users;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_contraseña` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_contraseña` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_contraseña`(IN `_email` VARCHAR(100) CHARSET utf8mb4)
BEGIN
				SELECT idusers, surnames, namess, email, accesskey, accesslevel
					FROM users
					WHERE email = _email AND state = '1';
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_disable` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_disable` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_disable`(IN `_idusers` INT)
BEGIN
			UPDATE users SET state = '0' WHERE idusers = _idusers;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_list` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_list` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_list`()
BEGIN
				SELECT  idusers, username, surnames, namess, email, accesslevel
					FROM users
					WHERE state = "1";
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_login`(IN `_email` VARCHAR(100) CHARSET utf8mb4)
BEGIN
				SELECT idusers, surnames, namess, email, accesskey, accesslevel,state
					FROM users
					WHERE email = _email AND state = '1';
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_obtain` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_obtain` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_obtain`(IN `_idusers` INT)
BEGIN
				SELECT  idusers, namess, username,surnames, accesslevel,email,accesskey
						FROM users 
					WHERE state = "1" AND idusers = _idusers;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_register` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_register`(IN `_username` VARCHAR(50) CHARSET utf8mb4, IN `_surnames` VARCHAR(30) CHARSET utf8mb4, IN `_namess` VARCHAR(30) CHARSET utf8mb4, IN `_email` VARCHAR(100) CHARSET utf8mb4, IN `_accesskey` VARCHAR(100) CHARSET utf8mb4, IN `_accesslevel` VARCHAR(100) CHARSET utf8mb4)
BEGIN
				INSERT INTO users (username,surnames, namess, email, accesskey, accesslevel) VALUES
				(_username, _surnames, _namess, _email, _accesskey, _accesslevel);
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_users_update` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_users_update` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_users_update`(IN `_idusers` INT, IN `_namess` VARCHAR(30) CHARSET utf8mb4, IN `_surnames` VARCHAR(100) CHARSET utf8mb4, IN `_username` VARCHAR(50) CHARSET utf8mb4, IN `_email` VARCHAR(100) CHARSET utf8mb4, IN `_accesslevel` VARCHAR(100) CHARSET utf8mb4, IN `_accesskey` VARCHAR(100) CHARSET utf8mb4)
BEGIN
				UPDATE users SET
					namess 		= _namess,
					surnames 	= _surnames,
					username	= _username,
					email 		= _email,
					accesslevel 	= _accesslevel,
					accesskey 	= _accesskey
					
				WHERE idusers = _idusers;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuario_actualizarpasssword` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuario_actualizarpasssword` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuario_actualizarpasssword`(
    IN _idusers INT,
    IN _accesskey VARCHAR(100)
)
BEGIN
    UPDATE users SET accesskey = _accesskey WHERE idusers = _idusers;
    UPDATE recuperarclave SET estado = '0' WHERE idusers = _idusers;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuario_validarclave` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuario_validarclave` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuario_validarclave`(
    IN _idusers INT,
    IN _clavegenerada CHAR(4)
)
BEGIN
    IF (
        (
        SELECT clavegenerada
        FROM recuperarclave
        WHERE idusers = _idusers AND estado = '1'
        LIMIT 1
        ) = _clavegenerada
    )
    THEN
        SELECT 'PERMITIDO' AS 'status';
    ELSE
        SELECT 'DENEGADO' AS 'status';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuario_validartiempo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuario_validartiempo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuario_validartiempo`(
			IN _idusers INT
		)
BEGIN
			IF ((SELECT COUNT(*) FROM recuperarclave WHERE idusers = _idusers) =0) THEN
				SELECT 'GENERAR' AS 'status';
				ELSE
					-- Buscamos el último estado del usuario . si es 0, entonces debe GENERAR el código
					IF ((SELECT estado FROM recuperarclave WHERE idusers = _idusers ORDER BY 1 DESC LIMIT 1)= 0)THEN
						SELECT 'GENERAR' AS 'status';
					ELSE
						-- En esta sección, el último registro es '1', NO sabemos si está dentro de los 15min permitidos
						IF
						(
								(
									SELECT COUNT(*) FROM recuperarclave 
									WHERE idusers = _idusers AND estado = '1' AND
									NOW()NOT BETWEEN fechageneracion AND DATE_ADD(fechageneracion,INTERVAL 15 MINUTE)
									ORDER BY fechageneracion DESC LIMIT 1						
								) = 1
							)THEN
								-- El usuario tiene estado 1, pero esta fuera de los 15 minutos
								SELECT 'GENERAR' AS 'status';
							ELSE
								SELECT 'DENEGAR' AS 'status';
						END IF;
					END IF;
				END IF;
		END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_validate_email` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_validate_email` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_validate_email`(IN `_email` VARCHAR(100) CHARSET utf8mb4)
BEGIN
					SELECT email 
						FROM users
					WHERE email = _email;
			END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_validate_username` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_validate_username` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_validate_username`(IN `_username` VARCHAR(100) CHARSET utf8mb4)
BEGIN
				SELECT username 
					FROM users
				WHERE username = _username;
		END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
