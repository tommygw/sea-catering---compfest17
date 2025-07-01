<?php
include 'auth/check_login.php';
include 'auth/db_connect.php';

$email = $_SESSION['email'];
$result = mysqli_query($conn, "SELECT role FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($result);

if (!$user || $user['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$messages = mysqli_query($conn, $query);
?>

<div class="container py-5">
    <h2 class="mb-4">Inbox - Contact Messages</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Sender</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Received At</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($messages)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                    <td><?= date('d M Y H:i', strtotime($row['created_at'])) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
