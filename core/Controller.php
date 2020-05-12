<?php


namespace core;

abstract class Controller
{
    public $page;
    protected $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->page = trim($_SERVER['REQUEST_URI'],'/');
        $this->view = $this->loadView($route);
        $this->model = $this->loadModel($route);
    }

    public function loadModel($name){
        $path = 'models\\'.ucfirst($name).'Model';
        if (class_exists($path)){
            return new $path();
        }
    }
    public function loadView($route){

        $path = 'views\\'.$route.'\\'.ucfirst($route).'View';
        if (class_exists($path)){
            return new $path($route);
        }
    }

}