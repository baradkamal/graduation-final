<?php require_once '../src/config/database.php'; ?>
<?php
// Retrieve guest details from form
$full_name = $_POST['guest_name'];
$name_parts = explode(" ", $full_name);
$first_name = $name_parts[0];
$middle_name = isset($name_parts[1]) ? $name_parts[1] : '';
$last_name = isset($name_parts[2]) ? $name_parts[2] : '';
$welcomer_house_no = $_POST['welcomer_house_no'];
$pin = $_POST['pin'];


// Check if the pin already exists in the database
$query = "SELECT COUNT(*) FROM guest_transaction WHERE pin = '$pin'";
$result = mysqli_query($conn, $query);
$count = mysqli_fetch_row($result)[0];

if ($count > 0) {
  // The pin already exists, display an error message
  echo "Error: The pin is already in use. Please choose a different pin.";
} else {
  // Insert guest details into guest_master table
  $query = "INSERT INTO guest_master (Guest_Type, Guest_Fname, Guest_Mname, Guest_Lname) VALUES ('New', '$first_name', '$middle_name', '$last_name')";
  mysqli_query($conn, $query);

  // Retrieve Guest_Details_id of the newly inserted guest
  $guest_details_id = mysqli_insert_id($conn);

  // Create a record in the guest_transaction table
  $query = "INSERT INTO guest_transaction (Guest_id, Guest_details_id, Entry_time, pin, House_no) VALUES (0, '$guest_details_id', NOW(), '$pin', '$welcomer_house_no')";
  mysqli_query($conn, $query);

  // Display a success message
  echo "Guest registered successfully!";
  header("Location: Guest_Registration.php?success=Guest registered successfully!");
    exit;

}
?>