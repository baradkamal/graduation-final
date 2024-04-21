<?php
  // Establish database connection
  $conn = new mysqli('localhost', 'root', '', 'sshsdb');

  // Delete user record
  $sql = "DELETE FROM complaint_master WHERE Complaint_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $_GET['id']);
  $stmt->execute();

  // Close statement
  $stmt->close();

  // Close database connection
  header("Location: Complaints.php");
?>