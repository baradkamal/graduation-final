<?php $current_url = 'Roles';
require_once '../../src/config/database.php';

require_once '../deshboards/header.php'; ?>
<?php require_once '../deshboards/sidebar.php'; ?>

<?php
// Check if the form has been submitted and the role name is not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["role_name"])) {
  // Retrieve the role name from the form
  $role_name = mysqli_real_escape_string($conn, $_POST['role_name']);

  // Check if the role already exists in the role_master table
  $sql = "SELECT Role_name FROM role_master WHERE Role_name = '$role_name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  } else {
    // Insert data into the role_master table
    $sql = "INSERT INTO role_master (Role_id, Role_name) VALUES (NULL, '$role_name')";
    if (mysqli_query($conn, $sql)) {
      echo "New role added successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>



<div class="box-border  p-4 ">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    manage role's
  </h4>
  <div class="mb-4 px-4 py-3 bg-gray-50 text-right sm:px-6 bg-white rounded-lg dark:bg-gray-800">
    <div class=" items-right">
      <button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" onclick="showInputField()">Add Role</button>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="addRoleForm" style="display:none;">
      <div class="flex-1 items-center mb-4">
        <label for="role_name" class="w-24 mr-4 text-gray-600 dark:text-gray-300">Role Name:</label>
        <input type="text" id="role_name" name="role_name" class="p-2 w-64 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
      </div>
      <div class=" items-center">
        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Add</button>
      </div>
    </form>
  </div>
  
  <script>
    function showInputField() {
      document.getElementById("addRoleForm").style.display = "block";
    }
  </script>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php
      $query = "SELECT * FROM role_master";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
            <div class="px-4 py-5 sm:p-6">
              <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                Role ID: <?php echo $row["Role_id"]; ?>
              </div>
              <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                Role Name: <?php echo $row["Role_name"]; ?>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
              
              <a href="delete_role.php?id=<?php echo $row['Role_id']; ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Delete
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
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
   view user role's
  </h4>   
  <div class="my-4 g-gray-50 text-right sm:px-6 bg-white rounded-lg dark:bg-gray-800">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="relative">
      <div class="  inset-y-0 right-0">
        <label for="role" class="mr-2 font-bold  text-gray-600 dark:text-gray-300">Select Role:</label>
        <select name="role" id="role" class="leading-normal inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
    
          <?php
          $query = "SELECT Role_name FROM role_master";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='" . $row['Role_name'] . "'>" . $row['Role_name'] . "</option>";
            }
          }
          ?>
        </select>
        <button type="submit" name="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">View</button>
      </div>
    </form>
  </div>

  <?php
  if (isset($_GET['submit'])) {
    $role_name = $_GET['role'];
    $query = "SELECT * FROM user_master WHERE User_Type = '$role_name'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
  ?>
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <div class="bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800">
              <div class="px-4 py-5 sm:p-6">
                <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                  User ID: <?php echo $row["User_id"]; ?>
                </div>
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                  User Name: <?php echo $row["User_Fname"] . ' ' . $row["User_Mname"] . ' ' . $row["User_Lname"]; ?>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-800">
                <a href="update_user.php?user_id=<?php echo $row['User_id']; ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-purple-600 bg-white border border-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                  Edit
                </a>
                <a href="delete_user.php?id=<?php echo $row['User_id']; ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Delete
                </a>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

  <?php
    } else {
      echo "<div class='bg-white overflow-hidden shadow rounded-lg'>
            <div class='px-4 py-5 sm:p-6'>
              <p class='text-sm font-medium text-gray-900'>
                No users found for this role.
              </p>
            </div>
          </div>";
    }
  }
  ?>

<?php
  // Retrieve data from database
  $query = "SELECT Role_name, COUNT(User_id) AS user_count FROM role_master LEFT JOIN user_master ON role_master.Role_name = user_master.User_Type GROUP BY Role_name";
  $result = mysqli_query($conn, $query);

  // Format data for chart
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
      "label" => $row["Role_name"],
      "value" => $row["user_count"]
    );
  }

  // Create chart
  ?>
  <div class="my-4 sm:w-6/12 bg-white overflow-hidden shadow rounded-lg dark:bg-gray-800 text-purple-600 dark:text-gray-300">
    <canvas id="user-chart"></canvas>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById("user-chart").getContext("2d");
    var chart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: <?php echo json_encode(array_column($data, "label")); ?>,
        datasets: [{
          label: "Number of Users",
          data: <?php echo json_encode(array_column($data, "value")); ?>,
          backgroundColor: "hsl(252, 82.9%, 67.8%)",
          borderColor: "hsl(252, 82.9%, 67.8%)",
          borderWidth: 1,

        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
  <div class="chart-container">
    <canvas id="users-by-type"></canvas>
  </div>


</div>
<script>
  // Get the select element and the selected value from localStorage
  var select = document.getElementById("role");
  var selectedValue = localStorage.getItem("selectedrole");

  // Set the selected value if it exists in localStorage
  if (selectedValue) {
    select.value = selectedValue;
  }

  // Store the selected value in localStorage whenever the user changes it
  select.addEventListener("change", function() {
    localStorage.setItem("selectedrole", select.value);
  });
</script>
<?php require_once '../deshboards/footer.php'; ?>