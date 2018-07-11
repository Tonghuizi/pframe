<?php
$Array = ['framework', 'controllers',];

//自动加载目录下所有的文件
foreach ($Array as $dir)
{
    myScandir(SERVER_ROOT.'/'.$dir);
}

function myScandir($dir)
{
    $files = scandir($dir);//读取当前文件夹的文件
    foreach ($files as $file) {
        if($file == '.' || $file == '..'){
            continue;
        }
        if (is_dir($dir . '/' . $file)) { //递归处理文件夹
            myScandir($dir . '/' . $file);
        } else {
            require $dir . '/'.$file;
        }
    }
}