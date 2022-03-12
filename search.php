<!-- To do:
- Implement all of the search filtering
	- Fix the minimum rating for books search
	- location rating should leave an avg rating, not just from one
-->

<?php require_once('config.php');
session_start();
$user_id = $_SESSION['user_id'];
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
	          <input type="text" id="title" name="search-name" placeholder="Search for a title..."/>
	          <input type="text" id="author" name="search-author" placeholder="Author Name" />
						<select name = "genre">
							<option value = "" >Select a Genre</option>
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
						<?php
						$title = $_GET['search-name'];
						$author = $_GET['search-author'];
						?>
	        </div>
					<br />
					<div>
						<label for="customRange1" class="form-label">Minimum Rating</label>
						<input type="range" min="1" max="10" class="form-range" id="ratingRange" oninput="this.nextElementSibling.value = this.value">
						<output name="rating"></output>
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
								</tr>
						</thead>
						<?php
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$sql =
						"SELECT r.Book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, Address, avg FROM (SELECT book_id, AVG(Rating)
						 as avg FROM book_ratings GROUP BY Book_id) r JOIN (SELECT Book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, Address
										FROM Locations l JOIN (SELECT Book_id, Title, Genre, First_name, Last_name, Isbn, Year, Publisher, Location_id FROM Books b JOIN
										Authors a ON b.author_id = a.author_id) c ON l.location_id = c.location_id WHERE Title LIKE '%{$title}%' AND Last_name LIKE '%{$author}%'
										AND Genre LIKE '%{$_GET['genre']}%') b ON b.Book_id = r.book_id";
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
									<td><?php echo $row['Address'] ?></td>
									<td>placeholder</td>
									<td>
										<form method ="POST" action="addToList.php">
											<input type="hidden" name="book_id" value="<?php echo $row['Book_id']?>"/>
											<input type="Submit" class="btn btn-dark" value="Add to List" />
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
						$sql= "SELECT List_id, Name FROM READING_LISTS WHERE User_id = '${user_id}'"; // Have user_id = user id from session!!!
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
						<input type="range" min="1" max="10" class="form-range" id="ratingRange" name="minLocationRating" oninput="this.nextElementSibling.value = this.value">
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
