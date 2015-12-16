<?php
/*
基础类
*/
class bse_cls{
	private cls_nme='bse_cls';
	private nme;

	/*
	构造函数
	*/
	void public function __construct(){
		parent::__construct();
	}

	/*
	析构函数
	*/
	void public function __destruct($value=''){
		
	}

	/*
	返回函数名
	*/
	public function get_cls_nme(){
		return $this->cls_nme;
	}

}
?>