CREATE DATABASE buyMyApple; #Might not be necessary

CREATE TABLE customer (
	customer_id INT (8) AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(255) NOT NULL,
	street VARCHAR(255) NOT NULL,
	city VARCHAR(255) NOT NULL,
	state VARCHAR(255) NOT NULL,
	zip INT(9) NOT NULL,
	phone VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	newsletter BOOLEAN default 0,
	registration_date TIMESTAMP,
);

CREATE TABLE order (
	order_number INT(8) AUTO_INCREMENT PRIMARY KEY,
	order_date TIMESTAMP,
	to_street VARCHAR(255) NOT NULL,
	to_city VARCHAR(255) NOT NULL,
	to_state VARCHAR(255) NOT NULL,
	to_zip VARCHAR(255) NOT NULL, 
	billed_cc_number INT(16) NOT NULL,
	billed_cc_expiration INT(4) NOT NULL, #0322 for example
	order_total DECIMAL (7,2) NOT NULL,
	FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE product (
	serial_number VARCHAR(255) PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	price DECIMAL(7,2) NOT NULL,
	color VARCHAR (20) NOT NULL, 
	decription VARCHAR (255) NOT NULL,
	ram VARCHAR (255) NOT NULL,
	storage VARCHAR (255) NOT NULL,
	sold BOOLEAN default 0,
	FOREIGN KEY (order_number) REFERENCES order(order_number)
);

CREATE TABLE watch (
	FOREiGN KEY (serial_number) REFERENCES product(serial_number),
	series VARCHAR(255) NOT NULL
);

CREATE TABLE phone (
	FOREiGN KEY (serial_number) REFERENCES product(serial_number),	
	model VARCHAR (255) NOT NULL
);

CREATE TABLE laptop (
	FOREiGN KEY (serial_number) REFERENCES product(serial_number),
	year INT(4) NOT NULL,
	version VARCHAR(255) NOT NULL
);

CREATE TABLE streaming_device (
	FOREiGN KEY (serial_number) REFERENCES product(serial_number),
	model VARCHAR (255) NOT NULL
);


CREATE TABLE employee (
	employee_id INT (8) AUTO_INCREMENT PRIMARY KEY,
	ssn INT(9),
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	street VARCHAR(255) NOT NULL,
	city VARCHAR(255) NOT NULL,
	state VARCHAR(255) NOT NULL,
	zip INT(9) NOT NULL,
	phone VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE department (
	department_id INT(8) AUTO_INCREMENT PRIMARY KEY,
	department_name VARCHAR(255) NOT NULL,
	FOREIGN KEY (manager_employee_id) REFERENCES employee(employee_id) 
);


INSERT INTO employee (ssn, first_name, last_name, street, city, state, zip, phone, email, password) 
VALUES (999999999, 'Kennadie', 'Brockbank', '87 N 900 E', 'American Fork', 'Utah', 84003, 8016649191, 'aaaaa', 'dddddd');


CREATE TABLE product (
	serial_number VARCHAR(30) PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	price DECIMAL(7,2) NOT NULL,
	color VARCHAR (20) NOT NULL, 
	description VARCHAR (255) NOT NULL,
	ram VARCHAR (255) NOT NULL,
	storage VARCHAR (255) NOT NULL,
	sold BOOLEAN default 0
);

INSERT INTO product (serial_number, name, price, color, description, ram, storage, sold) 
VALUES ('111111111111', 'iPhone X', 999.99, 'Black', 'Best iPhone EVER.', '2GB', '256GB', 0);


CREATE TABLE customer (
	customer_id INT (8) AUTO_INCREMENT PRIMARY KEY, 
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	street VARCHAR(255) NOT NULL,
	city VARCHAR(255) NOT NULL,
	state VARCHAR(255) NOT NULL,
	zip INT(9) NOT NULL,
	phone VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	newsletter BOOLEAN default 0,
	registration_date TIMESTAMP
);

INSERT INTO customer (first_name, last_name, street, city, state, zip, phone, email, password) 
VALUES ('Kennadie', 'Brockbank', '87 N 900 E', 'American Fork', 'Utah', 84003, 8016649191, 'yourfirstcustomer@gmail.com', 'aaaaa');
