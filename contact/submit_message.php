<?php
include '../auth/db_connect.php';

$first_name = $_POST['first-name'] ?? '';
$last_name = $_POST['last-name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if ($first_name && $last_name && $email && $message) {
    $stmt = $conn->prepare("INSERT INTO contact_messages (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../index.php?success=1");
        exit();
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "All fields are required.";
}
?>
