<?php


namespace core;

abstract class Controller
{
    public $page;
    public $config;

    public $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->page = trim($_SERVER['REQUEST_URI'], '/');
        $this->config = Config::init();
        $this->route = $route;
        $this->view = $this->loadView($this->route);
        $this->model = $this->loadModel($this->route);
    }

    public function loadModel($route)
    {
        $path = 'models\\' . ucfirst($route) . 'Model';
        if (class_exists($path)) {
            return new $path($this->page);
        }
    }

    public function loadView($route)
    {

        $path = 'views\\' . $route . '\\' . ucfirst($route) . 'View';
        if (class_exists($path)) {
            return new $path($route, $this->page);
        }
    }

}