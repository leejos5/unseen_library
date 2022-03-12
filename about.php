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
						<a class="nav-link" href="profile.php">Profile</a>
					</li>
        	<li class="nav-item">
          	<a class="nav-link" href="search.php">Search</a>
        	</li>
					<li class="nav-item">
						<a class="nav-link" href="social.php">Social</a>
					</li>
					<li class="nav-about">
						<a class="nav-link" href="about.php">About
							<span class="sr-only">(current)</span>
						</a>
					</li>
      	</ul>
    	</div>
  	</nav>
		<section id="about-header">
			<h1>About Unseen Library</h1>
			<hr />
			<div>
				<p id="about-body">
				Unseen Library was developed to make searching and discovering your favorite book easier. We aimed to create a system that
				makes the search for the right title simpler by combining the libraries of public and private bookstores and libraries into
				a single database so you only have to look in one place.
				</p>
				<p>
				The goal that we would like to achieve is to build an “Unseen Library”
				 that connects databases/resources from many different bookstores or libraries. The library's systems are becoming overlooked
				 and underutilized, so it’s important we promote this resource in both the private and public sphere. We also want to build a
				 “place” that students can find, review and share resources with each other. Additionally, by connecting many bookstores/libraries,
				 users can find which location is the closest, and compare prices between bookstores.
			 </p>
		 </div>
		 <br />
		 <div id="illustrations-container">
			 <div class="cemtered">
				<img class="about" src="img/library.png"  />
				<h4>Public Libraries</h4>
			 </div>
			 <img id="plus" src="plus.png" />
			 <div>
				<img class="about" src="img/bookstore.png" />
				<h4>Private Bookstores</h4>
			 </div>
			 <img id="equal" src="img/equal.png" />
			 <div>
				<img class="about" src="img/newnewlogo.png" />
			 </div>
		 </div>
		</section>
		<section id="about-header">
			<h1>Team</h1>
			<hr />
			<div>
				<p id="team-body">
				Unseen Library was developed by a team of developers in the TCSS 445 Database Design class. It's members include:
				</p>
				<ul>
					<li>
						Joshua Lee
					</li>
					<li>
						Cordel Hampshire
					</li>
					<li>
						Lidiya Abose
					</li>
					<li>
						Rin Pham
					</li>
				</ul>
		 </div>
		</section>
		<section id="about-header">
			<h1>Disclaimer</h1>
			<hr />
			<div>
				<p id="discliamer-body">
				Unseen Library is a course project for the TCSS 445A Database Design Class with Professor Eyhab-Al Masri.
				The program demonstrates the creation of a relational database. All images used are under creative
				 commons licenses.
				</p>
		 </div>
		</section>
	</body>
</html>
