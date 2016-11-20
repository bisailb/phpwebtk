CREATE TABLE `sample` (
  `id` int(11) NOT NULL auto_increment,
  `price` decimal(4,2) default NULL,
  `code` varchar(8) default NULL,
  `numbers_only` int(11) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=InnoDB;

INSERT INTO `sample` VALUES (99999999999999, 21474.83, 'ABCDEFGHIJK', 'A quick brown dolphin...`');