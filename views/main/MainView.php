<?php


namespace views\main;

use core\Config;
use core\View;

class MainView extends View
{
    private $route;
    private $page;


    private $templates_root;
    private $default_page;
    private $parse_default;

    public function __construct($route,$page)
    {
        $this->route = $route;
        $this->page = $page;

        $this->templates_root = Config::$templates_root;
        $this->default_page = Config::$default_page;
        $this->parse_default = file_get_contents($this->default_page);

    }

    public function show_page($res)
    {
        $this->getLayouts($res);
    }

    //===================================================

    public function getLayouts($res)
    {
        $find = array();
        $replace = array();
        $lost_tags = array();
        if (file_exists($this->default_page)) {

            $replace = $this->getTemplatesAction('layouts',$res);
            foreach (Config::get_tags('layouts') as $key => $value) {
                $find[] = '[' . strtoupper($value) . ']';

                $find_tag = strpos($this->parse_default, $find[$key]);
                if ($find_tag == false) {
                    $lost_tags[$value] = $find[$key];
                }
            }

            $find[] = '[WIDGETS]';
            $replace[] = $this->getWidgets($res);

        } else {
            echo 'Основной файл шаблона (' . $this->default_page . ') не существует';
        }

        if (empty($lost_tags)) {
            $layout = str_replace($find, $replace, $this->parse_default);
            echo $layout;
        } else {
            $tags = implode(",", $lost_tags);
            echo "Не найдены псевдотеги: " . $tags . " в шаблоне " . $this->default_page;
        }
    }

    public function getWidgets($res)
    {
        $replace = $this->getTemplatesAction('widgets',$res);
        return implode($replace);
    }

     private function getTemplatesAction($type, $res)
     {
         $replace = array();
         foreach (Config::get_tags($type,$this->page) as $key => $value) {
             $template_path = $this->templates_root[$type] . ucfirst($value);

             if (class_exists($template_path)) {
                 $template_action = 'get' . ucfirst($value);
                 if (method_exists($template_path, $template_action)) {
                     $template_file = new $template_path;
                     $replace[] = $template_file->$template_action($res[$key]);
                 } else {
                     echo "Метод " . $template_action . " не найден";
                 }
             } else {
                 echo "Класс " . $template_path . " не найден";
             }

         }

         return $replace;
     }
    
    


}