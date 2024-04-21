<?php
session_start();
 ?>
<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);
?>
<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Get form data
  $Property_id = $_POST['Property_id'];
  $Booking_Description = $_POST['Booking_Description'];
  $Booking_time = date('Y-m-d H:i:s', strtotime($_POST['Booking_time'] ));
  $Booking_end_time = date('Y-m-d H:i:s', strtotime($_POST['Booking_end_time'] ));
  $User_id = $_SESSION['user_id']; // replace with the actual user ID
  
  // Prepare insert statement
  $sql = "INSERT INTO property_booking_transaction (Property_id, User_id, Booking_time, Booking_end_time, Booking_Description, P_booking_Status)
          VALUES ('$Property_id', '$User_id', '$Booking_time', '$Booking_end_time', '$Booking_Description', 0)";
  
  // Execute insert statement
  if (mysqli_query($conn, $sql)) {
    echo "Booking created successfully";
    header("location: ../member/Property Booking.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  // Close database connection
  mysqli_close($conn);
}
?>


