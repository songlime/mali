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
			print_r($index);
		}

	}

	public function detail($prm){
		var_dump($prm);
		$this->smt->assign('title','news-detail page ');
		$this->smt->display(TPL_PTH.'web/news/news_detail.tpl');
		return true;
	}

}
?>
