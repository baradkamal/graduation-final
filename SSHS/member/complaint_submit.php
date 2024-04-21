<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../public/index.php");
    
    exit;
} ?>
<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);
?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  // Get the complaint details from the form
  $complaint_id = $_POST["complaint_id"];
  $description = $_POST["description"];
  $user_id = $_SESSION['user_id'];
    
  // Insert the complaint into the complaint_transaction table
  $query = "INSERT INTO complaint_transaction (User_id, Complaint_id, Description, Complaint_Status) 
          VALUES ('$user_id', '$complaint_id', '$description', '1')";
  if (mysqli_query($conn, $query)) {
    echo "Complaint submitted successfully.";
    header("location: ../member/Complaint%20Management.php");
    exit;
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

}
?>