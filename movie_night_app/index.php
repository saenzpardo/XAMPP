<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Who's Turn To Pick?</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.bundle.js" type="text/javascript"></script>
        <?php 
            require_once __DIR__ . '/vendor/autoload.php'; # composer
            require_once 'database.php'; # database connection file

            $conn = DatabaseConnect();
        ?>
    </head>
    <body>

    <!-- database connection message  -->
    <?="<h2 style='color: lightblue; text-align: center;'>Connected to database |<em> $db_name</em> | successfully... </h1> ";?>
        
    <?="<h3 style='color: darkgray; text-align: center;'>* $numberOfRecords * database record(s) discovered:</h3>";?>

    <?php
        
        // if (mysqli_num_rows($result) > 0) {
        //     // output the data
        //     while($row = mysqli_fetch_assoc($result)) {
        //         echo ("<p style='color: white; text-align: center;'>" .$row["first_name"] . " | " . $row["movie_name"] . " | " . $row["date"] . "</p><br><br>");
        //     }
        // } else {
        //     echo "No results found";
        // }
    ?>

    <form style='text-align: center;' action="#" method="GET">
    <b style='color: white;'>Add a New Record</b><br>
    <select name="first_name">
    <option value="name1">Adam</option>
    <option value="name2">Katie</option>
    <option value="name3">Evelyn</option>
    <option value="name4">Alice</option>
    </select>
    <labe style='color: white;'>Movie</label><br>
    <input type="text" movie="movie" size="30" value="" />

    
    </form>

    

<div style='text-align: center;'>
<button>Add Record</button></div>


        
        <script src="" async defer></script>
    </body>
</html>