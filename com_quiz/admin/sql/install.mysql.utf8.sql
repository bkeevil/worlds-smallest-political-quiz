DROP TABLE IF EXISTS `#__quiz`;
CREATE TABLE `#__quiz` (
  `ID` bigint(20) unsigned NOT NULL,
  `PS` tinyint(3) unsigned NOT NULL,
  `ES` tinyint(3) unsigned NOT NULL,
  `P0` tinyint(3) unsigned NOT NULL,
  `P1` tinyint(3) unsigned NOT NULL,
  `P2` tinyint(3) unsigned NOT NULL,
  `P3` tinyint(3) unsigned NOT NULL,
  `P4` tinyint(3) unsigned NOT NULL,
  `E0` tinyint(3) unsigned NOT NULL,
  `E1` tinyint(3) unsigned NOT NULL,
  `E2` tinyint(3) unsigned NOT NULL,
  `E3` tinyint(3) unsigned NOT NULL,
  `E4` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `jos_quiz`
 ADD PRIMARY KEY (`ID`);
