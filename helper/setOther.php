<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

setOther.php is a helper function for the social.php that sets the other user to
the selected username to ensure that the two can be compared.
-->

<?php
session_start();
$other = $_POST["username"];
$_SESSION['otherUser'] = $other;
header("Location: /unseen_library/social.php");
exit;

?>
