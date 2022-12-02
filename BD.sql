CREATE DATABASE jobshub;

USE jobshub;

CREATE TABLE `users` (
	`id_user` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) ,
	`birth_date` DATE ,
	`email` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`phone_number` varchar(255),
	`ra` varchar(255) UNIQUE,
	`photo_profile` varchar(255),
	`id_resume` int,
	`create_date` DATE,
	`removed` int(1),
	`approved` INT(1), 
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `companies` (
	`id_company` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) ,
	`cnpj` varchar(255) UNIQUE,
	`email` varchar(255) NULL UNIQUE,
	`phone_number` varchar(255)  UNIQUE,
	`photo_profile` varchar(255) ,
	`description` TEXT ,
	`ceo` varchar(255),
	`date_foundation` DATE ,
	`link` TEXT ,
	`create_date` DATE,
	`approved` INT(1),
	`removed` int(1),
	`fatec` INT(1),
	PRIMARY KEY (`id_company`)
);

CREATE TABLE `vacancies` (
	`id_vacancy` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`short_desc` varchar(255) NOT NULL,
	`full_desc` varchar(255) NOT NULL,
	`salary_min` FLOAT,
	`salary_max` FLOAT,
	`salary_defined` int,
	`vacancy_type` varchar(255) NOT NULL,
	`hours_day` TIME,
	`hours_weeky` TIME,
	`activity` TEXT,
	`qtd_max_cand` int ,
	`qtd_min_cand` int ,
	`open_date` DATE ,
	`close_date` DATE,
	`create_date` DATE,
	`approved` INT(1),
	`id_vacancy_status` int NOT NULL,
	`removed` int(1), 
	PRIMARY KEY (`id_vacancy`)
);

CREATE TABLE `resumes` (
	`id_resume` int NOT NULL AUTO_INCREMENT,
	`id_user` int,
	`create_date` DATE,
	`about` VARCHAR(255),
	`removed` int(1), 
	PRIMARY KEY (`id_resume`)
);

CREATE TABLE `scholarities` (
	`id_scholarity` int NOT NULL AUTO_INCREMENT,
	`id_education_level` INT,
	`study_field` varchar(255) NOT NULL,
	`school_name` varchar(255) NOT NULL,
	`id_address` INT NOT NULL,
	`currently_enrolled` int(1) NOT NULL,
	`time_period_from` DATE NOT NULL,
	`time_period_to` DATE,
	`removed` int(1), 
	PRIMARY KEY (`id_scholarity`)
);

CREATE TABLE `work_experiences` (
	`id_work_experience` int NOT NULL AUTO_INCREMENT,
	`name_title` varchar(255) NOT NULL,
	`company` varchar(255) NOT NULL,
	`id_address` INT NOT NULL,
	`corrently` int(1) NOT NULL,
	`time_period_from` DATE NOT NULL,
	`time_period_to` DATE NOT NULL,
	`description` varchar(255) NOT NULL,
	`no_experiences` int(1) NOT NULL,
	`removed` int(1), 
	PRIMARY KEY (`id_work_experience`)
);

CREATE TABLE `faq` (
	`id_faq` int NOT NULL AUTO_INCREMENT,
	`id_user` int NULL,
	`id_company` int NULL,
	`description` varchar(255) NOT NULL,
	`create_date` DATE,
	`removed` int(1), 
	PRIMARY KEY (`id_faq`)
);

CREATE TABLE `users_vacancies` (
	`id_users_vacancies` INT NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_vacancy` int NOT NULL,
	`id_vacancy_status` INT,
	`create_date` DATE,
	`removed` int(1),
	PRIMARY KEY (`id_users_vacancies`)
);

CREATE TABLE `favorite_vacancy` (
	`id_favorite_vacancy` int NOT NULL AUTO_INCREMENT,
	`id_vacancy` int NOT NULL,
	`id_user` int NOT NULL,
	`create_date` DATE,
	`removed` int(1), 
	PRIMARY KEY (`id_favorite_vacancy`)
);

CREATE TABLE `feedback` (
	`id_feedback` int NOT NULL AUTO_INCREMENT,
	`id_user` INT  NULL,
	`id_company` INT NULL,
	`id_vacancy` INT  NULL,
	`text` TEXT(255) NOT NULL,
	`star` int NOT NULL,
	`create_date` DATE,
	`removed` int(1),  
	PRIMARY KEY (`id_feedback`)
);

CREATE TABLE `courses` (
	`id_course` int NOT NULL AUTO_INCREMENT,
	`thema` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`duration` TIME NOT NULL,
	`price` FLOAT NOT NULL,
	`id_class` int NOT NULL,
	`removed` int(1), 
	PRIMARY KEY (`id_course`)
);


CREATE TABLE `class` (
	`id_class` int AUTO_INCREMENT,
	`numer_class` int NOT NULL,	
	`topic_name` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`link_youtube` varchar(255) NOT NULL,
	`removed` int(1), 
	PRIMARY KEY (`id_class`)
);

CREATE TABLE `users_courses` (
	`id_users_courses` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_course` int NOT NULL,
	`removed` int(1), 
	PRIMARY KEY (`id_users_courses`)
);

CREATE TABLE `vacancy_required_abilities` (
	`id_required_ability` int AUTO_INCREMENT,
	`id_vacancy` int,
	`id_ability` int,
	`removed` int(1), 
	PRIMARY KEY (`id_required_ability`)
);

CREATE TABLE `abilities` (
	`id_ability` int AUTO_INCREMENT,
	`ability` varchar(255),
	`removed` int(1),
	PRIMARY KEY (`id_ability`)
);

CREATE TABLE `vacancy_difference_abilities` (
	`id_difference_ability` int AUTO_INCREMENT,
	`id_vacancy` int,
	`id_ability` int,
	`removed` int(1), 
	PRIMARY KEY (`id_difference_ability`)
);

CREATE TABLE `vacancies_status` (
	`id_vacancy_status` int  AUTO_INCREMENT,
	`name` varchar(255),
	PRIMARY KEY (`id_vacancy_status`)
);

CREATE TABLE `companies_vacancies` (
	`id_companies_vacancies` int AUTO_INCREMENT,
	`id_company` int,
	`id_vacancy` int,
	`removed` int(1), 
	PRIMARY KEY (`id_companies_vacancies`)
);

CREATE TABLE `education_levels`(
	`id_education_level` INT AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id_education_level`)
);

CREATE TABLE `resumes_scholarities`(
	`id_resume_scholarity` INT AUTO_INCREMENT,
	`id_scholarity` INT,
	`id_resume` INT,
	`removed` int(1), 
	PRIMARY KEY(`id_resume_scholarity`)
);

CREATE TABLE `resumes_work_experiences`(
	`id_resume_work_experience` INT AUTO_INCREMENT,
	`id_work_experience` INT,
	`id_resume` INT,
	`removed` int(1), 
	PRIMARY KEY(`id_resume_work_experience`)
);

CREATE TABLE `resumes_abilities`(
	`id_resume_ability` int AUTO_INCREMENT,
	`id_ability` INT,
	`id_resume` INT,
	`removed` int(1), 
	PRIMARY KEY(`id_resume_ability`)
);

CREATE TABLE `address`(
	`id_address` int AUTO_INCREMENT,
	`id_city` INT NOT NULL,
	`id_state` INT NOT NULL,
	`id_country` INT NOT NULL,
	`removed` int(1), 
	PRIMARY KEY(`id_address`)
);

CREATE TABLE `users_company`(
	`id_users_company` INT AUTO_INCREMENT,
	`id_user` INT,
	`id_company` INT,
	`removed` int(1), 
	PRIMARY KEY(`id_users_company`)
);

ALTER TABLE `users_company` ADD CONSTRAINT `users_company_fk0` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `users_company` ADD CONSTRAINT `users_company_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `scholarities` ADD CONSTRAINT `scholarities_address_fk0`  FOREIGN KEY (`id_address`) REFERENCES `address`(`id_address`);

ALTER TABLE `work_experiences` ADD CONSTRAINT `work_experiences_address_fk0`  FOREIGN KEY (`id_address`) REFERENCES `address`(`id_address`);

ALTER TABLE `resumes_scholarities` ADD CONSTRAINT `resumes_scholarities_fk0`  FOREIGN KEY (`id_scholarity`) REFERENCES `scholarities`(`id_scholarity`);

ALTER TABLE `resumes_scholarities` ADD CONSTRAINT `resume_scholarity_fk1`   FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resumes_work_experiences` ADD CONSTRAINT `resumes_work_experiences_fk0` FOREIGN KEY (`id_work_experience`)  REFERENCES `work_experiences`(`id_work_experience`);

ALTER TABLE `resumes_work_experiences` ADD CONSTRAINT `resumes_work_experiences_fk1`  FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resumes_abilities` ADD CONSTRAINT `resumes_abilities_fk0` FOREIGN KEY (`id_ability`) REFERENCES `abilities`(`id_ability`);

ALTER TABLE `resumes_abilities` ADD CONSTRAINT `resume_ability_fk1`  FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `scholarities` ADD CONSTRAINT `scholaritiesl_fk0` FOREIGN KEY (`id_education_level`) REFERENCES `education_levels`(`id_education_level`);

ALTER TABLE `companies_vacancies` ADD CONSTRAINT `companies_vacancies_fk0` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `companies_vacancies` ADD CONSTRAINT `companies_vacancies_fk1` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `vacancies` ADD CONSTRAINT `vacancies_fk0` FOREIGN KEY (`id_vacancy_status`) REFERENCES `vacancies_status`(`id_vacancy_status`);

ALTER TABLE `vacancy_required_abilities` ADD CONSTRAINT `vacancy_required_abilities_fk0` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `vacancy_required_abilities` ADD CONSTRAINT `vacancy_required_abilities_fk1` FOREIGN KEY (`id_ability`) REFERENCES `abilities`(`id_ability`);

ALTER TABLE `vacancy_difference_abilities` ADD CONSTRAINT `vacancy_difference_abilities_fk0` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `vacancy_difference_abilities` ADD CONSTRAINT `vacancy_difference_abilities_fk1` FOREIGN KEY (`id_ability`) REFERENCES `abilities`(`id_ability`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk3` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resumes` ADD CONSTRAINT `resume_users_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `faq` ADD CONSTRAINT `fq_fk01` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `faq` ADD CONSTRAINT `faq_fk02` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `users_vacancies` ADD CONSTRAINT `users_vacancies_fk01`  FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `users_vacancies` ADD CONSTRAINT `users_vacancies_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `users_vacancies` ADD CONSTRAINT `users_vacancies_fk03` FOREIGN KEY (`id_vacancy_status`) REFERENCES `vacancies_status`(`id_vacancy_status`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk01` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk02` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `courses` ADD CONSTRAINT `courses_fk0` FOREIGN KEY (`id_class`) REFERENCES `class`(`id_class`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk0` FOREIGN KEY (`id_course`) REFERENCES `courses`(`id_course`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);


INSERT INTO `jobshub`.`users` (`name`, `birth_date` , `email`, `password`, `phone_number`, `ra`, `create_date` ,`removed`,`approved`) VALUES ('igor', '2003-09-24', 'igor.teodoro@fatec.sp.gov.br', '123456789', '19 99999-9999', '2781392213009', CURDATE() ,'0','1');

INSERT INTO `jobshub`.`abilities` (`ability`, `removed`) VALUES ('Organizado', '0');
INSERT INTO `jobshub`.`abilities` (`ability`, `removed`) VALUES ('Flexibidade', '0');
INSERT INTO `jobshub`.`abilities` (`ability`, `removed`) VALUES ('Proativo', '0');
INSERT INTO `jobshub`.`abilities` (`ability`, `removed`) VALUES ('Criatividade', '0');
INSERT INTO `jobshub`.`abilities` (`ability`, `removed`) VALUES ('Boa comunicação', '0');

INSERT INTO `jobshub`.`vacancies_status` (`name`) VALUES ('ABERTO');
INSERT INTO `jobshub`.`vacancies_status` (`name`) VALUES ('FECHADA');
INSERT INTO `jobshub`.`vacancies_status` (`name`) VALUES ('CANCELADA');
INSERT INTO `jobshub`.`vacancies_status` (`name`) VALUES ('AGUARDANDO');

INSERT INTO `jobshub`.`address` (`id_city`, `id_state`, `id_country`, `removed`) VALUES ('1', '1', '1', '0');
INSERT INTO `jobshub`.`address` (`id_city`, `id_state`, `id_country`, `removed`) VALUES ('2', '2', '2', '0');

INSERT INTO `jobshub`.`work_experiences` (`name_title`, `company`, `id_address`, `corrently`, `time_period_from`, `time_period_to`, `description`, `no_experiences`, `removed`) VALUES ('Suporte', 'Nubank', '1', '0', '2020-01-24', '2021-01-24', 'Help desk', '0', '0');
INSERT INTO `jobshub`.`work_experiences` (`name_title`, `company`, `id_address`, `corrently`, `time_period_from`, `time_period_to`, `description`, `no_experiences`, `removed`) VALUES ('Analista de Sistema', 'Nubank', '1', '0', '2021-01-24', '2022-11-24', 'Analise e implementação de sistemas', '0', '0');

INSERT INTO `jobshub`.`vacancies` (`name`, `short_desc`, `full_desc`, `salary_min`, `salary_max`, `salary_defined`, `vacancy_type`, `hours_day`, `hours_weeky`, `activity`, `qtd_max_cand`, `qtd_min_cand`, `open_date`, `close_date`, `create_date`, `approved`, `id_vacancy_status`, `removed`) VALUES ('Help desk', 'Help desk para colaboradores', 'Help desk para colaboradores e buscar formas de solucionar problemas', '500', '1000', '1000', 'Estagio', '7 :00:00', '20:00:00', 'dominio em software', '20', '5', '2022-11-24', '2022-11-30', '2022-11-24', '0', '3', '0');

INSERT INTO `companies` (`id_company`, `name`, `cnpj`, `email`, `phone_number`, `photo_profile`, `description`, `ceo`, `date_foundation`, `link`, `create_date`, `approved`, `removed`, `fatec`) VALUES
	(1, 'Nubank', '	24.410.913/0001-44', NULL, '4020-0185', NULL, 'Nubank é uma empresa startup brasileira pioneira no segmento de serviços financeiros, atuando como operadora de cartões de crédito e fintech com operações no Brasil, sediada em São Paulo e fundada em 6 de maio de 2013 por David Vélez, Cristina Junqueira e Edward Wible', 'David Vélez, Cristina Junqueira e Edward Wible', '2013-05-06', 'https://nubank.com.br/pedir/nu/?utm_source=google&utm_medium=cpc&utm_campaign=1784086961&utm_term=118905407472&utm_word=nubank&utm_content=502413793352&ad_position=&match_type=b&location=1031717&device=c&utm_keyword_id=aud-427394325571:kwd-488984618592&utm_placement=&extension=&geolocation=1031717&google_channel=google_brand&gclid=CjwKCAiAyfybBhBKEiwAgtB7fuJO37Om4MxQslZloogWBXwzJ1NZ_jB59crr_U8Ws-e4ib_uVVAfsRoCH4gQAvD_BwE', '2022-11-24', 0, 0, 0),
	(2, 'IBM', '33.372.251/0001-56', NULL, NULL, NULL, 'A International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática.', 'Arvind Krishna', '1911-06-16', 'https://www.ibm.com/us-en/', '2022-11-24', 0, 0, 0),
	(3, 'Fatec Itapira - "Dr. Ogari de Castro Pacheco"', '62.823.257/0001-09', 'contato@fatecitapira.edu.br', '(19) 3843-1996', NULL, 'Faculdade', 'Centro Paulo Souza', '2022-11-24', 'https://www.fatecitapira.edu.br/index.html', '2022-11-24', 0, 0, 0);

INSERT INTO `jobshub`.`companies_vacancies` (`id_company`, `id_vacancy`, `removed`) VALUES ('2', '1', '0');

INSERT INTO `jobshub`.`education_levels` (`name`) VALUES ('Ensino Médio');
INSERT INTO `jobshub`.`education_levels` (`name`) VALUES ('Ensino Superior');
INSERT INTO `jobshub`.`education_levels` (`name`) VALUES ('Ensino Tecnico');
INSERT INTO `jobshub`.`education_levels` (`name`) VALUES ('Ensino Médio integrago Tecnico');

INSERT INTO `jobshub`.`faq` (`id_user`, `id_company`, `description`, `create_date`, `removed`) VALUES ('1', '2', 'Empresa muito boa', '2022-11-24', '0');

INSERT INTO `jobshub`.`favorite_vacancy` (`id_vacancy`, `id_user`, `create_date`, `removed`) VALUES ('1', '1', '2022-11-24', '0');

INSERT INTO `jobshub`.`feedback` (`id_user`, `id_company`, `text`, `star`, `create_date`, `removed`) VALUES ('1', '2', 'Otima empressa', '5', '2022-11-24', '0');
INSERT INTO `jobshub`.`feedback` (`id_user`, `id_company`, `text`, `star`, `create_date`, `removed`) VALUES ('1', '1', 'Empresa muito favorecida no mercado', '5', '2022-11-24', '0');
INSERT INTO `jobshub`.`feedback` (`id_user`, `id_vacancy`, `text`, `star`, `create_date`, `removed`) VALUES ('1', '1', 'Uma otima area', '4', '2022-11-24', '0');

INSERT INTO `jobshub`.`resumes` (`id_user`, `create_date`, `about`, `removed`) VALUES ('1', '2022-11-24', 'Meu curriculo', '0');

INSERT INTO `jobshub`.`resumes_abilities` (`id_ability`, `id_resume`, `removed`) VALUES ('5', '1', '0');
INSERT INTO `jobshub`.`resumes_abilities` (`id_ability`, `id_resume`, `removed`) VALUES ('4', '1', '0');
INSERT INTO `jobshub`.`resumes_abilities` (`id_ability`, `id_resume`, `removed`) VALUES ('3', '1', '0');

INSERT INTO `jobshub`.`scholarities` (`id_education_level`, `study_field`, `school_name`, `id_address`, `currently_enrolled`, `time_period_from`, `time_period_to`, `removed`) VALUES ('1', 'ensimo normal', 'Elvira Santos de Olvieira', '1', '0', '2018-02-02', '2018-12-12', '0');
INSERT INTO `jobshub`.`scholarities` (`id_education_level`, `study_field`, `school_name`, `id_address`, `currently_enrolled`, `time_period_from`, `time_period_to`, `removed`) VALUES ('4', 'Desenvolvimento de sistemas', 'Etec João Maria Stevannatto', '2', '0', '2019-02-02', '2021-12-12', '0');

INSERT INTO `jobshub`.`users_company` (`id_user`, `id_company`, `removed`) VALUES ('1', '3', '0');

INSERT INTO `jobshub`.`users_vacancies` (`id_user`, `id_vacancy`, `id_vacancy_status`, `create_date`, `removed`) VALUES ('1', '1', '4', '2022-11-24', '0');

INSERT INTO `jobshub`.`vacancy_difference_abilities` (`id_vacancy`, `id_ability`, `removed`) VALUES ('1', '5', '0');
INSERT INTO `jobshub`.`vacancy_difference_abilities` (`id_vacancy`, `id_ability`, `removed`) VALUES ('1', '4', '0');
INSERT INTO `jobshub`.`vacancy_difference_abilities` (`id_vacancy`, `id_ability`, `removed`) VALUES ('1', '3', '0');

INSERT INTO `jobshub`.`vacancy_required_abilities` (`id_vacancy`, `id_ability`, `removed`) VALUES ('1', '5', '0');
INSERT INTO `jobshub`.`vacancy_required_abilities` (`id_vacancy`, `id_ability`, `removed`) VALUES ('1', '1', '0');

INSERT INTO `jobshub`.`resumes_scholarities` (`id_scholarity`, `id_resume`, `removed`) VALUES ('1', '1', '0');
INSERT INTO `jobshub`.`resumes_scholarities` (`id_scholarity`, `id_resume`, `removed`) VALUES ('2', '1', '0');


INSERT INTO `jobshub`.`resumes_work_experiences` (`id_work_experience`, `id_resume`, `removed`) VALUES ('1', '1', '0');