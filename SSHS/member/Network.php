<?php

/*
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ||(!isset($_SESSION['user_id']))){
    header("location: ../public/index.php");
    
    exit;
} */?>
<?php
// Path to the database.php file
$database_path = 'C:/xampp/htdocs/SSHS/src/config/database.php';
// Include the database file
include($database_path);
?>
<?php require_once '../admin/deshboards/header.php'; ?>
<?php $current_url = 'Network';
include('new.php');
?>
<!-- Network code start here----------------------------------- -->
<?php
$sql = "SELECT * FROM user_master ";
$result2 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result2);

$_SESSION['House_no'] = $row['House_no'];
// Query database for number of guest notifications received
$sql_received = "SELECT COUNT(*) FROM guest_transaction WHERE House_no = ".$_SESSION['House_no'];

$result_received = mysqli_query($conn, $sql_received);

$notifications_received = mysqli_fetch_array($result_received)[0];

// Query database for number of guest notifications responded to
$sql_responded = "SELECT COUNT(*) FROM guest_transaction WHERE House_no = ".$_SESSION['House_no']." AND Exit_time IS NOT NULL";

$result_responded = mysqli_query($conn, $sql_responded);

$notifications_responded = mysqli_fetch_array($result_responded)[0];
?>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Guest Notifications</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Number of guest notifications received and responded to.</p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
          Notifications Received
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <?php echo $notifications_received; ?>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
          Notifications Responded To
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <?php echo $notifications_responded; ?>
        </dd>
      </div>
    </dl>
  </div>
</div>

<div class="flex flex-col mx-auto mt-10">
            <label class="font-bold text-lg mb-2 dark:text-gray-200">Notices</label>
            <?php
          
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

<!-- Network code end t here------------------------------------ -->

<?php require_once '../admin/deshboards/footer.php'; ?>