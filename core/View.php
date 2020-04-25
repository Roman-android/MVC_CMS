<?php


namespace core;


use views\main\ParseTemplates;

class View
{
    public $route;
    public $path;
    public $layout = 'default';

    private $parse_template;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];

        $this->parse_template = new ParseTemplates();
    }

    public function show_page ($title, $result){

        /*echo '<p>'.$title.'</p>';
        foreach ($result as $val){
            echo '<p>'.$val['title'].'</p>';
        }*/

        $path = 'views/'.$this->route['controller'].'/'.$this->layout.'.php';
        if(file_exists($path)){
            //$this->renderLayout($path,$result);
            $this->parse_template->parseLayouts($this->route,$result);
        }else{
            echo 'Вид не найден: '.$path;
        }
    }

    public function renderLayout($path,$result){
        require_once 'views/main/layouts/menu.php';

        $layout = file_get_contents($path);
        $find = '[MENU]';
        $replace = '<hr/><b>'.getMenu().'</b>';
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