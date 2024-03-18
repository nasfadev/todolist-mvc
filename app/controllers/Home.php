<?php

namespace todolist;

class Home extends Controllers
{
    public function init()
    {
        $this->view('templates/header', $_POST);
        $this->view('home', $_POST);
        $this->view('templates/footer', $_POST);
    }
}
