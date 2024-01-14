-- PART 1 --

-- TASK 1
USE world;

SELECT Continent, count(*) AS total_countries, max(LifeExpectancy) AS LifeExpectancy
FROM country
WHERE LifeExpectancy > 70
GROUP BY Continent;

-- TASK 2
USE world;

SELECT Continent, count(*) AS total_countries, max(LifeExpectancy) AS LifeExpectancy
FROM country
WHERE LifeExpectancy BETWEEN 60 AND 70
GROUP BY Continent;

-- TASK 3
USE world;

SELECT Name AS country, LifeExpectancy
FROM country
WHERE LifeExpectancy > 75;

-- TASK 4
USE world;

SELECT Name AS country, LifeExpectancy
FROM country
WHERE LifeExpectancy < 40;

-- TASK 5
USE world;

SELECT Name AS country, Population
FROM country
ORDER BY Population DESC
LIMIT 10;

-- TASK 6
USE world;

SELECT sum(Population) AS total_population
FROM country;

-- TASK 7
USE world;

SELECT Continent, sum(Population) AS total_population
FROM country
GROUP BY Continent
HAVING sum(Population) > 500000000;

-- TASK 8
USE world;

SELECT Continent, count(*) AS total_countries, sum(Population) AS total_population, avg(LifeExpectancy) AS LifeExpectancy
FROM country
GROUP BY Continent
HAVING avg(LifeExpectancy) < 71;

-- PART 2 --

-- TASK 1
USE world;

SELECT country.Name AS country, count(country.Name) as number_of_cities
FROM country
LEFT JOIN city
ON country.Code = city.CountryCode
GROUP BY country.Name;

-- TASK 2
USE world;

SELECT Language, count(Language) AS number_of_countries
FROM country
LEFT JOIN countrylanguage
ON country.Code = countrylanguage.CountryCode
GROUP BY Language;

-- TASK 3
USE world;

SELECT Language, count(Language) AS number_of_countries, isOfficial
FROM country
LEFT JOIN countrylanguage
ON country.Code = countrylanguage.CountryCode
WHERE isOfficial = 'T'
GROUP BY Language;

-- TASK 4
USE world;

SELECT Continent, count(*) as number_of_cities, avg(city.Population) as average_cities_population
FROM country
LEFT JOIN city
ON country.Code = city.CountryCode
GROUP BY Continent;

-- TASK 5
USE world;

SELECT Language, sum(DISTINCT Population) as total_population
FROM country
LEFT JOIN countrylanguage
ON country.Code = countrylanguage.CountryCode
WHERE isOfficial = 'T'
GROUP BY Language
ORDER BY sum(Population) DESC;