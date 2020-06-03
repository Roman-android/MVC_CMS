<?php

namespace views\errors;

class Error404{

    private $error;

    public function get_error(){
        $this->error = 'Страница не найдена. Ошибка 404';
        return $this->error;
    }
}