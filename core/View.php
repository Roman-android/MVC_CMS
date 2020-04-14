<?php


namespace core;


class View
{
    public $route;
    public $path;
    public $layout = 'default';


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        //debug($this->path);
    }

    public function render ($title,$vars=[]){
        extract($vars);
        if(file_exists('views/'.$this->path.'.php')){
            ob_start();
            require_once 'views/'.$this->path.'.php';
            $content = ob_get_clean();
            require_once 'views/layouts/'.$this->layout.'.php';
        }else{
            echo 'Вид не найден'.$this->path;
        }

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