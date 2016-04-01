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

	//注册
	public function reg(){
		$this->usr->reg();
	}

	//登陆
	public function log(){
		$this->usr->usr_lst();
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
		$pge=$pam[0];
		$ppg=$pam[1];
		$usr_lst=$this->usr->usr_lst(array(),$pge,$ppg);
		var_dump($usr_lst);
	}

	//生成验证码,用图片返回并放入SESSION
	public function getcde($prm){
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

	public function chkcde(){

	}

	//生成随机数字,放入SESSION并发送短信
	public function getmsg(){
		$msg=(string)rand(1000000,9999999);
		$msg=substr($msg, 1);
		$_SESSION['msg']=$msg;
		print_r($_SESSION);
	}

	public function chkmsg(){
		
	}
}
?>