<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

Search.php allows the user to search and filter for locations and books present
in the database and add any desired books to the specified reading list.
-->

<?php require_once('config.php');
session_start();
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
}
$title;
$author;
error_reporting(E_ERROR | E_PARSE);
?>
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
          <a class="nav-link" href="search.php">Search
            <span class="sr-only">(current)</span>
          </a>
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
		<div class="search">
			<section id="about-header">
				<h1>Books Search</h1>
				<hr />
			</section>
			<section id="search-body">
				<p>
					Search our libraries database by books or by locations. Location search is at the bottom of the page.
				</p>
				<p>
					If you would like to add it to your reading list, choose one below the table.
				</p>
				<form method="GET" action="search.php">
					<br />
	        <div>
	          <input type="text" id="title" name="search-name" placeholder="Book Title"/>
	          <input type="text" id="author" name="search-author" placeholder="Author Name" />
						<select name = "genre">
							<option value = "" >Select a Genre</option>
							<?php
							$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
							if (mysqli_connect_errno()) {
								die(mysqli_connect_error());
							}
							$sql = "SELECT DISTINCT Genre FROM Books";
							# Selects genres from books without duplicates.
							# Used to display the selection of genres in the database.

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
						<input type="text" id="zipcode" name="search-zipcode" placeholder="Zipcode" />
						<?php
						$title = $_GET['search-name'];
						$author = $_GET['search-author'];
						$zipcode =$_GET['search-zipcode'];
						?>
	        </div>
					<br />
					<div>
						<label for="customRange1" class="form-label">Minimum Rating</label>
						<input type="range" min="1" max="5" value="1" class="form-range" id="ratingRange" name = "minBookRating" oninput="this.nextElementSibling.value = this.value">
						<output name="rating">1</output>
						<button type="Submit" class="btn btn-success">Go!</button>
					</div>
					<br />
				</form>

				<!-- implement php to fill table -->
				<table class="table table-hover">
						<thead>
								<tr class="table-success">
										<th scope="col">Title</th>
										<th scope="col">Genre</th>
										<th scope="col">Author</th>
										<th scope="col">ISBN</th>
										<th scope="col">Year</th>
										<th scope="col">Publisher</th>
										<th scope="col">Location</th>
										<th scope="col">Rating</th>
										<th scope="col">Add to List</th>
										<th scope="col">Reviews</th>
								</tr>
						</thead>
						<?php
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$minRating = intval($_GET['minBookRating']);
						$sql =


						"SELECT e.book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, avg, Address, City, State, Zipcode FROM locations l JOIN
							(SELECT location_id, bl.book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, avg FROM book_locations bl JOIN
								(SELECT c.Book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, AVG(Rating) as avg FROM book_ratings br JOIN
						 			(SELECT Book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher
									FROM Books b JOIN Authors a ON b.author_id = a.author_id WHERE Last_name LIKE '%${author}%' AND Title LIKE '%${title}' AND Genre LIKE '%{$_GET['genre']}%') c
								ON c.Book_id = br.book_id GROUP BY c.Book_id) d
							ON d.Book_id = bl.book_id GROUP BY book_id) e
						ON l.location_id = e.location_id WHERE Zipcode LIKE '%${zipcode}' AND avg >= ${minRating}";
						# Selects the book, author, location, and rating information from the database
						# with the given filters and selections. Used to allow the user to
						# refine their search and cater their search.

						if ($result = mysqli_query($connection, $sql)) {
							while($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
									<td><?php echo $row['Title'] ?></td>
									<td><?php echo $row['First_name'] . ' ' . $row['Last_name'] ?></td>
									<td><?php echo $row['Genre'] ?></td>
									<td><?php echo $row['Isbn'] ?></td>
									<td><?php echo $row['Year'] ?></td>
									<td><?php echo $row['Publisher'] ?></td>
									<td><?php echo $row['Address'] . ", " . $row['City'] . ", " . $row['State'] . " " . $row['Zipcode'] ?></td>
									<td><?php echo $row['avg']?></td>
									<td>
										<form method ="POST" action="helper/addToList.php">
											<input type="hidden" name="bookid" value="<?php echo $row['book_id']?>"/>
											<input type="Submit" class="btn btn-dark" value="Add to List"
											<?php
											if (!isset($_SESSION['user_id'])) {
												echo ' disabled ';
											}
											?>
											/>
										</form>
									</td>
									<td>
										<form method="POST" action="helper/seeReview.php">
											<input type="hidden" name="bookid" value="<?php echo$row ['book_id']?>"/>
											<input type="hidden" name="booktitle" value="<?php echo $row['Title']?>"/>
											<input type="Submit" class="btn btn-dark" value="See Reviews"
											<?php
												if (!isset($_SESSION['user_id'])) {
													echo ' disabled ';
												}
												?>/>
										</form>
									</td>
								</tr>
								<?php
							}
							mysqli_free_result($result);
						}
						?>
					</table>
					<form method="POST" action="search.php">
					<select name="list" id="list" onchange="this.form.submit();">
						<option selected>Select a Reading List</option>
						<?php
						$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$_SESSION['curr_list'] = $_POST['list'];
						$sql= "SELECT List_id, Name FROM READING_LISTS WHERE User_id = '${user_id}'";
						# Selects the reading list the user already has.
						# Used for users to select a reading list to add a book to.

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
					</form>
					<p>
						<?php
						if (isset($_SESSION['curr_list'])) {
							$list = $_SESSION['curr_list'];
							$sql = "SELECT Name FROM READING_LISTS WHERE List_id = ${list}";
							# Selects the name of the reading list with the given list id.
							# Used to determine if a list is currently selected or not.

							if ($result = mysqli_query($connection, $sql)) {
								$row = mysqli_fetch_assoc($result);
								echo 'Your current selected list is: ' . $row['Name'];
							}
						} else {
							echo 'You do not have a list selected.';
						}
						?>
					</p>
			</section>
			<section id="about-header">
				<h1>Locations Search</h1>
				<hr />
			</section>
			<section id="search-body">
				<p>
					Search our libraries database by location.
				</p>
				<form method="GET" action="search.php">
					<p>Search by:</p>
					<br />
					<div>
						<input type="text" id="zipcode" name="search-zip" placeholder="Search for a Zipcode" />
						<input type="text" id="city" name="search-city" placeholder="Search for a city" />
					</div>
					<div>
						<label for="customRange1" class="form-label">Minimum Rating</label>
						<input type="range" min="1" max="5" class="form-range" id="ratingRange" name="minLocationRating" oninput="this.nextElementSibling.value = this.value">
						<output name="rating"></output>
						<button type="Submit" class="btn btn-success">Go!</button>
					</div>
					<br />
				</form>
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					if (isset($_GET['minLocationRating'])) {
						?>
				<table class="table table-hover">
						<thead>
								<tr class="table-success">
										<th scope="col">Name</th>
										<th scope="col">Address</th>
										<th scope="col">City</th>
										<th scope="col">State</th>
										<th scope="col">Zipcode</th>
										<th scope="col">Rating</th>
								</tr>
						</thead>
						<?php
						if(mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$sql = "SELECT name, address, city, state, zipcode, rating FROM Locations l
						JOIN Location_Ratings lr ON l.location_id = lr.location_id WHERE address IS NOT NULL
										AND rating >= {$_GET['minLocationRating']} AND zipcode LIKE '%{$_GET['search-zip']}%'
										AND city LIKE '%{$_GET['search-city']}%'";
						# Selects the location information for the location with the given
						# filters and selections. Lets users search for location information
						# and cater their search to their desire.

						if ($result = mysqli_query($connection, $sql)) {
							while($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['address']?></td>
									<td><?php echo $row['city']?></td>
									<td><?php echo $row['state']?></td>
									<td><?php echo $row['zipcode']?></td>
									<td><?php echo $row['rating']?></td>
								</tr>
							</thead>
							<?php
							}
							mysqli_free_result($result);
						}
					}
				}
						?>
				</table>
			</section>
		</div>
	</body>
</html>
