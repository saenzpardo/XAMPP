


# Notes for project using XAMPP with Klein and Composer 


Resources
Movies
People

Resources do not have to match the database 
Typical REST naming schemes


 /movies = Get all movies in the database
 /people = Get all the people
 /movies/{movieId} = Get the move with the movieId of {movieId}
 /people/{peopleId} = Get the person with the person id of {personId}

 /movies/{movieId}/people = Get all the people who worked on the movie with the movieId of {moveId}

 /people/{personId}/movies = Get all the movies the person has worked on with the person id of {personId}

 HTTP Methods
 GET = Default method - means you're reading an existing resource
 POST = Add new resource
 PUT = Update existing resource
 DELETE = Delete existing resource

Use Klein.php to handle routing
Composer uses this

## install Composer
move to parent directory and enter the following command:
composer require klein/klein
--> Change to altorouter

in composer.json add the following:
{
    "require": {
        "altorouter/altorouter": "1.1.0"
    }
}

## Rewrite request router
### Apache
In parent app directory create a file called .htaccess

RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php \[L]





