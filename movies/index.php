<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';
header('Content-Type: application/json'); 

$router = new AltoRouter();      
$router->setBasePath('/movies');

# endpoint
# map the people route
$router->map('GET', '/movies', function(){
    # Code goes here
    
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchAllMovies($conn));
});

# post
# endpoint
# map the people POST route
$router->map('POST', '/people', function(){    
    $conn = DatabaseConnect();

    print_r($_REQUEST);

    $name = $_REQUEST['Name'];
    echo json_encode(AddMovie($conn, $name));
});

# endpoint
# map the people route
$router->map('GET', '/people', function(){
    # Code goes here
    
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchAllPeople($conn));
});

#endpoint
# map to the movie ID route
$router->map('GET', '/movies/[i:id]', function($id) {
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchMovieId($conn, $id));

});

#enpoint
# map to the person ID route
$router->map('GET', '/people/[i:id]', function($id) {
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchPersonId($conn, $id));
});

#endpoint
# map to delete the person ID
$router->map('DELETE', '/people/[i:id]', function($id) {
    $conn = DatabaseConnect();
    
   # print_r($_REQUEST);   

    echo json_encode(DeletePerson($conn, $id));
});

# endpoit
$router->map('GET', '/people/[i:id]/movies', function($id) {
    $conn = DatabaseConnectReadOnly();
    echo json_encode(FetchMoviesForPerson($conn, $id));
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