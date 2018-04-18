<?php

namespace app\controllers;

class PageController extends AppController
{
    function viewAction() {
        $menu = $this->menu;
        $title = "PAGE";
        $this->set(compact('title', 'posts', 'menu'));
    }

    function testAction() {

    }
}