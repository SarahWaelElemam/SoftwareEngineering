<?php
// Database credentials
$servername = 'localhost';
$db_name = 'event_management'; // Database name
$username = 'root'; // Your MySQL username
$password = ''; // Your MySQL password (leave empty if no password)

// Establish the connection
global $conn;

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>