<?php
session_start();
$other = $_POST["username"];
$_SESSION['otherUser'] = $other;
header("Location: social.php");
exit;

?>
