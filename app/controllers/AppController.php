<?php

namespace app\controllers;

use app\models\Main;
use fw\core\base\Controller;

class AppController extends Controller
{

    public $menu;
    public $meta = [];

    function __construct($route) {
        parent::__construct($route);
//        if($this->route['controller'] == 'Main' && $this->route['action'] == 'test'){
//            echo "<h1>TEST</h1>";
//        }
        new Main;
        $this->menu = \R::findAll('category');
    }

    protected function setMeta($title = '', $desc ='', $keywords = '') {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}