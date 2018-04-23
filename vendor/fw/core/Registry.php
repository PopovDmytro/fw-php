<?php

namespace fw\core;


class Registry
{
    use TSingleton;

    public static $objects = [];

//    protected static $instance;

    protected function __construct() {
        $config = require ROOT . '/config/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

//    static function instance() {
//        if(self::$instance === null) {
//            self::$instance = new self;
//        }
//        return self::$instance;
//    }

    function __get($name) {
        if(is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    function __set($name, $object) {
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }
    }

    public function getList() {
        echo "<pre>";
        var_dump(self::$objects);
        echo "</pre>";
    }
}