-- PART 1

-- TASK 1
USE sakila;

SELECT country, count(customer_id) AS total_number_of_customer
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
GROUP BY country
ORDER BY country;

-- TASK 2
USE sakila;

SELECT city, count(customer_id) AS total_number_of_customer
FROM customer
LEFT JOIN address
ON customer.address_id = address.address_id
LEFT JOIN city
ON address.city_id = city.city_id
LEFT JOIN country
ON city.country_id = country.country_id
GROUP BY city
ORDER BY city;

-- PART 2

-- TASK 1
USE sakila;

SELECT concat(monthname(payment_date) , '-' , year(payment_date)) AS month_and_year, sum(amount) AS totat_rental_amount, count(*) AS total_transactions, avg(amount) AS average_rental_amount
FROM customer
LEFT JOIN payment
ON customer.customer_id = payment.customer_id
GROUP BY concat(monthname(payment_date) , '-' , year(payment_date));

-- TASK 2
USE sakila;

SELECT date_format(payment_date, '%h %p') AS hour_of_the_day, sum(amount) AS total_payments_received
FROM customer
LEFT JOIN payment
ON customer.customer_id = payment.customer_id
GROUP BY hour(payment_date)
ORDER BY sum(amount) DESC
LIMIT 10;