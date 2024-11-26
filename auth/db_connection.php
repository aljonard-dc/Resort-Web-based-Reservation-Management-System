<?php
$servername = "localhost";
$username = "u403614883_root";
$password = "Naturaverde2023!";
$dbname = "u403614883_naturaverde_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
