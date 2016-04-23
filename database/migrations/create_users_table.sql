CREATE DATABASE IF NOT EXISTS cs631;

CREATE TABLE IF NOT EXISTS users (
	id int NOT NULL auto_increment,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY (id)
);
