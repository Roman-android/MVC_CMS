<?php


namespace views\main\widgets;


class Maps
{
    private $maps;

    public function getMaps(){
        $this->maps ='<p>Раздел "Несколько карт"</p>';
        return $this->maps;
    }
}