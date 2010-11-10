-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.47-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cond
--

CREATE DATABASE IF NOT EXISTS cond;
USE cond;

--
-- Temporary table structure for view `transazioniex`
--
DROP TABLE IF EXISTS `transazioniex`;
DROP VIEW IF EXISTS `transazioniex`;
CREATE TABLE `transazioniex` (
  `rowtype` varchar(7),
  `id` varbinary(27),
  `id_transazione` int(11) unsigned,
  `anno_competenza` bigint(20) unsigned,
  `anno_registrazione` int(11) unsigned,
  `tipo_transazione` varchar(5),
  `id_causale` varchar(5),
  `id_cassa` varchar(5),
  `id_controparte` int(11),
  `descrizione` varchar(100),
  `importo` decimal(32,2),
  `data_doc` date,
  `riferim_doc` varchar(20),
  `data_pagam` date,
  `des_pagam` varchar(20)
);

--
-- Definition of table `bilanci`
--

DROP TABLE IF EXISTS `bilanci`;
CREATE TABLE `bilanci` (
  `id_bilancio` int(11) NOT NULL AUTO_INCREMENT,
  `anno` int(10) unsigned NOT NULL,
  `sezione` varchar(50) NOT NULL,
  `voce` varchar(50) NOT NULL,
  `valore` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id_bilancio`)
) ENGINE=InnoDB AUTO_INCREMENT=2245 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilanci`
--

/*!40000 ALTER TABLE `bilanci` DISABLE KEYS */;
INSERT INTO `bilanci` (`id_bilancio`,`anno`,`sezione`,`voce`,`valore`) VALUES 
 (501,2000,'pagam','pag_precnonpag_tipo_cassa_U_b','123.00'),
 (1721,2007,'cassa','prec_conto_b','0.00'),
 (1722,2007,'cassa','prec_conto_c','0.00'),
 (1723,2007,'cassa','prec','0.00'),
 (1724,2007,'cassa','tot_tipo_conto_E_b','0.00'),
 (1725,2007,'cassa','tot_tipo_conto_E_c','0.00'),
 (1726,2007,'cassa','tot_tipo_conto_U_b','0.00'),
 (1727,2007,'cassa','tot_tipo_conto_U_c','0.00'),
 (1728,2007,'cassa','tot_tipo_E','0.00'),
 (1729,2007,'cassa','tot_tipo_U','0.00'),
 (1730,2007,'cassa','tot_conto_b','0.00'),
 (1731,2007,'cassa','tot_conto_c','0.00'),
 (1732,2007,'cassa','tot','0.00'),
 (1733,2007,'pagam','precnonpag_tipo_E','0.00'),
 (1734,2007,'pagam','precnonpag_tipo_U','0.00'),
 (1735,2007,'pagam','pag_precnonpag_tipo_conto_E_b','0.00'),
 (1736,2007,'pagam','pag_precnonpag_tipo_conto_E_c','0.00'),
 (1737,2007,'pagam','pag_precnonpag_tipo_conto_U_b','0.00'),
 (1738,2007,'pagam','pag_precnonpag_tipo_conto_U_c','0.00'),
 (1739,2007,'pagam','nonpag_precnonpag_tipo_E','0.00'),
 (1740,2007,'pagam','nonpag_precnonpag_tipo_U','0.00'),
 (1741,2007,'pagam','corr_tipo_E','1205.32'),
 (1742,2007,'pagam','corr_tipo_U','0.00'),
 (1743,2007,'pagam','pag_corr_tipo_conto_E_b','0.00'),
 (1744,2007,'pagam','pag_corr_tipo_conto_E_c','0.00'),
 (1745,2007,'pagam','pag_corr_tipo_conto_U_b','0.00'),
 (1746,2007,'pagam','pag_corr_tipo_conto_U_c','0.00'),
 (1747,2007,'pagam','nonpag_corr_tipo_E','1205.32'),
 (1748,2007,'pagam','nonpag_corr_tipo_U','0.00'),
 (1749,2007,'patrim','saldocassa','0.00'),
 (1750,2007,'patrim','risgestione_prec','0.00'),
 (1751,2007,'patrim','sit_vcond_corr','1205.32'),
 (1752,2007,'patrim','sit_vforn_corr','0.00'),
 (1753,2007,'patrim','sit_vcond_prec','0.00'),
 (1754,2007,'patrim','sit_vforn_prec','0.00'),
 (1755,2007,'patrim','risgestione_corr','1205.32'),
 (1756,2007,'patrim','tot_pareggio_att','1205.32'),
 (1757,2007,'patrim','tot_pareggio_pas','1205.32'),
 (1758,2008,'cassa','prec_conto_b','0.00'),
 (1759,2008,'cassa','prec_conto_c','0.00'),
 (1760,2008,'cassa','prec','0.00'),
 (1761,2008,'cassa','tot_tipo_conto_E_b','5385.59'),
 (1762,2008,'cassa','tot_tipo_conto_E_c','0.00'),
 (1763,2008,'cassa','tot_tipo_conto_U_b','-2935.43'),
 (1764,2008,'cassa','tot_tipo_conto_U_c','0.00'),
 (1765,2008,'cassa','tot_tipo_E','5385.59'),
 (1766,2008,'cassa','tot_tipo_U','-2935.43'),
 (1767,2008,'cassa','tot_conto_b','2450.16'),
 (1768,2008,'cassa','tot_conto_c','0.00'),
 (1769,2008,'cassa','tot','2450.16'),
 (1770,2008,'pagam','precnonpag_tipo_E','1205.32'),
 (1771,2008,'pagam','precnonpag_tipo_U','0.00'),
 (1772,2008,'pagam','pag_precnonpag_tipo_conto_E_b','0.00'),
 (1773,2008,'pagam','pag_precnonpag_tipo_conto_E_c','0.00'),
 (1774,2008,'pagam','pag_precnonpag_tipo_conto_U_b','0.00'),
 (1775,2008,'pagam','pag_precnonpag_tipo_conto_U_c','0.00'),
 (1776,2008,'pagam','nonpag_precnonpag_tipo_E','1205.32'),
 (1777,2008,'pagam','nonpag_precnonpag_tipo_U','0.00'),
 (1778,2008,'pagam','corr_tipo_E','6504.28'),
 (1779,2008,'pagam','corr_tipo_U','-5443.93'),
 (1780,2008,'pagam','pag_corr_tipo_conto_E_b','5385.59'),
 (1781,2008,'pagam','pag_corr_tipo_conto_E_c','0.00'),
 (1782,2008,'pagam','pag_corr_tipo_conto_U_b','-2935.43'),
 (1783,2008,'pagam','pag_corr_tipo_conto_U_c','0.00'),
 (1784,2008,'pagam','nonpag_corr_tipo_E','1118.69'),
 (1785,2008,'pagam','nonpag_corr_tipo_U','-2508.50'),
 (1786,2008,'patrim','saldocassa','2450.16'),
 (1787,2008,'patrim','risgestione_prec','1205.32'),
 (1788,2008,'patrim','sit_vcond_corr','1118.69'),
 (1789,2008,'patrim','sit_vforn_corr','-2508.50'),
 (1790,2008,'patrim','sit_vcond_prec','1205.32'),
 (1791,2008,'patrim','sit_vforn_prec','0.00'),
 (1792,2008,'patrim','risgestione_corr','1060.35'),
 (1793,2008,'patrim','tot_pareggio_att','4774.17'),
 (1794,2008,'patrim','tot_pareggio_pas','4774.17'),
 (2060,2009,'cassa','prec_conto_b','2450.16'),
 (2061,2009,'cassa','prec_conto_c','0.00'),
 (2062,2009,'cassa','prec','2450.16'),
 (2063,2009,'cassa','tot_tipo_conto_E_b','5722.03'),
 (2064,2009,'cassa','tot_tipo_conto_E_c','1205.32'),
 (2065,2009,'cassa','tot_tipo_conto_U_b','-6064.85'),
 (2066,2009,'cassa','tot_tipo_conto_U_c','-1258.91'),
 (2067,2009,'cassa','tot_tipo_E','6927.35'),
 (2068,2009,'cassa','tot_tipo_U','-7323.76'),
 (2069,2009,'cassa','tot_conto_b','1857.34'),
 (2070,2009,'cassa','tot_conto_c','196.41'),
 (2071,2009,'cassa','tot','2053.75'),
 (2072,2009,'pagam','precnonpag_tipo_E','2324.01'),
 (2073,2009,'pagam','precnonpag_tipo_U','-2508.50'),
 (2074,2009,'pagam','pag_precnonpag_tipo_conto_E_b','1118.69'),
 (2075,2009,'pagam','pag_precnonpag_tipo_conto_E_c','1205.32'),
 (2076,2009,'pagam','pag_precnonpag_tipo_conto_U_b','-2508.50'),
 (2077,2009,'pagam','pag_precnonpag_tipo_conto_U_c','0.00'),
 (2078,2009,'pagam','nonpag_precnonpag_tipo_E','0.00'),
 (2079,2009,'pagam','nonpag_precnonpag_tipo_U','0.00'),
 (2080,2009,'pagam','corr_tipo_E','5530.00'),
 (2081,2009,'pagam','corr_tipo_U','-5927.00'),
 (2082,2009,'pagam','pag_corr_tipo_conto_E_b','4603.34'),
 (2083,2009,'pagam','pag_corr_tipo_conto_E_c','0.00'),
 (2084,2009,'pagam','pag_corr_tipo_conto_U_b','-3556.35'),
 (2085,2009,'pagam','pag_corr_tipo_conto_U_c','-1258.91'),
 (2086,2009,'pagam','nonpag_corr_tipo_E','926.66'),
 (2087,2009,'pagam','nonpag_corr_tipo_U','-1111.74'),
 (2088,2009,'patrim','saldocassa','2053.75'),
 (2089,2009,'patrim','saldogestioni_prec','2265.67'),
 (2090,2009,'patrim','sit_vcond_corr','926.66'),
 (2091,2009,'patrim','sit_vforn_corr','-1111.74'),
 (2092,2009,'patrim','sit_vcond_prec','0.00'),
 (2093,2009,'patrim','sit_vforn_prec','0.00'),
 (2094,2009,'patrim','risgestione_corr','-397.00'),
 (2095,2009,'patrim','tot_pareggio_att','3377.41'),
 (2096,2009,'patrim','tot_pareggio_pas','3377.41'),
 (2208,2010,'cassa','prec_conto_b','1857.34'),
 (2209,2010,'cassa','prec_conto_c','196.41'),
 (2210,2010,'cassa','prec','2053.75'),
 (2211,2010,'cassa','tot_tipo_conto_E_b','3639.90'),
 (2212,2010,'cassa','tot_tipo_conto_E_c','0.00'),
 (2213,2010,'cassa','tot_tipo_conto_U_b','-5079.24'),
 (2214,2010,'cassa','tot_tipo_conto_U_c','-177.30'),
 (2215,2010,'cassa','tot_tipo_E','3639.90'),
 (2216,2010,'cassa','tot_tipo_U','-5256.54'),
 (2217,2010,'cassa','tot_conto_b','418.00'),
 (2218,2010,'cassa','tot_conto_c','19.11'),
 (2219,2010,'cassa','tot','437.11'),
 (2220,2010,'pagam','precnonpag_tipo_E','7398.07'),
 (2221,2010,'pagam','precnonpag_tipo_U','-1111.74'),
 (2222,2010,'pagam','pag_precnonpag_tipo_conto_E_b','0.00'),
 (2223,2010,'pagam','pag_precnonpag_tipo_conto_E_c','0.00'),
 (2224,2010,'pagam','pag_precnonpag_tipo_conto_U_b','-964.14'),
 (2225,2010,'pagam','pag_precnonpag_tipo_conto_U_c','-147.60'),
 (2226,2010,'pagam','nonpag_precnonpag_tipo_E','7398.07'),
 (2227,2010,'pagam','nonpag_precnonpag_tipo_U','0.00'),
 (2228,2010,'pagam','corr_tipo_E','5500.00'),
 (2229,2010,'pagam','corr_tipo_U','-4239.80'),
 (2230,2010,'pagam','pag_corr_tipo_conto_E_b','3639.90'),
 (2231,2010,'pagam','pag_corr_tipo_conto_E_c','0.00'),
 (2232,2010,'pagam','pag_corr_tipo_conto_U_b','-4115.10'),
 (2233,2010,'pagam','pag_corr_tipo_conto_U_c','-29.70'),
 (2234,2010,'pagam','nonpag_corr_tipo_E','1860.10'),
 (2235,2010,'pagam','nonpag_corr_tipo_U','0.00'),
 (2236,2010,'patrim','saldocassa','437.11'),
 (2237,2010,'patrim','saldogestioni_prec','1818.70'),
 (2238,2010,'patrim','sit_vcond_corr','1860.10'),
 (2239,2010,'patrim','sit_vforn_corr','0.00'),
 (2240,2010,'patrim','sit_vcond_prec','7398.07'),
 (2241,2010,'patrim','sit_vforn_prec','0.00'),
 (2242,2010,'patrim','risgestione_corr','1260.20'),
 (2243,2010,'patrim','tot_pareggio_att','9695.28'),
 (2244,2010,'patrim','tot_pareggio_pas','3078.90');
/*!40000 ALTER TABLE `bilanci` ENABLE KEYS */;


--
-- Definition of table `casse`
--

DROP TABLE IF EXISTS `casse`;
CREATE TABLE `casse` (
  `id_cassa` varchar(5) NOT NULL,
  `descrizione` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cassa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casse`
--

/*!40000 ALTER TABLE `casse` DISABLE KEYS */;
INSERT INTO `casse` (`id_cassa`,`descrizione`) VALUES 
 ('b','Banca'),
 ('c','Contanti');
/*!40000 ALTER TABLE `casse` ENABLE KEYS */;


--
-- Definition of table `causali`
--

DROP TABLE IF EXISTS `causali`;
CREATE TABLE `causali` (
  `id_causale` varchar(5) NOT NULL,
  `descrizione` varchar(50) NOT NULL,
  `segno` int(10) NOT NULL DEFAULT '1',
  `tipo` varchar(5) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`id_causale`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `causali`
--

/*!40000 ALTER TABLE `causali` DISABLE KEYS */;
INSERT INTO `causali` (`id_causale`,`descrizione`,`segno`,`tipo`) VALUES 
 ('a','Acqua',-1,'U'),
 ('am','Amministrazione',-1,'U'),
 ('as','Assicurazioni',-1,'U'),
 ('bp','Spese bancarie e postali',-1,'U'),
 ('cv','Spese cortile Villoresi 24 est.',-1,'U'),
 ('e','Elettricità',-1,'U'),
 ('g','Giroconti',0,'G'),
 ('m-o','Manutenzione ordinaria',-1,'U'),
 ('q','Quote',1,'E'),
 ('s','Servizi (pulizia etc.)',-1,'U'),
 ('v','Varie',-1,'U');
/*!40000 ALTER TABLE `causali` ENABLE KEYS */;


--
-- Definition of table `controparti`
--

DROP TABLE IF EXISTS `controparti`;
CREATE TABLE `controparti` (
  `id_controparte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `millesimi` decimal(6,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_controparte`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controparti`
--

/*!40000 ALTER TABLE `controparti` DISABLE KEYS */;
INSERT INTO `controparti` (`id_controparte`,`tipo`,`nome`,`millesimi`) VALUES 
 (1,'c','Perini - Fronti','164.30'),
 (2,'c','Bruno','164.30'),
 (3,'c','Anagnostopoulou','166.60'),
 (4,'c','Mannino','166.60'),
 (5,'c','Monaco','166.60'),
 (6,'c','Chiossone','171.60'),
 (7,'f','Condominio est.',NULL),
 (8,'f','Tanzi',NULL),
 (9,'b','Intesa',NULL),
 (10,'f','IperCoop',NULL),
 (11,'b','IWBank',NULL),
 (12,'?','Loft 2004',NULL),
 (13,'f','Assoedilizia',NULL),
 (14,'f','Mansutti',NULL),
 (15,'f','MG',NULL),
 (16,'?','Ag. Entrate',NULL),
 (17,'f','Nonsoloscale',NULL),
 (18,'f','Omnia Impianti',NULL),
 (19,'f','A2A',NULL),
 (20,'f','Poste',NULL),
 (21,'f','Studio GMG',NULL),
 (22,'?','Altri','0.00'),
 (23,'f','Castorama','0.00');
/*!40000 ALTER TABLE `controparti` ENABLE KEYS */;


--
-- Definition of table `pagamenti`
--

DROP TABLE IF EXISTS `pagamenti`;
CREATE TABLE `pagamenti` (
  `id_transazione` int(10) unsigned NOT NULL DEFAULT '0',
  `anno_competenza` int(10) unsigned NOT NULL,
  `id_cassa` varchar(5) DEFAULT NULL,
  `importo` decimal(10,2) NOT NULL,
  `data_pagam` date DEFAULT NULL,
  `des_pagam` varchar(20) NOT NULL,
  `id_pagamento` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pagamenti`
--

/*!40000 ALTER TABLE `pagamenti` DISABLE KEYS */;
INSERT INTO `pagamenti` (`id_transazione`,`anno_competenza`,`id_cassa`,`importo`,`data_pagam`,`des_pagam`,`id_pagamento`) VALUES 
 (1,2008,'b','1000.00','2009-02-02','bonifico',1),
 (2,2008,'b','11.50','2008-05-25','contanti',2),
 (3,2008,'b','624.00','2008-09-09','bonifico',3),
 (4,2008,'b','84.00','2008-09-09','bonifico',4),
 (5,2008,'b','36.45','2008-06-30','?',5),
 (6,2008,'b','360.00','2009-03-09','bonifico',6),
 (7,2008,'b','480.00','2008-09-24','bonifico',7),
 (8,2008,'b','30.00','2008-09-18','contanti',8),
 (9,2008,'b','240.00','2008-10-20','bonifico',9),
 (10,2008,'b','240.00','2008-10-20','bonifico',10),
 (11,2008,'b','57.44','2008-09-30','?',11),
 (12,2008,'b','435.00','2009-03-09','bonifico',12),
 (13,2008,'b','12.00','2008-10-20','contanti',13),
 (14,2008,'b','240.00','2008-11-10','bonifico',14),
 (15,2008,'b','240.00','2008-12-09','bonifico',15),
 (16,2008,'b','480.00','2008-12-03','assegno',16),
 (17,2008,'b','90.00','2008-12-03','assegno',17),
 (18,2008,'b','299.00','2009-03-09','bonifico',18),
 (19,2008,'b','70.04','2008-12-31','?',19),
 (20,2008,'b','174.50','2009-03-09','bonifico',20),
 (21,2008,'b','232.00','2009-01-14','bonifico',21),
 (22,2008,'b','8.00','2009-02-16','banca',22),
 (23,2009,'c','16.10','2009-01-19','contanti',23),
 (25,2009,'b','120.00','2009-02-03','assegno',25),
 (26,2009,'b','232.00','2009-02-05','bonifico',26),
 (27,2009,'b','8.00','2009-03-09','banca',27),
 (28,2009,'b','384.00','2009-03-10','bonifico',28),
 (29,2009,'c','2.80','2009-02-23','contanti',29),
 (30,2009,'c','147.60','2010-06-29','bonifico',30),
 (31,2009,'b','144.00','2009-03-09','bonifico',31),
 (32,2009,'c','27.60','2009-03-17','contanti',32),
 (34,2009,'b','74.05','2009-03-17','banca',34),
 (35,2009,'c','6.09','2009-04-02','contanti',35),
 (36,2009,'b','417.60','2009-06-18','bonifico',36),
 (37,2009,'b','1014.54','2009-05-11','bonifico',37),
 (38,2009,'b','139.20','2009-06-18','bonifico',38),
 (39,2009,'b','19.27','2009-07-16','banca',39),
 (40,2009,'b','293.00','2009-07-17','bonifico',40),
 (41,2009,'b','296.00','2009-07-17','bonifico',41),
 (42,2009,'b','318.00','2009-09-19','bonifico',42),
 (43,2007,'c','1206.32','2009-09-08','assegno Porta',43),
 (44,2009,'b','-1409.00','2009-12-12','assegno',44),
 (45,2009,'b','800.00','2009-10-16','bonifico',45),
 (46,2009,'b','417.60','2009-09-19','bonifico',46),
 (47,2009,'b','14.89','2009-11-23','banca',47),
 (48,2009,'b','104.00','2009-11-22','bonifico',48),
 (49,2009,'b','120.00','2009-11-22','bonifico',49),
 (50,2009,'b','114.00','2010-01-09','bonifico',50),
 (51,2009,'b','49.20','2009-12-31','banca',51),
 (52,2009,'b','556.80','2010-02-22','bonifico',52),
 (53,2009,'b','19.20','2010-03-14','banca',53),
 (54,2009,'b','274.14','2010-10-03','bonifico',54),
 (55,2010,'b','1500.00','2010-01-01','',55),
 (56,2010,'b','101.00','2010-05-02','bonifico',56),
 (57,2007,'c','1205.32','2009-09-08','assegno',57),
 (126,2008,'b','326.30','2009-01-01','',58),
 (122,2008,'b','467.12','2009-01-01','',59),
 (60,2008,'b','325.27','2009-01-01','',60),
 (122,2008,'b','320.38','2008-09-29','',61),
 (62,2008,'b','651.09','2008-12-30','',62),
 (63,2008,'b','818.24','2008-12-30','',63),
 (126,2008,'b','629.21','2008-10-10','',64),
 (127,2008,'b','333.12','2008-12-24','',65),
 (66,2008,'b','1851.27','2008-08-12','',66),
 (127,2008,'b','782.28','2008-10-06','',67),
 (128,2009,'b','300.00','2009-05-11','bonifico',68),
 (129,2009,'b','300.00','2009-05-09','bonifico',69),
 (130,2009,'b','300.00','2009-04-30','bonifico',70),
 (131,2009,'b','300.00','2009-05-07','bonifico',71),
 (132,2009,'b','300.00','2009-05-27','bonifico',72),
 (73,2009,'b','940.37','2009-05-06','bonifico',73),
 (129,2009,'b','300.00','2009-07-22','bonifico',74),
 (132,2009,'b','300.00','2009-07-24','bonifico',75),
 (131,2009,'b','300.00','2009-07-23','bonifico',76),
 (128,2009,'b','600.00','2009-08-03','bonifico',77),
 (130,2009,'b','300.00','2009-08-04','bonifico',78),
 (132,2009,'b','312.97','2009-11-27','bonifico',79),
 (131,2009,'b','312.97','2010-01-30','bonifico',80),
 (129,2009,'b','300.36','2010-05-12','bonifico',81),
 (130,2009,'b','313.00','2010-05-07','bonifico',82),
 (83,2009,'','0.36',NULL,'cancellare?',83),
 (131,2009,'b','50.00','2009-04-01','bonifico',84),
 (86,2009,'c','250.00','2009-01-09','assegno',85),
 (87,2009,'b','-250.00','2009-01-09','assegno',86),
 (88,2009,'','1200.00',NULL,'',87),
 (89,2009,'b','312.97','2010-02-02','cancellare?',88),
 (90,2010,'b','6.15','2010-01-31','',89),
 (91,2010,'b','95.00','0000-00-00','',90),
 (92,2010,'b','417.60','2010-05-26','bonifico',91),
 (93,2010,'c','29.70','2010-06-23','contanti',92),
 (94,2010,'b','95.00','2010-07-19','rid',93),
 (95,2010,'b','417.60','2010-07-22','bonifico',94),
 (96,2010,'b','300.00','2010-07-21','bonifico',95),
 (97,2010,'b','600.00','2010-07-22','bonifico',96),
 (98,2010,'b','300.00','2010-07-27','bonifico',97),
 (99,2010,'b','600.00','2010-08-09','bonifico',98),
 (100,2010,'b','1026.94','2010-05-10','bonifico',99),
 (101,2010,'b','55.35','2010-01-01','',100),
 (102,2010,'b','19.20','2010-03-15','banca',101),
 (103,2010,'b','14.40','2010-05-26','banca',102),
 (104,2010,'b','417.60','2010-10-03','bonifico',103),
 (105,2010,'b','29.86','2010-10-03','bonifico',104),
 (106,2010,'b','14.40','2010-10-03','banca',105);
/*!40000 ALTER TABLE `pagamenti` ENABLE KEYS */;


--
-- Definition of table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `profiles`
--

/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`user_id`,`lastname`,`firstname`,`birthday`) VALUES 
 (0,'testuser','testuser','2010-10-22'),
 (1,'Admin','Administrator','0000-00-00'),
 (2,'Demo','Demo','0000-00-00'),
 (3,'test cognome','test nome','2010-09-16'),
 (8,'testuser','testuser','0000-00-00'),
 (10,'mannino','marcello','2010-11-19'),
 (11,'mannino','marcello','2010-11-19'),
 (12,'mannino','marcello','2010-11-19'),
 (13,'mannino','marcello','2010-11-19'),
 (14,'sdfsfsf','asdasd','2010-11-16'),
 (15,'sdfsfsf','asdasd','2010-11-16'),
 (16,'sdfsfsf','asdasd','2010-11-16'),
 (17,'sdfsfsf','asdasd','2010-11-16'),
 (18,'Mannino','Marcello','0000-00-00'),
 (19,'popopo','papapa','2010-11-10'),
 (20,'aaaaaaaaaa','mmmmm','2010-11-12'),
 (21,'mariaelena','mariaelena','0000-00-00'),
 (22,'gvhgvhg','fcjgfcgfc','0000-00-00'),
 (23,'ngfcgnfc','bcncnc','0000-00-00'),
 (24,'asdfasdfasdf','sadfasf','2010-11-19');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


--
-- Definition of table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles_fields`
--

/*!40000 ALTER TABLE `profiles_fields` DISABLE KEYS */;
INSERT INTO `profiles_fields` (`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) VALUES 
 (1,'lastname','Nome','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),
 (2,'firstname','Cognome','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),
 (3,'birthday','Data di nascita','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2);
/*!40000 ALTER TABLE `profiles_fields` ENABLE KEYS */;


--
-- Definition of table `riep_causali`
--

DROP TABLE IF EXISTS `riep_causali`;
CREATE TABLE `riep_causali` (
  `id_riepcausale` int(11) NOT NULL AUTO_INCREMENT,
  `anno` int(10) unsigned NOT NULL,
  `sezione` varchar(50) NOT NULL,
  `tipo_transazione` varchar(5) NOT NULL,
  `id_causale` varchar(5) NOT NULL,
  `valore` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id_riepcausale`)
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riep_causali`
--

/*!40000 ALTER TABLE `riep_causali` DISABLE KEYS */;
INSERT INTO `riep_causali` (`id_riepcausale`,`anno`,`sezione`,`tipo_transazione`,`id_causale`,`valore`) VALUES 
 (1,2009,'prev','E','q','5480.00'),
 (2,2008,'prev','E','q','6500.00'),
 (3,2008,'prev','U','as','800.00'),
 (4,2008,'prev','U','am','950.00'),
 (5,2008,'prev','U','bp','150.00'),
 (6,2008,'prev','U','m-o','300.00'),
 (7,2008,'prev','U','s','3000.00'),
 (8,2008,'prev','U','e','500.00'),
 (9,2008,'prev','U','a','600.00'),
 (10,2008,'prev','U','v','200.00'),
 (11,2008,'prev','U','cv','0.00'),
 (12,2009,'prev','U','as','1000.00'),
 (13,2009,'prev','U','am','0.00'),
 (14,2009,'prev','U','bp','180.00'),
 (15,2009,'prev','U','m-o','300.00'),
 (16,2009,'prev','U','s','3000.00'),
 (17,2009,'prev','U','e','500.00'),
 (18,2009,'prev','U','a','300.00'),
 (19,2009,'prev','U','v','200.00'),
 (20,2009,'prev','U','cv','0.00'),
 (21,2010,'prev','U','as','1050.00'),
 (22,2010,'prev','U','am','250.00'),
 (23,2010,'prev','U','bp','100.00'),
 (24,2010,'prev','U','m-o','300.00'),
 (25,2010,'prev','U','s','2000.00'),
 (26,2010,'prev','U','e','500.00'),
 (27,2010,'prev','U','a','300.00'),
 (28,2010,'prev','U','v','200.00'),
 (29,2010,'prev','U','cv','800.00'),
 (30,2010,'prev','E','q','5500.00'),
 (303,2007,'cons','E','q','1205.32'),
 (304,2008,'cons','E','q','6504.28'),
 (305,2008,'cons','U','a','174.50'),
 (306,2008,'cons','U','am','581.50'),
 (307,2008,'cons','U','as','1000.00'),
 (308,2008,'cons','U','bp','175.93'),
 (309,2008,'cons','U','e','1094.00'),
 (310,2008,'cons','U','m-o','30.00'),
 (311,2008,'cons','U','s','2388.00'),
 (414,2009,'cons','E','q','5530.00'),
 (415,2009,'cons','G','g','1200.00'),
 (416,2009,'cons','U','a','274.14'),
 (417,2009,'cons','U','am','411.60'),
 (418,2009,'cons','U','as','1014.54'),
 (419,2009,'cons','U','bp','126.05'),
 (420,2009,'cons','U','cv','2006.32'),
 (421,2009,'cons','U','e','-4.00'),
 (422,2009,'cons','U','m-o','104.00'),
 (423,2009,'cons','U','s','1824.56'),
 (424,2009,'cons','U','v','169.79'),
 (454,2010,'cons','E','q','5500.00'),
 (455,2010,'cons','U','as','1026.94'),
 (456,2010,'cons','U','bp','80.70'),
 (457,2010,'cons','U','cv','29.86'),
 (458,2010,'cons','U','e','291.00'),
 (459,2010,'cons','U','m-o','29.70'),
 (460,2010,'cons','U','s','1281.60'),
 (461,2010,'cons','U','v','1500.00');
/*!40000 ALTER TABLE `riep_causali` ENABLE KEYS */;


--
-- Definition of table `transazioni`
--

DROP TABLE IF EXISTS `transazioni`;
CREATE TABLE `transazioni` (
  `id_transazione` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_transazione` varchar(5) NOT NULL,
  `anno_registrazione` int(10) unsigned NOT NULL,
  `anno_competenza` int(10) unsigned NOT NULL,
  `id_causale` varchar(5) DEFAULT NULL,
  `_id_cassa` varchar(5) DEFAULT NULL,
  `id_controparte` int(11) NOT NULL DEFAULT '0',
  `_controparte` varchar(50) DEFAULT NULL,
  `descrizione` varchar(100) NOT NULL,
  `importo` decimal(10,2) NOT NULL,
  `data_doc` date DEFAULT NULL,
  `riferim_doc` varchar(20) DEFAULT NULL,
  `_data_pagam` date DEFAULT NULL,
  `_des_pagam` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transazione`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `transazioni`
--

/*!40000 ALTER TABLE `transazioni` DISABLE KEYS */;
INSERT INTO `transazioni` (`id_transazione`,`tipo_transazione`,`anno_registrazione`,`anno_competenza`,`id_causale`,`_id_cassa`,`id_controparte`,`_controparte`,`descrizione`,`importo`,`data_doc`,`riferim_doc`,`_data_pagam`,`_des_pagam`) VALUES 
 (1,'U',2008,2008,'as','b',14,'Mansutti','Assic. Reale Mutua Globale Fabbricati scad. 21-5-09','1000.00','2008-05-12','','2009-02-02','bonifico'),
 (2,'U',2008,2008,'am','b',22,'-','Libro verbali','11.50','2008-05-25','','2008-05-25','contanti'),
 (3,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura mar/mag 08','624.00','2008-05-30','','2008-09-09','bonifico'),
 (4,'U',2008,2008,'s','b',8,'Tanzi','Fornitura n. 2 trespoli reggisacco','84.00','2008-05-30','','2008-09-09','bonifico'),
 (5,'U',2008,2008,'bp','b',9,'Intesa','Spese e commissioni apr/mag/giu 2008','36.45','2008-06-30','','2008-06-30','?'),
 (6,'U',2008,2008,'e','b',19,'A2A','Elettricità periodo 9/6/08 - 23/7/08','360.00','2008-07-23','108003326340','2009-03-09','bonifico'),
 (7,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura giu/lug 08','480.00','2008-07-31','','2008-09-24','bonifico'),
 (8,'U',2008,2008,'m-o','b',15,'MG','Servizio pronto intervento agosto 2008','30.00','2008-09-18','','2008-09-18','contanti'),
 (9,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura ago 08','240.00','2008-09-23','174/2008','2008-10-20','bonifico'),
 (10,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura set 08','240.00','2008-09-23','175/2008','2008-10-20','bonifico'),
 (11,'U',2008,2008,'bp','b',9,'Intesa','Spese e commissioni lug/ago/set 2008','57.44','2008-09-30','','2008-09-30','?'),
 (12,'U',2008,2008,'e','b',19,'A2A','Elettricità periodo 24/7/08 - 10/10/08','435.00','2008-10-13','108004262674','2009-03-09','bonifico'),
 (13,'U',2008,2008,'bp','b',22,'-','Acquisto francobolli','12.00','2008-10-20','','2008-10-20','contanti'),
 (14,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura ott 08','240.00','2008-10-31','208/2008','2008-11-10','bonifico'),
 (15,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura nov 08','240.00','2008-11-28','223/2008','2008-12-09','bonifico'),
 (16,'U',2008,2008,'am','b',21,'Studio GMG','Compenso gestione apr/dic 2008','480.00','2008-12-03','','2008-12-03','assegno'),
 (17,'U',2008,2008,'am','b',21,'Studio GMG','Rimborso spese apr/dic 2008','90.00','2008-12-03','','2008-12-03','assegno'),
 (18,'U',2008,2008,'e','b',19,'A2A','Elettricità periodo 11/10/08 - 3/12/08','299.00','2008-12-04','1085005122039','2009-03-09','bonifico'),
 (19,'U',2008,2008,'bp','b',9,'Intesa','Spese e commissioni ott/nov/dic 2008','70.04','2008-12-31','','2008-12-31','?'),
 (20,'U',2008,2008,'a','b',7,'Condominio est.','Quota acqua m3 285','174.50','2008-12-30','','2009-03-09','bonifico'),
 (21,'U',2008,2008,'s','b',8,'Tanzi','Pulizia e asporto spazzatura dic 08','232.00','2009-01-05','9/2009','2009-01-14','bonifico'),
 (22,'U',2008,2008,'s','b',16,'Ag. Entrate','F24 su fattura n. 9/2009 Tanzi','8.00','2009-01-05','','2009-02-16','banca'),
 (23,'U',2009,2009,'v','c',22,'-','Acquisto timbro','16.10','2009-01-19','','2009-01-19','contanti'),
 (24,'U',0,0,'x','b',12,'Loft 2004','Rimborso spese pulizia','0.00','2009-01-29','',NULL,''),
 (25,'U',2009,2009,'am','b',21,'Studio GMG','Gestione R.A. su fatture fornitori - 2008','120.00','2009-01-29','44/2009','2009-02-03','assegno'),
 (26,'U',2009,2009,'s','b',8,'Tanzi','Pulizia e asporto spazzatura gen 09','232.00','2009-01-30','23/2009','2009-02-05','bonifico'),
 (27,'U',2009,2009,'s','b',16,'Ag. Entrate','F24 su fattura n. 23/2009 Tanzi','8.00','2009-01-30','','2009-03-09','banca'),
 (28,'U',2009,2009,'e','b',19,'A2A','Elettricità periodo 4/12/08 - 12/2/09','384.00','2009-02-16','309001037046','2009-03-10','bonifico'),
 (29,'U',2009,2009,'bp','c',20,'Poste','Racc. a Tanzi per certificazione R.A.','2.80','2009-02-23','','2009-02-23','contanti'),
 (30,'U',2009,2009,'v','c',18,'Omnia Impianti','Chiavi cancello strada','147.60','2009-02-28','1407','2010-06-29','bonifico'),
 (31,'U',2009,2009,'am','b',21,'Studio GMG','Compenso gestione gen/feb 2009','144.00','2009-03-09','65/2009','2009-03-09','bonifico'),
 (32,'U',2009,2009,'am','c',21,'Studio GMG','Trattenute per passaggio di consegne','27.60','2009-03-17','','2009-03-17','contanti'),
 (33,'U',2009,2009,'am','c',21,'Studio GMG','Sparizione contanti','0.00','2009-03-17','',NULL,''),
 (34,'U',2009,2009,'bp','b',9,'Intesa','Spese e commissioni gen/feb/mar 2009','74.05','2009-03-31','','2009-03-17','banca'),
 (35,'U',2009,2009,'v','c',10,'IperCoop','Cancelleria','6.09','2009-04-02','','2009-04-02','contanti'),
 (36,'U',2009,2009,'s','b',8,'Tanzi','Pulizia e asporto spazzatura feb/apr 09','417.60','2009-04-30','','2009-06-18','bonifico'),
 (37,'U',2009,2009,'as','b',14,'Mansutti','Assic. Reale Mutua Globale Fabbricati scad. 21-5-10','1014.54','2009-05-12','','2009-05-11','bonifico'),
 (38,'U',2009,2009,'s','b',8,'Tanzi','Pulizia e asporto spazzatura mag 09','139.20','2009-05-29','','2009-06-18','bonifico'),
 (39,'U',2009,2009,'s','b',16,'Ag. Entrate','F24 su fattura n. ?/2009 Tanzi','19.27','2009-07-16','','2009-07-16','banca'),
 (40,'U',2009,2009,'e','b',19,'A2A','Elettricità periodo 13/2/09 - 8/4/09','293.00','0000-00-00','309002549200','2009-07-17','bonifico'),
 (41,'U',2009,2009,'e','b',19,'A2A','Elettricità periodo 9/4/09 - 4/6/09','296.00','2009-06-05','309003791449','2009-07-17','bonifico'),
 (42,'U',2009,2009,'e','b',19,'A2A','Elettricità periodo 5/6/09 - 28/7/09','318.00','2009-07-29','','2009-09-19','bonifico'),
 (43,'U',2009,2007,'cv','c',7,'Condominio est.','Spese cortile pre condominio','1206.32','2009-09-08','','2009-09-08','assegno Porta'),
 (44,'U',2009,2009,'e','b',19,'A2A','Elettricità conguaglio 9/6/08 - 9/10/09','-1409.00','2009-10-12','','2009-12-12','assegno'),
 (45,'U',2009,2009,'cv','b',7,'Condominio est.','Spese cortile 2009','800.00','2009-10-16','','2009-10-16','bonifico'),
 (46,'U',2009,2009,'s','b',8,'Tanzi','Pulizia e asporto spazzatura giu-ago 09','417.60','2009-10-31','168/2009','2009-09-19','bonifico'),
 (47,'U',2009,2009,'s','b',16,'Ag. Entrate','F24 su fattura n. 168/2009 Tanzi','14.89','2009-11-23','168/2009','2009-11-23','banca'),
 (48,'U',2009,2009,'m-o','b',17,'Nonsoloscale','Scala','104.00','2009-11-24','1182','2009-11-22','bonifico'),
 (49,'U',2009,2009,'am','b',13,'Assoedilizia','Invio telematico mod. 770/2009','120.00','2009-12-10','','2009-11-22','bonifico'),
 (50,'U',2009,2009,'e','b',19,'A2A','Elettricità periodo 14/9/09 - 21/12/09','114.00','2009-12-29','309008506271','2010-01-09','bonifico'),
 (51,'U',2009,2009,'bp','b',11,'IWBank','Imposte di bollo c/c aprile - dicembre','49.20','2009-12-31','','2009-12-31','banca'),
 (52,'U',2009,2009,'s','b',8,'Tanzi','Pulizia e asporto spazzatura set-dic 09','556.80','2009-12-31','237','2010-02-22','bonifico'),
 (53,'U',2009,2009,'s','b',16,'Ag. Entrate','F24 su fattura n. 237/2009 Tanzi','19.20','2009-12-31','','2010-03-14','banca'),
 (54,'U',2009,2009,'a','b',7,'Condominio est.','Quota acqua mc 463','274.14','2009-12-31','','2010-10-03','bonifico'),
 (55,'U',2010,2010,'v','b',7,'Condominio est.','Fondo accantonamento','1500.00','2010-01-01','','2010-01-01',''),
 (56,'U',2010,2010,'e','b',19,'A2A','Elettricità periodo 22/12/09 - 21/2/10 - 128kWh (non ricevuta)','101.00','2010-03-01','310001389686','2010-05-02','bonifico'),
 (57,'E',2007,2007,'q','c',12,'Loft 2004','Quota pre gestione 2008','1205.32','2008-01-01','','2009-09-08','assegno'),
 (60,'E',2008,2008,'q','b',4,'Mannino','Quota gestione 2008','325.27','2008-04-01','','2009-01-01',''),
 (62,'E',2008,2008,'q','b',2,'Bruno','Quota gestione 2008','651.09','2008-04-01','','2008-12-30',''),
 (63,'E',2008,2008,'q','b',3,'Anagnostopoulou','Quota gestione 2008','818.24','2008-04-01','','2008-12-30',''),
 (66,'E',2008,2008,'q','b',12,'Loft 2004','Quota gestione 2008','1851.27','2008-04-01','','2008-08-12',''),
 (73,'E',2009,2009,'q','b',6,'Chiossone','Quota gestione 2009','940.37','2009-01-01','','2009-05-06','bonifico'),
 (86,'G',2009,2009,'g','c',9,'-','Prelevamento contanti con assegno','250.00','0000-00-00','','2009-01-09','assegno'),
 (87,'G',2009,2009,'g','b',9,'Intesa','Prelevamento contanti con assegno','-250.00','0000-00-00','','2009-01-09','assegno'),
 (88,'G',2009,2009,'g','',0,NULL,'Fondo','1200.00','2009-01-01',NULL,NULL,''),
 (90,'U',2010,2010,'bp','b',11,NULL,'Imposta di bollo','6.15','2010-02-01','','2010-01-31',''),
 (91,'U',2010,2010,'e','b',19,NULL,'Elettricità periodo 22/2/10 - 21/4/10 - 111kWh','95.00','2010-04-29','310002795688','0000-00-00',''),
 (92,'U',2010,2010,'s','b',8,NULL,'Pulizia e asporto spazzatura gen-mar 10','417.60','2010-04-30','97','2010-05-26','bonifico'),
 (93,'U',2010,2010,'m-o','c',23,NULL,'Lampadine per illuminazione cortile','29.70','2010-06-23','404020000434','2010-06-23','contanti'),
 (94,'U',2010,2010,'e','b',19,NULL,'Elettricità periodo 22/4/10 - 21/6/10 - 91kWh','95.00','2010-06-29','310004218520','2010-07-19','rid'),
 (95,'U',2010,2010,'s','b',8,NULL,'Pulizia e asporto spazzatura apr/giu 10','417.60','2010-06-30','126','2010-07-22','bonifico'),
 (96,'E',2010,2010,'q','b',3,NULL,'Quota gestione 2010','916.30','2010-01-01','','2010-07-21','bonifico'),
 (97,'E',2010,2010,'q','b',1,NULL,'Quota gestione 2010','903.65','2010-01-01','','2010-07-22','bonifico'),
 (98,'E',2010,2010,'q','b',2,NULL,'Quota gestione 2010','903.65','2010-01-01','','2010-07-27','bonifico'),
 (99,'E',2010,2010,'q','b',5,NULL,'Quota gestione 2010','916.30','2010-01-01','','2010-08-09','bonifico'),
 (100,'U',2010,2010,'as','b',14,NULL,'Assic. Reale Mutua Globale Fabbricati scad. 21-5-11','1026.94','0000-00-00','','2010-05-10','bonifico'),
 (101,'U',2010,2010,'bp','b',11,NULL,'Imposta di bollo gen-set 2010','55.35','2010-01-01','','2010-01-01',''),
 (102,'U',2010,2010,'bp','b',16,NULL,'F24 su fattura n. 97/2010 Tanzi','19.20','0000-00-00','','2010-03-15','banca'),
 (103,'U',2010,2010,'s','b',16,NULL,'F24 su fattura n. 126/2010 Tanzi','14.40','0000-00-00','','2010-05-26','banca'),
 (104,'U',2010,2010,'s','b',8,NULL,'Pulizia e asporto spazzatura lug/set 10','417.60','2010-09-30','176','2010-10-03','bonifico'),
 (105,'U',2010,2010,'cv','b',7,NULL,'Saldo (304 - 274.14 per acqua)','29.86','2010-02-10','rendiconto 2009','2010-10-03','bonifico'),
 (106,'U',2010,2010,'s','b',16,NULL,'F24 su fattura n. 176/2010 Tanzi','14.40','0000-00-00','','2010-10-03','banca'),
 (122,'E',2008,2008,'q',NULL,1,NULL,'Quota gestione 2008','787.50','2008-01-01',NULL,NULL,NULL),
 (126,'E',2008,2008,'q',NULL,5,NULL,'Quota gestione 2008','955.51','2008-01-01',NULL,NULL,NULL),
 (127,'E',2008,2008,'q',NULL,6,NULL,'Quota gestione 2008','1115.40','2008-01-01',NULL,NULL,NULL),
 (128,'E',2009,2009,'q',NULL,1,NULL,'Quota gestione 2009','900.36','2009-01-01',NULL,NULL,NULL),
 (129,'E',2009,2009,'q',NULL,2,NULL,'Quota gestione 2009','900.36','2009-01-01',NULL,NULL,NULL),
 (130,'E',2009,2009,'q',NULL,3,NULL,'Quota gestione 2009','913.00','2009-01-01',NULL,NULL,NULL),
 (131,'E',2009,2009,'q',NULL,4,NULL,'Quota gestione 2009','912.97','2009-01-01',NULL,NULL,NULL),
 (132,'E',2009,2009,'q',NULL,5,NULL,'Quota gestione 2009','912.97','2009-01-01',NULL,NULL,NULL),
 (133,'E',2010,2010,'q',NULL,6,NULL,'Quota gestione 2010','943.80','2010-01-01',NULL,NULL,NULL),
 (137,'E',2010,2010,'q',NULL,4,NULL,'Quota gestione 2010','916.30','2010-01-01',NULL,NULL,NULL),
 (138,'U',2010,2010,'e','b',19,NULL,'Elettricità periodo 22/6/10 - 21/8/10 - 111kWh','94.00','2010-09-09','310005498918','2010-09-29','rid');
/*!40000 ALTER TABLE `transazioni` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`,`role`) VALUES 
 (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1287008913,1,1,'normal'),
 (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,1287125864,0,1,'normal'),
 (3,'testadmin','21232f297a57a5a743894a0e4a801fc3','marcello.mannin@gmail.com','d6cdac5b817e12c8c917e0d5c81da895',1285860447,1289059793,0,1,'admin'),
 (8,'testuser','fe01ce2a7fbac8fafaed7c982a04e229','marcius.ml@gmail.com','1d09991bdd852664fe92c583e8545b54',1288039526,0,0,0,'normal'),
 (18,'testa2','a60e49e53ed977da168a80af95d8d7de','marcello.mannin1@gmail.com','191051fe4aee0ac312a40d96810b4d4f',1289222174,0,0,1,'normal'),
 (19,'testa3','d5b175fb08e23794cdbaa87cabe1497d','marcello.mannin2@gmail.com','eaa992eab9f822d09b68b1d017a30aae',1289245828,0,0,0,'normal'),
 (20,'testa4','e103b14c7c4fcaa3b33788f8d93aeb64','marcello.mannin3@gmail.com','b12b1c772b44d5ad22c958b5ff65b518',1289252605,0,0,0,'normal'),
 (21,'testa6','4882c734020a1b7e4c8fe71d22a37b56','mariaelena.lascala@gmail.com','e00f94b06ec67422427ea9b038a04dac',1289255225,0,0,0,'normal'),
 (22,'test7','b04083e53e242626595e2b8ea327e525','marcello@mannino.it','9e1eab85005ebce6eb6b8e896155f05f',1289255310,0,0,0,'normal'),
 (23,'test11','f696282aa4cd4f614aa995190cf442fe','mm.71@tiscali.it','9250d4cb98d67f12c29addf0be613810',1289257140,0,0,0,'normal'),
 (24,'testa12','78f7005fa43463d3b107e811b59a4962','marcello.mannino@gmail.com','cc59c5dd4240acdfe381fb3ed3711d1a',1289293609,0,0,1,'normal');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of view `transazioniex`
--

DROP TABLE IF EXISTS `transazioniex`;
DROP VIEW IF EXISTS `transazioniex`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transazioniex` AS select 'D' AS `rowtype`,concat(`tr`.`id_transazione`) AS `id`,`tr`.`id_transazione` AS `id_transazione`,`tr`.`anno_competenza` AS `anno_competenza`,`tr`.`anno_registrazione` AS `anno_registrazione`,`tr`.`tipo_transazione` AS `tipo_transazione`,`tr`.`id_causale` AS `id_causale`,`p`.`id_cassa` AS `id_cassa`,`tr`.`id_controparte` AS `id_controparte`,`tr`.`descrizione` AS `descrizione`,`p`.`importo` AS `importo`,`tr`.`data_doc` AS `data_doc`,`tr`.`riferim_doc` AS `riferim_doc`,`p`.`data_pagam` AS `data_pagam`,`p`.`des_pagam` AS `des_pagam` from (`transazioni` `tr` join `pagamenti` `p` on((`tr`.`id_transazione` = `p`.`id_transazione`))) union (select 'T-COMP' AS `rowtype`,concat_ws('_',`tot`.`anno_registrazione`,`tot`.`tipo_transazione`,`tot`.`id_causale`) AS `id`,NULL AS `id_transazione`,`tot`.`anno_registrazione` AS `anno_competenza`,`tot`.`anno_registrazione` AS `anno_registrazione`,`tot`.`tipo_transazione` AS `tipo_transazione`,`tot`.`id_causale` AS `id_causale`,NULL AS `id_cassa`,NULL AS `id_controparte`,concat(' TOTALE PER ',`tot`.`id_causale`) AS `descrizione`,sum(`p`.`importo`) AS `importo`,NULL AS `data_doc`,NULL AS `riferim_doc`,NULL AS `data_pagam`,NULL AS `des_pagam` from (`transazioni` `tot` join `pagamenti` `p` on((`tot`.`id_transazione` = `p`.`id_transazione`))) group by `tot`.`anno_registrazione`,`tot`.`tipo_transazione`,`tot`.`id_causale`) union (select 'T-CASSA' AS `rowtype`,concat_ws('_',`tot`.`anno_registrazione`,`tot`.`tipo_transazione`,`tot`.`id_causale`) AS `id`,NULL AS `id_transazione`,year(`p`.`data_pagam`) AS `anno_competenza`,`tot`.`anno_registrazione` AS `anno_registrazione`,`tot`.`tipo_transazione` AS `tipo_transazione`,`tot`.`id_causale` AS `id_causale`,NULL AS `id_cassa`,NULL AS `id_controparte`,concat(' TOTALE PER ',`tot`.`id_causale`) AS `descrizione`,sum(`p`.`importo`) AS `importo`,NULL AS `data_doc`,NULL AS `riferim_doc`,NULL AS `data_pagam`,NULL AS `des_pagam` from (`transazioni` `tot` join `pagamenti` `p` on((`tot`.`id_transazione` = `p`.`id_transazione`))) group by year(`p`.`data_pagam`),`tot`.`tipo_transazione`,`tot`.`id_causale`);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
