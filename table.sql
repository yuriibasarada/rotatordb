--
-- Table structure for table `rotator`
--
CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `login` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `banners` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `image` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `status` varchar(64) collate utf8_unicode_ci NOT NULL default 'Активный',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` VALUES(1, 'mailChimp.jpg', 'Mail Chimp', 'http://www.mailchimp.com/', 'Активный');
INSERT INTO `banners` VALUES(2, 'psd2html.jpg', 'PSD to HTML', 'http://www.psd2html.com/', 'Активный' );
INSERT INTO `banners` VALUES(3, 'themeForest.gif', 'Theme Forest', 'http://themeforest.net/', 'Активный');
INSERT INTO `banners` VALUES(4, 'gomedia.jpg', 'Go Media', 'http://www.gomedia.us/', 'Активный');
INSERT INTO `banners` VALUES(5, 'siteGrinder.jpg', 'Site Grinder', 'http://medialab.com/sitegrinder3/preview/', 'Активный');
INSERT INTO `banners` VALUES(6, 'bestDesigns.jpg', 'The Best Designs', 'http://www.thebestdesigns.com/', 'Активный');
INSERT INTO `banners` VALUES(7, 'rapidHTML.png', 'Rapid HTML', 'http://www.rapidxhtml.com/', 'Активный');
INSERT INTO `banners` VALUES(8, 'themeLayouts.gif', 'Theme Layouts', 'http://www.themelayouts.com/', 'Активный');
