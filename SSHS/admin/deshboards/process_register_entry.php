<?php require_once '../../src/config/database.php'; ?>
<?php
// check if the form was submitted
if (isset($_POST['submit'])) {
    // set target directory where the file will be uploaded
    $targetDir = 'C:/xampp/htdocs/SSHS/images';

    // get the file name and add a unique id to the beginning to avoid duplicate file names
    $randomString = bin2hex(random_bytes(4)); // generate a random string
    $fileName = $randomString . '_' . basename($_FILES["file"]["name"]); // add the random string to the filename
    $targetFilePath = $targetDir . $fileName;

    // move the file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        // get the form data
        $registerId = $_POST['register_id'];
        $dId = $_POST['description'];
        
        $file = $fileName;
        $userId = $_POST['user_id'];
        $registerStatus = 1;

        // query to insert data into the register_transaction table
        $sql = "INSERT INTO register_transaction (R_id, Register_id, Description, File, User_id, Register_Status) 
        VALUES (NULL, '$registerId', '$dId', '$file', '$userId', '$registerStatus')";

        if (mysqli_query($conn, $sql)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close the database connection
        
    } else {
        echo "Error uploading file.";
    }
}
?>