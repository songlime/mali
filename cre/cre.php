<?php
class cre{
	private $uri,$uri_arr;

	/*
	*构造函数
	*/
	public function __construct($uri){
		$this->uri=$uri;
		$this->url_dec();
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
		chdir(ROOT);
		var_dump($this->uri_arr);
		chdir('cls/');
		$arr=$this->uri_arr;
		$arr1=current($arr);
		if($arr1)
	}

	/*
	*解析请求URL
	*/
	public function url_dec(){
		$uri_arr=explode('/',$this->uri);
		if(in_array(URL_STT, $uri_arr)){
			foreach ($uri_arr as $k => $v) {
				if($v!=URL_STT)
					unset($uri_arr[$k]);
				else{
					unset($uri_arr[$k]);
					break;
				}
			}
		}
		$this->uri_arr=$uri_arr;
	}


	/*
	*构造URL
	*/
	public function url_enc($cnt){

	}
}
?>