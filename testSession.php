
<?php // THIS FILE MAKES A SESSION USED FOR DEBUGGING OTHER PAGES
session_start();
$_SESSION['user_id'] = 45;
$_SESSION['user_name'] = "Rlum";
$_SESSION['user_email'] = "Rlum@gmail.com";
$_SESSION['user_fname'] = "Roger";
$_SESSION['user_lname'] = "Lum";
$_SESSION['user_phone'] = "2069843030";
$_SESSION['user_age'] = "19";
$_SESSION['user_bd'] = "12-26-1999";// TEHRE IS NO AGE IN THE DB
header("Location: index.php");
exit;
?>
