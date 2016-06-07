<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class news_ser extends ser{
	private $usr_mdl,$nws_mdl;

	public function __construct(){
		$this->usr_mdl=$this->new_mdl('usr');
		$this->nws_mdl=$this->new_mdl('nws');
		$this->nws_cmt_mdl=$this->new_mdl('nws_cmt');

	}

	public function __destruct(){
		
	}

	//获取首页内容
	public function get_index($pam=''){
		return $this->nws_mdl->nws_idx();
	}

	//获取指定分类下新闻的列表 分页
	public function get_lst($cls_id=0,$pge=1,$ppg=20){
		$pge=(!(int)$pge)?1:$pge;
		$ppg=(!(int)$ppg)?20:$ppg;
		return $this->nws_mdl->nws_lst($cls_id,$pge,$ppg,1);
	}

	//获取一条新闻的内容
	public function  get_detail($nid){
		$nws_dtl=$this->nws_mdl->get_one($nid);
		$nws_dtl['date']=date('Y-m-d H:i:s',$nws_dtl['date']);
		$nws_dtl['date_mdf']=date('Y-m-d H:i:s',$nws_dtl['date_mdf']);
		//获取新闻评论第一页
		$nws_cmt=$this->nws_cmt_mdl->get_nws_cmt($nid);
		var_dump($nws_cmt);
		return $nws_dtl;
	}

	//获取新闻的评论,分页
	public function get_nws_cmt($nid,$pge,$ppg){
		
	}

}
?>