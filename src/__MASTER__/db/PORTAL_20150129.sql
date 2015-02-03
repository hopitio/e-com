ALTER TABLE `t_product`   
  CHANGE `name` `name` TEXT CHARSET utf8 COLLATE utf8_unicode_ci NULL;
ALTER TABLE `t_order`
  ADD COLUMN `exchange_rate` TEXT NULL AFTER `fk_user`;
ALTER TABLE `t_order`   
  ADD COLUMN `exchange_rate_bank_name` VARCHAR(255) NULL AFTER `exchange_rate`;

