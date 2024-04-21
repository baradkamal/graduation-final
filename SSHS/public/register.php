<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sshsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO user_master (User_Type, House_no, User_Fname, User_Mname, User_Lname, User_Mobile_no, Username, Passward, User_Email, User_Address, Alternate_Address, City_Id, User_Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissssssssssi", $user_type, $house_no, $user_fname, $user_mname, $user_lname, $user_mobile, $username, $password, $user_email, $user_address, $alternate_address, $city_id, $user_status);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Set parameters from form data
  $user_type = $_POST["user_type"];
  $house_no = $_POST["house_no"];
  $user_fname = $_POST["user_fname"];
  $user_mname = $_POST["user_mname"];
  $user_lname = $_POST["user_lname"];
  $user_mobile = $_POST["user_mobile"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $user_email = $_POST["user_email"];
  $user_address = $_POST["user_address"];
  $alternate_address = $_POST["alternate_address"];
  $city_id = $_POST["city_id"];
  $user_status = 1; // default status for new user is active

  // Execute statement and display success message
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
}

// Close statement and database connection
$stmt->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tailwind Admin Starter Template : Tailwind Toolbox</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>
<!-- HTML form for user registration -->

<body>
  <div class="min-h-screen flex items-center justify-center">
    <div class="w-full ">
      <div class="flex justify-center items-center mb-6">
        <img src="../images/logo_black.png" alt="Logo" class="W-10 h-12">
      </div>
      <form method="post" action="register.php" class="bg-white shadow-md  rounded px-8 pt-6 pb-8 mb-4">
        <div class="py-2">
          <label for="user_type" class="block text-gray-700 font-bold mb-2">User Type</label>
          <select name="user_type" id="user_type" class="form-select block w-full border-gray-300 rounded-md shadow-sm">
            <option value="regular">Regular</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <div class="py-2">
          <label for="house_no" class="block text-gray-700 font-bold mb-2">House Number</label>
          <input type="number" name="house_no" id="house_no" class="form-input block w-full rounded-md border-gray-300 shadow-sm" placeholder="123" required>
        </div>

        <div class="py-2">
          <label for="user_fname" class="block text-gray-700 font-bold mb-2">First Name</label>
          <input type="text" name="user_fname" id="user_fname" class="form-input block w-full rounded-md border-gray-300 shadow-sm" placeholder="enter firstname" required>
        </div>
        <div class="py-2">
          <label for="user_mname" class="block text-gray-700 font-bold mb-2">middle name</label>
          <input type="text" name="user_mname" id="user_mname" class="form-input block w-full rounded-md border-gray-300 shadow-sm" placeholder="enter middlename" required>
        </div>

        <div class="py-2">
          <label for="user_lname" class="block text-gray-700 font-bold mb-2">Last name</label>
          <input type="text" name="user_lname" id="user_lname" class="form-input block w-full rounded-md border-gray-300 shadow-sm" placeholder="enter lastname" required>
        </div>
        <div>
          <label for="user_mobile" class="block text-gray-700 font-bold mb-2">Mobile No:</label>
          <input type="tel" name="user_mobile" id="user_mobile" class="w-full border-gray-300 px-3 py-2 mb-4 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" pattern="[0-9]{10}" required>
        </div>

        <div class="py-2">
          <label for="username" class="block text-gray-700 font-bold mb-2">username</label>
          <input type="text" name="username" id="username" class="form-input block w-full rounded-md border-gray-300 shadow-sm" placeholder="enter you username" required>
        </div>
        <div class="mb-4">
          <label class="block font-bold mb-2" for="password">Password</label>
          <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
        </div>
        <div class="mb-4">
          <label class="block font-bold mb-2" for="user_email">Email</label>
          <input class="border border-gray-400 p-2 w-full" type="email" name="user_email" id="user_email" required>
        </div>
        <div class="mb-4">
          <label class="block font-bold mb-2" for="user_address">Address</label>
          <textarea class="border border-gray-400 p-2 w-full" name="user_address" id="user_address" required></textarea>
        </div>
        <div class="mt-4">
          <label class="block text-gray-700 font-bold mb-2" for="alternate_address">
            Alternate Address
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alternate_address" type="text" placeholder="Alternate Address" name="alternate_address">
        </div>

        <div class="mt-4">
          <label class="block text-gray-700 font-bold mb-2" for="city_id">
            City ID
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city_id" type="text" placeholder="City ID" name="city_id">
        </div>

        <div class="mt-4">
          <label class="block text-gray-700 font-bold mb-2" for="user_status">
            User Status
          </label>
          <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_status" name="user_status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Register
        </button>



      </form>

    </div>
  </div>
</body>

</html>