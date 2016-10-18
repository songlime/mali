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
		if($ech)echo $sql;
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs);
		return ($data[0])?$data[0]:false;
	}

	//根据条件获取多条数据
	public function get_dat($cnd,$cnd_b=null){
		$sql=$this->get_sql($cnd,$cnd_b);
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs);
		return ($data)?$data:false;
	}

	//根据指定条件获取数据数目
	public function get_dat_cnt($cnd,$ech=false){
		$cnd['fields']=' count(*) as cnt ';
		$sql=$this->get_sql($cnd);
		if($ech) echo $sql;
		$rs=$this->dbo->query($sql);
		$data=$this->fetch_array($rs,1);
		$dat=array_values($data[0]);
		return ($dat[0])?$dat[0]:false;
	}

	//获取一页数据 
	public function get_dat_pge($cnd='',$pge=1,$ppg=20,$ech=false){
		$pge=($pge)?$pge:1;
		$ppg=($ppg)?$ppg:20;
		$cnt=(int)$this->get_dat_cnt($cnd);
		$pgs=(int)ceil($cnt/$ppg);
		if($pge<=0)$pge=1;
		if($pge>$pgs)$pge=$pgs;
		if($ppg<=0)$ppg=20;
		$stt=(int)($pge-1)*$ppg;
		$cnd['limit']=" $stt,$ppg ";
		$sql=$this->get_sql($cnd);
		if($ech) echo 'sql:',$sql;
		$rs=$this->dbo->query($sql);
		$dat=$this->fetch_array($rs);
		if($dat)
			$dat[]=array('cnt'=>$cnt, 'pge'=>$pge, 'ppg'=>$ppg, 'pgs'=>$pgs, );
		return ($dat)?$dat:false;
	}

	//插入单条数据 //TODO 防注入过滤
	public function ins_dat($arr,$ech=false){
		if(!$arr)return false;
		$sql=$this->get_ins_sql($arr);
		if($ech) echo $sql;
		$ret=$this->dbo->query($sql);
		$id=mysql_insert_id($this->dbo->conn);
		if($id)return $id;
		elseif($ret)return $ret;
		else return false;
	}

	//编辑一条数据 //TODO 防注入过滤
	public function upd_dat($arr,$where){
		if(!$arr)return false;
        if(is_array($where))$where=implode(' AND ', $where);
		$sql=$this->get_upd_sql($arr,$where);
		$ret=$this->dbo->query($sql);
		if($aff=mysql_affected_rows($this->dbo->conn)) 
			return $aff;
		elseif($ret) return $ret;
		else return false;
	}


	//从资源提取内容数据,组装成数组
    public function fetch_array($rs,$type=0){
        if($rs)
        	while ($dat=mysql_fetch_assoc($rs))
        		$arr[]=$dat;
        return $arr?$arr:false;
    }

    public function get_ins_sql($dat){
    	if (!is_array($dat))return false;
    	foreach ($dat as $k => $v) {
    		$fields.=','.$k;
    		$values.=',\''.addslashes($v).'\'';
    	}
    	$fields=substr($fields,1);
    	$values=substr($values,1);
    	$sql="INSERT INTO {$this->tab} ($fields) VALUES ($values) ;";
    	return $sql;
    }

    public function get_upd_sql($dat,$where){
    	if (!is_array($dat))return false;
    	foreach ($dat as $k => $v) {
    		$upd.=",$k='$v' ";
    	}
    	$upd=substr($upd, 1);
    	$sql="UPDATE {$this->tab} SET $upd WHERE $where ;";
    	return $sql;
    }

    /*根据数组构造查询sql*/
    public function get_sql($cnd,$cnd_b=null){
        if(!is_array($cnd))
            return -1;
        extract($cnd);
        if(is_array($where))$where=implode(' AND ', $where);
        if(!$fields)$fields="*";
        if($cnd_b){
			extract($cnd_b);
			if(!$fields_b)$fields_b="*";
			$fields_a=trim(str_replace(',', ',a.', ','.$fields),',');
			$fields_b=str_replace(',', ',b.',','.$fields_b);
			$fields=$fields_a.$fields_b;
			$join_sql="a $join $tab b on $on";
        }

        $sql="SELECT {$fields} FROM {$this->tab} $join_sql";
        if($where)
            $sql.=" WHERE $where";
        if($order)
            $sql.=" ORDER BY $order";
        if($group)
            $sql.=" GROUP BY $group";
        if($limit)
        	$sql.=" LIMIT $limit";
        $sql.=';';
        if($echo)
        	echo $sql;
        return $sql;
    }
}
?>