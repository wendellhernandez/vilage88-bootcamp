CREATE DATABASE student_masterlist_db;

USE student_masterlist_db;

CREATE TABLE `students` (
    `id` int AUTO_INCREMENT ,
    `first_name` varchar(255)  ,
    `last_name` varchar(255)  ,
    `gender` varchar(255)  ,
    `created_at` datetime,
    `updated_at` datetime,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `students` (first_name , last_name , gender) 
VALUES 
("Morris" , "Spencer" , "Male") ,
("Andrew" , "Oliver" , "Male") , 
("Melissa" , "Chambers" , "Female") , 
("Marsha" , "Ford" , "Female") , 
("Irene" , "Hayes" , "Female") ,
("Clyde" , "Henderson" , "Male")