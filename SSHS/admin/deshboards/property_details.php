<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sshsdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get property details
$property_id = 1; // assuming you pass the property id as a GET parameter
$sql = "SELECT * FROM property_master WHERE Property_id = $property_id";
$result = mysqli_query($conn, $sql);

// check if property exists
if (mysqli_num_rows($result) == 0) {
    echo "Property not found";
} else {
    $property = mysqli_fetch_assoc($result);
    // display property information
    echo "<h1>$property[Property_Name]</h1>";
    

    // get availability information
    $sql = "SELECT * FROM property_booking_transaction WHERE Property_id = $property_id";
    $result = mysqli_query($conn, $sql);
    $availability = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $availability[$row['Booking_time']] = $row['P_booking_Status'];
    }

    // display availability calendar
    echo "<table>";
    echo "<tr><th>Date</th><th>Status</th></tr>";
    $start_date = date('Y-m-d');
    $end_date = date('Y-m-d', strtotime('+1 year'));
    for ($date = $start_date; $date < $end_date; $date = date('Y-m-d', strtotime($date . ' +1 day'))) {
        $status = isset($availability[$date]) ? ($availability[$date] == 1 ? 'Booked' : 'Pending') : 'Available';
        $color = $status == 'Available' ? 'green' : ($status == 'Booked' ? 'red' : 'orange');
        echo "<tr><td>$date</td><td style='color: $color;'>$status</td></tr>";
    }
    echo "</table>";
}

mysqli_close($conn);
?>
