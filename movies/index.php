<?php

#### 38.22 ####

#UI rest

require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';
//header('Content-Type: application/json'); 

# AltoRouter object
$router = new AltoRouter();      
$router->setBasePath('/movies');

# plates object
global $templates;
$templates = new League\Plates\Engine('templates');

# endpoint
# map the people route
$router->map('GET', '/movies', function(){
    # Code goes here
    
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchAllMovies($conn));
});


$router->map('GET', '/movies/new', function(){
    # Add new movies
    // $html = "<html><body><form action='/movies/movies' method='POST'>";
    // $html .= "Name: <input type='text' name='movie_name'><br>";
    // $html .= "<button type='submit'>Submit</button>";
    // $html .= "</form></body></html>";
    // echo $html;
    global $templates;
    echo $templates->render('newMovie');

});
# process requests
// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

#header('Content-Type: application/json');

?>