CREATE DATABASE bookmarks_db;

USE bookmarks_db;

CREATE TABLE `bookmarks` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(100)  NOT NULL ,
    `url` varchar(255)  NOT NULL ,
    `folder` varchar(50)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);