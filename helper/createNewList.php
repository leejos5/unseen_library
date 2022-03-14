<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

createNewList.php will create a new list with the given list name. The list name
must be unique to the user's reading list names.
-->
<?php
session_start();
require_once($_SESSION['wd'] . '/config.php');
$list_name = str_replace("'", "''", $_POST['list-name']);
$user_id = $_SESSION['user_id'];
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
  die(mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($list_name)) {
    $sql = "SELECT list_id FROM reading_lists WHERE name LIKE '${list_name}' AND user_id = ${user_id}";
    # Selects the list id from reading_lists with the given user id and list name.
    # Used to check for existing lists with the given name under the same user.

    $result = mysqli_query($connection, $sql);
    if ($result->num_rows == 0) {
      $sql = "INSERT INTO reading_lists (name, user_id) VALUES ('${list_name}', ${user_id})";
      # Inserts the given values into the reading_lists table.
      # Creates a new reading list for the user.

      $next = mysqli_query($connection, $sql);
      echo '<script>alert("Successfully created the reading list.");location="/unseen_library/profile.php"</script>';
    } else {
      echo '<script>alert("You already have a reading list with that name.");location="/unseen_library/profile.php"</script>';
    }
  } else {
    echo '<script>alert("An error occurred. Please try again later.");location="/unseen_library/profile.php"</script>';
  }
}
