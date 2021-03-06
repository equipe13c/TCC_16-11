-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema multiplayer
--

CREATE DATABASE IF NOT EXISTS multiplayer;
USE multiplayer;

--
-- Definition of table `acoes_log`
--

DROP TABLE IF EXISTS `acoes_log`;
CREATE TABLE `acoes_log` (
  `COD_ACOES_LOG` int(11) NOT NULL,
  `NOME_ACAO` varchar(45) NOT NULL,
  PRIMARY KEY (`COD_ACOES_LOG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acoes_log`
--

/*!40000 ALTER TABLE `acoes_log` DISABLE KEYS */;
INSERT INTO `acoes_log` (`COD_ACOES_LOG`,`NOME_ACAO`) VALUES 
 (1,'Efetuou Login'),
 (2,'Alterou Foto'),
 (3,'Desativado'),
 (4,'Deletado'),
 (5,'Reativado'),
 (6,'Alterou Senha'),
 (7,'Alterou Email'),
 (8,'Alterou Nome de Perfil'),
 (9,'Comentou'),
 (10,'Cadastrou no Site'),
 (11,'Efetuou Logout');
/*!40000 ALTER TABLE `acoes_log` ENABLE KEYS */;


--
-- Definition of table `artigo`
--

DROP TABLE IF EXISTS `artigo`;
CREATE TABLE `artigo` (
  `ID_ARTIGO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_ARTIGO` varchar(60) NOT NULL,
  `CATEGORIA_ARTIGO` int(11) NOT NULL,
  `DATA_ARTIGO` date NOT NULL,
  `HORA_ARTIGO` time NOT NULL,
  `AUTOR_ARTIGO` int(11) NOT NULL,
  `URL_ARTIGO` varchar(30) NOT NULL,
  `DESCRICAO_ARTIGO` text NOT NULL,
  `DATA_LANCAMENTO` text NOT NULL,
  `CONTEUDO_ARTIGO` text NOT NULL,
  `PLATAFORMA_ARTIGO` text NOT NULL,
  `URLVIDEO1` varchar(150) DEFAULT NULL,
  `URLVIDEO2` varchar(150) DEFAULT NULL,
  `TITULO_CONTEUDO_ARTIGO` varchar(45) NOT NULL,
  `ACESSOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTIGO`),
  UNIQUE KEY `ID_ARTIGO_UNIQUE` (`ID_ARTIGO`),
  UNIQUE KEY `URL_ARTIGO_UNIQUE` (`URL_ARTIGO`),
  KEY `CATEGORIA_ARTIGO_idx` (`CATEGORIA_ARTIGO`),
  KEY `CODIGO_AUTOR_idx` (`AUTOR_ARTIGO`),
  CONSTRAINT `CATEGORIA_ARTIGO` FOREIGN KEY (`CATEGORIA_ARTIGO`) REFERENCES `categoria` (`COD_CATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CODIGO_AUTOR` FOREIGN KEY (`AUTOR_ARTIGO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artigo`
--

/*!40000 ALTER TABLE `artigo` DISABLE KEYS */;
INSERT INTO `artigo` (`ID_ARTIGO`,`TITULO_ARTIGO`,`CATEGORIA_ARTIGO`,`DATA_ARTIGO`,`HORA_ARTIGO`,`AUTOR_ARTIGO`,`URL_ARTIGO`,`DESCRICAO_ARTIGO`,`DATA_LANCAMENTO`,`CONTEUDO_ARTIGO`,`PLATAFORMA_ARTIGO`,`URLVIDEO1`,`URLVIDEO2`,`TITULO_CONTEUDO_ARTIGO`,`ACESSOS`) VALUES 
 (2,'the last of us - Remastered',1,'2014-11-27','01:50:23',29,'playstation/thelastofus.php','O game que ganhou vários prêmios do ano está de volta em uma nova versão muito mais refinada.','2014-07-30','The last­ of Us criado pela grande empresa Naughty Dog,é um jogo,onde se trata de um surto de Cordyceps(fungo responsável pela aniquilação da grande maioria da população),onde Joel um sobrevivente do Cordyceps, por isso podemos perceber durante o jogo que o protagonista é um pouco quanto reservado e fechado.Ele recebe uma missão de resgatar uma garota de quatorze anos do posto de quarentena,chamada Ellie,que nunca saiu mundo afora e podemos perceber isso no começo do jogo quando Ellie fica totalmente impressionada ou ver predios carros e animais.Os verdadeiros motivos por trás dessa missão não foram revelados,fazendo com que eles se tornem alvos procurados pelos militares.Ao longo da história Ellie e Joel começam a se aproximar mais,virando grandes amigos e uma dupla e tanto.','PlayStation 4','https://www.youtube.com/embed/kE7li_u1nmg','https://www.youtube.com/embed/FIFzImtPBvc','O que você irá fazer para sobreviver ?',1),
 (4,'gta v',1,'2014-11-27','15:34:13',29,'playstation/gtav.php','O grande sucesso da saga Grand Theft Auto(GTA),está de volta em uma versão mais refinada.','Novembro de 2014','Grand Theft Auto 5(GTA 5) foi mais um dos grandes sucessos anunciados na E3 2014,o game original(criado para xbox 360 e ps3) bateu todos os recorde da história dos games com mais de 33 milhões de unidades.\r\nCom os pedidos e rumores de uma versão para o pc e para os novos consoles(ps4 e xboxOne),os pedidos foram realizados.Esta nova versão irá incluir os mesmos conteúdos da versão anterior porém com gráficos melhorados,aumento do campo de visão e tráfego melhorados.\r\nO grande avanço é que agora podemos transferir personagens e progressos do GTA Online entre as plataformas.Exemplo um personagem salvo no Xbox360 pode ser transferido para o ps4,pc ou até mesmo xboxOne.\r\n','Multiplataforma','http://www.youtube.com/embed/VjZ5tgjPVfU','http://www.youtube.com/embed/BV85rkGqz2o','Los Santos como você nunca viu.',3),
 (9,'Zelda U',2,'2014-11-27','16:02:29',29,'nintendo/zeldau.php','O mais novo game da saga The Legend of Zelda está chegando,sendo um dos grandes destaque da nintendo na E3 de 2014.','Final de 2015','Zelda U nome provissório,o mais novo game da saga The Legend of Zelda explorará um mundo de dimensões totalmente diferente dos anteriores.\r\nAinda não sabemos muito sobre esta nova hístoria,tendo boatos de que o game se passa entre o Wind Waker e o Skyward Sword,por causa de sua roupa e até mesmo pelo cenário,sendo uma floresta vasta e aberta.\r\n','Nintendo Wii U','http://www.youtube.com/embed/XZmxvig1dXE','http://www.youtube.com/embed/mM9MGY2OL8o','Qual será a nova trama para o grande heroí Li',11),
 (10,'sunset overdrive',3,'2014-11-27','16:23:08',29,'xbox/sunsetoverdrive.php','Uns dos melhores games da Xbox na E3 2014.','Final de 2015','Sunset Overdrive é um jogo,que se passa em um futuro distante de \"mundo-aberto\".\r\nOnde uma catastrofe deixou a cidade invadida por mutantes,quando mais morrer e se transformar mais você melhora seu nível.Seu objetivo destruir os monstros,com um arsenal incrível,contendo armas poderosas e talentos para atravessar a cidade com rapidez e agilidade.\r\nVocê pode modificar completamente a sua personagem e jogar com os seus amigos,sendo um dos grandes destaque do game. Com os gráficos cartunescos e visual infantil,não se deixe enganar,esse game não tem nada a ver com os jogos infantis!\r\n','Xbox One','http://www.youtube.com/embed/s_LmilGAhaM','http://www.youtube.com/embed/Zt4bfcbKtu4','Como sobreviver em um mundo sem regras e com ',3),
 (11,'teste',1,'2014-11-30','14:58:31',29,'playstation/testeps.php','conheça: the last of us, o exclusivo da playstation. agora remasterizado.','Agosto de 2012','correndo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendocorrendo e aprendendo','PlayStation 3','https://www.youtube.com/embed/QO8iXF5r1LE','https://www.youtube.com/embed/09lqWdLkVoQ','Corra Para Sobreviver',35),
 (12,'teste2',1,'2014-11-30','15:47:41',44,'playstation/teste_2.php','conheça mais uma vez, the last of us.','Outubro de 2012','corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra forrest corra, corra for','PlayStation 3','https://www.youtube.com/embed/09lqWdLkVoQ','https://www.youtube.com/embed/zSP-LlQ-4oA','Corra forrest corra',2);
/*!40000 ALTER TABLE `artigo` ENABLE KEYS */;


--
-- Definition of table `canditado`
--

DROP TABLE IF EXISTS `canditado`;
CREATE TABLE `canditado` (
  `COD_CANDIDATO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CANDIDATO` varchar(45) NOT NULL,
  `EMAIL_CANDIDATO` varchar(45) NOT NULL,
  `CURRICULO_CANDIDATO` blob NOT NULL,
  `IDADE_CANDIDATO` char(2) NOT NULL,
  `URL_PORTFOLIO` varchar(65) NOT NULL,
  PRIMARY KEY (`COD_CANDIDATO`),
  UNIQUE KEY `EMAIL_CANDIDATO_UNIQUE` (`EMAIL_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canditado`
--

/*!40000 ALTER TABLE `canditado` DISABLE KEYS */;
/*!40000 ALTER TABLE `canditado` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `COD_CATEGORIA` int(11) NOT NULL DEFAULT '0',
  `NOME_CATEGORIA` varchar(20) NOT NULL,
  PRIMARY KEY (`COD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`COD_CATEGORIA`,`NOME_CATEGORIA`) VALUES 
 (1,'PlayStation'),
 (2,'Nintendo'),
 (3,'XBOX'),
 (4,'PC'),
 (5,'Nostalgia');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `coment`
--

DROP TABLE IF EXISTS `coment`;
CREATE TABLE `coment` (
  `COD_COMENT` int(11) NOT NULL AUTO_INCREMENT,
  `COD_USUARIO` int(11) NOT NULL,
  `CONTEUDO_COMENT` text NOT NULL,
  `DATA_COMENT` date NOT NULL,
  `HORA_COMENT` time NOT NULL,
  `CODIGO_MATERIA` int(11) NOT NULL,
  PRIMARY KEY (`COD_COMENT`),
  KEY `COMENT_USUARIO_idx` (`COD_USUARIO`),
  KEY `CODIGO_MATERIA_idx` (`CODIGO_MATERIA`),
  CONSTRAINT `CODIGO_MATERIA` FOREIGN KEY (`CODIGO_MATERIA`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `COMENT_USUARIOS` FOREIGN KEY (`COD_USUARIO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coment`
--

/*!40000 ALTER TABLE `coment` DISABLE KEYS */;
INSERT INTO `coment` (`COD_COMENT`,`COD_USUARIO`,`CONTEUDO_COMENT`,`DATA_COMENT`,`HORA_COMENT`,`CODIGO_MATERIA`) VALUES 
 (1,29,'teste','2014-11-30','12:05:18',11),
 (2,29,'teste 2','2014-11-30','12:09:44',11);
/*!40000 ALTER TABLE `coment` ENABLE KEYS */;


--
-- Definition of table `desativados`
--

DROP TABLE IF EXISTS `desativados`;
CREATE TABLE `desativados` (
  `COD_DESATIVADO` int(11) NOT NULL,
  `NOME_DESATIVADO` varchar(45) NOT NULL,
  `EMAIL_DESATIVADO` varchar(45) NOT NULL,
  `SENHA_DESATIVADO` varchar(45) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `TEMPO_DESATIVADO` time NOT NULL,
  `MOTIVO_DESATIVADO` varchar(300) NOT NULL,
  PRIMARY KEY (`COD_DESATIVADO`),
  UNIQUE KEY `EMAIL_DESATIVADO_UNIQUE` (`EMAIL_DESATIVADO`),
  UNIQUE KEY `COD_DESATIVADO_UNIQUE` (`COD_DESATIVADO`),
  CONSTRAINT `COD_IMAGEMS` FOREIGN KEY (`COD_DESATIVADO`) REFERENCES `imagem_usuario` (`COD_IMAGEM_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desativados`
--

/*!40000 ALTER TABLE `desativados` DISABLE KEYS */;
/*!40000 ALTER TABLE `desativados` ENABLE KEYS */;


--
-- Definition of table `imagem_materia_personagem`
--

DROP TABLE IF EXISTS `imagem_materia_personagem`;
CREATE TABLE `imagem_materia_personagem` (
  `COD_IMAGEM_PERSONAGEM` int(11) NOT NULL AUTO_INCREMENT,
  `COD_PERSONAGEM_IMAGEM` int(11) NOT NULL,
  `IMAGEM_CAPA` varchar(20) NOT NULL,
  `IMAGEM_PRINCIPAL` varchar(20) NOT NULL,
  `IMAGEM_GALERIA` varchar(20) NOT NULL,
  `IMAGEM_GALERIA2` varchar(20) NOT NULL,
  `IMAGEM_GALERIA3` varchar(20) NOT NULL,
  `IMAGEM_MINIATURA_HOVER` varchar(20) NOT NULL,
  `IMAGEM_MINIATURA_ALT` varchar(20) NOT NULL,
  PRIMARY KEY (`COD_IMAGEM_PERSONAGEM`,`COD_PERSONAGEM_IMAGEM`),
  CONSTRAINT `IMAGEM_PERSONAGEM` FOREIGN KEY (`COD_IMAGEM_PERSONAGEM`) REFERENCES `personagem` (`COD_PERSONAGEM`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagem_materia_personagem`
--

/*!40000 ALTER TABLE `imagem_materia_personagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem_materia_personagem` ENABLE KEYS */;


--
-- Definition of table `imagem_usuario`
--

DROP TABLE IF EXISTS `imagem_usuario`;
CREATE TABLE `imagem_usuario` (
  `COD_IMAGEM` int(11) NOT NULL AUTO_INCREMENT,
  `URL_IMAGEM` varchar(20) NOT NULL,
  `URL_IMAGEM_CAPA` varchar(20) NOT NULL,
  `COD_IMAGEM_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_IMAGEM`),
  KEY `COD_IMAGEM_USUARIO_idx` (`COD_IMAGEM_USUARIO`),
  CONSTRAINT `COD_IMAGEM_USUARIOS` FOREIGN KEY (`COD_IMAGEM_USUARIO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagem_usuario`
--

/*!40000 ALTER TABLE `imagem_usuario` DISABLE KEYS */;
INSERT INTO `imagem_usuario` (`COD_IMAGEM`,`URL_IMAGEM`,`URL_IMAGEM_CAPA`,`COD_IMAGEM_USUARIO`) VALUES 
 (8,'default.jpg','defaultCapa.jpg',29),
 (9,'default.jpg','defaultCapa.jpg',30),
 (10,'default.jpg','defaultCapa.jpg',31),
 (11,'default.jpg','defaultCapa.jpg',33),
 (12,'default.jpg','defaultCapa.jpg',34),
 (13,'default.jpg','defaultCapa.jpg',35),
 (14,'default.jpg','defaultCapa.jpg',36),
 (15,'deffd2.jpg','defaultCapa.jpg',44);
/*!40000 ALTER TABLE `imagem_usuario` ENABLE KEYS */;


--
-- Definition of table `imagens_materia`
--

DROP TABLE IF EXISTS `imagens_materia`;
CREATE TABLE `imagens_materia` (
  `COD_IMAGEM_MATERIA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_MATERIA_IMAGEM` int(11) NOT NULL,
  `IMAGEM_CAPA` varchar(20) NOT NULL,
  `IMAGEM_PRINCIPAL` varchar(20) NOT NULL,
  `IMAGEM_GALERIA` varchar(20) NOT NULL,
  `IMAGEM_GALERIA2` varchar(20) NOT NULL,
  `IMAGEM_GALERIA3` varchar(20) NOT NULL,
  PRIMARY KEY (`COD_IMAGEM_MATERIA`),
  KEY `IMAGENS_MATERIA_idx` (`COD_MATERIA_IMAGEM`),
  CONSTRAINT `IMAGENS_MATERIA` FOREIGN KEY (`COD_MATERIA_IMAGEM`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagens_materia`
--

/*!40000 ALTER TABLE `imagens_materia` DISABLE KEYS */;
INSERT INTO `imagens_materia` (`COD_IMAGEM_MATERIA`,`COD_MATERIA_IMAGEM`,`IMAGEM_CAPA`,`IMAGEM_PRINCIPAL`,`IMAGEM_GALERIA`,`IMAGEM_GALERIA2`,`IMAGEM_GALERIA3`) VALUES 
 (12,2,'c969be.jpg','ff3665.jpg','e28d18.jpg','c82823.jpg','25f8d2.jpg'),
 (14,4,'eaa640.jpg','0c9fd2.jpg','ee1a5b.jpg','e511b7.jpg','cbcca3.jpg'),
 (19,9,'a87324.jpg','2405c3.jpg','62646f.jpg','6baa46.jpg','36e2e3.jpg'),
 (20,10,'06e2cd.jpg','e93459.jpg','99831b.jpg','1470ae.jpg','313cc7.jpg'),
 (21,11,'e1f24f.jpg','08ba30.jpg','f5cb0f.jpg','5765ce.jpg','1e4bb5.jpg'),
 (22,12,'15ca68.jpg','e76c79.jpg','244d5d.jpg','94e06f.jpg','63fdb8.jpg');
/*!40000 ALTER TABLE `imagens_materia` ENABLE KEYS */;


--
-- Definition of table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `COD_LIKE` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_LIKE` int(11) DEFAULT NULL,
  `ARTIGO_LIKE` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_LIKE`),
  KEY `USUARIOS_LIKE_idx` (`USUARIO_LIKE`),
  KEY `ARTIGO_LIKE_idx` (`ARTIGO_LIKE`),
  CONSTRAINT `ARTIGO_LIKE` FOREIGN KEY (`ARTIGO_LIKE`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `USUARIOS_LIKE` FOREIGN KEY (`USUARIO_LIKE`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

/*!40000 ALTER TABLE `like` DISABLE KEYS */;
/*!40000 ALTER TABLE `like` ENABLE KEYS */;


--
-- Definition of table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `COD_LOG` int(11) NOT NULL AUTO_INCREMENT,
  `IP_LOG` varchar(45) NOT NULL,
  `DATA_LOG` date NOT NULL,
  `HORA_LOG` time NOT NULL,
  `MENSAGEM_LOG` varchar(45) NOT NULL,
  `ACAO_LOG` int(11) NOT NULL,
  `AUTOR_LOG` varchar(45) NOT NULL,
  `COD_AUTOR_LOG` int(11) NOT NULL,
  PRIMARY KEY (`COD_LOG`),
  KEY `COD_AUTOR_LOG_idx` (`COD_AUTOR_LOG`),
  KEY `COD_ACAO_idx` (`ACAO_LOG`),
  CONSTRAINT `COD_ACAO` FOREIGN KEY (`ACAO_LOG`) REFERENCES `acoes_log` (`COD_ACOES_LOG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `COD_AUTOR_LOG` FOREIGN KEY (`COD_AUTOR_LOG`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`COD_LOG`,`IP_LOG`,`DATA_LOG`,`HORA_LOG`,`MENSAGEM_LOG`,`ACAO_LOG`,`AUTOR_LOG`,`COD_AUTOR_LOG`) VALUES 
 (9,'::1','2014-11-05','18:04:13','Jow: Realizou Cadastro',10,'jonathan.webitb@hotmail.com',29),
 (10,'::1','2014-11-05','18:11:33','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (11,'::1','2014-11-05','19:41:31','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (12,'::1','2014-11-05','19:41:43','ADM: Admin efetuou Login',1,'admin@admin.com',28),
 (13,'::1','2014-11-05','19:44:34','Administrador Efeutou Logout',11,'admin@admin.com',28),
 (14,'::1','2014-11-05','19:44:59','Jão: Realizou Cadastro',10,'jao@hotmail.com',30),
 (15,'::1','2014-11-05','21:22:57','josi: Realizou Cadastro',10,'josimar@gmail.com',31),
 (16,'::1','2014-11-05','21:23:51','josi: Realizou Cadastro',10,'josimar2@gmail.com',33),
 (17,'::1','2014-11-05','21:25:31','josi: Realizou Cadastro',10,'josimar3@gmail.com',34),
 (18,'::1','2014-11-05','21:26:27','josi: Realizou Cadastro',10,'josimar4@gmail.com',35),
 (19,'::1','2014-11-17','00:55:57','Jow: Realizou Cadastro',10,'jonathan.webitb2@hotmail.com',36),
 (20,'::1','2014-11-17','00:56:27','Jow efetuou Login',1,'jonathan.webitb2@hotmail.com',36),
 (21,'::1','2014-11-17','00:56:39','Jow Efeutou Logout',11,'jonathan.webitb2@hotmail.com',36),
 (22,'::1','2014-11-17','00:56:45','Jow efetuou Login',1,'jonathan.webitb2@hotmail.com',36),
 (23,'::1','2014-11-20','23:15:49','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (24,'::1','2014-11-27','00:51:12','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (25,'::1','2014-11-27','16:55:00','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (26,'::1','2014-11-27','16:55:52','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (27,'::1','2014-11-27','21:14:55','Joao Gabriel Efeutou Logout',11,'joaozinho@gmail.com',44),
 (28,'::1','2014-11-27','21:15:02','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (29,'::1','2014-11-28','16:33:37','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (30,'::1','2014-11-28','16:34:54','ADM: Joao Gay efetuou Login',1,'joaozinho@gmail.com',44),
 (34,'::1','2014-11-28','16:40:17','Joaozinho  Alterou E-mail',7,'joaozinho@gmail.com',44),
 (35,'::1','2014-11-28','16:40:51','ADM: Joaozinho  efetuou Login',1,'joaozinho@hotmail.com',44),
 (36,'::1','2014-11-28','17:30:44','Joao Gabriel Efeutou Logout',11,'joaozinho@hotmail.com',44),
 (37,'::1','2014-11-28','17:36:29','ADM: Joaozinho  efetuou Login',1,'joaozinho@hotmail.com',44),
 (38,'::1','2014-11-28','18:09:04','Joao Gabriel Efeutou Logout',11,'joaozinho@hotmail.com',44),
 (39,'::1','2014-11-28','18:09:13','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (40,'::1','2014-11-28','18:15:14','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (41,'::1','2014-11-28','18:15:21','ADM: Joaozinho  efetuou Login',1,'joaozinho@hotmail.com',44),
 (42,'::1','2014-11-28','18:27:17','ADM: Joaozinho  efetuou Login',1,'joaozinho@hotmail.com',44),
 (43,'::1','2014-11-28','18:29:29','Joao Gabriel Efeutou Logout',11,'joaozinho@hotmail.com',44),
 (44,'::1','2014-11-28','18:29:58','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (45,'::1','2014-11-28','18:42:50','Joaozinho  Alterou Foto',2,'joaozinho@hotmail.com',44),
 (46,'::1','2014-11-28','18:43:37','Joaozinho  Alterou Foto',2,'joaozinho@hotmail.com',44),
 (47,'::1','2014-11-28','18:44:29','Joaozinho  Alterou Foto',2,'joaozinho@hotmail.com',44),
 (48,'::1','2014-11-28','19:21:58','Joaozinho  Alterou Foto',2,'joaozinho@hotmail.com',44),
 (49,'::1','2014-11-28','19:22:50','Joaozinho  Alterou Foto',2,'joaozinho@hotmail.com',44),
 (50,'::1','2014-11-30','14:28:15','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (51,'::1','2014-11-30','14:31:09','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (52,'::1','2014-11-30','14:31:19','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (53,'::1','2014-11-30','15:42:45','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (54,'::1','2014-11-30','15:42:55','ADM: Joaozinho  efetuou Login',1,'joaozinho@hotmail.com',44);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;


--
-- Definition of table `personagem`
--

DROP TABLE IF EXISTS `personagem`;
CREATE TABLE `personagem` (
  `COD_PERSONAGEM` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_PERSONAGEM` varchar(45) NOT NULL,
  `SERIE_PERSONAGEM` varchar(45) NOT NULL,
  `DATA_PERSONAGEM` date NOT NULL,
  `CONTEUDO_PERSONAGEM` text NOT NULL,
  `TITULO_PERSONAGEM` varchar(45) NOT NULL,
  `SUBTITULO_PERSONAGEM` varchar(45) NOT NULL,
  PRIMARY KEY (`COD_PERSONAGEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personagem`
--

/*!40000 ALTER TABLE `personagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `personagem` ENABLE KEYS */;


--
-- Definition of table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `COD_TIPO` int(11) NOT NULL,
  `TIPO_USUARIO` char(3) NOT NULL,
  PRIMARY KEY (`COD_TIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`COD_TIPO`,`TIPO_USUARIO`) VALUES 
 (1,'ADM'),
 (2,'RES'),
 (3,'COL'),
 (4,'DES');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `COD_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` varchar(45) NOT NULL,
  `APELIDO_USUARIO` varchar(20) NOT NULL,
  `EMAIL_USUARIO` varchar(45) NOT NULL,
  `SENHA_USUARIO` varchar(60) NOT NULL,
  `TIPO_USUARIO` int(11) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `USUARIO_DESATIVADO` int(11) DEFAULT NULL,
  `ESTADO_USUARIO` char(2) DEFAULT NULL,
  `DESCRICAO_USUARIO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`COD_USUARIO`),
  UNIQUE KEY `COD_COLUNISTA_UNIQUE` (`COD_USUARIO`),
  UNIQUE KEY `EMAIL_COLUNISTA_UNIQUE` (`EMAIL_USUARIO`),
  KEY `TIPO_USUARIO_idx` (`TIPO_USUARIO`),
  KEY `USUARIO_DESATIVADO_idx` (`USUARIO_DESATIVADO`),
  CONSTRAINT `TIPO_USUARIOS` FOREIGN KEY (`TIPO_USUARIO`) REFERENCES `tipo` (`COD_TIPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `USUARIO_DESATIVADOS` FOREIGN KEY (`USUARIO_DESATIVADO`) REFERENCES `desativados` (`COD_DESATIVADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_USUARIO`,`NOME_USUARIO`,`APELIDO_USUARIO`,`EMAIL_USUARIO`,`SENHA_USUARIO`,`TIPO_USUARIO`,`DATA_NASCIMENTO`,`USUARIO_DESATIVADO`,`ESTADO_USUARIO`,`DESCRICAO_USUARIO`) VALUES 
 (28,'Administrador','Admin','admin@admin.com','$2a$08$MTcxOTAwNjA2NzU0NWE1O.LQBhx7eZb3nryfzfJaa50cyDklklb7.',1,'2014-08-12',NULL,NULL,NULL),
 (29,'Jonathan','Jow','jonathan.webitb@hotmail.com','$2a$08$MTcxOTAwNjA2NzU0NWE1O.LQBhx7eZb3nryfzfJaa50cyDklklb7.',3,'0000-00-00',NULL,NULL,NULL),
 (30,'joao','Jão','jao@hotmail.com','$2a$08$MjAzODI0ODE0MTU0NWE3M.sA8mYiDMDqDRWPSDaY7ps0gWroQbcjy',2,'0000-00-00',NULL,NULL,NULL),
 (31,'josimar','josi','josimar@gmail.com','$2a$08$MTAwODE2MDUzMzU0NWE4NujpVl1LaMM4tnyr/N5nLfgpvnmCb.pJy',2,'0000-00-00',NULL,NULL,NULL),
 (33,'josimar','josi','josimar2@gmail.com','$2a$08$MzgxMzMzMDcxNTQ1YTg3NOqpK7CFw1wHM.qBIvhWaXY3CjAL5HqKy',2,'0000-00-00',NULL,NULL,NULL),
 (34,'josimar','josi','josimar3@gmail.com','$2a$08$MTQwMTA5NTY0ODU0NWE4NuTK2mkeghWnBsGMLIgmYR1gte/Zo18im',2,'0000-00-00',NULL,NULL,NULL),
 (35,'josimar','josi','josimar4@gmail.com','$2a$08$MTE1OTcwMTQ1NTQ1YTg3Zebe3XcThAuzVYrZxGomZAjsOU8MKAKMK',2,'0000-00-00',NULL,NULL,NULL),
 (36,'JONATHAN ALVES DE LIMA','Jow','jonathan.webitb2@hotmail.com','$2a$08$MTY3MDY4OTYyODU0NjkzOOi8vpFE944LbpG.bjJigPJdOYPLJV03m',3,'0000-00-00',NULL,NULL,''),
 (44,'Joao Gabriel','Joaozinho ','joaozinho@hotmail.com','$2a$08$MTcxOTAwNjA2NzU0NWE1O.LQBhx7eZb3nryfzfJaa50cyDklklb7.',1,'2014-11-27',NULL,'SP','João Gabriel, Morador da Cidade de Barueri.');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
