<!--
Name: Joshua lee
Date: March 13, 2022
Section: TCSS 445 A

Profile.php displays the user's account information and allows them to create
and view their reading lists.
-->

<?php require_once('config.php');
session_start();
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_fname'] . " " . $_SESSION['user_lname'];
	$birth_year = $_SESSION['birth_year'];
	$user_email = $_SESSION['user_email'];
} else {
	echo '<script>alert("You are not signed in.");location="authentication/login.php"</script>';
}
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
						<a class="nav-link" href="profile.php">Profile
              <span class="sr-only">(current)</span>
            </a>
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
      	</ul>
    	</div>
  	</nav>
		<section id="about-header">
			<h1><?php echo $user_name ?></h1>
			<hr />
			<div id="profile">
				<img src="img/portrait.png" class="m-xxl-4 pic" height=300px width=300px />
				<div class="m-xxl-4 desc pic">
					<h3><?php echo $_SESSION['user_name'] ?></h3>
					<h3><?php echo 2022 - $birth_year?> Years Old</h3>
					<h3><?php echo $user_email ?></h3>
				</div>
			</div>
			<hr />
		</section>
		<section id="about-header">
			<h1>My Reading Lists</h1>
			<form method="GET" action="profile.php">
				<select name="list" onchange="this.form.submit()">
					<option selected>Select a Reading List</option>
					<?php
					$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
					if (mysqli_connect_errno()) {
						die(mysqli_connect_error());
					}
					$sql= "SELECT List_id, Name FROM READING_LISTS WHERE User_id = '${user_id}'";
					# Selects the list id and name of the reading lists that with the given user id.
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
			</form>
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					if (isset($_GET['list'])) {
						?>
				<table class="table table-hover">
						<thead>
								<tr class="table-success">
										<th scope="col">Title</th>
										<th scope="col">Author</th>
										<th scope="col">ISBN</th>
										<th scope="col">Year</th>
										<th scope="col">Publisher</th>
										<th scope="col">Review</th>
								</tr>
						</thead>
						<?php
						if (mysqli_connect_errno()) {
							die(mysqli_connect_error());
						}
						$sql = "SELECT b.Book_id, Title, First_name, Last_name, Isbn, Year, Publisher FROM Authors a
						JOIN (SELECT b.Book_id, Title, Author_id, Isbn, Year, Publisher FROM Books b WHERE Book_id IN
							(SELECT Book_id FROM Reading_List_Entries WHERE List_id = {$_GET['list']})) b
					 	ON a.Author_id = b.Author_id";
						# Selects the identifying book and author information for books in the
						# user's selected reading list. Used to show what books the user already
						# has in their reading list.

						if ($result = mysqli_query($connection, $sql)) {
							while($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td><?php echo $row['Title'] ?></td>
								<td><?php echo $row['First_name'] . ' ' . $row['Last_name'] ?></td>
								<td><?php echo $row['Isbn'] ?></td>
								<td><?php echo $row['Year'] ?></td>
								<td><?php echo $row['Publisher'] ?></td>
								<td>
									<form method="POST" action="helper/leaveReview.php">
										<input type="hidden" name="book_id" value="<?php echo $row['Book_id']?>"/>
										<input type="text" name="rating" required placeholder="Rate 1-5" required />
										<input type="text" name="review" required placehoder="1 Word Summary" required />
										<input type="Submit" class="btn btn-dark" value="Leave Rating" />
									</form>
								</td>
							</tr>
							<?php
							}
							mysqli_free_result($result);
						}
					}
				}
				?>
				</table>
			<form method="POST" action="helper/createNewList.php" class="ra">
				<input type="text" required placeholder="New List Name" name="list-name" />
				<button type="submit" class="btn btn-success">Create New Reading List!</button>
			</form>
		</section>
	</body>
</html>
