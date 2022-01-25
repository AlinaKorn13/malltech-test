CREATE TABLE `customers` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT NULL,
    `gender` INT(11) NOT NULL COMMENT '0 – пол не указан, 1 - юноша, 2 - девушка.',
    `birth_date` INT(11) NOT NULL COMMENT 'День рождения в Unix Time Stamp.',
    PRIMARY KEY (`id`));

CREATE TABLE `books` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(11) NOT NULL,
    `title` VARCHAR(255) DEFAULT NULL,
    CONSTRAINT books_customers_fk
    FOREIGN KEY (`customer_id`)  REFERENCES `customers` (`id`),
    PRIMARY KEY (`id`));

ALTER TABLE `books` ADD INDEX(`customer_id`);

SELECT COUNT(`books`.id) as booksCount, `customers`.name FROM `books`
LEFT JOIN `customers` ON `customers`.id = `books`.customer_id
WHERE `customers`.gender = 1
AND (TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(`customers`.birth_date), NOW()) >= 15 AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(`customers`.birth_date), NOW()) <= 20)
GROUP BY `customers`.name