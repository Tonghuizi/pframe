<?php

define('SERVER_ROOT', __DIR__);

//配置信息
$config = require SERVER_ROOT.'/config.php';
require SERVER_ROOT.'/auto_loaded.php';


//var_dump($result); //结果：bool(true)

Yii::createApplication($config)->run($config);