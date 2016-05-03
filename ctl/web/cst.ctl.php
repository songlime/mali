<?php
/*
*基础控制器类
*每一个类加载前加载本类
*date 2016-02-18
*/
class cst_ctl extends ctl{
	private $name;
	public function __construct(){
		parent::__construct();
		$this->ssn_hnd();
		$this->req_smt();
	}

	public function __destruct(){
		
	}

	public function req_smt(){
		require LIB_PTH.'smarty/libs/Smarty.class.php';
	}
}
?>