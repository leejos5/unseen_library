<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>
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
          	<a class="nav-link" href="login.php">Sign In</a>
        	</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile
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
	</body>
</html>
