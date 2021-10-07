<?php
# responsible for making database connection

# Create connection
function DatabaseConnect()
{
    # username, password and database name should be stored outside of webroot folder for security
    $servername = "localhost";

    # get config parsed from app ini file - relative path
    $config = parse_ini_file("../../webapp.env");

    # setup variables to hold corresponding parse_ini values
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

# store connection function in variable
// $connection = DatabaseConnect();

# Exercise 1
function GetProducts($conn) {

    $query = "SELECT * FROM products;";
    $statement= mysqli_prepare($conn, $query);
    mysqli_stmt_execute($statement);
    $result = mysqli_query($conn, $query); # places results from query into variable
    $row = mysqli_stmt_get_result($statement); # puts results into associative array

    $arrOut = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($arrOut, $row);
    }
    return $arrOut;
}

// echo "<h2>Exercise 1</h2>";
// $testGetProducts = GetProducts($connection);
// print_r($testGetProducts); # show results

# Excercise 2
function GetProductDetail($conn, $productId) {

    $query = "SELECT * FROM products, screenshots, productreviews
              WHERE screenshots.ProductId = products.ProductId
              AND productreviews.ProductId = products.ProductId
              AND ProductId = ?;";
    
    $statement = mysqli_prepare($conn, $query);    
    mysqli_stmt_bind_param($statement, "i", $productId);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    return array();
}

// echo "<h2>Exercise 2</h2>";
// echo "<br>";
// $testGetProductDetail = GetProductDetail($connection, 1);
// print_r($testGetProductDetail); # show results

# Exercise 3
function GetOrders($conn, $userId) {
    $query = "SELECT * FROM orders
              WHERE orders.userId = ?;";
      
    $statement = mysqli_prepare($conn, $query);    
    mysqli_stmt_bind_param($statement, 'i', $userId);
    mysqli_stmt_execute($statement);    
    $result = mysqli_stmt_get_result($statement);

    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }   
    return array();
}

// echo "<h2>Exercise 3</h2>";
// $testGetOrders = GetOrders($connection, 99);

# Exercise 4
function GetOrder($conn, $order) {
    $query = "SELECT * FROM orders, orderitems,
              WHERE orders.orderId = orderitems.orderId
              AND orders.orderId = ?;";

    $statement = mysqli_prepare($conn, $query);  
    mysqli_stmt_bind_param($statement, 'i', $order);
    mysqli_stmt_execute($statement);    
    $result = mysqli_stmt_get_result($statement);

    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }   
    return array();
}

// echo "<h2>Exercise 4</h2>";
// $testGetOrder = GetOrders($connection, 1);
// print_r($testGetOrder); # show results

?>