CREATE DATABASE add_course_db;

USE add_course_db;

CREATE TABLE `students` (
    `id` int AUTO_INCREMENT  NOT NULL,
    `course_id` int,
    `first_name` varchar(255)  NOT NULL,
    `last_name` varchar(255)  NOT NULL,
    `gender` varchar(255)  NOT NULL,
    `created_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `courses` (
    `id` int AUTO_INCREMENT  NOT NULL,
    `course_name` varchar(255)  NOT NULL,
    `created_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `courses` (course_name) 
VALUES 
("MS Chemical Engineering"),
("BS Information Technology"),
("BS Computer Science"),
("MS Computer Engineering"),
("BS Civil Engineering"),
("BS Mechanical Engineering"),
("MS Mathematics"),
("BS Electrical Engineering")