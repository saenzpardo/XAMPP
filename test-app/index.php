<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'Mydatabase.php';
header('Content-Type: application/json');

$router = new AltoRouter();
$router->setBasePath('/test-app');



$router->map('GET', '/products', function(){
    $conn = DatabaseConnectReadOnly();
    
    
    echo json_encode(GetProducts($conn));
});



// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

?>