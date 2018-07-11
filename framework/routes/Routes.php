<?php

/**
 *
 */
class Routes
{
    public $urlRules;

    function __construct($urlRules)
    {
        $this->urlRules = $urlRules;
    }

    //路由
    public function urlDirect($path)
    {
        $urlRules = $this->urlRules;
        if ($path == '/') {
            $this->urlDirect($urlRules['default']);
        }

        $pathArr = explode('/', $path);

        if (!class_exists($pathArr[1] . 'Controller')) {
            $this->urlDirect($urlRules['404']);
        }

        $controllerId = $pathArr[1] . 'Controller';
        $actionName = $pathArr[2];
        $instance = new $controllerId;

        if (!method_exists($instance, $actionName)) {
            $this->urlDirect($urlRules['404']);
        }
        $instance->$actionName();
        die;
    }


}