<!--
Name: Rin Pham
Date: March 13, 2022
Section: TCSS 445 A

Session.php helps end the user session through its username.
-->

<?php session_start();
if (isset($_SESSION['user_name'])){
unset($_SESSION['user_name']);
}
?>
