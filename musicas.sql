CREATE TABLE `musicas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `cantor` varchar(200) DEFAULT NULL,
  `letra` varchar(10000) DEFAULT NULL,
  `nota` int(2) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `views` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4