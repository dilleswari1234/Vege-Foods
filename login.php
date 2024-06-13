<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $conn = new mysqli("localhost", "sumandas", "password", "student");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("SELECT username, password FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($username, $hashedPassword);
        $stmt->fetch();
        echo "Stored hashed password: $hashedPassword<br>";
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["username"] = $username; // Start the session
            header("Location: dashboard.php"); // Redirect to the dashboard or home page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
    
    $stmt->close();
    $conn->close();
}
?>