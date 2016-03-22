<?php
class dbo{
    private $db_host; //数据库主机
    private $db_user; //数据库用户名
    private $db_pwd; //数据库用户名密码
    private $db_database; //数据库名
    private $db_table; //数据表名
    public $conn; //数据库连接标识;
    public $result; //执行query命令的结果资源标识
    private $sql; //sql执行语句
    private $row; //返回的条目数
    private $coding; //数据库编码，GBK,UTF8,gb2312
    private $bulletin = true; //是否开启错误记录
    private $show_error = false; //测试阶段，显示所有错误,具有安全隐患,默认关闭
    private $is_error = false; //发现错误是否立即终止,默认true,建议不启用，因为当有问题时用户什么也看不到是很苦恼的

	public function __construct($db_host, $db_user, $db_pwd, $db_database,$db_table, $conn='', $coding='utf-8'){
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_database = $db_database;
        $this->db_table=$db_table;
        $this->conn = $conn;
        $this->coding = $coding;
        $this->cnn();
	}

	public function __destruct(){

	}

    public function cnn() {
	    if ($this->conn == "pcn") {
	        $this->conn = mysql_pconnect($this->db_host, $this->db_user, $this->db_pwd);
	    }
        else {
	        $this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd);
	    }

	    if (!mysql_select_db($this->db_database, $this->conn)) {
	        if ($this->show_error) {
	            $this->show_error("数据库不可用：", $this->db_database);
	        }
	    }
	    mysql_query("SET NAMES $this->coding");
    }

    //执行sql语句
    public function query($sql) {
        if ($sql == "") {
            $this->show_error("SQL语句错误：", "SQL查询语句为空");
        }
        $this->sql = $sql;
        $result = mysql_query($this->sql, $this->conn);
        if (!$result) {
            if ($this->show_error) {
                $this->show_error("错误SQL语句：", $this->sql);
            }
        } else {
            $this->result = $result;
        }
        return $this->result;
    }

    /*查询服务器所有数据库
    */
    public function show_databases() {
        $rs=$this->query("show databases");
        echo "databases:" . $amount = $this->db_num_rows($rs);
        echo "<br />";
        $i = 1;
        while ($row = $this->fetch_array($rs)) {
            echo "$i $row[Database]";
            echo "<br />";
            $i++;
        }
    }

    /*取得记录集,获取数组-索引和关联,使用$row['content'] */
    public function fetch_array($resultt="") {
        if($resultt!=""){
            return mysql_fetch_array($resultt);
        }
        else{
            return mysql_fetch_array($this->result);
        }
    }

        // 根据select查询结果计算结果集条数
    public function db_num_rows() {
        if ($this->result == null) {
            if ($this->show_error) {
                $this->show_error("SQL语句错误", "暂时为空，没有任何内容！");
            }
        } else {
            return mysql_num_rows($this->result);
        }
    }
    /*查询数据库下所有的表
    */
    public function show_tables($database_name) {
        $this->query("show tables");
        echo "现有数据库：" . $amount = $this->db_num_rows($rs);
        echo "<br />";
        $i = 1;
        while ($row = $this->fetch_array($rs)) {
            $columnName = "Tables_in_" . $database_name;
            echo "$i $row[$columnName]";
            echo "<br />";
            $i++;
        }
    }
}
?>