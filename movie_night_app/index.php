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
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom-css.css">
        <?php
            require_once 'database.php';
        ?>
    </head>
    <body>
    <div class='container'>
        <div class='jumbotron'>           
        <h1 class='header'>WHO'S TURN IS IT??</h1>
        </div>    
    </div>
    <div class='container'>
        <div class='row'>
            <div class='col'>
               <article>
                   <p>This site has been written to keep track of who got to pick the last movie during movie/pizza night.</p>
                </article> 
            </div>
            <div class='col'>
                <article>
                    <p>It was written in HTML5/CSS and the database connection was made with PHP</p>
                </article>               
            </div>
        </div>                   
    </div>    
    <div class='container m-lg-2'>      
                <?php
                   $conn = DatabaseConnectRead();
                    // write statement
                    $sql = "SELECT * FROM movie 
                    LEFT JOIN members ON movie.member_id = members.member_id 
                    ORDER BY date;";

                    $result = mysqli_query($conn, $sql);
                    $numberOfRecords = mysqli_num_rows($result);
                    if($result) {
                        echo '<table class="table table-striped">
                        <thead style="font: bold;">
                        <tr><td><b>Name</b></td>
                        <td><b>Movie</b></td>
                        <td><b>Date</b></td></tr></thead>';
                        echo '<tbody';
                   while($row = mysqli_fetch_assoc($result)) {
                       
                       echo "<tr><td>" . $row['first_name'] .
                            "</td><td>" . $row['movie_name'] . 
                            "</td><td>" . $row['date'] .
                            "</td></tr>";
                       }
                       echo '</tbody></table>';
                    }
                ?>                      
    </div>    
   
    <div class='container'>
        <h3 class=''>Add a new record</h3>
    </div>
    
    <div class='container'>  
        <form action="add-record.php"name="insert" method="POST">
            <select class='form-select' name="member_id">
                <option value="1">Adam</option>
                <option value="2">Katie</option>
                <option value="3">Evelyn</option>
                <option value="4">Alice</option>
            </select>
        </form>
    </div>
<div class='container'>
<div class="container">
    <form action="add-record.php" name="movie-name" method="POST">
        <label>Movie Name:</label>
        <input type="text" name="movie_name">       
    </form>
</div>
<button type="submit" action="add-record.php" class="btn btn-primary" method="POST">Add Record</button>
</div>




        
        <script src="" async defer></script>
    </body>
</html>