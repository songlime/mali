#用户账户
CREATE TABLE `account` (
`uid`  int UNSIGNED NOT NULL  AUTO_INCREMENT ,
`username`  varchar(32) NULL ,
`password`  varchar(32) NULL ,
`mobile`  int UNSIGNED NULL ,
`email`  varchar(32) NULL ,
`weixin_id`  varchar(32) NULL ,
`weibo_id`  varchar(32) NULL ,
`qq_id`  varchar(32) NULL ,
PRIMARY KEY (`uid`),
INDEX `id` (`uid`) USING BTREE 
)
;
#用户信息
CREATE TABLE `user` (
`uid`  int UNSIGNED NOT NULL AUTO_INCREMENT ,
`nickname`  varchar(32) NULL ,
`name`  varchar(32) NULL ,
`sex`  char(1) NULL ,
`avatar`  varchar(64) NULL ,
`birthday`  int NULL ,
`city`  int NULL ,
`signature`  varchar(128) NULL ,
`del`  tinyint NULL DEFAULT NULL,
PRIMARY KEY (`uid`)
INDEX `id` (`uid`) USING BTREE 
)
;


