<?php

namespace todolist;

class TodolistProject
{
    private $db;
    private $table = 'todolist_project';
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getLatests(int $amount)
    {
        $query = "SELECT * FROM " .
            $this->table .
            " ORDER BY id DESC LIMIT :amount";
        $this->db->query($query);
        $this->db->bind('amount', $amount);
        $result = $this->db->getAll();
        return $result;
    }
    public function getPopulars(int $amount)
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
}
