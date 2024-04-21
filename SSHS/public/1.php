<?php
// initialize variables
$password = '';
$confirm_password = '';
$password_error = '';
$confirm_password_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get input values
  $username = $_POST["username"];
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  // validate password field
  if (empty($password)) {
    $password_error = 'Password is required.';
  } elseif (strlen($password) < 8) {
    $password_error = 'Password must be at least 8 characters long.';
  }

  // validate confirm password field
  if (empty($confirm_password)) {
    $confirm_password_error = 'Please confirm your password.';
  } elseif ($password !== $confirm_password) {
    $confirm_password_error = 'Passwords do not match.';
  }

  // if there are no errors, process form data
  if (empty($password_error) && empty($confirm_password_error)) {
    $sql = "UPDATE user_master SET Passward='$password' WHERE Username='$username'";
    $result = $conn->query($sql);
    if ($result === TRUE) {
      $success = "Password reset successful";
     // header('location: ../public/index.php');
    } else {
      $error = "Error updating password: " . $conn->error;
    }
    $success = 'Password reset successful.';
    // code to update the password in the database or perform other necessary actions
  }
}
?>

<form method="POST">
  <div>
    <label for="password">New Password:</label>
    <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
    <?php if (!empty($password_error)) { ?>
      <div><?php echo htmlspecialchars($password_error); ?></div>
    <?php } ?>
  </div>
  <div>
    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" value="<?php echo htmlspecialchars($confirm_password); ?>">
    <?php if (!empty($confirm_password_error)) { ?>
      <div><?php echo htmlspecialchars($confirm_password_error); ?></div>
    <?php } ?>
  </div>
  <div>
    <button type="submit" name="submit">Reset Password</button>
  </div>
  <?php if (!empty($success)) { ?>
    <div><?php echo htmlspecialchars($success); ?></div>
  <?php } ?>
</form>
