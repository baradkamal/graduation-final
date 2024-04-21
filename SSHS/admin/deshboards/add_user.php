<?php $current_url = 'Users';
require_once '../../src/config/database.php';

require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>

<div class="container mx-auto px-4 py-8  dark:text-gray-300">
  <h1 class="text-2xl font-medium mb-4">New User data</h1>
  
  <form method="post" action="update_user_process.php" class="bg-white shadow-md  rounded md:px-24 px-4 pt-6 pb-8 mb-4 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
    <div class="flex flex-wrap -mx-2 mb-4 ">
      <input type="hidden" class="border rounded-md w-full dark:bg-gray-800" name="user_id" value="<?php echo $row['User_id']; ?>">
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_type">User Type</label>
        <select id="user_type" name="user_type" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
          <option >Member</option>
          <option >Admin</option>
          <option >Security</option>
          
        </select>
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="house_no">House Number:</label>
        <input type="text" name="house_no" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/3 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_fname">First Name:</label>
        <input type="text" name="user_fname"  class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_mname">Middle Name:</label>
        <input type="text" name="user_mname"  class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_lname">Last Name:</label>
        <input type="text" name="user_lname" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_mobile_no">Mobile Number:</label>
        <input type="text" name="user_mobile_no" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_email">Email:</label>
        <input type="text" name="user_email" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="username">Username:</label>
        <input type="text" name="username"  class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="passward">Password:</label>
        <input type="text" name="passward" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_address">Address</label>
        <textarea name="user_address" id="user_address" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700" required></textarea>
      </div>

      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="alternate_address"> Alternate Address</label>
        <textarea name="alternate_address" id="alternate_address" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700" required></textarea>

      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="city_id">City ID:</label>
        <input type="text" name="city_id" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700" required>
      </div>
      <div class="w-full md:w-1/2 px-2 mb-4">
        <label class="block font-medium mb-2" for="user_status">User Status</label>
        <select id="user_status" name="user_status" class="py-2 px-3 border rounded-md w-full dark:bg-gray-700">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>

      </div>

    </div>
    <button type="submit" name="submit" value="Update" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Submit
    </button>
  </form>

</div>



<?php require_once '../deshboards/footer.php'; ?>