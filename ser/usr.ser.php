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
		$this->act_mdl=$this->new_mdl('account');
	}

	public function __destruct(){
		
	}

	//注册
	public function reg($pam){
		$nme=$pam['une'];
		$mbl=trim($pam['mbl']);
		$pwd=$pam['pwd'];
		$pwd_rep=$pam['pwd_rep'];
		if($pwd!=$pwd_rep) //验证密码两次是否一致
			return -1;
		// if(!$nme)// 验证用户名格式
		// 	return -2;
		if (!preg_match('/^1[3-9]\d{9}$/', $mbl)) // 验证手机号
			return -3;
		if(!$pwd)//验证密码格式
			return -4;
		$arr=array(
			'username'=>$nme,
			'mobile'=>$mbl,
			'password'=>$pwd,
			'reg_date' =>date("Y-m-d H:i:s",time()) ,
		);
		$ret=$this->act_mdl->ins_dat($arr);
		return $ret;
	}

	//登陆
	public function log(){

	}

	//鉴定用户身份 $jmp是否跳转到登陆页面
	public function chk($jmp=0){
		$uid=(int)$_SESSION['uid'];
		if($uid<0){
			if($jmp===0)
				header('location:'.'/log');
			else
				return false;
		}
		$usr_inf=$this->get_usr_inf($uid);
		if(!$usr_inf){
			if($jmp===0)
				header('location:'.'/log');
			else
				return false;
		}
		else{
			if($jmp===0)
				header('location:'.'/log');
			else
				return false;
		}
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
		$ret=$this->act_mdl->upd_dat($arr,$cnd);
		return ($ret)?$ret:false;
	}
	//列出所有用户
	public function  usr_lst($cnd=array(),$pge=1,$ppg=20){
		$dat=$this->act_mdl->get_dat_pge(array(),$pge,$ppg);
		return $dat;
	}

}
?>