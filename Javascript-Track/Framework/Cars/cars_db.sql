CREATE SCHEMA `cars_db` ;

USE cars_db;
--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `cars` (`name` , `year`) VALUES
('BMW' , 1997),
('Ford' , 1875),
('Audi' , 1967);