-- Create table
CREATE TABLE public.customers (
	id int4 NULL,
	first_name varchar(50) NULL,
	last_name varchar(50) NULL,
	email varchar(50) NULL,
	gender varchar(50) NULL,
	ip_address varchar(50) NULL,
	company varchar(50) NULL,
	city varchar(50) NULL,
	title varchar(50) NULL,
	website varchar(2048) NULL
);


-- Import CSV file
COPY public.customers(id, first_name, last_name, email, gender, ip_address, company, city, title, website)
FROM '/docker-entrypoint-initdb.d/customers.csv'
DELIMITER ','
CSV HEADER;