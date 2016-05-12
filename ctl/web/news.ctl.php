<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class news_ctl extends ctl{
	private $usr;
	private $nme;
	
	public function __construct(){
		parent::__construct();
		$this->usr=$this->new_ser('usr');
		$this->smt = new Smarty;
	}

	public function __destruct(){
		
	}

}
?>
