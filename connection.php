<?php
$server = "localhost"; // Default server for XAMPP
$username = "root";    // Default username for XAMPP
$password = "";        // Default password for XAMPP
$database = "bbms"; // Replace with your database name

// Establish connection
$connection = mysqli_connect($server, $username, $password, $database);

// Check if connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
