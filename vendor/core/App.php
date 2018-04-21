<?php

namespace vendor\core;

use vendor\core\Registry;
use vendor\core\ErrorHandler;

class App
{
    public static $app;

    function __construct() {
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}