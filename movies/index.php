<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';
require_once 'common.php';
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

# endpoint add movie
$router->map('POST', '/movies', function($template){
    $conn = DatabaseConnect();    
    $name = $_REQUEST['Name'];
    $description = $_REQUEST['Description'];
    # Add movie
    AddMovie($conn, $name, $description);

    # Set message   
    AddAlert("Movie added successfully");

    # Redirect 
    header("Location: http://localhost/movies/movies"); // will need changed if moved off localhost
});

# endpoint login
$router->map('GET', '/login', function($template) {
    echo $template->render('login');
});

# endpoint register
$router->map('GET', '/register', function($template) {
    echo $template->render('register');
});

# endpoint POST register
$router->map('POST', '/register', function($template) {
    $conn = DatabaseConnect();

    ##############
    #### 22:03 ###
    ##############
    
    #pull 

    $displayName = $_REQUEST['displayName'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirmPassword = $_REQUEST['confirmPassword'];

    # validation
    if(strlen(trim($displayName)) == 0) {
        AddAlert("No display name entered");
        header("Location: http://localhost/movies/register");
        return;
    }

    AddAlert("Registration Successful");

    # Redirect 
    header("Location: http://localhost/movies/movies"); // will need changed if moved off localhost

});

$router->map('GET', '/movies/new', function($template){
   
    echo $template->render('newmovie'); // draw NewMovie template
   
});
# process requests
// match current request url
$match = $router->match();
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


?>