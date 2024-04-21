<?php require_once '../src/config/database.php'; ?>
<?php
require_once '../includes/header.php';
?>
<?php $current_url = 'Staff';
include('sidebar.php');
?>
<!-- Profile code start here----------------------------------- -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Staff Registration Form
</h2>
<div class="w-full  mx-auto ">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-800" method="POST" action="register_staff.php">
        <?php if (isset($_GET['success'])) { ?>
            <div class="bg-green-50  text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold"><?php echo $_GET['success']; ?></strong>
            </div>
        <?php } ?>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-4">
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Staff Type</span>
                    <select id="staff_type" name="staff_type" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select" required>
                        <option value="">Select staff type</option>
                        <option value="Clerk">Housekeeping Staff</option>
                        <option value="Maintenance_Staff">Maintenance Staff</option>
                        <option value="Gardeners">Gardeners</option>
                        <option value="Accountant/Treasurer">Accountant/Treasurer</option>
                    </select>
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">First Name</span>
                    <input id="staff_fname" name="staff_fname" type="text" placeholder="Enter first name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Middle Name</span>
                    <input id="staff_mname" name="staff_mname" type="text" placeholder="Enter middle name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                    <input id="staff_lname" name="staff_lname" type="text" placeholder="Enter last name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Mobile Number</span>
                    <input id="staff_mobile_no" name="staff_mobile_no" type="tel" placeholder="Enter mobile number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">PassCode</span>
                    <input id="passCode" name="PassCode" type="password" placeholder="Enter new&unique PassCode" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Adhar Number</span>
                    <input id="staff_adharno" name="staff_adharno" type="text" placeholder="Enter adhar number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Designation</span>
                    <input id="staff_designation" name="staff_designation" type="text" placeholder="Enter designation" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                    <input id="address" name="address" type="text" placeholder="Enter address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Alternate Address</span>
                    <input id="alternate_address" name="alternate_address" type="text" placeholder="Enter alternate address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address Area</span>
                    <input id="Address_Area" name="Address_Area" type="text" placeholder="Enter address Area" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>

            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">City Id</span>
                    <input id="City_Id" name="City_Id" type="text" placeholder="Enter city passcode" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Emergancy Contact no</span>
                    <input id="Emergancy_Contact_no" name="Emergancy_Contact_no" type="text" placeholder="Enter alternate address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
        </div>
        <div class=" flex sm:justify-center justify-end  mt-6">
            <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-800">
                Submit
            </button>
        </div>

    </form>
</div>




<div class=" dark:bg-gray-900">
    <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
        Staff Transaction Form
    </h2>
    <div class="grid grid-cols-10 gap-4">
        <div class="col-span-10 sm:col-span-3">
            <div class="w-full max-w-md mx-auto">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4  dark:bg-gray-800" method="POST" action="insert_staff_transaction.php">
                    <?php if (isset($_GET['success2'])) { ?>
                        <div class="bg-green-50 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <?php echo $_GET['success2'] ?>
                        </div>
                    <?php } ?>
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">PassCode</span>
                            <input id="passcode" name="passcode" type="text" placeholder="Enter PassCode" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                        </label>
                    </div>
                    <input type="hidden" name="entry_time" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                    <input type="hidden" name="exit_time" value="0000-00-00 00:00:00" />
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">House No</span>
                            <input id="house_no" name="house_no" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter house no" required />
                        </label>
                    </div>
                    <input type="hidden" name="staff_status" value="1" />
                    <div class="flex sm:justify-center justify-end mt-6">
                        <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-800">
                            Submit
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <div class="col-span-10 sm:col-span-7">
            <?php
            // Retrieve guest information from guest_master table
            $query = "SELECT staff_master.Staff_type, staff_master.Staff_Fname, staff_master.Staff_Mname, staff_master.Staff_Lname, staff_transaction.Entry_time, staff_transaction.Exit_time, staff_transaction.House_no
              FROM staff_master
              JOIN staff_transaction ON staff_master.Staff_details_id = staff_transaction.Staff_details_id
              WHERE staff_transaction.Exit_time = '0000-00-00 00:00:00'
              ORDER BY staff_transaction.Entry_time DESC";
            $result = mysqli_query($conn, $query);

            // Set pagination variables
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $records_per_page = 10;
            $num_records = mysqli_num_rows($result);
            $num_pages = ceil($num_records / $records_per_page);
            $offset = ($page - 1) * $records_per_page;

            // Retrieve guest information with pagination
            $query = "SELECT staff_master.Staff_type, staff_master.Staff_Fname, staff_master.Staff_Mname, staff_master.Staff_Lname, staff_transaction.Staff_id, staff_transaction.Entry_time, staff_transaction.Exit_time, staff_transaction.House_no
              FROM staff_master
              JOIN staff_transaction ON staff_master.Staff_details_id = staff_transaction.Staff_details_id
              WHERE staff_transaction.Exit_time = '0000-00-00 00:00:00'
              ORDER BY staff_transaction.Entry_time DESC
              LIMIT $offset, $records_per_page";


            $result = mysqli_query($conn, $query);



            // Check if any guest records were found
            if (mysqli_num_rows($result) > 0) {
                // Display guest information in an HTML table
                echo '<div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto max-h-fit">
                <table class="w-full whitespace-no-wrap  ">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 ">
                            <th class="px-4 py-3 text-ellipsis overflow-hidden ">staff Name</th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">staff Type</th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden"> HouseNO </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">Entry Time </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">status </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='text-gray-700 dark:text-gray-400'>";
                    echo "<td class='px-4 py-3 text-sm truncate hover:text-clip'>" . $row['Staff_Fname'] . " " . $row['Staff_Mname'] . " " . $row['Staff_Lname'] . "</td>";
                    echo "<td class='px-4 py-3 text-sm'>" . $row['Staff_type'] . "</td>";
                    echo "<td class='px-4 py-3 text-sm'>" . $row['House_no'] . "</td>";
                    echo "<td class='px-4 py-3 text-sm'>" . $row['Entry_time'] . "</td>";
                    echo "<td class='px-4 py-3 text-sm'>" ?>

                    <span class='<?php if ($row["Exit_time"] == "0000-00-00 00:00:00") echo "text-green-700 dark:bg-green-700 dark:text-green-100";
                                    else echo "text-red-700 dark:bg-red-700 dark:text-red-100"; ?> px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full '>
                        <?php

                        if ($row["Exit_time"] == "0000-00-00 00:00:00") {

                            echo " enter";
                        } else {
                            echo " exit";
                        }
                        ?>
                    </span>
                    <?php
                    echo " </td>";
                    echo "<td class='px-4 py-3 dark:bg-gray-800'>";
                    ?>

                    <a href="Update_staff_entry.php?id=<?php echo $row['Staff_id']; ?>">
                <?php
                    echo "<div class='flex items-center space-x-4 text-sm'>
              <button class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' aria-label='Edit'>
                <svg class='w-5 h-5' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
                  <path d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'></path>
                </svg>
              </button></a>
              </a>
            </div>
          </td>";
                    echo "</tr>";
                }
                echo '</tbody>
        </table>
    </div>
    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-800">
        <div class="flex items-center justify-center space-x-1">
            ';
                // Display previous button if not on first page
                if ($page > 1) {
                    echo '<a href="?page=' . ($page - 1) . '" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>';
                }
                // Display next button if not on last page
                if ($page < $num_pages) {
                    echo '<a href="?page=' . ($page + 1) . '" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
        </a>';
                }
                // Display page numbers
                for ($i = 1; $i <= $num_pages; $i++) {
                    if ($i == $page) {
                        echo '<span class="px-3 py-1">' . $i . '</span>';
                    } else {
                        echo '<a href="?page=' . $i . '" class="px-3 py-1 hover:bg-purple-500 hover:text-white focus:outline-none focus:shadow-outline-purple">' . $i . '</a>';
                    }
                }
                echo '</div>
        <p class="text-xs text-gray-500 dark:text-gray-400">
        Showing ' . ($offset + 1) . ' to ' . ($offset + mysqli_num_rows($result)) . ' of ' . $num_records . ' entries
        </p>
        
        </div>
        </div>';
            } else {
                echo "<p>No guests found.</p>";
            }
            // Free result set
            mysqli_free_result($result);


                ?>

        </div>
    </div>

</div>
<h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
    staff exit aransction table
</h2>
<?php
// Retrieve guest information from guest_master table
$query = "SELECT staff_master.Staff_type, staff_master.Staff_Fname, staff_master.Staff_Mname, staff_master.Staff_Lname, staff_transaction.Staff_id, staff_transaction.Entry_time, staff_transaction.Exit_time, staff_transaction.House_no
            FROM staff_master
            JOIN staff_transaction ON staff_master.Staff_details_id = staff_transaction.Staff_details_id
            WHERE staff_transaction.Exit_time <> '0000-00-00 00:00:00'
            ORDER BY staff_transaction.Entry_time DESC";

$result = mysqli_query($conn, $query);

// Set pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;
$num_records = mysqli_num_rows($result);
$num_pages = ceil($num_records / $records_per_page);
$offset = ($page - 1) * $records_per_page;

// Retrieve guest information with pagination
$query = "SELECT staff_master.Staff_type, staff_master.Staff_Fname, staff_master.Staff_Mname, staff_master.Staff_Lname, staff_transaction.Staff_id, staff_transaction.Entry_time, staff_transaction.Exit_time, staff_transaction.House_no
FROM staff_master
JOIN staff_transaction ON staff_master.Staff_details_id = staff_transaction.Staff_details_id
WHERE staff_transaction.Exit_time <> '0000-00-00 00:00:00'
ORDER BY staff_transaction.Entry_time DESC
          LIMIT $offset, $records_per_page";

$result = mysqli_query($conn, $query);



// Check if any guest records were found
if (mysqli_num_rows($result) > 0) {
    // Display guest information in an HTML table
    echo '<div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto max-h-fit">
                <table class="w-full whitespace-no-wrap  ">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 ">
                            <th class="px-4 py-3 text-ellipsis overflow-hidden ">staff Name</th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">staff Type</th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden"> HouseNO </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">Entry Time </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">Exit Time </th>
                            <th class="px-4 py-3 text-ellipsis overflow-hidden">status </th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='text-gray-700 dark:text-gray-400'>";
        echo "<td class='px-4 py-3 text-sm truncate hover:text-clip'>" . $row['Staff_Fname'] . " " . $row['Staff_Mname'] . " " . $row['Staff_Lname'] . "</td>";
        echo "<td class='px-4 py-3 text-sm'>" . $row['Staff_type'] . "</td>";
        echo "<td class='px-4 py-3 text-sm'>" . $row['House_no'] . "</td>";
        echo "<td class='px-4 py-3 text-sm'>" . $row['Entry_time'] . "</td>";
        echo "<td class='px-4 py-3 text-sm'>" . $row['Exit_time'] . "</td>";
        echo "<td class='px-4 py-3 text-sm'>" ?>

        <span class='<?php if ($row["Exit_time"] == "0000-00-00 00:00:00") echo "text-green-700 dark:bg-green-700 dark:text-green-100";
                        else echo "text-purple-700 dark:bg-purple-700 dark:text-purple-100"; ?> px-2 py-1 font-semibold leading-tight bg-purple-100 rounded-full '>
            <?php

            if ($row["Exit_time"] == "0000-00-00 00:00:00") {

                echo " enter";
            } else {
                echo " exit";
            }
            ?>
        </span>
        <?php
        echo " </td>";
        
        ?>

        
    <?php
        
        echo "</tr>";
    }
    echo '</tbody>
        </table>
    </div>
    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-800">
        <div class="flex items-center justify-center space-x-1">
            ';
    // Display previous button if not on first page
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>';
    }
    // Display next button if not on last page
    if ($page < $num_pages) {
        echo '<a href="?page=' . ($page + 1) . '" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
        </a>';
    }
    // Display page numbers
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($i == $page) {
            echo '<span class="px-3 py-1">' . $i . '</span>';
        } else {
            echo '<a href="?page=' . $i . '" class="px-3 py-1 hover:bg-purple-500 hover:text-white focus:outline-none focus:shadow-outline-purple">' . $i . '</a>';
        }
    }
    echo '</div>
        <p class="text-xs text-gray-500 dark:text-gray-400">
        Showing ' . ($offset + 1) . ' to ' . ($offset + mysqli_num_rows($result)) . ' of ' . $num_records . ' entries
        </p>
        
        </div>
        </div>';
} else {
    echo "<p>No guests found.</p>";
}
// Free result set
mysqli_free_result($result);


    ?>

    </div>
    </div>



    <!-- Profile code end  here------------------------------------ -->


    <!-- Profile code end  here------------------------------------ -->

    <?php
    require_once '../includes/footer.php';
    ?>