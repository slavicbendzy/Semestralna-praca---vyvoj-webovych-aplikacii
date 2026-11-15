CREATE TABLE IF NOT EXISTS `photos` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `album_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `file_path` VARCHAR(500) NOT NULL,
    `position` INT UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_photos_album`
        FOREIGN KEY (`album_id`) REFERENCES `photo_albums` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
