<?php

// Establish a connection to the database
require_once '../src/config/database.php';

// Get form data
$staff_type = $_POST['staff_type'];
$staff_fname = $_POST['staff_fname'];
$staff_mname = $_POST['staff_mname'];
$staff_lname = $_POST['staff_lname'];
$staff_mobile_no = $_POST['staff_mobile_no'];
$passCode = $_POST['PassCode'];
$staff_adharno = $_POST['staff_adharno'];
$staff_designation = $_POST['staff_designation'];
$address = $_POST['address'];
$alternate_address = $_POST['alternate_address'];
$address_area = $_POST['Address_Area'];
$city_id = $_POST['City_Id'];
$emergancy_contact_no = $_POST['Emergancy_Contact_no'];

// Prepare the SQL query
$sql = "INSERT INTO staff_master (Staff_type, Staff_Fname, Staff_Mname, Staff_Lname, Staff_Mobile_no, PassCode, Staff_AdharNo, Staff_Designation, Address, Alternate_Address, Address_Area, City_Id, Emergancy_Contact_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameters to the statement
mysqli_stmt_bind_param($stmt, "ssssisissiiii", $staff_type, $staff_fname, $staff_mname, $staff_lname, $staff_mobile_no, $passCode, $staff_adharno, $staff_designation, $address, $alternate_address, $address_area, $city_id, $emergancy_contact_no);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    // Redirect to success page
    header("Location: Staff_registration.php?success=Staff registered successfully!");
    
    
    exit();
} else {
    // Display error message
    echo "Error: " . mysqli_error($conn);
}

// Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
