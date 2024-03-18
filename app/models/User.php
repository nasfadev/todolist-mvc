<?php

namespace todolist;

class User
{
    private $db;
    private $table = 'user';
    public function __construct()
    {
        $this->db = new Database;
    }
    public function check(array $data)
    {
        if (!isset($data['username'])) return;
        if (!isset($data['password'])) return;
        $query = "SELECT * FROM " .
            $this->table .
            " WHERE user=:user AND pass=:pass";
        $this->db->query($query);
        $this->db->bind('user', $data['username']);
        $this->db->bind('pass', $data['password']);
        $result = $this->db->getOne();
        $_SESSION['user_data'] = $result;
        return $result;
    }
    public function getOne(int $id)
    {
        $query = "SELECT * FROM " .
            $this->table .
            " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $result = $this->db->getOne();
        return $result;
    }
}
