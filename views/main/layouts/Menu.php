<?php

namespace views\main\layouts;

class Menu
{

    private $menu;

    public function getMenu($res)
    {
        $this->menu .= '<p>Раздел меню</p><hr/>';
        foreach ($res as $val) {
            $this->menu .= '<p>Меню ' . $val['item'] . '</p>';
        }
        $this->menu .= '<p>Окончание меню</p><hr/>';

        /*
        $this->menu .= '<nav><ul class="main_menu">';
        foreach ($res as $val) {
            $this->menu .= '<li><a>' . $val["item"] . '</a></li>';
        }
        $this->menu .= '</ul></nav>';
        */
        return $this->menu;
    }

}