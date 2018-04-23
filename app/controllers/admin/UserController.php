<?php

namespace app\controllers\admin;


use fw\core\base\View;

class UserController extends AppController
{

//    public $layout = 'default';

    function indexAction() {
        View::setMeta('Admin :: Main page', 'description admin panel', 'admin panel');
        $test = 'test variable lorem ';
        $data = ['test', '2'];
//        $this->set([
//            'test' => $test,
//            'data' => $data
//        ]);
        $this->set(compact('test', 'data'));
    }

    function testAction() {
        $this->layout = 'default';
    }
}