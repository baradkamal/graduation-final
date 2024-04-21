<?php
require_once '../src/config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];

  $sql = "SELECT User_id FROM user_master WHERE Username='" . $username . "' AND User_Email='" . $email . "'"; // is query me hum user_id select kar rahe he jaha pe username nad email same ho.
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { // yaha pe hum dekh rahe ki query ka result 0 se jyada ho like koe to data mila agar nai mila to else vala error dikhega
    header('location: ../public/reset_password.php');
    exit;
  } else { // agar upar vala ek bhi result nai milega database me se to ye vala error show hoga
    $error = "Invalid username or email";
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
          <label class="block text-gray-700 font-bold mb-2" for="email">
            Email
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        </div>
        <?php if (isset($error)) { ?>
          <p class="text-red-500 text-xs italic"><?php echo $error; ?></p>
        <?php } ?>
        <div class="mb-6">
          <button class="items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="submit">Reset Password</button>
        </div>
        
      </form>
    </div>
  </div>



</body>






</html>