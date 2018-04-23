<?php

namespace fw\core;


trait TSingleton
{

    protected static $instance;

    static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}