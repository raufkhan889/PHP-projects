<?php

include('db.php');

session_start();

class Users extends DB
{
    private $account;
    private $name;
    private $email;
    private $password;
    private $country;

    public function RegisterUser($account, $name, $email, $password, $country)
    {
        $this->account = $account;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->country = $country;

        $q = "INSERT INTO money_users (account, name, email, password, country) VALUES ('$this->account', '$this->name', '$this->email', '$this->password', '$this->country');";

        if ($this->conn->exec($q)) {
            header("location: sign_up_client.php?msg=Account successfully created, Login Now!");
        } else {
            header("location: sign_up_client.php?msg=Something went wrong, Try again!");
        }
    }

    public function LoginUser($email, $password)
    {
        $q = "SELECT * FROM money_users WHERE email = '$email' AND password = '$password';";

        $data = $this->conn->query($q);

        if ($data->rowCount() == 0) {
            $_SESSION['logged_in'] = false;
            header("location: login_client.php?msg=Email and Password are incorrect!");
        } else {
            $user = $data->fetch(PDO::FETCH_ASSOC);
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $user['name'];
            header("location: home.php");
        }
    }

    public function getAllUsers()
    {
        $q = "SELECT * FROM money_users";

        $data = $this->conn->query($q);

        return $data;
    }

    public function deleteUser($id)
    {
        $q = "DELETE FROM money_users WHERE id=$id";

        if ($this->conn->exec($q))
            header("location: display_all_users.php?msg=User deleted successfully");
        else
            header("location: display_all_users.php?msg=Unable to delete the user");
    }

    public function getUserById($id)
    {
        $q = "SELECT * FROM money_users WHERE id=$id;";

        $data = $this->conn->query($q);

        return $data;
    }

    public function UpdateUser($id, $name, $pwd, $country)
    {
        $q = "UPDATE money_users SET name='$name', password='$pwd', country='$country' WHERE id=$id;";

        if ($this->conn->exec($q)) {
            $_SESSION['user_name'] = $name;
            header("location: display_all_users.php");
        } else {
            header("location: edit_user_client.php?msg=Unable to update the user.");
        }
    }

    public function getALLUserOrderByName()
    {
        $q = "SELECT * FROM money_users ORDER BY name ASC;";

        $data = $this->conn->query($q);
        return $data;
    }

    public function logoutUser()
    {
        //
    }
}
