<?php require_once '../../src/config/database.php'; ?>
<?php
  // Get the form data
  $notice_sub = $_POST['notice_sub'];
  $notice_desc = $_POST['notice_desc'];
  
  // Insert the notice into the notice_master table
  $insert_notice = "INSERT INTO notice_master (Notice_sub) VALUES ('$notice_sub')";
  mysqli_query($conn, $insert_notice);
  $notice_id = mysqli_insert_id($conn);
  
  // Insert the notice into the notice_transaction table
  $insert_transaction = "INSERT INTO notice_transaction (Notice_id, Description, User_id, Notice_Status) VALUES ('$notice_id', '$notice_desc', '41', '1')";
  mysqli_query($conn, $insert_transaction);
  
  // Close the database connection
  mysqli_close($conn);
  
  // Redirect back to the notice management page
  header("Location: Notices.php");
?>
