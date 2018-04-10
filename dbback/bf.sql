-- phpMyAdmin SQL Dump
-- version 4.0.6-rc1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018-03-24 18:51:33
-- 服务器版本: 5.6.14
-- PHP 版本: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test_yzl`
--

-- --------------------------------------------------------

--
-- 表的结构 `tgs_admin`
--

CREATE TABLE IF NOT EXISTS `tgs_admin` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `glqx` varchar(255) NOT NULL,
  `glyxm` varchar(100) DEFAULT NULL,
  `admin_pic` varchar(255) DEFAULT NULL,
  `logins` mediumint(8) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tgs_admin`
--

INSERT INTO `tgs_admin` (`id`, `username`, `password`, `glqx`, `glyxm`, `admin_pic`, `logins`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', '1', '管理员', '', 166),
(3, 'guest', '670b14728ad9902aecba32e22fa4f6bd', '1', 'test', '/dd/upload/image/noface.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tgs_agent`
--

CREATE TABLE IF NOT EXISTS `tgs_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentid` varchar(50) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quyu` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `about` longtext,
  `addtime` date DEFAULT NULL,
  `jietime` date DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `face` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `idcard` varchar(80) DEFAULT NULL,
  `qq` varchar(100) DEFAULT NULL,
  `weixin` varchar(100) DEFAULT NULL,
  `dizhi` varchar(255) DEFAULT NULL,
  `beizhu` varchar(255) DEFAULT NULL,
  `hits` int(8) DEFAULT '0',
  `query_time` datetime DEFAULT NULL,
  `dkpic` varchar(255) DEFAULT NULL,
  `sjdl` varchar(255) DEFAULT NULL,
  `hmd` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sqtime` varchar(100) DEFAULT NULL,
  `sqdengji` varchar(255) DEFAULT NULL,
  `applytime` date DEFAULT NULL,
  `dengji` varchar(255) DEFAULT NULL,
  `shzt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agentid` (`agentid`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `weixin` (`weixin`),
  KEY `product` (`product`),
  KEY `name` (`name`),
  KEY `quyu` (`quyu`),
  KEY `qq` (`qq`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tgs_agent`
--

INSERT INTO `tgs_agent` (`id`, `agentid`, `product`, `quyu`, `url`, `about`, `addtime`, `jietime`, `name`, `tel`, `face`, `phone`, `idcard`, `qq`, `weixin`, `dizhi`, `beizhu`, `hits`, `query_time`, `dkpic`, `sjdl`, `hmd`, `password`, `sqtime`, `sqdengji`, `applytime`, `dengji`, `shzt`) VALUES
(1, 'EW2017121913', '7', '上海', '', '', '2017-12-19', '2018-12-19', '李易', '', '', '18170521585', '32423423423423', '3423423', 'ew80com', '', '', 0, NULL, NULL, '', 'no', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_box`
--

CREATE TABLE IF NOT EXISTS `tgs_box` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `txm` longtext,
  `box` longtext,
  `zxdate` datetime DEFAULT NULL,
  `fhdate` datetime DEFAULT NULL,
  `zxclass` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_box_log`
--

CREATE TABLE IF NOT EXISTS `tgs_box_log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `czy` varchar(50) NOT NULL,
  `zxm` varchar(255) NOT NULL,
  `zxdate` datetime NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_code`
--

CREATE TABLE IF NOT EXISTS `tgs_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bianhao` varchar(50) DEFAULT NULL,
  `txm` varchar(50) DEFAULT NULL,
  `riqi` varchar(255) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `zd1` varchar(250) DEFAULT NULL,
  `zd2` varchar(250) DEFAULT 'www.ew80.com',
  `suyuan` varchar(255) DEFAULT NULL,
  `qiyong` varchar(20) DEFAULT 'yes',
  `hits` int(8) DEFAULT '0',
  `query_time` datetime DEFAULT NULL,
  `adddate` datetime DEFAULT CURRENT_TIMESTAMP,
  `zbox` varchar(10) DEFAULT 'no',
  `fahuo` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bianhao` (`bianhao`),
  KEY `txm` (`txm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_config`
--

CREATE TABLE IF NOT EXISTS `tgs_config` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `parentid` smallint(5) NOT NULL DEFAULT '1',
  `code` varchar(30) NOT NULL,
  `code_name` varchar(30) NOT NULL,
  `code_value` text,
  `store_range` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `tgs_config`
--

INSERT INTO `tgs_config` (`id`, `parentid`, `code`, `code_name`, `code_value`, `store_range`, `type`) VALUES
(1, 1, 'site_url', '系统网址', 'http://127.0.0.3', '', 'text'),
(2, 1, 'site_name', '系统名称', '易网防伪防窜货溯源系统', '', 'text'),
(3, 1, 'timezone', '默认时间', '0', '', 'text'),
(4, 1, 'time_format', '系统日期格式', 'Y-m-d H:i:s', '', 'text'),
(5, 1, 'site_lang', '系统语言', 'zh_cn', '', 'text'),
(6, 1, 'text_type', '', '1', '', 'text'),
(7, 1, 'site_themes', '防伪系统皮肤', 'fw_02', '', 'text'),
(8, 1, 'agent_themes', '代理商系统皮肤', 'agent', '', 'text'),
(10, 1, 'yzm_status', '是否启用验证码', '1', '', 'checkbox'),
(11, 1, 'page_title', '', '', '', 'text'),
(12, 1, 'page_keywords', '系统关键词', '防伪防窜货,二维码防伪,农产品溯源,产品溯源', '', 'text'),
(13, 1, 'page_desc', '系统描述', '易网防伪防防窜货和溯源系统 好用易用', '', 'text'),
(14, 1, 'site_close', '网站是否关闭', '', '', 'text'),
(15, 1, 'site_close_reason', '网站关闭原因', '', '', 'text'),
(16, 1, 'notices', '防伪查询说明', '<p>\r\n	输入您要查询的防伪码(溯源码)内容。\r\n</p>', '', 'text'),
(17, 1, 'notice_1', '防伪码首次查询', '<p style=&quot;line-height:20.8px;&quot;>\r\n	<span style=&quot;font-size:20px;color:#00B050;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;><strong>恭喜，您查询的是本公司正品！</strong></span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>您查询的防伪码是：<span style=&quot;font-family:微软雅黑, ‘Microsoft YaHei‘;font-size:16px;line-height:20.8px;color:#C00000;&quot;>{{bianhao}}</span></span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;line-height:20.8px;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>防伪码所属产品：{{product}}</span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>所属经销商：<span style=&quot;font-family:微软雅黑, ‘Microsoft YaHei‘;font-size:16px;color:#3F3F3F;line-height:20.8px;&quot;>{{zd1}}</span></span> \r\n</p>\r\n<p style=&quot;line-height:15px;&quot;>\r\n	<span style=&quot;font-size:16px;color:#00B050;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;><strong>该防伪码为首次查询！</strong></span> \r\n</p>', '', 'text'),
(32, 1, 'sms_qm', '短信接口地址', '阿里云短信测试专用', '', 'text'),
(18, 1, 'notice_2', '防伪码非首次查询', '<p style=&quot;line-height:20.8px;&quot;>\r\n	<span style=&quot;font-size:20px;color:#00B050;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;><strong>恭喜，您查询的是本公司正品！</strong></span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>您查询的防伪码是：<span style=&quot;font-family:微软雅黑, ‘Microsoft YaHei‘;font-size:16px;line-height:20.8px;color:#C00000;&quot;>{{bianhao}}</span></span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;line-height:20.8px;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>防伪码所属产品：{{product}}</span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>所属经销商：<span style=&quot;font-family:微软雅黑, ‘Microsoft YaHei‘;font-size:16px;color:#3F3F3F;line-height:20.8px;&quot;>{{zd1}}</span></span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;line-height:20.8px;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>首次查询时间：{{query_time}}</span> \r\n</p>\r\n<p style=&quot;line-height:2em;&quot;>\r\n	<span style=&quot;line-height:20.8px;color:#3F3F3F;font-size:16px;font-family:微软雅黑, ‘Microsoft YaHei‘;&quot;>查询次数：{{hits}}</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', 'text'),
(19, 1, 'notice_3', '防伪码未找到', '<p>\r\n	没有找到您查询的防伪码，谨防假冒！\r\n</p>', '', 'text'),
(20, 1, 'agents', '代理查询说明', '<div style=&quot;text-align:left;&quot;>\r\n	<span style=&quot;line-height:1.5;color:#000000;font-family:‘Microsoft YaHei‘;font-size:18px;&quot;>请输入查询条件。支持电脑/手机端自适</span> \r\n</div>', '', 'text'),
(21, 1, 'agent_1', '代理首次查询', '<table width=&quot;800&quot; height=&quot;362&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/yes.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>该代理商是本公司正规代理！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该代理信息是第<span class=&quot;red&quot;>{{hits}}</span>次查询！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>在证书上点右键，选择图片另存为 可保存证书到本地 </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;center&quot; valign=&quot;middle&quot;><img src=&quot;zs/myzs.php?keyword={{agentid}}&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;>&nbsp;</td>\r\n  </tr>\r\n</table>', '', 'text'),
(22, 1, 'agent_2', '代理查询非首次', '<table width=&quot;800&quot; height=&quot;362&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/yes.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>该代理商是本公司正规代理！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该代理信息是第<span class=&quot;red&quot;>{{hits}}</span>次查询！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>在证书上点右键，选择图片另存为 可保存证书到本地 </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;center&quot; valign=&quot;middle&quot;><img src=&quot;zs/myzs.php?keyword={{agentid}}&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;>&nbsp;</td>\r\n  </tr>\r\n</table>', '', 'text'),
(23, 1, 'agent_3', '代理未找到', '<table width=&quot;800&quot; height=&quot;231&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/x.png&quot; width=&quot;47&quot; height=&quot;47&quot; ></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>对不起，没有找到相关的代理商信息！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>如有疑问，请与我们联系</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;> <button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onClick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n</table>', '', 'text'),
(24, 1, 'list_num', '分页数', '30', '', 'text'),
(9, 1, 'manage_themes', '后台模板', '../themes/manage', '', 'text'),
(26, 1, 'com_name', '公司名称', '江西有啊贸易有限公司', '', 'text'),
(27, 1, 'agent_ew', '证书编号前缀', 'EW', '', 'text'),
(28, 1, 'fwm_max_so', '限制防伪码最大查询次数', '50', '', 'text'),
(29, 1, 'fwm_view', '是否显示防伪内容', 'yes', '', 'text'),
(30, 1, 'agent_view', '是否显示代理信息', 'yes', '', 'text'),
(31, 1, 'cp_view', '是否在防伪页显示产品描述', 'yes', '', 'text'),
(33, 1, 'sms_user', '短信接口用户名', 'LTAIWQEpdem7hMES', '', 'text'),
(34, 1, 'sms_key', '短信接口密钥', 'aV7VCpinzUVCwpR6qiyRwvW9ouGiI3', '', 'text'),
(35, 1, 'sms_mb_shtg', '代理审核通过短信模板', 'SMS_94715077', '', 'text'),
(36, 1, 'sms_mb_qxsh', '代理审核被取消短信模板', 'SMS_94675069', '', 'text'),
(37, 1, 'sms_mb_hmd', '代理被列为黑名单短信通知模板', 'SMS_94660070', '', 'text'),
(38, 1, 'sms_mb_qxhmd', '代理被取消黑名短信通知模板', 'SMS_94735070', '', 'text'),
(39, 1, 'sms_mb_txsh', '提醒上级代理审核代理申请短信通知', 'SMS_94765066', '', 'text'),
(40, 1, 'AppID', 'AppID', 'wx5b19a62556686722', '', 'text'),
(41, 1, 'AppSecret', 'AppSecret', '304d1536dc9ab285368adc6d3ea76ced', '', 'text'),
(42, 1, 'lc_view', '是否显示流程记录', 'yes', '', 'text'),
(43, 1, 'admin_phone', '管理员手机号', '18170521585', '', 'text');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_dljb`
--

CREATE TABLE IF NOT EXISTS `tgs_dljb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dljb` varchar(100) NOT NULL,
  `checkper` varchar(50) DEFAULT NULL,
  `editper` varchar(50) DEFAULT NULL,
  `jibie` varchar(50) DEFAULT NULL,
  `delper` varchar(50) DEFAULT NULL,
  `sjcheckper` varchar(50) DEFAULT NULL,
  `zxgl` varchar(50) DEFAULT NULL,
  `fhgl` varchar(50) DEFAULT NULL,
  `thgl` varchar(50) DEFAULT NULL,
  `lcgl` varchar(50) DEFAULT NULL,
  `zsid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tgs_dljb`
--

INSERT INTO `tgs_dljb` (`id`, `dljb`, `checkper`, `editper`, `jibie`, `delper`, `sjcheckper`, `zxgl`, `fhgl`, `thgl`, `lcgl`, `zsid`) VALUES
(1, '初级代理', '1', '1', '2', '1', '1', '1', '1', '1', '1', 2);

-- --------------------------------------------------------

--
-- 表的结构 `tgs_fh_log`
--

CREATE TABLE IF NOT EXISTS `tgs_fh_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `czsm` longtext,
  `czy` varchar(100) NOT NULL,
  `czdate` datetime NOT NULL,
  `czip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_hisagent`
--

CREATE TABLE IF NOT EXISTS `tgs_hisagent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL,
  `addtime` datetime DEFAULT '0000-00-00 00:00:00',
  `addip` varchar(40) DEFAULT NULL,
  `results` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_hissy`
--

CREATE TABLE IF NOT EXISTS `tgs_hissy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `czmx` varchar(255) DEFAULT NULL,
  `czy` varchar(255) DEFAULT NULL,
  `czdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_history`
--

CREATE TABLE IF NOT EXISTS `tgs_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL,
  `addtime` datetime DEFAULT '0000-00-00 00:00:00',
  `addip` varchar(40) DEFAULT NULL,
  `results` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_lc`
--

CREATE TABLE IF NOT EXISTS `tgs_lc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txm` varchar(255) DEFAULT NULL,
  `lcid` int(4) DEFAULT NULL,
  `zrr` varchar(100) DEFAULT NULL,
  `czy` varchar(100) DEFAULT NULL,
  `lcsm` varchar(255) DEFAULT NULL,
  `czdate` datetime DEFAULT NULL,
  `zt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_lcfl`
--

CREATE TABLE IF NOT EXISTS `tgs_lcfl` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `lcname` varchar(100) NOT NULL,
  `paixi` int(4) NOT NULL,
  `adddate` datetime NOT NULL,
  `zt` varchar(10) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tgs_lcfl`
--

INSERT INTO `tgs_lcfl` (`id`, `lcname`, `paixi`, `adddate`, `zt`) VALUES
(1, '装箱/打包', 1, '2017-08-26 19:22:35', 'yes'),
(2, '发货/出库', 3, '2017-08-26 19:22:06', 'yes'),
(3, '取消装箱', 2, '2017-08-26 19:22:01', 'yes'),
(4, '退货/取消发货', 4, '2017-08-26 19:22:47', 'yes');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_moban`
--

CREATE TABLE IF NOT EXISTS `tgs_moban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_lx` varchar(50) NOT NULL,
  `mb_en` varchar(255) DEFAULT NULL,
  `mb_cn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tgs_moban`
--

INSERT INTO `tgs_moban` (`id`, `mb_lx`, `mb_en`, `mb_cn`) VALUES
(1, 'fw', 'fw_01', '农产品风格'),
(2, 'fw', 'fw_02', '化妆品风格'),
(3, 'fw', 'default', '默认风格'),
(4, 'dl', 'agent', '默认模板');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_pro`
--

CREATE TABLE IF NOT EXISTS `tgs_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) NOT NULL,
  `cpgg` varchar(255) DEFAULT NULL COMMENT '产品规格',
  `nylb` varchar(255) DEFAULT NULL COMMENT '产品类别',
  `hsz` varchar(50) DEFAULT 'no' COMMENT '是否启用',
  `cppic` varchar(255) DEFAULT NULL,
  `cppic2` varchar(255) DEFAULT NULL,
  `cppic3` varchar(255) DEFAULT NULL,
  `cppic4` varchar(255) DEFAULT NULL,
  `cpms` longtext,
  PRIMARY KEY (`id`),
  KEY `pro_name` (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_suyuan`
--

CREATE TABLE IF NOT EXISTS `tgs_suyuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `suyuan` longtext,
  `czy` varchar(255) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_th_log`
--

CREATE TABLE IF NOT EXISTS `tgs_th_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `czsm` longtext,
  `czy` varchar(100) NOT NULL,
  `czdate` datetime NOT NULL,
  `czip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_zsmb`
--

CREATE TABLE IF NOT EXISTS `tgs_zsmb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mbname` varchar(255) CHARACTER SET ucs2 DEFAULT NULL,
  `zsbg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tgs_zsmb`
--

INSERT INTO `tgs_zsmb` (`id`, `mbname`, `zsbg`) VALUES
(2, '默认证书模板', '/upload/image/20170603/20170603194331_96943.png');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_zszdcs`
--

CREATE TABLE IF NOT EXISTS `tgs_zszdcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mbid` int(11) DEFAULT NULL,
  `zdlx` varchar(50) DEFAULT NULL,
  `zdname` varchar(255) NOT NULL,
  `zdcode` varchar(255) DEFAULT NULL,
  `xzd` int(11) DEFAULT '0',
  `yzd` int(11) DEFAULT '0',
  `zdfont` varchar(255) NOT NULL DEFAULT 'Microsoft YaHei',
  `zdfontcode` varchar(255) DEFAULT NULL,
  `zdcolor` varchar(255) DEFAULT '#000000',
  `zdsize` varchar(255) DEFAULT '14',
  `zzhou` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tgs_zszdcs`
--

INSERT INTO `tgs_zszdcs` (`id`, `mbid`, `zdlx`, `zdname`, `zdcode`, `xzd`, `yzd`, `zdfont`, `zdfontcode`, `zdcolor`, `zdsize`, `zzhou`) VALUES
(1, 2, 'bl', '{姓名}', '{{name}}', 145, 320, '微软雅黑', 'msyh.ttf', 'rgba(235,9,9,1)', '20', '1'),
(2, 2, 'bl', '{代理产品}', '{{product}}', 316, 318, '微软雅黑', 'msyh.ttf', '#000000', '25', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
