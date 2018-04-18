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
//        $res = $model->query("CREATE TABLE posts2 SELECT * FROM fw_php.post");
        $posts = $model->findAll();
        $posts2 = $model->findAll();
//      $post = $model->findOne(2);
//      $data = $model->findBySql("SELECT * FROM post ORDER BY id DESC LIMIT 2");
//      $data = $model->findBySql("SELECT * FROM {$model->table} WHERE name LIKE ?", ['%Tit%']);
        $data = $model->findLike('Tit', 'name');
        debug($data);
        $title = "PAGE TILE";
        $this->set(compact('title', 'posts'));
    }
}