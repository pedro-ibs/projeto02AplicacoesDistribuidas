-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.24 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela rest_spring_boot_ifsp.book
CREATE TABLE IF NOT EXISTS `book` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `author` varchar(80) NOT NULL,
  `date` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `id_category` bigint NOT NULL,
  `image` varchar(5000) NOT NULL,
  `pages` int NOT NULL,
  `title` varchar(80) NOT NULL,
  `year` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rest_spring_boot_ifsp.book: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`id`, `author`, `date`, `description`, `id_category`, `image`, `pages`, `title`, `year`) VALUES
	(1, 'Leigh Bardugo', '30/05/2021 14:13:02', 'Em um país dividido pela Dobra das Sombras – uma faixa de terra povoada por monstros sombrios – e no qual a corte real está repleta de pessoas com poderes mágicos, Alina Starkov pode se considerar uma garota comum. Seus dias consistem em trabalhar como cartógrafa no Exército e em tentar esconder de seu melhor amigo, Maly, o que sente por ele.', 1, 'capa.jpg', 288, 'Sombra e Ossos', '2021'),
	(2, 'H.P. Lovecraft', '30/05/2021 14:14:13', 'Stephen King, Neil Gaiman, Caitlín R. Kiernan, Ridley Scott, Sam Raimi, Alan Moore e muitos outros criadores seguem o mesmo líder. Se você também é um adorador do lado mais sombrio da literatura, junte-se ao culto a H.P. Lovecraft.Hoje em dia fica difícil imaginar a cultura pop sem a presença de Howard Phillips Lovecraft. Reconhecido como o legítimo sucessor de Edgar Allan Poe, Lovecraft passou a vida desenvolvendo seres e universos fantásticos.', 3, '518eTh9eSiL.jpg', 384, 'Lovecraft', '2017'),
	(3, 'Abu Fobiya', '30/05/2021 14:18:38', 'Em Independência ou Mortos, a História do Brasil é recontada em quadrinhos a partir da vinda da família real portuguesa para o país em 1808. A atrapalhada fuga de D. João VI, sua esposa Carlota Joaquina e seus filhos Pedro e Miguel torna-se um verdadeiro pesadelo quando seu navio é subitamente tomado por zumbis devoradores de carne humana.', 3, 'capa2.jpg', 160, 'Independência ou Mortos', '2012'),
	(4, 'Rachael Lippincott', '30/05/2021 14:24:31', 'Stella Grant gosta de estar no controle. Ela parece ser uma adolescente típica, mas em sua rotina há listas de tarefas e inúmeros remédios que ela deve tomar para controlar a fibrose cística, uma doença crônica que impede que seus pulmões funcionem como deveriam. Suas prioridades são manter seus pais felizes e conseguir um transplante – e uma coisa não existe sem a outra. Mas para ganhar pulmões novos, Stella precisa seguir seu tratamento à risca e eliminar qualquer chance de infecção, o que significa que ela não pode ficar a menos que dois metros de distância – ou seis passos – de outros pacientes com a doença. O primeiro item é fácil para ela, mas o segundo pode se provar mais difícil do que ela esperava.', 2, 'capa3.jpg', 288, 'A cinco de passos de você', '2019'),
	(5, 'John Green', '30/05/2021 14:29:04', 'Hazel é uma paciente terminal. Ainda que, por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.', 2, 'capa4.jpg', 288, 'A culpa é das estrelas', '2012'),
	(6, 'Jojo Moyes', '30/05/2021 14:34:10', 'Como eu era antes de você é uma história de amor e uma história de família, mas acima de tudo é uma história sobre a coragem e o esforço necessários para retomar a vida quando tudo parece acabado.', 2, 'capa5.jpg', 320, 'Como Eu Era Antes de Você', '2013'),
	(7, 'Casey McQuiston', '30/05/2021 14:40:03', 'Quando sua mãe foi eleita presidenta dos Estados Unidos, Alex Claremont-Diaz se tornou o novo queridinho da mídia norte-americana. Bonito, carismático e com personalidade forte, Alex tem tudo para seguir os passos de seus pais e conquistar uma carreira na política, como tanto deseja.', 2, 'capa6.jpg', 392, 'Vermelho, branco e sangue azul', '2019'),
	(8, 'Leonel Caldela', '30/05/2021 14:43:31', 'Nos confins de uma terra governada pelo dragão Zamir, ergue-se um mosteiro. Um garoto selvagem, dotado de poderes misteriosos, é encontrado pelos monges. Seu nome é Ruff Ghanor.', 1, 'capa7.jpg', 319, 'A Lenda de Ruff Ghanor: O Garoto-Cabra', '2014'),
	(9, 'Ernest Cline', '30/05/2021 14:47:55', 'Um mundo em jogo, a busca pelo grande prêmio. Você está preparado, Jogador número 1? O ano é 2044 e a Terra não é mais a mesma. Fome, guerras e desemprego empurraram a humanidade para um estado de apatia nunca antes visto.Wade Watts é mais um dos que escapa da desanimadora realidade passando horas e horas conectado ao OASIS ?', 5, 'capa8.jpg', 464, 'Jogador Número 1', '2019'),
	(10, 'Andy Weir', '30/05/2021 14:55:34', 'Há seis dias, o astronauta Mark Watney se tornou a décima sétima pessoa a pisar em Marte. E, provavelmente, será a primeira a morrer no planeta vermelho.', 4, 'capa9.jpg', 348, 'Perdido em Marte', '2014'),
	(11, 'Douglas Adams', '30/05/2021 15:01:35', 'Considerado um dos maiores clássicos da literatura de ficção científica, O Guia do Mochileiro das Galáxias vem encantando gerações de leitores ao redor do mundo com seu humor afiado.\r\n\r\nEste é o primeiro título da famosa série escrita por Douglas Adams, que conta as aventuras espaciais do inglês Arthur Dent e de seu amigo Ford Prefect.', 4, 'capa10.jpg', 198, 'O guia do Mochileiro das Galáxias', '2010'),
	(12, 'Victoria Schwab', '30/05/2021 15:05:35', 'Cassidy Blake vive uma rotina simples e tranquila com seus pais no subúrbio. Sua vida é perfeitamente normal – exceto pelo fato de ela conseguir se mover, através do Véu, entre o mundo dos vivos e o do mortos e por ter como melhor amigo Jacob, um fantasma.', 3, 'capa11.jpg', 225, 'A cidade dos Fantasmas', '2021'),
	(13, 'C. S. Lewis', '30/05/2021 15:10:10', 'Viagens ao fim do mundo, criaturas fantásticas e batalhas épicas entre o bem e o mal - o que mais um leitor poderia querer de um livro? O livro que tem tudo isso é \'O leão, a feiticeira e o guarda-roupa\', escrito em 1949 por Clive Staples Lewis.', 5, 'capa25252.jpg', 752, 'As Crônicas de Nárnia', '2009');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

-- Copiando estrutura para tabela rest_spring_boot_ifsp.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `category` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_oo4xayr0g0mkbajn7n2m3918u` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rest_spring_boot_ifsp.category: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `category`) VALUES
	(1, 'Ação'),
	(5, 'Aventura'),
	(4, 'Ficção Científica'),
	(2, 'Romance'),
	(3, 'Terror');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
