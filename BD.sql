CREATE DATABASE jobshub;

USE jobshub;

CREATE TABLE `users` (
	`id_user` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`birth_date` DATE NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`phone_number` varchar(255) NOT NULL,
	`ra` varchar(255) NOT NULL UNIQUE,
	`photo_profile` varchar(255) NOT NULL,
	`id_resume` int NOT NULL,
	`Id_favorite_vacancy` int NOT NULL,
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `companies` (
	`id_company` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`cnpj` varchar(255) NOT NULL UNIQUE,
	`email` varchar(255) NOT NULL UNIQUE,
	`phone_number` varchar(255) NOT NULL UNIQUE,
	`photo_profile` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`ceo` varchar(255) NOT NULL,
	`date_foundation` DATE NOT NULL,
	`link` varchar(255) NOT NULL,
	`id_vacancy` int,
	PRIMARY KEY (`id_company`)
);

CREATE TABLE `vacancies` (
	`id_vacancy` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`short_desc` varchar(255) NOT NULL,
	`full_desc` varchar(255) NOT NULL,
	`salary_min` FLOAT,
	`salary_max` FLOAT,
	`salary_defined` int(1),
	`vacancy_type` varchar(255) NOT NULL,
	`required_abilities` varchar(255) NOT NULL,
	`difference_abilities` varchar(255) NOT NULL,
	`workload` int NOT NULL,
	`activity` TEXT NOT NULL,
	`qtd_max_cand` int NOT NULL,
	`qtd_min_cand` int NOT NULL,
	`open_date` DATE NOT NULL,
	`close_date` DATE NOT NULL,
	PRIMARY KEY (`id_vacancy`)
);

CREATE TABLE `resumes` (
	`id_resume` int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id_resume`)
);

CREATE TABLE `scholarities` (
	`id_scholarity` int NOT NULL AUTO_INCREMENT,
	`education_level` varchar(255) NOT NULL,
	`study_field` varchar(255) NOT NULL,
	`school_name` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`currently_enrolled` int(1) NOT NULL,
	`time_period_from` DATE NOT NULL,
	`time_period_to` DATE NOT NULL,
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

CREATE TABLE `hability` (
	`id_hability` int NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id_hability`)
);

CREATE TABLE `resume_hability` (
	`id_resume_hability` int NOT NULL AUTO_INCREMENT,
	`id_resume` int NOT NULL,
	`id_hability` int NOT NULL,
	PRIMARY KEY (`id_resume_hability`)
);

CREATE TABLE `resume_sholarities` (
	`id_resume_scholarity` int NOT NULL AUTO_INCREMENT,
	`id_resume` int NOT NULL,
	`id_scholarity` int NOT NULL,
	PRIMARY KEY (`id_resume_scholarity`)
);

CREATE TABLE `resume_work_experiences` (
	`id_resume_scholarity` int NOT NULL AUTO_INCREMENT,
	`id_resume` int NOT NULL,
	`id_work_experiences` int NOT NULL,
	PRIMARY KEY (`id_resume_scholarity`)
);

CREATE TABLE `faq` (
	`id_faq` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_company` int NOT NULL,
	`description` varchar(255) NOT NULL,
	PRIMARY KEY (`id_faq`)
);

CREATE TABLE `selective_process` (
	`id_selective_process` bigint NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`id_vacancy` int NOT NULL,
	`result` varchar(255) NOT NULL,
	PRIMARY KEY (`id_selective_process`)
);

CREATE TABLE `favorite_vacancy` (
	`Id_favorite_vacancy` int NOT NULL AUTO_INCREMENT,
	`Id_vacancy` int NOT NULL,
	`id_user` int NOT NULL,
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
	PRIMARY KEY (`id_integration`)
);

CREATE TABLE `feedback` (
	`id_feedback` int NOT NULL AUTO_INCREMENT,
	`id_user` int,
	`id_company` int,
	PRIMARY KEY (`id_feedback`)
);

CREATE TABLE `feedback_company` (
	`id_feedback_company` int NOT NULL AUTO_INCREMENT,
	`id_company` int NOT NULL,
	`text` TEXT(255) NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
	PRIMARY KEY (`id_feedback_company`)
);

CREATE TABLE `feedback_vacancy` (
	`id_feedback_vacancy` int NOT NULL AUTO_INCREMENT,
	`id_vacancy` int NOT NULL,
	`text` TEXT NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
	PRIMARY KEY (`id_feedback_vacancy`)
);

CREATE TABLE `feedback_profile` (
	`id_feedback_profile` int NOT NULL AUTO_INCREMENT,
	`id_user` int NOT NULL,
	`text` TEXT NOT NULL,
	`star` int NOT NULL,
	`id_feedback` int NOT NULL,
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
	`id_class` int NOT NULL AUTO_INCREMENT,
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

ALTER TABLE `feedback_company` ADD CONSTRAINT `feedback_company_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_vacancy` ADD CONSTRAINT `feedback_vacancy_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_profile` ADD CONSTRAINT `feedback_profile_fk0` FOREIGN KEY (`id_feedback`) REFERENCES `feedback`(`id_feedback`);

ALTER TABLE `feedback_vacancy` ADD CONSTRAINT `feedback_vacancy_fk1` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `feedback_company` ADD CONSTRAINT `feedback_company_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `feedback_profile` ADD CONSTRAINT `feedback_profile_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `feedback` ADD CONSTRAINT `feedback_fk2` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `companies` ADD CONSTRAINT `companies_fk0` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `resume_hability` ADD CONSTRAINT `resume_hability_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resume_hability` ADD CONSTRAINT `resume_hability_fk1` FOREIGN KEY (`id_hability`) REFERENCES `hability`(`id_hability`);

ALTER TABLE `resume_sholarities` ADD CONSTRAINT `resume_sholarities_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resume_sholarities` ADD CONSTRAINT `resume_sholarities_fk1` FOREIGN KEY (`id_scholarity`) REFERENCES `scholarities`(`id_scholarity`);

ALTER TABLE `resume_work_experiences` ADD CONSTRAINT `resume_work_experiences_fk0` FOREIGN KEY (`id_resume`) REFERENCES `resumes`(`id_resume`);

ALTER TABLE `resume_work_experiences` ADD CONSTRAINT `resume_work_experiences_fk1` FOREIGN KEY (`id_work_experiences`) REFERENCES `work_experiences`(`id_work_experiences`);

ALTER TABLE `faq` ADD CONSTRAINT `fq_fk01` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `faq` ADD CONSTRAINT `faq_fk02` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `selective_process` ADD CONSTRAINT `selective_process_fk01`  FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `selective_process` ADD CONSTRAINT `selective_process_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk01` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `favorite_vacancy` ADD CONSTRAINT `favorite_vacancy_fk02` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk01` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk02` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies`(`id_vacancy`);

ALTER TABLE `integration` ADD CONSTRAINT `intregration_fk03` FOREIGN KEY (`id_company`) REFERENCES `companies`(`id_company`);

ALTER TABLE `courses` ADD CONSTRAINT `courses_fk0` FOREIGN KEY (`id_class`) REFERENCES `class`(`id_class`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk0` FOREIGN KEY (`id_course`) REFERENCES `courses`(`id_course`);

ALTER TABLE `users_courses` ADD CONSTRAINT `users_courses_fk1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`);
