<?php
ob_start();
session_start();
include("db_config.php");
if (!$_SESSION["username"]){
header('Location:login1.php?msg=1');
}
ini_set('display_errors', 0);
?>
<!-- Enable debug using ?debug=true" -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>5cent Store</title>
    
    

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Welcome <?php echo $_SESSION["username"]; ?>!! Search for various products here</a>
			</p>
        </div>
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Search for a product:  
				</td>
				<td>
					<input type="text" id="searchitem" name="searchitem">&nbsp;&nbsp;
				</td>
				<td>
					<input type="submit" value="Search!"/> 
				</td>
			</tr>
	</table>
				
			</p>

		</form>
        </div>
    
        
		<br />

<?php
if (isset($_POST["searchitem"])) {
    $searchitem = $_POST["searchitem"];

    // Check if the input contains any of the blacklisted words
    if (
	stripos($searchitem, '1') === false &&
        stripos($searchitem, '2') === false &&
        stripos($searchitem, '3') === false &&
        stripos($searchitem, '4') === false &&
        stripos($searchitem, '5') === false &&
        stripos($searchitem, '6') === false &&
        stripos($searchitem, '7') === false &&
        stripos($searchitem, '8') === false &&
        stripos($searchitem, '9') === false &&
        stripos($searchitem, '0') === false &&
	stripos($searchitem, 'description') === false &&
        stripos($searchitem, '*') === false &&
        stripos($searchitem, '=') === false &&
        stripos($searchitem, 'id') === false &&
        stripos($searchitem, 'null') === false &&
        stripos($searchitem, '@') === false &&
        stripos($searchitem, 'version') === false &&
        stripos($searchitem, 'group') === false &&
        stripos($searchitem, 'concat') === false &&
        stripos($searchitem, '|') === false
    ) {
        // Input doesn't contain any blacklisted words, proceed with the query
        $q = "SELECT * FROM products WHERE product_name LIKE '" . $searchitem . "%'";
        // Execute the query and handle the results
    } else {
        // Input contains blacklisted word
        echo "Blacklisted word detected. Please try a different search term.";
    }
}
?>

<div class="searchheader" style="color:white">
<table>	
    
	<tr>
    <td style="width:200px " >
        <b>Product Name</b>
    </td>
    
    <td style="width:200px " >
        <b>Product Type</b>
    </td>
    
    <td style="width:450px " >
        <b>Description</b>
    </td>
    
    <td style="width:110px " >
        <b>Price (in USD)</b>
    </td>
 
</tr>

<?php

if (isset($_POST["searchitem"])) {
$result = mysqli_query($con,$q);
if (!$result)
{
		echo("</table></div>".mysqli_error($con));
}else{

while($row = mysqli_fetch_array($result))
  {
  echo "<tr><td style=\"width:200px\">".$row[1]."</td><td style=\"width:200px\">".$row[2]."</td><td style=\"width:450px\">".$row[3]."</td><td style=\"width:110px\">".$row[4]."</td></tr>";
  }

}
}
?>
</table>
	</div>

	  
	  
	  <div class="footer">
	  <p><h4><a href="blindsqli.php?user=<?php echo $_SESSION['username'];?>">Profile</a> | <a href="logout.php">Logout</a> | <a href="index.php">Home</a><h4></p>
      </div>
	  
	  
	  <div class="footer">
	  <p><a href="https://www.youtube.com/watch?v=VOK4NtCkNGg">Click me</a> | Hehe | <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@FreeHints</a></p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>
