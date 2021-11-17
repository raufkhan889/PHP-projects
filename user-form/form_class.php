<?php

class User {
    private $u_name;
    private $u_mother;
    private $u_guardian;
    // date of birth attributes 
    private $dob_day;
    private $dob_month;
    private $dob_year;

    private $gender;
    private $category;
    private $special_category;
    private $LAS;
    private $minority;
    private $annual_income;

    public function __construct() {
        echo "Constructor Ran.. <br/><br/>";
    }

    public function setUser($u_name, $u_mother, $u_guardian, $dob_day, $dob_month, $dob_year, $gender, $category, $special_category,
    $LAS, $minority, $annual_income) {
        
        $this->u_name = $u_name;
        $this->u_mother = $u_mother;
        $this->u_guardian = $u_guardian;

        $this->dob_day = $dob_day;
        $this->dob_month = $dob_month;
        $this->dob_year = $dob_year;

        $this->gender = $gender;
        $this->category = $category;
        $this->special_category = $special_category;
        $this->LAS = $LAS;
        $this->minority = $minority;
        $this->annual_income = $annual_income;
    }

    public function printUser() {
        echo "User Name: " . $this->u_name . "<br/>";
        echo "Mother Name: " . $this->u_mother . "<br/>";
        echo "Guardian Name: " . $this->u_guardian . "<br/>";

        echo "Date of Birth: " . $this->dob_day . "-" . $this->dob_month . "-" . $this->dob_year . "<br/>";

        echo "Gender: " . $this->gender . "<br/>";
        echo "Category: " . $this->category . "<br/>";

        echo "Seeking Admission under Special Catgeory: ";
        foreach ($this->special_category as $key => $value) {
            echo $value . ", ";
        }
        echo "<br/>";
        
        echo "Local Area Status: " . $this->LAS . "<br/>";
        echo "Minority Community: " . $this->minority . "<br/>";
        echo "Annual Income: " . $this->annual_income . "<br/>";

    }
}

?>