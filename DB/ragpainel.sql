DROP TABLE IF EXISTS `arena_pvp`;
CREATE TABLE `arena_pvp` (
`char_id` int(11) unsigned NOT NULL,
`char_name` varchar(24) NOT NULL,
`matou` int(10) unsigned NOT NULL,
`morreu` int(10) unsigned NOT NULL,
`total` int(10) NOT NULL,
PRIMARY KEY (`char_id`)
) ENGINE=MyISAM;

CREATE TABLE  `arena_pvp_logs` (
`assassino` VARCHAR( 32 ) NOT NULL ,
`alvo` VARCHAR( 32 ) NOT NULL ,
`data` VARCHAR( 32 ) NOT NULL ,
`ID` INT( 11 ) NOT NULL AUTO_INCREMENT ,
PRIMARY KEY (  `ID` )
) ENGINE=MYISAM;

DROP TABLE IF EXISTS `ranking_woe`;
CREATE TABLE `ranking_woe` (
`guild_id` int(11) unsigned NOT NULL,
`guild_name` varchar(24) NOT NULL,
`matou` int(10) unsigned NOT NULL,
`morreu` int(10) unsigned NOT NULL,
`total` int(10) NOT NULL,
PRIMARY KEY (`guild_id`)
) ENGINE=MyISAM;

CREATE TABLE `tickets` (
`id` int(11) NOT NULL,
`title` varchar(24) NOT NULL,
`login` varchar(24) NOT NULL,
`email` varchar(24) NOT NULL,
`category` varchar(24) NOT NULL,
`body` text NOT NULL,
`tickets` varchar(24) NOT NULL DEFAULT 'Aberto',
`created_at` datetime NOT NULL,
`updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tickets_replys` (
`id` int(11) NOT NULL,
`ticket_id` int(11) NOT NULL,
`login` varchar(24) NOT NULL,
`body` text NOT NULL,
`created_at` datetime NOT NULL,
`updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tickets_category` (
`id` int(11) NOT NULL,
`name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tickets` ADD PRIMARY KEY (`id`);
ALTER TABLE `tickets_category` ADD PRIMARY KEY (`id`);
ALTER TABLE `tickets_replys` ADD PRIMARY KEY (`id`);
ALTER TABLE `tickets` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tickets_replys` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tickets_category` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; COMMIT;
ALTER TABLE `login` ADD `remember_token` varchar(100) DEFAULT NULL AFTER `user_pass`;
ALTER TABLE `login` ADD `photo` VARCHAR(200) NOT NULL DEFAULT 'default.png' AFTER `remember_token`;
ALTER TABLE `login` ADD `cash` INT( 11 ) NOT NULL DEFAULT '0';
ALTER TABLE `char` ADD `eventos` INT( 11 ) NOT NULL DEFAULT '0';
ALTER TABLE `char` ADD `mvps` INT( 11 ) NOT NULL DEFAULT '0';

