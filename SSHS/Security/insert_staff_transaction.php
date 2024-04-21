<?php

// Establish a connection to the database
require_once '../src/config/database.php';

if(isset($_POST['passcode'])) {
    $passcode = $_POST['passcode'];
    $sql = "SELECT Staff_details_id FROM staff_master WHERE PassCode='$passcode'";
    $result = $conn->query($sql);
  
    // Check if any rows were returned
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $staff_details_id = $row['Staff_details_id'];
    } else {
      echo "Invalid PassCode entered";
      exit;
    }
  
    // Insert the data into the staff_transaction table
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];
    $house_no = $_POST['house_no'];
    $staff_status = $_POST['staff_status'];
  
    $stmt = $conn->prepare("INSERT INTO staff_transaction (Staff_details_id, Entry_time, Exit_time, House_no, Staff_status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $staff_details_id, $entry_time, $exit_time, $house_no, $staff_status);
  
    if ($stmt->execute()) {
      header("Location: Staff_Registration.php?success2= Staff Transaction successfully");
      exit;
    } else {
      echo "Error: " . $stmt->error;
    }
  
    $stmt->close();
    $conn->close();
  }

?>
