<?php

class DB
{
    private $server = 'localhost';
    private $db_name = 'sign_up';
    private $db_username = 'root';
    private $db_password = '';

    protected $conn;

    public function connect_DB()
    {
        $this->conn = new PDO(
            "mysql: host=$this->server; dbname=$this->db_name",
            $this->db_username,
            $this->db_password
        );
    }
}
