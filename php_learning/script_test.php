<?php

function f1(&$array_param)
{
  $array_param["a"] = "changed";
}
 
function f2($array_param)
{
  $return_arr = f1($array_param);
  return $return_arr;
}
 
$arr1 = ["a" => "Tadpole"];
$arr2 = ["a" => "Lily"];
 
$run1 = f1($arr1);
$run2 = f2($arr2);
 
echo $arr1["a"] . " " . $arr2["a"];

?>
