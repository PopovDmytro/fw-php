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
        $res = $model->query("CREATE TABLE posts2 SELECT * FROM fw_php.post");
        $posts = $model->findAll();
        $posts2 = $model->findAll();
        $title = "PAGE TILE";
        $this->set(compact('title', 'posts'));
    }
}