<?php
class cre{
	private $uri,$uri_arr;
	public $mod;
	/*
	*构造函数
	*/
	public function __construct($uri,$cnf=''){
		$this->uri=$uri;
		$this->ssn_hnd();//处理session
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
		//解析URL返回数组
		$arr=$this->uri_arr=$this->url_dec($this->uri);
		//默认操作
		if(!$arr){
			$arr=array(
				'pjt'=>'web',
				'mod'=>'dft',
				'act'=>'index',
			);
		}
		//解析arr并加载数据,执行操作
		$req_arr=$req_prm=array();
		$flg=$mod=NULL;
		while (current($arr)){
			$v=current($arr);
			// 项目名
			if(!isset($req_arr['pjt'])){
				$cls_pth=ROOT.'cls/';
				if(is_dir($cls_pth.$v)){
					$req_arr['pjt']=$v;
					next($arr);
				}
				else //默认项目
					$req_arr['pjt']='web';
			}
			//模块名
			elseif(!isset($req_arr['mod'])){
				if(is_file($cls_pth.$req_arr['pjt'].'/'.$v.'.cls.php')){
					$req_arr['mod']=$v;
				}
				else //默认类文件
					$req_arr['mod']='dft';
				//加载类文件
				//处理默认类,执行预处理方法.
				require_once $cls_pth.$req_arr['pjt'].'/cst.cls.php';
				require_once $cls_pth.$req_arr['pjt'].'/'.$req_arr['mod'].'.cls.php';
				$this->mod=new $req_arr['mod']();
			}
			//操作名
			elseif(!isset($req_arr['act'])){
				if(method_exists($mod,$v)){
					$req_arr['act']=$v;
					next($arr);
				}
				else //默认方法
					$req_arr['act']='index';
			}

			//处理参数
			else{
				if(URL_SCM==1){//默认是1,不同的URL构造模式,解析方式也不同.
					$req_prm[]=next($arr);
				}
				elseif(URL_SCM==2){
					$req_prm[$v]=next($arr);
				}
				next($arr);
			}
		}
		//执行函数
		$this->mod->index();
	}

	/*
	*解析请求URL
	*/
	public function url_dec($uri){
		//处理uri
		$flag=true;
		$arr=explode('/',$uri);
		foreach ($arr as $k => $v) {//从起始标识以后开始获取数据
			if($v==URL_SAT && $flag){
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
		return $arr;
	}

	public function ssn_hnd(){
		session_start();
	}

	/*
	*构造URL
	*/
	public function url_enc($cnt){

	}
}
?>