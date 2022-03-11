<?php require_once('config.php');
session_start();
$user_id = $_SESSION['user_id'];
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
				<h1>Libraries Search</h1>
				<hr />
			</section>
			<section id="search-body">
				<p>
					Search our libraries database by books or by locations.
				</p>
				<form method = "GET" action="search.php">
					<p>Search by:
					</p>
	        <div>
	          <input type="radio" id="book-radio" value="book" name = "search-type"/>
	          <label for="book-radio">Books</label>
	        </div>
	        <div>
	          <input type="radio" id="location-radio" value="location" name = "search-type"/>
	          <label for="location-radio">Locations</label>
	        </div>
					<br />
	        <div>
	          <input type="text" id="title" name="search-name" placeholder="Search for a title..."/>
	          <input type="text" id="author" name="search-author" placeholder="Author Name" />
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
	        </div>
					<br />
					<div>
						<label for="customRange1" class="form-label">Minimum Rating</label>
						<input type="range" min="1" max="10" class="form-range" id="ratingRange" oninput="this.nextElementSibling.value = this.value">
						<output name="rating"></output>
						<button type="Submit" class="btn btn primary">Go!</button>
					</div>
					<br />
				</form>

				<!-- implement php to fill table -->
				<table class="table table-hover">
						<thead>
								<tr class="table-success">
										<th scope="col">Title</th>
										<th scope="col">Author</th>
										<th scope="col">ISBN</th>
										<th scope="col">Year</th>
										<th scope="col">Publisher</th>
										<th scope="col">Location</th>
										<th scope="col">Add to List</th>
								</tr>
						</thead>
						<?php
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$sql = "SELECT Book_id, Title, First_name, Last_name, Isbn, Year, Publisher, Address
										FROM Locations l JOIN (SELECT Book_id, Title, First_name, Last_name, Isbn, Year, Publisher, Location_id FROM Books b JOIN
										Authors a ON b.author_id = a.author_id WHERE Title LIKE '%li%') c ON
										l.location_id = c.location_id";

										;
						if ($result = mysqli_query($connection, $sql)) {
							while($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
									<td><?php echo $row['Title'] ?></td>
									<td><?php echo $row['First_name'] . ' ' . $row['Last_name'] ?></td>
									<td><?php echo $row['Isbn'] ?></td>
									<td><?php echo $row['Year'] ?></td>
									<td><?php echo $row['Publisher'] ?></td>
									<td><?php echo $row['Address'] ?></td>
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
		</div>
	</body>
</html>
