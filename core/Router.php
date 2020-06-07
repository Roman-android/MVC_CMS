<?php

namespace core;

class Router
{
    
    private $part_app;

    public function __construct()
    {
        Config::init();
        $this->part_app = Config::$part_app;
    }

    public function run()
    {
        $http_host = $_SERVER['HTTP_HOST'];
        $path = "controllers\\" . ucfirst($this->part_app[$http_host]) . "Controller";


        $action = $this->part_app[$http_host].'Action';
        $controller = new $path($this->part_app[$http_host]);
        $controller->$action();
    }


}