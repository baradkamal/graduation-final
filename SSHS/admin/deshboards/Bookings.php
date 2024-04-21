<?php $current_url = 'Bookings';
require_once '../../src/config/database.php';

require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>
<!-- booking content start here -->
<div class="container mx-auto px-4 py-6 dark:text-gray-300">
    <h1 class="text-2xl font-medium mb-4">Booking review</h1>
    <p class="text-base mb-8">view and response common society property booking.</p>
</div>

<div class="col-span-10 sm:col-span-7">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $query = "SELECT b.*, m.Property_Name, u.House_no, u.User_Fname, u.User_Lname FROM property_booking_transaction b JOIN property_master m ON b.Property_id = m.Property_id JOIN user_master u ON b.User_id = u.User_id";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
                        <div class="px-4 py-5 sm:p-6">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                member Name: <?php echo $row["User_Fname"] . " " . $row["User_Lname"]; ?>
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                            hosue no: <?php echo $row["House_no"]; ?>
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                Property Name: <?php echo $row["Property_Name"]; ?>
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                Description: <?php echo $row["Booking_Description"]; ?>
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                booking date : <?php echo date('F j, Y \a\t g:i a', strtotime($row["Booking_time"])) ?>
                                
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                
                                Booking end date <?php echo date('F j, Y \a\t g:i a', strtotime($row["Booking_end_time"])) ?>
                            </div>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                                Booking Status: <?php if ($row["P_booking_Status"] == 0) {

                                                    echo "<span class='text-green-700 dark:bg-green-700 dark:text-green-100 px-2 py-1 font-semibold leading-tight bg-green-100 rounded-full'>new</span>";
                                                } elseif ($row["P_booking_Status"] == 1) {
                                                    echo "<span class='text-purple-700 dark:bg-purple-700 dark:text-purple-100 px-2 py-1 font-semibold leading-tight bg-purple-100 rounded-full'>aproved</span>";
                                                } elseif ($row["P_booking_Status"] == 2) {
                                                    echo "<span class='text-yellow-700 dark:bg-yellow-700 dark:text-yellow-100 px-2 py-1 font-semibold leading-tight bg-yellow-100 rounded-full'>review</span>";
                                                } ?>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
                            <a href="review_Booking.php?id=<?php echo $row['Booking_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                review
                            </a>
                            <a href="Approv_Booking.php?id=<?php echo $row['Booking_id']; ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Approval
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


<!-- booking content end here -->

<?php require_once '../deshboards/footer.php'; ?>