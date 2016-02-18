<?php
/*
*控制器基类
*/
class ctl{
	private $name;
	
	public function __construct(){
	}

	public function __destruct(){
	}

	/*
	*获取控制器名
	*/
	public function get_nme(){
		return __CLASS__;
	}

}
?>