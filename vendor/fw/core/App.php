<?php

namespace fw\core;

use fw\core\Registry;
use fw\core\ErrorHandler;

class App
{
    public static $app;

    function __construct() {
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}