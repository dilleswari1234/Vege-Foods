<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html"); // Redirect if not logged in
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p><h4>This is your dashboard.</h4></p>
    <a href="logout.php"><h4> Logout </h4></a>
    <a href="main.html"> <h4>Back to main page </h4> </a>
    
</body>
</html>