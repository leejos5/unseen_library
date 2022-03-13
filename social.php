<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

social.php allows users to search and select a different user in the database
and compare reading lists with them to see if they have any matching books in the
specified reading lists.
-->

<?php require_once('config.php');
session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>
		<link rel="stylesheet" href="bootstrap.css">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="img/newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
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
					<?php
						if (isset($_SESSION['user_name'])) {
							echo '<a class="nav-link" href="authentication/logout.php">Log Out</a>';
						} else {
							echo '<a class="nav-link" href="authentication/login.php">Sign In</a>';
						}
					?>
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
				<p>
					Hit the Search/Set Comparison button to set the person you want to compare with to the one you selected.
				</p>
				<p>
					After you have made your selection and set the selection, hit "Go!" to compare!
				</p>
				<form method = "GET" action="social.php">
					<p>Search by:
					</p>
	        <div>
	          <input type="text" id="userId" name="search-user" placeholder="Search by Username" onchange="this.form.submit()"/>
	        </div>
					<br />
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['search-user'])) { // is this how you access the input field?
              ?>
				</form>
				<form action="helper/setOther.php" method="POST">
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
              $sql = "SELECT user_name FROM users HAVING user_name LIKE '%{$_GET['search-user']}%'";
              if ($result = mysqli_query($connection, $sql)) {
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
											<td>
												<input type="radio" id="<?php echo $row['user_name'] ?>" value="<?php echo $row['user_name'] ?>" name="username" />
												<label for="<?php echo $row['user_name'] ?>"><?php echo $row['user_name'] ?></label>
											</td>
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
					<input type="Submit" class="btn btn-primary" name="submit" value="Search/Set Comparison" />
					<a href="helper/compare.php" class="btn btn-success
					<?php
						if (!isset($_SESSION['user_id'])) {
							echo 'disabled';
						}
						?>
					">Go!</a>
				</form>
			</section>
		</div>
	</body>
</html>
