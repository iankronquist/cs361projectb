DROP TABLE IF EXIST donations;

CREATE TABLE donations (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    date_given date,
    location varchar(255),
    blood_type varchar(255),
    donation_type varchar(255),
    amount int

    UNIQUE (id),
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES p2_users(id)
)ENGINE=InnoDB;

CREATE TABLE users_to_donations (
    donation_id int NOT NULL,
    user_id int NOT NULL,

    FOREIGN KEY (user_id) REFERENCES p2_users(id),
    FOREIGN KEY (donation_id) REFERENCES donations(id)
)ENGINE=InnoDB;


