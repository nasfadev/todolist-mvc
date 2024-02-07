<?php

namespace todolist;


class Router
{
    private $controller = 'Login';
    private $model = 'login';
    function __construct(array $url)
    {

        $login = $this->get_contr('Login');
        $login->tryLogin();
        if (!isset($_SESSION['user_data']['user'])) {
            $login->init();
            return;
        }
        $home = $this->get_contr('Home');
        $home->init();
    }
    function get_contr(string $controller)
    {
        require('../app/controllers/' . $controller . '.php');
        return new (__NAMESPACE__ . '\\' . $controller);
    }
}
