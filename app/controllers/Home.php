<?php

namespace todolist;

class Home extends Controllers
{
    public function init()
    {
        $this->view('home', $_POST);
    }
}
