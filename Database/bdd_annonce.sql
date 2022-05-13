CREATE DATABASE wf3_php_intermediaire_theo_leben;

USE wf3_php_intermediaire_theo_leben;

CREATE TABLE advert(

    id INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(25) NOT NULL,
    description VARCHAR(25) NOT NULL,
    postal_code int(5) UNSIGNED ZEROFILL NOT NULL,
    city VARCHAR(25) NOT NULL,
    type ENUM('location', 'vente') NOT NULL,
    price INT(9) NOT NULL,
    reservation_message TEXT DEFAULT NULL

)ENGINE=InnoDB charset=UTF8;
