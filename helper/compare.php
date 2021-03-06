<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

Compare.php compares the reading lists of two different users to determine which
books the two users have in common and display that to the user. An empty table
will be displayed if the users do not have any books in common in their selected
reading lists.
-->
<?php
session_start();
require_once($_SESSION['wd'] . '/config.php');
$username = $_SESSION['otherUser'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>
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
          	<a class="nav-link" href="/unseen_library/logout.php">Log Out</a>
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
		<section id="about-header">
			<h1>Compare Lists</h1>
			<hr />
      <div id="profileContainer">
        <div id="profile">
  				<img src="/unseen_library/img/portrait.png" class="m-xxl-4 pic" height=300px width=300px />
  				<div class="m-xxl-4 desc pic">
  					<h3><?php echo $_SESSION['user_name'] ?></h3>
  				</div>
        </div>
        <div id="profile">
  				<img src="/unseen_library/img/portrait.png" class="m-xxl-4 pic" height=300px width=300px />
  				<div class="m-xxl-4 desc pic">
  					<h3><?php echo $username?></h3>
  				</div>
        </div>
			</div>
			<hr />
		</section>
		<section id="about-header">
			<h1>Pick the Reading Lists</h1>
      <p>
         Wnat to see what books you and your friends have in common?
      </p>
      <br />
			<form method="GET" action="compare.php">
				<select name="list1" required>
					<option value="">First Reading List</option>
					<?php
					$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
					if (mysqli_connect_errno()) {
						die(mysqli_connect_error());
					}
					$sql= "SELECT List_id, Name FROM READING_LISTS WHERE User_id = '{$_SESSION['user_id']}'";
					# Selects the names and list id's of the user's reading lists.
					# Used to retrieve and display the user's current reading lists.
					if ($result = mysqli_query($connection, $sql)) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<option value="' . $row['List_id'] . '">';
							echo $row['Name'] , ' (' . $row['List_id'] . ')';
							echo "</option>";
						}
						mysqli_free_result($result);
					}
					?>
				</select>
        <select name="list2" required>
          <option value="">Second Reading List</option>
          <br />
          <?php
          $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
          if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
          }
          $sql= "SELECT List_id, Name FROM Reading_Lists WHERE User_id = (SELECT User_id FROM Users WHERE User_name LIKE '${username}')";
					# Selects the list id and name from Reading_Lists for the other user's username.
					# Used to retrieve and display the set other user's reading lists.

					if ($result = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['List_id'] . '">';
              echo $row['Name'] , ' (' . $row['List_id'] . ')';
              echo "</option>";
            }
            mysqli_free_result($result);
          }
          ?>
        </select>
				<input type="Submit" value="Compare!" />
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					if (isset($_GET['list1']) && isset($_GET['list2'])) {
						?>
				<table class="table table-hover">
						<thead>
								<tr class="table-success">
										<th scope="col">Title</th>
										<th scope="col">Author</th>
										<th scope="col">ISBN</th>
										<th scope="col">Year</th>
										<th scope="col">Publisher</th>
								</tr>
						</thead>
						<?php
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$sql = "SELECT Title, First_name, Last_name, Isbn, Year, Publisher FROM Authors a
					           JOIN (SELECT Title, Author_id, Isbn, Year, Publisher FROM Books WHERE Book_id IN (
                    SELECT Book_id FROM Reading_List_Entries WHERE List_id = {$_GET['list1']} AND
                    Book_id IN (SELECT Book_id FROM Reading_List_Entries WHERE List_id = {$_GET['list2']}))) b
                    ON a.Author_id = b.Author_id";
						# Selects the identifying book and author information from the database from
						# the two given lists that both of the users have.
						# Used to determine and display which books the users have in common in their lists.

						if ($result = mysqli_query($connection, $sql)) {
							while($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td><?php echo $row['Title'] ?></td>
								<td><?php echo $row['First_name'] . ' ' . $row['Last_name'] ?></td>
								<td><?php echo $row['Isbn'] ?></td>
								<td><?php echo $row['Year'] ?></td>
								<td><?php echo $row['Publisher'] ?></td>
							</tr>
							<?php
							}
							mysqli_free_result($result);
						}
					}
				}
				?>
				</table>
			</form>
		</section>
	</body>
</html>
