<?php
require_once('config.php');
session_start();
$list_id = $_SESSION['curr_list'];
$book_id = $_POST['book_id'];
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
  die(mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION['curr_list'])) {
    $sql = "SELECT entry_id FROM Reading_List_Entries WHERE book_id =
            ${book_id} AND list_id = ${list_id}";
    $result = mysqli_query($connection, $sql);
    if ($result->num_rows == 0) {
      $sql = "INSERT INTO Reading_List_Entries (List_id, Book_id) VALUES
      (${list_id}, ${book_id})";
      $result = mysqli_query($connection, $sql);
      echo '<script>alert("Succesfully added to the reading list.");location="search.php";</script>';
      unset($_SESSION['curr_list']);
    } else {
      echo '<script>alert("The book is already in the list!");location="search.php";</script>';
      unset($_SESSION['curr_list']);
    }
  } else {
    echo '<script>alert("Please select a reading list.");location="search.php";</script>';
  }
}
?>