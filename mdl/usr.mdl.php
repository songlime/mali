<?php
class usr_mdl extends mdl{
	public $tab;
	public function __construct($tab_nme){
		parent::__construct($tab_nme);
		$this->tab=$tab_nme;
	}

	public function __destruct(){
		
	}

	public function get_one(){
		
	}

	public function edit(){

	}
}
?>