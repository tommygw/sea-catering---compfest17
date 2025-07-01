<?php
session_start();
include '../auth/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $subscription_id = intval($_POST['subscription_id']);

    if ($subscription_id <= 0) {
        $_SESSION['error'] = "Invalid subscription ID.";
        header("Location: ../index.php?page=dashboard_user");
        exit;
    }

    $query = "UPDATE subscriptions SET status = 'cancelled', updated_at = NOW() WHERE subscription_id = $subscription_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Subscription has been cancelled.";
    } else {
        $_SESSION['error'] = "Failed to cancel subscription.";
    }

    header("Location: ../index.php?page=dashboard_user");
    exit;
}
?>
