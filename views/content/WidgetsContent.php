<?php

namespace views\content;

use core\View;

class WidgetsContent extends View
{
    private $res;
    public function __construct($res)
    {
        $this->res = $res;
    }


    public function getWidgets()
    {
        $replace = $this->getTemplatesAction('widgets',$this->res);
        return implode($replace);
    }


}