<?php
session_start();
session_destroy();
header("Location: main.html"); // Redirect to login page after logout
?>