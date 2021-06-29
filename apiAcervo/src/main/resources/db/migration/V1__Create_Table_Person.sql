CREATE TABLE IF NOT EXISTS `person` (
  `id`			bigint		NOT NULL AUTO_INCREMENT,
  `email`		varchar(80) NOT NULL UNIQUE,
  `password`	varchar(80) NOT NULL,
  `address`		varchar(80) NOT NULL,
  `first_name`	varchar(80) NOT NULL,
  `last_name`	varchar(80) NOT NULL,
  `gender`		varchar(10) NOT NULL, 
  
  PRIMARY KEY (`id`)
);



