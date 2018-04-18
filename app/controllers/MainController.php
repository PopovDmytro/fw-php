<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

//    public $layout = 'main';

    function indexAction(){
//        $this->layout = false;
//        $this->layout = 'main';
//        $this->view = 'test';

        $model = new Main;
        $posts = \R::findAll('posts');
        $post = \R::findOne('posts', 'id = 1');
        debug($post);

        $menu = $this->menu;
//          $res = $model->query("CREATE TABLE posts2 SELECT * FROM fw_php.post");
//          $posts = $model->findAll();
//          $posts2 = $model->findAll();
//          $post = $model->findOne(2);
//          $data = $model->findBySql("SELECT * FROM post ORDER BY id DESC LIMIT 2");
//          $data = $model->findBySql("SELECT * FROM {$model->table} WHERE name LIKE ?", ['%Tit%']);
//          $data = $model->findLike('Tit', 'name');
//          debug($data);
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