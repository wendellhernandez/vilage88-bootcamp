CREATE DATABASE raffle_db;

USE raffle_db;

CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `contact_number` varchar(11)  NOT NULL ,
    `first_name` varchar(11)  NOT NULL ,
    `last_name` varchar(50)  NOT NULL ,
    `profile_image` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);