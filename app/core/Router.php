<?php

namespace todolist;


class Router
{
    function __construct(array $url)
    {
        require('../app/controllers/login.php');

        $login = new Login();
        $login->init();
    }
    function urlParser()
    {
    }
}
