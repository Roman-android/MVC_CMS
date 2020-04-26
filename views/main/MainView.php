<?php


namespace views\main;

use core\View;

class MainView extends View
{

    public function show_page($result)
    {
        $parse_template = new ParseTemplates();
        $parse_template->parseLayouts($this->route, $result);
    }


}