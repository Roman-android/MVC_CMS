<?php

namespace core;

class  Config
{
    public static $current_page;
    public static $default_page;
    public static $templates_root;
    public static $part_app;
    public static $pages;
    public static $content_page;
    

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
        self::$part_app = part_app;
        self::$pages = pages;
        self::$content_page = content_page;
    }

    public static function current_page(){
        self::$current_page = trim($_SERVER['REQUEST_URI'], '/');
        if (self::$current_page == "") {
            self::$current_page = "main";
        }
        return self::$current_page;
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

        foreach (self::$pages[$page] as $key => $value) {
            //$widgets[$value] = $value;
            $widgets[] = $value;
        }
        return $widgets;
    }




}