<?php
// MySQL database credentials
$servername = "localhost"; // Replace with your server name if needed
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "projekweb"; // Replace with your MySQL database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
