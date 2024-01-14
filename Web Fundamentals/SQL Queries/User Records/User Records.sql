-- TASK 1
CREATE SCHEMA `hackerhero_practice` ;

CREATE TABLE `hackerhero_practice`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `encrypted_password` VARCHAR(255) NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

-- TASK 2
USE hackerhero_practice;

INSERT INTO users(first_name, last_name, email, encrypted_password) VALUES('wendell' , 'hernandez' , 'wendell@gmail.com', 'password');

INSERT INTO users(first_name, last_name, email, encrypted_password) VALUES('super' , 'man' , 'super@gmail.com', 'pass');

INSERT INTO users(first_name, last_name, email, encrypted_password) VALUES('iron' , 'guy' , 'iron@gmail.com', 'word');

-- TASK 3
USE hackerhero_practice;

UPDATE users SET first_name = 'spiderman' , updated_at = CURRENT_TIMESTAMP WHERE id = 1;

-- TASK 4
USE hackerhero_practice;

UPDATE users SET first_name = 'michael' , updated_at = CURRENT_TIMESTAMP WHERE last_name = 'Choi';

-- TASK 5
USE hackerhero_practice;

UPDATE users SET email = 'new@email' , updated_at = CURRENT_TIMESTAMP WHERE id IN(3, 5, 7, 12, 19);

-- TASK 6
USE hackerhero_practice;

DELETE FROM users WHERE id = 1;

-- TASK 7
USE hackerhero_practice;

DELETE FROM users;

-- TASK 8
USE hackerhero_practice;

DROP TABLE users;

-- TASK 9
USE hackerhero_practice;

ALTER TABLE users
RENAME COLUMN email TO email_address;

-- TASK 10
USE hackerhero_practice;

ALTER TABLE users
MODIFY COLUMN id BIGINT;

-- TASK 11
USE hackerhero_practice;

ALTER TABLE users
MODIFY COLUMN is_active BOOLEAN NOT NULL DEFAULT 0;