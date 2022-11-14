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
	`Id_favorite_vacancy` int,
	`create_date` DATE, 
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `companies` (
	`id_company` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) ,
	`cnpj` varchar(255) UNIQUE,
	`email` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`phone_number` varchar(255)  UNIQUE,
	`photo_profile` varchar(255) ,
	`description` varchar(255) ,
	`ceo` varchar(255),
	`date_foundation` DATE ,
	`link` varchar(255) ,
	`create_date` DATE, 
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
	`id_vacancy_required_abilities` int ,
	`id_vacancy_difference_abilities` int ,
	`hours_day` TIME,
	`hours_weeky` TIME,
	`activity` TEXT,
	`qtd_max_cand` int ,
	`qtd_min_cand` int ,
	`open_date` DATE ,
	`close_date` DATE,
	`create_date` DATE,
	`id_vacancy_status` int NOT NULL,
	PRIMARY KEY (`id_vacancy`)
);

CREATE TABLE `resumes` (
	`id_resume` int NOT NULL AUTO_INCREMENT,
	`id_scholarity` int,
	`id_work_experiences` int,
	`id_hability` int,
	`create_date` DATE,
	PRIMARY KEY (`id_resume`)
);

CREATE TABLE `scholarities` (
	`id_scholarity` int NOT NULL AUTO_INCREMENT,
	`id_education_level` INT,
	`study_field` varchar(255) NOT NULL,
	`school_name` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`currently_enrolled` int(1) NOT NULL,
	`time_period_from` DATE NOT NULL,
	`time_period_to` DATE,
	PRIMARY KEY (`id_scholarity`)
);

CREATE TABLE `work_experiences` (
	`id_work_experiences` int NOT NULL AUTO_INCREMENT,
	`name_title` varchar(255) NOT NULL,
	`company` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`corrently` int(1) NOT NULL,
	`time_period_from` DATE NOT NULL,
	`time_period_to` DATE NOT NULL,
	`description` varchar(255) NOT NULL,
	`no_experiences` int(1) NOT NULL,
	PRIMARY KEY (`id_work_experiences`)
);

CREATE TABLE `faq` (
	`id_faq` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_company` int NOT NULL,
	`description` varchar(255) NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_faq`)
);

CREATE TABLE `users_vacancies` (
	`id_users_vacancies` bigint NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_vacancy` int NOT NULL,
	`result` varchar(255) NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_users_vacancies`)
);

CREATE TABLE `favorite_vacancy` (
	`Id_favorite_vacancy` int NOT NULL AUTO_INCREMENT,
	`Id_vacancy` int NOT NULL,
	`id_user` int NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`Id_favorite_vacancy`)
);

CREATE TABLE `integration` (
	`id_integration` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_vacancy` int NOT NULL,
	`id_company` int NOT NULL,
	`user_email` varchar(255) NOT NULL,
	`user_phone_number` varchar(255) NOT NULL,
	`date_integration` date NOT NULL,
	`time_integration` time NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_integration`)
);

CREATE TABLE `feedback` (
	`id_feedback` int NOT NULL AUTO_INCREMENT,
	`id_user` int,
	`id_company` int,
	`create_date` DATE, 
	PRIMARY KEY (`id_feedback`)
);

CREATE TABLE `feedback_company` (
	`id_feedback_company` int NOT NULL AUTO_INCREMENT,
	`id_company` int NOT NULL,
	`text` TEXT(255) NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_feedback_company`)
);

CREATE TABLE `feedback_vacancy` (
	`id_feedback_vacancy` int NOT NULL AUTO_INCREMENT,
	`id_vacancy` int NOT NULL,
	`text` TEXT NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_feedback_vacancy`)
);

CREATE TABLE `feedback_profile` (
	`id_feedback_profile` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`text` TEXT NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
	`create_date` DATE, 
	PRIMARY KEY (`id_feedback_profile`)
);

CREATE TABLE `courses` (
	`id_course` int NOT NULL AUTO_INCREMENT,
	`thema` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`duration` TIME NOT NULL,
	`price` FLOAT NOT NULL,
	`id_class` int NOT NULL,
	PRIMARY KEY (`id_course`)
);


CREATE TABLE `class` (
	`id_class` int AUTO_INCREMENT,
	`numer_class` int NOT NULL,
	`topic_name` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`link_youtube` varchar(255) NOT NULL,
	PRIMARY KEY (`id_class`)
);

CREATE TABLE `users_courses` (
	`id_users_courses` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_course` int NOT NULL,
	PRIMARY KEY (`id_users_courses`)
);

CREATE TABLE `vacancy_required_abilities` (
	`id_required_ability` int AUTO_INCREMENT,
	`id_vacancy` int,
	`id_ability` int,
	PRIMARY KEY (`id_required_ability`)
);

CREATE TABLE `abilities` (
	`id_ability` int AUTO_INCREMENT,
	`ability` varchar(255),
	PRIMARY KEY (`id_ability`)
);

CREATE TABLE `vacancy_difference_abilities` (
	`id_difference_ability` int AUTO_INCREMENT,
	`id_vacancy` int ,
	`id_ability` int,
	PRIMARY KEY (`id_difference_ability`)
);

CREATE TABLE `vacancies_status` (
	`id_vacancy_status` int  AUTO_INCREMENT,
	`name` varchar(255) ,
	PRIMARY KEY (`id_vacancy_status`)
);

CREATE TABLE `companies_vacancies` (
	`id_companies_vacancies` int AUTO_INCREMENT,
	`id_company` int ,
	`id_vacancy` int ,
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
	PRIMARY KEY(`id_resume_scholarity`)
);

CREATE TABLE `resumes_work_experiences`(
	`id_resume_work_experience` INT AUTO_INCREMENT,
	`id_work_experiences` INT,
	`id_resume` INT,
	PRIMARY KEY(`id_resume_work_experience`)
);

CREATE TABLE `resumes_abilities`(
	`id_resume_ability` int AUTO_INCREMENT,
	`id_ability` INT,
	`id_resume` INT,
	PRIMARY KEY(`id_resume_ability`)
);

ALTER TABLE `resumes_scholarities` ADD CONSTRAINT `resumes_scholarities_fk0`  FOREIGN KEY (`id_scholarity`) REFERENCES `scholarities`(`id_scholarity`);

ALTER TABLE `resumes_scholarities` ADD CONSTRAINT `resume_scholarity_fk1`   FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resumes_work_experiences` ADD CONSTRAINT `resumes_work_experiences_fk0` FOREIGN KEY (`id_resume_work_experience`)  REFERENCES `work_experiences`(`id_work_experiences`);

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

ALTER TABLE `feedback_company` ADD CONSTRAINT `feedback_company_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_vacancy` ADD CONSTRAINT `feedback_vacancy_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_profile` ADD CONSTRAINT `feedback_profile_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_vacancy` ADD CONSTRAINT `feedback_vacancy_fk1` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `feedback_company` ADD CONSTRAINT `feedback_company_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `feedback_profile` ADD CONSTRAINT `feedback_profile_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resumes` ADD CONSTRAINT `resume_sholarities_fk1` FOREIGN KEY (`id_scholarity`) REFERENCES `scholarities`(`id_scholarity`);

ALTER TABLE `resumes` ADD CONSTRAINT `resume_work_experiences_fk1` FOREIGN KEY (`id_work_experiences`) REFERENCES `work_experiences`(`id_work_experiences`);

ALTER TABLE `faq` ADD CONSTRAINT `fq_fk01` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `faq` ADD CONSTRAINT `faq_fk02` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `users_vacancies` ADD CONSTRAINT `users_vacancies_fk01`  FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `users_vacancies` ADD CONSTRAINT `users_vacancies_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk01` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk02` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk01` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk03` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `courses` ADD CONSTRAINT `courses_fk0` FOREIGN KEY (`id_class`) REFERENCES `class`(`id_class`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk0` FOREIGN KEY (`id_course`) REFERENCES `courses`(`id_course`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);