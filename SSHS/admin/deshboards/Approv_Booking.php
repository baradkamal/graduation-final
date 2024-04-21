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
if (isset($_GET['id'])) {
    $Booking_id = $_GET['id'];

    // Update the status of the complaint in the database
    $query = "UPDATE property_booking_transaction SET P_booking_Status = '1' WHERE Booking_id = '$Booking_id'";
    mysqli_query($conn, $query);

    // Redirect back to the complaints page
    header("Location: Bookings.php");
    exit();
} else {
    // Redirect back to the complaints page if no complaint ID is provided
    header("Location: Bookings.php");
    exit();
}


?>


