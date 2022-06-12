CREATE TABLE `page` (
    `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `page_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `page_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `page_content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Page content',
    `page_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: disabled, 1: draft, 2: published',
    PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
