<?php

include('db.php');

class UserLogin extends DB
{
    private $email;
    private $password;

    public function LoginUser($u_email, $u_pwd)
    {
        $this->email = $u_email;
        $this->password = $u_pwd;

        $q = "SELECT * FROM users WHERE email = '$this->email';";
        $statement = $this->conn->query($q);

        echo var_dump($statement);

        // $data = $statement->fetchAll(PDO::FETCH_ASSOC);


    }
}


$u = new UserLogin;
$u->connect_DB();
