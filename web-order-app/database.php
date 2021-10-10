<?php
### README  ###
/* 
DB IDs start at 1 except userID - userID starts at 99
database.php file is responsible for making database connection
and hosts the methods for the queries
*/

# Create connection
function DatabaseConnect()
{
    # username, password and database name stored outside of webroot folder for security
    $servername = "localhost";

    # get config parsed from app ini file - relative path
    $config = parse_ini_file("../../webapp.env");

    # setup variables to hold corresponding parse_ini values
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

# get all products
function GetProducts($conn) {   
    $query = "SELECT * FROM products;";

    $statement= mysqli_prepare($conn, $query);
    mysqli_stmt_execute($statement);    
    $result = mysqli_stmt_get_result($statement); 

    $arrOut = array();
    while($row = mysqli_fetch_assoc($result)) {     # puts results into associative array
        array_push($arrOut, $row);
    }    
    return $arrOut;
}

# get products by productId
function GetProductDetail($conn, $productId) {

    $query = "SELECT * FROM products, screenshots, productreviews
              WHERE screenshots.ProductId = products.ProductId
              AND productreviews.ProductId = products.ProductId
              AND products.ProductId = ?;";         # product ID starts at 1
    
    $statement = mysqli_prepare($conn, $query);    
    mysqli_stmt_bind_param($statement, "i", $productId);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    $arrOut = array();
    while($row = mysqli_fetch_assoc($result)) {     # puts results into associative array
        array_push($arrOut, $row);
    }
    return $arrOut;
}

# get orders by userId
function GetOrders($conn, $userId) {
    $query = "SELECT * FROM orders
              WHERE orders.userId = ?;";            # userId starts at 99
      
    $statement = mysqli_prepare($conn, $query);    
    mysqli_stmt_bind_param($statement, 'i', $userId);
    mysqli_stmt_execute($statement);    
    $result = mysqli_stmt_get_result($statement);

    $arrOut = array();
    while($row = mysqli_fetch_assoc($result)) {     # puts results into associative array
        array_push($arrOut, $row);
    }
    return $arrOut;
}

# get orders by orderId
function GetOrder($conn, $order) {
    $query = "SELECT * FROM orders, orderitems
              WHERE orders.orderId = orderitems.orderId
              AND orders.orderId = ?;";             # orderID starts at 1

    $statement = mysqli_prepare($conn, $query);  
    mysqli_stmt_bind_param($statement, 'i', $order);
    mysqli_stmt_execute($statement);    
    $result = mysqli_stmt_get_result($statement);

    $arrOut = array();
    while($row = mysqli_fetch_assoc($result)) {     # puts results into associative array
        array_push($arrOut, $row);
    }
    return $arrOut;
}

?>