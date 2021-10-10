

 <?php
    require_once 'database.php';
    $conn = DatabaseConnectRead();

    $user = $_POST['member_id'];
    $movie = $_POST['movie_name'];

    $sql = "INSERT INTO movie (movie_name) VALUES ($movie) AND INSERT INTO members (member_id) VALUES ($user);";
    $sql2 = "INSERT INTO members (member_id) VALUES ($user); ";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    
        
    ?>