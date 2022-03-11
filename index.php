<?php require_once('config.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<div>
			<meta charset="UTF-8">
      		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="bootstrap.css">
	</head>
	<body style = "background-image: url('librarypro.png')">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<img src="newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
  						<a class="nav-link" href="login.php">Sign In</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profile.php">Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="search.php">Search</a>
		        </li>
						<li class="nav-item">
							<a class="nav-link" href="social.php">Social</a>
						</li>
            <li class="nav-about">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </li>
      </ul>
      </div>
</nav>
		 <div class="jumbotron">
               <h1 class="display-4">Welcome to Unseen Library</h1>

         		  		<br />

         		 	 <div class="illustrations-container">
         				<img class="about" src="Alice.jpg"/>
         				<img class="about" src="TTTH.jpg" />
         				<img class="about" src="lastman.jpg"  />
         				<img class="about"src=
         					"Mastersofhorror.jpg"/>
         				<img class="about" src="Rabbit.jpg"  />
         			</div>

               <p class="lead">Choose any genre you like, read your favorite book from your favorite bookstores or libraries.
               Create friendships to readers like you, rate your best books and best authors of the year. </p>
         			<div class="illustrations-container">
         				<img class="about" src="storm.jpg"  />
         				<img class="about" src="womaninwhite.jpg"/>
         				<img class="about" src="Wuthering.jpg"  />
         				<img class="about" src="treasure.jpg"  />
         				<img class="about" src="Prisoner.jpg"  />
         			</div>
      <hr class="my-4">
            <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Thank You</a>
      </p>
    </div>
</body>
</html>
