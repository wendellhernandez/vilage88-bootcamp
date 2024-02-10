CREATE DATABASE student_masterlist_db;

USE student_masterlist_db;

CREATE TABLE `students` (
    `id` int AUTO_INCREMENT  NOT NULL,
    `first_name` varchar(255)  NOT NULL,
    `last_name` varchar(255)  NOT NULL,
    `gender` varchar(255)  NOT NULL,
    `created_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP,
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