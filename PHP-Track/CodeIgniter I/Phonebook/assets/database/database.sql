CREATE DATABASE phonebook_db;

USE phonebook_db;

CREATE TABLE `contacts` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(50)  NOT NULL ,
    `contact_number` varchar(11)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO `contacts` (`id`, `name`, `contact_number`, `created_at`, `updated_at`) VALUES ('1', 'Wendell', '09123456789', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `contacts` (`id`, `name`, `contact_number`, `created_at`, `updated_at`) VALUES ('2', 'Mam Karen', '09214365987', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);