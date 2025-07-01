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

    $query = "UPDATE subscriptions 
              SET status = 'active', 
                  pause_start_date = NULL, 
                  pause_end_date = NULL,
                  reactivated_at = NOW(),
                  updated_at = NOW() 
              WHERE subscription_id = $subscription_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Subscription reactivated successfully.";
    } else {
        $_SESSION['error'] = "Failed to reactivate subscription.";
    }

    header("Location: ../index.php?page=dashboard_user");
    exit;
}
?>
