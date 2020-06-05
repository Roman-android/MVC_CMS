<?php


namespace views\main;

use core\Config;
use core\View;
use views\errors\ErrorsContent;

class MainView extends View
{
    private $templates_root;
    private $default_page;
    private $parse_default;

    public function __construct()
    {
        $this->templates_root = Config::$templates_root;
        $this->default_page = Config::$default_page;
        $this->parse_default = file_get_contents($this->default_page);
    }

    //===================================================

    public function get_page($res_layouts,$res_widgets)
    {
        $find = array();
        $replace = array();
        $lost_tags = array();
        if (file_exists($this->default_page)) {

            $replace = $this->getTemplatesAction('layouts',$res_layouts);
            foreach (Config::get_tags('layouts') as $key => $value) {
                $find[] = '[' . strtoupper($value) . ']';

                $find_tag = strpos($this->parse_default, $find[$key]);
                if ($find_tag == false) {
                    $lost_tags[$value] = $find[$key];
                }
            }

            $find[] = '[CONTENT]';
            if(array_key_exists(Config::current_page(),Config::$pages)){
                echo "Страница существует!";
                $replace[] = new WidgetsContent($res_widgets);
            }else{
                echo "Страница НЕ существует!";
                $replace[] = new ErrorsContent();
            }

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