-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 09 日 23:46
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- 表的结构 `blog_commentmeta`
--

CREATE TABLE IF NOT EXISTS `blog_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `blog_comments`
--

INSERT INTO `blog_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'WordPress先生', '', 'https://wordpress.org/', '', '2015-03-08 07:20:08', '2015-03-08 07:20:08', '您好，这是一条评论。\n要删除评论，请先登录，然后再查看这篇文章的评论。登录后您可以看到编辑或者删除评论的选项。', 0, '1', '', '', 0, 0),
(2, 6, 'luckymc', '327919416@qq.com', '', '127.0.0.1', '2015-03-08 15:39:23', '2015-03-08 07:39:23', '测试一下', 0, '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_links`
--

CREATE TABLE IF NOT EXISTS `blog_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `blog_options`
--

CREATE TABLE IF NOT EXISTS `blog_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=232 ;

--
-- 转存表中的数据 `blog_options`
--

INSERT INTO `blog_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost:88', 'yes'),
(2, 'home', 'http://localhost:88', 'yes'),
(3, 'blogname', 'Dream', 'yes'),
(4, 'blogdescription', 'on the way', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', '327919416@qq.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '1', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'Y年n月j日', 'yes'),
(24, 'time_format', 'ag:i', 'yes'),
(25, 'links_updated_date_format', 'Y年n月j日ag:i', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '', 'yes'),
(29, 'gzipcompression', '0', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', 'a:3:{i:0;s:57:"D:\\wamp\\www\\wordpress/wp-content/themes/zborder/style.css";i:1;s:61:"D:\\wamp\\www\\wordpress/wp-content/themes/wpbootstrap/style.css";i:2;s:0:"";}', 'no'),
(41, 'template', 'zborder', 'yes'),
(42, 'stylesheet', 'zborder', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '30133', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:1;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:0:{}', 'yes'),
(81, 'widget_rss', 'a:0:{}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', 'Asia/Shanghai', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '30133', 'yes'),
(89, 'blog_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(90, 'WPLANG', 'zh_CN', 'yes'),
(91, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'sidebars_widgets', 'a:6:{s:19:"wp_inactive_widgets";a:1:{i:0;s:8:"search-2";}s:19:"primary-widget-area";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}s:20:"singular-widget-area";a:0:{}s:24:"not-singular-widget-area";a:0:{}s:18:"footer-widget-area";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(97, 'cron', 'a:5:{i:1425928814;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1425942600;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1425972023;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1425973023;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(100, '_transient_random_seed', '290222e3759cf58c22309371ef4164d0', 'yes'),
(106, '_site_transient_timeout_browser_e008fe6d3b29c30fddfb1e11b6e18a6d', '1426404027', 'yes'),
(107, '_site_transient_browser_e008fe6d3b29c30fddfb1e11b6e18a6d', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"31.0.1650.63";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(108, 'can_compress_scripts', '1', 'yes'),
(126, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.1.1.zip";s:6:"locale";s:5:"zh_CN";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.1.1.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.1.1-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.1.1-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.1.1";s:7:"version";s:5:"4.1.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.1";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1425902004;s:15:"version_checked";s:5:"4.1.1";s:12:"translations";a:0:{}}', 'yes'),
(127, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1425914807;s:7:"checked";a:5:{s:10:"likegoogle";s:5:"1.0.0";s:13:"twentyfifteen";s:3:"1.0";s:14:"twentyfourteen";s:3:"1.3";s:14:"twentythirteen";s:3:"1.4";s:7:"zborder";s:5:"0.9.5";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'yes'),
(128, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1425902005;s:8:"response";a:0:{}s:12:"translations";a:0:{}s:9:"no_update";a:2:{s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.0.4";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.0.4.zip";}s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}}}', 'yes'),
(129, 'auto_core_update_notified', 'a:4:{s:4:"type";s:7:"success";s:5:"email";s:16:"327919416@qq.com";s:7:"version";s:5:"4.1.1";s:9:"timestamp";i:1425799259;}', 'yes'),
(132, '_transient_twentyfifteen_categories', '1', 'yes'),
(134, 'current_theme', 'zBorder', 'yes'),
(135, 'theme_mods_likegoogle', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:8:"top-menu";i:12;s:9:"main-menu";i:6;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425825928;s:4:"data";a:5:{s:19:"wp_inactive_widgets";a:0:{}s:19:"primary-widget-area";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}s:24:"first-footer-widget-area";a:0:{}s:25:"second-footer-widget-area";a:0:{}s:24:"third-footer-widget-area";a:0:{}}}}', 'yes'),
(136, 'theme_switched', '', 'yes'),
(137, 'sith_active', '4.1', 'yes'),
(138, 'sith_cat_1', 'a:5:{s:11:"cat_sidebar";b:0;s:10:"cat_slider";b:0;s:9:"cat_color";b:0;s:14:"cat_background";b:0;s:19:"cat_background_full";b:0;}', 'yes'),
(139, 'sith_options', 'a:49:{s:13:"post_og_cards";b:1;s:14:"slider_caption";b:0;s:6:"slider";b:1;s:21:"slider_caption_length";i:100;s:14:"box_meta_score";b:1;s:13:"box_meta_date";b:1;s:17:"box_meta_comments";b:1;s:13:"arc_meta_date";b:1;s:17:"arc_meta_comments";b:1;s:16:"modern_scrollbar";b:1;s:10:"theme_skin";s:7:"default";s:15:"header_position";s:18:"header_pos_default";s:12:"logo_setting";s:4:"logo";s:11:"logo_margin";i:0;s:13:"header_search";b:0;s:19:"header_social_icons";b:0;s:11:"breadcrumbs";b:1;s:21:"breadcrumbs_delimiter";s:2:"»";s:11:"sidebar_pos";s:5:"right";s:19:"post_title_position";b:0;s:11:"home_layout";s:2:"li";s:19:"home_posts_template";s:12:"loop-excerpt";s:22:"post_excerpt_thumbnail";s:9:"thumbnail";s:15:"home_exc_length";s:2:"15";s:13:"excerpt_limit";s:3:"200";s:11:"title_limit";s:3:"128";s:14:"post_authorbio";b:0;s:8:"post_nav";b:1;s:9:"post_meta";b:1;s:11:"post_author";b:1;s:9:"post_date";b:1;s:9:"post_cats";b:0;s:13:"post_comments";b:1;s:9:"post_tags";b:1;s:10:"share_post";b:1;s:11:"share_tweet";b:1;s:14:"share_facebook";b:1;s:12:"share_google";b:1;s:13:"share_linkdin";b:0;s:13:"share_stumble";b:0;s:15:"share_pinterest";b:0;s:7:"related";b:1;s:14:"related_number";s:1:"3";s:13:"related_query";s:8:"category";s:13:"footer_social";b:1;s:14:"footer_widgets";s:9:"footer-3c";s:11:"footer_text";s:176:"&#169; 2014 - All Rights Reserved - Powered by <a href="http://www.wordpress.com">WordPress</a> | Designed by <a href="http://www.themenovum.com" target="_blank">ThemeNovum</a>";s:10:"author_bio";b:1;s:12:"notify_theme";b:1;}', 'yes'),
(140, 'notifier-cache-LikeGoogle', '<html>\r\n<head><title>403 Forbidden</title></head>\r\n<body bgcolor="white">\r\n<center><h1>403 Forbidden</h1></center>\r\n<hr><center>nginx</center>\r\n</body>\r\n</html>\r\n', 'yes'),
(141, 'notifier-cache-last-updated-LikeGoogle', '1425799497', 'yes'),
(149, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(173, 'theme_mods_wpbootstrap', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:7:"primary";i:12;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425825345;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:1:{i:0;s:8:"search-2";}s:19:"primary-widget-area";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}s:21:"secondary-widget-area";a:0:{}}}}', 'yes'),
(183, '_site_transient_timeout_available_translations', '1425826931', 'yes'),
(184, '_site_transient_available_translations', 'a:51:{s:2:"ar";a:8:{s:8:"language";s:2:"ar";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-17 19:01:24";s:12:"english_name";s:6:"Arabic";s:11:"native_name";s:14:"العربية";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/ar.zip";s:3:"iso";a:2:{i:1;s:2:"ar";i:2;s:3:"ara";}s:7:"strings";a:1:{s:8:"continue";s:16:"المتابعة";}}s:2:"az";a:8:{s:8:"language";s:2:"az";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-27 15:23:28";s:12:"english_name";s:11:"Azerbaijani";s:11:"native_name";s:16:"Azərbaycan dili";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/az.zip";s:3:"iso";a:2:{i:1;s:2:"az";i:2;s:3:"aze";}s:7:"strings";a:1:{s:8:"continue";s:5:"Davam";}}s:5:"bg_BG";a:8:{s:8:"language";s:5:"bg_BG";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 11:10:33";s:12:"english_name";s:9:"Bulgarian";s:11:"native_name";s:18:"Български";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/bg_BG.zip";s:3:"iso";a:2:{i:1;s:2:"bg";i:2;s:3:"bul";}s:7:"strings";a:1:{s:8:"continue";s:22:"Продължение";}}s:5:"bs_BA";a:8:{s:8:"language";s:5:"bs_BA";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-08 17:39:56";s:12:"english_name";s:7:"Bosnian";s:11:"native_name";s:8:"Bosanski";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/bs_BA.zip";s:3:"iso";a:2:{i:1;s:2:"bs";i:2;s:3:"bos";}s:7:"strings";a:1:{s:8:"continue";s:7:"Nastavi";}}s:2:"ca";a:8:{s:8:"language";s:2:"ca";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-26 03:38:28";s:12:"english_name";s:7:"Catalan";s:11:"native_name";s:7:"Català";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/ca.zip";s:3:"iso";a:2:{i:1;s:2:"ca";i:2;s:3:"cat";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continua";}}s:2:"cy";a:8:{s:8:"language";s:2:"cy";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-03-03 13:54:58";s:12:"english_name";s:5:"Welsh";s:11:"native_name";s:7:"Cymraeg";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/cy.zip";s:3:"iso";a:2:{i:1;s:2:"cy";i:2;s:3:"cym";}s:7:"strings";a:1:{s:8:"continue";s:6:"Parhau";}}s:5:"da_DK";a:8:{s:8:"language";s:5:"da_DK";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 22:27:33";s:12:"english_name";s:6:"Danish";s:11:"native_name";s:5:"Dansk";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/da_DK.zip";s:3:"iso";a:2:{i:1;s:2:"da";i:2;s:3:"dan";}s:7:"strings";a:1:{s:8:"continue";s:12:"Forts&#230;t";}}s:5:"de_CH";a:8:{s:8:"language";s:5:"de_CH";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-04 12:59:40";s:12:"english_name";s:20:"German (Switzerland)";s:11:"native_name";s:17:"Deutsch (Schweiz)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/de_CH.zip";s:3:"iso";a:1:{i:1;s:2:"de";}s:7:"strings";a:1:{s:8:"continue";s:10:"Fortfahren";}}s:5:"de_DE";a:8:{s:8:"language";s:5:"de_DE";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 11:05:07";s:12:"english_name";s:6:"German";s:11:"native_name";s:7:"Deutsch";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/de_DE.zip";s:3:"iso";a:1:{i:1;s:2:"de";}s:7:"strings";a:1:{s:8:"continue";s:10:"Fortfahren";}}s:2:"el";a:8:{s:8:"language";s:2:"el";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-03-05 22:03:06";s:12:"english_name";s:5:"Greek";s:11:"native_name";s:16:"Ελληνικά";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/el.zip";s:3:"iso";a:2:{i:1;s:2:"el";i:2;s:3:"ell";}s:7:"strings";a:1:{s:8:"continue";s:16:"Συνέχεια";}}s:5:"en_GB";a:8:{s:8:"language";s:5:"en_GB";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-17 20:53:36";s:12:"english_name";s:12:"English (UK)";s:11:"native_name";s:12:"English (UK)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/en_GB.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_CA";a:8:{s:8:"language";s:5:"en_CA";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-28 01:01:02";s:12:"english_name";s:16:"English (Canada)";s:11:"native_name";s:16:"English (Canada)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/en_CA.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_AU";a:8:{s:8:"language";s:5:"en_AU";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-05 09:59:30";s:12:"english_name";s:19:"English (Australia)";s:11:"native_name";s:19:"English (Australia)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/en_AU.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:2:"eo";a:8:{s:8:"language";s:2:"eo";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 13:11:32";s:12:"english_name";s:9:"Esperanto";s:11:"native_name";s:9:"Esperanto";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/eo.zip";s:3:"iso";a:2:{i:1;s:2:"eo";i:2;s:3:"epo";}s:7:"strings";a:1:{s:8:"continue";s:8:"Daŭrigi";}}s:5:"es_MX";a:8:{s:8:"language";s:5:"es_MX";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-05 15:18:10";s:12:"english_name";s:16:"Spanish (Mexico)";s:11:"native_name";s:19:"Español de México";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/es_MX.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_ES";a:8:{s:8:"language";s:5:"es_ES";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-25 14:34:19";s:12:"english_name";s:15:"Spanish (Spain)";s:11:"native_name";s:8:"Español";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/es_ES.zip";s:3:"iso";a:1:{i:1;s:2:"es";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_PE";a:8:{s:8:"language";s:5:"es_PE";s:7:"version";s:3:"4.1";s:7:"updated";s:19:"2014-12-19 08:14:32";s:12:"english_name";s:14:"Spanish (Peru)";s:11:"native_name";s:17:"Español de Perú";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.1/es_PE.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_CL";a:8:{s:8:"language";s:5:"es_CL";s:7:"version";s:3:"4.0";s:7:"updated";s:19:"2014-09-04 19:47:01";s:12:"english_name";s:15:"Spanish (Chile)";s:11:"native_name";s:17:"Español de Chile";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.0/es_CL.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:2:"eu";a:8:{s:8:"language";s:2:"eu";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-09 12:20:08";s:12:"english_name";s:6:"Basque";s:11:"native_name";s:7:"Euskara";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/eu.zip";s:3:"iso";a:2:{i:1;s:2:"eu";i:2;s:3:"eus";}s:7:"strings";a:1:{s:8:"continue";s:8:"Jarraitu";}}s:5:"fa_IR";a:8:{s:8:"language";s:5:"fa_IR";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-23 14:29:09";s:12:"english_name";s:7:"Persian";s:11:"native_name";s:10:"فارسی";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/fa_IR.zip";s:3:"iso";a:2:{i:1;s:2:"fa";i:2;s:3:"fas";}s:7:"strings";a:1:{s:8:"continue";s:10:"ادامه";}}s:2:"fi";a:8:{s:8:"language";s:2:"fi";s:7:"version";s:3:"4.1";s:7:"updated";s:19:"2014-12-17 07:01:16";s:12:"english_name";s:7:"Finnish";s:11:"native_name";s:5:"Suomi";s:7:"package";s:59:"https://downloads.wordpress.org/translation/core/4.1/fi.zip";s:3:"iso";a:2:{i:1;s:2:"fi";i:2;s:3:"fin";}s:7:"strings";a:1:{s:8:"continue";s:5:"Jatka";}}s:5:"fr_FR";a:8:{s:8:"language";s:5:"fr_FR";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-17 19:01:48";s:12:"english_name";s:15:"French (France)";s:11:"native_name";s:9:"Français";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/fr_FR.zip";s:3:"iso";a:1:{i:1;s:2:"fr";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuer";}}s:2:"gd";a:8:{s:8:"language";s:2:"gd";s:7:"version";s:3:"4.0";s:7:"updated";s:19:"2014-09-05 17:37:43";s:12:"english_name";s:15:"Scottish Gaelic";s:11:"native_name";s:9:"Gàidhlig";s:7:"package";s:59:"https://downloads.wordpress.org/translation/core/4.0/gd.zip";s:3:"iso";a:3:{i:1;s:2:"gd";i:2;s:3:"gla";i:3;s:3:"gla";}s:7:"strings";a:1:{s:8:"continue";s:15:"Lean air adhart";}}s:5:"gl_ES";a:8:{s:8:"language";s:5:"gl_ES";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-17 18:37:43";s:12:"english_name";s:8:"Galician";s:11:"native_name";s:6:"Galego";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/gl_ES.zip";s:3:"iso";a:2:{i:1;s:2:"gl";i:2;s:3:"glg";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:3:"haz";a:8:{s:8:"language";s:3:"haz";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-12 01:05:09";s:12:"english_name";s:8:"Hazaragi";s:11:"native_name";s:15:"هزاره گی";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.1.1/haz.zip";s:3:"iso";a:2:{i:1;s:3:"haz";i:2;s:3:"haz";}s:7:"strings";a:1:{s:8:"continue";s:10:"ادامه";}}s:5:"he_IL";a:8:{s:8:"language";s:5:"he_IL";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-03-03 17:11:23";s:12:"english_name";s:6:"Hebrew";s:11:"native_name";s:16:"עִבְרִית";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/he_IL.zip";s:3:"iso";a:1:{i:1;s:2:"he";}s:7:"strings";a:1:{s:8:"continue";s:12:"להמשיך";}}s:2:"hr";a:8:{s:8:"language";s:2:"hr";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-20 16:50:00";s:12:"english_name";s:8:"Croatian";s:11:"native_name";s:8:"Hrvatski";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/hr.zip";s:3:"iso";a:2:{i:1;s:2:"hr";i:2;s:3:"hrv";}s:7:"strings";a:1:{s:8:"continue";s:7:"Nastavi";}}s:5:"hu_HU";a:8:{s:8:"language";s:5:"hu_HU";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-15 20:01:36";s:12:"english_name";s:9:"Hungarian";s:11:"native_name";s:6:"Magyar";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/hu_HU.zip";s:3:"iso";a:2:{i:1;s:2:"hu";i:2;s:3:"hun";}s:7:"strings";a:1:{s:8:"continue";s:7:"Tovább";}}s:5:"id_ID";a:8:{s:8:"language";s:5:"id_ID";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-31 07:30:24";s:12:"english_name";s:10:"Indonesian";s:11:"native_name";s:16:"Bahasa Indonesia";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/id_ID.zip";s:3:"iso";a:2:{i:1;s:2:"id";i:2;s:3:"ind";}s:7:"strings";a:1:{s:8:"continue";s:9:"Lanjutkan";}}s:5:"is_IS";a:8:{s:8:"language";s:5:"is_IS";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-26 01:33:47";s:12:"english_name";s:9:"Icelandic";s:11:"native_name";s:9:"Íslenska";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/is_IS.zip";s:3:"iso";a:2:{i:1;s:2:"is";i:2;s:3:"isl";}s:7:"strings";a:1:{s:8:"continue";s:6:"Áfram";}}s:5:"it_IT";a:8:{s:8:"language";s:5:"it_IT";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-03-02 13:41:23";s:12:"english_name";s:7:"Italian";s:11:"native_name";s:8:"Italiano";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/it_IT.zip";s:3:"iso";a:2:{i:1;s:2:"it";i:2;s:3:"ita";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continua";}}s:2:"ja";a:8:{s:8:"language";s:2:"ja";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-29 10:53:40";s:12:"english_name";s:8:"Japanese";s:11:"native_name";s:9:"日本語";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/ja.zip";s:3:"iso";a:1:{i:1;s:2:"ja";}s:7:"strings";a:1:{s:8:"continue";s:9:"続ける";}}s:5:"ko_KR";a:8:{s:8:"language";s:5:"ko_KR";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-21 03:05:42";s:12:"english_name";s:6:"Korean";s:11:"native_name";s:9:"한국어";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/ko_KR.zip";s:3:"iso";a:2:{i:1;s:2:"ko";i:2;s:3:"kor";}s:7:"strings";a:1:{s:8:"continue";s:6:"계속";}}s:5:"lt_LT";a:8:{s:8:"language";s:5:"lt_LT";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-08 00:36:50";s:12:"english_name";s:10:"Lithuanian";s:11:"native_name";s:15:"Lietuvių kalba";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/lt_LT.zip";s:3:"iso";a:2:{i:1;s:2:"lt";i:2;s:3:"lit";}s:7:"strings";a:1:{s:8:"continue";s:6:"Tęsti";}}s:5:"my_MM";a:8:{s:8:"language";s:5:"my_MM";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-23 10:05:46";s:12:"english_name";s:7:"Burmese";s:11:"native_name";s:15:"ဗမာစာ";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/my_MM.zip";s:3:"iso";a:2:{i:1;s:2:"my";i:2;s:3:"mya";}s:7:"strings";a:1:{s:8:"continue";s:54:"ဆက်လက်လုပ်ေဆာင်ပါ။";}}s:5:"nb_NO";a:8:{s:8:"language";s:5:"nb_NO";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 11:09:37";s:12:"english_name";s:19:"Norwegian (Bokmål)";s:11:"native_name";s:13:"Norsk bokmål";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/nb_NO.zip";s:3:"iso";a:2:{i:1;s:2:"nb";i:2;s:3:"nob";}s:7:"strings";a:1:{s:8:"continue";s:8:"Fortsett";}}s:5:"nl_NL";a:8:{s:8:"language";s:5:"nl_NL";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-18 13:44:24";s:12:"english_name";s:5:"Dutch";s:11:"native_name";s:10:"Nederlands";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/nl_NL.zip";s:3:"iso";a:2:{i:1;s:2:"nl";i:2;s:3:"nld";}s:7:"strings";a:1:{s:8:"continue";s:8:"Doorgaan";}}s:5:"pl_PL";a:8:{s:8:"language";s:5:"pl_PL";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-16 15:47:22";s:12:"english_name";s:6:"Polish";s:11:"native_name";s:6:"Polski";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/pl_PL.zip";s:3:"iso";a:2:{i:1;s:2:"pl";i:2;s:3:"pol";}s:7:"strings";a:1:{s:8:"continue";s:9:"Kontynuuj";}}s:5:"pt_PT";a:8:{s:8:"language";s:5:"pt_PT";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-25 20:46:09";s:12:"english_name";s:21:"Portuguese (Portugal)";s:11:"native_name";s:10:"Português";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/pt_PT.zip";s:3:"iso";a:1:{i:1;s:2:"pt";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"pt_BR";a:8:{s:8:"language";s:5:"pt_BR";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-19 19:37:03";s:12:"english_name";s:19:"Portuguese (Brazil)";s:11:"native_name";s:20:"Português do Brasil";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/pt_BR.zip";s:3:"iso";a:2:{i:1;s:2:"pt";i:2;s:3:"por";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"ro_RO";a:8:{s:8:"language";s:5:"ro_RO";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-23 20:32:43";s:12:"english_name";s:8:"Romanian";s:11:"native_name";s:8:"Română";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/ro_RO.zip";s:3:"iso";a:2:{i:1;s:2:"ro";i:2;s:3:"ron";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuă";}}s:5:"ru_RU";a:8:{s:8:"language";s:5:"ru_RU";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-17 18:16:58";s:12:"english_name";s:7:"Russian";s:11:"native_name";s:14:"Русский";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/ru_RU.zip";s:3:"iso";a:2:{i:1;s:2:"ru";i:2;s:3:"rus";}s:7:"strings";a:1:{s:8:"continue";s:20:"Продолжить";}}s:5:"sk_SK";a:8:{s:8:"language";s:5:"sk_SK";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-03-02 18:38:35";s:12:"english_name";s:6:"Slovak";s:11:"native_name";s:11:"Slovenčina";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/sk_SK.zip";s:3:"iso";a:2:{i:1;s:2:"sk";i:2;s:3:"slk";}s:7:"strings";a:1:{s:8:"continue";s:12:"Pokračovať";}}s:5:"sl_SI";a:8:{s:8:"language";s:5:"sl_SI";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-13 22:38:48";s:12:"english_name";s:9:"Slovenian";s:11:"native_name";s:13:"Slovenščina";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/sl_SI.zip";s:3:"iso";a:2:{i:1;s:2:"sl";i:2;s:3:"slv";}s:7:"strings";a:1:{s:8:"continue";s:10:"Nadaljujte";}}s:5:"sr_RS";a:8:{s:8:"language";s:5:"sr_RS";s:7:"version";s:3:"4.1";s:7:"updated";s:19:"2014-12-18 19:08:01";s:12:"english_name";s:7:"Serbian";s:11:"native_name";s:23:"Српски језик";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.1/sr_RS.zip";s:3:"iso";a:2:{i:1;s:2:"sr";i:2;s:3:"srp";}s:7:"strings";a:1:{s:8:"continue";s:14:"Настави";}}s:5:"sv_SE";a:8:{s:8:"language";s:5:"sv_SE";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-29 09:41:07";s:12:"english_name";s:7:"Swedish";s:11:"native_name";s:7:"Svenska";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/sv_SE.zip";s:3:"iso";a:2:{i:1;s:2:"sv";i:2;s:3:"swe";}s:7:"strings";a:1:{s:8:"continue";s:9:"Fortsätt";}}s:2:"th";a:8:{s:8:"language";s:2:"th";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-26 04:10:43";s:12:"english_name";s:4:"Thai";s:11:"native_name";s:9:"ไทย";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.1.1/th.zip";s:3:"iso";a:2:{i:1;s:2:"th";i:2;s:3:"tha";}s:7:"strings";a:1:{s:8:"continue";s:15:"ต่อไป";}}s:5:"tr_TR";a:8:{s:8:"language";s:5:"tr_TR";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-01-19 08:42:08";s:12:"english_name";s:7:"Turkish";s:11:"native_name";s:8:"Türkçe";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/tr_TR.zip";s:3:"iso";a:2:{i:1;s:2:"tr";i:2;s:3:"tur";}s:7:"strings";a:1:{s:8:"continue";s:5:"Devam";}}s:5:"ug_CN";a:8:{s:8:"language";s:5:"ug_CN";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-19 05:33:04";s:12:"english_name";s:6:"Uighur";s:11:"native_name";s:9:"Uyƣurqə";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/ug_CN.zip";s:3:"iso";a:2:{i:1;s:2:"ug";i:2;s:3:"uig";}s:7:"strings";a:1:{s:8:"continue";s:26:"داۋاملاشتۇرۇش";}}s:5:"zh_TW";a:8:{s:8:"language";s:5:"zh_TW";s:7:"version";s:5:"4.1.1";s:7:"updated";s:19:"2015-02-19 08:39:08";s:12:"english_name";s:16:"Chinese (Taiwan)";s:11:"native_name";s:12:"繁體中文";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.1.1/zh_TW.zip";s:3:"iso";a:2:{i:1;s:2:"zh";i:2;s:3:"zho";}s:7:"strings";a:1:{s:8:"continue";s:6:"繼續";}}s:5:"zh_CN";a:8:{s:8:"language";s:5:"zh_CN";s:7:"version";s:3:"4.1";s:7:"updated";s:19:"2014-12-26 02:21:02";s:12:"english_name";s:15:"Chinese (China)";s:11:"native_name";s:12:"简体中文";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.1/zh_CN.zip";s:3:"iso";a:2:{i:1;s:2:"zh";i:2;s:3:"zho";}s:7:"strings";a:1:{s:8:"continue";s:6:"继续";}}}', 'yes'),
(202, 'theme_mods_twentyfourteen', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425825360;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:1:{i:0;s:8:"search-2";}s:9:"sidebar-1";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";N;}}}', 'yes'),
(204, '_transient_twentyfourteen_category_count', '2', 'yes'),
(205, 'theme_mods_zborder', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:7:"primary";i:12;}}', 'yes'),
(206, 'zborder_theme_options', 'a:20:{s:14:"custom_favicon";s:0:"";s:8:"logo_url";s:0:"";s:9:"hide_desc";s:0:"";s:16:"header_image_url";s:0:"";s:7:"rss_url";s:0:"";s:13:"excerpt_check";s:0:"";s:13:"comment_notes";s:0:"";s:7:"smilies";s:0:"";s:11:"twitter_url";s:0:"";s:19:"twitter_custom_name";s:0:"";s:19:"twitter_custom_icon";s:0:"";s:18:"twitter_custom_url";s:0:"";s:12:"facebook_url";s:0:"";s:20:"facebook_custom_name";s:0:"";s:20:"facebook_custom_icon";s:0:"";s:19:"facebook_custom_url";s:0:"";s:14:"googleplus_url";s:0:"";s:22:"googleplus_custom_name";s:0:"";s:22:"googleplus_custom_icon";s:0:"";s:21:"googleplus_custom_url";s:0:"";}', 'yes'),
(207, 'theme_mods_june', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425825996;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:1:{i:0;s:8:"search-2";}s:18:"orphaned_widgets_1";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}}}}', 'yes'),
(208, 'theme_mods_mz1', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425826137;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:1:{i:0;s:8:"search-2";}s:18:"orphaned_widgets_1";a:5:{i:0;s:12:"categories-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:6:"meta-2";}}}}', 'yes'),
(209, 'theme_mods_twentyfifteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1425826190;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(223, '_transient_timeout_plugin_slugs', '1425988618', 'no'),
(224, '_transient_plugin_slugs', 'a:2:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";}', 'no'),
(225, '_transient_timeout_dash_4077549d03da2e451c8b5f002294ff51', '1425945418', 'no'),
(226, '_transient_dash_4077549d03da2e451c8b5f002294ff51', '<div class="rss-widget"><p><strong>RSS错误</strong>：WP HTTP Error: Could not resolve host: cn.wordpress.org</p></div><div class="rss-widget"><p><strong>RSS错误</strong>：WP HTTP Error: Could not resolve host: planet.wordpress.org</p></div><div class="rss-widget"><ul></ul></div>', 'no'),
(228, 'category_children', 'a:0:{}', 'yes'),
(230, '_site_transient_timeout_theme_roots', '1425916603', 'yes'),
(231, '_site_transient_theme_roots', 'a:5:{s:10:"likegoogle";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";s:7:"zborder";s:7:"/themes";}', 'yes');

-- --------------------------------------------------------

--
-- 表的结构 `blog_postmeta`
--

CREATE TABLE IF NOT EXISTS `blog_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=209 ;

--
-- 转存表中的数据 `blog_postmeta`
--

INSERT INTO `blog_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 1, '_edit_lock', '1425800187:1'),
(3, 1, '_edit_last', '1'),
(6, 1, 'sith_hide_meta', ''),
(7, 1, 'sith_hide_share', ''),
(8, 1, 'sith_hide_related', ''),
(9, 1, 'sith_sidebar_pos', 'default'),
(10, 1, 'sith_sidebar_post', ''),
(11, 6, '_edit_last', '1'),
(12, 6, '_edit_lock', '1425829353:1'),
(15, 6, 'sith_hide_meta', ''),
(16, 6, 'sith_hide_share', ''),
(17, 6, 'sith_hide_related', ''),
(18, 6, 'sith_sidebar_pos', 'default'),
(19, 6, 'sith_sidebar_post', ''),
(40, 10, '_menu_item_type', 'taxonomy'),
(41, 10, '_menu_item_menu_item_parent', '0'),
(42, 10, '_menu_item_object_id', '2'),
(43, 10, '_menu_item_object', 'category'),
(44, 10, '_menu_item_target', ''),
(45, 10, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(46, 10, '_menu_item_xfn', ''),
(47, 10, '_menu_item_url', ''),
(49, 11, '_menu_item_type', 'taxonomy'),
(50, 11, '_menu_item_menu_item_parent', '0'),
(51, 11, '_menu_item_object_id', '3'),
(52, 11, '_menu_item_object', 'category'),
(53, 11, '_menu_item_target', ''),
(54, 11, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(55, 11, '_menu_item_xfn', ''),
(56, 11, '_menu_item_url', ''),
(130, 20, '_menu_item_type', 'taxonomy'),
(131, 20, '_menu_item_menu_item_parent', '0'),
(132, 20, '_menu_item_object_id', '1'),
(133, 20, '_menu_item_object', 'category'),
(134, 20, '_menu_item_target', ''),
(135, 20, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(136, 20, '_menu_item_xfn', ''),
(137, 20, '_menu_item_url', ''),
(139, 21, '_menu_item_type', 'taxonomy'),
(140, 21, '_menu_item_menu_item_parent', '0'),
(141, 21, '_menu_item_object_id', '3'),
(142, 21, '_menu_item_object', 'category'),
(143, 21, '_menu_item_target', ''),
(144, 21, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(145, 21, '_menu_item_xfn', ''),
(146, 21, '_menu_item_url', ''),
(147, 21, '_menu_item_orphaned', '1425806046'),
(148, 22, '_menu_item_type', 'taxonomy'),
(149, 22, '_menu_item_menu_item_parent', '0'),
(150, 22, '_menu_item_object_id', '2'),
(151, 22, '_menu_item_object', 'category'),
(152, 22, '_menu_item_target', ''),
(153, 22, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(154, 22, '_menu_item_xfn', ''),
(155, 22, '_menu_item_url', ''),
(156, 22, '_menu_item_orphaned', '1425806047'),
(157, 24, '_menu_item_type', 'taxonomy'),
(158, 24, '_menu_item_menu_item_parent', '0'),
(159, 24, '_menu_item_object_id', '2'),
(160, 24, '_menu_item_object', 'category'),
(161, 24, '_menu_item_target', ''),
(162, 24, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(163, 24, '_menu_item_xfn', ''),
(164, 24, '_menu_item_url', ''),
(166, 25, '_menu_item_type', 'taxonomy'),
(167, 25, '_menu_item_menu_item_parent', '0'),
(168, 25, '_menu_item_object_id', '3'),
(169, 25, '_menu_item_object', 'category'),
(170, 25, '_menu_item_target', ''),
(171, 25, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(172, 25, '_menu_item_xfn', ''),
(173, 25, '_menu_item_url', ''),
(175, 2, '_edit_lock', '1425816328:1'),
(176, 26, '_edit_last', '1'),
(177, 26, '_edit_lock', '1425825175:1'),
(178, 30, '_menu_item_type', 'taxonomy'),
(179, 30, '_menu_item_menu_item_parent', '0'),
(180, 30, '_menu_item_object_id', '1'),
(181, 30, '_menu_item_object', 'category'),
(182, 30, '_menu_item_target', ''),
(183, 30, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(184, 30, '_menu_item_xfn', ''),
(185, 30, '_menu_item_url', ''),
(187, 31, '_menu_item_type', 'taxonomy'),
(188, 31, '_menu_item_menu_item_parent', '0'),
(189, 31, '_menu_item_object_id', '13'),
(190, 31, '_menu_item_object', 'category'),
(191, 31, '_menu_item_target', ''),
(192, 31, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(193, 31, '_menu_item_xfn', ''),
(194, 31, '_menu_item_url', ''),
(196, 32, '_menu_item_type', 'taxonomy'),
(197, 32, '_menu_item_menu_item_parent', '0'),
(198, 32, '_menu_item_object_id', '14'),
(199, 32, '_menu_item_object', 'category'),
(200, 32, '_menu_item_target', ''),
(201, 32, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(202, 32, '_menu_item_xfn', ''),
(203, 32, '_menu_item_url', ''),
(205, 33, '_edit_last', '1'),
(206, 33, '_edit_lock', '1425914417:1');

-- --------------------------------------------------------

--
-- 表的结构 `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `blog_posts`
--

INSERT INTO `blog_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2015-03-08 07:20:08', '2015-03-08 07:20:08', '欢迎使用WordPress。这是系统自动生成的演示文章。编辑或者删除它，然后开始您的博客！', '世界，你好！', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2015-03-08 15:36:25', '2015-03-08 07:36:25', '', 0, 'http://localhost:88/?p=1', 0, 'post', '', 1),
(2, 1, '2015-03-08 07:20:08', '2015-03-08 07:20:08', '这是示范页面。页面和博客文章不同，它的位置是固定的，通常会在站点导航栏显示。很多用户都创建一个“关于”页面，向访客介绍自己。例如，个人博客通常有类似这样的介绍：\n\n<blockquote>欢迎！我白天是个邮递员，晚上就是个有抱负的演员。这是我的博客。我住在天朝的帝都，有条叫做杰克的狗。</blockquote>\n\n……公司博客可以这样写：\n\n<blockquote>XYZ Doohickey公司成立于1971年，自从建立以来，我们一直向社会贡献着优秀doohicky。我们的公司总部位于天朝魔都，有着超过两千名员工，对魔都政府税收有着巨大贡献。</blockquote>\n\n您可以访问<a href="http://localhost:88/wp-admin/">仪表盘</a>，删除本页面，然后添加您自己的内容。祝您使用愉快！', '示例页面', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2015-03-08 07:20:08', '2015-03-08 07:20:08', '', 0, 'http://localhost:88/?page_id=2', 0, 'page', '', 0),
(3, 1, '2015-03-08 15:20:27', '0000-00-00 00:00:00', '', '自动草稿', '', 'auto-draft', 'open', 'open', '', '', '', '', '2015-03-08 15:20:27', '0000-00-00 00:00:00', '', 0, 'http://localhost:88/?p=3', 0, 'post', '', 0),
(4, 1, '2015-03-08 15:36:25', '2015-03-08 07:36:25', '欢迎使用WordPress。这是系统自动生成的演示文章。编辑或者删除它，然后开始您的博客！', '世界，你好！', '', 'inherit', 'open', 'open', '', '1-revision-v1', '', '', '2015-03-08 15:36:25', '2015-03-08 07:36:25', '', 1, 'http://localhost:88/?p=4', 0, 'revision', '', 0),
(5, 1, '2015-03-08 15:37:03', '0000-00-00 00:00:00', '', '自动草稿', '', 'auto-draft', 'open', 'open', '', '', '', '', '2015-03-08 15:37:03', '0000-00-00 00:00:00', '', 0, 'http://localhost:88/?p=5', 0, 'post', '', 0),
(6, 1, '2015-03-08 15:38:10', '2015-03-08 07:38:10', '修改的用户都以root为列。\r\n<strong>一、拥有原来的myql的root的密码；</strong>\r\n\r\n方法一：\r\n在mysql系统外，使用mysqladmin\r\n# <strong>mysqladmin -u root -p password "test123"</strong>\r\nEnter password: 【输入原来的密码】\r\n\r\n方法二：\r\n通过登录mysql系统，\r\n# <strong>mysql -uroot -p</strong>\r\nEnter password: 【输入原来的密码】\r\nmysql&gt;<strong>use mysql;</strong>\r\nmysql&gt; <strong>update user set password=passworD("test") where user=''root'';</strong>\r\nmysql&gt; <strong>flush privileges;</strong>\r\nmysql&gt; <strong>exit;</strong>', 'Linux下修改Mysql的用户', '', 'publish', 'open', 'open', '', 'linux%e4%b8%8b%e4%bf%ae%e6%94%b9mysql%e7%9a%84%e7%94%a8%e6%88%b7', '', '', '2015-03-08 23:42:31', '2015-03-08 15:42:31', '', 0, 'http://localhost:88/?p=6', 0, 'post', '', 1),
(7, 1, '2015-03-08 15:38:10', '2015-03-08 07:38:10', '修改的用户都以root为列。\r\n<strong>一、拥有原来的myql的root的密码；</strong>\r\n\r\n\r\n方法一：\r\n在mysql系统外，使用mysqladmin\r\n# <strong>mysqladmin -u root -p password "test123"</strong>\r\nEnter password: 【输入原来的密码】\r\n\r\n方法二：\r\n通过登录mysql系统，\r\n# <strong>mysql -uroot -p</strong>\r\nEnter password: 【输入原来的密码】\r\nmysql&gt;<strong>use mysql;</strong>\r\nmysql&gt; <strong>update user set password=passworD("test") where user=''root'';</strong>\r\nmysql&gt; <strong>flush privileges;</strong>\r\nmysql&gt; <strong>exit;</strong>', 'Linux下修改Mysql的用户', '', 'inherit', 'open', 'open', '', '6-revision-v1', '', '', '2015-03-08 15:38:10', '2015-03-08 07:38:10', '', 6, 'http://localhost:88/?p=7', 0, 'revision', '', 0),
(10, 1, '2015-03-08 15:47:43', '2015-03-08 07:47:43', ' ', '', '', 'publish', 'open', 'open', '', '10', '', '', '2015-03-08 17:14:34', '2015-03-08 09:14:34', '', 0, 'http://localhost:88/?p=10', 1, 'nav_menu_item', '', 0),
(11, 1, '2015-03-08 15:47:43', '2015-03-08 07:47:43', ' ', '', '', 'publish', 'open', 'open', '', '11', '', '', '2015-03-08 17:14:34', '2015-03-08 09:14:34', '', 0, 'http://localhost:88/?p=11', 2, 'nav_menu_item', '', 0),
(20, 1, '2015-03-08 17:14:20', '2015-03-08 09:14:20', ' ', '', '', 'publish', 'open', 'open', '', '20', '', '', '2015-03-08 17:14:34', '2015-03-08 09:14:34', '', 0, 'http://localhost:88/?p=20', 3, 'nav_menu_item', '', 0),
(21, 1, '2015-03-08 17:14:06', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'open', 'open', '', '', '', '', '2015-03-08 17:14:06', '0000-00-00 00:00:00', '', 0, 'http://localhost:88/?p=21', 1, 'nav_menu_item', '', 0),
(22, 1, '2015-03-08 17:14:07', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'open', 'open', '', '', '', '', '2015-03-08 17:14:07', '0000-00-00 00:00:00', '', 0, 'http://localhost:88/?p=22', 1, 'nav_menu_item', '', 0),
(23, 1, '2015-03-08 18:11:07', '0000-00-00 00:00:00', '', '自动草稿', '', 'auto-draft', 'open', 'open', '', '', '', '', '2015-03-08 18:11:07', '0000-00-00 00:00:00', '', 0, 'http://localhost:88/?p=23', 0, 'post', '', 0),
(24, 1, '2015-03-08 18:40:10', '2015-03-08 10:40:10', ' ', '', '', 'publish', 'open', 'open', '', '24', '', '', '2015-03-09 23:11:40', '2015-03-09 15:11:40', '', 0, 'http://localhost:88/?p=24', 1, 'nav_menu_item', '', 0),
(25, 1, '2015-03-08 18:40:10', '2015-03-08 10:40:10', ' ', '', '', 'publish', 'open', 'open', '', '25', '', '', '2015-03-09 23:11:40', '2015-03-09 15:11:40', '', 0, 'http://localhost:88/?p=25', 2, 'nav_menu_item', '', 0),
(26, 1, '2015-03-08 22:32:52', '2015-03-08 14:32:52', '描述 Query_posts 可以用来控制在循环The Loop中显示哪些文章。它可以接受各种参数，就像你的URL中使用的参数(例如：参数p，p=4表示只显示ID为4的文章). 通常的用法： 在你的首页只显示一篇文章(若只想显示一个独立的页面page，可以通过WordPress管理后台，设置 -> 阅读，在那里修改). 显示一个特定的时间段内的所有文章. 在首页只显示最新的文章. 改变文章', 'query_post', '', 'publish', 'open', 'open', '', 'query_post', '', '', '2015-03-08 22:32:52', '2015-03-08 14:32:52', '', 0, 'http://localhost:88/?p=26', 0, 'post', '', 0),
(27, 1, '2015-03-08 22:32:52', '2015-03-08 14:32:52', '描述 Query_posts 可以用来控制在循环The Loop中显示哪些文章。它可以接受各种参数，就像你的URL中使用的参数(例如：参数p，p=4表示只显示ID为4的文章). 通常的用法： 在你的首页只显示一篇文章(若只想显示一个独立的页面page，可以通过WordPress管理后台，设置 -> 阅读，在那里修改). 显示一个特定的时间段内的所有文章. 在首页只显示最新的文章. 改变文章', 'query_post', '', 'inherit', 'open', 'open', '', '26-revision-v1', '', '', '2015-03-08 22:32:52', '2015-03-08 14:32:52', '', 26, 'http://localhost:88/?p=27', 0, 'revision', '', 0),
(28, 1, '2015-03-08 23:34:41', '2015-03-08 15:34:41', '修改的用户都以root为列。\r\n<strong>一、拥有原来的myql的root的密码；</strong>\r\n\r\n方法一：\r\n在mysql系统外，使用mysqladmin\r\n# <strong>mysqladmin -u root -p password "test123"</strong>\r\nEnter password: 【输入原来的密码】\r\n\r\n方法二：\r\n通过登录mysql系统，\r\n# <strong>mysql -uroot -p</strong>\r\nEnter password: 【输入原来的密码】\r\nmysql&gt;<strong>use mysql;</strong>\r\nmysql&gt; <strong>update user set password=passworD("test") where user=''root'';</strong>\r\nmysql&gt; <strong>flush privileges;</strong>\r\nmysql&gt; <strong>exit;</strong>', 'Linux下修改Mysql的用户', '# mysql -uroot -p\r\nEnter password: 【输入原来的密码】\r\nmysql>use mysql;\r\nmysql> update user set password=passworD(“test”) where user=’root'';\r\nmysql> flush privileges;\r\nmysql> exit;', 'inherit', 'open', 'open', '', '6-revision-v1', '', '', '2015-03-08 23:34:41', '2015-03-08 15:34:41', '', 6, 'http://localhost:88/?p=28', 0, 'revision', '', 0),
(29, 1, '2015-03-08 23:42:31', '2015-03-08 15:42:31', '修改的用户都以root为列。\r\n<strong>一、拥有原来的myql的root的密码；</strong>\r\n\r\n方法一：\r\n在mysql系统外，使用mysqladmin\r\n# <strong>mysqladmin -u root -p password "test123"</strong>\r\nEnter password: 【输入原来的密码】\r\n\r\n方法二：\r\n通过登录mysql系统，\r\n# <strong>mysql -uroot -p</strong>\r\nEnter password: 【输入原来的密码】\r\nmysql&gt;<strong>use mysql;</strong>\r\nmysql&gt; <strong>update user set password=passworD("test") where user=''root'';</strong>\r\nmysql&gt; <strong>flush privileges;</strong>\r\nmysql&gt; <strong>exit;</strong>', 'Linux下修改Mysql的用户', '', 'inherit', 'open', 'open', '', '6-revision-v1', '', '', '2015-03-08 23:42:31', '2015-03-08 15:42:31', '', 6, 'http://localhost:88/?p=29', 0, 'revision', '', 0),
(30, 1, '2015-03-09 23:11:41', '2015-03-09 15:11:41', ' ', '', '', 'publish', 'open', 'open', '', '30', '', '', '2015-03-09 23:11:41', '2015-03-09 15:11:41', '', 0, 'http://localhost:88/?p=30', 3, 'nav_menu_item', '', 0),
(31, 1, '2015-03-09 23:11:41', '2015-03-09 15:11:41', ' ', '', '', 'publish', 'open', 'open', '', '31', '', '', '2015-03-09 23:11:41', '2015-03-09 15:11:41', '', 0, 'http://localhost:88/?p=31', 4, 'nav_menu_item', '', 0),
(32, 1, '2015-03-09 23:11:41', '2015-03-09 15:11:41', ' ', '', '', 'publish', 'open', 'open', '', '32', '', '', '2015-03-09 23:11:41', '2015-03-09 15:11:41', '', 0, 'http://localhost:88/?p=32', 5, 'nav_menu_item', '', 0),
(33, 1, '2015-03-09 23:20:14', '2015-03-09 15:20:14', 'Javascript', 'Javascript', '', 'publish', 'open', 'open', '', 'javascript', '', '', '2015-03-09 23:20:14', '2015-03-09 15:20:14', '', 0, 'http://localhost:88/?p=33', 0, 'post', '', 0),
(34, 1, '2015-03-09 23:20:14', '2015-03-09 15:20:14', 'Javascript', 'Javascript', '', 'inherit', 'open', 'open', '', '33-revision-v1', '', '', '2015-03-09 23:20:14', '2015-03-09 15:20:14', '', 33, 'http://localhost:88/?p=34', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_terms`
--

CREATE TABLE IF NOT EXISTS `blog_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `blog_terms`
--

INSERT INTO `blog_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'JavaScript', 'javascript', 0),
(2, 'PHP', 'php', 0),
(3, 'Mysql', 'mysql', 0),
(6, 'Main', 'main', 0),
(12, 'Top', 'top', 0),
(13, 'Linux', 'linux', 0),
(14, 'WordPress', 'wordpress', 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_term_relationships`
--

CREATE TABLE IF NOT EXISTS `blog_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_term_relationships`
--

INSERT INTO `blog_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(6, 3, 0),
(10, 6, 0),
(11, 6, 0),
(20, 6, 0),
(24, 12, 0),
(25, 12, 0),
(26, 3, 0),
(30, 12, 0),
(31, 12, 0),
(32, 12, 0),
(33, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `blog_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `blog_term_taxonomy`
--

INSERT INTO `blog_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'category', '', 0, 1),
(3, 3, 'category', '', 0, 2),
(6, 6, 'nav_menu', '', 0, 3),
(12, 12, 'nav_menu', '', 0, 5),
(13, 13, 'category', '', 0, 0),
(14, 14, 'category', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_usermeta`
--

CREATE TABLE IF NOT EXISTS `blog_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `blog_usermeta`
--

INSERT INTO `blog_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'luckymc'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'blog_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'blog_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp360_locks,wp390_widgets,wp410_dfw'),
(13, 1, 'show_welcome_panel', '1'),
(15, 1, 'blog_dashboard_quick_press_last_post_id', '3'),
(16, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(17, 1, 'metaboxhidden_nav-menus', 'a:2:{i:0;s:8:"add-post";i:1;s:12:"add-post_tag";}'),
(18, 1, 'nav_menu_recently_edited', '12'),
(20, 1, 'blog_user-settings', 'editor=html'),
(21, 1, 'blog_user-settings-time', '1425815991'),
(22, 1, 'closedpostboxes_page', 'a:0:{}'),
(23, 1, 'metaboxhidden_page', 'a:5:{i:0;s:10:"postcustom";i:1;s:16:"commentstatusdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";}'),
(27, 1, 'closedpostboxes_post', 'a:0:{}'),
(28, 1, 'metaboxhidden_post', 'a:6:{i:0;s:13:"trackbacksdiv";i:1;s:10:"postcustom";i:2;s:16:"commentstatusdiv";i:3;s:11:"commentsdiv";i:4;s:7:"slugdiv";i:5;s:9:"authordiv";}'),
(29, 1, 'session_tokens', 'a:1:{s:64:"2b8b2f8ed9f84919d955b7322ab6dfab5696e29345f77312ade4c8d994b3ed78";a:4:{s:10:"expiration";i:1426075009;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:101:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36";s:5:"login";i:1425902209;}}');

-- --------------------------------------------------------

--
-- 表的结构 `blog_users`
--

CREATE TABLE IF NOT EXISTS `blog_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `blog_users`
--

INSERT INTO `blog_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'luckymc', '$P$BJGITsQAp.QZanUihTL3vPJJjRjaEa/', 'luckymc', '327919416@qq.com', '', '2015-03-08 07:20:08', '', 0, 'luckymc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
