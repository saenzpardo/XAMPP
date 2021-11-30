<?php
### Mr. Versaw -> I added an entry into my "web_order_db" to test these methods.  Let me know if you have seed data to use ###
### I think my relationships are correct, but not 100% ###

# composer link

use League\Plates\Template\Data;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';     
require_once 'common.php';               # db methods file

// header('Content-Type: application/json');       # content type JSON because API to get DB data

# create a new AltoRouter object
$router = new AltoRouter();
$router->setBasePath('/web-order-app');         # set root path

# endpoint
# map the products route
$router->map('GET', '/products', function($template){    # note to self does not work at /products/ only /products
    $conn = DatabaseConnect();
    // echo json_encode(GetProducts($conn));
    $products = GetProducts($conn);
    $template->addData(['products' => $products]); # php plates --> use to store
    echo $template->render('productlist');
});

# endpoint
# map the products route by productId
$router->map('GET', '/products/[i:id]', function($id, $template){
    $conn = DatabaseConnect();
    // echo json_encode(GetProductDetail($conn, $id));
    $productById = GetProductDetail($conn, $id);
    $template->addData(['productdetails'=> $productById]);
    echo $template->render('productdetails');
});

# endpoint
# map the login route
$router->map('GET', '/login', function($template){    # note to self does not work at /products/ only /products
    $conn = DatabaseConnect();
    # TODO: create login
    echo $template->render('login');
});

# endpoint
# map POST login route
$router->map('POST', '/login', function($template) {
    $conn = DatabaseConnect();

    #######
    # TODO: Add login code

    # Redirect
    header("Location: http://localhost/web-order-app/products");
});

# endpoint
# map the login route
$router->map('GET', '/register', function($template){    # note to self does not work at /products/ only /products
    $conn = DatabaseConnect();
    # TODO: create register
    echo $template->render('register');
});

# endpoint
# map POST register route
$router->map('POST', '/register', function($template) {
    $conn = DatabaseConnect();

    #######
    # TODO: Add register code

    # Redirect
    header("Location: http://localhost/web-order-app/products");
});

# endpoint
# map the orders route by userId
$router->map('GET', '/orders/[i:id]', function($id){
    $conn = DatabaseConnect();
   echo json_encode(GetOrders($conn, $id));
});

##################################################
#### ALTOROUTER CODE DO NOT DELETE/EDIT       ####
#### http://altorouter.com/usage/install.html ####
##################################################
// match current request url
$match = $router->match();

###############################################################
#### PHP Plates: http://platesphp.com/templates/overview/  ####
###############################################################
# php plates object
$templates = new League\Plates\Engine('templates');
$templates->addData(['alerts'=>GetAlerts()]); // initialize alerts and call GetAlerts method from common.php
// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    $match['params']['template'] = $templates;  // add this line for use of templates (php plates)
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
############################################
#### ALTOROUTER CODE DO NOT DELETE/EDIT ####
############################################

?>