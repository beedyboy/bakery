CREATE DATABASE bakery;

--CREATING TABLE beedysystem
CREATE TABLE `beedysystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `dateFrom` varchar(50) NOT NULL,
  `dateTo` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO beedysystem
INSERT INTO beedysystem VALUES ('1','TURG-QLFZ-MUVN-RVLY','VFVS-RY1R-TEZA-LU1V','01AC-D0F1-BD0E-7F80','2017-06-13','2018-09-13','One-Off');



--CREATING TABLE discount_settings
CREATE TABLE `discount_settings` (
  `value` varchar(10) DEFAULT NULL,
  `status` enum('YES','NO') DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO discount_settings
INSERT INTO discount_settings VALUES ('','NO');
INSERT INTO discount_settings VALUES ('','YES');



--CREATING TABLE products
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `qty_left` int(11) DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `checks` smallint(6) DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO products



--CREATING TABLE sales
CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `balance` varchar(20) DEFAULT NULL,
  `status` enum('PAID','PENDING') DEFAULT 'PENDING',
  `nhil` varchar(30) DEFAULT NULL,
  `fund` varchar(30) DEFAULT NULL,
  `vat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO sales



--CREATING TABLE sales_order
CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `date` varchar(500) NOT NULL,
  `plate` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`transaction_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO sales_order



--CREATING TABLE suppliers
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_address` varchar(100) DEFAULT NULL,
  `supplier_contact` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO suppliers



--CREATING TABLE system
CREATE TABLE `system` (
  `companyName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `CompanyEmail` varchar(100) DEFAULT NULL,
  `CompanyPhoneNum` varchar(100) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO system
INSERT INTO system VALUES ('Mango\'s Restaurant','No 14 Street, East Legon','','mangos@gmail.com','0553135336 | 0543977486','Vs-W2.0.0.');



--CREATING TABLE systemwindow
CREATE TABLE `systemwindow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO systemwindow
INSERT INTO systemwindow VALUES ('1','TURD-WE1D-MDRN-RENA','VFVS-RC1X-RTFE-LU1E','0710-8073-4802-5F00','One-Off');



--CREATING TABLE user
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--INSERTING DATA INTO user
INSERT INTO user VALUES ('1','Admin','admin','ADMINISTRATOR','Admin');



-- THE END

