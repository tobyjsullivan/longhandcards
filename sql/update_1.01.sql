--
-- Updating version number
--

INSERT INTO `applied_updates` (`version`, `applied`) VALUES ('1.01', NOW());

ALTER TABLE `cards` ADD `stock` INT(3) DEFAULT 0;

INSERT INTO `cards` (`id`, `display_name`, `stock`) VALUES
(003, 'Carolers', '4'),
(004, 'Santa\'s Hand', '4'),
(005, 'Snowy House', '4'),
(006, 'Snowman Outside', '4'),
(007, 'Santa', '4'),
(008, 'Fire Place', '4'),
(009, 'Building a Snowman', '4'),
(010, 'Santa at the Tree', '4'),
(011, 'Santa\'s Sleigh', '4'),
(012, 'Christmas Activities', '3');
