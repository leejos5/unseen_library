<!--
Name: Joshua lee, Lidiya Abose
Date: March 13, 2022
Section: TCSS 445 A

Index.php is the home page for the Unseen Library application that displays a
select number of books and welcomes the user to the website.
-->

<?php require_once('config.php');
session_start();
$_SESSION['wd'] = getcwd();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<div>
			<meta charset="UTF-8">
      		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="bootstrap.css">
	</head>
	<body style = "background-image: url('librarypro.png')">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<img src="img/newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
							<a class="nav-link" href="social.php">Social</a>
						</li>
            <li class="nav-about">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </li>
      </ul>
      </div>
</nav>
        <section id="about-header">
		 <div>
               <h1>Welcome to Unseen Library</h1>
               <hr />
               <p class="lead">
                              Unseen Library applictaion gives an easy way of getting books for users from different location. Users can
                              choose any genre, read a book from a nearest bookstores or libraries. Share your idea and rate
                              your best books and best authors of the year.  </p>

         		 	 <div class="image">
         				<img class="about" src="img/Alice.jpg"/>
         				<div class="image__overlay">
         				     <p class="image__description">
         				         Located in Three tree books
         				        </p>
         				</div>
         			</div>
         			<div class="image">
                         <img class="about" src="img/TTTH.jpg"/>
                          <div class="image__overlay">
                            <p class="image__description">
                              Located in Washington Library
                             </p>
                       </div>
                       </div>
                       <div class="image">
                           <img class="about" src="img/lastman.jpg"/>
                           <div class="image__overlay">
                            <p class="image__description">
                               Located in American Library Association
                             </p>
                            </div>
                          </div>
                        <div class="image">
                             <img class="about" src="img/Mastersofhorror.jpg"/>
                             <div class="image__overlay">
                                 <p class="image__description">
                                    Located in Walls Of Book
                             </p>
                       </div>
                     </div>
                     <div class="image">
                          <img class="about" src="img/Rabbit.jpg"/>
                          <div class="image__overlay">
                           <p class="image__description">
                              Located in Phantom Zone Comics Southcenter
                           </p>
                          </div>
                     </div>

         			<div class="image">
                         <img class="about" src="img/storm.jpg"/>
                         <div class="image__overlay">
                         <p class="image__description">
                             Located in Health Sciences Library
                          </p>
                        </div>
                       </div>

                      <div class="image">
                           <img class="about" src="img/womaninwhite.jpg"/>
                           <div class="image__overlay">
                           <p class="image__description">
                              Located in Suzzallo and Allen Libraries
                           </p>
                          </div>
                         </div>

                        <div class="image">
                             <img class="about" src="img/Wuthering.jpg"/>
                             <div class="image__overlay">
                             <p class="image__description">
                                 Located in Paper Boat Booksellers
                              </p>
                             </div>
                            </div>

                         <div class="image">
                              <img class="about" src="img/treasure.jpg"/>
                               <div class="image__overlay">
                               <p class="image__description">
                                   Located in University of Washington Tacoma
                               </p>
                              </div>

                           </div>
                        <div class="image">
                             <img class="about" src="img/Prisoner.jpg"/>
                             <div class="image__overlay">
                             <p class="image__description">
                                Located in Built Environments Library
                             </p>
                        </div>
                    </div>
         	  </div>
            </div>
        </section>
    </body>
</html>
