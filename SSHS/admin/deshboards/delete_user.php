<?php
 // Establish database connection
$conn = new mysqli('localhost', 'root', '', 'sshsdb');

// Update related records in register_transaction table
$sql = "UPDATE register_transaction SET User_id=0 WHERE User_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$sql = "DELETE FROM property_booking_transaction WHERE User_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

// Delete user record
$sql = "DELETE FROM user_master WHERE User_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

// Close statements
$stmt->close();

// Close database connection
$conn->close();

// Redirect to Users.php
header("Location: Users.php");

