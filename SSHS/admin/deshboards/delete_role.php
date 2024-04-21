<?php
  // Establish database connection
  $conn = new mysqli('localhost', 'root', '', 'sshsdb');

  // Delete user record
  $sql = "DELETE FROM role_master WHERE Role_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $_GET['id']);
  $stmt->execute();

  // Close statement
  $stmt->close();

  // Close database connection
  header("Location: Roles.php");
