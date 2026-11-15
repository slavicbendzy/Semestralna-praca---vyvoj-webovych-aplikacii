CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(150) NOT NULL,
    `nickname` VARCHAR(80) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `phone` VARCHAR(40) NOT NULL DEFAULT '',
    `role` VARCHAR(30) NOT NULL DEFAULT 'customer',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `packages` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `max_guests` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `reviews` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `author_name` VARCHAR(150) NOT NULL,
    `rating` TINYINT UNSIGNED NOT NULL,
    `comment` TEXT NOT NULL,
    `review_date` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
