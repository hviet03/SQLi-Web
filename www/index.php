<?php
//function to check if sqlitraining database is created or not.
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 0);
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>5cent Store</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>

    <div class="container-narrow">
        <div class="jumbotron">
			<h1 style="color:white">5cent Store</h1>
			<p class="lead" style="color:white">
				An application designed for users to easily search for items and their price from our shop
			</p>
        </div>
		<br />
    <div class="row marketing">
        <div style="border:1px solid #000000; padding: 10px">
          <b>You can use the following users if you are lazy or register a user of your own.</b><br />
        <ul>
          <li>bob:password</li>
          <li>voldemort:horcrux</li>
        </ul>
        </div>
        <br />
        <div style="border:1px solid #000000; padding: 10px">
        <b>Additional information</b>
        <ul>
        <li>The database needs to be setup before beginning. To (re)set the database, navigate to <a href="resetdb.php">reset database</a>.</li>
        <li>Well, that's all.</li>
        <li>The application is meant to be a a secret product. <b>Do not run on a server exposed to the Internet or in untrusted environments!</b></li>
        </ul>
        </div>
    </div>		
      <div class="row marketing">
        <div class="col-lg-6">

    <div style="border:1px solid #000000; padding: 10px">
		  <h4><a href="regIster.php" style="color:#B31D14">Click here for user registration</a></h4>
          <p>This page can be used to create users that will be used throughout the application.</p>
		
          <h4><a href="login1.php" style="color:#B31D14">Click here to log in</a></h4>
          <p>Default login page for all users. super secured.</p>

		  
          <h4><a href="searchproducts.php" style="color:#B31D14">Search for all items available</a></h4>
          <p>The myth, the legend , the only - Search function. The only reason this app exist in the first place.</p>

		  		  
		  <h4><a href="changepass.php" style="color:#B31D14">Change/reset your password</a></h4>
          <p>Here you can change your password to protect from hackers</p>
		  
		  <h4><a href="profile.php?user=<?php echo $_SESSION['username'];?>"  style="color:#B31D14">Profile - Show info about yourself</a></h4>
          <p>Contains information about yourself. And in case you forgot your password, just crack the md5 hash ^^.</p>
		  
		<!--  <h4><a href="os.php" style="color:#B31D14">SecretProfile.php - your deepest, darkest secrets lies here</a></h4>
          <p>Bob told me he need a secret page to store his diary, so here it is.</p>  -->
        </div>
      </div>

</div>
      <div class="footer">
		<p><a href="https://www.youtube.com/watch?v=VOK4NtCkNGg">Click me</a> | Hehe | <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@FreeHints</a></p>
      </div>

    </div> <!-- /container -->

  

</body></html>
