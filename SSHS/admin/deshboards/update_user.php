<?php $current_url = 'Users';
require_once '../../src/config/database.php';

require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>

<?php

// Retrieve record to be updated
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user_master WHERE User_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Close statement
$stmt->close();
?>

<div class="container mx-auto px-4 py-8  dark:text-gray-300">
  <h1 class="text-2xl font-medium mb-4">Update your data</h1>
  <p class="text-base mb-8">Fill out the form below to update your database entry.</p>
  <form method="post" action="update_user_process.php" class="bg-white shadow-md  rounded md:px-24 px-4 pt-6 pb-8 mb-4 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
    <div class="flex flex-wrap -mx-2 mb-4 ">
      <input type="hidden" name="user_id" value="<?php echo $row['User_id']; ?>">
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_type">User Type</label>
        <select id="user_type" name="user_type" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
          <option <?php if ($row['User_Type'] == 'Member') echo 'selected'; ?>>Member</option>
          <option <?php if ($row['User_Type'] == 'Admin') echo 'selected'; ?>>Admin</option>
          <option <?php if ($row['User_Type'] == 'Security') echo 'selected'; ?>>Security</option>
          <option <?php if ($row['User_Type'] == 'Other') echo 'selected'; ?>>Other</option>
        </select>
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="house_no">House Number:</label>
        <input type="text" name="house_no" value="<?php echo $row['House_no']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/3 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_fname">First Name:</label>
        <input type="text" name="user_fname" value="<?php echo $row['User_Fname']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_mname">Middle Name:</label>
        <input type="text" name="user_mname" value="<?php echo $row['User_Mname']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_lname">Last Name:</label>
        <input type="text" name="user_lname" value="<?php echo $row['User_Lname']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_mobile_no">Mobile Number:</label>
        <input type="text" name="user_mobile_no" value="<?php echo $row['User_Mobile_no']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_email">Email:</label>
        <input type="text" name="user_email" value="<?php echo $row['User_Email']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $row['Username']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="passward">Password:</label>
        <input type="text" name="passward" value="<?php echo $row['Passward']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_address">Address</label>
        <textarea name="user_address" id="user_address" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out" required><?php echo $row['User_Address']; ?></textarea>
      </div>

      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="alternate_address"> Alternate Address</label>
        <textarea name="alternate_address" id="alternate_address" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out" required><?php echo $row['Alternate_Address']; ?></textarea>

      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="city_id">City ID:</label>
        <input type="text" name="city_id" value="<?php echo $row['City_Id']; ?>" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out" required>
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_status">User Status</label>
        <select id="user_status" name="user_status" class="block w-full p-2 bg-gray-100 rounded border border-gray-300 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out">
          <option value="1" <?php if ($row['User_Status'] == 1) echo "selected"; ?>>Active</option>
          <option value="0" <?php if ($row['User_Status'] == 0) echo "selected"; ?>>Inactive</option>
        </select>

      </div>

    </div>
    <button type="submit" name="submit" value="Update" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Update
    </button>
  </form>

</div>



<?php require_once '../deshboards/footer.php'; ?>