<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class news_ser extends ser{
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
	}

	//列出所有用户
	public function  usr_lst($cnd=array(),$pge=1,$ppg=20){
		$dat=$this->acu_mdl->get_dat_pge(array(),$pge,$ppg);
		return $dat;
	}

}
?>