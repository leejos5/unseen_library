<?php
session_start();
session_destroy();
header("Location: /unseen_library/index.php");
?>
