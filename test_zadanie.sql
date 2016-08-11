SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `gruppa` (
  `id` int(11) NOT NULL,
  `naz` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `gruppa` (`id`, `naz`) VALUES
(1, '1grup'),
(2, '2grup'),
(3, '3grup'),
(4, '4grup'),
(10, 'da'),
(8, 'ке');

CREATE TABLE IF NOT EXISTS `navyk` (
  `id` int(11) NOT NULL,
  `naz` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `navyk` (`id`, `naz`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(16, 'sdfd');

CREATE TABLE IF NOT EXISTS `sotrydnik` (
  `id` int(11) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `nameste` char(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO `sotrydnik` (`id`, `familia`, `nameste`) VALUES
(1, 'Иванов', 'y'),
(2, 'Петров', 'n'),
(3, 'Сидоров', 'n'),
(4, 'Иванова', 'y'),
(5, 'Петрова', 'n'),
(6, 'Сидорова', 'y'),
(19, 'Вася Пупкин', 'y'),
(21, 'sdf', 'y'),
(22, 'asd', 'n');

CREATE TABLE IF NOT EXISTS `sotrydnik_gruppa` (
  `id` int(11) NOT NULL,
  `sotrydnik_id` int(11) NOT NULL,
  `gruppa_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO `sotrydnik_gruppa` (`id`, `sotrydnik_id`, `gruppa_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2),
(5, 4, 1),
(6, 4, 3),
(7, 5, 3),
(8, 6, 2),
(9, 6, 3),
(10, 6, 4),
(46, 21, 3),
(45, 21, 2),
(15, 13, 1),
(18, 16, 1),
(19, 17, 1),
(20, 17, 2),
(21, 17, 1),
(22, 17, 1),
(23, 17, 1),
(24, 17, 1),
(25, 17, 2),
(26, 17, 1),
(27, 17, 2),
(47, 22, 1),
(42, 19, 4),
(41, 19, 3),
(40, 19, 2);

CREATE TABLE IF NOT EXISTS `sotrydnik_navyk` (
  `id` int(11) NOT NULL,
  `sotrydnik_id` int(11) NOT NULL,
  `navyk_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

INSERT INTO `sotrydnik_navyk` (`id`, `sotrydnik_id`, `navyk_id`) VALUES
(6, 2, 2),
(5, 1, 2),
(4, 1, 1),
(7, 2, 3),
(8, 3, 1),
(9, 4, 2),
(10, 5, 3),
(11, 6, 1),
(57, 22, 1),
(56, 21, 2),
(50, 19, 2),
(55, 21, 1),
(49, 19, 1);


ALTER TABLE `gruppa`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `navyk`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sotrydnik`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sotrydnik_gruppa`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sotrydnik_navyk`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `gruppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
ALTER TABLE `navyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
ALTER TABLE `sotrydnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
ALTER TABLE `sotrydnik_gruppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
ALTER TABLE `sotrydnik_navyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
