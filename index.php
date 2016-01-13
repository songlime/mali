<?php
/*
入口文件
核心功能:
	定义常量
	配置常用变量
	加载配置文件
	启动核心程序

*/
require 'cnf/cnf.php';
require ROOT.'inc/fnc.php';
//核心
require ROOT.'cre/cre.php';
$cre =new cre($_SERVER['REQUEST_URI']);
$cre->go();
?>