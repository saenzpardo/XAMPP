<?php
### Mr. Versaw -> I added an entry into my "web_order_db" to test these methods.  Let me know if you have seed data to use ###
### I think my relationships are correct, but not 100% ###

# composer link
require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';     
require_once 'common.php';               # db methods file

header('Content-Type: application/json');       # content type JSON because API to get DB data

# create a new AltoRouter object
$router = new AltoRouter();
$router->setBasePath('/web-order-app');         # set root path

# endpoint
# map the products route
$router->map('GET', '/products', function(){    # note to self does not work at /products/ only /products
    $conn = DatabaseConnect();
    echo json_encode(GetProducts($conn));
});

# endpoint
# map the products route by productId
$router->map('GET', '/products/[i:id]', function($id){
    $conn = DatabaseConnect();
    echo json_encode(GetProductDetail($conn, $id));
});

# endpoint
# map the orders route by userId
$router->map('GET', '/orders/[i:id]', function($id){
    $conn = DatabaseConnect();
    echo json_encode(GetOrders($conn, $id));
});

############################################
#### ALTOROUTER CODE DO NOT DELETE/EDIT ####
############################################
// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
############################################
#### ALTOROUTER CODE DO NOT DELETE/EDIT ####
############################################

?>