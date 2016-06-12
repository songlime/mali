<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class news_ctl extends ctl{
	private $news;
	
	public function __construct(){
		parent::__construct();
		$this->news=$this->new_ser('news');
		$this->smt = new Smarty;
		$this->smt->compile_dir=TPL_PTH.'temp_c';
		$this->smt->template_dir = TPL_PTH;
		$this->smt->config_dir = TPL_PTH.'cfg/';
		// $this->smt->cache_dir = '/web/www.mydomain.com/smarty/guestbook/cache/'; 
		
		$this->caching = true;

	}

	public function __destruct(){
		
	}

	public function index($prm){
		header("content-type:text/html; charset=utf-8");
		if($id=(int)$prm[0])
			return $this->detail($prm);
		else{
			$index=$this->news->get_index();
			$this->smt->assign('title','news-index-');
			$this->smt->display(TPL_PTH.'web/news/news_index.tpl');
			var_dump($index);
		}
	}

	//获取新闻分类列表
	public function lists($prm){
		header("content-type:text/html; charset=utf-8");
		echo 'ctl.php-prms';var_dump($prm);
		$cid=$prm[0];
		$pge=$prm[1];
		$ppg=$prm[2];
		$nws_lst=$this->news->get_lst($cid,$pge,$ppg);
		var_dump($nws_lst);
		return ture;
	}

	public function detail($prm){
		$nid=(int)$prm[0];
		$nws_dtl=$this->news->get_detail($nid);
		$title=mb_substr($nws_dtl['title'], 0,16,'utf-8');
		//news commits
		$news_commit=$this->news->get_nws_cmt($nid,1);
		$this->smt->assign('title',$title);
		$this->smt->assign('nws_dtf',$nws_dtl);
		$this->smt->display(TPL_PTH.'web/news/news_detail.tpl');
		return true;
	}

	public function commit($prm){
		$nid=$_POST['nid'];
		$uid=$_SESSION['uid'];
		$cmt=$_POST['commit'];
		header("content-type:text/html; charset=utf-8");
		$news_commit=$this->news->cmt_nws($nid,$uid,$cmt);

		return true;
	}

}
?>
