<?php

require_once "helpers/Dev.php";
require_once "config/config_widgets.php";
require_once "config/config_layouts.php";
require_once "config/config_default_pages.php";

use core\Router;

spl_autoload_register(function ($class) {
    $path =  str_replace('\\','/',$class.'.php');
    if (file_exists($path)){
        require_once $path;
    }
});

session_start();
$router = new Router();
$router->run();
