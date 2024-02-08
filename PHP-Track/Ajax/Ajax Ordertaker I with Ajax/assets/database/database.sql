CREATE DATABASE ajax_ordertaker_1_db;

USE ajax_ordertaker_1_db;

CREATE TABLE `orders` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `order` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);