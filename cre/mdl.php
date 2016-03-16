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
    public function get_cel_cnd(){

    }

	//根据条件获取单条数据
	public function get_row_cnd($cnd){
		$sql=$this->get_sql($cnd);
		$rs=$this->dbo->query($sql);
		$data=mysql_fetch_assoc($rs);
		return ($data)?$data:false;
	}

	//根据条件获取多条数据
	public function get_dat_cnd($cnd){

	}

	//插入单条数据
	public function ist_dat($arr){
		
	}

	//从资源提取内容数据,组装成数组
    public function fetch_array($rs,$type=0){
        if($rs){

        }
        else{
            return false;
        }
    }

    /*根据数组构造sql*/
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

        return $sql.';';
    }

}
?>