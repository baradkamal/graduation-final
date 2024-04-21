<?php require_once '../includes/header.php'; ?>
<!-- Register form -->
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
    $user_status = $_POST["user_status"];; // default status for new user is active
    
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
<body>
<section>
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-medium mb-4">Update your data</h1>
    <p class="text-base mb-8">Fill out the form below to update your database entry.</p>
    <form method="post" action="signup.php" class="bg-white shadow-md rounded md:px-24 px-4 pt-6 pb-8 mb-4">
      <div class="flex flex-wrap -mx-2 mb-4">
        <div class="w-full px-2 mb-4">
          <label class="block font-medium mb-2" for="user_type">User Type</label>
          <select id="user_type" name="user_type" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out" required>
            <option>Member</option>
            <option>Admin</option>
            <option>Security</option>
            <option>Other</option>
          </select>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_fname">First Name</label>
          <input type="text" name="user_fname" id="user_fname" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_mname">middle name</label>
          <input type="text" name="user_mname" id="user_mname" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_lname">Last name</label>
          <input type="text" name="user_lname" id="user_lname" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_mobile">Mobile No:</label>
          <input type="tel" name="user_mobile" id="user_mobile" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="username">Username</label>
          <input type="text" id="username" name="username" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/3 px-2 mb-4">
          <label class="block font-medium mb-2" for="password">Password</label>
          <input type="password" id="password" name="password" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_status">User Status</label>
          <select id="user_status" name="user_status" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
          <option value="1">Active</option>
            <option value="0">Inactive</option>
            
          </select>
          
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="house_no">House Number</label>
          <input  type="number" name="house_no" id="house_no" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_address">Address</label>
          <textarea name="user_address" id="user_address" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required></textarea>
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="alternate_address"> Alternate Address</label>
          <textarea name="alternate_address" id="alternate_address" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required></textarea>
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="city_id"> City ID</label>
          <input id="city_id" type="text" name="city_id" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        <div class="w-full md:w-1/2 px-2 mb-4">
          <label class="block font-medium mb-2" for="user_email">Email</label>
          <input type="email" name="user_email" id="user_email" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out"required>
        </div>
        
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Register
      </button>
    </form>

  </div>
</section>




</body>
                </html>