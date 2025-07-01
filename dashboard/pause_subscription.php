<?php
session_start();
include '../auth/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $subscription_id = intval($_POST['subscription_id']);
    $pause_range = $_POST['pause_range']; // Format: "YYYY-MM-DD to YYYY-MM-DD"

    if ($subscription_id <= 0 || empty($pause_range)) {
        $_SESSION['error'] = "Invalid input.";
        header("Location: ../index.php?page=dashboard_user");
        exit;
    }

    $dates = explode(" to ", $pause_range);
    if (count($dates) !== 2) {
        $_SESSION['error'] = "Invalid date format.";
        header("Location: ../index.php?page=dashboard_user");
        exit;
    }

    $start_date = trim($dates[0]);
    $end_date = trim($dates[1]);

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $start_date) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $end_date)) {
        $_SESSION['error'] = "Date format should be YYYY-MM-DD.";
        header("Location: ../index.php?page=dashboard_user");
        exit;
    }

    $update = "UPDATE subscriptions 
               SET status = 'paused', 
                   pause_start_date = '$start_date', 
                   pause_end_date = '$end_date', 
                   updated_at = NOW() 
               WHERE subscription_id = $subscription_id";
    
    if (mysqli_query($conn, $update)) {
        $_SESSION['success'] = "Subscription paused until $end_date.";
    } else {
        $_SESSION['error'] = "Failed to pause subscription.";
    }

    header("Location: ../index.php?page=dashboard_user");
    exit;
}
?>
