-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-09-29 11:24:40
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skye_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_admin`
--

CREATE TABLE IF NOT EXISTS `blog_admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `creattime` varchar(20) NOT NULL,
  `logt` varchar(20) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `loginip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `blog_admin`
--

INSERT INTO `blog_admin` (`id`, `username`, `password`, `creattime`, `logt`, `gid`, `loginip`) VALUES
(1, 'eblog', 'c8837b23ff8aaa8a2dde915473ce0991', '2015/09/18 18:18', '2015/09/29 17:15', 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

CREATE TABLE IF NOT EXISTS `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(88) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(16) NOT NULL,
  `pid` int(11) NOT NULL,
  `category` varchar(36) NOT NULL,
  `catename` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`id`, `title`, `tags`, `content`, `time`, `pid`, `category`, `catename`, `author`, `view`) VALUES
(78, '学习 Web 开发技术的16个最佳教程网站和博客', 'web,学习建站', '&lt;p&gt;互联网经过这么多年的发展，已经出现了众多的 Web 开发技术，像 .Net/Java/PHP/Python/Ruby 等等。对于 Web \r\n开发人员来说，不管是初学者还是有一定经验的开发人员都需要时刻学习新的开发技术。如今，网上有各种开发技术的相关网站，有大量开发资料可以参考。下面是\r\n我收集的15个非常优秀的学习 Web 开发技术的国外网站，如果大家有收藏更好的网站，欢迎推荐！&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://net.tutsplus.com/&quot; target=&quot;_blank&quot;&gt;Net Tuts+&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;是学习Web开发技术最著名的网站之一，订阅者超过10万，分享各种适合不同阶段的开发人员阅读的优秀教程。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://net.tutsplus.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/11-net-tuts-plus.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://css-tricks.com/&quot; target=&quot;_blank&quot;&gt;CSS Tricks&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;CSS Tricks&amp;nbsp;是学习CSS的最佳去处，发布关于CSS各个方面的教程，想加强CSS技术的朋友一定要收藏。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://css-tricks.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/13-css-tricks-online-web-magazine.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://coding.smashingmagazine.com/&quot; target=&quot;_blank&quot;&gt;Smashing Magazine&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;Smashing Magazine 是最优秀的前端技术网站之一，有各种优秀的前端设计和开发技术文章。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.smashingmagazine.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/02-smashing-magazine-coding.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.netmagazine.com/&quot; target=&quot;_blank&quot;&gt;.Net Magazine&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;一看名字还以为.NET教程网站，其实这个网站分享的主要内容是前端设计和开发的。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.netmagazine.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/17-dot-net-magazine.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.w3schools.com/&quot; target=&quot;_blank&quot;&gt;W3Schools&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;W3Schools &amp;nbsp;拥有非常齐全的 Web 开发技术资料，包括 HTML/CSS/JavaScript/ASP.NET/PHP/Web Services 等等。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.w3schools.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/03-w3schools-website-online.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.pixel2life.com/&quot; target=&quot;_blank&quot;&gt;Pixel2Life&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;Pixel2Life 拥有好90个类别，超过80,000的教程，有 Photoshop/Flash/HTML/CSS/JavaScript/PHP 等等。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.pixel2life.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/01-pixel2life-net-tutorials-resource.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.webmonkey.com/&quot; target=&quot;_blank&quot;&gt;Webmonkey&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;Webmonkey 分享各种 Web 开发和设计文章，有很多文章还是值得一读的。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.webmonkey.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/05-webmonkey-blog-online.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://teamtreehouse.com/&quot; target=&quot;_blank&quot;&gt;Treehouse&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;Treehouse 很特别，是一个会员制的学习网站，是学习Web应用和iOS应用开发及设计的好地方。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://teamtreehouse.com/&quot; target=&quot;_blank&quot;&gt;&lt;img class=&quot;imgborder&quot; src=&quot;http://designm.ag/wp-content/uploads/2012/05/06-treehouse-app-tutorials-videos.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.sitepoint.com/&quot; target=&quot;_blank&quot;&gt;Sitepoint&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;Sitepoint 重要分享 PHP、HTML5、CSS3、设计网页设计以及移动开发方面的教程和资讯。&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://www.sitepoint.com/&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://pic002.cnblogs.com/images/2012/36987/2012080722075664.jpg&quot; alt=&quot;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;h3&gt;&lt;a href=&quot;http://www.studentguidewebdesign.com/&quot; target=&quot;_blank&quot;&gt;Student Web Design Guide&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;故名思议，是一个帮助在校学生学习Web设计的网站，这个网站很有多精心编写的文章。&lt;/p&gt;', '2015/09/29 16:02', 0, '66', 'web技术', 'admin', 4);

-- --------------------------------------------------------

--
-- 表的结构 `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) NOT NULL,
  `catealias` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(12) NOT NULL,
  `orders` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `blog_category`
--

INSERT INTO `blog_category` (`id`, `catename`, `catealias`, `pid`, `path`, `orders`) VALUES
(66, 'web技术', 'web', 0, '', 0),
(67, 'html', 'html', 66, '', 0),
(68, 'css', 'css', 66, '', 0),
(69, 'PHP', 'php', 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_tags`
--

CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(50) NOT NULL,
  `artid` varchar(20000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `tagname`, `artid`) VALUES
(27, 'web', '78'),
(28, '学习建站', '78');

-- --------------------------------------------------------

--
-- 表的结构 `blog_website`
--

CREATE TABLE IF NOT EXISTS `blog_website` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `site` varchar(36) NOT NULL,
  `title` varchar(88) NOT NULL,
  `keywords` varchar(66) NOT NULL,
  `words` varchar(500) NOT NULL,
  `description` varchar(88) NOT NULL,
  `rights` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `blog_website`
--

INSERT INTO `blog_website` (`id`, `site`, `title`, `keywords`, `words`, `description`, `rights`) VALUES
(2, 'http://blog.com', 'eBlog', '', '太容易的路，往往不能把你带向远方。', 'Learned More,Do Great', 'Copyright © 2015  All Rights Reserved');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
