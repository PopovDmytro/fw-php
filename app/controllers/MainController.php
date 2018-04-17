<?php

namespace app\controllers;

class MainController extends AppController
{

//    public $layout = 'main';

    function indexAction(){
//        $this->layout = false;
//        $this->layout = 'main';
//        $this->view = 'test';

        $name = 'Dmytro';
        $hi = 'Hello';
        $colors = [
            'white' => 'white',
            'black' => 'black'
        ];
        $title = "PAGE TILE";

        $this->set(compact('name', 'hi', 'colors', 'title'));
    }
}