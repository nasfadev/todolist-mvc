<?php

namespace todolist;

class Login
{
    public function init()
    {
        var_dump($_POST);
        require_once("../app/views/login.php");
        if (!isset($_POST['username'])) return;
        if (!isset($_POST['password'])) return;
        require_once("../app/models/User.php");
        $user = new User;
        var_dump($user->check($_POST));
    }
}
