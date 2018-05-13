-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-04-24 09:36:17
-- 服务器版本： 5.7.18
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_dongfeng`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_game`
--

CREATE TABLE `app_game` (
  `id` int(11) NOT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `add_time` varchar(20) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `app_name_list`
--

CREATE TABLE `app_name_list` (
  `id` int(11) NOT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `add_time` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pw` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `app_users`
--

INSERT INTO `app_users` (`id`, `user_name`, `user_pw`) VALUES
(1, 'admin', 'eda1a8c2ed4d728d37aecb890a1f6818');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_game`
--
ALTER TABLE `app_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_name_list`
--
ALTER TABLE `app_name_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `app_game`
--
ALTER TABLE `app_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `app_name_list`
--
ALTER TABLE `app_name_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
