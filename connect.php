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