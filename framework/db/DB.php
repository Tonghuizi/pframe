<?php

class DB
{
    public $mysqlConfig;
    public $redisConfig;

    function __construct($config)
    {
        $this->mysqlConfig = $config['mysql'];
        $this->redisConfig = $config['redis'];
    }

    public function mysqliConnect()
    {
        $mysqli = @new mysqli($this->mysqlConfig['host'], $this->mysqlConfig['db_user'], $this->mysqlConfig['db_pwd']);
        if ($mysqli->connect_errno) {
            throw new \Exception("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
        }
        $mysqli->query("set names 'utf8';");//编码转化
        $select_db = $mysqli->select_db($this->mysqlConfig['db']);
        if (!$select_db) {
            throw new \Exception("could not connect to the db:\n" . $mysqli->error);
        }
        return $mysqli;
//        $res = $mysqli->query($sql);
//        if (!$res) {
//            throw new \Exception("sql error:\n" . $mysqli->error);
//        }
//        if (!is_bool($res)) {
//            $res = $res->fetch_all();
//            $res->free();
//        }
//
//        // $mysqli->close();
//        return $res;
    }

    public function PDOConnect()
    {
        $pdo = new PDO("mysql:host=" . $this->mysqlConfig['host'] . ";dbname=" . $this->mysqlConfig['db'], $this->mysqlConfig['db_user'], $this->mysqlConfig['db_pwd']);//创建一个pdo对象
        $pdo->exec("set names 'utf8'");
        return $pdo;
//        $stmt = $pdo->prepare($sql);
//        $stmt->bindValue(1, 'joshua', PDO::PARAM_STR);
//        $res = $stmt->execute();
//        if (!is_bool($res)) {
//
//            // PDO::FETCH_ASSOC 关联数组形式
//            // PDO::FETCH_NUM 数字索引数组形式
//            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        }
//
//        // $pdo = null;//关闭连接
//        return $res;
    }

    public function redisConnect()
    {
        $redis = new redis();
        $redis->connect($this->redisConfig['host'], $this->redisConfig['port']);
        return $redis;
    }

}