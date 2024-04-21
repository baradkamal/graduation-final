<?php $current_url = 'Notices';


require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>
<!------------------------------Notices module code start here ---------------------------------------->



<div class="grid grid-cols-10 gap-4">
    <div class="col-span-10 sm:col-span-3">
        <div class="container mx-auto px-4 py-6 dark:text-gray-300">
            <h1 class="text-2xl font-medium mb-4">Add a Notice</h1>
            <form action="add_notice.php" method="post" class="bg-white shadow-md rounded-md px-6 pt-6 pb-8 mb-4 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="notice-subject">Notice Subject:</label>
                    <input type="text" name="notice_sub" id="notice-subject" placeholder="Enter notice subject" class="py-2 px-3 border rounded-md w-full dark:bg-gray-800" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="notice-description">Notice Description:</label>
                    <textarea name="notice_desc" id="notice-description" placeholder="Enter notice description" class="py-2 px-3 border rounded-md w-full dark:bg-gray-800" required></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <input type="submit" value="Add Notice" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-800">
                </div>

            </form>
        </div>
    </div>
    <!-- grid code start here -->
    <div class="col-span-10 sm:col-span-7">
        <div class="flex flex-col mx-auto mt-10">
            <label class="font-bold text-lg mb-2 dark:text-gray-200">Notices</label>
            <?php
            require_once '../../src/config/database.php';
            $select_notices = "SELECT * FROM notice_master";
            $result_notices = mysqli_query($conn, $select_notices);

            // Loop through the notices and display them
            while ($row_notices = mysqli_fetch_assoc($result_notices)) {
                $notice_id = $row_notices['Notice_id'];
                $notice_sub = $row_notices['Notice_sub'];

                // Select the latest notice transaction for this notice
                $select_transaction = "SELECT * FROM notice_transaction WHERE Notice_id='$notice_id' ORDER BY Notice_time DESC LIMIT 1";
                $result_transaction = mysqli_query($conn, $select_transaction);
                $row_transaction = mysqli_fetch_assoc($result_transaction);

                // Display the notice
                echo "<div class='border-2 border-gray-400 p-2 rounded-lg mb-4 dark:text-gray-400 dark:bg-gray-800'>";
                echo "<p class='font-bold'>$notice_sub</p>";
                echo "<p>" . $row_transaction['Description'] . "</p>";
                echo "<p class='text-xs'>Posted on " . date('F j, Y \a\t g:i a', strtotime($row_transaction['Notice_time'])) . "</p>";
                echo "</div>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>


        </div>
    </div>



    <!------------------------------NOtices module code end here ------------------------------------------>
    <?php require_once '../deshboards/footer.php'; ?>