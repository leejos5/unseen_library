<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

Logout.php is an authentication function that helps end the current user
session and remove any session variables.
-->
<?php
session_start();
session_destroy();
header("Location: /unseen_library/index.php");
?>
