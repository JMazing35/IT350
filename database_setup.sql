CREATE TABLE customer (
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(255),
	street VARCHAR(255),
	city VARCHAR(255),
	state VARCHAR(255),
	zip INT(9),
	phone INT(20),
	email VARCHAR(255),
	password VARCHAR(255),
	newsletter BOOLEAN,
	registration_date TIMESTAMP,
);




CREATE TABLE product (
	serial_number VARCHAR(255),
	price DECIMAL(7,2),
);