<?php


namespace views\main;

use core\View;

class WidgetsContent extends View
{
    private $res;
    public function __construct($res)
    {
        $this->res = $res;
        $this->getWidgets($this->res);
    }


    public function getWidgets($res)
    {
        $replace = $this->getTemplatesAction('widgets',$res);
        return implode($replace);
    }

    public function __toString()
    {
        return $this->getWidgets($this->res);
    }


}