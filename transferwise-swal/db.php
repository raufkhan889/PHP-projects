<?php

class DB
{
    protected $conn;

    private $server = 'localhost';
    private $db_name = 'guest_users';
    private $db_username = 'root';
    private $db_password = '';

    public function __construct()
    {
        //
    }

    public function connect_DB()
    {
        $this->conn = new PDO(
            "mysql: host=$this->server; dbname=$this->db_name",
            $this->db_username,
            $this->db_password
        );
    }

    public function close_db()
    {
        $this->conn = null;
    }

    public function __destruct()
    {
        //
    }
}
