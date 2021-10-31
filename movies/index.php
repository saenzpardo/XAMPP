<?php

#### 38.22 ####

#UI rest

require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';
//header('Content-Type: application/json'); 

# AltoRouter object
$router = new AltoRouter();      
$router->setBasePath('/movies');



# endpoint
# map the people route
$router->map('GET', '/movies', function($template){
    $conn = DatabaseConnectReadOnly();    
  //  echo json_encode(FetchAllMovies($conn));
    $movies = FetchAllMovies($conn);
    $template->addData(['movies' => $movies]); # php plates --> use to store data
    echo $template->render('movielist');
});

$router->map('POST', '/movies', function($template){
    $conn = DatabaseConnect();    
    $name = $_REQUEST['Name'];

    echo json_encode(AddMovie($conn, $name));
});

$router->map('GET', '/movies/new', function($template){
    echo $template->render('newmovie'); // draw NewMovie template
});
# process requests
// match current request url
$match = $router->match();
# php plates object
$templates = new League\Plates\Engine('templates');

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    $match['params']['template'] = $templates;  // add this line for use of templates (php plates)
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

#header('Content-Type: application/json');

?>