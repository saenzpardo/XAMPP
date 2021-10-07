<?php
# a loop allows the same code executed many times in a row

$a = 2; 
$b = 3;

$c = $a * $b;
$c += $a * $b;
$c += $a * $b;
$c += $a * $b;
$c += $a * $b;

echo $c;
echo "<br />";

# while loops:
# while(condition) { /* Does as long as condition is true */ }

# count to 100
$i = 69;
while($i <= 69) {
   echo ($i . "<br>");
   # don't forget to increment!
   $i++;
}

# for loops
# for(initialization; condition; increment) { /* code to be done while condition is true */ }
for ($n = 69; $n <= 69; $n++) 
{
    echo ($n . " a<br />");
}

echo "<br />";

# looping arrays
# works well for indexed arrays
$array = array("cat", "ball", "fish");

for ($num = 0; $num < count($array); $num++) 
{
    echo ($array[$num]);
    echo "<br />";    
}

echo "<br />";

# associative arrays:
$items = array();
$items[0] = "dog";
$items[2] = "stick";
$items[4] = "squirrel";

# foreach($array as $value) { /* loop only works for arrays */ }
foreach($items as $word) {
    echo ("$word <br>");
}

echo "<br />";

# foreach($array as $key => $value) {}
foreach($items as $k => $v)
{
    echo ($k . " " . $v . "<br>");
}
 
?>