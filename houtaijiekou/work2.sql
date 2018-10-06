-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 10 月 06 日 08:21
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `work2`
--
CREATE DATABASE IF NOT EXISTS `work2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `work2`;

-- --------------------------------------------------------

--
-- 表的结构 `protects`
--

CREATE TABLE IF NOT EXISTS `protects` (
  `pid` int(20) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pimg` varchar(150) NOT NULL,
  `pchar` varchar(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `protects`
--

INSERT INTO `protects` (`pid`, `pname`, `pimg`, `pchar`) VALUES
(1, '保温杯1', 'http://g.search2.alicdn.com/img/i2/26966656/TB2z7XQbCzqK1RjSZPxXXc4tVXa_!!0-saturn_solar.jpg_220x220.jpg', '10'),
(2, '保温杯2', 'http://g.search2.alicdn.com/img/i2/52333428/TB28SCupL1TBuNjy0FjXXajyXXa_!!0-saturn_solar.jpg_220x220.jpg', '12'),
(3, '保温杯3', 'http://g.search2.alicdn.com/img/i2/42250016/TB21Tm6vlsmBKNjSZFsXXaXSVXa_!!0-saturn_solar.jpg_220x220.jpg', '14'),
(4, '保温杯4', 'http://g.search2.alicdn.com/img/i2/110767437/TB2P.Mgor3nBKNjSZFMXXaUSFXa_!!0-saturn_solar.jpg_220x220.jpg', '16'),
(5, '保温杯5', 'http://g.search.alicdn.com/img/i4/127861630/TB2GI4rdxTpK1RjSZFMXXbG_VXa_!!0-saturn_solar.jpg_220x220.jpg', '18'),
(6, '保温杯6', 'http://g.search2.alicdn.com/img/i2/26966656/TB2z7XQbCzqK1RjSZPxXXc4tVXa_!!0-saturn_solar.jpg_220x221.jpg', '20'),
(7, '保温杯7', 'http://g.search2.alicdn.com/img/i2/52333428/TB28SCupL1TBuNjy0FjXXajyXXa_!!0-saturn_solar.jpg_220x221.jpg', '22'),
(8, '保温杯8', 'http://g.search.alicdn.com/img/i4/132298573/TB2cVAStQ7mBKNjSZFyXXbydFXa_!!0-saturn_solar.jpg_220x220.jpg', '24'),
(9, '保温杯9', 'http://g.search.alicdn.com/img/i4/127861630/TB2GI4rdxTpK1RjSZFMXXbG_VXa_!!0-saturn_solar.jpg_220x220.jpg', '26');

-- --------------------------------------------------------

--
-- 表的结构 `uplink`
--

CREATE TABLE IF NOT EXISTS `uplink` (
  `upid` int(14) NOT NULL AUTO_INCREMENT,
  `uid` int(14) NOT NULL,
  `pid` int(14) NOT NULL,
  `numbers` varchar(14) NOT NULL,
  PRIMARY KEY (`upid`),
  KEY `fk_pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `uplink`
--

INSERT INTO `uplink` (`upid`, `uid`, `pid`, `numbers`) VALUES
(2, 1, 3, '5'),
(4, 1, 1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `usename` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `usename`, `pwd`) VALUES
(1, '33', '33'),
(2, '11', '11'),
(3, '22', '22');

--
-- 限制导出的表
--

--
-- 限制表 `uplink`
--
ALTER TABLE `uplink`
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`pid`) REFERENCES `protects` (`pid`),
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`pid`) REFERENCES `protects` (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
