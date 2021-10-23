

<?php

# Create connection 
# this connection will allow read, write, update and delete
function DatabaseConnect()
{
    # this is where you should store your username, password and database name

    $servername = "localhost";
    # get config parsed from app ini file - relative path

    $config = parse_ini_file("../../app.env");

    # setup variables
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    # Check connection
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }     
    return $conn;
}


function DatabaseConnectRead() {
    $servername = "localhost";
    $username = "movie_user";
    $password = "S2yV43uTx5egr9gl";
    $db_name = "movie-night";

    # Create Connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    # Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
// $servername = "localhost";
// $username = "movie_user";
// $password = "S2yV43uTx5egr9gl";
// $db_name = "movie-night";

// # Create Connection
// $conn = mysqli_connect($servername, $username, $password, $db_name);

// # Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }


# method to get movies
function FetchAllMovies($conn) {
    
    $query = "SELECT * FROM movie 
              LEFT JOIN members ON movie.member_id = members.member_id 
              ORDER BY date;";
    $statement = mysqli_prepare($conn, $query);
   # $id = 1;
   # mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement); 

    $out = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }   
    return $out;
}

?>
