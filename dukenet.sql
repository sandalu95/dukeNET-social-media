-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 05:30 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dukenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'nice', 'charlie', 'mike', '2018-06-07 19:51:45', 'no', 24),
(2, 'pretty', 'choxy', 'mike', '2018-06-07 20:55:42', 'no', 24),
(3, 'Hii. After a long time.', 'choxy', 'charlie', '2018-06-08 06:30:17', 'no', 21),
(4, 'Hii Rusty', 'charlie', 'rusty', '2018-06-08 15:06:44', 'no', 23),
(5, 'Y don\'t u reply me', 'charlie', 'charlie', '2018-06-11 15:03:10', 'no', 30),
(6, 'Wowww..', 'rusty', 'charlie', '2018-06-11 17:58:27', 'no', 11),
(7, 'hiii', 'rusty', 'charlie', '2018-06-11 17:58:45', 'no', 29),
(8, 'nice', 'rusty', 'charlie', '2018-06-11 18:08:10', 'no', 12),
(9, 'good one..', 'rusty', 'charlie', '2018-06-11 18:08:23', 'no', 4),
(10, 'well..', 'rusty', 'charlie', '2018-06-11 18:09:14', 'no', 1),
(11, 'hii', 'charlie', 'charlie', '2018-06-11 19:43:50', 'no', 29),
(12, 'Wowww', 'charlie', 'choxy', '2018-06-12 15:05:47', 'no', 37),
(13, 'nice', 'charlie', 'choxy', '2018-06-12 16:56:34', 'no', 37),
(14, 'No comments', 'rusty', 'rusty', '2018-06-12 21:08:29', 'no', 39),
(15, 'This is loving', 'rusty', 'charlie', '2018-06-12 21:08:46', 'no', 36),
(16, 'Cuteee', 'bella', 'charlie', '2018-06-12 21:09:29', 'no', 32),
(17, 'Hii', 'choxy', 'charlie', '2018-06-13 13:37:17', 'no', 58),
(18, 'Cute Puppy. Is that you younger brother', 'choxy', 'charlie', '2018-06-13 13:37:43', 'no', 36),
(19, 'Ha Haaa.. Same as u buddy', 'choxy', 'charlie', '2018-06-13 13:37:59', 'no', 32),
(20, 'hello', 'charlie', 'charlie', '2018-06-16 10:43:23', 'no', 58);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(2, 'socky', 'charlie'),
(4, 'maxxa', 'charlie');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(2, 'choxy', 24),
(4, 'choxy', 22),
(7, 'charlie', 21),
(8, 'rusty', 29),
(9, 'rusty', 21),
(10, 'rusty', 11),
(11, 'rusty', 4),
(12, 'rusty', 1),
(13, 'charlie', 37),
(14, 'charlie', 24),
(15, 'charlie', 19),
(16, 'charlie', 17),
(17, 'rusty', 35),
(18, 'bella', 35),
(19, 'bella', 34),
(20, 'charlie', 58),
(21, 'charlie', 36);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'mike', 'charlie', 'Heyyy', '2018-06-09 13:56:02', 'yes', 'yes', 'no'),
(2, 'mike', 'charlie', 'How are you??', '2018-06-09 13:56:24', 'yes', 'yes', 'no'),
(3, 'mike', 'charlie', 'Wanna see u\r\n', '2018-06-09 13:56:39', 'yes', 'yes', 'no'),
(4, 'mike', 'charlie', 'badly\r\n', '2018-06-09 13:58:46', 'yes', 'yes', 'no'),
(5, 'mike', 'charlie', 'Miss u\r\n', '2018-06-09 14:02:01', 'yes', 'yes', 'no'),
(6, 'mike', 'charlie', 'hello', '2018-06-09 14:02:13', 'yes', 'yes', 'no'),
(7, 'mike', 'charlie', 'are u there?', '2018-06-09 14:02:20', 'yes', 'yes', 'no'),
(8, 'charlie', 'mike', 'Heyy', '2018-06-09 14:05:04', 'yes', 'yes', 'no'),
(9, 'charlie', 'mike', 'sry. i was doing some other stuff', '2018-06-09 14:05:28', 'yes', 'yes', 'no'),
(10, 'charlie', 'mike', 'ya.. After a long long time dude.', '2018-06-09 14:06:29', 'yes', 'yes', 'no'),
(11, 'charlie', 'choxy', 'Hii Charlie', '2018-06-09 14:59:40', 'yes', 'yes', 'no'),
(12, 'charlie', 'choxy', 'How are you?', '2018-06-09 14:59:48', 'yes', 'yes', 'no'),
(13, 'choxy', 'charlie', 'Hii', '2018-06-09 15:00:31', 'yes', 'yes', 'no'),
(14, 'choxy', 'charlie', 'Im fine. Thank u', '2018-06-09 15:00:42', 'yes', 'yes', 'no'),
(15, 'rusty', 'charlie', 'Hello Rusty', '2018-06-10 03:32:53', 'yes', 'yes', 'no'),
(16, 'maxxa', 'charlie', 'Hii maxxa', '2018-06-10 03:33:58', 'no', 'no', 'no'),
(17, 'lassi', 'charlie', 'Hii lassi', '2018-06-10 03:34:33', 'no', 'no', 'no'),
(18, 'bella', 'charlie', 'Bella accept my request', '2018-06-10 03:35:42', 'no', 'yes', 'no'),
(19, 'socky', 'charlie', 'Hello sockyy.. accept my request', '2018-06-10 03:36:19', 'no', 'no', 'no'),
(20, 'charlie', 'choxy', 'Nice to hear that buddy..', '2018-06-10 04:41:00', 'yes', 'yes', 'no'),
(21, 'charlie', 'choxy', 'Hey chalie im coming today', '2018-06-10 05:01:03', 'yes', 'yes', 'no'),
(22, 'mike', 'charlie', 'hiiii', '2018-06-11 14:45:06', 'yes', 'yes', 'no'),
(23, 'mike', 'charlie', 'hiiii', '2018-06-11 14:45:20', 'yes', 'yes', 'no'),
(24, 'rusty', 'charlie', 'are u there?', '2018-06-11 17:04:36', 'yes', 'yes', 'no'),
(25, 'charlie', 'rusty', 'Hellooo buddy', '2018-06-11 17:57:35', 'yes', 'yes', 'no'),
(26, 'rusty', 'charlie', 'Hii rusty', '2018-06-12 15:07:17', 'yes', 'yes', 'no'),
(27, 'charlie', 'rusty', 'Hii dr', '2018-06-12 21:08:13', 'yes', 'yes', 'no'),
(28, 'charlie', 'choxy', 'Charliee.. I am ill today.. They say that this is common these days', '2018-06-13 13:36:37', 'yes', 'yes', 'no'),
(29, 'charlie', 'choxy', 'Hope You are well', '2018-06-13 13:36:45', 'yes', 'yes', 'no'),
(30, 'choxy', 'charlie', 'ya im well', '2018-06-13 14:56:45', 'no', 'no', 'no'),
(31, 'rusty', 'charlie', 'how are u', '2018-07-12 21:45:30', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(1, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=29', '2018-06-11 17:57:41', 'no', 'yes'),
(2, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=11', '2018-06-11 17:58:27', 'yes', 'yes'),
(3, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=29', '2018-06-11 17:58:46', 'no', 'yes'),
(4, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=21', '2018-06-11 18:07:59', 'no', 'yes'),
(5, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=11', '2018-06-11 18:08:03', 'yes', 'yes'),
(6, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=12', '2018-06-11 18:08:10', 'yes', 'yes'),
(7, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=4', '2018-06-11 18:08:23', 'yes', 'yes'),
(8, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=4', '2018-06-11 18:08:26', 'yes', 'yes'),
(9, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=1', '2018-06-11 18:08:30', 'yes', 'yes'),
(10, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=1', '2018-06-11 18:09:14', 'yes', 'yes'),
(11, 'rusty', 'charlie', 'Charlie commented on a post you commented on', 'post.php?id=29', '2018-06-11 19:43:50', 'no', 'yes'),
(12, 'choxy', 'charlie', 'Charlie commented on your post', 'post.php?id=37', '2018-06-12 15:05:47', 'no', 'yes'),
(13, 'choxy', 'charlie', 'Charlie liked your post', 'post.php?id=37', '2018-06-12 15:05:49', 'no', 'yes'),
(14, 'mike', 'charlie', 'Charlie liked your post', 'post.php?id=24', '2018-06-12 15:08:56', 'no', 'yes'),
(15, 'mike', 'charlie', 'Charlie liked your post', 'post.php?id=19', '2018-06-12 15:08:59', 'no', 'yes'),
(16, 'mike', 'charlie', 'Charlie liked your post', 'post.php?id=17', '2018-06-12 15:09:00', 'no', 'yes'),
(17, 'choxy', 'charlie', 'Charlie commented on your post', 'post.php?id=37', '2018-06-12 16:56:35', 'no', 'yes'),
(18, 'charlie', 'rusty', 'Rusty commented on your post', 'post.php?id=36', '2018-06-12 21:08:46', 'yes', 'yes'),
(19, 'charlie', 'rusty', 'Rusty liked your post', 'post.php?id=35', '2018-06-12 21:08:52', 'yes', 'yes'),
(20, 'charlie', 'bella', 'Bella liked your post', 'post.php?id=35', '2018-06-12 21:09:20', 'yes', 'yes'),
(21, 'charlie', 'bella', 'Bella liked your post', 'post.php?id=34', '2018-06-12 21:09:21', 'yes', 'yes'),
(22, 'charlie', 'bella', 'Bella commented on your post', 'post.php?id=32', '2018-06-12 21:09:29', 'yes', 'yes'),
(23, 'charlie', 'choxy', 'Choxy commented on your post', 'post.php?id=58', '2018-06-13 13:37:18', 'no', 'yes'),
(24, 'charlie', 'choxy', 'Choxy commented on your post', 'post.php?id=36', '2018-06-13 13:37:43', 'yes', 'yes'),
(25, 'rusty', 'choxy', 'Choxy commented on a post you commented on', 'post.php?id=36', '2018-06-13 13:37:43', 'no', 'no'),
(26, 'charlie', 'choxy', 'Choxy commented on your post', 'post.php?id=32', '2018-06-13 13:37:59', 'yes', 'yes'),
(27, 'bella', 'choxy', 'Choxy commented on a post you commented on', 'post.php?id=32', '2018-06-13 13:37:59', 'no', 'no'),
(28, 'choxy', 'charlie', 'Charlie commented on a post you commented on', 'post.php?id=58', '2018-06-16 10:43:23', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `image`) VALUES
(1, 'This is charlie\'s 1st post', 'charlie', 'none', '2018-06-05 21:28:31', 'no', 'no', 1, ''),
(2, 'This is Choxy\'s 1st post', 'choxy', 'none', '2018-06-05 21:45:14', 'no', 'no', 0, ''),
(3, 'This is Dilmi\'s 1st post', 'rusty', 'none', '2018-06-05 21:46:43', 'no', 'no', 0, ''),
(4, 'This is Charlie\'s 2nd', 'charlie', 'none', '2018-06-06 02:51:56', 'no', 'no', 1, ''),
(5, 'This is choxy\'s 2nd', 'choxy', 'none', '2018-06-06 02:52:21', 'no', 'no', 0, ''),
(6, 'This is rusty\'s 2nd', 'rusty', 'none', '2018-06-06 02:52:44', 'no', 'no', 0, ''),
(7, 'This is mike\'s ist post', 'mike', 'none', '2018-06-06 02:53:15', 'no', 'no', 0, ''),
(8, 'This is mike\'s 2nd', 'mike', 'none', '2018-06-06 02:53:25', 'no', 'no', 0, ''),
(9, 'This is bella\'s 1st post', 'bella', 'none', '2018-06-06 02:54:23', 'no', 'no', 0, ''),
(10, 'This is bella\'s 2nd', 'bella', 'none', '2018-06-06 02:54:34', 'no', 'no', 0, ''),
(11, 'This is charlie\'s 3rd', 'charlie', 'none', '2018-06-06 20:01:44', 'no', 'no', 1, ''),
(12, 'This is charlie\'s 4th', 'charlie', 'none', '2018-06-06 20:01:58', 'no', 'no', 0, ''),
(13, 'This is rusty\'s 3rd', 'rusty', 'none', '2018-06-06 20:02:35', 'no', 'no', 0, ''),
(14, 'This is rusty\'s 4th', 'rusty', 'none', '2018-06-06 20:02:43', 'no', 'no', 0, ''),
(15, 'This is choxy\'s 3rd', 'choxy', 'none', '2018-06-06 20:05:07', 'no', 'no', 0, ''),
(16, 'This is choxy\'s 4th', 'choxy', 'none', '2018-06-06 20:05:35', 'no', 'no', 0, ''),
(17, 'This is mike\'s 3rd', 'mike', 'none', '2018-06-06 20:07:12', 'no', 'no', 1, ''),
(18, 'This is bella\'s 3rd', 'bella', 'none', '2018-06-06 20:07:43', 'no', 'no', 0, ''),
(19, 'This is mike\'s 4th', 'mike', 'none', '2018-06-06 20:08:20', 'no', 'no', 1, ''),
(20, 'This is bella\'s 4th', 'bella', 'none', '2018-06-06 20:08:43', 'no', 'no', 0, ''),
(21, 'This is charlie\'s 5th', 'charlie', 'none', '2018-06-06 20:09:08', 'no', 'no', 2, ''),
(22, 'This is choxy\'s 5th', 'choxy', 'none', '2018-06-06 20:09:33', 'no', 'no', 1, ''),
(23, 'This is rusty\'s 5th', 'rusty', 'none', '2018-06-06 20:09:55', 'no', 'no', 0, ''),
(24, 'This is mike\'s 5th', 'mike', 'none', '2018-06-06 20:10:18', 'no', 'no', 2, ''),
(25, 'This is bella\'s 5th', 'bella', 'none', '2018-06-06 20:10:41', 'no', 'no', 0, ''),
(26, 'Heyy', 'charlie', 'mike', '2018-06-08 20:59:32', 'no', 'no', 0, ''),
(27, 'Hii Rusty!', 'charlie', 'rusty', '2018-06-08 21:13:02', 'no', 'yes', 0, ''),
(28, 'Buddyy', 'charlie', 'mike', '2018-06-09 13:58:46', 'no', 'no', 0, ''),
(29, 'hellooo', 'charlie', 'none', '2018-06-11 14:44:32', 'no', 'no', 1, ''),
(30, 'helloo mike', 'charlie', 'mike', '2018-06-11 14:45:20', 'no', 'no', 0, ''),
(31, '<br><iframe width=\'420\' height=\'315\'https://www.youtube.com/embed/f8VYNWzJAmE\'></iframe><br>', 'charlie', 'none', '2018-06-12 02:34:24', 'no', 'yes', 0, ''),
(32, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/f8VYNWzJAmE\'></iframe><br>', 'charlie', 'none', '2018-06-12 02:47:47', 'no', 'yes', 0, ''),
(33, 'Shitzu puppies are the best in the world', 'charlie', 'none', '2018-06-12 03:22:26', 'no', 'no', 0, ''),
(34, 'This is so cute', 'charlie', 'none', '2018-06-12 03:55:01', 'no', 'no', 1, ''),
(35, 'This is so cute', 'charlie', 'none', '2018-06-12 03:58:23', 'no', 'no', 2, ''),
(36, 'anahhh', 'charlie', 'none', '2018-06-12 04:01:14', 'no', 'no', 1, 'assets/images/posts/5b1ef83205b8e92220-dogs-papillon-puppy-wallpaper.jpg'),
(37, 'Meee...', 'choxy', 'none', '2018-06-12 12:12:52', 'no', 'no', 1, 'assets/images/posts/5b1f6b6c8755bdog-871773_1280.jpg'),
(38, 'I am so lazy', 'mike', 'none', '2018-06-12 21:07:24', 'no', 'no', 0, ''),
(39, 'Anything special with my buddies..', 'rusty', 'none', '2018-06-12 21:07:56', 'no', 'no', 0, ''),
(40, 'with my wife', 'charlie', 'none', '2018-06-12 22:48:10', 'no', 'yes', 0, 'assets/images/posts/5b200052d807aDogs-Wallpaper-HD.jpg'),
(41, 'with my wife', 'charlie', 'none', '2018-06-12 22:48:31', 'no', 'yes', 0, 'assets/images/posts/5b200067a6c97Dogs-Wallpaper-HD.jpg'),
(42, 'with my wife', 'charlie', 'none', '2018-06-12 22:48:41', 'no', 'yes', 0, 'assets/images/posts/5b20007134fb9Dogs-Wallpaper-HD.jpg'),
(43, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/p336IIjZCl8\'></iframe><br>', 'charlie', 'none', '2018-06-13 01:24:21', 'no', 'yes', 0, ''),
(44, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/p336IIjZCl8\'></iframe><br>', 'charlie', 'none', '2018-06-13 01:24:26', 'no', 'yes', 0, ''),
(45, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/p336IIjZCl8\'></iframe><br>', 'charlie', 'none', '2018-06-13 01:24:30', 'no', 'yes', 0, ''),
(46, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/p336IIjZCl8\'></iframe><br>', 'charlie', 'none', '2018-06-13 01:24:34', 'no', 'yes', 0, ''),
(47, '<br><iframe width=\'420\' height=\'315\' src=\'https://www.youtube.com/embed/p336IIjZCl8\'></iframe><br>', 'charlie', 'none', '2018-06-13 01:24:43', 'no', 'yes', 0, ''),
(55, 'hii', 'charlie', 'none', '2018-06-13 01:27:14', 'no', 'yes', 0, ''),
(56, 'hiooo', 'charlie', 'none', '2018-06-13 01:27:27', 'no', 'yes', 0, ''),
(57, 'hiooo', 'charlie', 'none', '2018-06-13 01:27:50', 'no', 'no', 0, ''),
(58, 'hiii', 'charlie', 'none', '2018-06-13 12:35:43', 'no', 'no', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `title` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trends`
--

INSERT INTO `trends` (`title`, `hits`) VALUES
('Shitzu', 1),
('Puppies', 1),
('World', 1),
('Cute', 2),
('Anahhh', 1),
('Meee', 1),
('Lazy', 1),
('Special', 1),
('Buddies', 1),
('Wife', 3),
('Hii', 8),
('Hiooo', 2),
('Hiii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `my_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `my_name`, `username`, `year`, `month`, `owner_name`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Charlie', 'charlie', 2017, 9, 'Sandalu', 'sandalu@gmail.com', '8bb4af0567cf668543c8cf735dbdf884', '0000-00-00', 'assets/images/profile_pics/charlieef882aa5721d490de238f5a23b2eaf48n.jpeg', 35, 11, 'no', ',choxy,rusty,bella,merlin,mike,'),
(2, 'Mike', 'mike', 2013, 7, 'Manel', 'manel@gmail.com', '95ab6cdfaa9d646f83061a936bfb8996', '0000-00-00', 'assets/images/profile_pics/mikebb44c45b5b8cc11533a437c7bfb8f25an.jpeg', 6, 4, 'no', ',choxy,charlie,'),
(3, 'Bella', 'bella', 2010, 6, 'Sagarika', 'sagarika@gmail.com', '8350adb55baa13f09bfb53b0d51caf2d', '0000-00-00', 'assets/images/profile_pics/bella4c79ad7fd51c932f55004f3cb9cb07can.jpeg', 5, 0, 'no', ',charlie,'),
(4, 'Choxy', 'choxy', 2013, 6, 'Ishara', 'ishara@gmail.com', '05a823c101178dd5ad81d43147007355', '0000-00-00', 'assets/images/profile_pics/choxyad5539aa98e10980361e6325c6fc075bn.jpeg', 6, 2, 'no', ',charlie,mike,'),
(5, 'Rusty', 'rusty', 2016, 8, 'Dilmi', 'dilmi@gmail.com', 'cb9308cbb6d90e3aca9268e5aad91021', '2018-05-13', 'assets/images/profile_pics/rusty0696cc2dab8a981e484d7f2c59071404n.jpeg', 6, 0, 'no', ',charlie,'),
(6, 'Lassi', 'lassi', 2015, 10, 'Lakshan', 'lakshan@gmail.com', '78566a3f35a5585741658e12fa3bfb3a', '2018-06-07', 'assets/images/profile_pics/defaults/head_turqoise.png', 0, 0, 'no', ','),
(7, 'Socky', 'socky', 2011, 9, 'Dammika', 'dammika@gmail.com', '903d034abb06384d7b43902a0459e7ba', '2018-06-07', 'assets/images/profile_pics/defaults/head_pete_river.png', 0, 0, 'no', ','),
(8, 'Fanta', 'fanta', 2016, 10, 'Tharaka', 'tharaka@gmail.com', '1e34ffd77e7fdf2d1ebd24e180693536', '2018-06-07', 'assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no', ','),
(9, 'Maxxa', 'maxxa', 2020, 9, 'Upuli', 'upuli@gmail.com', 'ee5e4ba1e71bdc15747adc1861b887e0', '2018-06-07', 'assets/images/profile_pics/defaults/head_turqoise.png', 0, 0, 'no', ','),
(10, 'Merlin', 'merlin', 2013, 4, 'Githmi', 'githmi@gmail.com', 'c53e3b3037b68744aba35aaf5db12cb9', '2018-06-07', 'assets/images/profile_pics/defaults/head_turqoise.png', 0, 0, 'no', ',charlie,'),
(11, 'Brown', 'brown', 2018, 3, 'Mevuni', 'mevuni@gmail.com', '84cc2d63996f3e7ebfa4fcd44d05e472', '2018-06-13', 'assets/images/profile_pics/defaults/head_turqoise.png', 0, 0, 'no', ','),
(13, 'Admin', 'admin', 2020, 12, 'Sandalu', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2018-06-13', 'assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no', ','),
(14, 'Cool', 'cool', 2018, 7, 'Yasasi', 'yasasi@gmail.com', 'bc21e90682b0ee0d7829edcc02d23ecf', '2018-06-13', 'assets/images/profile_pics/defaults/head_sun_flower.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
