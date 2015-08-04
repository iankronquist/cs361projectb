DROP TABLE IF EXISTS supply;

CREATE TABLE supply (
	location varchar(255) NOT NULL,
	days_plasma int,
	days_platelets int, 
	days_whole int,		
	PRIMARY KEY (location)
)ENGINE=InnoDB;