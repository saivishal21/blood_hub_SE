<?php
// Include your database connection file
include('../includes/connection.php');

// Get search query and blood group filter from AJAX request
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';
$bloodGroupFilter = isset($_POST['bloodGroupFilter']) ? $_POST['bloodGroupFilter'] : '';

// Construct the query with filters
$query = "SELECT * FROM emergency_availability WHERE 1";

// Check if there's a blood group filter and update the query
if (!empty($bloodGroupFilter)) {
    $query .= " AND blood_group = '$bloodGroupFilter'";
}

// Check if there's a search query and apply it to the relevant columns
if (!empty($searchQuery)) {
    $query .= " AND (address LIKE '%$searchQuery%' OR blood_group LIKE '%$searchQuery%')";
}

$query_run = mysqli_query($connection, $query);

// Check if the query was successful
if ($query_run) {
    // Fetch and display the list of emergency donors
    while ($row = mysqli_fetch_assoc($query_run)) {
        echo '<div class="emergency-donor">' .
            '<p>Name: ' . $row['name'] . '</p>' .
            '<p>Blood Group: ' . $row['blood_group'] . '</p>' .
            '<p>Contact: ' . $row['phone_number'] . '</p>' .
            '<p>Address: ' . $row['address'] . '</p>' .
            '</div>' .
            '<hr>'; // Add a horizontal line between each donor
    }
} else {
    echo 'Error fetching emergency donors';
}

// Close the database connection
mysqli_close($connection);
?>
