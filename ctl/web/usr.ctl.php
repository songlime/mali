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
		parent::__construct();
		$this->usr=$this->new_ser('usr');
		$this->smt = new Smarty;
	}

	public function __destruct(){
		
	}

	//
	public function index(){
		$this->log();
	}

	//注册页面
	public function reg(){
		$this->smt->assign('title','注册');
		$this->smt->display(TPL_PTH.'web/reg.tpl');
	}

	//注册,注册成功跳转到登陆页面,注册失败跳转到注册页面
	public function register(){
		$reg_dat= array(
			'une'=>$_POST['username'],
			'mbl'=>$_POST['mobile'],
			'pwd'=>$_POST['password'],
			'pwd_rep'=>$_POST['password_repeat'],
		);
		$ret=$this->usr->reg($reg_dat);
		if($ret>0){
			header('location:/log');
		}
		else{
			switch ($ret) {
				default:
					echo 'error'.$ret;
					exit('this page will jump to /reg');
					break;
			}
			//注册失败,继续
			header('location:/reg');
		}

	}

	//登陆页面
	public function log(){
		var_dump('expression');
		$this->smt->assign('title','登陆');
		$this->smt->display(TPL_PTH.'web/log.tpl');
	}

	//验证用户信息，通过跳转到指定页面，失败跳转登陆页面
	public function login($parm){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$inf=$this->usr->log($username,$password);
		if($inf['uid']){
			//登陆成功跳转到指定页面
			setcookie('login_success','login success page');
			header('location:/index');
		}
		else{
			setcookie('login_fail','login fail reason');
			header('location:/log?fail=fail');
		}
	}

	//鉴定用户身份.
	public function chk(){

	}

	//获取指定用户信息
	public function inf($id=''){
		if(!$id){
			echo 'error';
			return false;
		}
		else
			$id=$id[0];
		$usr_inf=$this->usr->get_usr_inf($id);
		if(!$usr_inf){
			echo "id is not exist";
		}
		else{
			var_dump($usr_inf);
		}
	}

	public function upd(){
		$upd=$this->usr->upd_usr_inf($id);
		var_dump($upd);
	}

	//列出所有用户
	public function  lst($pam){
		$pge=$pam[0]?$pam[0]:1;
		$ppg=$pam[1]?$pam[1]:20;
		$usr_lst=$this->usr->usr_lst(array(),$pge,$ppg);
		var_dump($usr_lst);
	}

	//生成验证码,用图片返回并放入SESSION
	public function get_cde($prm){
		$chr_lst="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$im=imagecreate(100, 150);
		$fnt=ROOT.'inc/fnt/iOS8.ttf';
		$white = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$style = array($black,$white,$white );
		imagesetstyle($im, $style);
		for($i=0;$i<4;$i++){
			$n=rand(0,35);
			$x=rand(6,10);
			$y=rand(24,30);
			$a=rand(-30,-10);
			imagettftext($im, 20, $a, $i*16+$x, $y, $black, $fnt, $chr_lst[$n]);
			$cde.=$chr_lst[$n];
		}
		$_SESSION['code']=$cde;
		header('Content-type: image/png');
		imagepng($im);
	}

	public function chk_cde(){

	}

	//生成随机数字,放入SESSION并发送短信
	public function get_msg(){
		$msg=(string)rand(1000000,9999999);
		$msg=substr($msg, 1);
		$_SESSION['msg']=$msg;
		print_r($_SESSION);
	}

	public function chk_msg(){
		
	}
}
?>