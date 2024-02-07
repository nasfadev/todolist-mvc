<?php

namespace todolist;

class Controllers
{
    public function view(string $view, array $data)
    {
        require_once('../app/views/' . $view . '.php');
    }
    public function model(string $model)
    {
        require_once('../app/models/' . $model . '.php');
        return new (__NAMESPACE__  . '\\' . $model);
    }
}
