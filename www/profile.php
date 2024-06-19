<?php
ob_start();
session_start();
include("db_config.php");
if (!isset($_SESSION["username"])) {
    header('Location: login1.php');
    exit();
}
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
        <p class="lead" style="color:white">Well looks like a normal user profile to me!</p>
    </div>

    <?php
    if (isset($_GET["user"])) {
        $user = $_GET["user"];

        // Check if the requested user matches the logged-in user
        if ($user !== $_SESSION["username"]) {
            // Log out the user and redirect to login page
            session_destroy();
            header('Location: login1.php');
            exit();
        }

        $q = "Select * from users where username = '".$user."'";

        if (!mysqli_query($con, $q)) {
            
        } else {
            $result = mysqli_query($con, $q);
            $row = mysqli_fetch_array($result);

            if ($row) {
                $_SESSION["username"] = $row[1];
                $_SESSION["name"] = $row[3];
                $_SESSION["descr"] = $row[4];
            }
        }
    }
    ?>        

    <div class="response">
        <p style="color:white">
        <table class="response">
            <tr>
                <td>Username:</td>
                <td><?php echo htmlspecialchars($row[1]); ?></td>
            </tr>
            <tr>
                <td>Password Hash:</td>
                <td><?php echo htmlspecialchars($row[2]); ?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo htmlspecialchars($row[3]); ?></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><?php echo htmlspecialchars($row[4]); ?></td>
            </tr>
        </table>
        </p>
    </div>

    <br />

    <div class="footer">
        <p><h4><a href="profile.php?user=<?php echo htmlspecialchars($_SESSION['username']); ?>">Profile</a> | <a href="logout.php">Logout</a> | <a href="index.php">Home</a></h4></p>
    </div>

    <div class="footer">
        <p><a href="https://www.youtube.com/watch?v=VOK4NtCk
