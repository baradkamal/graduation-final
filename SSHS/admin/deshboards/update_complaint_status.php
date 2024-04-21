<?php
// Start session
session_start();

// Include database connection
require_once '../../src/config/database.php';

// Check if user is logged in
/*if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}*/

// Get the complaint ID from the URL parameter
if (isset($_GET['C_id'])) {
    $complaint_id = $_GET['C_id'];

    // Update the status of the complaint in the database
    $query = "UPDATE complaint_transaction SET Complaint_Status = '2' WHERE C_id = '$complaint_id'";
    mysqli_query($conn, $query);

    // Redirect back to the complaints page
    header("Location: complaints.php");
    exit();
} else {
    // Redirect back to the complaints page if no complaint ID is provided
    header("Location: complaints.php");
    exit();
}
?>
