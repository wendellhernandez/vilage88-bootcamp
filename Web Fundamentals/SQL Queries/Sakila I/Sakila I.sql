USE sakila;

-- TASK 1
SELECT * 
FROM customer 
WHERE customer_id = 20;

-- TASK 2
SELECT * 
FROM customer 
WHERE customer_id BETWEEN 20 AND 60;

-- TASK 3
SELECT * 
FROM customer 
WHERE first_name LIKE 'L%';

-- TASK 4
SELECT * 
FROM customer 
WHERE first_name LIKE '%L%';

-- TASK 5
SELECT * 
FROM customer 
WHERE first_name LIKE '%L';

-- TASK 6
SELECT * 
FROM customer 
WHERE last_name LIKE 'C%' 
ORDER BY create_date;

-- TASK 7
SELECT * 
FROM customer 
WHERE last_name LIKE '%NN%' 
ORDER BY create_date DESC 
LIMIT 5;

-- TASK 8
SELECT customer_id, first_name, last_name, email 
FROM customer 
WHERE customer_id IN (515, 181, 582, 503, 29, 85);

-- TASK 9
SELECT first_name, last_name, email as email_address, store_id 
FROM customer 
WHERE store_id = 2;

-- TASK 10
SELECT first_name, last_name, email 
FROM customer 
ORDER BY email DESC;

-- TASK 11
SELECT customer_id, first_name, last_name, email 
FROM customer 
WHERE active = 1 AND create_date LIKE '%-02-%';

-- TASK 12
SELECT email, LENGTH(email) as email_length 
FROM customer 
ORDER BY email_length DESC, email;

-- TASK 13
SELECT email, LENGTH(email) as email_length 
FROM customer 
ORDER BY email_length 
LIMIT 100;