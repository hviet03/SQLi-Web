<?php
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 0);
?>

<!-- Enable debug using ?debug=true" -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>5cent Store</title>
    <link href="./css/htmlstyles.css" rel="stylesheet">
</head>
<body>
<div class="container-narrow">
    <div class="jumbotron">
        <p class="lead" style="color:white">Login Page
            <?php 
            if (!empty($_REQUEST['msg'])) {
                if ($_REQUEST['msg'] === "1") {
                    $_SESSION['next'] = 'searchproducts.php';
                    echo "<br />Please login to continue to Search Products";
                } elseif ($_REQUEST['msg'] === "2") {
                    $_SESSION['next'] = 'profile.php';
                    echo "<br />Please login to continue to Profile Page";
                } elseif ($_REQUEST['msg'] === "3") {
                    $_SESSION['next'] = 'os_sqli.php';
                    echo "<br />Please login to continue to Secret Page";
                } else {
                    $_SESSION['next'] = 'searchproducts.php';
                }
            } 
            ?>
        </p>
    </div>
    
    <div class="response">
        <form method="POST" autocomplete="off">
            <p style="color:white">
                Username:  <input type="text" id="uid" name="uid"><br /><br />
                Password: <input type="password" id="password" name="password">
            </p>
            <br />
            <p>
                <input type="submit" value="Submit"/> 
                <input type="reset" value="Reset"/>
            </p>
        </form>
    </div>
    
    <br />
    
    <div class="row marketing">
        <div class="col-lg-6">
            <?php
            if (!empty($_REQUEST['uid'])) {
                $username = $_REQUEST['uid'];
                $pass = $_REQUEST['password'];

                // Check for the presence of disallowed characters in username or password
                $disallowed_chars = ['*', '@', '@@', 'UNION', 'null', 'users', '.', '||', '|'];
                foreach ($disallowed_chars as $char) {
                    if (stripos($username, $char) !== false || stripos($pass, $char) !== false) {
                        echo "Invalid characters detected in username or password. Please avoid using SQL syntax.";
                        exit;
                    }
                }

                // Proceed with the original query
                $q = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . md5($pass) . "'";
                $result = mysqli_query($con, $q);
                if (!$result) {
                    echo ('Error: Hacker found!!') ;
                    if (strpos(mysqli_error($con), '8.0.37') !== false) {
                	echo ' flag{v3rbose_sqli_r1ght_h3r3}'; }
                } else {
                    echo "<br /><br />";
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if ($row) {
                        // Set session variables
                        $_SESSION["username"] = $row['username'];
                        $_SESSION["name"] = $row['name'];

                        // Redirect based on the 'next' session variable
                        if ($_SESSION['next'] == "searchproducts.php") {
                            header('Location: searchproducts.php');
                        } elseif ($_SESSION['next'] == "profile.php") {
                            header('Location: profile.php?user=' . $_SESSION["username"]);
                        } elseif ($_SESSION['next'] == "os_sqli.php") {
                            header('Location: os_sqli.php?user=' . $_SESSION["username"]);
                        } else {
                            // Default redirect to home
                            header('Location: index.php');
                        }
                        exit(); // Ensure the script stops execution after redirection
                    } else {
                        echo "<font style=\"color:#FF0000\">Invalid password!</font>";
                    }
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

