<?php
class cst_ctl extends ser{
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