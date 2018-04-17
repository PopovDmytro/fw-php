<?php

namespace vendor\core\base;

class View
{
    //current route
    private $route = [];
    //current view
    private $view;
    //current layout
    private $layout;

    function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    function render($vars) {
        if(is_array($vars)){
            extract($vars);
        }
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        } else {
            echo "<p>Not found view file <b>{$file_view}</b></p>";
        }
        $content = ob_get_clean();

        if(false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)) {
                require $file_layout;
            } else {
                echo "<p>Not found layout file <b>{$file_layout}</b></p>";
            }
        }
    }
}