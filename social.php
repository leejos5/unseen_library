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
          <a class="nav-link" href="social.php">Social
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-about">
          <a class="nav-link" href="about.php">About</a>
        </li>
      </ul>
    </div>
  </nav>
		<div class="search">
			<section id="about-header">
				<h1>Search For Users</h1>
				<hr />
			</section>
			<section id="search-body">
				<p>
					Search for other users to see what they're reading.
				</p>
				<form method = "GET" action="social.php">
					<p>Search by:
					</p>
	        <div>
	          <input type="text" id="userId" name="search-user" placeholder="Search by id" onchange="this.form.submit()"/>
	        </div>
					<br />
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['search-user'])) { // is this how you access the input field?
              ?>
          <table class="table table-hover">
              <thead>
                  <tr class="table-success">
                      <th scope="col">User</th>
                  </tr>
              </thead>
              <?php
              $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
              if (mysqli_connect_errno()) {
                die(mysqli_connect_error());
              }
              $sql = "SELECT user_name FROM users HAVING user_name = '{$_GET['search-user']}'";
              if ($result = mysqli_query($connection, $sql)) {
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><?php echo $row['user_name'] ?></td>
                    <td><a href="compare.php">Compare Lists</a></td>
                  </tr>
                  <?php
                }
                mysqli_free_result($result);
              }
            }
          }
          ?>
				<!-- implement php to fill table -->

					</table>
				</form>
			</section>
		</div>
	</body>
</html>
