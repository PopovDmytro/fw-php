<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

//    public $layout = 'main';

    function indexAction(){
        $model = new Main;
        $posts = \R::findAll('posts');
        $post = \R::findOne('posts', 'id = 1');
//        debug($post);
        $menu = $this->menu;
        $title = "PAGE TILE";
        $this->setMeta('Main Page', 'Description page', 'Key Words');
        $meta = $this->meta;
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    function testAction(){
        debug($this->route);
        $this->layout = 'test';
    }
}