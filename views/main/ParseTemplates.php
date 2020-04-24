<?php


namespace views\main;

class ParseTemplates
{
    private $layouts;
    private $widgets;

    public function __construct()
    {
        require_once 'config.php';
        $this->layouts = getLayouts();
        $this->widgets = getWidgets();
        $this->attachLayout($this->layouts);
        //debug($this->layouts);
    }

    public function attachLayout($layout)
    {
        foreach ($layout as $path) {
            //require_once 'layouts/'.mb_strtolower($value).'.php';

            $find = '['.$path.']';
            $replace = file_get_contents('views/main/layouts/' . mb_strtolower($path) . '.php');
            $parse_layout = file_get_contents('views/main/default.php');
            $find_tag = strpos($parse_layout, $find);

            if ($find_tag==true){
                $get_layout = str_replace($find,$replace,$parse_layout);
                echo $get_layout;
            }


        }
    }

    public function parseLayouts()
    {

    }

}