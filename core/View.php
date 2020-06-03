<?php


namespace core;

class View
{

    public function getTemplatesAction($type, $res)
    {
        $replace = array();
        foreach (Config::get_tags($type,Config::current_page()) as $key => $value) {
            $template_path = Config::$templates_root[$type] . ucfirst($value);
            if (class_exists($template_path)) {
                $template_action = 'get' . ucfirst($value);
                if (method_exists($template_path, $template_action)) {
                    $template_file = new $template_path;
                    $replace[] = $template_file->$template_action($res[$value]);
                } else {
                    echo "Метод " . $template_action . " не найден";
                }
            } else {
                echo "Класс " . $template_path . " не найден";
            }

        }

        return $replace;
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