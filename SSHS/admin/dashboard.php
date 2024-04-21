<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../public/index.php");
    
    exit;
}
require_once '../includes/header.php';





?>



  <body class="bg-gray-100">
    <nav class="bg-white py-4">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
          <a href="#" class="text-2xl font-bold text-gray-800"> Dashboard hello<?php echo $_SESSION['loggedin']; ?></a>
          <a href="../public/index.php">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Logout
          </button>
          </a>
        </div>
      </div>
    </nav>
    <div class="container mx-auto px-4 mt-8">
      <h1 class="text-3xl font-bold mb-4">Welcome, today is : <?PHP echo date("l"); ?></h1>
      <div class="flex flex-wrap -mx-2">
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 mb-4">
          <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-bold text-gray-800 mb-2">Total Revenue</h2>
            <p class="text-2xl font-bold text-green-600">$50,000</p>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 mb-4">
          <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-bold text-gray-800 mb-2">New Users</h2>
            <p class="text-2xl font-bold text-green-600">5</p>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 mb-4">
          <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-bold text-gray-800 mb-2">Open Tickets</h2>
            <p class="text-2xl font-bold text-red-600">10</p>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 mb-4">
          <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-bold text-gray-800 mb-2">New Orders</h2>
            <p class="text-2xl font-bold text-green-600">20</p>
          </div>
        </div>
      </div>
    </div>
    <a href="/SSHS/public/logout.php" class="btn btn-danger">Logout</a>

    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
          <?php
          include "../src/config/database.php";

          $sql = "SELECT * FROM user_master";
          $result = mysqli_query($conn,$sql)or die("query error");

          if(mysqli_num_rows($result) > 0) {

          
          ?>
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">User type</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">house no</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">first name </th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">mobile no</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">email</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">city id</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">update</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">delete</th>
                <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td class="px-4 text-blue-500 py-3"><?php echo $row['User_Type']; ?></td>
                <td class="px-4 py-3"><?php echo $row['House_no']; ?></td>
                <td class="px-4 py-3"><?php echo $row['User_Fname']; ?></td>
                <td class="px-4 py-3 text-lg text-gray-900"><?php echo $row['User_Mobile_no']; ?></td>
                <td class="px-4 py-3"><?php echo $row['User_Email']; ?></td>
                <td class="px-4 py-3"><?php echo $row["City_Id"]; ?></td>
                <td class="px-4 py-3 text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-amber-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                  </svg>
                </td>
                <td class="px-4 py-3 text-red-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-amber-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                  </svg>
                </td>
              </tr>
                <?php } ?>
            </tbody>
          </table>
          <?php }?>
        </div>
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
          <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>

          </a>
          <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">add user</button>
        </div>
      </div>
    </section>
    <script>
      // Add JavaScript code here, if needed
    </script>
  </body>

</html>