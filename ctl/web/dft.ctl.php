<?php
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
		$this->smt->assign('title','The smarty title testing');
		$this->smt->display(TPL_PTH.'web/index.tpl');
	}

	public function reg($prm){
		$this->smt->assign('title','注册');
		$this->smt->display(TPL_PTH.'web/reg.tpl');
	}

	public function getcode($prm){
		$_SESSION['code']="ABCD";
		print_r($_SESSION);
	}
}

?>