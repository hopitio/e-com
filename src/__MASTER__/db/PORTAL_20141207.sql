ALTER TABLE `t_user`
  DROP COLUMN `firstname`, 
  CHANGE `lastname` `full_name` VARCHAR(255) CHARSET utf8 COLLATE utf8_unicode_ci NULL,
  ADD COLUMN `phone` VARCHAR(255) NULL AFTER `DOB`;
  
ALTER TABLE `t_product`
    ADD COLUMN `product_url` TEXT NULL AFTER `sub_image`;