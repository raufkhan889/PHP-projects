<?php  

// Question - 1

if (isset($_GET['u_email'])) {

    $email = $_GET['u_email'];
    $u_DOB = $_GET['u_dob'];

    echo "User Email is: " . $email . "<br/>";
    echo "User DOB is: " . $u_DOB . "<br/>";
}

// Question - 2

$items = array("Phone", "Laptop", "Power Bank", "Xbox", "PS5");

if (isset($_GET['items'])) {
    
    $item_index =  $_GET['items'];
    $qty = $_GET['qty'];

    echo "Selected Item: " . $items[$item_index] . "<br/>";
    echo "Item Quantity: " . $qty . "<br/>";

}
?>

