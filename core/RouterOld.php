<?php

namespace core;

class RouterOld
{
    private $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require_once 'config/routes_old.php';
        foreach ($arr as $key => $value){
            $this->add($key,$value);
        }
    }


    public function add($route,$params){
        $route = '#^#'.$route.'#$#';
        $this->routes[$route] = $params;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $params){
            if (preg_match($route,$url,$matches)){
                $this->params=$params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        echo "Страница ".$_SERVER['HTTP_HOST']."<br/>";
        echo "Страница ".$_SERVER['DOCUMENT_ROOT']."<br/>";
        if ($this->match()){
            /*echo "<p>Controller: <b>".$this->params['controller']."</b></p>";
            echo "<p>Action: <b>".$this->params['action']."</b></p>";*/
            $path = "controllers\\".ucfirst($this->params['controller'])."Controller";
            if (class_exists($path)){
                $action = $this->params['action'].'Action';
                if (method_exists($path,$action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                }else{
                    View::errorCode(404,"Не найден action: ".$action);
                }
            }else{
                View::errorCode(404,"Не найден контроллер: ".$path);
            }
        }else{
            View::errorCode(403,'Маршрут не найден');
        }

    }

}