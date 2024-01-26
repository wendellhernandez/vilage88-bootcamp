CREATE DATABASE bulletin_board_db;

USE bulletin_board_db;

CREATE TABLE `announcements` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `subject` varchar(30)  NOT NULL ,
    `details` varchar(250)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);