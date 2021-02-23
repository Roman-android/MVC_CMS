<?php

namespace core;

class Router
{
    
    private $part_app;

    public function __construct()
    {
        Config::init();
        $this->part_app = Config::$part_app;
        $this->run();
    }

    public function run()
    {
        $http_host = $_SERVER['HTTP_HOST'];
        $path = "controllers\\" . ucfirst($this->part_app[$http_host]) . "Controller";

        $controller = new $path($this->part_app[$http_host]);
        $controller->init();
    }


}