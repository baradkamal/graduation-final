<?php require_once '../src/config/database.php'; ?>
<?php
  

  // Update record
  $sql = "UPDATE staff_transaction SET Exit_time=NOW() WHERE Staff_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $_GET['id']);
  $stmt->execute();

  // Close statement
  $stmt->close();

  // Close database connection
  $conn->close();

  // Redirect back to index.php
  header("Location: Staff_Registration.php");
  exit();
?>
