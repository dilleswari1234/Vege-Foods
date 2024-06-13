<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    // Create a MySQLi connection
    $conn = new mysqli('localhost', 'sumandas', 'password', 'student');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        $_SESSION["username"] = $username; // Store username in session
        header("Location: dashboard.php"); // Redirect to the dashboard or home page
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>