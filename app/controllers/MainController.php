<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{

//  public $layout = 'main';

    function indexAction(){

// create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(ROOT . '/tmp/your.log', Logger::WARNING));

// add records to the log
        $log->warning('Foo');
        $log->error('Bar');

// adding mailer
        $mailer = new PHPMailer();
//        var_dump($mailer);

        $model = new Main;
//        \R::fancyDebug(true);
        $posts = \R::findAll('posts');
        App::$app->cache->set('posts', $posts, 3600 * 24);
//        $posts = App::$app->cache->get('posts');
//        if(!$posts) {
//            $posts = \R::findAll('posts');
//            App::$app->cache->set('posts', $posts, 3600 * 24);
//        }
        $post = \R::findOne('posts', 'id = 1');
        $menu = $this->menu;
        $title = "PAGE TILE";
//        $this->setMeta('Main Page', 'Description page', 'Key Words');
//        $meta = $this->meta;
        View::setMeta('Main Page', 'Description page', 'Key Words');
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    function testAction(){
        if($this->isAjax()) {
            $model = new Main;
//            $data = ['answer' => 'Server answer', 'code' => 200];
//            echo json_encode($data);
            $post = \R::findOne('post', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
            //exit;
            //$this->layout = false;
        }
        echo "222";
//        $this->layout = 'test';
    }


}