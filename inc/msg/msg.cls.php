<?php
class msg{
	public $nme;
	public $url="",$username="",$password="";
	function __construct(){

	}

	function snd($mobile,$content){
		if(!preg_match(/1\[3-9]{1}\d{9}/, $mobile))
			return -1;
		if(!$content)
			return -2;
		$this->snd_msg($mobile,$content);
	}

	function snd_msg($mobile,$content){
		$ch=curl_init();
		curl_exec($ch);
	}
}
?>