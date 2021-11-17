<?php 

echo "Hey, There";

// variables 

$num = 25;
$decimal = 1.251;
$greeting = "Hello";
$boolean = True ;

echo $num . '<br>' . $decimal . '<br>' . $greeting . '<br>' . $boolean; 

// Operators 

$a = 5;
$b = 10;
echo 2 + 4;

// conditional 

if ($a > $b) {
    echo "A is greater than B!";
}
elseif ($a == $b) {
    echo "A is equal to B!";
}
else {
    echo "A is smaller than B!";
// }

// index arrays 

$arr = ['hello', 123, 0.25, 'apple', 2];

// associative array 

$associative_array = array('apple'=>3, "banana"=>8, "peach"=>15);
echo $associative_array["apple"];

// loops 

for ($i = 0; $i <= 20; $i++) {
    echo $i."<br>";
}

while ($a <= $b) {
    echo $a . '<br>';
    $a++;
}

foreach ($associative_array as $i => $val) {
    echo $i . ' = ' . $val . '<br>';
}

// functions 

function greeting($name = "noOne ;)") {
    echo "Hey, $name. <br>";
}
greeting("Rauf");
greeting();




?>