<?php


namespace views\main;

use core\View;

class MainView extends View
{

    public function show_page ($title, $result){
        $path = 'views/'.$this->route['controller'].'/'.$this->layout.'.php';
        if(file_exists($path)){
            $this->parse_template->parseLayouts($this->route,$result);
        }else{
            echo 'Вид не найден: '.$path;
        }
    }

}