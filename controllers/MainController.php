<?php


namespace controllers;

use core\Controller;
use models\MainModel;
use views\main\MainView;

class MainController extends Controller
{

    public function indexAction()
    {
        $result = $this->model->requestNews();
        $menu = $this->model->requestMenu();

        $this->view->show_page($result);

    }

    /*public function contactsAction()
    {
        echo 'Контакты';
    }*/
}