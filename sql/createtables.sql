CREATE TABLE `php_database`.`users` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(200) NOT NULL ,
    `email` VARCHAR(200) NOT NULL ,
    `password` VARCHAR(200) NOT NULL ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
    
CREATE TABLE `php_database`.`images`( 
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(100) NOT NULL ,
    `title` VARCHAR(100) NOT NULL ,
    `image` VARCHAR(100) NOT NULL ,
    `description` VARCHAR(200) NOT NULL ,
    `vote` INT(11) NOT NULL ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
