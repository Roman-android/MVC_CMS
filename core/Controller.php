<?php


namespace core;

abstract class Controller
{
    private $part_app;
    protected $model;
    protected $view;
    private $current_page;

    public function __construct($part_app)
    {
        $this->part_app = $part_app;
        $this->model = $this->loadModel();
        $this->view = $this->loadView();
    }

    private function loadModel()
    {
        $path = 'models\\' . ucfirst($this->part_app) . 'Model';
        if (class_exists($path)) {
            return new $path();
        }
    }

    private function loadView()
    {
        $path = 'views\\' . $this->part_app . '\\' . ucfirst($this->part_app) . 'View';
        if (class_exists($path)) {
            return new $path();
        }
    }

}