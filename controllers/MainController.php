<?php


namespace controllers;

use core\Controller;
use models\MainModel;
use views\main\MainView;

class MainController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $request = $this->model->requestLayouts();
        $this->view->show_page($request);
    }

    public function indexAction()
    {
        $result = $this->model->requestNews();
    }

    /*public function contactsAction()
    {
        echo 'Контакты';
    }*/
}