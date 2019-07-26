ALTER TABLE `applications` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `applied_streams` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `applied_subjects` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `students` CHANGE `uuid` `uuid` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


INSERT INTO `courses` (`id`, `uuid`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, NULL, 'POST GRADUATE', NULL, '2019-07-22 18:30:00', '2019-07-22 18:30:00');

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'MA', '1', 'MA', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'M.SC', '1', 'M.SC', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', 'MCOM', '1', 'MCOM', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');

INSERT INTO `semesters` (`id`, `uuid`, `course_id`, `name`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '3', '1st Semeseter', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');

INSERT INTO `subjects` (`id`, `uuid`, `stream_id`, `name`, `subject_no`, `is_compulsory`, `is_major`, `has_practical`, `abbreviation`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, NULL, '11', 'Geography', '1', '0', '1', '1', 'GEOG', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');

INSERT INTO `reservations` (`id`, `course_id`, `stream_id`, `major_id`, `category_id`, `seat`, `deleted_at`, `created_at`, `updated_at`)
VALUES (NULL, '1', '11', '268', '2', '1', NULL, '2019-07-23 00:00:00', '2019-07-23 00:00:00');
