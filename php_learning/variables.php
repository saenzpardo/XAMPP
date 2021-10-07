<?php

# Constants - define("constantName", value, true/false) = true means case insensitive, false is case sensitive
# - Constants are global
# - constants don't use a '$' before constant name.
# define("PI", 3.14, true);
# move constants to seperate file for ease of use
# can use include or require
# include goes to constant file
include 'constants.php'; # if you try and include non-existent file - system warning
require 'constants.php'; # if you try and include non-existent file - system crash


# Variables
# Names:
# - Starts with '$' ex: $variable
# - Must start with letter or '_'
# - Can't start with number
# - Can only contain alpha-numeric characters and underscores (A-z, 0-9, _)
# - Names are case sensitive $age != $AGE

$test = "Hello";

echo $test;
echo "\n";

$money = "$"; # '=' assignment

echo "<br>\n$money\n";

$is_int = "1";

echo is_integer($is_int);


echo (2**9);

echo "<br>";

# branching





?>