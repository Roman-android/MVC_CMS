<?php


namespace controllers;

use core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->show_page("Вход");
    }

    public function registerAction()
    {
        $this->view->show_page("Регистрация");
    }
}