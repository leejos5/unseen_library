<!--
Name: Rin Pham
Date: March 13, 2022
Section: TCSS 445 A

connect.php helps establish a database connection to the Unseen_Library database .
-->
<?php
$servername = "localhost";
$username = "testuser";
$password = "mypassword";
$dbname = "unseen_library";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
//$connect = mysqli_connect ('localhost', 'root', '', 'data') or die ('Không thể kết nối tới database');
//mysqli_set_charset($conn, 'UTF8');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
?>
