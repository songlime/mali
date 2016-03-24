<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class usr_ser extends ser{
	private $name;
	private $usr_mdl,$act_mdl;
	public function __construct(){
		$this->usr_mdl=$this->new_mdl('user');
		$this->acn_mdl=$this->new_mdl('account');
	}

	public function __destruct(){
		
	}

	//注册
	public function reg(){
		$arr=array(
			'username'=>'abenaben',
			'password'=>'2ben',
			'mobile'=>'15656562323',
			'email'=>'a@sina.com',
			'reg_date' =>time(),
		);
		$ret=$this->acn_mdl->ins_dat($arr);
		return $ret;
	}

	//登陆
	public function log(){

	}

	//获取指定用户信息,根据uid
	public function get_usr_inf($uid){
		$arr=array(
			'fields' =>"id,nickname,sex,avatar", 
			'where' => 'id='.$uid, 
			'order' => 'id DESC', 
			'group' => '', 
			'limit' => '1'
		);
		$ret=$this->usr_mdl->get_row_cnd($arr);
		return ($ret)?$ret:false;
	}

	public function upd_usr_inf(){
		$arr=array(
			'username' =>"upd", 
			'mobile'=>'15656235689',
			'email'=>'up@date.com',
		);
		$cnd="id=10";
		$ret=$this->acn_mdl->upd_dat($arr,$cnd);
		return ($ret)?$ret:false;
	}
	//列出所有用户
	public function  usr_lst($cnd=array(),$pge=1,$ppg=36){
		$dat=$this->acn_mdl->get_dat_pge(array());
		return $dat;
	}

}
?>