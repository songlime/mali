<?php
/*
*用户相关操作
*含用户信息获取,注册登陆等
*date 2016-02-18
*/
class evt_ser extends ser{
	private $usr_mdl,$evt_mdl,$evt_cmt_mdl;

	public function __construct(){
		$this->usr_mdl=$this->new_mdl('usr');
		$this->evt_mdl=$this->new_mdl('evt');
		$this->evt_cmt_mdl=$this->new_mdl('evt_cmt');
	}

	public function __destruct(){
		
	}

	//获取最新活动
	public function get_new(){
		$evt_lst=$this->evt_mdl->get_evt_lst();
		return $evt_lst;
	}

	//按照分类获取活动 分类/排序/页码/每页条目
	public function get_evt_lst($cls=1,$pge=1,$ppg=20,$sta=0){
		$evt_lst=$this->evt_mdl->get_evt_lst($cls,$pge,$ppg);
	}
}