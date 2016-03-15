<?php
/*
*数据模型类
*/
class mdl extends cre{
	public $tab;
	private $dbo;
	/**
	*构造方法
	*/
	public function __construct($tab_nme=''){
		require_once ROOT.'inc/dbo/dbo.php';
		$this->dbo=new dbo(DB_HST, DB_USR, DB_PSW, DB_DB,$tab_nme);
		if($tab_nme)
			$this->tab=$tab_nme;
		else
			$this->tab='';
	}

	public function __destruct(){

	}

	public function shw_tab(){
		$this->dbo->show_databases();
	}

	public function get_mdl_nme(){
		return $this->tab;
	}

	//根据id获取单条数据
	public function get_one_id($id){
		if(!$id)
			return -1;
		return $this->dbo->get_one($id);
	}

	//根据条件获取单条数据
	public function get_one_cnd($id){

	}

	//根据条件获取多条数据
	public function get_dat_cnd($cnd){

	}

	//插入单条数据
	public function ist_dat($arr){
		
	}
}
?>