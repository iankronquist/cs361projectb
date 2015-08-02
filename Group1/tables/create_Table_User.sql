
DROP TABLE IF EXISTS p2_users;

CREATE TABLE p2_users (
    id int NOT NULL AUTO_INCREMENT UNIQUE,
    username varchar(255) UNIQUE,
    password varchar(255),
    fname varchar(255),
    lname varchar(255),

    age int,
    sex varchar(255),
    height int,
    weight int,
    location varchar(255),

    last_plasma date,
    last_platelets date,
    last_drbloodcells date,
    last_wholeblood date,

    last_login date,


    count_plasma int,
    count_platelets int,
    count_drbloodcells int,
    count_wholeblood int,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO p2_users VALUES(2, "gopher","gopher","gopher","gopher",5,"gopher",5,5,"California", "2006-02-15", "2006-02-15", "2006-02-15", "2006-02-15", "2006-02-15",1,1,1,1);