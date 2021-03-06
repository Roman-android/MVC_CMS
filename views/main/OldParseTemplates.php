<?php


namespace views\main;

class ParseTemplates
{
    private $route;
    private $page;

    private $tag_templates;

    private $default_layout;
    private $parse_default;

    public function __construct($route,$page)
    {
        $this->route = $route;
        $this->page = $page;

        $this->tag_templates = require_once 'config/config_pages_old.php';
        $this->default_layout = 'views/' . $route . '/public/' . $this->tag_templates['default_layout'] . '.php';
        $this->parse_default = file_get_contents($this->default_layout);
    }


    public function getLayouts($res)
    {
        $find = array();
        $replace = array();
        $lost_tags = array();
        if (file_exists($this->default_layout)) {
            foreach ($this->tag_templates['layouts'] as $key => $value) {
                $template_path = 'views\\' . $this->route . '\layouts\\' . ucfirst($value);

                if (class_exists($template_path)) {
                    $template_action = 'get' . ucfirst($value);
                    if (method_exists($template_path, $template_action)) {
                        $template_file = new $template_path;
                        $replace[] = $template_file->$template_action($res[$key]);
                        //$replace[] = $template_file->$template_action($res[$value]);
                    } else {
                        echo "Метод " . $template_action . " не найден";
                    }
                } else {
                    echo "Класс " . $template_path . " не найден";
                }
            }

            foreach ($this->tag_templates['layouts'] as $key => $value) {
                $find[] = '[' . strtoupper($value) . ']';

                $find_tag = strpos($this->parse_default, $find[$key]);
                if ($find_tag == false) {
                    $lost_tags[$value] = $find[$key];
                }
            }

            $find[] = '[WIDGETS]';
            $replace[] = $this->getWidgets($res);

        } else {
            echo 'Основной файл шаблона (' . $this->default_layout . ') не существует';
        }

        if (empty($lost_tags)) {
            $layout = str_replace($find, $replace, $this->parse_default);
            echo $layout;
        } else {
            $tags = implode(",", $lost_tags);
            echo "Не найдены псевдотеги: " . $tags . " в шаблоне " . $this->default_layout;
        }
    }

    public function getWidgets($res)
    {
        $replace = array();

        foreach ($this->tag_templates['widgets'][$this->page] as $key => $value) {
            $template_path = 'views\\' . $this->route . '\widgets\\' . ucfirst($value);

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
        return implode($replace);
    }

   /* private function getTemplatesAction($type, $res)
    {
        $replace = array();


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



        return $replace;
    }*/

}