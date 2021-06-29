CREATE TABLE IF NOT EXISTS `book` (
  `id`			bigint			NOT NULL AUTO_INCREMENT,
  `author` 		varchar(80) 	NOT NULL,
  `date`		varchar(50) 	NOT NULL,
  `description` varchar(1000) 	NOT NULL,
  `id_category` bigint			NOT NULL,
  `image` 		varchar(5000)	NOT NULL,
  `pages` 		int				NOT NULL,
  `title`		varchar(80)		NOT NULL,
  `year`		varchar(80)		NOT NULL,
  
  PRIMARY KEY (`id`)
) ;