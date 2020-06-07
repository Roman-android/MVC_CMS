<?php


namespace views\main;

use core\Config;
use core\View;
use views\content\ErrorsContent;
use views\content\WidgetsContent;

class MainView extends View
{
    private $templates_root;
    private $default_page;
    private $parse_default;
    private $content_page;

    public function __construct($content_page)
    {
        $this->content_page = $content_page;
        $this->templates_root = Config::$templates_root;
        $this->default_page = Config::$default_page;
        $this->parse_default = file_get_contents($this->default_page);
    }

    //===================================================

    public function get_page($model)
    {
        $find = array();
        $replace = array();
        $lost_tags = array();
        if (file_exists($this->default_page)) {

            $replace = $this->getTemplatesAction('layouts',$model->request_layouts());
            foreach (Config::get_tags('layouts') as $key => $value) {
                $find[] = '[' . strtoupper($value) . ']';

                $find_tag = strpos($this->parse_default, $find[$key]);
                if ($find_tag == false) {
                    $lost_tags[$value] = $find[$key];
                }
            }

            $find[] = '[CONTENT]';

            $method = 'get'.$this->content_page;
            $path = "views\content\\".$this->content_page."Content";
            $class = new $path($model->request_pages());
            $replace[] = $class->$method();

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



}