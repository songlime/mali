<?php
class evt_mdl extends mdl{
	public $tab='event';
	public function __construct($tab){
		parent::__construct($this->tab);
	}

	public function __destruct(){
		
	}

	public function get_evt_lst($cls=0,$pge=1,$ppg=20,$sta=0){
		$pge=($pge>0)?$pge:1;
		$ppg=($ppg>0)?$ppg:20;
		$sta=($sta)?$sta:($pge-1)*$ppg;
		$cnd = array(
			'fields' =>'*',
			'where'=>($sta)?" class=$cls AND id>$sta":" class=$cls",
			'order'=>' id desc',
			'limit'=>"$sta,$ppg",
			'echo'=>1,
		);
		$cnd_b=array(
			'join'=>'join',
			'tab'=>'user',
			'on'=>'a.cid=b.id',
			'fields_b' =>'*',
		);
		$evt_lst=$this->get_dat($cnd,$cnd_b=null);
		return $evt_lst;
	}

	public function get_evt_cnt(){

	}

	public function get_evt_cmt($eid,$pge=1,$ppg=20,$sta=0){

	}

}
?>