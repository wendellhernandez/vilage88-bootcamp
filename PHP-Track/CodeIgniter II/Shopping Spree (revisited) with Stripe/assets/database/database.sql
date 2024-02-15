CREATE DATABASE shoppingspree_db;

USE shoppingspree_db;

CREATE TABLE `products` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(255)  NOT NULL ,
    `price` int  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `cart` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `product_id` int  NOT NULL ,
    `quantity` int  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `products` (name , price) VALUES ("Macbook" , 300);
INSERT INTO `products` (name , price) VALUES ("iPhone" , 100);
INSERT INTO `products` (name , price) VALUES ("iPad" , 200);