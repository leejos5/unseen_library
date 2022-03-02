<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
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
          <a class="nav-link" href="search.php">Search
            <span class="sr-only">(current)</span>
          </a>
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
		<div class="search">
			<h1>Libraries Search</h1>
			<form method = "GET" action="search.php">
        <div>
          <input type="radio" id="book-radio" value="book" name = "search-type"/>
          <label for="book-radio">Books</label>
        </div>
        <div>
          <input type="radio" id="location-radio" value="location" name = "search-type"/>
          <label for="location-radio">Locations</label>
        </div>
        <div>
          <input type="text" id="title" name="search-name" placeholder="Search for a title..."/>
          <input type="text" id="author" name="search-author" placeholder="Author Name" />
        </div>
        <select name = "min-rating">
          <option selected>Minimum Rating</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <select name = "genre">
          <option selected>Select a Genre</option>
          <?php
          $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
          if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
          }
          $sql = "SELECT DISTINCT Genre FROM Books";
          if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['Genre'] . '">';
              echo $row['Genre'];
              echo "</option>";
            }
            mysqli_free_result($result);
          }
          ?>
        </select>
			</form>
		</div>
	</body>
</html>
