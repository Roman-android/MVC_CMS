<?php

namespace controllers;

use core\Controller;

class MainController extends Controller
{

    public function mainAction()
    {
        $request_layouts = $this->model->request_layouts();
        $request_widgets = $this->model->request_pages();
        $this->view->get_page($request_layouts,$request_widgets);
    }
}