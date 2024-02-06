CREATE DATABASE product_dashboard_db;

USE product_dashboard_db;

CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `email_address` varchar(255)  NOT NULL ,
    `first_name` varchar(255)  NOT NULL ,
    `last_name` varchar(255)  NOT NULL ,
    `password` varchar(255)  NOT NULL ,
    `user_level` int  NOT NULL DEFAULT 1 ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp ,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `products` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(255)  NOT NULL ,
    `description` text  NOT NULL ,
    `price` int  NOT NULL ,
    `inventory_count` int  NOT NULL ,
    `quantity_sold` int  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp ,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `reviews` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `product_id` int NOT NULL ,
    `user_id` int NOT NULL ,
    `review` text  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp ,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `replies` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `product_id` int NOT NULL ,
    `review_id` int NOT NULL ,
    `user_id` int NOT NULL ,
    `reply` text  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp ,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp ,
    PRIMARY KEY (
        `id`
    )
);