CREATE DATABASE IF NOT EXISTS `LOGIN` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `LOGIN`;

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
	`id` int(11) auto_increment primary key,
	`username` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


