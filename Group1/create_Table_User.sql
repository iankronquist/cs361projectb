DROP TABLE IF EXISTS p2_users;

CREATE TABLE p2_users (
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255),
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
    UNIQUE (id),
    PRIMARY KEY (id)
)ENGINE=InnoDB;
