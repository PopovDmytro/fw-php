<?php

namespace vendor\core\base;

abstract class Controller
{
    public $route = [];
    public $layout;
    public $view;
    public $vars = [];

    function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];
    }

    function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    function set($vars) {
        $this->vars = $vars;
    }

    function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    function loadView($view, $vars = []) {
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }
}

