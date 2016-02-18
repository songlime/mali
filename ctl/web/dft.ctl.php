<?php
class dft extends ctl{
	private $param;

	public function __construct(){
		parent::__construct();
	}

	public function __destruct(){

	}

	public function index(){
		echo 'index';
	}

	public function reg(){
		echo 'reg';
	}
}

?>