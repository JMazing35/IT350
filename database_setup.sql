CREATE TABLE customer (
	customer_id INT AUTO_INCREMENT PRIMARY KEY, 
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

CREATE TABLE order (
	order_number INT AUTO_INCREMENT PRIMARY KEY,
	order_date TIMESTAMP,
	to_street,
	to_city,
	to_state,
	to_zip,
	billed_cc_number,
	billed_cc_expiration,
	order_total,
	customer_id INT FOREIGN KEY,
);

CREATE TABLE product (
	serial_number VARCHAR(255) PRIMARY KEY,
	price DECIMAL(7,2),
	color,
	decription,
	image,
	ram,
	storage,
	sold,
	order_number FOREIGN KEY,
);

CREATE TABLE watch (
	serial_number VARCHAR(255) FOREiGN KEY,
	series,
);

CREATE TABLE phone (
	serial_number VARCHAR(255) FOREiGN KEY,	
	model,
);

CREATE TABLE laptop (
	serial_number VARCHAR(255) FOREiGN KEY,
	year,
	version,
);

CREATE TABLE streaming_device (
	serial_number VARCHAR(255) FOREiGN KEY,
	model,
);


