ALTER TABLE `applications` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `applied_streams` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `students` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

INSERT INTO `courses` (`id`, `uuid`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, NULL, 'POST GRADUATE', NULL, '2019-07-22 18:30:00', '2019-07-22 18:30:00');

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'MA', '1', 'MA', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00')

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'M.SC', '1', 'M.SC', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00')

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'MCOM', '1', 'MCOM', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00')

INSERT INTO `semesters` (`id`, `uuid`, `course_id`, `name`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', '1st Semeseter', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');
