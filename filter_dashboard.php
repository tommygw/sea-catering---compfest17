<?php
$start = $_GET['start'] ?? null;
$end = $_GET['end'] ?? null;

if ($start && $end) {
    header("Location: index.php?page=dashboard_admin&start=$start&end=$end");
    exit();
} else {
    header("Location: index.php?page=dashboard_admin");
    exit();
}
