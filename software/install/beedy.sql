

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
CREATE TABLE IF NOT EXISTS `beedysystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `dateFrom` varchar(50) NOT NULL,
  `dateTo` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `systemWindow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL, 
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `hseat` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `htables` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `qty_left` int(11) DEFAULT NULL,
  `subId` int(11) NOT NULL,
  `vat` varchar(30) DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `subId` (`subId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `purchases` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `purchases_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `balance` varchar(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `tid` (`tid`),
  KEY `sid` (`sid`),
  KEY `hall` (`hall`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `date` varchar(500) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `subcategory` (
  `subId` int(11) NOT NULL AUTO_INCREMENT,
  `main` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  PRIMARY KEY (`subId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_address` varchar(100) DEFAULT NULL,
  `supplier_contact` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `system` (
  `companyName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `CompanyEmail` varchar(100) DEFAULT NULL,
  `CompanyPhoneNum` varchar(100) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `systemwindow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

 
ALTER TABLE `hseat`
  ADD CONSTRAINT `hseat_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `htables` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `htables`
  ADD CONSTRAINT `htables_ibfk_1` FOREIGN KEY (`id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subId`) REFERENCES `subcategory` (`subId`) ON DELETE CASCADE ON UPDATE CASCADE;

  
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `htables` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `hseat` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`hall`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
