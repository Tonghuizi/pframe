<?php
/**
 *
 */
class app
{
    public $config;
    public $redis;
    public $mysql;
    public $pdo;
    public $routes;
    public $session;
    public $user;

    function __construct($config)
    {
        $this->config = $config;
        $db = new DB($config);
        $this->redis = $db->redisConnect();
        $this->mysql = $db->mysqliConnect();
        $this->pdo = $db->PDOConnect();
        $this->user = new AUser();

        $this->routes = new Routes($config['urlRules']);
        $this->session = new Session();
    }

    //入口
    public function run()
    {
        $whole_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $info = parse_url($whole_url);
        $path = $info['path'];
        $this->routes->urlDirect($path);
    }

}

class Yii
{
    private static $_app;

    public static function app()
    {
        return self::$_app;
    }

    public static function createApplication($config)
    {
        if(self::$_app === null){
            self::$_app = new app($config);
            return self::$_app;
        }else{
            throw new Exception('App can only be created once.');
        }
    }

}