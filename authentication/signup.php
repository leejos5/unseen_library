<!--
Name: Rin Pham, Joshua Lee
Date: March 13, 2022
Section: TCSS 445 A

Signup.php handles a user's form to create a new user account in the database.
It ensures that only an account with a unique username can be created.
-->

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
    $year_of_birth = $_POST['year_of_birth'];

    $sql ="INSERT INTO `users` (`user_name`, `first_name`, `last_name`, `email`, `phone`, `password`, `year_of_birth`)
    VALUES ('$username','$First_name','$Last_name','$email','$phone','$password', $year_of_birth)";
    # Inserts the user into the users table with the given values.

    if ($conn->query($sql) == TRUE) {
        echo '<script>alert("Registration was successful!");Location="profile.php"</script>';
    } else {
        echo '<script>alert("An error was encountered. Please try again.");Location="login.php"</script>';
    }
}
$conn->close();
?>
