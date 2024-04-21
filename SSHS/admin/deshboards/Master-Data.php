<?php $current_url = 'Master Data';

require_once '../../src/config/database.php';
require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>



<div class="grid grid-cols-10 gap-4">
    <div class="col-span-10 sm:col-span-3">
        <div class="container mx-auto px-4 py-6 dark:text-gray-300">
            <h1 class="text-2xl font-medium mb-4">Upload your file</h1>
            <p class="text-base mb-8">Select a file and fill out the form below to upload it.</p>
            <form method="post" action="process_register_entry.php" enctype="multipart/form-data" class="bg-white shadow-md rounded-md px-6 pt-6 pb-8 mb-4 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="file">Select file to upload:</label>
                    <input type="file" name="file" id="file" class="py-2 px-3 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="register_id">Register Type:</label>
                    <select name="register_id" id="register_id" class="py-2 px-3 border rounded-md w-full">
                        <?php
                        // query to select the register types from the register_master table
                        $sql = "SELECT * FROM register_master";
                        $result = mysqli_query($conn, $sql);

                        // loop through the results and create the options for the select element
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['Register_id'] . "'>" . $row['Register_Type'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="description">Description</label>
                    <input type="text" name="description" id="description" class="py-2 px-3 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2" for="user_id">User ID:</label>
                    <input type="text" name="user_id" id="user_id" class="py-2 px-3 border rounded-md w-full">
                </div>
                <div class="flex items-center justify-between">
                    <input type="submit" name="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </form>
        </div>
    </div>
    <!-- grid code start here -->
    <div class="col-span-10 sm:col-span-7">
        <?php
        // Determine page number
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Number of records per page
        $records_per_page = 7;

        // Calculate LIMIT value for SQL query
        $limit = ($page - 1) * $records_per_page;

        // Query to fetch the data from the register_transaction table
        $sql = "SELECT rt.Description, rt.Register_Upload_time, rt.File, rm.Register_Type FROM register_transaction rt INNER JOIN register_master rm ON rt.Register_id = rm.Register_id ORDER BY rt.R_id DESC LIMIT $limit, $records_per_page";
        $result = mysqli_query($conn, $sql);

        // Get total number of records in the table
        $sql = "SELECT COUNT(*) AS total FROM register_transaction";
        $result_total = mysqli_query($conn, $sql);
        $row_total = mysqli_fetch_assoc($result_total);
        $total_records = $row_total['total'];

        // Calculate total number of pages
        $total_pages = ceil($total_records / $records_per_page);
        ?>

        <div class="flex flex-col">
            <div class="sm:my-28 overflow-x-auto sm:-mx-6 lg:-mx-6">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                        <div class="overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead class="bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th scope="col" class="px-4 py-3 text-ellipsis overflow-hidden">Register Type</th>
                                        <th scope="col" class="px-4 py-3 text-ellipsis overflow-hidden">Description</th>
                                        <th scope="col" class="px-4 py-3 text-ellipsis overflow-hidden">Register Upload Time</th>
                                        <th scope="col" class="px-4 py-3 text-ellipsis overflow-hidden">File</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:text-gray-400 dark:bg-gray-800">
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td class="px-4 py-3 text-sm truncate hover:text-clip"><?php echo $row['Register_Type']; ?></td>
                                            <td class="px-4 py-3 text-sm"><?php echo $row['Description']; ?></td>
                                            <td class="px-4 py-3 text-sm"><?php echo $row['Register_Upload_time']; ?></td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="#">

                                                    <div class="flex items-center space-x-4 text-sm">
                                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                            </svg>
                                                        </button>
                                                </a>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="bg-white dark:text-gray-400 dark:bg-gray-800 px-2 py-1 flex items-center justify-between border-t border-gray-200 sm:px-6">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <?php if ($page > 1) { ?>
                                    <a href="?page=<?php echo ($page - 1); ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                    </a>
                                <?php } ?>
                                <?php if ($page < $total_pages) { ?>
                                    <a href="?page=<?php echo ($page + 1); ?>" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        Next
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Showing
                                        <span class="font-medium"><?php echo $limit + 1; ?></span>
                                        to
                                        <span class="font-medium"><?php echo min($limit + $records_per_page, $total_records); ?></span>
                                        of
                                        <span class="font-medium"><?php echo $total_records; ?></span>
                                        results
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                            <a href="?page=<?php echo $i; ?>" class="<?php if ($page === $i) echo 'bg-blue-500 text-white '; ?>relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white font-medium text-gray-700 hover:bg-gray-50">
                                                <?php echo $i; ?>
                                            </a>
                                        <?php } ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>







<?php require_once '../deshboards/footer.php'; ?>