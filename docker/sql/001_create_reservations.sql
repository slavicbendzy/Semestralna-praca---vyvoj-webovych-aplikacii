CREATE TABLE IF NOT EXISTS `reservations` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `customer_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `event_date` DATE NOT NULL,
    `guest_count` INT UNSIGNED NOT NULL,
    `package_name` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
