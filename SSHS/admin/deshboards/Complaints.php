<?php $current_url = 'Complaints';
require_once '../../src/config/database.php';
require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>

<!-- complaints code start here -->
<div>


<script>
  const formWrapper = document.getElementById("addRoleFormWrapper");
  const form = document.getElementById("addRoleForm");
  const overlay = document.getElementById("overlay");

  function showInputField() {
    overlay.style.display = "relative";
  }

  function hideInputField() {
    overlay.style.display = "none";
  }
</script>
</div>

                    
<h4 class="mb-4 pt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    manage complaints
  </h4>
 <!--
<div class="w-1/2 overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">Complaint ID</th>
          <th class="px-4 py-3">Complaint Subject</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
      <?php
        $sql = "SELECT * FROM complaint_master";
        $result = mysqli_query($conn, $sql);

        // Check if any complaints were found
        if (mysqli_num_rows($result) > 0) {
          // Loop through each complaint and display the data
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='text-gray-700 dark:text-gray-400'>";
            echo "<td class='px-4 py-3 text-sm'>" . $row["Complaint_id"] . "</td>";
            echo "<td class='px-4 py-3 text-sm'>" . $row["Complaint_sub"] . "</td>";
            echo "<td class='px-4 py-3'>
              <a href='edit_complaint.php?id=" . $row["Complaint_id"] . "' class='text-indigo-600 hover:text-indigo-900'>Edit</a>
              <span class='text-gray-300 mx-2'>|</span>
              <a href='delete_complaint.php?id=" . $row["Complaint_id"] . "' class='text-red-600 hover:text-red-900'>Delete</a>
              </td>";
            echo "</tr>";
          }
        } else {
          // Display a message if no complaints were found
          echo "<tr><td colspan='3' class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>No complaints found.</td></tr>";
        }
      ?>
      </tbody>
    </table>
  </div>
</div> -->





<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="px-4 py-5 sm:p-6">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    All complaints
  </h4>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php
    $query = "SELECT ct.*, um.User_Fname, um.User_Lname 
    FROM `complaint_transaction` ct 
    JOIN `user_master` um ON ct.User_id = um.User_id;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
          <div class="px-4 py-5 sm:p-6">
            <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
              Complaint ID: <?php echo $row["C_id"]; ?>
            </div>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
              Complaint Description: <?php echo $row["Description"]; ?>
            </div>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
              Complaint Time: <?php echo date('F j, Y \a\t g:i a', strtotime($row["Complaint_time"])) ?>
            </div>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
              User ID: <?php echo $row["User_id"]; ?>
            </div>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
              User Name: <?php echo $row["User_Fname"] . " " . $row["User_Lname"]; ?>
            </div>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
              Complaint Status: <?php  if ($row["Complaint_Status"] == 0) {
              echo "<span class='text-red-700 dark:bg-red-700 dark:text-red-100 px-2 py-1 font-semibold leading-tight bg-red-100 rounded-full'>Closed</span>";
            } elseif ($row["Complaint_Status"] == 1) {
              echo "<span class='text-green-700 dark:bg-green-700 dark:text-green-100 px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full'>Open</span>";
            } elseif ($row["Complaint_Status"] == 2) {
              echo "<span class='text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100 px-2 py-1 font-semibold leading-tight bg-yellow-100 rounded-full'>Pending</span>";
            } ?>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
            <a href="update_complaint_status.php?C_id=<?php echo $row['C_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              Update Status
            </a>
            <a href="change_complaint_status.php?C_id=<?php echo $row['C_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
              close
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




<div class="w-full overflow-x-auto">
<h4 class="mb-4 pt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    view close complaints
  </h4>
  <table class="w-full whitespace-no-wrap">
    <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
        <th class="px-4 py-3">Complaint ID</th>
        <th class="px-4 py-3">user id</th>
        <th class="px-4 py-3">user Name</th>
        <th class="px-4 py-3">Description</th>
        <th class="px-4 py-3">Complaint time</th>
        <th class="px-4 py-3">Status</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
      <?php
      
      $query = "SELECT ct.*, um.User_Fname, um.User_Lname 
          FROM `complaint_transaction` ct 
          JOIN `user_master` um ON ct.User_id = um.User_id 
          WHERE ct.`Complaint_Status` = 0;";


      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr class='text-gray-700 dark:text-gray-400'>";
          echo "<td class='px-4 py-3 text-sm'>" . $row["Complaint_id"] . "</td>";
          echo "<td class='px-4 py-3 text-sm'>" . $row["User_id"] . "</td>";
          echo "<td class='px-4 py-3 text-sm'>" . $row["User_Fname"] . " " . $row["User_Lname"]. "</td>";
          echo "<td class='px-4 py-3 text-sm'>" . $row["Description"] . "</td>";
          echo "<td class='px-4 py-3 text-sm'>" . date('F j, Y \a\t g:i a', strtotime($row["Complaint_time"])). "</td>";
          echo "<td class='px-4 py-3 text-xs'>" ?>
          <span class='<?php if ($row["Complaint_Status"] == 1) echo "text-green-700 dark:bg-green-700 dark:text-green-100";
                        elseif ($row["Complaint_Status"] == 0) echo "text-red-700 dark:bg-red-700 dark:text-red-100";elseif ($row["Complaint_Status"] == 2) echo "text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100"; ?> px-2 py-1 font-semibold leading-tight  rounded-full '>
            <?php

            if ($row["Complaint_Status"] == 0) {
              echo "<span class='text-red-700 dark:bg-red-700 dark:text-red-100 px-2 py-1 font-semibold leading-tight bg-red-100 rounded-full'>Closed</span>";
            } elseif ($row["Complaint_Status"] == 1) {
              echo "<span class='text-green-700 dark:bg-green-700 dark:text-green-100 px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full'>Open</span>";
            } elseif ($row["Complaint_Status"] == 2) {
              echo "<span class='text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100 px-2 py-1 font-semibold leading-tight bg-yellow-100 rounded-full'>Pending</span>";
            }
            ?>
          </span>
          <?php
          echo " </td>";
          
          ?>

          <?php
          echo "</tr>";
        }
      } else {
        echo "<tr class='text-gray-700 dark:text-gray-400'>
                <td class='px-4 py-3'>No results found.</td>
                <td class='px-4 py-3'></td>
                <td class='px-4 py-3'></td>
                <td class='px-4 py-3'></td>
                </tr>";
      }
      mysqli_close($conn);
          ?>
    </tbody>
  </table>

</div>










<?php require_once '../deshboards/footer.php'; ?>