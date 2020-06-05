<?php


namespace views\main\widgets;


class Maps
{
    private $maps;

    public function getMaps($res){
        $this->maps ='<p>Раздел "Несколько карт"</p>';
        foreach ($res as $val){
            $this->maps .= "Координата Х = ".$val['axis_x']."<br/>";
            $this->maps .= "Координата Y = ".$val['axis_y']."<br/>";
        }
        return $this->maps;
    }
}