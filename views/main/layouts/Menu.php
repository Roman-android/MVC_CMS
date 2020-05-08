<?php

namespace views\main\layouts;

class Menu
{

    private $menu;

    public function getMenu($res){
        $this->menu .= '<p>Раздел меню</p><hr/>';
        foreach ($res as $val){
            $this->menu .= '<p>Меню '.$val['item'].'</p>';
        }
        return $this->menu;
    }

}
