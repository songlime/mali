<?php
class nws_cmt_mdl extends mdl{
	public $tab='news_commit';
	public function __construct($tab){
		parent::__construct($this->tab);
	}

	public function __destruct(){
		
	}

	//获取一条新闻的内容
	public function get_nws_cmt($nid,$pge=1,$ppg=20){
		$cnd=array('fields'=>'*','where'=>"nid=$nid",);
		$ret=$this->get_dat_pge($cnd,$pge,$ppg);
		return $ret;
	}
}
?>