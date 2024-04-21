<?php require_once '../src/config/database.php'; ?>
<?php
  

  // Update record
  $sql = "UPDATE guest_transaction SET exit_time=NOW() WHERE Guest_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $_GET['Guest_id']);
  $stmt->execute();

  // Close statement
  $stmt->close();

  // Close database connection
  $conn->close();

  // Redirect back to index.php
  header("Location: Guest_Registration.php");
  exit();
?>
