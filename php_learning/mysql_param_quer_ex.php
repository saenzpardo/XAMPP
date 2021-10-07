<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Night</title>

    <!-- Bootstrap CDN 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" >
     JavaScript Bundle with Popper
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />
</head>
<body>

<!-- Prepared statements / parameterized queries -->
<?php

$servername = "localhost";
$username = "movie_user";
$password = "S2yV43uTx5egr9gl";
$db_name = "movienight";

# Create Connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

# Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// write statement
$sql = "SELECT * FROM movies WHERE movieID = ?;";
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($statement, 'd', $movieId);
$movieId = 0;


$result = mysqli_stmt_execute($statement);
if(!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$numberOfRecords = mysqli_stmt_affected_rows($statement);



if (mysqli_num_rows($statement) > 0) {
    // output the data
    while($row = mysqli_fetch_assoc($statement)) {
        echo ("<p style='color: white; text-align: center;'>" .$row["first_name"] . " | " . $row["movie_name"] . " | " . $row["date"] . "</p><br><br>");
    }
} else {
    echo "No results found";
}

?>

<form style='text-align: center;' action="#" method="GET">
    <b style='color: white;'>Add a New Record</b><br>
    <select name="first_name">
    <option value="name1">Adam</option>
    <option value="name2">Katie</option>
    <option value="name3">Evelyn</option>
    <option value="name4">Alice</option>
    </select>
    <labe style='color: white;'>Movie</label><br>
    <input type="text" movie="movie" size="30" value="" />

    
    </form>

    

<div style='text-align: center;'>
<button>Add Record</button></div>

    
</body>
</html>