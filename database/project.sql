-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 12:09 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `book_order_detail`
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
-- Dumping data for table `book_order_detail`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `branch`
-- 

CREATE TABLE `branch` (
  `Branch_Id` int(11) NOT NULL auto_increment,
  `Branch_Name` varchar(100) NOT NULL,
  `Fac_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Branch_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `branch`
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
-- Table structure for table `faculty`
-- 

CREATE TABLE `faculty` (
  `Fac_Id` int(11) NOT NULL auto_increment,
  `Fac_Name` varchar(30) NOT NULL,
  PRIMARY KEY  (`Fac_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `faculty`
-- 

INSERT INTO `faculty` VALUES (1, 'คณะวิทยาศาสตร์และสังคมศาสตร์');
INSERT INTO `faculty` VALUES (2, 'คณะเทคโนโลยีการเกษตร');
INSERT INTO `faculty` VALUES (3, 'คณะพาณิชยศาสตร์และบริหารธุรกิจ');

-- --------------------------------------------------------

-- 
-- Table structure for table `gownorder`
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
-- Dumping data for table `gownorder`
-- 

INSERT INTO `gownorder` VALUES (1, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (7, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');
INSERT INTO `gownorder` VALUES (6, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (5, 0, '', 0, 0, 58, '0000-00-00', '-');
INSERT INTO `gownorder` VALUES (10, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');
INSERT INTO `gownorder` VALUES (9, 0, '', 0, 160, 58, '0000-00-00', 'อ้วน');

-- --------------------------------------------------------

-- 
-- Table structure for table `orders`
-- 

CREATE TABLE `orders` (
  `Order_Id` int(5) unsigned zerofill NOT NULL auto_increment,
  `Order_Date` datetime NOT NULL,
  `Person_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Order_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `orders`
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
INSERT INTO `orders` VALUES (00024, '2016-11-15 20:50:15', 45);
INSERT INTO `orders` VALUES (00025, '2016-11-15 21:31:18', 45);
INSERT INTO `orders` VALUES (00026, '2016-11-19 14:40:53', 45);
INSERT INTO `orders` VALUES (00027, '2016-11-19 14:53:34', 45);
INSERT INTO `orders` VALUES (00028, '2016-11-19 15:12:51', 45);
INSERT INTO `orders` VALUES (00029, '2016-11-19 15:14:58', 45);
INSERT INTO `orders` VALUES (00030, '2016-11-19 15:15:08', 45);
INSERT INTO `orders` VALUES (00031, '2016-11-19 15:16:03', 45);
INSERT INTO `orders` VALUES (00032, '2016-11-19 15:31:26', 45);
INSERT INTO `orders` VALUES (00033, '2016-11-19 15:31:49', 45);
INSERT INTO `orders` VALUES (00034, '2016-11-19 18:12:36', 45);
INSERT INTO `orders` VALUES (00035, '2016-11-19 18:12:40', 45);
INSERT INTO `orders` VALUES (00036, '2016-11-20 15:42:08', 54);
INSERT INTO `orders` VALUES (00037, '2016-11-21 11:06:18', 45);
INSERT INTO `orders` VALUES (00038, '2016-11-21 11:08:28', 45);

-- --------------------------------------------------------

-- 
-- Table structure for table `orders_detail`
-- 

CREATE TABLE `orders_detail` (
  `Detail_Id` int(5) NOT NULL auto_increment,
  `Order_Id` int(5) unsigned zerofill NOT NULL,
  `Product_Code` varchar(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Approval_By` int(11) default NULL,
  `Approval_Date` date default NULL,
  `Status` varchar(30) NOT NULL,
  `Approve_Status` varchar(1) default NULL,
  `Arrived_Status` varchar(1) default NULL,
  `Received_Status` varchar(1) default NULL,
  `Post_Script` text,
  PRIMARY KEY  (`Detail_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- 
-- Dumping data for table `orders_detail`
-- 

INSERT INTO `orders_detail` VALUES (37, 00021, 'p100', 6, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (36, 00021, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (35, 00020, 'p4', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (34, 00020, 'p3', 8, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (33, 00019, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (32, 00018, 'p6', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (23, 00007, 'p5', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (24, 00008, 'p3', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (25, 00008, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (26, 00012, 'p2', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (27, 00013, 'p3', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (28, 00014, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (29, 00015, 'p3', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (30, 00016, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (31, 00017, 'p7', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (38, 00022, 'p8', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (39, 00023, 'p8', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (40, 00023, 'p0', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (41, 00024, 'A0001', 55, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (42, 00024, '777', 77, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (43, 00025, 'p100', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (44, 00026, 'p8', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (45, 00027, '777', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (46, 00028, 'A0001', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (47, 00029, 'A0001', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (48, 00030, 'A0001', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (49, 00031, 'A0001', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (50, 00032, 'p0', 1, 'Buy', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (51, 00033, 'p0', 1, 'Approve', NULL, NULL, 'สินค้าพร้อมแล้ว', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (52, 00034, 'p0', 1, 'Reserve', NULL, NULL, 'รออนุมัติ', 'F', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (53, 00035, 'p0', 1, 'Reserve', NULL, NULL, 'รออนุมัติ', 'T', 'F', 'F', NULL);
INSERT INTO `orders_detail` VALUES (54, 00036, 'p0', 5, 'Reserve', NULL, NULL, 'รออนุมัติ', 'F', 'F', 'F', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `person`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- 
-- Dumping data for table `person`
-- 

INSERT INTO `person` VALUES (5, '', 'nutsudapan', 'kaenvichit', '2016-01-29', 'kik@hotmail.com', 0881010109, 'nutsudapan', '12345', 55410797, 'staff', 1, 1);
INSERT INTO `person` VALUES (17, '', 'ณัฐสุดาพรรณ', 'แก่นวิจิตร', '2016-03-09', 'nut3@hotmail.com', 0884854100, 'admin', '797', 55410797, 'admin', 1, 1);
INSERT INTO `person` VALUES (24, '', 'กอบบุญ', 'ปัญญา', '2013-03-05', 'kobboon@hotmail.com', 0811111100, 'kobboon', 'kob', 55410075, 'student', 1, 1);
INSERT INTO `person` VALUES (38, '', 'ณัฐสุดาพรรณ', 'แก่นวิจิตร', '2016-04-05', 'kookkik@hotmail.com', 0811111111, 'pp', '797', 55410797, 'student', 1, 1);
INSERT INTO `person` VALUES (43, 'นางสาว', 'สุภาพร', 'เพลิงพิศ', '2015-01-01', 'lek@hotmail.com', 0887478977, 'lek', 'ok', 55410421, 'student', 1, 1);
INSERT INTO `person` VALUES (44, '', 'สดใส', 'สดชื่น', '2016-08-26', 'sodsai1@hotmail.com', 0884854999, 'abb', '10', 57710139, 'staff', 2, 8);
INSERT INTO `person` VALUES (45, '', 'หลอกลวง', 'ใจหมา', '1995-02-28', 'zoo@hotmail.com', 0891111998, 'zoo', '555', 55410500, 'student', 2, 8);
INSERT INTO `person` VALUES (47, '', 'ศักรินทร์', 'ดาวร้าย', '1990-04-05', 'sak@hotmail.com', 0821312546, 'sak', '081', 55410212, 'staff', 1, 4);
INSERT INTO `person` VALUES (48, '', 'บูรพา', 'สระแก้ว', '1997-12-03', 'sakaeo@hotmail.com', 0884854566, 'sakaeo', '797', 55410797, 'student', 1, 1);
INSERT INTO `person` VALUES (49, 'นาย', 'ทดสอบ', 'นะจ๊ะ', '2016-01-01', 'test@localhost.com', 0987654321, 'tt', '11', 12345, 'student', 1, 1);
INSERT INTO `person` VALUES (50, 'นาย', 'จนท', 'จนท', '2016-01-01', 'staff@localhost.com', 0987654321, 's1', '1', 11111, 'staff', 3, 2);
INSERT INTO `person` VALUES (54, 'นาย', 'สมชาย', 'เข็มกลัด', '2016-01-10', 'somchai@localhost.com', 0999999999, 'sc', '11', 12345, 'teacher', 2, 0);
INSERT INTO `person` VALUES (53, 'นาย', 'a', 'b', '2016-01-01', 'a@localhost.com', 0987654321, 'a001', '1', 1, 'staff', 2, 9);

-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL auto_increment,
  `Product_Code` varchar(11) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Stock` int(11) NOT NULL,
  `Product_picture` text NOT NULL,
  `TypeP_Id` int(11) NOT NULL,
  PRIMARY KEY  (`Product_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- 
-- Dumping data for table `product`
-- 

INSERT INTO `product` VALUES (3, 'p100', 'เข็มขัด', 100, 8, 'p3', 10);
INSERT INTO `product` VALUES (12, 'p0', 'ที่หนีบ', 50, 0, 'p0', 0);
INSERT INTO `product` VALUES (4, 'p4', 'เน็กไท', 300, 9, 'p4.png', 10);
INSERT INTO `product` VALUES (8, 'p6', 'ตุ้งติ้ง', 25, 2, 'p6.png', 10);
INSERT INTO `product` VALUES (11, 'p7', 'หัวเข็มขัด', 100, 2, 'หัวเข็มขัด.png', 10);
INSERT INTO `product` VALUES (17, 'p8', 'กระดุม', 20, 5, 'pp.jpg', 10);
INSERT INTO `product` VALUES (47, '777', '7', 7, 75, '280616_115221.jpg', 0);
INSERT INTO `product` VALUES (50, 'A0001', 'A0001', 111, 109, '301016_135611.jpg', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `type_product`
-- 

CREATE TABLE `type_product` (
  `TypeP_Id` int(11) NOT NULL auto_increment,
  `TypeP_Nametype` varchar(20) NOT NULL,
  PRIMARY KEY  (`TypeP_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `type_product`
-- 

INSERT INTO `type_product` VALUES (1, 'ชุดครุย1');
INSERT INTO `type_product` VALUES (3, 'หนังสือ');
INSERT INTO `type_product` VALUES (5, 'อุปกรณ์');
INSERT INTO `type_product` VALUES (10, 'เครื่องแต่งกาย');
INSERT INTO `type_product` VALUES (11, 'เครื่องเขียน');
