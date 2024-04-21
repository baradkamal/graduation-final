<?php require_once '../../src/config/database.php'; ?>
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the complaint data from the form
  
  $complaint_sub = $_POST['complaint_sub'];

  // Insert the complaint data into the database
  $sql = "INSERT INTO complaint_master (Complaint_id, Complaint_sub) VALUES ('', '$complaint_sub')";
  if (mysqli_query($conn, $sql)) {
    echo "Complaint added successfully";
    header("Location: complaints.php");
    exit();
  } else {
    echo "Error adding complaint: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

