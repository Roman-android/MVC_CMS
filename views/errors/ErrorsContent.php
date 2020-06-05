<?php

namespace views\errors;

class ErrorsContent{

    private $error;

    public function __construct()
    {
        $this->get_error();
    }


    private function get_error(){
        $this->error = 'Страница не найдена. Ошибка 404';
        return $this->error;
    }

    public function __toString()
    {
        return $this->get_error();
    }


}