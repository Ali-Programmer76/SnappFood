CREATE TABLE `products` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL,
    `price` BIGINT NOT NULL,
    `description` TEXT,
    `image` VARCHAR(200),
    PRIMARY KEY (id)
);


CREATE TABLE `blogs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL,
    `content` TEXT,
    `tags` TEXT,
    `image` VARCHAR(200),
    `bg` VARCHAR(200),
    PRIMARY KEY (id)
);


CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(200) NOT NULL,
    `password` VARCHAR(40) NOT NULL,
    `firstname` VARCHAR(200) NOT NULL,
    `lastname` VARCHAR(200) NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    UNIQUE (username),
    PRIMARY KEY (id)
);


INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`, `type`)
VALUES ('admin', 'admin', 'Ali', 'Hosseini', 'admin');


CREATE TABLE `orders` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `address` TEXT,
    `date` DATETIME,
    `total` BIGINT,
    `payed` BOOLEAN DEFAULT 0,
    PRIMARY KEY (id)
);


CREATE TABLE `items` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) NOT NULL,
    `product_id` INT(11) NOT NULL,
    `amount` BIGINT NOT NULL,
    `count` INT(11) DEFAULT 1,
    PRIMARY KEY (id)
);


ALTER TABLE `orders`
ADD COLUMN `system_trace_no` VARCHAR(255) AFTER `payed`,
ADD COLUMN `retrival_ref_no` VARCHAR(255) AFTER `system_trace_no`;
