<?php
/*
业务模型类
*/
class cls{
	private $cls_nme='bse_cls';
	private $nme;

	/*
	构造函数
	*/
	public function __construct(){

	}

	/*
	析构函数
	*/
	public function __destruct(){
		
	}

	/*
	返回函数名
	*/
	public function get_cls_nme(){
		return $this->cls_nme;
	}

	/*
	*返回
	*/
	public function get_sth(){
		return 'stb';
	}

}
?>