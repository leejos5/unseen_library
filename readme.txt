
Unseen_Library

CONTENTS OF THE FILE------------------------------------------------------------
Introduction
Requirements
Installation/How To
Contents/Structure
Developers

INTRODUCTION--------------------------------------------------------------------
Unseen Library is a program that simulates a libraries database that compiles
information from public libraries and private bookstores into a single location.
It is aimed towards making the libraries search much simpler and more convenient
for users to find just the right book while also providing a social media aspect
and allowing users to socialize through books.

Built With:
- LAMP STACK:
  - Linux
  - Apache
  - MySQL
  - PhpMYAdmin
  - Bootstrap

REQUIREMENTS--------------------------------------------------------------------
# Requirements
- XAMPP (or other local LAMP solution)


INSTALLATION/HOW TO-------------------------------------------------------------
Unseen Library was creating using a XAMPP web-server solution. These
instructions will describe how to run the application with XAMPP.

1. Download the zip file containing the project contents.
2. Open XAMPP and start the Apache and MySQL Services.
3. Import the .sql file into phpMyAdmin to import the database.
4. Import the files in code.zip into the xampp directory xampp/htdocs/.
   The project should now be located at xampp/htdocs/unseen_library.
4. Access the website through your local port localhost/unseen_library.

You now have access and are able to run the Unseen Library application.

CONTENTS/STRUCTURE

File contents:
- about.php
- config.php
- index.php
- profile.php
- search.php
- social.php
- bootstrap.css
- authentication
  > connect.php
  > login.php
  > logout.php
  > process.php
  > session.php
  > signup.php
- helper
  > addTolist.php
  > compare.php
  > createNewList.php
  > leaveReview.php
  > seeReview.php
  > setList.php 
  > setOther.php
- img
  > Alice.jpg
  > ...
  > Wuthering.jpg

Organization:
The files are organized so the main web pages are listed in the main directory
and the rest of the files are maintained in their relevant subdirectories.
Authentication pages and scripts are contained in the authentication folder,
while any helper scripts are in the helper folder and finally the images are
contained in the img folder.


DEVELOPERS ---------------------------------------------------------------------
Developer Team:
 Cordel Hampshire
  > Database Design
  > Database Management

 Lidiya Abose
  > Front End Development

 Rin Pham
  > Back End Development
  > Database Design

 Joshua Lee
  > Front End Development
  > Back End Development
