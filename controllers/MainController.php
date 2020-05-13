<?php

namespace controllers;

use core\Controller;

class MainController extends Controller
{

   /* public function __construct($route)
    {
        parent::__construct($route);

    }*/

    public function mainAction()
    {
        $request = $this->model->requestLayouts();
        $this->view->show_page($request);
    }

    /*public function contactsAction()
    {
        echo 'Контакты';
    }*/
}