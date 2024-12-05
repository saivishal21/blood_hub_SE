<?php
$connection = new mysqli("localhost", "root", "", "bbms");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

header('Content-Type: application/json');
$query = "SELECT id, name, latitude, longitude FROM donors WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
$result = $connection->query($query);

$donors = [];
while ($row = $result->fetch_assoc()) {
    $donors[] = $row;
}

echo json_encode($donors);
?>
