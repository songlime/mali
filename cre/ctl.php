<?php
/*
*控制器基类
*/
class ctl extends cre{
	private $name;
	
	public function __construct(){
	}

	public function __destruct(){
	}

	/*
	*获取控制器名
	*/
	public function get_nme($ech=false){
		if($ech) echo __CLASS__;
		return __CLASS__;
	}

}
?>