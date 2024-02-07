<?php

namespace todolist;

class Login extends Controllers
{
    public function init()
    {
        $this->view('login', $_POST);
    }
    public function tryLogin()
    {
        $this->model('User')->check($_POST);
    }
}
