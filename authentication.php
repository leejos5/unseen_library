<?php
require_once('config.php');
session_start();
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL: ' . mysqli_conect_error());
}
