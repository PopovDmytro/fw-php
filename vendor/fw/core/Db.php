<?php

namespace fw\core;


class Db
{
    use TSingleton;

    protected $pdo;
//    protected static $instance;
    static $countSql = 0;
    static $queries = [];

    protected function __construct() {
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze( true );
    }

//    static function instance() {
//        if(self::$instance === null) {
//            self::$instance = new self;
//        }
//        return self::$instance;
//    }
}