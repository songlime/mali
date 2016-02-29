<?php
/*
*数据模型类
*/
class mdl extends cre{
	private $nme;
	public $tab_nme;

	/**
	*构造方法
	*/
	public function __construct($tab_nme){
		$this->tab_nme=$tab_nme;
	}

	public function __destruct(){

	}

	public function get_mod_nme(){
		return $this->tab_nme;
	}

	//根据id获取单条数据
	public function get_one_id($id){

	}

	//根据条件获取单条数据
	public function get_one_cnd($id){

	}

	//根据条件获取多条数据
	public function get_dat_cnd($cnd){

	}

	//插入单挑数据
	public function ist_dat($arr){
		
	}
}
?>