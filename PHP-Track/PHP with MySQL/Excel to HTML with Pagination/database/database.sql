CREATE DATABASE excel_to_html_db;

USE excel_to_html_db;

CREATE TABLE `library` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `uploader` varchar(50)  NOT NULL ,
    `file` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);