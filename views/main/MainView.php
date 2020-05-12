<?php


namespace views\main;

use core\View;

class MainView extends View
{

    public function show_page($request)
    {
        $parse_template = new ParseTemplates($this->route);
        $parse_template->getLayouts($request);
    }


}