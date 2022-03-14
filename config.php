<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

config.php defines the variables to ensure that the application can connect
to the Unseen_Library SQL Database.
-->

<?php
 define('DBHOST', 'localhost');
 define('DBNAME', 'unseen_library');
 define('DBUSER', 'testuser');
 define('DBPASS', 'mypassword');
 define('DBCONNSTRING','mysql:dbname=unseen_library;charset=utf8mb4');
?>
