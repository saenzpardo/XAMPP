

 <?php
    require_once 'database.php';
    $conn = DatabaseConnectRead();

    $user = $_POST['member_id'];
    $movie = $_POST['movie_name'];
    // var_dump($user);
    // var_dump($movie);

    $sql = "INSERT INTO movie (movie_name, member_id) VALUES ('$movie', '$user');";

      

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      echo '<a href="index.php">Home Page</a>';
    
        
    ?>