<?php
/* Program: Fizz Buzz
   Author: J. Adam Saenzpardo
   Date: 9/7/2021
   Puprose: 1) Loop from 1 to 100
            2) Populate to array
            3) Replace numbers divisible by 3 with "Fizz"
            4) Replace number divisible by 5 with "Buzz"
            5) Replace numbers divisible by 3 and 5 with "FizzBuzz"
            6) All other number populated to array as normal
            7) When array is populated print it out
            8) Utilize loops, variables and arrays
*/
# init array
$fizzBuzzArray = array();

# start i at 1 otherwise false positives at 0
for ($i = 1; $i <= 100; $i++)
{
    # need FizzBuzz first
    if (($i % 3 == 0) && ($i % 5 == 0))
    {
        array_push($fizzBuzzArray, 'FizzBuzz');
    } 
    # fizz check
    else if ($i % 3 == 0)
    {
        array_push($fizzBuzzArray, 'Fizz');
    }
    # buzz check
    else if ($i % 5 == 0)
    {
        array_push($fizzBuzzArray, 'Buzz');
    }   
    # push other nums to array 
    else 
    {        
    array_push($fizzBuzzArray, $i);
    } # end if block    
} # end for loop

var_dump($fizzBuzzArray); # post to browser for assignment reqs
/*
echo '<br><br>';
# readable print check 
foreach($fizzBuzzArray as $v)
{
    echo ($v . '<br>');
} 
*/ 
?>
