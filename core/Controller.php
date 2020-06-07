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
        if(array_key_exists(Config::current_page(),Config::$pages)){
            $content_page = Config::$content_page['widgets'];
        }else{
            $content_page = Config::$content_page['error'];
        }
        //echo 'content_page: '.$content_page.'<br/>';

        $path = 'views\\' . $this->part_app . '\\' . ucfirst($this->part_app) . 'View';
        if (class_exists($path)) {
            return new $path($content_page);
        }
    }

}