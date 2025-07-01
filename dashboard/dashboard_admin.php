<?php
include 'auth/check_login.php'; 
include 'auth/db_connect.php'; 

$email = $_SESSION['email'];
$query = "SELECT role FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user || $user['role'] !== 'admin') {
    header('Location: index.php'); 
    exit();
}

$start_date = $_GET['start'] ?? date('Y-m-01'); 
$end_date = $_GET['end'] ?? date('Y-m-t'); 

$newSubsQuery = "SELECT COUNT(*) AS total FROM subscriptions WHERE created_at BETWEEN '$start_date' AND '$end_date'";
$mrrQuery = "SELECT SUM(total_price) AS mrr FROM subscriptions WHERE status = 'active' AND created_at BETWEEN '$start_date' AND '$end_date'";
$reactivatedQuery = "SELECT COUNT(*) AS total FROM subscriptions WHERE reactivated_at BETWEEN '$start_date' AND '$end_date'";
$activeTotalQuery = "SELECT COUNT(*) AS total FROM subscriptions WHERE status = 'active'";

$newSubs = mysqli_fetch_assoc(mysqli_query($conn, $newSubsQuery))['total'];
$mrr = mysqli_fetch_assoc(mysqli_query($conn, $mrrQuery))['mrr'] ?? 0;
$reactivated = mysqli_fetch_assoc(mysqli_query($conn, $reactivatedQuery))['total'];
$activeTotal = mysqli_fetch_assoc(mysqli_query($conn, $activeTotalQuery))['total'];

$query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$contacts = mysqli_query($conn, $query);

?>

<div class="container py-5">
    <div class="dashboard-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="display-6 fw-bold">Admin Dashboard</h1>
            <p class="lead text-muted mb-0">Monitor your business performance and subscription metrics.</p>
        </div>
        <i class="bi bi-graph-up-arrow" style="font-size: 3rem;"></i>
    </div>

    <div class="filter-controls d-flex align-items-center mb-4">
        <label class="form-label fw-bold mb-0">Filter by Date:</label>
        <div id="date-range-picker" class="ms-3" style="cursor: pointer;">
            <i class="bi bi-calendar3 me-2"></i>
            <span><?= date('M d, Y', strtotime($start_date)) ?> - <?= date('M d, Y', strtotime($end_date)) ?></span>
        </div>

        <form method="GET" action="index.php" id="dateRangeForm" class="ms-3">
            <input type="hidden" name="page" value="dashboard_admin">
            <input type="hidden" name="start" id="startDate" value="<?= $start_date ?>">
            <input type="hidden" name="end" id="endDate" value="<?= $end_date ?>">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-funnel-fill"></i> Apply
            </button>
        </form>
        <a href="index.php?page=contact_inbox" class="btn btn-outline-primary ms-auto mt-3">
            <i class="bi bi-envelope"></i> View Contact Messages
        </a>
    </div>


    <div class="row g-4">
        <div class="col-md-3"><div class="bg-white p-4 rounded shadow"><h5>New Subscriptions</h5><p class="fs-4 fw-bold"><?= $newSubs ?></p></div></div>
        <div class="col-md-3"><div class="bg-white p-4 rounded shadow"><h5>MRR (Revenue)</h5><p class="fs-4 fw-bold">Rp <?= number_format($mrr, 0, ',', '.') ?></p></div></div>
        <div class="col-md-3"><div class="bg-white p-4 rounded shadow"><h5>Reactivations</h5><p class="fs-4 fw-bold"><?= $reactivated ?></p></div></div>
        <div class="col-md-3"><div class="bg-white p-4 rounded shadow"><h5>Active Subscribers</h5><p class="fs-4 fw-bold"><?= $activeTotal ?></p></div></div>
    </div>
</div>


