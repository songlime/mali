<?php
/*
*数据模型类
*/
class mdl extends cre{
	public $tab;
	private $dbo;
	/**
	*构造方法
	*/
	public function __construct($tab_nme=''){
		require_once ROOT.'inc/dbo/dbo.php';
		$this->dbo=new dbo(DB_HST, DB_USR, DB_PSW, DB_DB,$tab_nme);
		if($tab_nme)
			$this->tab=$tab_nme;
		else
			$this->tab='';
	}

	public function __destruct(){

	}

	public function shw_tab(){
		$this->dbo->show_databases();
	}

	public function get_mdl_nme(){
		return $this->tab;
	}

	//获取一个单元格
    public function get_cel_cnd($cnd){
		$sql=$this->get_sql($cnd);
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs,1);
		$dat=array_values($data[0]);
		return ($dat[0])?$dat[0]:false;
    }

	//根据条件获取单条数据
	public function get_row_cnd($cnd,$ech=false){
		$sql=$this->get_sql($cnd);
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs);
		return ($data[0])?$data[0]:false;
	}

	//根据条件获取多条数据
	public function get_dat_cnd($cnd){
		$sql=$this->get_sql($cnd);
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs);
		return ($data)?$data:false;
	}

	public function get_dat_pge($cnd,$pge=1,$ppg=20){
		$cnd_pgs=$cnd;
		$cnd_pgs['fields']=' count(*) as cnt ';
		$cnt=$this->get_cel_cnd($cnd_pgs);
		var_dump($cnd_pgs);
		var_dump($res);
	}

	//插入单条数据
	public function ins_dat($arr){
		if(!$arr)return false;
		$sql=$this->get_ins_sql($arr);
		$ret=$this->dbo->query($sql);
		$id=mysql_insert_id($this->dbo->conn);
		if($id)
			return $id;
		elseif($ret)
			return $ret;
		else
			return false;
	}

	//编辑一条数据
	public function upd_dat($arr,$cnd){
		if(!$arr)return false;
		$sql=$this->get_upd_sql($arr,$cnd);
		$ret=$this->dbo->query($sql);
		if($aff=mysql_affected_rows($this->dbo->conn))
			return $aff;
		elseif($ret)
			return $ret;
		else
			return false;
	}


	//从资源提取内容数据,组装成数组
    public function fetch_array($rs,$type=0){
        if($rs){
        	while ($dat=mysql_fetch_assoc($rs)) {
        		$arr[]=$dat;
        	}
        	return $arr;
        }
        else{
            return false;
        }
    }

    public function get_ins_sql($dat){
    	if (!is_array($dat))return false;
    	foreach ($dat as $k => $v) {
    		$fields.=','.$k;
    		$values.=',\''.$v.'\'';
    	}
    	$fields=substr($fields,1);
    	$values=substr($values,1);
    	$sql="INSERT INTO {$this->tab} ($fields) VALUES ($values) ;";
    	return $sql;
    }

    public function get_upd_sql($dat,$cnd){
    	if (!is_array($dat))return false;
    	foreach ($dat as $k => $v) {
    		$upd.=",$k='$v' ";
    	}
    	$upd=substr($upd, 1);
    	$sql="UPDATE {$this->tab} SET $upd WHERE $cnd ;";
    	return $sql;
    }
    /*根据数组构造查询sql*/
    public function get_sql($cnd){
        if(!is_array($cnd))
            return -1;
        extract($cnd);
        $sql="SELECT {$fields} FROM {$this->tab}";
        if($where)
            $sql.=" WHERE $where";
        if($order)
            $sql.=" ORDER BY $order";
        if($group)
            $sql.=" GROUP BY $group";
        if($limit)
        	$sql.=" LIMIT $limit";
        return $sql.';';
    }

}
?>