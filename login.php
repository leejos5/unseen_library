<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="bootstrap.css">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
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
          	<span class="sr-only"></span>
					</a>
        </li>
				<li class="nav-item">
					<a class="nav-link" href="profile.php">Profile</a>
				</li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="top.php">Top Lists</a>
        </li>
				<li class="nav-item">
					<a class="nav-link" href="social.php">Social</a>
				</li>
				<li class="nav-about">
					<a class="nav-link" href="about.php">About</a>
				</li>
      </ul>
    </div>
  </nav>
	<section id="about-header">
		<h1>Login and Signup</h1>
		<hr />
		<div>

		</div>
		<div id="illustrations-container">
			<div class="card border-primary mb-3">
	  		<div class="card-header">Login</div>

			  <form action = "signup.php" method ="post">
					<fieldset>
					<div class="form-group">
						<label for="user-name" class="form-label mt-4">Username</label>
						<input type="user-name" class="form-control" id="user-name" aria-describedby="usernameHelp" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="password" class="form-label mt-4">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password">
					</div>
					<br />
					<button type="submit" class="btn btn-primary">Login</button>
					</fieldset>
				</form>
			</div>
			<div class="card border-primary mb-3">
	  		<div class="card-header">Sign-Up</div>
				<form action = "signup.php" method ="post">
				  <fieldset>
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
				      <input type="email" class="form-control" name = "email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				    </div>
					<div class="form-group">
						 <label for="signupUsername" class="form-label mt-4">Username</label>
						 <input type="signupUsername" class="form-control" name ="user_name" id="signupUsername" placeholder="Username">
					</div>
					<div class="form-group">
						 <label for="signupFirstname" class="form-label mt-4">First_name</label>
						 <input type="signupFirstname" class="form-control" name = "first_name" id="signupFirstname" placeholder="First_name">
					</div>
					<div class="form-group">
						 <label for="signupLastname" class="form-label mt-4">Last_name</label>
						 <input type="signupLastname" class="form-control" name = "last_name" id="signupLastname" placeholder="Last_name">
					</div>
					<div class="form-group">
						 <label for="signupPhone" class="form-label mt-4">Phone</label>
						 <input type="signupPhone" class="form-control" name = "phone" id="signupPhone" placeholder="Phone">
					</div>
					<div class="form-group">
				      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
				      <input type="password" class="form-control" name ="password" id="exampleInputPassword1" placeholder="Password">
				    </div>
						<br />
						<button type="submit" name = "register" class="btn btn-primary">Sign up</button>
					</fieldset>
				</form>
			</div>
		</div>
	</section>
	</body>
</html>
