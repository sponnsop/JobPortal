-- Run this in phpMyAdmin → SQL tab
-- Adds profile fields needed for profile management

-- Users table: add avatar and full_name if not already there
ALTER TABLE `users`
    ADD COLUMN IF NOT EXISTS `full_name` VARCHAR(150) DEFAULT NULL AFTER `email`,
    ADD COLUMN IF NOT EXISTS `avatar` VARCHAR(255) DEFAULT NULL AFTER `full_name`;

-- Job seeker profiles: add skills, experience, education
ALTER TABLE `job_seeker_profiles`
    ADD COLUMN IF NOT EXISTS `skills`     TEXT DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `experience` TEXT DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `education`  TEXT DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `bio`        TEXT DEFAULT NULL;

-- Employer profiles: add description if not already there
ALTER TABLE `employer_profiles`
    ADD COLUMN IF NOT EXISTS `description` TEXT DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `website`     VARCHAR(255) DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `industry`    VARCHAR(100) DEFAULT NULL,
    ADD COLUMN IF NOT EXISTS `company_size` VARCHAR(20) DEFAULT NULL;
