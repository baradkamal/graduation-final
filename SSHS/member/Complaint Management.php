<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);

?>

<?php require_once '../admin/deshboards/header.php'; ?>
<?php $current_url = 'Complaints';
include('new.php');
?>


<!-- Complaints code start here----------------------------------- -->



<h2 class="my-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Society Complaint Form
</h2>
<div class=" dark:bg-gray-900">
  <div class="grid grid-cols-10 gap-4">
    <div class="col-span-10 sm:col-span-3">
      <div class="w-full max-w-md mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-800" method="POST" action="complaint_submit.php">
          <div class="mb-4">
            <label class="block text-sm text-gray-700 dark:text-gray-400" for="complaint_id">Complaint Subject:</label>
            <div class="relative">
              <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="complaint_id" name="complaint_id">
                <?php
                $query = "SELECT * FROM complaint_master";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <option value="<?php echo $row['Complaint_id']; ?>"><?php echo $row['Complaint_sub']; ?></option>
                <?php } ?>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                  <path d="M7 10l5 5 5-5z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400" for="description">Description:</span>
              <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter booking description" id="description" name="description"></textarea>

            </label>
          </div>
          <div class="flex sm:justify-center justify-end mt-6">
            <button type="submitcom" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-800">
              Submit Complaint
            </button>
          </div>
        </form>
      </div>

    </div>
    <div class="col-span-10 sm:col-span-7">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php

          $query = "SELECT ct.*, um.User_Fname, um.User_Lname 
          FROM `complaint_transaction` ct 
          JOIN `user_master` um ON ct.User_id = um.User_id 
          WHERE ct.User_id = " . $_SESSION['user_id'] . "
          ORDER BY ct.C_id DESC;";

          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
                <div class="px-4 py-5 sm:p-6">
                  <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                    Complaint ID: CI<?php echo $row["C_id"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    Complaint Description: <?php echo $row["Description"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    Complaint Time: <?php echo date('F j, Y \a\t g:i a', strtotime($row["Complaint_time"])) ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    member Name:(you) <?php echo $row["User_Fname"] . " " . $row["User_Lname"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    Complaint Status: <?php if ($row["Complaint_Status"] == 0) {
                                        echo "<span class='text-red-700 dark:bg-red-700 dark:text-red-100 px-2 py-1 font-semibold leading-tight bg-red-100 rounded-full'>Closed</span>";
                                      } elseif ($row["Complaint_Status"] == 1) {
                                        echo "<span class='text-green-700 dark:bg-green-700 dark:text-green-100 px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full'>Open</span>";
                                      } elseif ($row["Complaint_Status"] == 2) {
                                        echo "<span class='text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100 px-2 py-1 font-semibold leading-tight bg-yellow-100 rounded-full'>Pending</span>";
                                      } ?>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
                  <a href="delete_complaint.php?id=<?php echo $row['C_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Delete
                  </a>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<div class='bg-white overflow-hidden shadow rounded-lg'>
            <div class='px-4 py-5 sm:p-6'>
              <p class='text-sm font-medium text-gray-900'>
                No complaints found.
              </p>
            </div>
          </div>";
          }
          ?>
        </div>


      </div>
    </div>
  </div>

</div>

<!-- Complaints end start here------------------------------------ -->

<?php require_once '../admin/deshboards/footer.php'; ?>