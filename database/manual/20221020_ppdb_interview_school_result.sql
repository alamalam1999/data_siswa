ALTER TABLE `ppdb_interviews` ADD `school_recomendation_result` INT NOT NULL DEFAULT '0' AFTER `ppdb_id`, ADD `is_submited` INT NOT NULL DEFAULT '0' AFTER `school_recomendation_result`;

ALTER TABLE `ppdb_interviews` ADD `school_recomendation_file` TEXT NULL AFTER `school_recomendation_result`, ADD `school_recomendation_note` TEXT NULL AFTER `school_recomendation_file`;