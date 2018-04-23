<?php

use fw\core\Router;

require_once '../vendor/fw/libs/functions.php';

//require_once '../vendor/fw/core/Router.php';

define('DEBUG', 1);

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/vendor/fw/core');
define('LIBS', ROOT . '/vendor/fw/libs');
define('APP', ROOT . '/app');
define('CACHE', ROOT . '/tmp/cache');
define('LAYOUT', 'default');

require __DIR__ . '/../vendor/autoload.php';

//require_once '../app/controllers/Main.php';
//require_once '../app/controllers/Posts.php';
//require_once '../app/controllers/PostsNew.php';

//spl_autoload_register(function ($class){
//    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//    if(is_file($file)){
//        require_once $file;
//    }
//});

new \fw\core\App;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

//custom root
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

//default roots
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

