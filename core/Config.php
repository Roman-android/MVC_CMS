<?php

namespace core;

class  Config
{

    public static $default_page;
    public static $templates_root;

    /*public function __construct()
    {
        require_once 'config/config.php';
        self::$default_page=default_page;
        self::$templates_root = templates_root;
    }*/
    public static function init(){
        require_once 'config/config.php';
        self::$default_page=default_page;
        self::$templates_root = templates_root;
    }

    public static function get_tags($type, $page=null)
    {
        if ($type == "layouts") {
            return layouts_tags;
        } elseif ($type == "widgets") {
            return self::get_widgets($page);
        }
    }

    private static function get_widgets($page)
    {
        $widgets = array();
        if ($page == "") {
            $page = "main";
        }
        foreach (widgets_tags[$page] as $key => $value) {
            //$widgets[$value] = $value;
            $widgets[] = $value;
        }
        return $widgets;
    }




}