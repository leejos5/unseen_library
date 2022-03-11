<?php
$servername = "localhost";
$username = "testuser";
$password = "mypassword";
$dbname = "unseen_library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["register"])) {
   
    $username   = $_POST['user_name'];
    $First_name = $_POST['first_name'];
    $Last_name  = $_POST['last_name']; 
    $email      = $_POST['email']; 
    $phone      = $_POST['phone'];
    $password   = $_POST['password'];
    
    $sql ="INSERT INTO `users` (`user_name`, `first_name`, `last_name`, `email`, `phone`, `password`) 
    VALUES ('$username','$First_name','$Last_name','$email','$phone','$password')";
    if ($conn->query($sql) === TRUE) {
        echo "You had registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

