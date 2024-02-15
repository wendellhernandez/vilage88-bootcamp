CREATE DATABASE leaves_db;

USE leaves_db;

CREATE TABLE `leaves` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `employee_name` varchar(255)  NOT NULL ,
    `request_date` date  NOT NULL,
    `from_date` date  NOT NULL,
    `to_date` date  NOT NULL,
    `leave_type` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `leaves` (employee_name , request_date , from_date , to_date , leave_type) 
VALUES 
('Alice Johnson' , '2024-01-28' , '2024-02-01' , '2024-02-03' , 'Vacation') ,
('Kristin Hunter' , '2024-02-01' , '2024-02-04' , '2024-02-06' , 'Sick Leave') ,
('Marian snyder' , '2024-02-02' , '2024-02-05' , '2024-02-07' , 'Unpaid Leave') ,
('Mtacy wade' , '2024-02-03' , '2024-02-06' , '2024-02-08' , 'Paid Leave') ,
('Scarlett Payne' , '2024-02-04' , '2024-02-07' , '2024-02-08' , 'Half Day Unpaid') ,
('Alexa Barnes' , '2024-02-05' , '2024-02-08' , '2024-02-10' , 'Vacation') ,
('Sean Cruz' , '2024-02-06' , '2024-02-09' , '2024-02-11' , 'Sick Leave') ,
('Thomas Bennett' , '2024-02-07' , '2024-02-10' , '2024-02-12' , 'Unpaid Leave') ,
('Thomas Bennett' , '2024-02-08' , '2024-02-11' , '2024-02-13' , 'Paid Leave') ,
('Carolyn Horton' , '2024-02-09' , '2024-02-12' , '2024-02-14' , 'Half Day Unpaid') ,
('Jimmy Medina' , '2024-02-10' , '2024-02-13' , '2024-02-15' , 'Vacation') ,
('Mthan foster' , '2024-02-11' , '2024-02-14' , '2024-02-16' , 'Vacation') ,
('Lena ward' , '2024-02-12' , '2024-02-15' , '2024-02-17' , 'Paid Leave') ,
('Vincent garcia' , '2024-02-15' , '2024-02-18' , '2024-02-20' , 'Paid Leave') ,
('Troy White' , '2024-02-18' , '2024-02-21' , '2024-02-23' , 'Paid Leave') ,
('Edward Coleman' , '2024-02-21' , '2024-02-24' , '2024-02-26' , 'Vacation') ,
('Pedro Pierce' , '2024-02-25' , '2024-02-28' , '2024-02-29' , 'Sick Leave')





SELECT date_format(request_date , '%m-%d-%Y') FROM `leaves`