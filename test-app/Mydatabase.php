<?php

function DatabaseConnectReadOnly() {
    $servername = 'localhost';

    $config = parse_ini_file("app.env");

    $username = $config['readonly_username'];
    $password = $config['readonly_password'];
    $database = $config['database'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

function GetProducts($conn) {
    $query = "SELECT * FROM products;";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    $out = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($out, $row);
    }
    return $out;
}
// $conn = DatabaseConnectReadOnly();
// echo json_encode(GetProducts($conn));

?>