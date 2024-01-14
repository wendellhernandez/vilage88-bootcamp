-- TASK 1
USE world;

SELECT * FROM country WHERE continent = 'Europe';

-- TASK 2
USE world;

SELECT * FROM country WHERE continent IN('North America' , 'Africa');

-- TASK 3
USE world;

SELECT country.Code AS country_code, country.Name AS country_name, Continent, country.Population AS country_population, city.Name AS city 
FROM country 
LEFT JOIN city
ON country.Code = city.CountryCode
WHERE country.Population > 100000000;

-- TASK 4
USE world;

SELECT Name AS country, Language
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE Language = 'Spanish';

-- TASK 5
USE world;

SELECT Name AS country, Language, isOfficial
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE Language = 'Spanish' AND isOfficial = 'T';

-- TASK 6
USE world;

SELECT Name AS country, Language
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE (Language = 'Spanish' OR Language = 'English') AND isOfficial = 'T';

-- TASK 7
USE world;

SELECT Name AS country, Language, Percentage, isOfficial
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE Language = 'Arabic' AND Percentage > 30 AND isOfficial = 'F';

-- TASK 8
USE world;

SELECT Name AS country, Language, Percentage, isOfficial
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE Language = 'French' AND Percentage < 50 AND isOfficial = 'T';

-- TASK 9
USE world;

SELECT Name AS country, Language, isOfficial
FROM country 
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE isOfficial = 'T'
ORDER BY Language;

-- TASK 10
USE world;

SELECT country.Name AS country, city.Name AS city, Language, isOfficial
FROM country 
LEFT JOIN city
ON country.Code = city.CountryCode
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE isOfficial = 'T'
ORDER BY city.Population DESC
LIMIT 100;

-- TASK 11
USE world;

SELECT country.Name AS country, LifeExpectancy, city.Name AS city, city.Population AS population
FROM country 
LEFT JOIN city
ON country.Code = city.CountryCode
WHERE LifeExpectancy < 40
ORDER BY city.Population DESC
LIMIT 100;

-- TASK 12
USE world;

SELECT country.Name AS country, city.Name AS city, LifeExpectancy
FROM country 
LEFT JOIN city
ON country.Code = city.CountryCode
LEFT JOIN countryLanguage
ON country.Code = countryLanguage.CountryCode
WHERE Language = 'English'
ORDER BY LifeExpectancy DESC
LIMIT 100;