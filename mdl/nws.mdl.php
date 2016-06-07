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
		// $cnd=array('fields'=>'id,title,date');
		// return $this->get_dat_pge($cnd);
		$nws=array(
			'lst_1'=>$this->nws_lst(1,1,10),
			'lst_2'=>$this->nws_lst(2,1,10),
			'lst_3'=>$this->nws_lst(3,1,10),
			'lst_4'=>$this->nws_lst(4,1,10),
			'lst_5'=>$this->nws_lst(5,1,10),
		);
		return $nws;
	}

	//按照条件获取新闻列表
	public function nws_lst($cls_id,$pge,$ppg){ //分类,page,perpage
		if($cls_id)$where="cid=$cls_id";
		$cnd=array('fields'=>'id,title','where'=>$where);
		return $this->get_dat_pge($cnd,$pge,$ppg);
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