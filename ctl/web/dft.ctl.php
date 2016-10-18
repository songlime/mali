<?php
/*
*默认操作
*未指定ctl时执行该类中的相关方法
*date 2016-02-18
*/
class dft_ctl extends ctl{
	private $param;
	private $smt;
	private $news;
	private $evt;
	public function __construct(){
		parent::__construct();
		$this->smt = new Smarty;
		$this->nws=$this->new_ser('nws');
		$this->evt=$this->new_ser('evt');
	}

	public function __destruct(){

	}

	public function index($prm){
		var_dump($prm);
		var_dump($_GET);
		if(!$prm)
			$evt_lst=$this->evt->get_new();
		elseif($prm && $prm[0]='evt' && $prm[1]){
			$evt_lst=$this->evt->get_evt_lst((int)$prm[1]);
		}
		$this->smt->assign('evt_lst',$evt_lst);
		$this->smt->assign('inf','首页|');
		$this->smt->display(TPL_DIR.'index.tpl');
	}

	public function reg($prm){
		$this->smt->assign('title','注册|');
		$this->smt->display(TPL_DIR.'reg.tpl');
	}

	public function log($prm){
		print_r($_GET);
		$this->smt->assign('title','登陆|');
		$this->smt->display(TPL_DIR.'log.tpl');
	}
}
?>




