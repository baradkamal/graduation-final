<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);
?>
<?php require_once '../admin/deshboards/header.php'; ?>
<?php $current_url = 'Bookings';
include('new.php');
?>
<!-- Bookings code start here----------------------------------- -->

<h2 class="my-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  property booking Form
</h2>
<div class=" dark:bg-gray-900">
  <div class="grid grid-cols-10 gap-4">
    <div class="col-span-10 sm:col-span-3">
      <div class="w-full max-w-md mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-800" method="POST" action="Booking_process.php">
          <div class="mb-4">
            <label class="block text-sm text-gray-700 dark:text-gray-400" for="Property_id">Property:</label>
            <div class="relative">
              <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="Property_id" name="Property_id">
                <?php
                $query = "SELECT * FROM property_master";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <option value="<?php echo $row['Property_id']; ?>"><?php echo $row['Property_Name']; ?></option>
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
              <span class="text-gray-700 dark:text-gray-400">Booking Description:</span>
              <input id="Booking_Description" name="Booking_Description" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter booking description" required />
            </label>
          </div>
          <span class="text-gray-700 dark:text-gray-400">Select booking start date and time:</span>
          <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 ">
              <div class="mb-4">
                <input type="datetime-local" name="Booking_time" id="Booking_time" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
              </div>
            </div>
          </div>
          <span class="text-gray-700 dark:text-gray-400">Select booking end date and time:</span>
          <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3">
              <div class="mb-4">
                <input type="datetime-local" name="Booking_end_time" id="Booking_end_time" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
              </div>
            </div>
          </div>
          <div class="flex sm:justify-center justify-end mt-6">
            <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-800">
              book property
            </button>
          </div>
        </form>
      </div>

    </div>
    <div class="col-span-10 sm:col-span-7">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php
          $query = "SELECT b.*, p.Property_name 
          FROM property_booking_transaction b 
          JOIN property_master p ON b.Property_id = p.Property_id
          ORDER BY b.Booking_id DESC";


          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
                <div class="px-4 py-5 sm:p-6">
                  <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                    Booking ID: PB<?php echo $row["Booking_id"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    Property name: <?php echo $row["Property_name"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    Description: <?php echo $row["Booking_Description"]; ?>
                  </div>
                  <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                    booking date : <?php echo $row["Booking_time"]; ?> <br>
                    to this date <?php echo $row["Booking_end_time"]; ?>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
                  <a href="detele_Booking.php?Booking_id=<?php echo $row['Booking_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Edit
                  </a>
                  <a href="detele_Booking.php?id=<?php echo $row['Booking_id']; ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
                  No users found.
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




<!-- Bookings code end  here------------------------------------ -->

<?php require_once '../admin/deshboards/footer.php'; ?>