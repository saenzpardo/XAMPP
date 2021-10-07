<?php

# composer link
require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php'; # db methods file

header('Content-Type: application/json'); # content type JSON because API to get DB data

$router = new AltoRouter();
$router->setBasePath('/web-order-app');

# endpoint
# map the products route
$router->map('GET', '/products', function(){
    $conn = DatabaseConnect();
    echo json_encode(GetProducts($conn));
});

# endpoint
# map the products route by productId
$router->map('GET', '/products/[i:id', function($id){
    $conn = DatabaseConnect();
    echo json_encode($conn, $id);
});

# endpoint
# map the orders route by userId
$router->map('GET', '/orders/[i:id]', function($id){
    $conn = DatabaseConnect();
    echo json_encode($conn, $id);
});



?>