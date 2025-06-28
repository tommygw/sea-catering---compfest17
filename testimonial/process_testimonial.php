<?php
session_start();
include '../auth/db_connect.php'; 

$email = $_SESSION['email'];
if (!isset($email) || !isset($_POST['submit_testimony'])) {
    echo "<script>alert('Unauthorized access. Please log in.'); window.location.href='../index.php';</script>";
    exit();
}
$result = mysqli_query($conn, "SELECT user_id FROM users WHERE email = '$email'");
$user_data = mysqli_fetch_assoc($result);

$user_id = $user_data['user_id'];
$customer_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$review_message = mysqli_real_escape_string($conn, $_POST['review_message']);
$rating = intval($_POST['rating']);

if ($rating < 1 || $rating > 5) {
    echo "<script>alert('Invalid rating value.'); window.location.href='../index.php#testimonials';</script>";
    exit();
}

$query = "INSERT INTO testimonials (user_id, customer_name, role, review_message, rating) 
          VALUES ('$user_id', '$customer_name', '$role', '$review_message', '$rating')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Thank you for your testimony!'); window.location.href='../index.php#testimonials';</script>";
} else {
    echo "<script>alert('Failed to save testimony.'); window.location.href='../index.php#testimonials';</script>";
}
?>
