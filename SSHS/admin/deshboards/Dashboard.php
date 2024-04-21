<?php $current_url = 'deshboard';
require_once '../../src/config/database.php';
require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>


<div class="grid grid-cols-1 mt-6 md:grid-cols-3 gap-4 ">
  <?php
  $query_active_users0 = "SELECT COUNT(*) as total_count FROM user_master";
  $result_active_users0 = mysqli_query($conn, $query_active_users0);
  $row_active_users0 = mysqli_fetch_assoc($result_active_users0);
  ?>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800 ">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Total Users</h3>
    <p class="text-3xl font-bold text-purple-600"><?php echo $row_active_users0["total_count"]; ?></p>
  </div>
  <?php
  $query_active_users2 = "SELECT COUNT(*) as total_count FROM user_master WHERE User_Status = 1";
  $result_active_users2 = mysqli_query($conn, $query_active_users2);
  $row_active_users2 = mysqli_fetch_assoc($result_active_users2);
  ?>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800 ">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Active Users</h3>
    <p class="text-3xl font-bold text-green-500"><?php echo $row_active_users2["total_count"]; ?></p>
  </div>
  <?php
  $query_active_users = "SELECT COUNT(*) as total_count FROM user_master WHERE User_Status = 0";
  $result_active_users = mysqli_query($conn, $query_active_users);
  $row_active_users = mysqli_fetch_assoc($result_active_users);
  ?>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800  ">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Deactive Users</h3>
    <p class="text-3xl font-bold text-red-500"><?php echo $row_active_users["total_count"]; ?></p>
  </div>
</div>


<?php

// Query to get total number of complaints
$sql_total_complaints = "SELECT COUNT(*) AS total_complaints FROM complaint_transaction";
$result_total_complaints = mysqli_query($conn, $sql_total_complaints);
$row_total_complaints = mysqli_fetch_assoc($result_total_complaints);
$total_complaints = $row_total_complaints['total_complaints'];

// Query to get average time to resolve
$sql_avg_resolve_time = "SELECT AVG(TIMESTAMPDIFF(DAY, Complaint_time, NOW())) AS avg_resolve_time FROM complaint_transaction WHERE Complaint_Status = 1";
$result_avg_resolve_time = mysqli_query($conn, $sql_avg_resolve_time);
$row_avg_resolve_time = mysqli_fetch_assoc($result_avg_resolve_time);
$avg_resolve_time = round($row_avg_resolve_time['avg_resolve_time'], 1) . " days";

// Query to get most common types of complaints
$sql_most_common_types = "SELECT Description, COUNT(*) AS num_complaints FROM complaint_transaction GROUP BY Description ORDER BY num_complaints DESC LIMIT 5";
$result_most_common_types = mysqli_query($conn, $sql_most_common_types);

?>

<div class="my-6 grid grid-cols-1 md:grid-cols-3 gap-4">
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Total Complaints</h3>
    <p class="text-3xl font-bold text-gray-900 dark:text-gray-300"><?php echo $total_complaints; ?></p>
  </div>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Average Time to Resolve</h3>
    <p class="text-3xl font-bold text-gray-900 dark:text-gray-300"><?php echo $avg_resolve_time; ?></p>
  </div>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Most Common Types</h3>
    <ul class="list-disc list-inside dark:text-gray-300">
      <?php while ($row_most_common_types = mysqli_fetch_assoc($result_most_common_types)) { ?>
        <li><?php echo $row_most_common_types['Description'] . ": " . $row_most_common_types['num_complaints']; ?></li>
      <?php } ?>
    </ul>
  </div>
</div>

<?php  ?>


<?php
// your database connection code goes here

// count total properties
$query_total_properties = "SELECT COUNT(*) as total_properties FROM property_master";
$result_total_properties = mysqli_query($conn, $query_total_properties);
$row_total_properties = mysqli_fetch_assoc($result_total_properties);
$total_properties = $row_total_properties['total_properties'];

// count total bookings
$query_total_bookings = "SELECT COUNT(*) as total_bookings FROM property_booking_transaction";
$result_total_bookings = mysqli_query($conn, $query_total_bookings);
$row_total_bookings = mysqli_fetch_assoc($result_total_bookings);
$total_bookings = $row_total_bookings['total_bookings'];

// count most popular types
$query_popular_types = "SELECT pm.Property_id, pm.Property_Name, COUNT(*) as total_count 
                        FROM property_booking_transaction pb 
                        JOIN property_master pm ON pb.Property_id = pm.Property_id 
                        GROUP BY pm.Property_id 
                        ORDER BY total_count DESC 
                        LIMIT 4";

$result_popular_types = mysqli_query($conn, $query_popular_types);
?>

<div class="my-6 grid grid-cols-1 md:grid-cols-3 gap-4">
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Total Properties Available</h3>
    <p class="text-3xl font-bold text-gray-900 dark:text-gray-300"><?php echo $total_properties; ?></p>
  </div>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Total Bookings Made</h3>
    <p class="text-3xl font-bold text-gray-900 dark:text-gray-300"><?php echo $total_bookings; ?></p>
  </div>
  <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
    <h3 class="text-lg font-medium text-gray-800 mb-2 dark:text-gray-200">Most Popular Types</h3>
    <ul class="list-disc list-inside dark:text-gray-300">
      <?php while ($row_popular_types = mysqli_fetch_assoc($result_popular_types)) { ?>
        <li><?php echo $row_popular_types['Property_Name'] . ': ' . $row_popular_types['total_count']; ?></li>
      <?php } ?>
    </ul>
  </div>
</div>


<?php require_once '../deshboards/footer.php'; ?>