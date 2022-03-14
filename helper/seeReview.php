<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

seeReview.php allows users to search for and see reviews for different books
by different users in the database.
-->

<?php
session_start();
require_once($_SESSION['wd'] . '/config.php');
$book_id = $_POST['bookid'];
$title = $_POST['booktitle'];
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Review</title>
		<link rel="stylesheet" href="/unseen_library/bootstrap.css">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="/unseen_library/img/newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-
             controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/unseen_library/index.php">Home</a>
        </li>
        <li class="nav-item">
					<?php
						if (isset($_SESSION['user_name'])) {
							echo '<a class="nav-link" href="/unseen_library/authentication/logout.php">Log Out</a>';
						} else {
							echo '<a class="nav-link" href="/unseen_library/authentication/login.php">Sign In</a>';
						}
					?>
        </li>
				<li class="nav-item">
          <a class="nav-link" href="/unseen_library/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/unseen_library/search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/unseen_library/social.php">Social
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-about">
          <a class="nav-link" href="/unseen_library/about.php">About</a>
        </li>
      </ul>
    </div>
  </nav>
		<div class="search">
			<section id="about-header">
				<h1><?php echo $title ?></h1>
				<hr />
			</section>
			<section id="search-body">
				<p>
					Search how other users think about <?php echo $title . "."?>
				</p>
				<form action="seeReview.php" method="GET">
          <table class="table table-hover">
              <thead>
                  <tr class="table-success">
                      <th scope="col">User</th>
                      <th scope="col">Review</th>
                      <th scope="col">Rating</th>
                  </tr>
              </thead>
              <?php
              $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
              if (mysqli_connect_errno()) {
                die(mysqli_connect_error());
              }

              $sql = "SELECT  user_name, review, rating FROM users u JOIN
                        (SELECT book_id, user_id, review, rating FROM book_ratings WHERE book_id = ${book_id})
                         br ON u.user_id = br.user_id ORDER BY rating DESC";
							# Selects the username, review, and rating left on the given book.
              # Used to find all reviews and identifying reviewer info for the user and book.

              if ($result = mysqli_query($connection, $sql)) {
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                      <td><?php echo $row['user_name'] ?></td>
      								<td><?php echo $row['review'] ?></td>
      								<td><?php echo $row['rating'] ?></td>
                  </tr>
                  <?php
                }
                mysqli_free_result($result);
              }
          ?>
					</table>
				</form>
			</section>
		</div>
	</body>
</html>
