<?php


namespace core;

use models\MainModel;
use views\main\MainView;

abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $this->loadView($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name){
        $path = 'models\\'.ucfirst($name).'Model';
        if (class_exists($path)){
            return new $path();
        }
    }
    public function loadView($route){
        $path = 'views\\'.$route['controller'].'\\'.ucfirst($route['controller']).'View';
        if (class_exists($path)){
            return new $path($route);
        }
    }

}