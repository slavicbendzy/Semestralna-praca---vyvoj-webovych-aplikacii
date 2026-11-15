CREATE TABLE IF NOT EXISTS `reservation_services` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `reservation_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_reservation_services_reservation_id` (`reservation_id`),
    CONSTRAINT `fk_reservation_services_reservation`
        FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
