<?php
/*
*默认操作
*未指定ctl时执行该类中的相关方法
*date 2016-02-18
*/
class dft_ctl extends ctl{
	private $param;
	private $smt;
	public function __construct(){
		parent::__construct();
		$this->smt = new Smarty;
	}

	public function __destruct(){

	}

	public function index(){
		$this->smt->assign('title','index - ');
		$this->smt->display(TPL_PTH.'web/index.tpl');
		echo 'index';
	}

	public function reg($prm){
		$this->smt->assign('title','注册');
		$this->smt->display(TPL_PTH.'web/reg.tpl');
	}

	public function log($prm){
		print_r($_GET);
		$this->smt->assign('title','登陆');
		$this->smt->display(TPL_PTH.'web/log.tpl');
	}
}

?>




