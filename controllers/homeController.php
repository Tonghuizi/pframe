<?php

/**
 *
 */
class homeController extends Controller
{
    function __construct()
    {
        # code...
    }

    public function index()
    {
        $this->render('home', ['gg' => 'hh']);
    }

    public function register()
    {
        $obj = [];
        if (!empty($_POST)) {
            $obj = $_POST;
            $name = $_POST['name'];
            $password = $_POST['password'];

            $name = preg_replace("/[^0-9^A-Z^a-z^_]+/", "", $name);

            if (!preg_match('/^[a-zA-Z0-9_]{6,}$/', $obj['password'])) {
                $this->render('register', array('msg' => '密码必须由6位以上数组成'));
            }
            $password = md5(md5($password));

            $user = new User($name, $password);
            if($user->register()){
                Yii::app()->routes->redirect('/home/login');
            }

        }

        $this->render('register', $obj);
    }

    public function login()
    {
        if(!Yii::app()->user->isGuest()){
            Yii::app()->routes->redirect('/home/index');
        }
        if (!empty($_POST)) {
            $user = new User();
            $user->name = $_POST['name'];
            $user->password = $_POST['password'];
            if($user->login()){
                Yii::app()->routes->redirect('/home/index');
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        Yii::app()->user->logout();
        Yii::app()->routes->redirect('/home/login');
    }

}