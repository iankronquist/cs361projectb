DROP TABLE IF EXISTS donations;

CREATE TABLE donations (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    date_given date,
    location varchar(255),
    blood_type varchar(255),
    donation_type varchar(255),
    amount int,
    used bool,
    date_used date,

    UNIQUE (id),
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES p2_users(id)
)ENGINE=InnoDB;
