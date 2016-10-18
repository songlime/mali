<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class usr_ser extends ser{
	private $name;
	private $usr_mdl,$acu_mdl;
	public function __construct(){
		$this->usr_mdl=$this->new_mdl('usr');
		$this->acu_mdl=$this->new_mdl('acu');
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
		$ret=$this->acu_mdl->ins_dat($arr);
		return $ret;
	}

	//登陆-用户名/手机号/邮箱+密码
	public function log($username,$password){
		$ret=$this->acu_mdl->log($username,$password);
		$usr_inf=array(
			'uid'=>$ret['id'], 
			'username' =>$ret['username'], 
			'password' =>$ret['password'],
			'mobile' =>$ret['mobile'] ,
			'email' =>$ret['email'] ,
			'weixin_id' =>$ret['weixin_id'] ,
			'weibo_id' =>$ret['weibo_id']  ,
			'qq_id' =>$ret['qq_id'] ,
			'reg_date' =>$ret['reg_date'],
			'las_date' =>$ret['las_date'] ,		
		);
		return $usr_inf?$usr_inf:false;
	}

	//登陆-手机号+验证码
	public function log_mobile($mobile,$code){

	}

	//登陆-微信登陆
	public function log_weixin($weixin_id){

	}

	//登陆-微博登陆
	public function log_weibo($weibo_id){
	}

	//鉴定当前会话用户身份 $jmp是否跳转到登陆页面
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

	//获取账户信息
	public function get_acn_inf($uid){
		
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

	//更新用户信息
	public function upd_usr_inf(){
		$arr=array(
			'username' =>"upd", 
			'mobile'=>'15656235689',
			'email'=>'up@date.com',
		);
		$cnd="id=10";
		$ret=$this->acu_mdl->upd_dat($arr,$cnd);
		return ($ret)?$ret:false;
	}
	
	//列出所有用户
	public function  usr_lst($cnd=array(),$pge=1,$ppg=20){
		$dat=$this->acu_mdl->get_dat_pge(array(),$pge,$ppg);
		return $dat;
	}

}
?>