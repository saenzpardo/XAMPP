<?php
function helloWorld()
{
    echo("Hello World!");
    echo "<br>";
}
helloWorld();
helloWorld();

function helloWorlds($name)
{
    echo("Hello" . $name . "<br>");
    echo "<br>";
}
helloWorlds('Adam');

# use returns on functions - not echos
function hiWorlds($name)
{
    return "Hello" . $name . "<br>";
}

$out = hiWorlds("Adam");
echo($out);

?>
