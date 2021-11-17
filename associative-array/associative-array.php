<?php
// indexed array 
$brands[0] = "hp";
$brands[1] = "dell";
$brands[2] = "lenovo";

$laptops = array("mac", "acer", "sony", "toshiba");

// echo "<table border='4'>";

// for ($i = 0; $i < count($laptops); $i++) {
//     echo "<tr> <td>" . $laptops[$i] . "</td> <td> " . $laptops[$i] . "</td> </tr>";
// }

// echo "</table>";

// associative arrays 
$marks["aslam"] = "10";
$marks["ali"] = "12";
$marks["jibran"] = "8";

$marks2 = array(
    "aslam" => "10",
    "ali" => "12",
    "jibran" => "8"
);

// foreach ($marks2 as $key => $value) {
//     echo $key . " = " . $value . "<br/>";
// }

$usa = array(
    "id" => "b-1234",
    "name" => "test",
    "gender" => "male",
    "dob" => "1-1-1111",
    "address" => "sdfsdfsdfsddf"
);

echo "<br/>";

foreach ($usa as $ind => $val) {
    echo $val . "<br/>";
}
