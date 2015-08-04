DROP TABLE IF EXISTS bloodDB;

CREATE TABLE bloodDB (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    state varchar(255) UNIQUE,
    blood_type_A int,
    blood_type_B int,
    blood_type_AB int,
    blood_type_O int,
    
    wholeblood int,
    platelets int,
    drbloodcells int,
    plasma int,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO bloodDB (state, blood_type_A, blood_type_B, blood_type_AB, blood_type_O, wholeblood, platelets, drbloodcells, plasma)
VALUES  ("NY", 500, 500, 500, 500, 600, 500, 300, 500), 
        ("MD", 300, 200, 500, 300, 600, 300, 500, 200),
        ("CA", 500, 500, 200, 500, 600, 500, 300, 500),
        ("VA", 300, 500, 500, 300, 200, 600, 500, 200),
        ("DC", 500, 300, 500, 500, 200, 500, 300, 600)
        

