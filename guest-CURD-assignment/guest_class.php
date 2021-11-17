<?php

include('db.php');

class GuestUser extends DB
{
    private $name;
    private $email;
    private $gender;
    private $nationality;
    private $skills; // array
    private $post;
    private $textarea;
    private $via_email;
    private $terms;

    public function guestRequest($name, $email, $gender, $nationality, $skills, $post, $textarea, $via_email, $terms)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->nationality = $nationality;
        $this->skills = $skills;
        $this->post = $post;
        $this->textarea = $textarea;
        $this->via_email = $via_email;
        $this->terms = $terms;

        $q = "INSERT INTO users (name, email, gender, nationality, skills, post, textarea, vemail, terms) VALUES ('$this->name', '$this->email', '$this->gender', '$this->nationality', '$this->skills', '$this->post', '$this->textarea', '$this->via_email', '$this->terms');";
        echo $q;

        if ($this->conn->exec($q))
            header("location: guest_client.php?msg=Request has been sent, wait for our reponse");
        else
            header("location: guest_client.php?msg=Error, resubmit the form");
    }

    public function viewGuests()
    {
        $q = "SELECT * FROM users;";
        $data = $this->conn->query($q);

        return $data;
    }
}
