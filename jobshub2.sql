-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for jobshub
CREATE DATABASE IF NOT EXISTS `jobshub` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `jobshub`;

-- Dumping structure for table jobshub.abilities
CREATE TABLE IF NOT EXISTS `abilities` (
  `id_ability` int(11) NOT NULL AUTO_INCREMENT,
  `ability` varchar(255) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ability`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.abilities: ~5 rows (approximately)
/*!40000 ALTER TABLE `abilities` DISABLE KEYS */;
INSERT INTO `abilities` (`id_ability`, `ability`, `removed`) VALUES
	(1, 'Organizado', 0),
	(2, 'Flexibidade', 0),
	(3, 'Proativo', 0),
	(4, 'Criatividade', 0),
	(5, 'Boa comunicação', 0);
/*!40000 ALTER TABLE `abilities` ENABLE KEYS */;

-- Dumping structure for table jobshub.address
CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `id_city` int(11) NOT NULL,
  `id_state` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.address: ~2 rows (approximately)
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`id_address`, `id_city`, `id_state`, `id_country`, `removed`) VALUES
	(1, 1, 1, 1, 0),
	(2, 2, 2, 2, 0);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table jobshub.class
CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `numer_class` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.class: ~0 rows (approximately)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- Dumping structure for table jobshub.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `description` text,
  `ceo` varchar(255) DEFAULT NULL,
  `date_foundation` date DEFAULT NULL,
  `link` text,
  `create_date` date DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  `fatec` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_company`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.companies: ~3 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id_company`, `name`, `cnpj`, `email`, `phone_number`, `photo_profile`, `description`, `ceo`, `date_foundation`, `link`, `create_date`, `approved`, `removed`, `fatec`) VALUES
	(1, 'Nubank', '	24.410.913/0001-44', NULL, '4020-0185', NULL, 'Nubank é uma empresa startup brasileira pioneira no segmento de serviços financeiros, atuando como operadora de cartões de crédito e fintech com operações no Brasil, sediada em São Paulo e fundada em 6 de maio de 2013 por David Vélez, Cristina Junqueira e Edward Wible', 'David Vélez, Cristina Junqueira e Edward Wible', '2013-05-06', 'https://nubank.com.br/pedir/nu/?utm_source=google&utm_medium=cpc&utm_campaign=1784086961&utm_term=118905407472&utm_word=nubank&utm_content=502413793352&ad_position=&match_type=b&location=1031717&device=c&utm_keyword_id=aud-427394325571:kwd-488984618592&utm_placement=&extension=&geolocation=1031717&google_channel=google_brand&gclid=CjwKCAiAyfybBhBKEiwAgtB7fuJO37Om4MxQslZloogWBXwzJ1NZ_jB59crr_U8Ws-e4ib_uVVAfsRoCH4gQAvD_BwE', '2022-11-24', 0, 0, 0),
	(2, 'IBM', '33.372.251/0001-56', NULL, NULL, NULL, 'A International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática.', 'Arvind Krishna', '1911-06-16', 'https://www.ibm.com/us-en/', '2022-11-24', 0, 0, 0),
	(3, 'Fatec Itapira - "Dr. Ogari de Castro Pacheco"', '62.823.257/0001-09', 'contato@fatecitapira.edu.br', '(19) 3843-1996', NULL, 'Faculdade', 'Centro Paulo Souza', '2022-11-24', 'https://www.fatecitapira.edu.br/index.html', '2022-11-24', 0, 0, 0);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table jobshub.companies_vacancies
CREATE TABLE IF NOT EXISTS `companies_vacancies` (
  `id_companies_vacancies` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_vacancy` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_companies_vacancies`),
  KEY `companies_vacancies_fk0` (`id_company`),
  KEY `companies_vacancies_fk1` (`id_vacancy`),
  CONSTRAINT `companies_vacancies_fk0` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  CONSTRAINT `companies_vacancies_fk1` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.companies_vacancies: ~0 rows (approximately)
/*!40000 ALTER TABLE `companies_vacancies` DISABLE KEYS */;
INSERT INTO `companies_vacancies` (`id_companies_vacancies`, `id_company`, `id_vacancy`, `removed`) VALUES
	(1, 2, 1, 0);
/*!40000 ALTER TABLE `companies_vacancies` ENABLE KEYS */;

-- Dumping structure for table jobshub.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id_course` int(11) NOT NULL AUTO_INCREMENT,
  `thema` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `price` float NOT NULL,
  `id_class` int(11) NOT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_course`),
  KEY `courses_fk0` (`id_class`),
  CONSTRAINT `courses_fk0` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.courses: ~0 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table jobshub.education_levels
CREATE TABLE IF NOT EXISTS `education_levels` (
  `id_education_level` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_education_level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.education_levels: ~4 rows (approximately)
/*!40000 ALTER TABLE `education_levels` DISABLE KEYS */;
INSERT INTO `education_levels` (`id_education_level`, `name`) VALUES
	(1, 'Ensino Médio'),
	(2, 'Ensino Superior'),
	(3, 'Ensino Tecnico'),
	(4, 'Ensino Médio integrago Tecnico');
/*!40000 ALTER TABLE `education_levels` ENABLE KEYS */;

-- Dumping structure for table jobshub.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `create_date` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_faq`),
  KEY `fq_fk01` (`id_user`),
  KEY `faq_fk02` (`id_company`),
  CONSTRAINT `faq_fk02` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  CONSTRAINT `fq_fk01` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.faq: ~0 rows (approximately)
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` (`id_faq`, `id_user`, `id_company`, `description`, `create_date`, `removed`) VALUES
	(1, 1, 2, 'Empresa muito boa', '2022-11-24', 0);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;

-- Dumping structure for table jobshub.favorite_vacancy
CREATE TABLE IF NOT EXISTS `favorite_vacancy` (
  `id_favorite_vacancy` int(11) NOT NULL AUTO_INCREMENT,
  `id_vacancy` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_favorite_vacancy`),
  KEY `favorite_vacancy_fk01` (`id_vacancy`),
  KEY `favorite_vacancy_fk02` (`id_user`),
  CONSTRAINT `favorite_vacancy_fk01` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`),
  CONSTRAINT `favorite_vacancy_fk02` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.favorite_vacancy: ~0 rows (approximately)
/*!40000 ALTER TABLE `favorite_vacancy` DISABLE KEYS */;
INSERT INTO `favorite_vacancy` (`id_favorite_vacancy`, `id_vacancy`, `id_user`, `create_date`, `removed`) VALUES
	(1, 1, 1, '2022-11-24', 0);
/*!40000 ALTER TABLE `favorite_vacancy` ENABLE KEYS */;

-- Dumping structure for table jobshub.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_vacancy` int(11) DEFAULT NULL,
  `text` tinytext NOT NULL,
  `star` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_feedback`),
  KEY `feedback_fk1` (`id_user`),
  KEY `feedback_fk2` (`id_company`),
  KEY `feedback_fk3` (`id_vacancy`),
  CONSTRAINT `feedback_fk1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `feedback_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  CONSTRAINT `feedback_fk3` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.feedback: ~3 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id_feedback`, `id_user`, `id_company`, `id_vacancy`, `text`, `star`, `create_date`, `removed`) VALUES
	(1, 1, 2, NULL, 'Otima empressa', 5, '2022-11-24', 0),
	(2, 1, 1, NULL, 'Empresa muito favorecida no mercado', 5, '2022-11-24', 0),
	(3, 1, NULL, 1, 'Uma otima area', 4, '2022-11-24', 0);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table jobshub.resumes
CREATE TABLE IF NOT EXISTS `resumes` (
  `id_resume` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `removed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_resume`),
  KEY `resume_users_fk1` (`id_user`),
  CONSTRAINT `resume_users_fk1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.resumes: ~1 rows (approximately)
/*!40000 ALTER TABLE `resumes` DISABLE KEYS */;
INSERT INTO `resumes` (`id_resume`, `id_user`, `create_date`, `about`, `removed`) VALUES
	(1, 1, '2022-11-24', 'Meu curriculo', 0),
	(3, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `resumes` ENABLE KEYS */;

-- Dumping structure for table jobshub.resumes_abilities
CREATE TABLE IF NOT EXISTS `resumes_abilities` (
  `id_resume_ability` int(11) NOT NULL AUTO_INCREMENT,
  `id_ability` int(11) DEFAULT NULL,
  `id_resume` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_resume_ability`),
  KEY `resumes_abilities_fk0` (`id_ability`),
  KEY `resume_ability_fk1` (`id_resume`),
  CONSTRAINT `resume_ability_fk1` FOREIGN KEY (`id_resume`) REFERENCES `resumes` (`id_resume`),
  CONSTRAINT `resumes_abilities_fk0` FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.resumes_abilities: ~3 rows (approximately)
/*!40000 ALTER TABLE `resumes_abilities` DISABLE KEYS */;
INSERT INTO `resumes_abilities` (`id_resume_ability`, `id_ability`, `id_resume`, `removed`) VALUES
	(1, 5, 1, 0),
	(2, 4, 1, 0),
	(3, 3, 1, 0);
/*!40000 ALTER TABLE `resumes_abilities` ENABLE KEYS */;

-- Dumping structure for table jobshub.resumes_scholarities
CREATE TABLE IF NOT EXISTS `resumes_scholarities` (
  `id_resume_scholarity` int(11) NOT NULL AUTO_INCREMENT,
  `id_scholarity` int(11) DEFAULT NULL,
  `id_resume` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_resume_scholarity`),
  KEY `resumes_scholarities_fk0` (`id_scholarity`),
  KEY `resume_scholarity_fk1` (`id_resume`),
  CONSTRAINT `resume_scholarity_fk1` FOREIGN KEY (`id_resume`) REFERENCES `resumes` (`id_resume`),
  CONSTRAINT `resumes_scholarities_fk0` FOREIGN KEY (`id_scholarity`) REFERENCES `scholarities` (`id_scholarity`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.resumes_scholarities: ~2 rows (approximately)
/*!40000 ALTER TABLE `resumes_scholarities` DISABLE KEYS */;
INSERT INTO `resumes_scholarities` (`id_resume_scholarity`, `id_scholarity`, `id_resume`, `removed`) VALUES
	(1, 1, 1, 0),
	(2, 2, 1, 0);
/*!40000 ALTER TABLE `resumes_scholarities` ENABLE KEYS */;

-- Dumping structure for table jobshub.resumes_work_experiences
CREATE TABLE IF NOT EXISTS `resumes_work_experiences` (
  `id_resume_work_experience` int(11) NOT NULL AUTO_INCREMENT,
  `id_work_experience` int(11) DEFAULT NULL,
  `id_resume` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_resume_work_experience`),
  KEY `resumes_work_experiences_fk0` (`id_work_experience`),
  KEY `resumes_work_experiences_fk1` (`id_resume`),
  CONSTRAINT `resumes_work_experiences_fk0` FOREIGN KEY (`id_work_experience`) REFERENCES `work_experiences` (`id_work_experience`),
  CONSTRAINT `resumes_work_experiences_fk1` FOREIGN KEY (`id_resume`) REFERENCES `resumes` (`id_resume`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.resumes_work_experiences: ~0 rows (approximately)
/*!40000 ALTER TABLE `resumes_work_experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumes_work_experiences` ENABLE KEYS */;

-- Dumping structure for table jobshub.scholarities
CREATE TABLE IF NOT EXISTS `scholarities` (
  `id_scholarity` int(11) NOT NULL AUTO_INCREMENT,
  `id_education_level` int(11) DEFAULT NULL,
  `study_field` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `id_address` int(11) NOT NULL,
  `currently_enrolled` int(1) NOT NULL,
  `time_period_from` date NOT NULL,
  `time_period_to` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_scholarity`),
  KEY `scholarities_address_fk0` (`id_address`),
  KEY `scholaritiesl_fk0` (`id_education_level`),
  CONSTRAINT `scholarities_address_fk0` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`),
  CONSTRAINT `scholaritiesl_fk0` FOREIGN KEY (`id_education_level`) REFERENCES `education_levels` (`id_education_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.scholarities: ~2 rows (approximately)
/*!40000 ALTER TABLE `scholarities` DISABLE KEYS */;
INSERT INTO `scholarities` (`id_scholarity`, `id_education_level`, `study_field`, `school_name`, `id_address`, `currently_enrolled`, `time_period_from`, `time_period_to`, `removed`) VALUES
	(1, 1, 'ensimo normal', 'Elvira Santos de Olvieira', 1, 0, '2018-02-02', '2018-12-12', 0),
	(2, 4, 'Desenvolvimento de sistemas', 'Etec João Maria Stevannatto', 2, 0, '2019-02-02', '2021-12-12', 0);
/*!40000 ALTER TABLE `scholarities` ENABLE KEYS */;

-- Dumping structure for table jobshub.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `ra` varchar(255) DEFAULT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `id_resume` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `ra` (`ra`),
  KEY `users_fk0` (`id_resume`),
  CONSTRAINT `users_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes` (`id_resume`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `name`, `birth_date`, `email`, `password`, `phone_number`, `ra`, `photo_profile`, `id_resume`, `create_date`, `removed`, `approved`) VALUES
	(1, 'igor', '2003-09-24', 'igor.teodoro@fatec.sp.gov.br', 'ceb220926c10a27cdc9aa4dda9821403', '19 99999-9999', '2781392213009', NULL, NULL, '2022-12-01', 0, 1),
	(2, NULL, NULL, 'gustavoornaghiantunes@gmail.com', 'ceb220926c10a27cdc9aa4dda9821403', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, NULL, NULL, 'gustavoornaghiantunes15@gmail.com', 'ceb220926c10a27cdc9aa4dda9821403', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, NULL, NULL, 'gustavoornaghiantunes123@gmail.com', 'ceb220926c10a27cdc9aa4dda9821403', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table jobshub.users_company
CREATE TABLE IF NOT EXISTS `users_company` (
  `id_users_company` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_users_company`),
  KEY `users_company_fk0` (`id_company`),
  KEY `users_company_fk1` (`id_user`),
  CONSTRAINT `users_company_fk0` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  CONSTRAINT `users_company_fk1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.users_company: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_company` DISABLE KEYS */;
INSERT INTO `users_company` (`id_users_company`, `id_user`, `id_company`, `removed`) VALUES
	(1, 1, 3, 0);
/*!40000 ALTER TABLE `users_company` ENABLE KEYS */;

-- Dumping structure for table jobshub.users_courses
CREATE TABLE IF NOT EXISTS `users_courses` (
  `id_users_courses` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_users_courses`),
  KEY `users_courses_fk0` (`id_course`),
  KEY `users_courses_fk1` (`id_user`),
  CONSTRAINT `users_courses_fk0` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  CONSTRAINT `users_courses_fk1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.users_courses: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_courses` ENABLE KEYS */;

-- Dumping structure for table jobshub.users_vacancies
CREATE TABLE IF NOT EXISTS `users_vacancies` (
  `id_users_vacancies` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vacancy` int(11) NOT NULL,
  `id_vacancy_status` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_users_vacancies`),
  KEY `users_vacancies_fk01` (`id_user`),
  KEY `users_vacancies_fk02` (`id_vacancy`),
  KEY `users_vacancies_fk03` (`id_vacancy_status`),
  CONSTRAINT `users_vacancies_fk01` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `users_vacancies_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`),
  CONSTRAINT `users_vacancies_fk03` FOREIGN KEY (`id_vacancy_status`) REFERENCES `vacancies_status` (`id_vacancy_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.users_vacancies: ~1 rows (approximately)
/*!40000 ALTER TABLE `users_vacancies` DISABLE KEYS */;
INSERT INTO `users_vacancies` (`id_users_vacancies`, `id_user`, `id_vacancy`, `id_vacancy_status`, `create_date`, `removed`) VALUES
	(1, 1, 1, 4, '2022-11-24', 0),
	(2, 2, 4, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users_vacancies` ENABLE KEYS */;

-- Dumping structure for table jobshub.vacancies
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id_vacancy` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `full_desc` varchar(255) NOT NULL,
  `salary_min` float DEFAULT NULL,
  `salary_max` float DEFAULT NULL,
  `salary_defined` int(11) DEFAULT NULL,
  `vacancy_type` varchar(255) NOT NULL,
  `hours_day` time DEFAULT NULL,
  `hours_weeky` time DEFAULT NULL,
  `activity` text,
  `qtd_max_cand` int(11) DEFAULT NULL,
  `qtd_min_cand` int(11) DEFAULT NULL,
  `open_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  `id_vacancy_status` int(11) NOT NULL DEFAULT '1',
  `removed` int(1) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vacancy`),
  KEY `vacancies_fk0` (`id_vacancy_status`),
  KEY `FK_vacancies_companies` (`id_company`),
  CONSTRAINT `FK_vacancies_companies` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  CONSTRAINT `vacancies_fk0` FOREIGN KEY (`id_vacancy_status`) REFERENCES `vacancies_status` (`id_vacancy_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.vacancies: ~4 rows (approximately)
/*!40000 ALTER TABLE `vacancies` DISABLE KEYS */;
INSERT INTO `vacancies` (`id_vacancy`, `name`, `short_desc`, `full_desc`, `salary_min`, `salary_max`, `salary_defined`, `vacancy_type`, `hours_day`, `hours_weeky`, `activity`, `qtd_max_cand`, `qtd_min_cand`, `open_date`, `close_date`, `create_date`, `approved`, `id_vacancy_status`, `removed`, `id_company`) VALUES
	(1, 'Help desk', 'Help desk para colaboradores', 'Help desk para colaboradores e buscar formas de solucionar problemas', 500, 1000, 1000, 'Estagio', '07:00:00', '20:00:00', 'dominio em software', 20, 5, '2022-11-24', '2022-11-30', '2022-11-24', 0, 3, 0, 1),
	(4, 'Gustavo Ornaghi Antuneseeeee', 'ew16e4w56e51e5', 'eeeeeeeeeeeeee', 1000, 10000, 0, 'Estagiário', '00:00:08', NULL, 'programar', 50, 10, '2004-04-15', '2023-02-15', NULL, NULL, 1, NULL, 1);
/*!40000 ALTER TABLE `vacancies` ENABLE KEYS */;

-- Dumping structure for table jobshub.vacancies_status
CREATE TABLE IF NOT EXISTS `vacancies_status` (
  `id_vacancy_status` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_vacancy_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.vacancies_status: ~4 rows (approximately)
/*!40000 ALTER TABLE `vacancies_status` DISABLE KEYS */;
INSERT INTO `vacancies_status` (`id_vacancy_status`, `name`) VALUES
	(1, 'ABERTO'),
	(2, 'FECHADA'),
	(3, 'CANCELADA'),
	(4, 'AGUARDANDO');
/*!40000 ALTER TABLE `vacancies_status` ENABLE KEYS */;

-- Dumping structure for table jobshub.vacancy_difference_abilities
CREATE TABLE IF NOT EXISTS `vacancy_difference_abilities` (
  `id_difference_ability` int(11) NOT NULL AUTO_INCREMENT,
  `id_vacancy` int(11) DEFAULT NULL,
  `id_ability` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_difference_ability`),
  KEY `vacancy_difference_abilities_fk0` (`id_vacancy`),
  KEY `vacancy_difference_abilities_fk1` (`id_ability`),
  CONSTRAINT `vacancy_difference_abilities_fk0` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`),
  CONSTRAINT `vacancy_difference_abilities_fk1` FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.vacancy_difference_abilities: ~5 rows (approximately)
/*!40000 ALTER TABLE `vacancy_difference_abilities` DISABLE KEYS */;
INSERT INTO `vacancy_difference_abilities` (`id_difference_ability`, `id_vacancy`, `id_ability`, `removed`) VALUES
	(1, 1, 5, 0),
	(2, 1, 4, 0),
	(3, 1, 3, 0),
	(4, 4, 4, NULL),
	(5, 4, 5, NULL);
/*!40000 ALTER TABLE `vacancy_difference_abilities` ENABLE KEYS */;

-- Dumping structure for table jobshub.vacancy_required_abilities
CREATE TABLE IF NOT EXISTS `vacancy_required_abilities` (
  `id_required_ability` int(11) NOT NULL AUTO_INCREMENT,
  `id_vacancy` int(11) DEFAULT NULL,
  `id_ability` int(11) DEFAULT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_required_ability`),
  KEY `vacancy_required_abilities_fk0` (`id_vacancy`),
  KEY `vacancy_required_abilities_fk1` (`id_ability`),
  CONSTRAINT `vacancy_required_abilities_fk0` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id_vacancy`),
  CONSTRAINT `vacancy_required_abilities_fk1` FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.vacancy_required_abilities: ~5 rows (approximately)
/*!40000 ALTER TABLE `vacancy_required_abilities` DISABLE KEYS */;
INSERT INTO `vacancy_required_abilities` (`id_required_ability`, `id_vacancy`, `id_ability`, `removed`) VALUES
	(1, 1, 5, 0),
	(2, 1, 1, 0),
	(3, 4, 1, NULL),
	(4, 4, 2, NULL),
	(5, 4, 3, NULL);
/*!40000 ALTER TABLE `vacancy_required_abilities` ENABLE KEYS */;

-- Dumping structure for table jobshub.work_experiences
CREATE TABLE IF NOT EXISTS `work_experiences` (
  `id_work_experience` int(11) NOT NULL AUTO_INCREMENT,
  `name_title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `id_address` int(11) NOT NULL,
  `corrently` int(1) NOT NULL,
  `time_period_from` date NOT NULL,
  `time_period_to` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `no_experiences` int(1) NOT NULL,
  `removed` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_work_experience`),
  KEY `work_experiences_address_fk0` (`id_address`),
  CONSTRAINT `work_experiences_address_fk0` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table jobshub.work_experiences: ~2 rows (approximately)
/*!40000 ALTER TABLE `work_experiences` DISABLE KEYS */;
INSERT INTO `work_experiences` (`id_work_experience`, `name_title`, `company`, `id_address`, `corrently`, `time_period_from`, `time_period_to`, `description`, `no_experiences`, `removed`) VALUES
	(1, 'Suporte', 'Nubank', 1, 0, '2020-01-24', '2021-01-24', 'Help desk', 0, 0),
	(2, 'Analista de Sistema', 'Nubank', 1, 0, '2021-01-24', '2022-11-24', 'Analise e implementação de sistemas', 0, 0);
/*!40000 ALTER TABLE `work_experiences` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
