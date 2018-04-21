<?php

error_reporting(-1);

use vendor\core\Router;

require_once '../vendor/libs/functions.php';

//require_once '../vendor/core/Router.php';

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/vendor/core');
define('LIBS', ROOT . '/vendor/libs');
define('APP', ROOT . '/app');
define('CACHE', ROOT . '/tmp/cache');
define('LAYOUT', 'default');


//require_once '../app/controllers/Main.php';
//require_once '../app/controllers/Posts.php';
//require_once '../app/controllers/PostsNew.php';
spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

new \vendor\core\App;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

//custom root
//Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);
//default roots
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

