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
	public function  lst(){
		$upd=$this->usr->usr_lst($id);
	}

}
?>