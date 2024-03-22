<?php

namespace todolist;

class Login extends Controllers
{
    public function init()
    {
        $this->view('login', $_POST);
    }
    public function login()
    {
        $this->model('User')->login($_POST);
    }
}
