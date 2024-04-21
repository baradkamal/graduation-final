<?php

// Load database config files
require_once '../src/config/database.php';

$login = false;
$showError = false;
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM user_master WHERE Username='$username' AND Passward='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_type = $row['User_Type'];

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $row['User_id'];
    $_SESSION['House_no'] = $row['House_no'];
    $_SESSION['user_type'] = $row['User_Type'];

    if ($user_type == 'Admin') {
      header('location: ../admin/deshboards/Dashboard.php');
    } elseif ($user_type == 'Member') {
      header('location: ../member/dashboard.php');
    } elseif ($user_type == 'Security') {
      header('location: ../Security/Security_dashboard.php');
    } else {
      $showError = "invalid user type";
    }

    $login = true;
  } else {
    $showError = "invalid";
  }



  // check if username is empty
  if (empty($username)) {
    $usernameErr = "Username is required";
  } else {
    // check if username contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }

  // check if password is empty
  if (empty($password)) {
    $passwordErr = "Password is required";
  } else {
    // check if password contains at least 8 characters
    if (strlen($password) < 8) {
      $passwordErr = "Password must be at least 8 characters";
    }
  }

  // if no validation errors, process the form
  if (empty($usernameErr) && empty($passwordErr)) {
    // perform login logic here
  }
}


// helper function to sanitize input data
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
          <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" value="<?php echo $username; ?>">
          <?php if (isset($usernameErr)) { ?>
            <p class="text-red-500 text-xs italic"><?php echo $usernameErr; ?></p>
          <?php } ?>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
          <?php if (isset($passwordErr)) { ?>
            <p class="text-red-500 text-xs italic"><?php echo $passwordErr; ?></p>
          <?php } ?>
        </div>
        <div class="mb-6">
          <button class="items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="submit">Sign In</button>
        </div>
        <div class="grid grid-cols-2 gap-14">
          <div class="text-sm text-gray-700 text-center">
            <a href="forgot_password.php" class="inline-block mt-2 hover:text-purple-500">Forgot password?</a>
          </div>
          <div class="text-sm text-gray-700 text-center">
            <a href="newreg.php" class="inline-block mt-2 hover:text-purple-500">register member?</a>
          </div>
        </div>
      </form>
    </div>
  </div>



</body>

</html>