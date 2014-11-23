ALTER TABLE `t_invoice_shipping`
  ADD COLUMN `estimated_max` DATETIME NULL AFTER `record_status`,
  ADD COLUMN `estimated_min` DATETIME NULL AFTER `estimated_max`;
