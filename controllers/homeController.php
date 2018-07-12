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
        }

        $this->render('register', $obj);
    }

    public function login()
    {
//        if(isset($_SESSION['is_valid']) && $_SESSION['is_valid']==1)
//        {
//            $this->render('home');
//        }
//        if (!empty($_POST)) {
//            $obj = $_POST;
//            $obj['is_valid'] = 1;
//            Yii::app()->session->setCookie($obj);
//        }
        if (!empty($_POST)) {
//            dump($_POST);
            $user = new User();
            $user->name = $_POST['name'];
            $user->password = $_POST['password'];
            if($user->login()){
                $this->render('home');
            }
        }

        $this->render('login');
    }

}