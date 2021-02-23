<?php

namespace views\main\layouts;

class Header
{

    private $header;
    public function getHeader($res){

        $this->header .= 'Вывод header';
        foreach ($res as $val){
            $this->header .=
                '<p>Адрес: <b>'.$val["addres"].'</b></p>
                 <p>Телефон: <b>'.$val["telephone"].'</b></p><hr/>
                 <p>test.homedver.ru</p>';
        }
        return $this->header;
    }

}