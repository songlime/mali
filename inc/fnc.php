<?php
/*
常用函数
function_common
*/

function f(){
	return 'f';
}

function l($cnt,$log_fle=''){
	chdir(ROOT.'log/');
	if(!$log_fle)
		$log_fle='1.log';
	if(!is_dir(date('Y/'))){
		mkdir(date('Y/'));
	}
	if(!is_dir(date('Y/m/'))){
		mkdir(date('Y/m/'));
	}
	if(!is_dir(date('Y/m/d/'))){
		mkdir(date('Y/m/d/'));
	}
	$log_pth=date('Y/m/d/');
	$l=fopen($log_pth.$log_fle, 'a');
	flock($l, 2);
	fwrite($l, 'l:>'.$cnt."\r\n");
	flock($l, 3);
	fclose($l);
}

//解析URL
function dcd_url($uri,$url_cnf){
}

//构造URL
function ecd_url(){

}
?>