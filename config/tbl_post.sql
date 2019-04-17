-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 15 2019 г., 14:50
-- Версия сервера: 5.6.17
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `myblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `description`, `content`, `img`, `create_time`, `author_id`) VALUES
(1, 'Israel’s Beresheet Mission Crashes on the Moon', 'SpaceIL attempted, but missed, a historic first for private spaceflight and Israel — a soft landing on the Moon.', '“I personally think the odds are much better that is something natural, but I don’t want to dismiss the possibility that it could be from an alien civilization. But we have to have an open mind,” Michael Wall, a writer at Space.com and a biologist, told CNBC recently.', 'space1.jpg', 1554120000, 1),
(2, 'Scientists Unveil First Black Hole Image', 'The Event Horizon Telescope collaboration has reconstructed the shadow of a supermassive black hole.', 'Scientists believe Oumuamua is shaped like a cigar, approximately 400 feet long and 40 feet wide. However, they are only able to guess based on its changing brightness as it spins.Scientists believe Oumuamua is shaped like a cigar, approximately 400 feet long and 40 feet wide. However, they are only able to guess based on its changing brightness as it spins.', 'space2.jpg', 1554292800, 1),
(3, 'Yanking Markarian’s Chain', 'Markarian''s Chain, a remarkable arc of bright galaxies, is your ticket to the Virgo Cluster. Hop aboard!', 'But scientists’ biggest unanswered question is the object’s thickness. As far as the scientific community is aware, there is no naturally occurring object that is as big as Oumuamua that appears so thin at the same time, increasing the likelihood that it was created by another life form.', 'space3.jpg', 1554465600, 1),
(9, 'Northern Lights of Finland: Check!', 'Sky & Telescope''s latest tour to catch the aurorae was a fun-filled adventure in the northern reaches of Finland.', 'Given the speed the object is moving, experts believe that it may be a light sail — an object that is thin enough to be pushed by the sun or another star, almost like a plastic bag in the wind, according to Matija Cuk, a research scientist at the Search for Extraterrestrial Intelligence (SETI) Institute.', 'space4.jpeg', 1554638400, 1),
(10, 'What India’s Anti-Satellite Test Means for Space Debris', 'A recent anti-satellite missile test by India added hundreds of pieces of debris to an already cluttered low-Earth orbit.', 'Seth Shostak, a SETI research fellow, told CNBC that for that to be true, Oumuamua would have to be about a millimeter thick—about as thick as 5-10 sheets of paper stacked together.Seth Shostak, a SETI research fellow, told CNBC that for that to be true, Oumuamua would have to be about a millimeter thick—about as thick as 5-10 sheets of paper stacked together.Seth Shostak, a SETI research fellow, told CNBC that for that to be true, Oumuamua would have to be about a millimeter thick—about as thick as 5-10 sheets of paper stacked together.', 'space5.jpg', 1554724800, 1),
(13, 'Curiosity Sees Phobos Transit . . . After Sunset', 'NASA''s Curiosity rover just spied transits of both Martian moons across the face of the Sun — including one that happened after ', 'According to Wall, scientists originally hypothesized that Oumuamua was a comet or an asteroid. However, both theories were ruled out: Unlike comets studied here on earth, this object does not have a tail, nor jets of gas that a comet would normally emit.According to Wall, scientists originally hypothesized that Oumuamua was a comet or an asteroid. However, both theories were ruled out: Unlike comets studied here on earth, this object does not have a tail, nor jets of gas that a comet would normally emit.According to Wall, scientists originally hypothesized that Oumuamua was a comet or an asteroid. However, both theories were ruled out: Unlike comets studied here on earth, this object does not have a tail, nor jets of gas that a comet would normally emit.', 'space6.jpg', 1554811200, 1),
(14, 'Could Dark Matter Be Black Holes?', 'Astronomers are reconsidering primordial black holes as an answer to the invisible matter mystery, but recent observations disfa', 'If Oumuamua is not a comet or an asteroid, chances of it being a light sail increase. According to SETI’s Cuk, it is possible that outside our solar system, composition of space objects are different.If Oumuamua is not a comet or an asteroid, chances of it being a light sail increase. According to SETI’s Cuk, it is possible that outside our solar system, composition of space objects are different.If Oumuamua is not a comet or an asteroid, chances of it being a light sail increase. According to SETI’s Cuk, it is possible that outside our solar system, composition of space objects are different.If Oumuamua is not a comet or an asteroid, chances of it being a light sail increase. According to SETI’s Cuk, it is possible that outside our solar system, composition of space objects are different.', 'space7.jpeg', 1554897600, 1),
(15, 'Quaking Aspen Leaves Inspire Potential Power Source For Mars Rovers', 'A unique concept could serve as an emergency power backup for future missions.', 'Scientists also would have been able to detect any sort of signal the object had if it were as advanced as a cell phone, Shostak said. That does not prove anything, but decreases the likelihood that it was deliberately sent.Scientists also would have been able to detect any sort of signal the object had if it were as advanced as a cell phone, Shostak said. That does not prove anything, but decreases the likelihood that it was deliberately sent.Scientists also would have been able to detect any sort of signal the object had if it were as advanced as a cell phone, Shostak said. That does not prove anything, but decreases the likelihood that it was deliberately sent.', 'space8.jpg', 1555070400, 23),
(16, 'Amazing Images Capture Giant Fireball Exploding Over the Bering Sea', 'A powerful fireball exploded over the wilds of eastern Russia last December. Satellites captured the whole thing.', 'Oumuamua is now drifting further away from our solar system. The longer the distance, the harder it will be for earthlings to study it. Yet as technology increases, scientists may discover more objects similar to Oumuamua, perhaps in the next three to ten years.Oumuamua is now drifting further away from our solar system. The longer the distance, the harder it will be for earthlings to study it. Yet as technology increases, scientists may discover more objects similar to Oumuamua, perhaps in the next three to ten years.Oumuamua is now drifting further away from our solar system. The longer the distance, the harder it will be for earthlings to study it. Yet as technology increases, scientists may discover more objects similar to Oumuamua, perhaps in the next three to ten years.Oumuamua is now drifting further away from our solar system. The longer the distance, the harder it will be for earthlings to study it. Yet as technology increases, scientists may discover more objects similar to Oumuamua, perhaps in the next three to ten years.Oumuamua is now drifting further away from our solar system. The longer the distance, the harder it will be for earthlings to study it. Yet as technology increases, scientists may discover more objects similar to Oumuamua, perhaps in the next three to ten years.', 'space9.jpg', 1555243200, 23),
(17, ' It’s Spring! Time to Visit the Bright Galaxies of Leo I', 'Springtime is galaxy time.', 'Springtime is galaxy time. Only 30 million light years away, the Leo I Group and nearby Leo Triplet entice the eye with an assortment of bright spiral and elliptical galaxies. Welcome to spring! The new season begins (or began depending on when you read this) at 5:58 p.m. EDT on March 20th. That''s also Springtime is galaxy time. Only 30 million light years away, the Leo I Group and nearby Leo Triplet entice the eye with an assortment of bright spiral and elliptical galaxies. Welcome to spring! The new season begins (or began depending on when you read this) at 5:58 p.m. EDT on March 20th. That''s also Springtime is galaxy time. Only 30 million light years away, the Leo I Group and nearby Leo Triplet entice the eye with an assortment of bright spiral and elliptical galaxies. Welcome to spring! The new season begins (or began depending on when you read this) at 5:58 p.m. EDT on March 20th. That''s also Springtime is galaxy time. Only 30 million light years away, the Leo I Group and nearby Leo Triplet entice the eye with an assortment of bright spiral and elliptical galaxies. Welcome to spring! The new season begins (or began depending on when you read this) at 5:58 p.m. EDT on March 20th. That''s also ', 'space10.jpg', 1555416000, 23),
(18, 'Astro-Imaging: Don’t Throw A FITs, Man!', 'The FITS file is so much more than just an image format. If you''re looking to get serious about deep-sky astrophotography, here''', 'Something I see over and over again with beginning astrophotographers is their complete dismissal of the .FITS file format. I saw this with a friend recently who had begun his journey from a solar imager to deep-sky astrophotography. Yes, the Sun counts as astrophotography, but the Sun is also just slightly brighter than say, the Andromeda Galaxy (well, going by apparent brightness, anyway)! Taking pictures of something so bright it could conceivably set your camera on fire is quite a bit different than shooting something that takes several minutes of exposure just to register as a blip above the background noise of your camera''s sensor. Anything that can take a picture of a duck can, with proper filtering, also take a photo of the Sun. Solar, lunar, and planetary astrophotography each has its own unique challenges; it''s just that low light and low signal isn''t one of them.Something I see over and over again with beginning astrophotographers is their complete dismissal of the .FITS file format. I saw this with a friend recently who had begun his journey from a solar imager to deep-sky astrophotography. Yes, the Sun counts as astrophotography, but the Sun is also just slightly brighter than say, the Andromeda Galaxy (well, going by apparent brightness, anyway)! Taking pictures of something so bright it could conceivably set your camera on fire is quite a bit different than shooting something that takes several minutes of exposure just to register as a blip above the background noise of your camera''s sensor. Anything that can take a picture of a duck can, with proper filtering, also take a photo of the Sun. Solar, lunar, and planetary astrophotography each has its own unique challenges; it''s just that low light and low signal isn''t one of them.', 'space11.jpg', 1555502400, 23),
(19, 'Sudden Impact: What Greenland’s Crater Means for Our Planet’s History', 'The discovery of a recent huge meteor crater beneath Greenland’s ice sheet has reignited a debate over cosmic influences.', 'In the 1960s, we took a giant leap forward in our understanding of the threat that meteors pose to our planet. In 1960, Eugene Shoemaker firmly established that a meteor — and not a volcanic eruption or other cause — created Arizona’s Meteor Crater. A huge explosion by an iron meteorite slamming into Earth 50,000 years ago gouged out the 1.2-kilometer-wide pit. This confirmation, combined with detailed lunar photography that definitively showed that the Moon’s craters arose from impacts, represented an important watershed in our comprehension of the profound connections between our planet and the rest of the solar system.', 'space12.jpg', 1555588800, 23);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
