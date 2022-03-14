<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

LeaveReview.php is a helper function that will add a given rating/review
to the selected book.
-->

<?php
session_start();
require_once($_SESSION['wd'] . '/config.php');
$book_id = $_POST['book_id'];
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$review = $_POST['review'];
$rating = $_POST['rating'];
if (mysqli_connect_errno()) {
  die(mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM book_ratings WHERE book_id =
            ${book_id} AND user_id = {$_SESSION['user_id']}";
    # Selects the entry id from all of the reading list entries with the given book and list id.
    # Used to check if a review for the book by the user already exists.

    $result = mysqli_query($connection, $sql);
    if ($result->num_rows == 0) {
      $sql = "INSERT INTO book_ratings (book_id, user_id, review, rating) VALUES
      (${book_id}, {$_SESSION['user_id']}, '${review}', ${rating})";
      # Inserts the given book id and list id into the Reading_List_Entries table.
      # Creates a new reading list entry of book book_id in list list_id.

      $result = mysqli_query($connection, $sql);
      echo '<script>alert("Succesfully left a review. Thank you for your input!");location="/unseen_library/profile.php";</script>';
      unset($_SESSION['curr_list']);
    } else {
      echo '<script>alert("You already left a review for this book!");location="/unseen_library/profile.php";</script>';
    }
  } else {
    echo '<script>alert("We ran into an error. Please try again.");location="/unseen_library/profile.php";</script>';
  }
}
?>
