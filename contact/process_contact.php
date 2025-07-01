<?php
include '../auth/db_connect.php';

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO contact_messages (first_name, last_name, email, message) 
          VALUES ('$first_name', '$last_name', '$email', '$message')";

if (mysqli_query($conn, $query)) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Failed to send message.";
}
?>
