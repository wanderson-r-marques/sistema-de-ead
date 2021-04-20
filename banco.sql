/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - infor407_eap
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`infor407_eap` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `infor407_eap`;

/*Table structure for table `alunos_escolas_turmas` */

DROP TABLE IF EXISTS `alunos_escolas_turmas`;

CREATE TABLE `alunos_escolas_turmas` (
  `PK_ALUNOS_ESCOLAS_TURMAS` int(11) NOT NULL AUTO_INCREMENT,
  `PK_TURMA` int(11) DEFAULT NULL,
  `PK_ENTIDADE` int(11) DEFAULT NULL,
  `ANO` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_ALUNOS_ESCOLAS_TURMAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `alunos_escolas_turmas` */

/*Table structure for table `alunos_material` */

DROP TABLE IF EXISTS `alunos_material`;

CREATE TABLE `alunos_material` (
  `PK_ALUNOS_MATERIA` int(11) NOT NULL AUTO_INCREMENT,
  `PK_ALUNO_ESCOLA_TURMA` int(11) DEFAULT NULL,
  `PK_TIPO_MATERIAL` int(11) DEFAULT NULL,
  `ANO` int(11) DEFAULT NULL,
  `LINK` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATA_HORA` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_ALUNOS_MATERIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `alunos_material` */

/*Table structure for table `ano` */

DROP TABLE IF EXISTS `ano`;

CREATE TABLE `ano` (
  `ANO` int(11) NOT NULL,
  PRIMARY KEY (`ANO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ano` */

insert  into `ano`(`ANO`) values 
(2021);

/*Table structure for table `disciplinas` */

DROP TABLE IF EXISTS `disciplinas`;

CREATE TABLE `disciplinas` (
  `PK_DISCIPLINAS` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_DISCIPLINAS`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `disciplinas` */

insert  into `disciplinas`(`PK_DISCIPLINAS`,`DESCRICAO`) values 
(1,'Lingua Portuguesa'),
(2,'Matemática'),
(3,'Ciências'),
(4,'História'),
(5,'Geografia');

/*Table structure for table `ensinos` */

DROP TABLE IF EXISTS `ensinos`;

CREATE TABLE `ensinos` (
  `PK_ENSINOS` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ENSINOS`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ensinos` */

insert  into `ensinos`(`PK_ENSINOS`,`DESCRICAO`) values 
(1,'INFANTIL I'),
(2,'INFANTIL II'),
(3,'PRE I'),
(4,'PRE II'),
(5,'FUNDAMENTAL I'),
(6,'FUNDAMENTAL II');

/*Table structure for table `entidades` */

DROP TABLE IF EXISTS `entidades`;

CREATE TABLE `entidades` (
  `PK_ENTIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_FANTASIA` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL,
  `TELEFONE1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PK_TIPO_CADASTRO` int(11) DEFAULT NULL,
  `MATRICULA` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COD_INEP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ENTIDADE`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `entidades` */

insert  into `entidades`(`PK_ENTIDADE`,`NOME`,`NOME_FANTASIA`,`CPF`,`RG`,`DATA_NASCIMENTO`,`TELEFONE1`,`TELEFONE2`,`EMAIL`,`PK_TIPO_CADASTRO`,`MATRICULA`,`SENHA`,`COD_INEP`) values 
(1,'professor matemática',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'123',NULL),
(2,'professor de linguagens',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'123',NULL),
(3,'professor de geografia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'123',NULL),
(4,'professor de história',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'123',NULL),
(5,'professor de ciências',NULL,'11111111111',NULL,NULL,NULL,NULL,NULL,2,NULL,'$2y$10$rI9MporkDLTBKXbZ5n0wtuvprh1eZ9KHnT56rxjDVaPDXBDrICibO',NULL),
(6,'Wanderson R Marques',NULL,'04737918466',NULL,'1984-05-21',NULL,NULL,NULL,1,NULL,'$2y$10$.wpvsHF9j4WmC0b.yH48V.XAI2yygmyXEVY4Lzs.uT5CTjarLmJAG',NULL),
(7,'aluno2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'123',NULL),
(8,'aluno3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'123',NULL),
(9,'aluno4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'123',NULL),
(10,'aluno5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'123',NULL),
(11,'aluno6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'123',NULL);

/*Table structure for table `entrega_material` */

DROP TABLE IF EXISTS `entrega_material`;

CREATE TABLE `entrega_material` (
  `PK_ENTREGA_MATERIAL` int(11) NOT NULL AUTO_INCREMENT,
  `PK_ALUNO_MATERIAL` int(11) DEFAULT NULL,
  `DATA_HORA` datetime DEFAULT NULL,
  `VISTO_ALUNO` int(11) DEFAULT NULL,
  `VISTO_PROFESSOR` int(11) DEFAULT NULL,
  `LINK` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA` decimal(5,2) DEFAULT NULL,
  `OBS` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ENTREGA_MATERIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `entrega_material` */

/*Table structure for table `escolas` */

DROP TABLE IF EXISTS `escolas`;

CREATE TABLE `escolas` (
  `PK_ESCOLA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COD_INEP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ESCOLA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `escolas` */

insert  into `escolas`(`PK_ESCOLA`,`DESCRICAO`,`COD_INEP`) values 
(1,'Principal','145');

/*Table structure for table `municipio` */

DROP TABLE IF EXISTS `municipio`;

CREATE TABLE `municipio` (
  `PK_MUNICIPIO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CNPJ` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIDADE` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_PLATAFORMA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FONE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PK_TIPO_ESCOLA` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_MUNICIPIO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `municipio` */

insert  into `municipio`(`PK_MUNICIPIO`,`DESCRICAO`,`CNPJ`,`CIDADE`,`NOME_PLATAFORMA`,`FONE`,`PK_TIPO_ESCOLA`) values 
(1,'ÁGUA PRETA',NULL,NULL,'Ensinando na pandemia',NULL,NULL);

/*Table structure for table `series` */

DROP TABLE IF EXISTS `series`;

CREATE TABLE `series` (
  `PK_SERIES` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_SERIES`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `series` */

insert  into `series`(`PK_SERIES`,`DESCRICAO`) values 
(1,'1º Ano'),
(2,'2º Ano'),
(3,'3º Ano'),
(4,'4º Ano'),
(5,'5º Ano'),
(6,'6º Ano'),
(7,'7º Ano'),
(8,'8º Ano'),
(9,'9º Ano');

/*Table structure for table `tipo_cadastro` */

DROP TABLE IF EXISTS `tipo_cadastro`;

CREATE TABLE `tipo_cadastro` (
  `PK_TIPO_CADASTRO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_TIPO_CADASTRO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tipo_cadastro` */

insert  into `tipo_cadastro`(`PK_TIPO_CADASTRO`,`DESCRICAO`) values 
(1,'Aluno'),
(2,'Professor'),
(3,'Coordenado'),
(4,'Diretor');

/*Table structure for table `tipos_escolas` */

DROP TABLE IF EXISTS `tipos_escolas`;

CREATE TABLE `tipos_escolas` (
  `PK_TIPO_ESCOLA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_TIPO_ESCOLA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tipos_escolas` */

insert  into `tipos_escolas`(`PK_TIPO_ESCOLA`,`DESCRICAO`) values 
(1,'Pública');

/*Table structure for table `tipos_material` */

DROP TABLE IF EXISTS `tipos_material`;

CREATE TABLE `tipos_material` (
  `PK_TIPO_MATERIAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RETORNO` varchar(3) COLLATE utf8_unicode_ci DEFAULT 'NÃO',
  PRIMARY KEY (`PK_TIPO_MATERIAL`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tipos_material` */

insert  into `tipos_material`(`PK_TIPO_MATERIAL`,`DESCRICAO`,`RETORNO`) values 
(1,'Atividade com Retorno','SIM'),
(2,'Atividade sem Retorno','NÃO'),
(3,'Vídeo Aula','NÃO'),
(4,'Aula on-Line','NÃO'),
(5,'Formulario Google Docs','NÃO'),
(6,'Texto Complementar','NÃO');

/*Table structure for table `turmas` */

DROP TABLE IF EXISTS `turmas`;

CREATE TABLE `turmas` (
  `PK_TURMA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PK_ESCOLA` int(11) DEFAULT NULL,
  `PK_TURNO` int(11) DEFAULT NULL,
  `PK_SERIE` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_TURMA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `turmas` */

insert  into `turmas`(`PK_TURMA`,`DESCRICAO`,`PK_ESCOLA`,`PK_TURNO`,`PK_SERIE`) values 
(1,'A',1,1,1);

/*Table structure for table `turmas_disciplinas` */

DROP TABLE IF EXISTS `turmas_disciplinas`;

CREATE TABLE `turmas_disciplinas` (
  `PK_TURMA_DISCIPLINA` int(11) NOT NULL AUTO_INCREMENT,
  `PK_TURMA` int(11) DEFAULT NULL,
  `PK_DISCIPINA` int(11) DEFAULT NULL,
  `PROFESSOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_TURMA_DISCIPLINA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `turmas_disciplinas` */

insert  into `turmas_disciplinas`(`PK_TURMA_DISCIPLINA`,`PK_TURMA`,`PK_DISCIPINA`,`PROFESSOR`) values 
(1,1,1,1),
(2,1,2,2),
(3,1,3,3),
(4,1,4,4),
(5,1,5,5);

/*Table structure for table `turnos` */

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `PK_TURNO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_TURNO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `turnos` */

insert  into `turnos`(`PK_TURNO`,`DESCRICAO`) values 
(1,'Manhã'),
(2,'Tarde'),
(3,'Noite');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
