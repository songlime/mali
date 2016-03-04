<?php
class dbo{
    private $db_host; //数据库主机
    private $db_user; //数据库用户名
    private $db_pwd; //数据库用户名密码
    private $db_database; //数据库名
    private $conn; //数据库连接标识;
    private $result; //执行query命令的结果资源标识
    private $sql; //sql执行语句
    private $row; //返回的条目数
    private $coding; //数据库编码，GBK,UTF8,gb2312
    private $bulletin = true; //是否开启错误记录
    private $show_error = false; //测试阶段，显示所有错误,具有安全隐患,默认关闭
    private $is_error = false; //发现错误是否立即终止,默认true,建议不启用，因为当有问题时用户什么也看不到是很苦恼的

	public function __construct($db_host, $db_user, $db_pwd, $db_database, $conn='', $coding='utf-8'){
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_database = $db_database;
        $this->conn = $conn;
        $this->coding = $coding;
        $this->connect();
	}

	public function __destruct(){

	}

    public function connect() {
	    if ($this->conn == "pconn") {
	        //永久链接
	        $this->conn = mysql_pconnect($this->db_host, $this->db_user, $this->db_pwd);
	    } else {
	        //即使链接
	        $this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd);
	    }

	    if (!mysql_select_db($this->db_database, $this->conn)) {
	        if ($this->show_error) {
	            $this->show_error("数据库不可用：", $this->db_database);
	        }
	    }
	    mysql_query("SET NAMES $this->coding");
    }
	
	public function cnn(){

	}

}
?>