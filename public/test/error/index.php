<?php

define('DEBUG', 1);

class NotFoundException extends Exception {

    function __construct($message = "", $code = 404, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class ErrorHandler
{

    function __construct() {
        if(DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_error_handler([$this, 'errorHandler']);
        ob_start();//start buffering
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    function errorHandler($errno, $errstr, $errfile, $errline) {
        error_log("[". date('Y-m-d H:i:s') ."] Error text : {$errstr} | file: {$errfile} | string: {$errline}\n ------- \n ",3, __DIR__ . '/errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    function fatalErrorHandler() {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            error_log("[". date('Y-m-d H:i:s') ."] Error text : {$error['message']} | file: {$error['file']} | string: {$error['line']}\n ------- \n ",3, __DIR__ . '/errors.log');
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    function exceptionHandler(Exception $e) {
        error_log("[". date('Y-m-d H:i:s') ."] Error text : {$e->getMessage()} | file: {$e->getFile()} | string: {$e->getLine()}\n ------- \n ",3, __DIR__ . '/errors.log');
        $this->displayError('exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
        http_response_code($response);
        if (DEBUG) {
            require 'views/dev.php';
        } else {
            require 'views/prod.php';
        }
        die;
    }
}

//new ErrorHandler();

//echo $test;
//test(); //fatal error

//try {
//    if(empty($test)){
//        throw new Exception('Exeption text, $test empty');
//    }
//} catch(Exception $e) {
//    var_dump($e);
//}
//throw new NotFoundException('Exeption text, $test empty');