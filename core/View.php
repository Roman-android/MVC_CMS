<?php


namespace core;


use views\main\ParseTemplates;

class View
{
    public $route;
    public $path;
    public $layout = 'default';


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render ($title,$result){
        //extract($vars);

        $path = 'views/'.$this->route['controller'].'/'.$this->layout.'.php';
        if(file_exists($path)){
            $this->renderLayout($path,$result);
            //new ParseTemplates();
        }else{
            echo 'Вид не найден: '.$path;
        }
    }

    public function renderLayout($path,$result){
        require_once 'views/main/layouts/menu.php';

        $layout = file_get_contents($path);
        $find = '[MENU]';
        $replace = '<hr/><b>'.getMenu('Пункт 2').'</b>';
        $find_tag = strpos($layout, $find);
        if ($find_tag==true) {
            $replace1 = str_replace($find,$replace,$layout);
            echo $replace1;
        } else {
            echo 'Псевдотэг '.$find.' не найден(((';
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