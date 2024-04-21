<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);
?>
<?php require_once '../admin/deshboards/header.php'; ?>
<?php $current_url = 'Dashboard';
include('new.php');
?>
<?php


// Fetch user account overview data from user_master table
$user_id = 41; // Replace with the logged in user's ID
$sql = "SELECT User_Fname, User_Mobile_no, User_Email, User_Address, User_Status FROM user_master WHERE User_id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!-- dashboard code start here----------------------------------- -->


<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
      </svg>
    </div>
    <div>
      <?php
      $query_total_bookings0 = "SELECT COUNT(*) AS total_bookings FROM property_booking_transaction WHERE User_id = " . $_SESSION['user_id'];
      $result_total_bookings0 = mysqli_query($conn, $query_total_bookings0);
      $row_total_bookings0 = mysqli_fetch_assoc($result_total_bookings0);

      ?>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Bookings:
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        <?php echo $row_total_bookings0["total_bookings"]; ?>
      </p>
    </div>
  </div>
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
        </svg>
    </div>
    <div>
        <?php
        $query_total_complaints = "SELECT COUNT(*) AS total_complaints FROM complaint_transaction WHERE User_id = " . $_SESSION['user_id'];
        $result_total_complaints = mysqli_query($conn, $query_total_complaints);
        $row_total_complaints = mysqli_fetch_assoc($result_total_complaints);
        ?>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Complaints Submitted:
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php echo $row_total_complaints["total_complaints"]; ?>
        </p>
    </div>
</div>

  <!-- Card -->

  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M12.04,2.5L9.53,5H14.53L12.04,2.5M4,7V20H20V7H4M12,0L17,5V5H20A2,2 0 0,1 22,7V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V7A2,2 0 0,1 4,5H7V5L12,0M7,18V14H12V18H7M14,17V10H18V17H14M6,12V9H11V12H6Z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div>
    <?php
        $query_total_notice = "SELECT COUNT(*) AS total_notice FROM notice_transaction";
        $result_total_notice = mysqli_query($conn, $query_total_notice);
        $row_total_notice = mysqli_fetch_assoc($result_total_notice);
        ?>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
      housing society Notices 
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
      <?php echo $row_total_notice["total_notice"]; ?>
      </p>
    </div>
  </div>
</div>

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
  Property Booking Status
</h4>

<div class="grid gap-6 mb-8 md:grid-cols-2">
  <?php
  // Assuming you have already established a database connection
  $sql = "SELECT pb.Booking_id, pm.Property_Name, pb.Booking_Description, pb.P_booking_Status, pb.Booking_time
          FROM property_booking_transaction pb
          INNER JOIN property_master pm ON pb.Property_id = pm.Property_id
          ORDER BY pb.Booking_time DESC
          LIMIT 2";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $booking_id = $row["Booking_id"];
      $property_name = $row["Property_Name"];
      $booking_description = $row["Booking_Description"];
      $booking_status = $row["P_booking_Status"];
      $booking_time = date("jS F, Y", strtotime($row["Booking_time"]));

      // Generate the HTML code dynamically
      ?>
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
          Booking ID: <?php echo $booking_id; ?>
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
          Location: <?php echo $property_name; ?>
        </p>
        <p class="text-gray-600 dark:text-gray-400">
          Date: <?php echo $booking_time; ?>
        </p>
        <p class="text-gray-600 dark:text-gray-400">
          Status: <?php echo ($booking_status == 1) ? "Approved" : "Pending"; ?>
        </p>
        <p class="text-gray-600 dark:text-gray-400">
          Description: <?php echo $booking_description; ?>
        </p>
      </div>
    <?php
    }
  } else {
    ?>
    <p>No bookings found.</p>
  <?php
  }
  ?>
</div>


<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
  Complaint Status
</h4>

<div class="grid gap-6 mb-8 md:grid-cols-3">
  <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
      Open
    </h4>
    <?php
      $sql = "SELECT COUNT(*) AS count FROM complaint_transaction WHERE Complaint_Status=1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $count = $row['count'];
    ?>
    <p class="text-gray-600 dark:text-gray-400">
      You have <?php echo $count; ?> open complaints.
    </p>
  </div>

  <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
      In Progress
    </h4>
    <?php
      $sql = "SELECT COUNT(*) AS count FROM complaint_transaction WHERE Complaint_Status=2";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $count = $row['count'];
    ?>
    <p class="text-gray-600 dark:text-gray-400">
      You have <?php echo $count; ?> complaints in progress.
    </p>
  </div>

  <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
      Closed
    </h4>
    <?php
      $sql = "SELECT COUNT(*) AS count FROM complaint_transaction WHERE Complaint_Status=0";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $count = $row['count'];
    ?>
    <p class="text-gray-600 dark:text-gray-400">
      You have <?php echo $count; ?> closed complaints.
    </p>
  </div>
</div>


<!-- dashboard end start here------------------------------------ -->

<?php require_once '../admin/deshboards/footer.php'; ?>