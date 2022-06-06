-- Database: 'contactdb'
-- SQL bingo DATA TABLE 




CREATE TABLE `contact`(
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `contact` (`name`,`email`,`comment`) VALUES
('WJLee', '21500525@handong.ac.kr','me');

INSERT INTO `contact` (`name`,`email`,`comment`) VALUES
('mozo', 'dldnwls1101@gmail.com','test');

INSERT INTO `contact` (`name`,`email`,`comment`) VALUES
('kale', 'gas50000@naver.com','test');




