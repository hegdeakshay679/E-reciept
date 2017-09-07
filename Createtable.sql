CREATE DATABASE bank;



CREATE TABLE MyGuest (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		fname varchar(255) NOT NULL,
		  lname varchar(255) NOT NULL,
          aadharno bigint(20) NOT NULL,
          isdt date NOT NULL,
          loan int(10) NOT NULL,
          ip int(11) NOT NULL,
		  ir int(3) NOT NULL,
          email varchar(50) NOT NULL,
		  ph bigint(15) NOT NULL,
		  ad varchar(50) NOT NULL,
		  pc int (10) NOT NULL,
		  closingbalance int (10) NOT NULL,
		  closingdate date NOT NULL);