<?php
class cre{
	private $uri,$uri_arr;

	/*
	*构造函数
	*/
	public function __construct($uri){
		$this->uri=$uri;
		$this->go();
		echo 'cre __construct';
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
		$this->uri_arr=$this->url_dec();
		$arr=$this->uri_arr;
		chdir(ROOT);
		chdir('cls/');
	}

	/*
	*解析请求URL
	*/
	public function url_dec(){
		//处理uri
		$uri=$this->uri;
		$flag=true;
		$arr=explode('/',$uri);
		foreach ($arr as $k => $v) {
			if($v==URL_STT && $flag){
				unset($arr[$k]);
				$flag=false;
			}
			if($flag)
				unset($arr[$k]);
			elseif($v=='')
				unset($arr[$k]);
		}
		$url_tal=explode(',', URL_TAL);
		foreach ($url_tal as $k => $v) {
			if(substr($end_arr, 0-strlen(URL_TAL))){

			}
		}
		return $this->uri_arr=$arr;
	}


	/*
	*构造URL
	*/
	public function url_enc($cnt){

	}
}
?>