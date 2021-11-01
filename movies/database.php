<?php 

# responsible for making database connection

# parameterized query explained:
# $statement = mysqli_prepare($connection, $query) -- prepare SQL statement
# mysqli_stmt_bind_param($statement, "data-type", $parameter) -- bind parameter to SQL
# mysqli_stmt_execute($statement) -- executes the query statement
# $result = mysqli_stmt_get_results($statment) -- fetches the result of the statement

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

# connect to databse - read only based on DB user permissions
function DatabaseConnectReadOnly()
{
    # this is where you should store your username, password and database name

    $servername = "localhost";
    # get config parsed from app ini file - relative path

    $config = parse_ini_file("../../app.env");

    # setup variables
    $username = $config['readonly_username'];
    $password = $config['readonly_password'];
    $database = $config['database'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    # Check connection
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }     
    return $conn;
}

# method to get movies
function FetchAllMovies($conn) {
    
    $query = "SELECT * FROM movies;";
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

# method to get all people
function FetchAllPeople($conn) {
    $query = "SELECT * FROM people;";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement); 

    $out = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }   
    return $out;
}

# method to get movie by ID
function FetchMovieId($conn, $id) {
    $query = "SELECT * FROM movies WHERE movieId = ?;";
    $statement =  mysqli_prepare($conn, $query);
    # bind parameters to statement
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    $out = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }
    return $out;
} 

# method to get person by ID
function FetchPersonId($conn, $id) {
    $query = "SELECT * FROM people WHERE Id = ?;";
    $statement = mysqli_prepare($conn, $query);
    # bind parameters to statement
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    $out = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }
    return $out;
}

## non-working example due to database table naming - for reference only ##

# method to get movies based on person Id
function FetchMoviesForPerson($conn, $id) {
    $query = "SELECT cast.Name AS 'Casted As', movies.Name AS 'In Movie' 
              FROM cast, movies WHERE cast.personId = ? 
              AND movies.movieId = cast.moviesId;";
    
    $statement = mysqli_prepare($conn, $query);
    #bind parameters to statement
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    $out = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }
    return $out;
}

# post methods:
function AddMovie($conn, $name, $description) {
    $query = "INSERT INTO movies (name, description) VALUES (?,?);";
    $statement = mysqli_prepare($conn, $query);
    # bind parameters to statement
    mysqli_stmt_bind_param($statement, "ss", $name, $description);
    mysqli_stmt_execute($statement); 
}

function DeleteMovie($conn, $id) {
    # DELETE FROM
    $query = "DELETE FROM movies WHERE movieId = ?;";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
}

function DeletePerson($conn, $id) {
    $query = "DELETE FROM people WHERE Id = ?;";
    $statement = mysqli_prepare($conn, $query);
    #bind parameters to statement
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
}


# call database connection method and assign to variable
$connection = DatabaseConnect();

# call query method 
FetchAllMovies($connection);


?>