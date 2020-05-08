<?php


namespace core;

class View
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
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