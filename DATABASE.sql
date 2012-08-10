-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2012 at 02:25 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `NzAUTH`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `verifiedon` datetime DEFAULT NULL,
  `lastsignedinon` datetime DEFAULT NULL,
  `resetsenton` datetime DEFAULT NULL,
  `deletedon` datetime DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE IF NOT EXISTS `account_details` (
  `account_id` bigint(20) unsigned NOT NULL,
  `fullname` varchar(80) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `account_facebook`
--

CREATE TABLE IF NOT EXISTS `account_facebook` (
  `account_id` bigint(20) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `facebook_id` (`facebook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `account_twitter`
--

CREATE TABLE IF NOT EXISTS `account_twitter` (
  `account_id` bigint(20) NOT NULL,
  `twitter_id` bigint(20) NOT NULL,
  `oauth_token` varchar(80) NOT NULL,
  `oauth_token_secret` varchar(80) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `twitter_id` (`twitter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
