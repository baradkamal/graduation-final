<?php
  // Establish database connection
  $conn = new mysqli('localhost', 'root', '', 'sshsdb');

  // Update record
  $sql = "UPDATE user_master SET User_Type=?, House_no=?, User_Fname=?, User_Mname=?, User_Lname=?, User_Mobile_no=?, Username=?, Passward=?, User_Email=?, User_Address=?, Alternate_Address=?, City_Id=?, User_Status=? WHERE User_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sisssissssssis", $_POST['user_type'], $_POST['house_no'], $_POST['user_fname'], $_POST['user_mname'], $_POST['user_lname'], $_POST['user_mobile_no'], $_POST['username'], $_POST['passward'], $_POST['user_email'], $_POST['user_address'], $_POST['alternate_address'], $_POST['city_id'], $_POST['user_status'], $_POST['user_id']);
  $stmt->execute();

  // Close statement
  $stmt->close();

  // Close database connection
  $conn->close();

  // Redirect back to index.php
  header("Location: Users.php");
  exit();
?>
