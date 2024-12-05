<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../includes/connection.php');

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $blood_group = mysqli_real_escape_string($connection, $_POST['blood_group']);
    $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    // You may want to add additional validation and sanitation for security.

    $query = "INSERT INTO emergency_availability (name, blood_group, phone_number, address) VALUES ('$name', '$blood_group', '$phone_number', '$address')";
    
    $query_result = mysqli_query($connection, $query);

    if ($query_result) {
        echo "<script type='text/javascript'>
                alert('Data submitted successfully...');
                window.location.href = 'donor_dashboard.php';  
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error... Please try again.');
                window.location.href = 'emergency_registration.php';
              </script>";
    }
} else {
    header('Location: emergency_registration.php');
}
?>
