<?php


namespace core;

use views\main\ParseTemplates;

class View
{
    protected $route;
    protected $path;
    protected $layout = 'default';
    protected $parse_template;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        $this->parse_template = new ParseTemplates();
    }

    public function redirect($url){
        header('location: '.$url);
        exit();
    }
    public static function errorCode($code,$description = ""){
        http_response_code($code);
        require_once 'views/errors/'.$code.'.php';
        exit();
    }
}