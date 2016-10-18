<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class nws_ser extends ser{
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
		//TO_DO 获取最新内容
		//TO_DO 根据分类获取
		$new_news=$this->nws_mdl->nws_idx();
		$news_p1=$this->get_lst(1);
		$news_p2=$this->get_lst(2);
		$news_p3=$this->get_lst(3);
		$news_p4=$this->get_lst(4);
		return $array($new_news,$news_p1,$news_p2,$news_p3,$news_p4);
	}

	//获取指定分类下新闻的列表 分页
	public function get_lst($cls_id=0,$pge=1,$ppg=20){
		$pge=(!(int)$pge)?1:$pge;
		$ppg=(!(int)$ppg)?20:$ppg;
		return $this->nws_mdl->nws_lst($cls_id,$pge,$ppg);
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
	public function get_nws_cmt($nid,$pge=1,$ppg=20){
		$ret=$this->nws_cmt_mdl->get_nws_cmt($nid,$pge,$ppg);
		return $ret;
	}

	//发表评论
	public function cmt_nws($nid,$uid,$cmt){
		if((int)$nid<1) return -1;
		if((int)$uid<1) return -2;
		if(!$cmt) return -3;
		$ret=$this->nws_cmt_mdl->cmt_nws($nid,$uid,$cmt);
		return $ret;
	}

}
?>