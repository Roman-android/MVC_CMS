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
        $find = array();
        $replace = array();
        $default_layout = 'views/' . $route['controller'] . '/' . $this->tag_templates['default_layout'] . '.php';
        $parse_default = file_get_contents($default_layout);
        if (file_exists($default_layout)) {
            foreach ($this->tag_templates['layouts'] as $key => $value) {

                $template_path = 'views\\' . $route['controller'] . '\layouts\\' . ucfirst(strtolower($value));

                if (class_exists($template_path)) {
                    $template_action = 'get' . ucfirst(strtolower($value));
                    if (method_exists($template_path, $template_action)) {
                        $template_file = new $template_path;
                        $replace[] = $template_file->$template_action();
                    } else {
                        echo "Метод " . $template_action . " не найден";
                    }
                } else {
                    echo "Класс " . $template_path . " не найден";
                }

                $find[] = '[' . $value . ']';

                /*
                $find_tag = strpos($parse_default,$find);
                if ($find_tag == true){
                    $layout = str_replace($find,$replace,$parse_default);
                    echo $layout;
                }else{
                    echo 'Тег '.$find.' не найден';
                }*/
            }
        } else {
            echo 'Основной файл шаблона (' . $default_layout . ') не существует';
        }

        $layout = str_replace($find, $replace, $parse_default);
        echo $layout;
    }

}