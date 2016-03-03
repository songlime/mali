<?php
class dft_ctl extends ctl{
	private $param;

	public function __construct(){
		parent::__construct();
	}

	public function __destruct(){

	}

	public function index(){
		echo 'index';
	}

	public function reg($prm){
		var_dump($prm);
	}
}

?>