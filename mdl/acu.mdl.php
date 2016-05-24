<?php
class acu_mdl extends mdl{
	public $tab='account';
	public function __construct($tab){
		parent::__construct($this->tab);
	}

	public function __destruct(){
		
	}

	public function log($username,$password){
		$username=addslashes($username);
		$password=addslashes($password);
		$where=array("username='$username'","password='$password'");
		$cnd=array('where'=>$where,'limit'=>1);
		$acu_inf=$this->get_row_cnd($cnd,true);
		return $acu_inf;
	}

	public function get_one($id){
	}

	public function edit(){

	}
}
?>