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
		$this->smt->assign('title','The smarty title');
		$this->smt->display(TPL_PTH.'/web/index.tpl');
	}

	public function reg($prm){
		var_dump($prm);
	}
}

?>