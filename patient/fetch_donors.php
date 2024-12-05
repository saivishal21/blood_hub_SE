<?php
// Include database connection
include('../connection.php'); // Adjust the path if `connection.php` is in a parent directory

// Query to fetch donor details with valid latitude and longitude
$query = "SELECT id, name, latitude, longitude FROM donors WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
$result = mysqli_query($connection, $query);

// Check if query execution was successful
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

// Prepare donor data for JSON response
$donors = [];
while ($row = mysqli_fetch_assoc($result)) {
    $donors[] = $row;
}

// Return the donor data as JSON
header('Content-Type: application/json');
echo json_encode($donors);
?>
