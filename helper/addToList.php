<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

addToList.php is a helper function that will add a selected book from the search
results to the selected list. It checks to make sure duplicate books are not added.
-->

<?php
session_start();
require_once($_SESSION['wd'] . '/config.php');
$list_id = $_SESSION['curr_list'];
$bookid = $_POST['bookid'];
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
  die(mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION['curr_list'])) {
    $sql = "SELECT book_id, list_id FROM reading_list_entries r WHERE r.list_id = ${list_id} AND r.book_id = ${bookid}";

    $result = mysqli_query($connection, $sql);
    if ($result->num_rows == 0) {
      $sql = "INSERT INTO Reading_List_Entries (List_id, Book_id) VALUES
      (${list_id}, ${bookid})";
      # Inserts the given book id and list id into the Reading_List_Entries table.
      # Creates a new reading list entry of book book_id in list list_id.

      $result = mysqli_query($connection, $sql);
      echo '<script>alert("Succesfully added to the reading list.");location="/unseen_library/search.php";</script>';
      unset($_SESSION['curr_list']);
    } else {
      echo '<script>alert("The book is already in the list!");location="/unseen_library/search.php";</script>';
    }
  } else {
    echo '<script>alert("Please select a reading list.");location="/unseen_library/search.php";</script>';
  }
}
?>
