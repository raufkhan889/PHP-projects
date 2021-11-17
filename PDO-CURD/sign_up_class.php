<?php

include('db.php');

class User extends DB
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;

    public function registerUser($f_name, $l_name, $u_email, $u_pwd)
    {
        $this->first_name = $f_name;
        $this->last_name = $l_name;
        $this->email = $u_email;
        $this->password = $u_pwd;

        $q = "INSERT INTO users (f_name, l_name, email, pwd) VALUES ('$this->first_name', '$this->last_name', '$this->email', '$this->password');";
        $this->conn->exec($q);
        echo "entry done";
    }
}
