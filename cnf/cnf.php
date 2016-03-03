<?php
/*
配置文件
数据库配置
	数据库服务器 帐号 密码 数据表前缀
域名配置
	网站域名 图片前缀,规则
*/
error_reporting();
//定义自描述参数
//用于文件层面定位
define ('ROOT', $_SERVER["DOCUMENT_ROOT"].'/'); 
//用于服务器层面定位
define ('DOMAIN', $_SERVER['HTTP_HOST'].'/');
//定于模板文件路路径
define ('TPL_ROT', 'tpl/');

define('CTL_PTH', ROOT.'ctl/');
define('SER_PTH', ROOT.'ser/');
define('MDL_PTH', ROOT.'mdl/');
define('INC_PTH', ROOT.'inc/');
define('LIB_PTH', ROOT.'lib/');

//URL模式 URL_Scheme URL_START URL_TAIL
//1:http://www.a.com/index/list/1/2/3  
//2:http://www.a.com/index/list/a/1/b/2/c/3  
//3:http://www.a.com/index.php?m=index&c=list&a=1&b=2
//url_scm=1 URL Start url起点,在获取的数据中取此字段之后的数据为有效
define('URL_SCM', 1);
define('URL_SAT', '');
define('URL_TAL', '.html,.htm,.xml');


//数据库配置
$db = array(
	'DB_USR' => 'root', 
	'DB_PSW' => 'root', 
	'DB_HST' => '127.0.0.1', 
	'DB_PRT' => '3306', 
	'DB_DB'  => 'db',
	'DB_PREFIX' => 'ml',
);
?>