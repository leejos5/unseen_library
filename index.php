<?php require_once('config.php') ?>
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
    	<img src="newnewlogo.png" alt="Unseen Library Logo" height = "100" width = "100"/>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
							<a class="nav-link" href="social.php">Social</a>
						</li>
            <li class="nav-about">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </li>
      </ul>
      </div>
</nav>
		 <div class="jumbotron">
               <h4 class="display-4">Welcome to Unseen Library</h4>
               <p class="lead">
                              Unseen Library applictaion gives an easy way of getting books for users from different location. Users can
                              choose any genre, read favorite book from a nearest bookstores or libraries. Create friendships to share your idea and rate
                              your best books and best authors of the year.  </p>
                              
         		 	 <div class="image">
         				<img class="about" src="Alice.jpg"/>
         				<div class="image__overlay">
         				    <div class ="image__price">Price=$56.49</div>
         				        <p class="image__description">
         				            Located in Three tree books
         				        </p>
         				</div>
         			</div>
         			<div class="image">
                         <img class="about" src="TTTH.jpg"/>
                          <div class="image__overlay">
                           <div class="image__price">Price=$99.99</div>
                            <p class="image__description">
                              Located in Washington Library
                             </p>
                       </div>
                       </div>
                       <div class="image">
                           <img class="about" src="lastman.jpg"/>
                           <div class="image__overlay">
                           <div class ="image__price">Price=$78.30</div>
                            <p class="image__description">
                               Located in American Library Association
                             </p>
                            </div>
                          </div>
                        <div class="image">
                             <img class="about" src="Mastersofhorror.jpg"/>
                             <div class="image__overlay">
                             <div class ="image__price">Price=$45.49</div>
                                 <p class="image__description">
                                    Located in Walls Of Book      	  
                             </p>
                       </div>
                     </div>
                     <div class="image">
                          <img class="about" src="Rabbit.jpg"/>
                          <div class="image__overlay">
                          <div class ="image__price">Price=$85.56</div>
                           <p class="image__description">
                              Located in Phantom Zone Comics Southcenter
                           </p>
                          </div>
                     </div>

         			<div class="image">
                         <img class="about" src="storm.jpg"/>
                         <div class="image__overlay">
                         <div class ="image__price">Price=$36.50</div>
                         <p class="image__description">
                             Located in Health Sciences Library
                          </p>
                        </div>
                       </div>

                      <div class="image">
                           <img class="about" src="womaninwhite.jpg"/>
                           <div class="image__overlay">
                           <div class ="image__price">Price=$50.99</div>
                           <p class="image__description">
                              Located in Suzzallo and Allen Libraries
                           </p>
                          </div>
                         </div>

                        <div class="image">
                             <img class="about" src="Wuthering.jpg"/>
                             <div class="image__overlay">
                             <div class ="image__price">Price=$47.24</div>
                             <p class="image__description">
                                 Located in Paper Boat Booksellers
                              </p>
                             </div>
                            </div>

                         <div class="image">
                              <img class="about" src="treasure.jpg"/>
                               <div class="image__overlay">
                               <div class ="image__price">Price=$49.99</div>
                               <p class="image__description">
                                   Located in University of Washington Tacoma
                               </p>
                              </div>

                           </div>
                        <div class="image">
                             <img class="about" src="Prisoner.jpg"/>
                             <div class="image__overlay">
                             <div class ="image__price">Price=$60.87</div>
                             <p class="image__description">
                                Located in Built Environments Library
                             </p>
                        </div>
                        
                        </div>
         	</div>
      
    </div>
</body>
</html>
