<?php

# Array is a variable that can hold more than one value at a time

# Three types of arrays:
# Indexed
# Associative
# Multidimensional (Nested)

#Indexed examples
$students = array("Bob", "Tom", "Jane"); # auto-indexed and starts at 0
$grades = array(100, 40, 60);

# Add to an array
# array_push($array, Value)
array_push($students, "Adam");

# Retrieve value from array
# variable[index]
$out = $students[3]; # 

echo $out;
echo "<br>";

print_r($students);
echo "<br>";

# Get length of an array
# count($array)
echo count($students);
echo "<br>";
echo "<br>";


# Associative array
# index (called a key) is a string
echo "Associative Arrays";
$assocArray = array("Key0"=>0, "Key1"=>2);

print_r($assocArray);
echo "<br>";

// Retrieve values

echo $assocArray["Key0"];
echo "<br>";
echo "<br>";

$studentInfo = array();
$studentInfo["first name"] = "Adam";
$studentInfo["last name"] = "Saenzpardo";
$studentInfo["id"] = 93761;
$studentInfo["birthDate"] = "6-2-1983";

print_r($studentInfo);
echo "<br>";

$student = "";

echo "<br>";

// var_dump($_SERVER);
// echo "<br>";

# SUPER GLOBALS - $_GET, $_POST, $_REQUEST
# $_GET Super Global

var_dump($_GET);
echo "<br>";

$number1 = 0;
$number2 = 0;

echo '<h1 style="color: red;">';

if(isset($_GET["number1"])) {
    $number1 = $_GET["number1"];
    if(isset($_GET["number2"])) 
    {
        $number2 = $_GET["number2"];
        echo $number1 + $number2;
    }
} else {
    echo "Undefined";
}
echo "</h1>";
echo "<br>";

echo '<h2 style="color: cyan;">HI <em>EVELYN</em></h2>'

?>