<?php
require_once '../src/config/database.php';

// Prepare and execute SQL query
$sql = "SELECT * FROM user_master WHERE User_id = " . $_SESSION['user_id'] . "";
$result = $conn->query($sql);

// Display user information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_fname = $row["User_Fname"];
        $user_lname = $row["User_Lname"];
        $user_type = $row["User_Type"];
        $house_no = $row["House_no"];
        $user_mobile_no = $row["User_Mobile_no"];
        $user_email = $row["User_Email"];
        $user_address = $row["User_Address"];
        $alternate_address = $row["Alternate_Address"];
        $city_id = $row["City_Id"];
        $user_status = $row["User_Status"];

        echo '<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-gray-800">
                <div class="text-center">
                <div class="flex justify-center items-center mb-6">
                <img src="../images/logo_black.png" alt="Logo" class="W-10 h-12">
                <img class="logo-light block dark:hidden W-10 h-12 mr-3" src="../images/logo_black.png" alt="Logo for light theme">
            <img class="logo-dark hidden dark:block W-10 h-12 mr-3" src="../images/logo_white.png" alt="Logo for dark theme">
            </div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">' . $user_fname . ' ' . $user_lname . '</h2>
                    <p class="text-gray-600 dark:text-gray-400">' . $user_type . '</p>
                </div>
                <hr class="my-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">House No</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $house_no . '</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">Mobile Number</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $user_mobile_no . '</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">Email Address</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $user_email . '</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">Address</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $user_address . '</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">Alternate Address</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $alternate_address . '</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">City ID</label>
                        <p class="text-sm text-gray-800 dark:text-white">' . $city_id . '</p>
                        </div>
                        <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-400">User Status</label>';?>
                        <span class='<?php if ($row["User_Status"] == true) echo "text-green-700 dark:bg-green-700 dark:text-green-100";
                          else echo "text-red-700 dark:bg-red-700 dark:text-red-100"; ?> px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full '>
              <?php

              if ($row["User_Status"] == true) {

                echo " active";
              } else {
                echo " deactive";
              }
              ?>
            </span> <?php
                        '<p class="text-sm text-gray-800 dark:text-white">' . $user_status . '</p>
                        </div>
                        </div>
                        </div>';
    }
} else {
    echo "No user found with this ID";
}
// Close connection
$conn->close();
?>
