<?php
require 'C:\xampp\htdocs\Blood Hub\patient\PHPMailer.php';
require 'C:\xampp\htdocs\Blood Hub\patient\SMTP.php';
require 'C:\xampp\htdocs\Blood Hub\patient\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$subject = $_POST['subject'];
$bodyofmail = $_POST['bodyofmail'];

// Check if the subject and body are not empty
if (empty($subject) || empty($bodyofmail)) {
    die('Subject and body of the email cannot be empty.');
}

// Database connection
$mysql = new mysqli('localhost', 'root', '', 'bbms');
if ($mysql->connect_error) {
    die('Database connection failed: ' . $mysql->connect_error);
}

// Fetch all donor emails
$query = "SELECT name, email FROM donors";
$result = $mysql->query($query);

if (!$result || $result->num_rows === 0) {
    die('No donors found in the database.');
}

$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'bloodhubfau@gmail.com'; // Your email
    $mail->Password = 'lubp ohjp slgh nfny';   // Your email app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and reply-to settings
    $mail->setFrom('bloodhubfau@gmail.com', 'Blood Hub');
    $mail->addReplyTo('bloodhubfau@gmail.com', 'Blood Hub');

    // Email content settings
    $mail->Subject = $subject;

    // Iterate over recipients
    foreach ($result as $row) {
        try {
            $mail->clearAddresses(); // Clear previous recipients
            $mail->addAddress($row['email'], $row['name']);

            // Set the email body
            $mail->Body = nl2br($bodyofmail); // HTML body
            $mail->AltBody = strip_tags($bodyofmail); // Plain-text body

            $mail->send();
            echo 'Message sent to: ' . htmlspecialchars($row['name']) . ' (' . htmlspecialchars($row['email']) . ')<br>';
        } catch (Exception $e) {
            echo 'Mailer Error (' . htmlspecialchars($row['email']) . '): ' . $mail->ErrorInfo . '<br>';
            $mail->getSMTPInstance()->reset(); // Reset the connection
        }
    }
} catch (Exception $e) {
    die('Mailer Error: ' . $mail->ErrorInfo);
}

// Close database connection
$mysql->close();
?>
