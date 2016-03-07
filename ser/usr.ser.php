<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class usr_ser extends ser{
	private $name;
	
	public function __construct(){
		$usr_mdl=$this->new_mdl('usr');
		var_dump($usr_mdl);

		$usr_mdl=$this->new_mdl('account');
		var_dump($usr_mdl);
	}

	public function __destruct(){
		
	}

	//注册
	public function reg(){
		echo 'usr_ser->reg | ';
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