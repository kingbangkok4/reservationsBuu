-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `project`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `book_order_detail`
-- 

CREATE TABLE `book_order_detail` (
  `Borderdt _Id` int(11) NOT NULL auto_increment,
  `BOrderdt _NameBook` text NOT NULL,
  `BOrderdt _Author` text NOT NULL,
  `BOrderdt _Publisher` text NOT NULL,
  `BOrderdt _Year` year(4) NOT NULL,
  `BOrderdt _ISBN` int(10) NOT NULL,
  `BOrderdt _Amount` int(10) NOT NULL,
  `BOrderdt _Price` int(10) NOT NULL,
  `Itemst_Id` int(10) NOT NULL,
  `Border_Id` int(10) NOT NULL,
  PRIMARY KEY  (`Borderdt _Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `book_order_detail`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `branch`
-- 

CREATE TABLE `branch` (
  `Branch_Id` int(11) NOT NULL auto_increment,
  `Branch_Name` varchar(100) NOT NULL,
  `Fac_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Branch_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- dump ตาราง `branch`
-- 

INSERT INTO `branch` VALUES (1, 'สาขาเทคโนโลยีสารสนเทศ', 1);
INSERT INTO `branch` VALUES (2, 'สาขาคอมพิวเตอร์ธุรกิจ', 1);
INSERT INTO `branch` VALUES (3, 'สาขาบริหารทั่วไป', 1);
INSERT INTO `branch` VALUES (4, 'สาขาการจัดการโลจิสติกส์และการค้าชายแดน', 1);
INSERT INTO `branch` VALUES (5, 'สาขาทรัพยากรธรรมชาติและสิ่งแวดล้อม', 1);
INSERT INTO `branch` VALUES (6, 'สาขาการจัดการทรัพยากรมนุษย์', 1);
INSERT INTO `branch` VALUES (7, 'สาขาเกษตรศาสตร์', 2);
INSERT INTO `branch` VALUES (8, 'สาขาเทคโนโลยีผลิตภัณฑ์ธรรมชาติ', 2);
INSERT INTO `branch` VALUES (9, 'สาขาวิชาการจัดการ', 3);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `faculty`
-- 

CREATE TABLE `faculty` (
  `Fac_Id` int(11) NOT NULL auto_increment,
  `Fac_Name` varchar(30) NOT NULL,
  PRIMARY KEY  (`Fac_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `faculty`
-- 

INSERT INTO `faculty` VALUES (1, 'คณะวิทยาศาสตร์และสังคมศาสตร์');
INSERT INTO `faculty` VALUES (2, 'คณะเทคโนโลยีการเกษตร');
INSERT INTO `faculty` VALUES (3, 'คณะพาณิชยศาสตร์และบริหารธุรกิจ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `gownorder`
-- 

CREATE TABLE `gownorder` (
  `GownOrder _Id` int(10) NOT NULL auto_increment,
  `Fac_Id` int(10) NOT NULL,
  `GownOrder_Type` text NOT NULL,
  `GownOrder_Amount` int(10) NOT NULL,
  `GownOrder_Height` int(10) NOT NULL,
  `GownOrder_Weight` int(10) NOT NULL,
  `GownOrder_Date` date NOT NULL,
  `GownOrder_Remask` text NOT NULL,
  PRIMARY KEY  (`GownOrder _Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- dump ตาราง `gownorder`
-- 

INSERT INTO `gownorder` VALUES (1, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (7, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');
INSERT INTO `gownorder` VALUES (6, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (5, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (10, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');
INSERT INTO `gownorder` VALUES (9, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `list_of_order`
-- 

CREATE TABLE `list_of_order` (
  `List_Id` int(11) NOT NULL auto_increment,
  `Product_Id` int(11) NOT NULL,
  `List_Amount` int(11) NOT NULL,
  `orderDe_Id` int(11) NOT NULL,
  PRIMARY KEY  (`List_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- 
-- dump ตาราง `list_of_order`
-- 

INSERT INTO `list_of_order` VALUES (12, 1, 1, 8);
INSERT INTO `list_of_order` VALUES (15, 2, 1, 9);
INSERT INTO `list_of_order` VALUES (14, 1, 1, 9);
INSERT INTO `list_of_order` VALUES (17, 2, 1, 10);
INSERT INTO `list_of_order` VALUES (16, 1, 1, 10);
INSERT INTO `list_of_order` VALUES (19, 2, 1, 11);
INSERT INTO `list_of_order` VALUES (18, 1, 1, 11);
INSERT INTO `list_of_order` VALUES (13, 2, 1, 8);
INSERT INTO `list_of_order` VALUES (20, 0, 1, 13);
INSERT INTO `list_of_order` VALUES (21, 2, 2, 13);
INSERT INTO `list_of_order` VALUES (22, 3, 1, 13);
INSERT INTO `list_of_order` VALUES (23, 0, 1, 13);
INSERT INTO `list_of_order` VALUES (24, 0, 1, 14);
INSERT INTO `list_of_order` VALUES (25, 2, 1, 14);
INSERT INTO `list_of_order` VALUES (26, 0, 1, 14);
INSERT INTO `list_of_order` VALUES (27, 5, 1, 14);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orderlist`
-- 

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL auto_increment,
  `Person_Username` varchar(20) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- 
-- dump ตาราง `orderlist`
-- 

INSERT INTO `orderlist` VALUES (29, 'lek', 0, 0);
INSERT INTO `orderlist` VALUES (28, 'lek', 2, 2);
INSERT INTO `orderlist` VALUES (27, 'pp', 2, 1);
INSERT INTO `orderlist` VALUES (26, 'zoo', 4, 1);
INSERT INTO `orderlist` VALUES (25, 'zoo', 4, 3);
INSERT INTO `orderlist` VALUES (24, 'zoo', 4, 1);
INSERT INTO `orderlist` VALUES (23, 'zoo', 5, 1);
INSERT INTO `orderlist` VALUES (22, 'zoo', 5, 1);
INSERT INTO `orderlist` VALUES (21, 'zoo', 5, 2);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders`
-- 

CREATE TABLE `orders` (
  `Order_Id` int(5) unsigned zerofill NOT NULL auto_increment,
  `Order_Date` datetime NOT NULL,
  `Person_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Order_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- 
-- dump ตาราง `orders`
-- 

INSERT INTO `orders` VALUES (00003, '2016-04-10 12:45:46', 43);
INSERT INTO `orders` VALUES (00004, '2016-04-10 13:14:44', 43);
INSERT INTO `orders` VALUES (00005, '2016-04-10 13:15:49', 43);
INSERT INTO `orders` VALUES (00006, '2016-04-10 13:26:22', 38);
INSERT INTO `orders` VALUES (00007, '2016-04-10 13:30:29', 38);
INSERT INTO `orders` VALUES (00008, '2016-04-10 20:34:47', 43);
INSERT INTO `orders` VALUES (00009, '2016-04-10 20:35:02', 43);
INSERT INTO `orders` VALUES (00010, '2016-04-10 20:38:11', 43);
INSERT INTO `orders` VALUES (00011, '2016-04-10 20:38:14', 43);
INSERT INTO `orders` VALUES (00012, '2016-04-10 20:38:47', 43);
INSERT INTO `orders` VALUES (00013, '2016-04-10 20:48:05', 43);
INSERT INTO `orders` VALUES (00014, '2016-04-11 01:42:56', 43);
INSERT INTO `orders` VALUES (00015, '2016-04-11 02:45:04', 43);
INSERT INTO `orders` VALUES (00016, '2016-04-11 01:51:27', 43);
INSERT INTO `orders` VALUES (00017, '2016-04-11 01:53:22', 43);
INSERT INTO `orders` VALUES (00018, '2016-04-11 03:59:33', 43);
INSERT INTO `orders` VALUES (00019, '2016-04-11 15:17:35', 48);
INSERT INTO `orders` VALUES (00020, '2016-04-11 15:41:48', 43);
INSERT INTO `orders` VALUES (00021, '2016-04-11 19:56:40', 43);
INSERT INTO `orders` VALUES (00022, '2016-04-20 18:45:26', 43);
INSERT INTO `orders` VALUES (00023, '2016-06-23 19:53:13', 43);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `orders_detail`
-- 

CREATE TABLE `orders_detail` (
  `Detail_Id` int(5) NOT NULL auto_increment,
  `Order_Id` int(5) unsigned zerofill NOT NULL,
  `Product_Code` varchar(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Type` varchar(6) NOT NULL,
  `Approval_Status` varchar(10) default NULL,
  `Approval_By` int(11) default NULL,
  `Approval_Date` date default NULL,
  `Status` varchar(30) NOT NULL,
  `Post_Script` text,
  PRIMARY KEY  (`Detail_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- 
-- dump ตาราง `orders_detail`
-- 

INSERT INTO `orders_detail` VALUES (37, 00021, 'p100', 6, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (36, 00021, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (35, 00020, 'p4', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (34, 00020, 'p3', 8, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (33, 00019, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (32, 00018, 'p6', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (23, 00007, 'p5', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (24, 00008, 'p3', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (25, 00008, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (26, 00012, 'p2', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (27, 00013, 'p3', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (28, 00014, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (29, 00015, 'p3', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (30, 00016, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (31, 00017, 'p7', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (38, 00022, 'p8', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (39, 00023, 'p8', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);
INSERT INTO `orders_detail` VALUES (40, 00023, 'p0', 1, 'Buy', 'อนุมัติ', NULL, NULL, 'สินค้าพร้อมแล้ว', NULL);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `person`
-- 

CREATE TABLE `person` (
  `Person_Id` int(10) unsigned NOT NULL auto_increment,
  `Title_Id` varchar(20) NOT NULL,
  `Person_Fname` varchar(50) default NULL,
  `Person_Lname` varchar(50) default NULL,
  `Person_Birthday` date default NULL,
  `Person_email` varchar(50) default NULL,
  `Person_Phone` int(10) unsigned zerofill default NULL,
  `Person_Username` varchar(20) NOT NULL,
  `Person_Password` varchar(30) NOT NULL,
  `Person_UniversityCode` int(10) unsigned NOT NULL,
  `Person_Position` varchar(10) NOT NULL,
  `Fac_Id` int(11) NOT NULL,
  `Branch_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Person_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- 
-- dump ตาราง `person`
-- 

INSERT INTO `person` VALUES (5, '', 'nutsudapan', 'kaenvichit', '2016-01-29', 'kik@hotmail.com', 0881010109, 'nutsudapan', '12345', 55410797, 'staff', 1, 1);
INSERT INTO `person` VALUES (17, '', 'ณัฐสุดาพรรณ', 'แก่นวิจิตร', '2016-03-09', 'nut@hotmail.com', 0884854100, 'admin', '797', 55410797, 'admin', 1, 1);
INSERT INTO `person` VALUES (24, '', 'กอบบุญ', 'ปัญญา', '2013-03-05', 'kobboon@hotmail.com', 0811111100, 'kobboon', 'kob', 55410075, 'student', 1, 1);
INSERT INTO `person` VALUES (38, '', 'ณัฐสุดาพรรณ', 'แก่นวิจิตร', '2016-04-05', 'kookkik@hotmail.com', 0811111111, 'pp', '797', 55410797, 'student', 1, 1);
INSERT INTO `person` VALUES (43, 'นางสาว', 'สุภาพร', 'เพลิงพิศ', '2015-01-01', 'lek@hotmail.com', 0887478977, 'lek', 'ok', 55410421, 'student', 1, 1);
INSERT INTO `person` VALUES (44, '', 'สดใส', 'สดชื่น', '2016-08-26', 'sodsai@hotmail.com', 0884854999, 'abb', '10', 57710139, 'staff', 2, 8);
INSERT INTO `person` VALUES (45, '', 'หลอกลวง', 'ใจหมา', '1995-02-28', 'zoo@hotmail.com', 0891111999, 'zoo', '555', 55410500, 'student', 2, 8);
INSERT INTO `person` VALUES (47, '', 'ศักรินทร์', 'ดาวร้าย', '1990-04-05', 'sak@hotmail.com', 0821312546, 'sak', '081', 55410212, 'staff', 1, 4);
INSERT INTO `person` VALUES (48, '', 'บูรพา', 'สระแก้ว', '1997-12-03', 'sakaeo@hotmail.com', 0884854566, 'sakaeo', '797', 55410797, 'student', 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `product`
-- 

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL auto_increment,
  `Product_Code` varchar(11) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Stock` int(11) NOT NULL,
  `Product_picture` text NOT NULL,
  PRIMARY KEY  (`Product_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- dump ตาราง `product`
-- 

INSERT INTO `product` VALUES (3, 'p100', 'เข็มขัด', 100, 8, 'p3');
INSERT INTO `product` VALUES (12, 'p0', 'ที่หนีบ', 50, 1, 'p0');
INSERT INTO `product` VALUES (4, 'p4', 'เน็กไท', 300, 9, 'p4.png');
INSERT INTO `product` VALUES (8, 'p6', 'ตุ้งติ้ง', 25, 2, 'p6.png');
INSERT INTO `product` VALUES (11, 'p7', 'หัวเข็มขัด', 100, 2, 'หัวเข็มขัด.png');
INSERT INTO `product` VALUES (17, 'p8', 'กระดุม', 20, 5, 'pp.jpg');
INSERT INTO `product` VALUES (49, '4', '4', 4, 4, '280616_115515.png');
INSERT INTO `product` VALUES (46, '3', '3', 3, 3, '280616_115112.jpg');
INSERT INTO `product` VALUES (47, '777', '7', 7, 77, '280616_115221.jpg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `type_product`
-- 

CREATE TABLE `type_product` (
  `TypeP_Id` int(11) NOT NULL auto_increment,
  `TypeP_Nametype` varchar(20) NOT NULL,
  PRIMARY KEY  (`TypeP_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- dump ตาราง `type_product`
-- 

INSERT INTO `type_product` VALUES (1, 'ชุดครุย');
INSERT INTO `type_product` VALUES (3, 'หนังสือ');
INSERT INTO `type_product` VALUES (5, 'อุปกรณ์');
