use Jennifer200454895;
DROP TABLE IF EXISTS `closet`;
CREATE TABLE IF NOT EXISTS `closet` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `Item` varchar(50) NOT NULL,
  `Season` varchar(10) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Occasion` varchar(50) DEFAULT NULL,
  `Times_Worn` int(11) DEFAULT NULL,
  `Comments` varchar(100) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closet`
--

INSERT INTO `closet` (`item_id`, `Item`, `Season`, `Type`, `Color`, `Occasion`, `Times_Worn`, `Comments`, `Email`) VALUES
(1, 'Skirt', 'Summer', 'Bottom', 'Pink', 'Casual', 1, 'Sparkly', 'jennifer.mendez@mygeorgian.ca'),
(2, 'Dress', 'Summer', 'One_Piece', 'Black', 'Business', 2, NULL, 'jennifer.mendez@mygeorgian.ca');
COMMIT;

select * from closet;
UPDATE closet SET Item=:Item, Season=:Season, Type=:Type, Color=:Color, Occasion=Ocassion, Times_Worn=:Worn, Comments=:Comments, Email=:Email WHERE id=:id;

drop table closet;
drop table users;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_email` (`email`)
);

select * from users;