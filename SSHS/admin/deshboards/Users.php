<?php $current_url = 'Users';
require_once '../../src/config/database.php';

require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>



<!-- CTA -->


<!-- With avatar -->


<!-- With actions -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Mangae User and Member
  </h2>
<div class="mb-3 px-4 py-2 bg-gray-50 text-right sm:px-6 bg-white rounded-lg dark:bg-gray-900">
    <div class=" items-right">
      <a href="add_user.php">
      <button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Add user</button>
      </a>
    </div>
  </div>
<div class="w-full  overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap" id="myTable">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">User ID</th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Phone</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <?php
        $query = "SELECT * FROM user_master";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='text-gray-700 dark:text-gray-400'>";
            echo "<td class='px-4 py-3 text-sm dark:bg-gray-800'>" . $row["User_id"] . "</td>";
            echo "<td class='px-4 py-3 text-sm dark:bg-gray-800'>" . $row["User_Fname"] . " " . $row["User_Mname"] . " " . $row["User_Lname"] . "</td>";
            echo "<td class='px-4 py-3 text-sm dark:bg-gray-800'>" . $row["User_Email"] . "</td>";
            echo "<td class='px-4 py-3 text-xs dark:bg-gray-800'>" ?>
            <span class='<?php if ($row["User_Status"] == true) echo "text-green-700 dark:bg-green-700 dark:text-green-100";
                          else echo "text-red-700 dark:bg-red-700 dark:text-red-100"; ?> px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full '>
              <?php

              if ($row["User_Status"] == true) {

                echo " active";
              } else {
                echo " deactive";
              }
              ?>
            </span>
            <?php
            echo " </td>";
            echo "<td class='px-4 py-3 text-sm dark:bg-gray-800'>" . $row["User_Mobile_no"] . "</td>";
            echo "<td class='px-4 py-3 dark:bg-gray-800'>";
            ?>

            <a href="update_user.php?user_id=<?php echo $row['User_id']; ?>">
              <?php
              echo "<div class='flex items-center space-x-4 text-sm'>
              <button class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' aria-label='Edit'>
                <svg class='w-5 h-5' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
                  <path d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'></path>
                </svg>
              </button></a>
              </a>"; ?>
              <a href="delete_user.php?id=<?php echo $row['User_id']; ?>">
            <?php
            echo "<button class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' aria-label='Delete'>
                <svg class='w-5 h-5' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
                  <path fill-rule='evenodd' d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z' clip-rule='evenodd'></path>
                </svg>
              </button>
              </a>
            </div>
          </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4' class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>No users found.</td></tr>";
        }
            ?>
      </tbody>
    </table>
  </div>
</div>















<?php require_once '../deshboards/footer.php'; ?>