<?php
class cre{
	private $uri,$uri_arr;

	/*
	*构造函数
	*/
	public function __construct($uri){
		$this->uri=$uri;
		$this->go();
		var_dump($this->uri_arr);
		l($uri);
	}

	/*
	*析构函数
	*/
	public function __destruct(){
		unset($this);
		l('end');
	}

	/*
	*开始
	*/
	public function go(){
		$arr=$this->uri_arr=$this->url_dec($this->uri);
		chdir(ROOT);
		chdir('cls/');
	}

	/*
	*解析请求URL
	*/
	public function url_dec($uri){
		//处理uri
		$flag=true;
		$arr=explode('/',$uri);
		foreach ($arr as $k => $v) {//从起始标识以后开始获取数据
			if($v==URL_STT && $flag){
				$flag=false;
				unset($arr[$k]);
			}
			if($flag || $v=='')
				unset($arr[$k]);
		}
		//处理后缀
		$url_tal=explode(',', URL_TAL);
		$end_arr=end($arr);
		foreach ($url_tal as $r) {
			if(substr($end_arr, 0-strlen($r))==$r){
				$arr[count($arr)]=str_replace($r, '', $end_arr);
			}
		}
		$arr=array_values($arr);
		var_dump($arr);
		//遍历函数,识别请求
		foreach ($arr as $k=>$v) {
			if($k==0){
				$cls_pth=ROOT.'cls/';
				$req_arr['p']=;
			}
			elseif($k==1){

			}
			elseif($k%2){

			}
			elseif(!$k%2){

			}
		}
		return $this->uri_arr=$req_arr;
	}


	/*
	*构造URL
	*/
	public function url_enc($cnt){

	}
}
?>