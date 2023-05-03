ALTER TABLE `ppdb` ADD `medco_employee` VARCHAR(100) NULL AFTER `kia_book`, ADD `medco_employee_file` TEXT NULL AFTER `medco_employee`, ADD `ppdb_discount` VARCHAR(100) NULL AFTER `medco_employee_file`, ADD `studied_before` INT NOT NULL DEFAULT '0' AFTER `ppdb_discount`;
ALTER TABLE `ppdb` ADD `file_additional` TEXT NULL AFTER `kia_book`;


INSERT INTO `enum_data` (`enum_site`, `enum_group`, `enum_code`, `enum_order`, `enum_value`, `enum_label`, `created_at`, `updated_at`) 
VALUES
('*', 'DISCOUNT_GROUP', '', 0, 'GURU_KARYAWAN', 'Guru & Karyawan Sekolah Avicenna', NULL, NULL),
('*', 'DISCOUNT_GROUP', 'MEDCO_GROUP', 0, 'DIREKSI', 'Medco Group - Direksi', NULL, NULL),
('*', 'DISCOUNT_GROUP', 'MEDCO_GROUP', 0, 'MANAGER', 'Medco Group - Manager', NULL, NULL),
('*', 'DISCOUNT_GROUP', 'MEDCO_GROUP', 0, 'SUPERVISOR', 'Medco Group - Supervisor', NULL, NULL),
('*', 'DISCOUNT_GROUP', 'MEDCO_GROUP', 0, 'STAFF', 'Medco Group - Staff', NULL, NULL);
