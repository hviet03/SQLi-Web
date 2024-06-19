<?php
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 0);
?>
<!-- Enable debug using ?debug=true" -->

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>User Registration - 5cent Store</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				User registration page</a>
			</p>
        </div>
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Enter your username:  
				</td>
				<td>
					<input type="text" id="uid" name="uid"><br />
				</td>
			</tr>

			<tr>
				<td>
					Enter a password:  
				</td>
				<td>
					<input type="password" id="password" name="password"><br />
				</td>
			</tr>

			<tr>
				<td>
					Enter your Name: 
				</td>
				<td>
					<input type="text" id="name" name="name"><br />
				</td>
			</tr>

			<tr>
				<td>
					Describe yourself:
				</td>
				<td>
					<textarea rows="8" cols="50" id="descr" name="descr"></textarea><br />
				</td>
			</tr>	
<tr>
<td>
</td>
</tr>
			<tr>
				<td>
					<input type="submit" value="Submit"/> 
				</td>
				<td>
					<input type="reset" value="Reset"/>
				</td>
			</tr>			
			</table>
				
			</p>

		</form>
        </div>
    
        
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">

<?php
function has_sql_special_chars($input) {
    $special_chars = ["'", '"', "//", "--"];
    foreach ($special_chars as $char) {
        if (strpos($input, $char) !== false) {
            return true;
        }
    }
    return false;
}

//echo md5("pa55w0rd");
if (!empty($_REQUEST['uid'])) {
    $username = $_REQUEST['uid'];
    $pass = $_REQUEST['password'];
    $fname = $_REQUEST['name'];
    $descr = $_REQUEST['descr'];

    // Check for SQL special characters
    if (has_sql_special_chars($username) || has_sql_special_chars($pass) || has_sql_special_chars($fname) || has_sql_special_chars($descr)) {
        echo "Error: Input contains disallowed characters.";
    } else {
        // Prepare the SQL statement
        $stmt = $con->prepare("INSERT INTO users (username, password, fname, description) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($con->error));
        }

        // Hash the password
        $hashed_pass = md5($pass);

        // Bind parameters
        $stmt->bind_param('ssss', $username, $hashed_pass, $fname, $descr);

        // Execute the statement
        if (!$stmt->execute()) {
            echo 'Error: ' . htmlspecialchars($stmt->error);
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["fname"] = $fname;

            ob_clean();
            header('Location: searchproducts.php');
            exit(); // Ensure the script stops execution after redirection
        }

        // Close the statement
        $stmt->close();
    }
}
?>

	</div>
	</div>
	  
	  
	  <div class="footer">
		<p><h4><a href="index.php">Home</a><h4></p>
      </div>
	  
	  
	  <div class="footer">
		<p><a href="https://www.youtube.com/watch?v=VOK4NtCkNGg">Click me</a> | Hehe | <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">@FreeHints</a></p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>
