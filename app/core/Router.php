<?php

namespace todolist;


class Router
{
    function __construct(array $url)
    {
        require('../app/controllers/Login.php');
        $login = new Login();
        $login->init();
    }
    function urlParser()
    {
    }
}
