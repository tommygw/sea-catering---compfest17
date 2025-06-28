<?php
session_start();
include '../auth/db_connect.php'; 

$email = $_SESSION['email'];
if (!isset($email) || !isset($_POST['submit_subscriptions'])) {
    echo "<script>alert('Unauthorized access. Please log in.'); window.location.href='../index.php';</script>";
    exit();
}
$prices = [
  'Diet Plan' => 30000,
  'Protein Plan' => 40000,
  'Royal Plan' => 60000,
];

$plans = [
  'Diet Plan' => 1,
  'Protein Plan' => 2,
  'Royal Plan' => 3,
];

$result = mysqli_query($conn, "SELECT user_id FROM users WHERE email = '$email'");
$user_data = mysqli_fetch_assoc($result);
$user_id = $user_data['user_id'];


$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$phone = mysqli_real_escape_string($conn, $_POST['tel']);
$plan = mysqli_real_escape_string($conn, $_POST['plan']);
$allergies = mysqli_real_escape_string($conn, $_POST['allergies'] ?? '');
$meal_types = $_POST['meal_type'] ?? [];
$delivery_days = $_POST['delivery_days'] ?? [];

$meals_per_day = count($_POST['meal_type'] ?? []);
$days_selected = count($_POST['delivery_days'] ?? []);
$meals_price = $prices[$plan];
$plan_id = $plans[$plan];
$total_price = $meals_price * $meals_per_day * $days_selected * 4.3;

$meals_per_day = count($meal_types);
$days_per_week = count($delivery_days);
$total_price = $meals_price * $meals_per_day * $days_per_week * 4.3; 

$sql = "INSERT INTO subscriptions ( user_id, plan_id, phone_number, allergies, total_price, status, created_at, updated_at)
        VALUES ( $user_id, $plan_id, '$phone', '$allergies', $total_price, 'active', NOW(), NOW())";

if (mysqli_query($conn, $sql)) {
    $subscription_id = mysqli_insert_id($conn);

        foreach ($meal_types as $meal) {
        $meal = mysqli_real_escape_string($conn, $meal);
        $sql_meal = "INSERT INTO subscriptionmealtypes (subscription_id, meal_type)
                     VALUES ($subscription_id, '$meal')";
        mysqli_query($conn, $sql_meal);
    }

        foreach ($delivery_days as $day) {
        $day = mysqli_real_escape_string($conn, $day);
        $sql_day = "INSERT INTO subscriptiondeliverydays (subscription_id, day_of_week)
                    VALUES ($subscription_id, '$day')";
        mysqli_query($conn, $sql_day);
    }

    echo "<script>alert('Subscriptions Success'); window.location.href='../dashboard_user.php';</script>";
} else {
    echo "<script>alert('Failed to Subscribe.'); window.location.href='../index.php';</script> " . mysqli_error($conn);
}

?>