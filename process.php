<?php
    session_start();
    header('Content-Type: text/html; charset=utf8mb4');

    if (isset($_POST['login']))

    include('connect.php');
    
    $username = addslashes($_POST['user_name']);
    $password = addslashes($_POST['password']);
    
    if (!$username || !$password) {
        echo "Please enter both username and password <a href='javascript: history.go(-1)'>Back</a>";
    exit;
    }
  

    $password = md5($password);
  

    $query = "SELECT user_name, password FROM users WHERE user_name ='$username'";
    

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if (!$result) {
        echo "You entered wrong user or wrong password!";
    } else {
        echo "Login sucessfully!";
    }
  

    $row = mysqli_fetch_array($result);
    
    if ($password != $row['password']) {
    echo "You enter a wrong password, please enter again <a href='javascript: history.go(-1)'>Back</a>";
    echo "$row";
    exit;
    }
  

    $_SESSION['user_name'] = $username;
    echo "Hi <b>" .$username . "</b>. You login successfully <a href=''>Exit</a>";
    die();
    $connect->close();
    
?>