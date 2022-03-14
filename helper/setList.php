<?php
session_start();
$_SESSION['curr_list'] = $_POST['list'];
header("Location: /unseen_library/search.php");
exit;
?>
