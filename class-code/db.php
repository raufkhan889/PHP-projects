<?php

class DB
{
    protected $conn;

    public function connectDB()
    {
        $this->conn = new PDO(
            "mysql: host=localhost; dbname=temp",
            'root',
            ''
        );
    }

    public function close_DB()
    {
        $this->conn = null;
    }
}
