DROP TABLE IF EXISTS supply;

CREATE TABLE supply (
	location varchar(255) NOT NULL,
	days_plasma int,
	days_platelets int, 
	days_whole int,		
	PRIMARY KEY (location)
)ENGINE=InnoDB;

INSERT INTO supply VALUES ('California', 5,5,5), ('Oregon', 6,6,6);