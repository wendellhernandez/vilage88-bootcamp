CREATE DATABASE authentication2_db;

USE authentication2_db;

CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `first_name` varchar(50)  NOT NULL ,
    `last_name` varchar(50)  NOT NULL ,
    `contact_number` varchar(11)  NOT NULL ,
    `password` varchar(255)  NOT NULL ,
    `last_failed_login` datetime,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);