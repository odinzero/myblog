

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `active` smallint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;


INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`, `active`, `name`, `fname`) VALUES
(1, 'test2', '123', 'test_0000000@domain.com', NULL, 0, 'Test Behavior', ''),
(2, 'test200', '123', 'test2@domain.com', NULL, 0, 'Test2', 'Test2 Test'),
(10, 'testTTT', '123', 'test7@domain.com', NULL, 0, 'Test7', 'Test7 Test 7'),
(15, 'admin', '$2y$13$NJkXtvdDskvlY5L2VoacU.lQaJXbHl4ECYo/JNTgdY.PhDPoA9Eba', '', NULL, 0, '', ''),
(17, 'test_100', '123', 'test100@domain.com', NULL, 0, 'Test Behavior', 'Test100 Test 100'),
(19, 'new_t', '123', 'a@z', '', 0, '', ''),
(20, 'blazer', '123', 'w@w', NULL, 0, '', '')



CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;


INSERT INTO `tbl_post` (`id`, `title`, `description`,  `content`, `img`, `create_time`, `author_id`) VALUES
(1, 'Welcome!', 'description', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\r\n\r\nFeel free to try this system by writing new posts and posting comments.',
    '', 1230852187, 1),
(2, 'A Test Post', 'description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    '',  1230952187,  1);