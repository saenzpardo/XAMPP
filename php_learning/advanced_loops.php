<?php

# advanced loops
$term = "cat";
$items = array("cat", "dog", "bone", "fish", "bird", "cat");
$counter = 0;
for($i = 0; $i < count($items); $i++ )
{
    if($items[$i] === $term) { $counter++; }
}

echo ("Number of matches for ". $term . ": " . $counter);
echo "<br>";

# Indexed, associative and multi-dimensial (nested) arrays
$studentInfo = array('Fname'=>'Bob', 'Lname'=>'Joe');
$students = array(
    array('FName'=>'Bob', 'LName'=>'Joe', 'Grades'=>array(0, 50, 80, 90)),
    array('FName'=>'Adam', 'LName'=>'Saenzpardo', 'Grades'=>array(90, 80, 70, 50)),
    array('FName'=>'John', 'LName'=>'Doe', 'Grades'=>array()),
    array('FName'=>'Evelyn', 'LName'=>'Saenzpardo', 'Grades'=>array(90, 80, 70, 50)));
    var_dump($students);
    echo "<br>";
    echo ($students[0]['FName']);
    echo "<br>";
    echo ($students[1]['LName']);
    echo "<br>";
    echo($students[0]['Grades'][1]);
    echo "<br>";
    echo "<br>";

# We want to display average grade for every student
# Average = SUM/COUNT
# multi-nested loop - first loop loops through the student records
foreach($students as $studentGrade)
{
    # variable to hold the student grades using the 'Grades' key
    $grades = $studentGrade['Grades'];

    # divide by zero check with nested if statement
    if(count($grades) > 0)
    {
        $gradeSum = 0;    
        # second loop to loop through all the grades in the nested array
        foreach($grades as $value)
        {
            # add the grades all together for each array
            $gradeSum += $value;
        }
        # average total grades using built-in count function
        $gradeAvg = $gradeSum / count($grades);
        # format data and display for user
        echo($studentGrade['FName'] . ' ' . $studentGrade['LName'] . ' average grade is: ' . $gradeAvg . '<br>');
    }   
}

# alternate method:
# you should avoid more than two nests - either create function or 
# change true condition to not condition or greater than 0 with continue or break for loop
# break leaves loop completely 
# continue goes to next iteration

foreach($students as $studentGrade)
{
    # variable to hold the student grades using the 'Grades' key
    $grades = $studentGrade['Grades'];

    # divide by zero check
    if(count($grades) <= 0)
    {        
        continue; # goes to next iteration immediately if 0 condition exists
    }   
    $gradeSum = 0;    
    # second loop to loop through all the grades in the nested array
    foreach($grades as $value)
    {
        # add the grades all together for each array
        $gradeSum += $value;
    }
    # average total grades using built-in count function
    $gradeAvg = $gradeSum / count($grades);
    # format data and display for user
    echo($studentGrade['FName'] . ' ' . $studentGrade['LName'] . ' average grade is: ' . $gradeAvg . '<br>');        
}

?>