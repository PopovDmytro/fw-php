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
}

