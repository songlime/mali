<?php
/*
入口文件
核心功能:
	加载核心文件
	启动核心程序
*/
require '/cre/cre.php';
$cre=new cre($_SERVER['REQUEST_URI']);
$cre->go();
?>