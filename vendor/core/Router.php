<?php

class Router
{
    protected static $routes = [];
    protected static $route = [];

    static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    static function getRoutes() {
        return self::$routes;
    }

    static function getRoute() {
        return self::$route;
    }

    static function matchRoute($url) {
        foreach (self::$routes as $pattern => $route){
            if($url === $pattern) {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
}