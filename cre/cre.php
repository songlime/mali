<?php
class cre{
	private $uri,$uri_arr;
	public $mod;
	/*
	*构造函数
	*/
	public function __construct($uri,$cnf=''){
		$this->lod_cnf();//加载配置文件
		$this->lod_fnc();//加载通用方法
		require_once ROOT.'/cre/ser.php';
		require_once ROOT.'/cre/ctl.php';
		require_once ROOT.'/cre/mdl.php';
		$this->uri=$uri;
		error_reporting(7);
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
		$ctl_pth=CTL_PTH;

		//解析URL返回数组
		$arr=$this->uri_arr=$this->url_dec($this->uri);
		//默认操作
		if(!$arr)
			$arr=array('pjt'=>'web','mod'=>'dft','act'=>'index',);
		//解析arr并加载数据,执行操作
		$req_arr=$req_prm=array();
		$flg=$mod=NULL;
		$i=0;
		while ($i++<3 || current($arr)){
			$v=current($arr);
			// 项目名
			if(!isset($req_arr['pjt'])){
				if($v && is_dir($ctl_pth.$v)){
					$req_arr['pjt']=$v;
					next($arr);
				}
				else //默认项目
					$req_arr['pjt']='web';
			}
			//模块名
			elseif(!isset($req_arr['mod'])){
				if(is_file($ctl_pth.$req_arr['pjt'].'/'.$v.'.ctl.php')){
					$req_arr['mod']=$v;
					next($arr);
				}
				else //默认类文件
					$req_arr['mod']='dft';
				//加载类文件
				//处理默认类,执行预处理方法.
				require_once $ctl_pth.$req_arr['pjt'].'/cst.ctl.php';
				require_once $ctl_pth.$req_arr['pjt'].'/'.$req_arr['mod'].'.ctl.php';
				$mod_nme=$req_arr['mod'].'_ctl';
			}
			//操作名
			elseif(!isset($req_arr['act'])){
				if($v && method_exists($mod_nme,$v)){
					$req_arr['act']=$v;
					next($arr);
				}
				else //默认方法
					$req_arr['act']='index';
				$act=$req_arr['act'];
			}
			//处理参数
			else{
				if(URL_SCM==1){//默认是1,不同的URL模式,构造和解析方式也不同.
					$req_prm[]=current($arr);
				}
				elseif(URL_SCM==2){
					$req_prm[current($arr)]=next($arr);
				}
				next($arr);
			}
		}
		//执行函数
		$cst_ctl=new cst_ctl();
		$mod_ctl=new $mod_nme();
		$mod_ctl->$act($req_prm);
	}

	/*
	*解析请求URL
	*/
	public function url_dec($uri){
		//处理uri
		$flag=true;
		$arr=explode('/',$uri.'/');
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
		$arr=array_pad($arr, 3, '');
		return $arr;
	}

	/*
	*session处理
	*/
	public function ssn_hnd(){
		session_start();
	}

	/*
	*构造URL
	*/
	public function url_enc($cnt){

	}

	/*
	*加载指定路径的类文件并实例化对象
	*$cls类名
	*$pth路径
	*$fle文件名
	*/
	private function cls($cls,$pth,$fle,$prm=''){
		if(!is_file($pth.$fle)){
			return false;
		}
		else{
			require_once $pth.$fle;
			$obj=new $cls($prm);
			return $obj;
		}
	}

	/*实例化一个业务逻辑类
	*/
	public function new_ser($ser_nme){
		$fle=$ser_nme.'.ser.php';
		$ser_nme.='_ser';
		$ser=$this->cls($ser_nme,SER_PTH,$fle);
		if($ser)
			return $ser;
		else{
			exit('code:1,can\'t load service');
		}
	}

	/*实例化一个数据模型类
	*/
	public function new_mdl($mdl_nme){
		$fle=$mdl_nme.'.mdl.php';
		$mdl=$mdl_nme;
		$mdl_nme.='_mdl';
		if(is_file(MDL_PTH.$fle))
			$mdl=$this->cls($mdl_nme,MDL_PTH,$fle,$mdl);
		else
			$mdl=new mdl($mdl);
		if($mdl)
			return $mdl;
		else{
			exit('code:2,can\'t load data model');
		}
	}

	/*加载配置
	*/
	private function lod_cnf(){
		require_once $_SERVER["DOCUMENT_ROOT"].'/cnf/cnf.php';
		if($db){
			foreach ($db as $k => $v) {
				define($k, $v);
			}
		}
	}

	private function lod_fnc(){
		require_once ROOT.'inc/fnc.php';
	}
}
?>