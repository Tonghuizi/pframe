<?php
$domain = "//www.localhost:803";
return array(

    'mysql' => array(
        'host' => '127.0.0.1:3306',
        'db' => 'fuck',
        'db_user' => 'root',
        'db_pwd' => '123456',
    ),

    'redis' => array(
        'host' => '127.0.0.1',
        'port' => 6379,
    ),

    'urlRules' => array(
        'default' => '/home/index',
        '404' => '/default/page404',
    ),

    'baseUrl'   => $domain,
    'scriptUrl' => $domain.'/resources',
);