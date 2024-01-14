-- TASK 1
USE lead_gen_business;

SELECT domain_name AS website, client_id
FROM sites
WHERE client_id = 15;

-- TASK 2
USE lead_gen_business;

SELECT concat(monthname(created_datetime) , '-' , year(created_datetime)) AS month_and_year, count(*) AS total_count
FROM sites
WHERE concat(monthname(created_datetime) , '-' , year(created_datetime)) = 'June-2011'
GROUP BY concat(monthname(created_datetime) , '-' , year(created_datetime));

-- TASK 3
USE lead_gen_business;

SELECT concat(day(charged_datetime), '-' , monthname(charged_datetime) , '-' , year(charged_datetime)) AS date, sum(amount) AS revenue
FROM billing
WHERE concat(day(charged_datetime), '-' , monthname(charged_datetime) , '-' , year(charged_datetime)) = '19-November-2012';

-- TASK 4
USE lead_gen_business;

SELECT client_id
 ,concat(monthname(charged_datetime) , '-' , year(charged_datetime)) AS month_and_year, sum(amount) AS total_revenue
FROM billing
WHERE client_id = 1
GROUP BY concat(monthname(charged_datetime) , '-' , year(charged_datetime))
ORDER BY concat(monthname(charged_datetime) , '-' , year(charged_datetime));

-- TASK 5
USE lead_gen_business;

SELECT concat(clients.first_name , ' ' , clients.last_name) AS client_name, concat(monthname(charged_datetime) , '-' , year(charged_datetime)) AS month_and_year, sum(amount) AS total_revenue
FROM billing
LEFT JOIN clients
ON clients.client_id = billing.client_id
GROUP BY concat(clients.first_name , ' ' , clients.last_name) , concat(monthname(charged_datetime) , '-' , year(charged_datetime))
ORDER BY clients.client_id;

-- TASK 6
USE lead_gen_business;

SELECT domain_name AS website, count(*) AS leads
FROM leads
LEFT JOIN sites
ON leads.site_id = sites.site_id
WHERE registered_datetime >= '2011-03-15' AND registered_datetime <= '2011-04-15'
GROUP BY domain_name;

-- TASK 7
USE lead_gen_business;

SELECT concat(clients.first_name , ' ' , clients.last_name) AS client_name, domain_name, count(*) AS num_leads
FROM leads
LEFT JOIN sites
ON leads.site_id = sites.site_id
LEFT JOIN clients
ON clients.client_id = sites.client_id
GROUP BY domain_name , concat(clients.first_name , ' ' , clients.last_name)
ORDER BY concat(clients.first_name , ' ' , clients.last_name);

-- TASK 8
USE lead_gen_business;

SELECT concat(clients.first_name , ' ' , clients.last_name) AS client, count(domain_name) AS num_leads
FROM leads
LEFT JOIN sites
ON leads.site_id = sites.site_id
LEFT JOIN clients
ON clients.client_id = sites.client_id
WHERE year(registered_datetime) = 2012
GROUP BY concat(clients.first_name , ' ' , clients.last_name),year(registered_datetime)
ORDER BY count(domain_name) DESC;

-- TASK 9
USE lead_gen_business;

SELECT concat(clients.first_name , ' ' , clients.last_name) AS client, count(domain_name) AS num_leads, monthname(registered_datetime) AS month
FROM leads
LEFT JOIN sites
ON leads.site_id = sites.site_id
LEFT JOIN clients
ON clients.client_id = sites.client_id
WHERE year(registered_datetime) = 2012 AND month(registered_datetime) < 7
GROUP BY concat(clients.first_name , ' ' , clients.last_name),year(registered_datetime) , monthname(registered_datetime)
ORDER BY month(registered_datetime);

-- TASK 10
USE lead_gen_business;

SELECT concat(clients.first_name , ' ' , clients.last_name) AS client, count(domain_name) AS number_of_sites, GROUP_CONCAT(domain_name) AS sites
FROM clients
LEFT JOIN sites
ON clients.client_id = sites.client_id
GROUP BY concat(clients.first_name , ' ' , clients.last_name)
ORDER BY count(domain_name) DESC;