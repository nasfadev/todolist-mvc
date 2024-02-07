<?php

namespace todolist;

use APP_ROOT;

class User
{
    private $db;
    private $table = 'users';
    public function __construct()
    {
        require_once('../app/core/Database.php');
        $this->db = new Database;
    }
    public function check(array $data)
    {
        $query = "SELECT * FROM " .
            $this->table .
            " WHERE user=:user AND pass=:pass";
        $this->db->query($query);
        $this->db->bind('user', $data['username']);
        $this->db->bind('pass', $data['password']);
        return $this->db->getOne();
    }
}
