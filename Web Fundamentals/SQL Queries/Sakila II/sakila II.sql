-- TASK 1
USE sakila;

SELECT * FROM customer;

-- TASK 2
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address 
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id;

-- TASK 3
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id;

-- TASK 4
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city, country
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
ORDER BY country;

-- TASK 5
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city, country
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE country = 'Bolivia';

-- TASK 6
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city, country
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE country IN('Bolivia' , 'Germany' , 'Greece');

-- TASK 7
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city, country
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city = 'Baku';

-- TASK 8
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, address, city, country
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city IN('Baku' , 'Beira' , 'Bergamo');

-- TASK 9
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, country, LENGTH(country) AS country_name_length
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE LENGTH(country) < 5
ORDER BY LENGTH(customer_name) DESC;

-- TASK 10
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, country, city, LENGTH(city) AS city_name_length
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE LENGTH(city) > 10
ORDER BY country;

-- TASK 11
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, city
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city LIKE '%ba%';

-- TASK 12
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, city, LENGTH(city) AS city_name_length
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE city LIKE '% %'
ORDER BY LENGTH(city) DESC;

-- TASK 13
USE sakila;

SELECT concat( first_name , ' ' , last_name ) AS customer_name, city, country, LENGTH(city) AS city_name_length, LENGTH(country) AS country_name_length 
FROM customer 
LEFT JOIN address 
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
WHERE LENGTH(country) > LENGTH(city);