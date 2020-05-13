<?php


namespace views\main;

use core\View;

class MainView extends View
{
    protected $route;
    protected $page;

    public function __construct($route,$page)
    {
        $this->route = $route;
        $this->page = $page;
    }

    public function show_page($request)
    {
        $parse_template = new ParseTemplates($this->route,$this->page);
        $parse_template->getLayouts($request);
    }


}