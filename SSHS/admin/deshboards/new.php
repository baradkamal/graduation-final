<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sshsdb");

// Query to get the property overview data
$query = "SELECT COUNT(*) as total_properties, 
                 SUM(CASE WHEN t.P_booking_Status = 1 THEN 1 ELSE 0 END) as available_properties, 
                 SUM(CASE WHEN t.P_booking_Status = 2 THEN 1 ELSE 0 END) as booked_properties, 
                 SUM(CASE WHEN t.P_booking_Status = 3 THEN 1 ELSE 0 END) as cancelled_properties, 
                 AVG(p.Property_Name) as avg_price 
          FROM property_booking_transaction t 
          INNER JOIN property_master p 
          ON t.Property_id = p.Property_id";

$result = mysqli_query($conn, $query);

// Fetch the data
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $total_properties = $row['total_properties'];
  $available_properties = $row['available_properties'];
  $booked_properties = $row['booked_properties'];
  $cancelled_properties = $row['cancelled_properties'];
  $avg_price = $row['avg_price'];
}
 else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>


<!-- Display the data using Tailwind CSS -->
<div class="flex justify-between mb-4">
  <div class="bg-white shadow rounded-lg p-4 w-1/5">
    <div class="text-gray-500 uppercase font-bold text-xs mb-2">Total Properties</div>
    <div class="text-gray-800 font-bold text-xl"><?= $total_properties ?></div>
  </div>
  <div class="bg-white shadow rounded-lg p-4 w-1/5">
    <div class="text-gray-500 uppercase font-bold text-xs mb-2">Available Properties</div>
    <div class="text-gray-800 font-bold text-xl"><?= $available_properties ?></div>
  </div>
  <div class="bg-white shadow rounded-lg p-4 w-1/5">
    <div class="text-gray-500 uppercase font-bold text-xs mb-2">Booked Properties</div>
    <div class="text-gray-800 font-bold text-xl"><?= $booked_properties ?></div>
  </div>
  <div class="bg-white shadow rounded-lg p-4 w-1/5">
    <div class="text-gray-500 uppercase font-bold text-xs mb-2">Cancelled Properties</div>
    <div class="text-gray-800 font-bold text-xl"><?= $cancelled_properties ?></div>
  </div>
  <div class="bg-white shadow rounded-lg p-4 w-1/5">
    <div class="text-gray-500 uppercase font-bold text-xs mb-2">Average Price</div>
    <div class="text-gray-800 font-bold text-xl"><?= number_format($avg_price, 2) ?></div>
  </div>
</div>
