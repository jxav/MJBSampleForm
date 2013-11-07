mysql> show create table  userrecords.recordsList;
+-------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table       | Create Table                                                                                                                                                                                                              |
+-------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| recordsList | CREATE TABLE `recordsList` (
  `name` varchar(40) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=latin1 |
+-------------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)


The database used to house the data is very basic. 
It contains the following fields
  name of type varchar(40) and not null,
  comment varchar(255) and not null,
  ID is the primary key and is set to auto increment

No Procedures, Functions or Triggers where setup
There are no unique fileds setup either.
The user used to access the database can be setup in the handler.php file


Cheers!
FJV


