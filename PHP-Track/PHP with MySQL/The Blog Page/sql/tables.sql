CREATE DATABASE the_blog_page_db;

USE the_blog_page_db;

CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `first_name` varchar(45)  NOT NULL ,
    `last_name` varchar(45)  NOT NULL ,
    `email` varchar(45)  NOT NULL ,
    `pwd` varchar(45)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `reviews` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `user_id` int  NOT NULL ,
    `content` text  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `replies` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `review_id` int  NOT NULL ,
    `user_id` int  NOT NULL ,
    `content` text  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

ALTER TABLE `reviews` ADD CONSTRAINT `fk_reviews_user_id` FOREIGN KEY(`user_id`)
REFERENCES `users` (`id`);

ALTER TABLE `replies` ADD CONSTRAINT `fk_replies_review_id` FOREIGN KEY(`review_id`)
REFERENCES `reviews` (`id`);

ALTER TABLE `replies` ADD CONSTRAINT `fk_replies_user_id` FOREIGN KEY(`user_id`)
REFERENCES `users` (`id`);