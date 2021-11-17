<?php

class SignUp
{
    private $first_name;
    private $last_name;
    private $user_email;
    private $user_password;

    public function __construct()
    {
        print "Constructor Ran... <br/><br/>";
    }

    // setters 
    public function setFirstName($f_name)
    {
        $this->first_name = $f_name;
    }

    public function setLastName($l_name)
    {
        $this->last_name = $l_name;
    }

    public function setUserEmail($u_email)
    {
        $this->user_email = $u_email;
    }

    public function setUserPassword($u_pwd)
    {
        $this->user_password = $u_pwd;
    }

    // getters 
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getUserEmail()
    {
        return $this->user_email;
    }

    public function getUserPassword()
    {
        return $this->user_password;
    }
}
