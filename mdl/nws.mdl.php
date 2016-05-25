<?php
class nws_mdl extends mdl{
	public $tab='news';
	public function __construct($tab){
		parent::__construct($this->tab);
	}

	public function __destruct(){
		
	}

	//获取新闻首页 默认为新闻列表
	public function nws_idx(){
		$cnd=array('fields'=>'id,title,date');
		return $this->get_dat_pge($cnd);
	}

	//按照条件获取新闻列表
	public function nws_lst($pge,$ppg){ //页码,perpage
		$cnd=array('fields'=>'id,title');
		return $this->get_dat_pge($cnd);
	}

	public function nws_lst_2($pst,$ppg){ //pst=page start起始id  perpage
		
	}

	//获取一条新闻的内容
	public function get_one($id){
		$cnd=array(	'where'=>"id=$id",);
		return $this->get_row_cnd($cnd);
	}
}
?>