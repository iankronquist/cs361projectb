DROP TABLE IF EXISTS blooddb;

CREATE TABLE blooddb (
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

INSERT INTO blooddb (state, blood_type_A, blood_type_B, blood_type_AB, blood_type_O, wholeblood, platelets, drbloodcells, plasma)
VALUES  ("NY", 5, 5, 5, 5, 6, 5, 3, 5), 
        ("MD", 3, 2, 5, 3, 6, 3, 5, 2),
        ("CA", 5, 5, 2, 5, 6, 5, 3, 5),
        ("VA", 3, 5, 5, 3, 2, 6, 5, 2),
        ("DC", 5, 3, 5, 5, 2, 5, 3, 6)
        

