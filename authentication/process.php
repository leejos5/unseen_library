<!--
Name: Rin Pham, Joshua Lee
Date: March 13, 2022
Section: TCSS 445 A

process.php is used to handle form validation for a user attempting to log-in.
It checks the users input against the existing user values in the database and
starts a session if their login succeeds.
-->

<?php
    session_start();
    header('Content-Type: text/html; charset=utf8mb4');

    if (isset($_POST['login']))

    include('connect.php');

    $username = addslashes($_POST['user_name']);
    $password = addslashes($_POST['password']);

    if (!$username || !$password) {
        echo '<script>alert("Please enter both username and password.");location="login.php"</script>';
    exit;
    }


    //$password = md5($password);


    $query = "SELECT * FROM users WHERE user_name ='$username'";


    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if (!$result) {
        echo '<script>alert("You entered wrong user or wrong password!");location="login.php"</script>';
    }

    $row = mysqli_fetch_array($result);

    if ($password != $row['password']) {
      echo '<script>alert("You entered wrong user or wrong password!");location="login.php"</script>';
    exit;
    }


    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_fname'] = $row['first_name'];
    $_SESSION['user_lname'] = $row['last_name'];
    $_SESSION['user_phone'] = $row['phone'];
    $_SESSION['user_age'] = $row['age'];
    echo '<script>alert("Login successful!");location="/unseen_library/index.php"</script>';
    //die();
    $connect->close();

?>
