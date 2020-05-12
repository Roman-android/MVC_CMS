<?php

namespace core;

class Router
{
    private $config_routes;

    public function __construct()
    {
        $this->config_routes = require_once 'config/config_routes.php';
    }

    public function run()
    {
        echo $_SERVER['REQUEST_URI'].'<br/>';
        echo $_SERVER['HTTP_HOST'].'<br/>';
        //=================================
        $part = $_SERVER['HTTP_HOST'];
        //$route = $this->config_routes[$part];
        $route = array_search($part,$this->config_routes);
        $path = "controllers\\" . ucfirst($route) . "Controller";

        $action = $route.'Action';
        $controller = new $path($route);
        $controller->$action();
    }


}