ALTER TABLE `login` ADD `remember_token` varchar(100) DEFAULT NULL AFTER `user_pass`;
ALTER TABLE `login` ADD `photo` VARCHAR(200) NOT NULL DEFAULT 'default.png' AFTER `remember_token`;
