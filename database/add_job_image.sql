-- Run this in phpMyAdmin → SQL tab
-- Adds job_image column to jobs table

ALTER TABLE `jobs` ADD COLUMN `job_image` VARCHAR(255) DEFAULT NULL AFTER `is_featured`;
