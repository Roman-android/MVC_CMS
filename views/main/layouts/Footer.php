<?php


namespace views\main\layouts;


class Footer
{
    private $footer;

    public function getFooter($res){
        $this->footer .= '<hr>';
        $this->footer .= '<p>Футер сайта</p>';
        return $this->footer;
    }

}