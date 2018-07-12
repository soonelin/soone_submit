CREATE TABLE `soone_submit` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章編號',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `action_date` datetime NOT NULL COMMENT '投稿日期',
  `grade` varchar(10) NOT NULL COMMENT '學生年級',
  `class` varchar(10) NOT NULL COMMENT '學生班級',
  `teacher` varchar(10) NOT NULL COMMENT '指導老師',
  `title` varchar(255) NOT NULL COMMENT '作文題目',
  `content` text NOT NULL COMMENT '作文內容',
  `enable` enum('0','1') NOT NULL COMMENT '審核是否通過',
  `confirm` enum('0','1') NOT NULL COMMENT '審查是否入選',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `soone_submit_files_center` (
  `files_sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '檔案流水號',
  `col_name` varchar(255) NOT NULL COMMENT '欄位名稱',
  `col_sn` varchar(255) NOT NULL COMMENT '欄位編號',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `kind` enum('img','file') NOT NULL COMMENT '檔案種類',
  `file_name` varchar(255) NOT NULL COMMENT '檔案名稱',
  `file_type` varchar(255) NOT NULL COMMENT '檔案類型',
  `file_size` int(10) unsigned NOT NULL COMMENT '檔案大小',
  `description` text NOT NULL COMMENT '檔案說明',
  `counter` mediumint(8) unsigned NOT NULL COMMENT '下載人次',
  `original_filename` varchar(255) NOT NULL COMMENT '檔案名稱',
  `hash_filename` varchar(255) NOT NULL COMMENT '加密檔案名稱',
  `sub_dir` varchar(255) NOT NULL COMMENT '檔案子路徑',
  PRIMARY KEY (`files_sn`)
)ENGINE=MyISAM;
