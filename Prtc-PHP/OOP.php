<?php
class User {
    protected $id;
    protected $name;
    protected $age;
    protected $gender;

    function __construct($id, $name, $age, $gender) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    function getUserInfo() {
        return $this->name;
    }
}

class Customer extends User {
    private $balance;
    public $plan;

    function __construct($id, $name, $age, $gender, $balance, $plan) {
        parent::__construct($id, $name, $age, $gender);
        $this->balance = $balance;
        $this->plan = $plan;
    }

    function getCustomerInfo() {
        echo "Customer Name is: " . $this->getUserInfo() . "<br>";
        echo "Customer balance is: " . $this->plan;
    }
}

$customer = new Customer(1, "Rauf", 21, "Male", 0.0, "Pro");
$customer->getCustomerInfo();

?>