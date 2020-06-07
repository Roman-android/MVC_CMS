<?php


namespace views\main\widgets;


class Map
{
    private $map;

    public function getMap($res){
        $this->map ='<p>Раздел "Карта"</p>';
        return $this->map;
    }
}