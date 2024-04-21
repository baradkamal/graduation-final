<?php
require_once '../src/config/database.php';
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
    $sql = "UPDATE user_master SET Passward='" . $password . "' WHERE Username='" . $username . "'";
    $result = mysqli_query($conn, $sql);
    if ($result === TRUE) {
      $success = "Password reset successful";
    } else {
      $error = "Error updating password: " . mysqli_error($conn);
    }
    $success = 'Password reset successful.';
    // code to update the password in the database or perform other necessary actions
    header('location: ../public/index.php');
    exit;
  }
}
$conn->close();
?>

<!doctype html>
<html>

<head>
  <!-- ... -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="../styles/main.css" rel="stylesheet" type="text/css">

</head>



<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-sm w-full px-4">

      <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="flex justify-center items-center mb-6">
          <img src="../images/logo_black.png" alt="Logo" class="W-10 h-12">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="username">
            Username
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Enter your username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            New Password
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Enter your new password" value="<?php echo htmlspecialchars($password); ?>">
          <?php if (!empty($password_error)) { ?>
            <div><?php echo htmlspecialchars($password_error); ?></div>
          <?php } ?>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            conform New Password
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="confirm_password" type="password" placeholder="Enter your new password" value="<?php echo htmlspecialchars($confirm_password); ?>">
          <?php if (!empty($confirm_password_error)) { ?>
            <div><?php echo htmlspecialchars($confirm_password_error); ?></div>
          <?php } ?>
        </div>
        <?php if (isset($error)) { ?>
          <p class="text-red-500 text-xs italic"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (isset($success)) { ?>
          <p class="text-green-500 text-xs italic"><?php echo $success; ?></p>
        <?php } ?>
        <div class="mb-6">
          <button class="items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="submit">Reset Password</button>
        </div>
        <?php if (!empty($success)) { ?>
          <div><?php echo htmlspecialchars($success); ?></div>
        <?php } ?>
      </form>
    </div>
  </div>



</body>


</html>