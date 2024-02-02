CREATE DATABASE sports_players_db;

USE sports_players_db;

CREATE TABLE `players` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(255)  NOT NULL ,
    `gender` varchar(255)  NOT NULL ,
    `image` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `player_sports` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `player_id` int AUTO_INCREMENT NOT NULL ,
    `sport_id` int AUTO_INCREMENT NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `sports` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `players` (name , gender , image) 
VALUES 
("Morris Spencer" , "Male" , "https://randomuser.me/api/portraits/men/1.jpg") , 
("Andrew Oliver" , "Male" , "https://randomuser.me/api/portraits/men/2.jpg") , 
("Melissa Chambers" , "Female" , "https://randomuser.me/api/portraits/women/1.jpg") , 
("Marsha Ford" , "Female" , "https://randomuser.me/api/portraits/women/2.jpg") , 
("Irene Hayes" , "Female" , "https://randomuser.me/api/portraits/women/3.jpg") ,
("Clyde Henderson" , "Male" , "https://randomuser.me/api/portraits/men/3.jpg") , 
("Alice Jackson" , "Female" , "https://randomuser.me/api/portraits/women/4.jpg") ,
("Melinda Fowler" , "Female" , "https://randomuser.me/api/portraits/women/5.jpg") ,
("Troy Freeman" , "Male" , "https://randomuser.me/api/portraits/men/4.jpg") , 
("Bella Tucker" , "Female" , "https://randomuser.me/api/portraits/women/6.jpg") ,
("Christina Perry" , "Female" , "https://randomuser.me/api/portraits/women/7.jpg") ,
("Tina Johnson" , "Female" , "https://randomuser.me/api/portraits/women/8.jpg") ,
("Vincent Nelson" , "Male" , "https://randomuser.me/api/portraits/men/5.jpg") , 
("Danielle Gilbert" , "Female" , "https://randomuser.me/api/portraits/women/9.jpg") ,
("Cameron Soto" , "Male" , "https://randomuser.me/api/portraits/men/6.jpg") , 
("Cherly Graves" , "Female" , "https://randomuser.me/api/portraits/women/10.jpg") ,
("Jose Wells" , "Male" , "https://randomuser.me/api/portraits/men/7.jpg") , 
("Tracy Johnson" , "Female" , "https://randomuser.me/api/portraits/women/11.jpg") ,
("Wade Banks" , "Male" , "https://randomuser.me/api/portraits/men/8.jpg") , 
("Arthur Johnson" , "Male" , "https://randomuser.me/api/portraits/men/9.jpg")

INSERT INTO `player_sports` (player_id , sport_id) 
VALUES 
(1 , 1) , (1 , 4) , (1 , 5) ,
(2 , 1) , (2 , 2) , (2 , 3) ,
(3 , 2) , (3 , 4) ,


INSERT INTO `sports` (name) 
VALUES ("Basketball") , ("Volleyball") , ("Baseball") , ("Soccer") , ("Football");