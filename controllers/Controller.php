<?php

/**
 *
 */
class Controller extends Yii
{
    public $layout = 'layout';

    function __construct()
    {
    }

    /**
     * 渲染页面
     */
    public function render($view, $data = [])
    {
        $viewFile = SERVER_ROOT . '/html/' . $view . '.php';
        if (!file_exists($viewFile)) {
            throw new Exception("View '$view' does not exist.");
        }

        $output = $this->renderFile($viewFile, $data, true);
        if (!empty($this->layout)) {
            $layoutFile = SERVER_ROOT . '/html/' . $this->layout . '.php';
                $output = $this->renderFile($layoutFile, ['content' => $output], true);
        }
        echo $output;
        die;
    }

    public function renderFile($viewFile, $data = null, $_return = false)
    {
        if (is_array($data)) {
            //如果和已经存在变量冲突，则在变量名前添加前缀data
            extract($data, EXTR_PREFIX_SAME, 'data');
        }

        if ($_return) {
            ob_start();
            ob_implicit_flush(true);
            require $viewFile;
            return ob_get_clean();//取得php页面输出的全部内容
        } else {
            require $viewFile;
        }
    }

    public function isLogin(){

    }

}
