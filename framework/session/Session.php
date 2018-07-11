<?php

class Session
{
    function __construct()
    {
        $this->init();
    }

    public function userStorage()
    {
        return false;
    }

    public function init()
    {
        if ($this->userStorage()) {
            session_set_save_handler($this, true);
//            register_shutdown_function('session_write_close');
        }
        session_save_path(SERVER_ROOT . '/resources/session_cache');
        /*配置
        session_save_path(SERVER_ROOT . '/resources/session_cache');
        $lifetime = 24 * 3600;
        session_set_cookie_params($lifetime);
        */
        session_start();
    }

    //设置session cookie
    public function setCookie($info)
    {
        if (is_array($info) && !empty($info)) {
            $_SESSION = $info;
        }
    }

    //销毁当前session
    public function session_destroy()
    {
        if (session_id() !== '') {
            session_unset();
            session_destroy();//删文件
        }
    }

    public function open()
    {
        return true;
    }

    public function read()
    {
        return true;
    }

    public function write()
    {
        return '';
    }

    public function destroy()
    {
        return true;
    }

    public function gc()
    {
        return true;
    }

}