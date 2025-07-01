<?php 
include 'auth/check_login.php'; 

$email = $_SESSION['email'];
include 'auth/db_connect.php'; 
$check = "SELECT role FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $check);
$user = mysqli_fetch_assoc($result);

if (!$user || $user['role'] !== 'user') {
    header('Location: index.php');
    exit();
}
$query ="SELECT s.subscription_id, s.fullname_subs, mp.name AS meal_plans, 
        GROUP_CONCAT(DISTINCT smt.meal_type ORDER BY smt.meal_type SEPARATOR ', ') AS meal_types,
        GROUP_CONCAT(DISTINCT ssd.day_of_week ORDER BY ssd.day_of_week SEPARATOR ', ') AS delivery_days,
        s.total_price, s.status, s.pause_start_date, s.pause_end_date 
        FROM subscriptions s
        INNER JOIN mealplans mp ON s.plan_id = mp.plan_id
        INNER JOIN subscriptionmealtypes smt ON s.subscription_id = smt.subscription_id
        INNER JOIN subscriptiondeliverydays ssd ON s.subscription_id = ssd.subscription_id
        INNER JOIN users u ON s.user_id = u.user_id
        WHERE email = '$email' AND s.status != 'canceled'
        GROUP BY s.subscription_id, s.fullname_subs, mp.name, s.total_price, s.status, s.pause_start_date, s.pause_end_date;" ;

$result = mysqli_query($conn, $query);
$total_bill = 0;
$subscriptions = [];
$today = date('Y-m-d');

while ($row = mysqli_fetch_assoc($result)) {
    $pause_start = $row['pause_start_date'];
    $pause_end = $row['pause_end_date'];

    $status_display = 'active';
    $status_message = '';
    $status_badge = '<span class="badge rounded-pill bg-success status-badge"><i class="bi bi-check-circle-fill me-1"></i>Active</span>';

    if ($pause_start && $pause_end) {
        if ($today >= $pause_start && $today <= $pause_end) {
            $status_display = 'paused';
            $status_badge = '<span class="badge rounded-pill bg-warning text-dark status-badge"><i class="bi bi-pause-circle-fill me-1"></i>Paused</span>';
            $status_message = "Paused until&nbsp;<strong>" . date('F j, Y', strtotime($pause_end)) . "</strong>";
        } elseif ($today < $pause_start) {
            $status_display = 'will_pause';
            $status_badge = '<span class="badge rounded-pill bg-info text-dark status-badge"><i class="bi bi-clock-fill me-1"></i>Will Pause</span>';
            $status_message = "Will pause on&nbsp;<strong>" . date('F j, Y', strtotime($pause_start)) . "</strong>&nbsp;to&nbsp;<strong>" . date('F j, Y', strtotime($pause_end)) . "</strong>";
        }
    }

    $row['dynamic_status'] = $status_display;
    $row['status_badge'] = $status_badge;
    $row['status_message'] = $status_message;

    if (in_array($status_display, ['active', 'will_pause'])) {
    $total_bill += $row['total_price']; }

    $subscriptions[] = $row;
}
?>

<div class="container py-5">
    <div class="header mb-5 text-center">
        <h1 class="display-5 fw-bold">Dashboard</h1>
        <p class="lead text-muted">
            Welcome, <strong class="text-dark"><?= htmlspecialchars($_SESSION['full_name']) ?></strong>! Manage your subscriptions here.
        </p>

        <?php if ($total_bill > 0): ?>
            <div class="mt-3">
                <h5 class="text-success fw-bold">Total Active Subscriptions: Rp<?= number_format($total_bill, 0, ',', '.') ?></h5>
            </div>
        <?php endif; ?>
    </div>

    <h2 class="mb-4 fw-bold">My Subscriptions</h2>

    <?php foreach ($subscriptions as $data):
        $sub_id = $data['subscription_id'];
        $name = $data['fullname_subs'];
        $plan = $data['meal_plans'];
        $types = $data['meal_types'];
        $delivery = $data['delivery_days'];
        $status = $data['dynamic_status'];
        $statusBadge = $data['status_badge'];
        $statusMessage = $data['status_message'];
        $isPaused = $status === 'paused';
        $isWillPause = $status === 'will_pause';
        $cardClass = ($isPaused ? 'status-paused ' : '') . 'subscription-card p-4';
        $price_raw = $data['total_price'];
        $price = number_format($price_raw, 0, ',', '.');
    ?>

    <div class="<?= $cardClass ?>">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h4 class="subscription-title mb-1"><?= htmlspecialchars($plan) ?></h4>
                <p class="text-muted mb-0">ID Subscription: #SUB<?= htmlspecialchars($sub_id) ?></p>
            </div>
            <?= $statusBadge ?>
        </div>

        <?php if ($statusMessage): ?>
            <div class="alert alert-<?= $isPaused ? 'warning' : ($isWillPause ? 'info' : 'success') ?> d-flex align-items-center">
                <i class="bi bi-info-circle-fill me-2"></i><?= $statusMessage ?>
            </div>
        <?php endif; ?>

        <div class="details-grid mb-4">
            <div class="detail-item">
                <i class="bi bi-cup-hot-fill icon"></i>
                <strong>Meal Types</strong>
                <span><?= htmlspecialchars($types) ?></span>
            </div>
            <div class="detail-item">
                <i class="bi bi-calendar-week-fill icon"></i>
                <strong>Delivery Days</strong>
                <span><?= htmlspecialchars($delivery) ?></span>
            </div>
            <div class="detail-item">
                <i class="bi bi-tags-fill icon"></i>
                <strong>Weekly Price</strong>
                <span>Rp<?= htmlspecialchars($price) ?></span>
            </div>
        </div>

        <div class="d-flex gap-3">
            <?php if ($isPaused): ?>
                <form method="POST" action="dashboard/reactivate_subscription.php" class="d-inline">
                    <input type="hidden" name="subscription_id" value="<?= $sub_id ?>">
                    <button type="submit" class="btn-custom btn-custom-success">
                        <i class="bi bi-play-fill"></i> Reactivate
                    </button>
                </form>
            <?php else: ?>
                <button class="btn-custom btn-custom-warning" data-bs-toggle="modal" data-bs-target="#pauseModal" data-subscription-id="<?= $sub_id ?>">
                    <i class="bi bi-pause-fill"></i> Pause Subs
                </button>
            <?php endif; ?>

            <button class="btn-custom btn-custom-danger" data-bs-toggle="modal" data-bs-target="#cancelModal" data-subscription-id="<?= $sub_id ?>">
                <i class="bi bi-x-lg"></i> Cancel Subs
            </button>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<!-- Modal Pause -->
<div class="modal fade" id="pauseModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form id="pauseForm" method="POST" action="dashboard/pause_subscription.php">
            <div class="modal-header">
                <h5 class="modal-title">Pause Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="subscription_id" id="pause-sub-id">
                <p>Select the date range to pause your subscription (up to 30 days from today).</p>
                <label for="pauseDateRange" class="form-label">Pause Date Range:</label>
                <input type="text" name="pause_range" id="pauseDateRange" class="form-control" placeholder="Select pause date range">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn-custom btn-custom-primary">Confirm</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Cancel -->
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form id="cancelForm" method="POST" action="dashboard/cancel_subscription.php">
            <div class="modal-header">
                <h5 class="modal-title">Cancel Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="subscription_id" id="cancel-sub-id">
                <p class="fs-5">Are you sure you want to cancel this subscription permanently?</p>
                <p class="text-danger"><strong>Warning:</strong> This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep</button>
                <button type="submit" class="btn-custom btn-custom-danger">Yes, Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
