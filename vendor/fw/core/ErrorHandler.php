<?php

namespace fw\core;

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
        $this->logError($errstr, $errfile, $errline);
//        error_log("[". date('Y-m-d H:i:s') ."] Error text : {$errstr} | file: {$errfile} | string: {$errline}\n ------- \n ",3, __DIR__ . '/errors.log');
        if(DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR])) {
            $this->displayError($errno, $errstr, $errfile, $errline);
        }
        return true;
    }

    function fatalErrorHandler() {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
//            error_log("[". date('Y-m-d H:i:s') ."] Error text : {$error['message']} | file: {$error['file']} | string: {$error['line']}\n ------- \n ",3, __DIR__ . '/errors.log');
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    function exceptionHandler($e) {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
//        error_log("[". date('Y-m-d H:i:s') ."] Error text : {$e->getMessage()} | file: {$e->getFile()} | string: {$e->getLine()}\n ------- \n ",3, __DIR__ . '/errors.log');
        $this->displayError('exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
        http_response_code($response);
        if($response == 404 && !DEBUG) {
            require WWW . '/errors/404.html';
            die;
        }

        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }

    protected function logError($message = '', $file = '', $line = '') {
        error_log("[". date('Y-m-d H:i:s') ."] Error text : {$message} | file: {$file} | string: {$line}\n ------- \n ",3, ROOT . '/tmp/errors.log');
    }
}