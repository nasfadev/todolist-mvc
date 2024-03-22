<?php

namespace todolist;


class Discover extends Controllers
{
    public function init()
    {
        $data = $this->model('TodolistProject')->getLatests(10);
        $this->view('templates/header', $_POST);
        $this->view('home', $data);
        $this->view('templates/footer', $_POST);
    }
}
