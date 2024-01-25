CREATE DATABASE authentication1_db;

USE authentication1_db;

CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `first_name` varchar(50)  NOT NULL ,
    `last_name` varchar(50)  NOT NULL ,
    `phone_number` varchar(11)  NOT NULL UNIQUE,
    `pwd` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);