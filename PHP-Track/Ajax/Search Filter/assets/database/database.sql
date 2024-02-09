CREATE DATABASE search_filter_db;

USE search_filter_db;

CREATE TABLE `items` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(255)  NOT NULL ,
    `stock` int  NOT NULL ,
    `price` float  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `items` (name , stock , price) 
VALUES 
("Cup" , 120 , 1) , 
("Dress" , 55 , 3) , 
("Shoes" , 15 , 5) , 
("Shorts" , 200 , 2.5) , 
("T-shirt" , 1000 , 2) , 
("Mug" , 1001 , 3) , 
("Pen" , 300 , 1)