ALTER TABLE `portal_e_project`.`t_user`
  DROP COLUMN `firstname`, 
  CHANGE `lastname` `full_name` VARCHAR(255) CHARSET utf8 COLLATE utf8_unicode_ci NULL,
  ADD COLUMN `phone` VARCHAR(255) NULL AFTER `DOB`;