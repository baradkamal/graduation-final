<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: public/index.php");
    exit();
} else {
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'Admin') {
        header("Location: admin/deshboards/Dashboard.php");
        exit();
    } elseif ($user_type == 'Member') {
        header("Location: member/dashboard.php");
        exit();
    } elseif ($user_type == 'Security') {
        header("Location: Security/Security_dashboard.php");
        exit();
    }
}
?>
