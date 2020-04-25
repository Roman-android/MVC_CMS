<?php


namespace views\main;

class ParseTemplates
{

    private $tag_templates;

    public function __construct()
    {
        $this->tag_templates = require_once 'config.php';
    }


    public function parseLayouts($route, $result)
    {
        $item = array();
        $default_layout = 'views/' . $route['controller'] . '/' . $this->tag_templates['default_layout'] . '.php';
        $parse_default = file_get_contents($default_layout);
        if (file_exists($default_layout)) {
            foreach ($this->tag_templates['layouts'] as $key => $tag) {
                //'views/main/layouts/menu.php'

                require_once 'views/' . $route['controller'] . '/layouts/' . strtolower($tag) . '.php';
                $item[$key] = $tag;
                /*$replace = 'get' . ucfirst(strtolower($tag)) . '()';
                $find_tag = strpos($parse_default,$find);
                if ($find_tag == true){
                    $layout = str_replace($find,$replace,$parse_default);
                    echo $layout;
                }else{
                    echo 'Тег '.$find.' не найден';
                }*/
            }
        } else {
            echo 'Файл ' . $default_layout . ' не существует';
        }
        echo $item[0];

        //debug($replace);
    }

}