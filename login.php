<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="logo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-
             controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Sign In
          	<span class="sr-only">(current)</span>
					</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="top.php">Top Lists</a>
        </li>
				<li class="nav-about">
					<a class="nav-link" href="about.php">About</a>
				</li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-
             haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
		<div class="login">
			<h1>Login</h1>
			<form method = "GET" action="login.php">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="user_name" placeholder="Username" id="user_name" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
				<?php
				session_start();
				$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
				if (mysqli_connect_errno()) {
					exit('Failed to connect to MySQL: ' . mysqli_connect_error());
				}
				$sql = "SELECT id, user_name, password FROM USERS WHERE user_name
				LIKE {$_GET['user_name']}";
				if ($result = mysqli_query($connection, $sql)) {
					$info = mysqli_fetch_assoc($result);
					if ($_GET['password'] == $info['password']) {
						session_regenerate_id();
						$_SESSION['loggedin'] = TRUE;
						$_SESSION['name'] = $_GET['user_name'];
					} else {
						?>
						<div class="modal">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Invalid Combination</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true"></span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <p>Modal body text goes here.</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary">Save changes</button>
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
						<?php
					}

				mysqli_free_result($result);
			}
			?>
			</form>
		</div>
	</body>
</html>
