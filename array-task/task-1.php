<?php

# print info 
function printStudentMarks($st_names, $mid_marks) { // argument pass by value
    
    for ($i = 0; $i < sizeof($st_names); $i++) {
        echo "$st_names[$i] got $mid_marks[$i] marks out of 100. <br/><br/>";
    }

}

// indexed array 1
$student_names = array("Rauf", "Mehwish", "Jibran", "Javeria", "Usama");

// indexed array 2
$midterm_marks = array(70, 80, 71, 88, 69);

# invoking function 
printStudentMarks($student_names, $midterm_marks);


?>