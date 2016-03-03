<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class usr_ctl extends ctl{
	private $usr;
	private $nme;
	
	public function __construct(){
		$this->usr=$this->new_ser('usr');
	}

	public function __destruct(){
		
	}

	//注册
	public function reg(){
		var_dump(LIB_PTH);
	}

	//登陆
	public function log(){
		
	}

	//获取指定用户信息
	public function get_usr_inf(){

	}

	//列出所有用户
	public function  usr_lst(){

	}

}
?>