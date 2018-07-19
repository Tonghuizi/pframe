<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/11
 * Time: 14:39
 */

class User extends AUser
{
    public $id;
    public $name;
    public $password;

    function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function login()
    {
        if(!$this->name || !$this->password){
            return false;
        }

        $pdo = Yii::app()->pdo;
        $stm = $pdo->prepare("select id,name,password from user where name=:name and password=:password ");
        $stm->bindParam(':name', $this->name);
        $stm->bindParam(':password', md5(md5($this->password)));
        if($stm->execute()){
            $res = $stm->fetchAll(PDO::FETCH_ASSOC);
            if($res && isset($res[0])){
                $res = $res[0];
                $this->changeIdentity($res);
                return true;
            }
        }
        return false;
    }

    public function register()
    {
        if(!$this->name || !$this->password){
            return false;
        }

        $pdo = Yii::app()->pdo;
        $phd = $pdo->prepare("insert into user (name, password) VALUES (:name, :password)");
        return $phd->execute([':name' => $this->name, ':password' => $this->password]);
    }
}