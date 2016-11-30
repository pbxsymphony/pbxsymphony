

CREATE TABLE IF NOT EXISTS `bit_cdr` (
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL DEFAULT '',
  `src` varchar(80) NOT NULL DEFAULT '',
  `dst` varchar(80) NOT NULL DEFAULT '',
  `dcontext` varchar(80) NOT NULL DEFAULT '',
  `channel` varchar(80) NOT NULL DEFAULT '',
  `dstchannel` varchar(80) NOT NULL DEFAULT '',
  `lastapp` varchar(80) NOT NULL DEFAULT '',
  `lastdata` varchar(80) NOT NULL DEFAULT '',
  `duration` int(11) NOT NULL DEFAULT '0',
  `billsec` int(11) NOT NULL DEFAULT '0',
  `disposition` varchar(45) NOT NULL DEFAULT '',
  `amaflags` int(11) NOT NULL DEFAULT '0',
  `accountcode` varchar(20) NOT NULL DEFAULT '',
  `userfield` varchar(255) NOT NULL DEFAULT '',
  `uniqueid` varchar(32) NOT NULL DEFAULT '',
  `linkedid` varchar(32) NOT NULL DEFAULT '',
  `sequence` varchar(32) NOT NULL DEFAULT '',
  `peeraccount` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `bit_meetme` (
  `confno` char(80) NOT NULL DEFAULT '0',
  `starttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `endtime` datetime NOT NULL DEFAULT '2099-12-31 23:59:59',
  `pin` char(20) DEFAULT NULL,
  `opts` char(100) DEFAULT NULL,
  `adminpin` char(20) DEFAULT NULL,
  `adminopts` char(100) DEFAULT NULL,
  `members` int(11) NOT NULL DEFAULT '0',
  `maxusers` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `extensions` (
`id` int(11) NOT NULL,
  `context` varchar(20) NOT NULL DEFAULT '',
  `exten` varchar(20) NOT NULL DEFAULT '',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `app` varchar(20) NOT NULL DEFAULT '',
  `appdata` varchar(128) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=346 DEFAULT CHARSET=latin1;


INSERT INTO `extensions` (`id`, `context`, `exten`, `priority`, `app`, `appdata`) VALUES
(300, 'from-sip', '_9[2345679]XXXXXXXX', 2, 'Dial', 'SIP/56${EXTEN:1}@proveedor'),
(306, 'from-sip', '_9[2345679]XXXXXXXX', 1, 'Set', 'CALLERID(num)=56226715793'),
(344, 'from-sip', '56226123456', 1, 'Dial', 'SIP/1000'),
(345, 'from-sip', '56226123456', 2, 'Hangup', ''),
(324, 'from-sip', '_900X.', 1, 'Set', 'CALLERID(num)=56226123456'),
(325, 'from-sip', '_900X.', 2, 'Dial', 'SIP/${EXTEN:3}@proveedor'),
(326, 'from-sip', '_91[034]X', 1, 'Set', 'CALLERID(num)=56226123456'),
(327, 'from-sip', '_91[034]X', 2, 'Dial', 'SIP/562${EXTEN:1}@proveedor'),
(328, 'from-sip', '_91[4]XX', 1, 'Set', 'CALLERID(num)=56226123456'),
(329, 'from-sip', '_91[4]XX', 2, 'Dial', 'SIP/562${EXTEN:1}@proveedor'),
(330, 'from-sip', '_10XX', 1, 'Dial', 'SIP/${EXTEN}'),
(334, 'from-sip', '_9[678]00X.', 1, 'Set', 'CALLERID(num)=56226123456'),
(335, 'from-sip', '_9[678]00X.', 2, 'Dial', 'SIP/56${EXTEN:1}@proveedor'));


CREATE TABLE IF NOT EXISTS `meetme` (
  `confno` varchar(80) NOT NULL DEFAULT '0',
  `username` varchar(64) NOT NULL DEFAULT '',
  `domain` varchar(128) NOT NULL DEFAULT '',
  `pin` varchar(20) DEFAULT NULL,
  `adminpin` varchar(20) DEFAULT NULL,
  `members` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `musiconhold` (
  `name` varchar(80) NOT NULL,
  `directory` varchar(255) NOT NULL DEFAULT '',
  `application` varchar(255) NOT NULL DEFAULT '',
  `mode` varchar(80) NOT NULL DEFAULT '',
  `digit` char(1) NOT NULL DEFAULT '',
  `sort` varchar(16) NOT NULL DEFAULT '',
  `format` varchar(16) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `queue_log` (
`id` int(10) unsigned NOT NULL,
  `time` char(26) DEFAULT NULL,
  `callid` varchar(32) NOT NULL DEFAULT '',
  `queuename` varchar(32) NOT NULL DEFAULT '',
  `agent` varchar(32) NOT NULL DEFAULT '',
  `event` varchar(32) NOT NULL DEFAULT '',
  `data1` varchar(100) NOT NULL DEFAULT '',
  `data2` varchar(100) NOT NULL DEFAULT '',
  `data3` varchar(100) NOT NULL DEFAULT '',
  `data4` varchar(100) NOT NULL DEFAULT '',
  `data5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `queue_member_table` (
`uniqueid` int(10) unsigned NOT NULL,
  `membername` varchar(40) DEFAULT NULL,
  `queue_name` varchar(128) DEFAULT NULL,
  `interface` varchar(128) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL,
  `paused` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `queue_table` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `musiconhold` varchar(128) DEFAULT NULL,
  `announce` varchar(128) DEFAULT NULL,
  `context` varchar(128) DEFAULT NULL,
  `timeout` int(11) DEFAULT NULL,
  `monitor_join` tinyint(1) DEFAULT NULL,
  `monitor_format` varchar(128) DEFAULT NULL,
  `queue_youarenext` varchar(128) DEFAULT NULL,
  `queue_thereare` varchar(128) DEFAULT NULL,
  `queue_callswaiting` varchar(128) DEFAULT NULL,
  `queue_holdtime` varchar(128) DEFAULT NULL,
  `queue_minutes` varchar(128) DEFAULT NULL,
  `queue_seconds` varchar(128) DEFAULT NULL,
  `queue_lessthan` varchar(128) DEFAULT NULL,
  `queue_thankyou` varchar(128) DEFAULT NULL,
  `queue_reporthold` varchar(128) DEFAULT NULL,
  `announce_frequency` int(11) DEFAULT NULL,
  `announce_round_seconds` int(11) DEFAULT NULL,
  `announce_holdtime` varchar(128) DEFAULT NULL,
  `retry` int(11) DEFAULT NULL,
  `wrapuptime` int(11) DEFAULT NULL,
  `maxlen` int(11) DEFAULT NULL,
  `servicelevel` int(11) DEFAULT NULL,
  `strategy` varchar(128) DEFAULT NULL,
  `joinempty` varchar(128) DEFAULT NULL,
  `leavewhenempty` varchar(128) DEFAULT NULL,
  `eventmemberstatus` tinyint(1) DEFAULT NULL,
  `eventwhencalled` tinyint(1) DEFAULT NULL,
  `reportholdtime` tinyint(1) DEFAULT NULL,
  `memberdelay` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `timeoutrestart` tinyint(1) DEFAULT NULL,
  `periodic_announce` varchar(50) DEFAULT NULL,
  `periodic_announce_frequency` int(11) DEFAULT NULL,
  `ringinuse` tinyint(1) DEFAULT NULL,
  `setinterfacevar` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO `queue_table` (`id`, `name`, `musiconhold`, `announce`, `context`, `timeout`, `monitor_join`, `monitor_format`, `queue_youarenext`, `queue_thereare`, `queue_callswaiting`, `queue_holdtime`, `queue_minutes`, `queue_seconds`, `queue_lessthan`, `queue_thankyou`, `queue_reporthold`, `announce_frequency`, `announce_round_seconds`, `announce_holdtime`, `retry`, `wrapuptime`, `maxlen`, `servicelevel`, `strategy`, `joinempty`, `leavewhenempty`, `eventmemberstatus`, `eventwhencalled`, `reportholdtime`, `memberdelay`, `weight`, `timeoutrestart`, `periodic_announce`, `periodic_announce_frequency`, `ringinuse`, `setinterfacevar`) VALUES
(1, 'queue-test', 'default', NULL, 'from-sip', NULL, NULL, 'wav', NULL, NULL, '10', '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 'rrmemory', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


CREATE TABLE IF NOT EXISTS `sip_buddies` (
`id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `callerid` varchar(80) DEFAULT NULL,
  `defaultuser` varchar(80) NOT NULL,
  `regexten` varchar(80) NOT NULL,
  `secret` varchar(80) DEFAULT NULL,
  `mailbox` varchar(50) DEFAULT NULL,
  `accountcode` varchar(20) DEFAULT NULL,
  `context` varchar(80) DEFAULT NULL,
  `amaflags` varchar(7) DEFAULT NULL,
  `callgroup` varchar(10) DEFAULT NULL,
  `canreinvite` char(3) DEFAULT 'yes',
  `defaultip` varchar(15) DEFAULT NULL,
  `dtmfmode` varchar(7) DEFAULT NULL,
  `fromuser` varchar(80) DEFAULT NULL,
  `fromdomain` varchar(80) DEFAULT NULL,
  `fullcontact` varchar(80) DEFAULT NULL,
  `host` varchar(31) NOT NULL,
  `insecure` varchar(12) DEFAULT NULL,
  `language` char(2) DEFAULT NULL,
  `md5secret` varchar(80) DEFAULT NULL,
  `nat` varchar(5) NOT NULL DEFAULT 'no',
  `deny` varchar(95) DEFAULT NULL,
  `permit` varchar(95) DEFAULT NULL,
  `mask` varchar(95) DEFAULT NULL,
  `pickupgroup` varchar(10) DEFAULT NULL,
  `port` varchar(5) NOT NULL,
  `qualify` char(3) DEFAULT NULL,
  `restrictcid` char(1) DEFAULT NULL,
  `rtptimeout` char(3) DEFAULT NULL,
  `rtpholdtimeout` char(3) DEFAULT NULL,
  `type` varchar(6) NOT NULL DEFAULT 'friend',
  `disallow` varchar(100) DEFAULT 'all',
  `allow` varchar(100) DEFAULT 'g729;ilbc;gsm;ulaw;alaw',
  `musiconhold` varchar(100) DEFAULT NULL,
  `regseconds` int(11) NOT NULL DEFAULT '0',
  `ipaddr` varchar(15) NOT NULL,
  `cancallforward` char(3) DEFAULT 'yes',
  `lastms` int(11) NOT NULL,
  `useragent` char(255) DEFAULT NULL,
  `regserver` varchar(100) DEFAULT NULL,
  `callbackextension` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO `sip_buddies` (`id`, `name`, `callerid`, `defaultuser`, `regexten`, `secret`, `mailbox`, `accountcode`, `context`, `amaflags`, `callgroup`, `canreinvite`, `defaultip`, `dtmfmode`, `fromuser`, `fromdomain`, `fullcontact`, `host`, `insecure`, `language`, `md5secret`, `nat`, `deny`, `permit`, `mask`, `pickupgroup`, `port`, `qualify`, `restrictcid`, `rtptimeout`, `rtpholdtimeout`, `type`, `disallow`, `allow`, `musiconhold`, `regseconds`, `ipaddr`, `cancallforward`, `lastms`, `useragent`, `regserver`, `callbackextension`) VALUES
(1, '1001', '1001', '1001', '1001', 'password..1001', '', '', 'from-sip', NULL, '10', 'no', '', 'rfc2833', '', '', '', 'dynamic', 'no', '', '', 'no', '', '', '', '10', '5060', 'yes', NULL, NULL, NULL, '', 'all', 'ulaw;alaw', '', 1480519777, '', 'yes', 8, '', '', ''),
(2, '1002', '1002', '1002', '1002', 'password..1002', '', '', 'from-sip', NULL, '10', 'no', '', 'rfc2833', '', '', '', 'dynamic', 'no', '', '', 'no', '', '', '', '10', '5060', 'yes', NULL, NULL, NULL, '', 'all', 'ulaw;alaw', '', 1480519757, '', 'yes', 9, '', '', ''),
(3, '1003', '1003', '1003', '1003', 'password..1000', '', '', 'from-sip', NULL, '10', 'no', '', 'rfc2833', '', '', '', 'dynamic', 'no', '', '', 'no', '', '', '', '10', '5060', 'yes', NULL, NULL, NULL, '', 'all', 'ulaw;alaw', '', 1480520670, '', 'yes', 7, '', '', ''),
(10, 'proveedor', '', 'proveedor', '', '', '', '', 'from-sip', NULL, '', 'no', '', 'rfc2833', '', '1.1.1.1', NULL, '2.2.2.2', 'no', 'es', '', 'force', '', '', '', '', '', 'yes', NULL, NULL, NULL, '', 'all', 'ulaw;alaw', '', 0, '', 'yes', 2, NULL, NULL, '');


CREATE TABLE IF NOT EXISTS `users` (
`users_id` int(11) NOT NULL,
  `users_name` varchar(50) NOT NULL,
  `users_password` varchar(45) NOT NULL,
  `users_mail` varchar(60) NOT NULL,
  `users_phone` varchar(40) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
 

INSERT INTO `users` (`users_id`, `users_name`, `users_password`, `users_mail`, `users_phone`) VALUES 
(7, 'administrador', '5f4dcc3b5aa765d61d8327deb882cf99', '', '');


CREATE TABLE IF NOT EXISTS `users_agent` (
`users_id` int(11) NOT NULL,
  `users_type` varchar(5) NOT NULL,
  `users_membername` varchar(40) NOT NULL,
  `users_name` varchar(50) NOT NULL,
  `users_password` varchar(45) NOT NULL,
  `users_mail` varchar(60) NOT NULL,
  `users_phone` varchar(40) NOT NULL,
  `users_extension` varchar(15) NOT NULL,
  `users_department` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `voicemail_users` (
`uniqueid` int(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL DEFAULT '0',
  `context` varchar(50) NOT NULL,
  `mailbox` varchar(11) NOT NULL DEFAULT '0',
  `password` varchar(5) NOT NULL DEFAULT '0',
  `fullname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pager` varchar(50) NOT NULL,
  `tz` varchar(10) NOT NULL DEFAULT 'central',
  `attach` varchar(4) NOT NULL DEFAULT 'yes',
  `saycid` varchar(4) NOT NULL DEFAULT 'yes',
  `dialout` varchar(10) NOT NULL,
  `callback` varchar(10) NOT NULL,
  `review` varchar(4) NOT NULL DEFAULT 'no',
  `operator` varchar(4) NOT NULL DEFAULT 'no',
  `envelope` varchar(4) NOT NULL DEFAULT 'no',
  `sayduration` varchar(4) NOT NULL DEFAULT 'no',
  `saydurationm` tinyint(4) NOT NULL DEFAULT '1',
  `sendvoicemail` varchar(4) NOT NULL DEFAULT 'no',
  `delete` varchar(4) NOT NULL DEFAULT 'no',
  `nextaftercmd` varchar(4) NOT NULL DEFAULT 'yes',
  `forcename` varchar(4) NOT NULL DEFAULT 'no',
  `forcegreetings` varchar(4) NOT NULL DEFAULT 'no',
  `hidefromdir` varchar(4) NOT NULL DEFAULT 'yes',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=2008 DEFAULT CHARSET=latin1;

 

ALTER TABLE `bit_cdr`
 ADD UNIQUE KEY `uniqueid_2` (`uniqueid`), ADD KEY `calldate` (`calldate`), ADD KEY `dst` (`dst`), ADD KEY `accountcode` (`accountcode`), ADD KEY `uniqueid` (`uniqueid`);


ALTER TABLE `bit_meetme`
 ADD PRIMARY KEY (`confno`,`starttime`);


ALTER TABLE `extensions`
 ADD PRIMARY KEY (`context`,`exten`,`priority`), ADD KEY `id` (`id`);


ALTER TABLE `meetme`
 ADD PRIMARY KEY (`confno`);


ALTER TABLE `musiconhold`
 ADD PRIMARY KEY (`name`);


ALTER TABLE `queue_log`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);


ALTER TABLE `queue_member_table`
 ADD PRIMARY KEY (`uniqueid`), ADD UNIQUE KEY `queue_interface` (`queue_name`,`interface`);


ALTER TABLE `queue_table`
 ADD PRIMARY KEY (`name`), ADD UNIQUE KEY `name` (`name`), ADD KEY `id` (`id`);


ALTER TABLE `sip_buddies`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `name_2` (`name`);


ALTER TABLE `users`
 ADD PRIMARY KEY (`users_id`);


ALTER TABLE `users_agent`
 ADD PRIMARY KEY (`users_id`);


ALTER TABLE `voicemail_users`
 ADD PRIMARY KEY (`uniqueid`), ADD KEY `mailbox_context` (`mailbox`,`context`);

